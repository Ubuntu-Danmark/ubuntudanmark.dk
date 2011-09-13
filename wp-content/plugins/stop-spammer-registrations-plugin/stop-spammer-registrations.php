<?PHP
/*
Plugin Name: Stop Spammer Registrations Plugin
Plugin URI: http://www.BlogsEye.com/
Description: This plugin checks against StopForumSpam.com, Project Honeypot and BotScout to to prevent spammers from registering or making comments.
.
Version: 2.0
Author: Keith P. Graham
Author URI: http://www.BlogsEye.com/

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/


/************************************************************
* 	Set the hooks and filters
*	Primary hook is is_email()
*	other hooks:  pre_user_email, user_registration_email 
*	The theory being I'll catch somebody on one of them.
*	each hook has to remove the other hooks to prevent multiple entries into the code 
*
*************************************************************/
add_filter('is_email','kpg_stop_sp_reg_fixup');	
add_filter('user_registration_email','kpg_stop_sp_reg_fixup');	
add_filter('pre_user_email','kpg_stop_sp_reg_fixup');	




/************************************************************
* 	kpg_stop_sp_reg_fixup()
*	Hooked from is_email() 
*
*************************************************************/
function kpg_stop_sp_reg_fixup($email) {
	$author='';
	if (array_key_exists('author',$_POST)) {
		$author=$_POST['author'];
	} else if (array_key_exists('user_name',$_POST)) {
		$author=$_POST['user_name'];
	}
	remove_filter( 'is_email', 'kpg_stop_sp_reg_fixup' );
	remove_filter( 'user_registration_email', 'kpg_stop_sp_reg_fixup' );
	remove_filter( 'pre_user_email', 'kpg_stop_sp_reg_fixup' );
	$author=sanitize_user($author);
	
	return kpg_stop_sp_reg_check_email($email,$author);
}

function kpg_stop_sp_reg_mpmu_sanitize($email, $emailb='', $mess='') {
	if (empty($email)) return $email;
	return(kpg_stop_sp_reg_fixup($email));
}


/************************************************************
* 	kpg_stop_sp_reg_check_email()
*	This is the generic email check so that it can be called
*	from several different hooks
*
*************************************************************/
function kpg_stop_sp_reg_check_email($email,$author='') {

 	if (empty($email)) return $email;
	$email=trim($email);
	$email=strip_tags($email);
 	if (empty($email)) return $email;
	// this is the Stop Spammer Registrations functionality.
	// email as the email to validate
	
	// only check in wp-comments-post.php or wp-login.php
	
	$sname='.'.$_SERVER["SCRIPT_NAME"];
	$whodunnit='';
	$apikey='';
	sfs_errorsonoff();
	// some plugins call is_email on every page and in admin. We'll ignore some of them
	if (strpos($sname,'/wp-admin/')||
		strpos($sname,'index.php')||
		strpos($sname,'archive.php')||
		strpos($sname,'archives.php')||
		strpos($sname,'links.php')||
		strpos($sname,'pages.php')||
		strpos($sname,'seach.php')||
		strpos($sname,'single.php')||
		strpos($sname,'page.php')
	) {
		sfs_errorsonoff('off');
		return $email;
	}
	// here we validate 
	
	/*
	
	* http://www.stopforumspam.com/api?ip=91.186.18.61
    * http://www.stopforumspam.com/api?email=g2fsehis5e@mail.ru
    * http://www.stopforumspam.com/api?username=MariFoogwoogy
    *
	* combined
	*  http://www.stopforumspam.com/api?email=g2fsehis5e@mail.ru&ip=91.186.18.61
	
	*/
	// get the options
	$options=kpg_sp_get_option();
	if (empty($options)||!is_array($options)) $options=array();
	// cache bad cases
	$badips=array();
	$badems=array();
	$wlist=array();
	$hist=array();
	$honeyapi='';
	$botscoutapi='';
	$spcount=0;
	$spmcount=0;
	$accept='Y';
	$nobuy='N';
	$chkemail='Y';
	
	$sfsfreq=0;
	$hnyage=9999;
	$botfreq=0;
	$sfsage=9999;
	$hnylevel=5;
	$botage=9999;
	$blog=1;
	global $blog_id;
	if (isset($blog_id)) {
		$blog=$blog_id;
	}
	
	// apply the options array
	extract($options);
	if (array_key_exists('sphist',$options)) { // no longer use this - get rid of it
		unset($options['sphist']);
		unset($sphist);
		kpg_sp_update_option($options);
	}
	if (array_key_exists('gdems',$options)) { // no longer use this - get rid of it
		unset($options['gdems']);
		unset($gdems);
		kpg_sp_update_option($options);
	}
	if (!is_array($badips)) $badips=array();
	if (!is_array($badems)) $badems=array();
	if (!is_array($hist)) $hist=array();
	if (!is_array($wlist)) $wlist=array();
	if (empty($honeyapi)) $honeyapi='';
	if (empty($botscoutapi)) $botscoutapi='';
	if (empty($apikey)) $apikey='';
	
	if (!is_numeric($spcount)) $spcount=0;
	if (!is_numeric($spmcount)) $spmcount=0;
	if ($nobuy!='Y') $nobuy='N';

	// clean cache - get rid of older cache items. Need to recheck to see if they have appeared on stopfurumspam
	$badems=kpg_clear_old_cache($badems);
	$badips=kpg_clear_old_cache($badips);
	while(count($hist)>25) {
		array_shift($hist);
	}
	
	// clean up history
	$now=date('Y/m/d H:i:s');
	$ip=$_SERVER['REMOTE_ADDR']; 
	// cleanup the input that is breaking the serialize functions here (I hope)
	
	$em=sanitize_email(strip_tags($email));
	$em=sanitize_text_field($em);
	$em=remove_accents($em);
	
	$author=sanitize_text_field($author);
	$author=remove_accents($author);
	// think of other things that might kill the serialize functions
	if (strlen($author)>32) $author=substr($author,0,29).'...';
	// set up hist channel
	$hist[$now]=array($ip,mysql_real_escape_string($em),mysql_real_escape_string($author),$sname,'begin',$blog);
	$accept_head=false; 
	if (array_key_exists('HTTP_ACCEPT',$_SERVER)) $accept_head=true; // real browsers send HTTP_ACCEPT
	// first check the ip address
	if (in_array($ip,$wlist)) {
	    $hist[$now][4]='White List IP';
		$options['hist']=$hist;
		kpg_sp_update_option($options);
		sfs_errorsonoff('off');
		return $email;
	}
	if (in_array($email,$wlist)) {
	    $hist[$now][4]='White List EMAIL';
		$options['hist']=$hist;
		kpg_sp_update_option($options);
		sfs_errorsonoff('off');
		return $email;
	}

	//kpg_logit(" '$email', '$username', '$ip' \r\n"); // turn on only during debugging
	
	// check the data
	$deny=false;
	// build the check
	// check to see if the results have been cached
	if (!$deny&&array_key_exists($em,$badems)) {
		$badems[mysql_real_escape_string($em)]=date("Y/m/d H:i:s");
		$badips[$ip]=date("Y/m/d H:i:s");
		$deny=true;
		$whodunnit.='Cached bad email';
	} 
	if (strlen($email)>48) {
		$badems[mysql_real_escape_string($em)]=date("Y/m/d H:i:s");
		$deny=true;
		$whodunnit.='email too long to be real';
	}

	if (!$deny&&array_key_exists($ip,$badips)) {
		$badips[$ip]=date("Y/m/d H:i:s");
		$badems[mysql_real_escape_string($em)]=date("Y/m/d H:i:s");
		$whodunnit.='Cached bad ip';
		$deny=true;
	} 

	if (!$deny&&$accept=='Y'&&!$accept_head) {
		// no accept header - real browsers send the HTTP_ACCEPT header
		$whodunnit.='No Accept header;';
		$deny=true;
	}

	if (!$deny) {
		$query="http://www.stopforumspam.com/api?ip=$ip";
		if ($chkemail=='Y') {
			$query=$query."&email=$email";
		}
		$check=kpg_stop_sp_reg_getafile($query);
		if (substr($check,0,4)=="ERR:") {
			$whodunnit.=$check.', ';
		}
		//kpg_logit(" '$query', '$check' \r\n"); // turn on only during debugging
		$n=strpos($check,'<appears>yes</appears>');
		if ($n) {
			$k=strpos($check,'<lastseen>',$n);
			$k+=10;
			$j=strpos($check,'</lastseen>',$k);
			$lastseen=date('Y-m-d',time());
			if (($j-$k)>12&&($j-$k)<24) $lastseen=substr($check,$k,$j-$k); // should be about 20 characters
			$k=strpos($check,'<frequency>',$n);
			$k+=11;
			$j=strpos($check,'</frequency',$k);
			$frequency='9999';
			
			if (($j-$k)&&($j-$k)<7) $frequency=substr($check,$k,$j-$k); // should be a number greater than 0 and probably no more than a few thousand.
			// have freqency and lastseen date - make these options in next release
			// check freq and age
			if (($frequency>=$sfsfreq) && (strtotime($lastseen)>(time()-(60*60*24*$sfsage))) )   { 
			// frequency we got from the db, sfsfreq is the min we'll accept (default 0)
			// sfsage is the age in days. we get lastscene from
				$deny=true;
				$whodunnit.="SFS, $lastseen, $frequency;";
			}
		} 
	} 
	if (!$deny&&$honeyapi!='') {
		// do a further check on project honeypot here
		$lookup = $honeyapi . '.' . implode('.', array_reverse(explode ('.', $ip ))) . '.dnsbl.httpbl.org';
		$result = explode( '.', gethostbyname($lookup));
		if (count($result)>2) {
			if ($result[0] == 127) {
				// query successful
				// 127 is a good lookup
				//  [3] = type of threat - we are only interested in comment spam at this point - if user demand I will change.
				// [2] is the threat level. 25 is recommended
				// [1] is numbr of days since last report
				//if ($result[2]>25&&$result[3]==4) { // 4 - comment spam, threat level 25 is average. 
				if ($result[1]<$hnyage&&$result[2]>$hnylevel&&$result[3]>=4) { // 4 - comment spam, threat level 25 is average. 
					$deny=true;
					$whodunnit.='HTTP:bl, '.$result[1].', '.$result[2].', '.$result[3];
				} 
			} 
		}
	}
	if (!$deny&&$botscoutapi!='') {
		// try the ip on botscoutapi
	    $query="http://botscout.com/test/?ip=$ip&key=$botscoutapi";
		$check=kpg_stop_sp_reg_getafile($query);
		if (substr($check,0,4)=="ERR:") {
			$whodunnit.=$check.', ';
		}
		if(strpos($check,'|')) {
			$result=explode('|',$check);
			if (count($result)>2) {
				//  Y|IP|3 - found, type, database occurences
				if ($result[0]=='Y'&&$result[2]>$botfreq) {
					$deny=true;
					$whodunnit.='BotScout, '.$result[2];
				}
			}
		}
	}
	$hist[$now][4]=$whodunnit;
	// it appears that there is no problem with this login record as a good login
	if (!$deny) {
		$options['hist']=$hist;
		kpg_sp_update_option($options);
		sfs_errorsonoff('off');
		return $email;
	}
	
	// update the history files.
	// record the last few guys that have  tried to spam
	// add the bad spammer to the history list
	$spcount++;
	$spmcount++;
	$options['spcount']=$spcount;
	$options['spmcount']=$spmcount;
	// Cache the bad guy
	$badems[$em]=date("Y/m/d H:i:s");
	if (!empty($ip)) $badips[$ip]=date("Y/m/d H:i:s");
	// sort the array by date so that the most recent date is last
	$options['badips']=$badips;
	$options['badems']=$badems;
	$options['hist']=$hist;
	kpg_sp_update_option($options);
	sleep(2); // sleep for a few seconds to annoy spammers and maybe delay next hit on stopforumspam.com
	sfs_errorsonoff('off');
	return false;
}

function kpg_clear_old_cache($cache) {
	// the caches are an array that is limited to 30 users and 24 hours
	// it is int form of $cache[$key]=date;
	// unfortunately I made it date("Y/m/d H:i:s");
	// it was a mistake storing the string date in the array and someday I will fix it. But for now I need to 
	// sort by the string. I will brute force it to integer to get it done
	
	// sort the array by the time
	arsort($cache);
	while (count($cache)>25) {
		array_shift($cache);	
	}
	return $cache;
}


function kpg_stop_sp_reg_control()  {
// this is the display of information about the page.
	sfs_errorsonoff();
?>
<div class="wrap">
  <h2>Stop Spammers Plugin</h2>
<?php
	$options=kpg_sp_get_option();
	if (empty($options)||!is_array($options)) $options=array();
	// cache bad cases
	$badips=array();
	$badems=array();
	$wlist=array();
	$hist=array();
	$honeyapi='';
	$botscoutapi='';
	$spcount=0;
	$spmcount=0;
	$accept='Y';
	$nobuy='N';
	$chkemail='Y';
	$muswitch='N';
	
	$sfsfreq=0;
	$hnyage=9999;
	$botfreq=0;
	$sfsage=9999;
	$hnylevel=5;
	$botage=9999;
	
	// apply the options array
	extract($options);
	if (array_key_exists('sphist',$options)) { // no longer use this - get rid of it
		unset($options['sphist']);
		unset($sphist);
		kpg_sp_update_option($options);
	}
	if (array_key_exists('gdems',$options)) { // no longer use this - get rid of it
		unset($options['gdems']);
		unset($gdems);
		kpg_sp_update_option($options);
	}
	if (!is_array($badips)) $badips=array();
	if (!is_array($badems)) $badems=array();
	if (!is_array($hist)) $hist=array();
	if (!is_array($wlist)) $wlist=array();
	if (empty($honeyapi)) $honeyapi='';
	if (empty($botscoutapi)) $botscoutapi='';
	if (empty($apikey)) $apikey='';
	if (empty($muswitch)) $muswitch='N';
	if ($muswitch!='Y') $muswitch='N';
	if ($nobuy!='Y') $nobuy='N';

	if (!is_numeric($spcount)) $spcount=0;
	if (!is_numeric($spmcount)) $spmcount=0;
	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	$nonce='';
	if (array_key_exists('nonce',$_POST)) $nonce=$_POST['nonce'];

	
	if (array_key_exists('kpg_stop_spammers_control',$_POST)
			&&wp_verify_nonce($_POST['kpg_stop_spammers_control'],'kpgstopspam_update')) { 
		if (array_key_exists('kpg_stop_clear_cache',$_POST)) {
			// clear the cache
			unset($options['badips']);
			unset($options['badems']);
			kpg_sp_update_option($options);
			$badems=array();
			$badips=array();
			echo "<h2>Cache Cleared</h2>";
		}
		if (array_key_exists('kpg_stop_clear_hist',$_POST)) {
			// clear the cache
			unset($options['sphist']);
			unset($options['spcount']);
			unset($options['hist']);
			$hist=array();
			$sphist=array();
			$spcount=0;
			kpg_sp_update_option($options);
			echo "<h2>History Cleared</h2>";
		}
		if (array_key_exists('action',$_POST)) {
			// check the nonce
			//echo "got action<br/>";
			//echo $_POST['kpg_stop_spammers_control'];
			//echo "in action<br/>";
			
			if (array_key_exists('chkemail',$_POST)) {
				$chkemail=stripslashes($_POST['chkemail']);
			} else {
				$chkemail='N';
			}
			$options['chkemail']=$chkemail;
			if (array_key_exists('nobuy',$_POST)) {
				$nobuy=stripslashes($_POST['nobuy']);
			} else {
				$nobuy='N';
			}
			if ($nobuy!='Y') $nobuy='N';
			if (array_key_exists('accept',$_POST)) {
				$accept=stripslashes($_POST['accept']);
			} else {
				$accept='N';
			}
			$options['accept']=$accept;
			$options['nobuy']=$nobuy;
			if (array_key_exists('apikey',$_POST)) $apikey=stripslashes($_POST['apikey']);
			$options['apikey']=$apikey;
			if (array_key_exists('honeyapi',$_POST)) $honeyapi=stripslashes($_POST['honeyapi']);
			$options['honeyapi']=$honeyapi;
			if (array_key_exists('botscoutapi',$_POST)) $botscoutapi=stripslashes($_POST['botscoutapi']);
			$options['botscoutapi']=$botscoutapi;
			if (array_key_exists('wlist',$_POST)) {
				$wlist=stripslashes($_POST['wlist']);
			    $wlist=str_replace("\r\n","\n",$wlist);
			    $wlist=str_replace("\r","\n",$wlist);
				$wlist=explode("\n",$wlist);
				$options['wlist']=$wlist;				
				for ($k=0;$k<count($wlist);$k++) {
					$wlist[$k]=trim($wlist[$k]);
				}	
			}
			// update the freq and age options
			if (array_key_exists('sfsfreq',$_POST)) $sfsfreq=trim(stripslashes($_POST['sfsfreq']));
			if (array_key_exists('hnyage',$_POST)) $hnyage=trim(stripslashes($_POST['hnyage']));
			if (array_key_exists('botfreq',$_POST)) $botfreq=trim(stripslashes($_POST['botfreq']));
			if (array_key_exists('sfsage',$_POST)) $sfsage=trim(stripslashes($_POST['sfsage']));
			if (array_key_exists('hnylevel',$_POST)) $hnylevel=trim(stripslashes($_POST['hnylevel']));
			if (array_key_exists('botage',$_POST)) $botage=trim(stripslashes($_POST['botage']));
			if (array_key_exists('muswitch',$_POST)) $muswitch=trim(stripslashes($_POST['muswitch']));
			// check for numerics in the fields
			if (!is_numeric($sfsfreq)) $sfsfreq=0; 
			if (!is_numeric($hnyage)) $hnyage=0;
			if (!is_numeric($botfreq)) $botfreq=0; 
			if (!is_numeric($hnylevel)) $hnylevel=5;
			if (!is_numeric($botage)) $botage=9999; 
			if (!is_numeric($sfsage)) $sfsage=9999;	
			$options['sfsfreq']=$sfsfreq;
			$options['hnyage']=$hnyage;
			$options['botfreq']=$botfreq;
			$options['sfsage']=$sfsage;
			$options['hnylevel']=$hnylevel;
			$options['botage']=$botage;
			if (empty($muswitch)) $muswitch='N';
			if ($muswitch!='Y') $muswitch='N';
			$options['muswitch']=$muswitch;
			
			
			kpg_sp_update_option($options);
			echo "<h2>Options Updated</h2>";
		}
		extract($options);
	}
	if (function_exists('is_multisite') && is_multisite()) {
		global $blog_id;
		if (!isset($blog_id)||$blog_id!=1) {
			if ($muswitch=='Y') {
				?>
  <h3>Stop Spammers is configured so that settings are available only on the Main Blog.</h3>
				<?php
				return;
			}		
		}
	}
   $nonce=wp_create_nonce('kpgstopspam_update');
	if ($spmcount>0) {
?>
  <h3>Stop Spammers has stopped <?php echo $spmcount; ?> spammers since installation</h3>
<?php 
	} 
	$num_comm = wp_count_comments( );
	$num = number_format_i18n($num_comm->spam);
	if ($num_comm->spam>0) {	
?>
  <p>There are <a href='edit-comments.php?comment_status=spam'><?php echo $num; ?></a> spam comments waiting for you to report them</p>
<?php 
	}
?>
  	<p style="font-weight:bold;">The Stop Spammers Plugin is installed and working correctly.</p>
<p>This plugin checks against StopForumSpam.com, Project Honeypot and BotScout to to prevent spammers from registering or making comments.
</p>

<p>The Stop Spammer Registrations plugin works by checking the IP address, email and user id of anyone who tries to register, login, or leave a comment. This effectively blocks spammers who try to register on blogs or leave spam. It checks a users credentials against up to three databases: <a href="http://www.stopforumspam.com/">Stop Forum Spam</a>, <a href="http://www.projecthoneypot.org/">Project Honeypot</a>, and <a href="http://www.botscout.com/">BotScout</a>. In order to use the Project HoneyPot or BotScout spam databases you will need to register at those sites and get a free API key. Stop Forum Spam does not require a key so this plugin will work immediately without a key. The API key for Stop Forum Spam is only used for reporting spam.</p>
<p>
The Stop Spammer Registrations plugin keeps track of the last 25 spammer emails and IP addresses in a cache to avoid pinging databases more often than necessary. The results of the last 25 checks are saved and displayed. </p><p>
In case a user check results in a false positive on one of the spam databases there is a white list where email address or IP addresses can be entered. This will allow such users to register, login and comment on the bog.</p><p>
Requirements: The plugin uses the WP_Http class to query the spam databases. Normally, if WordPress is working, then this class can access the databases. If, however, the system administrator has turned off the ability to open a url, then the plugin will not work. Sometimes placing a php.ini file in the blog&rsquo;s root directory with the line &ldquo;allow_url_fopen=On&rdquo; will solve this.</p>
<?php
	if ($nobuy=='N') {
?>
<div style="position:relative;float:right;width:40%;background-color:ivory;border:#333333 medium groove;padding-left:6px;">
 <p>This plugin is free and I expect nothing in return. If you would like to support my programming, you can buy my book of short stories.</p><p>Some plugin authors ask for a donation. I ask you to spend a very small amount for something that you will enjoy. eBook versions for the Kindle and other book readers start at 99&cent;. The book is much better than you might think, and it has some very good science fiction writers saying some very nice things. <br/>
 <a target="_blank" href="http://www.amazon.com/gp/product/1456336584?ie=UTF8&tag=thenewjt30page&linkCode=as2&camp=1789&creative=390957&creativeASIN=1456336584">Error Message Eyes: A Programmer's Guide to the Digital Soul</a></p>
 <p>A link on your blog to one of my personal sites would also be appreciated.</p>
 <p><a target="_blank" href="http://www.WestNyackHoney.com">West Nyack Honey</a> (I keep bees and sell the honey)<br />
	<a target="_blank" href="http://www.cthreepo.com/blog">Wandering Blog </a> (My personal Blog) <br />
	<a target="_blank" href="http://www.cthreepo.com">Resources for Science Fiction</a> (Writing Science Fiction) <br />
	<a target="_blank" href="http://www.jt30.com">The JT30 Page</a> (Amplified Blues Harmonica) <br />
	<a target="_blank" href="http://www.harpamps.com">Harp Amps</a> (Vacuum Tube Amplifiers for Blues) <br />
	<a target="_blank" href="http://www.blogseye.com">Blog&apos;s Eye</a> (PHP coding) <br />
	<a target="_blank" href="http://www.cthreepo.com/bees">Bee Progress Beekeeping Blog</a> (My adventures as a new beekeeper) </p>
</div>
<?php
	}
?>
<p>The Stop Spammer Registrations plugin is ON when it is installed and enabled. To turn it off just disable the plugin from the plugin menu.. </p>
<p>The Stop Spammer Registrations plugin keeps a count of the spammers that it has blocked and displays this on the WordPress dashboard. It also displays the last 25 hits on email or IP and it also shows a history of the last 25 times it has made a check, showing rejections, passing emails and errors. When there is data to display there will also be a button to clear out the data.</p>
<p>The plugin will also reject registrations, comments and pings where the HTTP_ACCEPT header is missing. This header is present in all browsers and its absence indicates that a program, not a human, is attempting to leave spam.</p>
<p>If you are running a networked WPMU system of blogs, you can optionally control this plugin from the control panel of the main blog. By checking the &ldquo;Networked ON&rdquo; radio button, the individual blogs will not see the options page. The API keyes will only have to entered in one place and the history will only appear in one place, making the plugin easier to use for administrating many blogs. The comments, however, still must be maintained from each blog. The Network buttons only appear if you have a Networked installation.</p>
<p>The Stop Spammer Registrations plugin adds links to the Comment Moderation page to check a comment's credentials agains the spam databases. If you have entered the Stop Forum Spam API key you can also report the spammer to the SFS database. Please make sure that the comment is actually spam and not from some clueless commentor who likes to salt his comments with spammy links. (I find that comments that do not specifically reference the post are always spam.)</p>
<p> StopForumSpam.com limits checks to 10,000 per day for each IP so the plugin may stop validating on very busy sites. I have not seen this happen, yet.</p>
<p> You may see your own email in the cache as spammers try to use it to leave comments. You may have to white list your own email if that is the case, to keep the plugin from locking you out.</p>
<p>Watch the <a href="http://www.youtube.com/watch?v=EKrUX0hHAx8" target="_blank">youtube spam trap video</a>! The video shows one of my plugins that anti-spam cops use. They run honey pots or sites that do nothing but attract spammers. These sites report as many as 500 spammers per hour to the same database that this plugin checks. </p>
<hr/>
<h4>For questions and support please check my website <a href="http://www.blogseye.com/i-make-plugins/stop-spammer-registrations-plugin/">BlogsEye.com</a>.</h4>
 <p>
  <form method="post" action="">
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="kpg_stop_spammers_control" value="<?php echo $nonce;?>" />
	<?php
		if (function_exists('is_multisite') && is_multisite()) {
	?>
	<fieldset style="width:95%;border: #888888 thin groove;margin-left:auto;margin-right:auto;padding-left:6px;"><legend>Network Blog Option</legend>
    Select how you want to control options in a networked blog environment: <br />
	  Networked ON:
		  <input name="muswitch" type="radio" value='Y'  <?php if ($muswitch=='Y') echo "checked=\"true\""; ?> /> 
		  | Networked OFF:
		  <input name="muswitch" type="radio" value='N' <?php if ($muswitch!='Y') echo "checked=\"true\""; ?>  /> 
	<br />
    If you are running WPMU and want to control all options and logs through the main log admin panel, select on. 
	</fieldset>
	<br/>
	<?php
		}
	?>
	<fieldset style="width:95%;border: #888888 thin groove;margin-left:auto;margin-right:auto;padding-left:6px;"><legend>API Keys</legend>
   Your StopForunSpam.com API Key:
      <input size="32" name="apikey" type="text" value="<?php echo $apikey; ?>"/>
      (optional)
    <br/>Project Honeypot API Key:
      <input size="32" name="honeyapi" type="text" value="<?php echo $honeyapi; ?>"/>
      (For HTTP:bl blacklist lookup, if not blank)
     <br/>BotScout API Key:
      <input size="32" name="botscoutapi" type="text" value="<?php echo $botscoutapi; ?>"/>
      (For BotScout.com lookup, if not blank)
	</fieldset>
	<br/>
	<fieldset style="width:95%;border: #888888 thin groove;margin-left:auto;margin-right:auto;padding-left:6px;"><legend>Spam Limits</legend>
	You can set the minimum settings to allow possible spammers to use your site. <br/>
    <br/>
    You may wish to forgive spammers with few incidents or no recent activity. I would recommend that to be on the safe side you should block users who appear on the spam database unless they specifically ask to be white listed. Allowed values are 0 to 9999. Only numbers are accepted.
	<br />
	<br/>
	Deny spammers found on Stop Forum Span with more than 
	<input size="3" name="sfsfreq" type="text" value="<?php echo $sfsfreq; ?>"/> incidents, and occuring less than <input size="4" name="sfsage" type="text" value="<?php echo $sfsage; ?>"/> days ago. 
	<br/>
	<br/>Deny spammers found on Project HoneyPot with incidents less than <input size="3" name="hnyage" type="text" value="<?php echo $hnyage; ?>"/> days ago, and with more than <input size="4" name="hnylevel" type="text" value="<?php echo $hnylevel; ?>"/> threat level. (25 threat level is average, threat level 5 is fairly low.) 
	<br/>
	<br/>Deny spammers found on BotScout with more than <input size="3" name="botfreq" type="text" value="<?php echo $botfreq; ?>"/> incidents. 
	</fieldset>
	<br/>
	<fieldset style="width:95%;border: #888888 thin groove;margin-left:auto;margin-right:auto;padding-left:6px;"><legend>Other Checks</legend>
     Block Spam missing the HTTP_ACCEPT header:
      <input name="accept" type="checkbox" value="Y" <? if ($accept=='Y') echo  'checked="true"';?>/>
      Blocks users who have incomplete headers. (optional)
    <br/><br/>Check email address in addition to IP at StopForumSpam:
      <input name="chkemail" type="checkbox" value="Y" <? if ($chkemail=='Y') echo  'checked="true"';?>/>
      Most spammers use random, faked or other people's email. (optional)
	  <br/><br/>White List - put IP address or emails here that you don't want blocked. One email or IP to a line.<br/>
<textarea style="border:medium solid #66CCFF;" name="wlist" cols="40" rows="8"><?php 
    for ($k=0;$k<count($wlist);$k++) {
		echo $wlist[$k]."\r\n";
	}
	?>
</textarea>	 
	 </p>
    </fieldset>
	<br/>
	<fieldset style="width:95%;border: #888888 thin groove;margin-left:auto;margin-right:auto;padding-left:6px;">
	<legend>Remove &quot;Buy The Book&quot;</legend> 
		<input type="checkbox" name ="nobuy" value="Y" <?php if ($nobuy=='Y') echo 'checked="true"'; ?> > 
		<?php 
		if ($nobuy=='Y')  {
			echo "Thanks";		
		} else {
		?>
		Check if you are tired of seeing the <a target="_blank" href="http://www.amazon.com/gp/product/1456336584?ie=UTF8&tag=thenewjt30page&linkCode=as2&camp=1789&creative=390957&creativeASIN=1456336584">Buy Keith's Book</a> links. 
	 <?php 
		}
	?>
    </fieldset>
	<br/>
	<p class="submit"><input class="button-primary" value="Save Changes" type="submit"></p>

  </form>
  <p>&nbsp;</p>

  
  
  <?php
	
?>
<p><a href="#" onclick="window.location.href=window.location.href;return false;">Refresh</a></p>
<?php
	if (count($hist)==0 || $spcount==0) {
		echo "<p>No Activity Recorded.</p>";
	} else {
  ?>
  <hr/>
  <h3>Recent Activity (last 25)</h3>
  <form method="post" action="">
    <input type="hidden" name="kpg_stop_spammers_control" value="<?php echo $nonce;?>" />
    <input type="hidden" name="kpg_stop_clear_hist" value="true" />
    <input value="Clear Recent Activity" type="submit">
  </form>
  </p>
		<p><?php echo $spcount; ?> spammers stopped since last reset</p>
		<table style="background-color:#eeeeee;" cellspacing="2">
		<tr style="background-color:ivory;text-align:center;"><td>date/time</td><td>email</td><td>IP</td><td>user id</td><td>script</td><td>reason
<?php
	if (function_exists('is_multisite') && is_multisite()) {
?>		
		</td><td>blog</td>
<?php
}
?>		
		</tr>
<?php
		foreach($hist as $key=>$data) {
			//$hist[$now]=array($ip,$email,$author,$sname,'begin');
			$em=strip_tags(trim($data[1]));
			$dt=strip_tags($key);
			$ip=$data[0];
			$au=strip_tags($data[2]);
			$id=strip_tags($data[3]);
			if (empty($au)) $au='none';
			$reason=$data[4];
			$blog=1;
			if (count($data)>5) $blog=$data[5];
			if (empty($blog)) $blog=1;
			if(empty($reason)) $reason="passed";
			if (!empty($em)) {
				echo "<tr style=\"background-color:white;\">
					<td style=\"font-size:.8em;padding:2px;\">$dt</td>
					<td style=\"font-size:.8em;padding:2px;\">$em</td>
					<td style=\"font-size:.8em;padding:2px;\">$ip</td>
					<td style=\"font-size:.8em;padding:2px;\">$au</td>
					<td style=\"font-size:.8em;padding:2px;\">$id</td>
					<td style=\"font-size:.8em;padding:2px;\">$reason</td>";
				if (function_exists('is_multisite') && is_multisite()) {
				    $blogname=get_blog_option( $blog, 'blogname' );
					$blogadmin=esc_url( get_admin_url($blog) );
					echo "<td style=\"font-size:.8em;padding:2px;\" align=\"center\"><a href=\"$blogadmin/edit-comments.php?comment_status=spam\">$blogname</a></td>";
				}
				echo "</tr>";
			}
		}
	?>
		</table>
<?php
		
	
   }
   if (count($badems)==0&&count($badips)==0) {
?>
 	<p>Nothing in the cache.</p>
  
<?php
   } else {
?>
  <h3>Cached Values (last 25)</h3>
  <table><tr><td>
  <form method="post" action="">
    <input type="hidden" name="kpg_stop_spammers_control" value="<?php echo $nonce;?>" />
    <input type="hidden" name="kpg_stop_clear_cache" value="true" />
    <input value="Clear the Cache" type="submit">
  </form>
  </td></tr></table>
  <table align="center" width="95%"  >
    <tr>
      <td width="35%" align="center">Rejected Emails</td>
      <td width="30%" align="center">Rejected IPs</td>
    </tr>
    <tr>
      <td style="border:1px solid black;font-size:.75em;padding:3px;" valign="top"><?php
		foreach ($badems as $key => $value) {
			//echo "$key; Date: $value<br/>\r\n";
			$key=urldecode($key);
			echo "<a href=\"http://www.stopforumspam.com/search?q=$key\" target=\"_stopspam\">$key: $value</a><br/>";
		}
	?></td>
      <td  style="border:1px solid black;font-size:.75em;padding:3px;" valign="top"><?php
		foreach ($badips as $key => $value) {
			//echo "$key; Date: $value<br/>\r\n";
			echo "<a href=\"http://www.stopforumspam.com/search?q=$key\" target=\"_stopspam\">$key: $value</a><br/>";
		}
	?></td>
    </tr>
  </table>
  <?PHP
    }
	
?>
  <hr/>
</div>
<?php
	sfs_errorsonoff('off');

}
function kpg_stop_sp_reg_check($actions,$comment) {
	$email=urlencode($comment->comment_author_email);
	$ip=$comment->comment_author_IP;
	$action="<a title=\"Check Stop Forum Spam (SFS)\" target=\"_stopspam\" href=\"http://www.stopforumspam.com/search.php?q=$ip\">Check SFS</a> |
	 <a title=\"Check Project HoneyPot\" target=\"_stopspam\" href=\"http://www.projecthoneypot.org/search_ip.php?ip=$ip\">Check proj HoneyPot</a>";
	$actions['check_spam']=$action;
	return $actions;
}
function kpg_stop_sp_reg_report($actions,$comment) {
	// need to add a new action to the list
	$options=kpg_sp_get_option();
	if (empty($options)) $options=array();
	if (!is_array($options)) $options=array();
	$apikey='';
	if (array_key_exists('apikey',$options)) $apikey=$options['apikey'];
	$honeyapi='';
	if (array_key_exists('honeyapi',$options)) $honeyapi=$options['honeyapi'];
	$botscoutapi='';
	if (array_key_exists('botscoutapi',$options)) $botscoutapi=$options['botscoutapi'];
    
	$email=urlencode($comment->comment_author_email);
	if (empty($email)) return $actions;
	$uname=urlencode($comment->comment_author);
	$ip=$comment->comment_author_IP;
	// code added as per Paul at sto Forum Spam
	$content=$comment->comment_content;
	
	$evidence=$comment->comment_author_url;
	if (empty($evidence)) $evidence='';
	preg_match_all('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@',$content, $post, PREG_PATTERN_ORDER);
	if (is_array($post)&&is_array($post[1])) $urls1 = array_unique($post[1]); else $urls1 = ''; 
	//bbcode
	preg_match_all('/\[url=(.+)\]/iU', $content, $post, PREG_PATTERN_ORDER);
	if (is_array($post)&&is_array($post[0])) $urls2 = array_unique($post[0]); else $urls2 = ''; 
    if (is_array($urls1)) $evidence.="\r\n".implode("\r\n",$urls1);	
    if (is_array($urls2)) $evidence.="\r\n".implode("\r\n",$urls2);	
	
	$evidence=urlencode(trim($evidence,"\r\n"));
	$action="<a title=\"Report to Stop Forum Spam (SFS)\"target=\"_stopspam\" href=\"http://www.stopforumspam.com/add?username=$uname&email=$email&ip_addr=$ip&evidence=$evidence&api_key=$apikey\">Report to SFS</a>";
	$actions['report_spam']=$action;
	return $actions;

}


function kpg_stop_sp_reg_init() {
	// we need to find out if it is OK to add the init
	if(!current_user_can('manage_options')) return;
	
	$options=kpg_sp_get_option();
	if (empty($options)) $options=array();
	if (!is_array($options)) $options=array();
	$muswitch='Y';
	if (array_key_exists('muswitch',$options)) $muswitch=$options['muswitch'];
	
	if (function_exists('is_multisite') && is_multisite()) {
		add_action('mu_rightnow_end','kpg_sp_rightnow');
	} 
	global $blog_id;
	if (!isset($blog_id)||$blog_id==1) {
		add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options',__FILE__,'kpg_stop_sp_reg_control');
		add_filter('comment_row_actions','kpg_stop_sp_reg_check',1,2);	
		add_filter('comment_row_actions','kpg_stop_sp_reg_report',1,2);	
		add_action('rightnow_end', 'kpg_sp_rightnow');
		add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );

		return;
	}
	if ($muswitch!='Y') return; // we are already not at blog 1 so if wpmu switch is Y get out and don't show options.
	add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options',__FILE__,'kpg_stop_sp_reg_control');
	add_filter('comment_row_actions','kpg_stop_sp_reg_check',1,2);	
	add_filter('comment_row_actions','kpg_stop_sp_reg_report',1,2);	
	add_action('rightnow_end', 'kpg_sp_rightnow');
	add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
	
	return;

}
// stolen from akismet
function kpg_sp_plugin_action_links( $links, $file ) {
	if ( basename($file) == basename(__FILE__))  {
		$me=admin_url('options-general.php?page='.plugin_basename(__FILE__));
		$links[] = "<a href=\"$me\">".__('Settings').'</a>';
	}

	return $links;
}

// stolen from cets

function kpg_stop_sp_siteadmin_page(){
 // don't restrict this to site admins, because it throws an error if non site admins go to the URL. Instead, control it wtih the site admin test at the next level
	if (function_exists('is_network_admin')) {
		//3.1+
		add_submenu_page('settings.php', 'Stop Spammers', 'Stop Spammers', 'manage_sites', 'kpg_stop_sp_reg_control', 'kpg_stop_sp_reg_control');
	} else {
		//-3.1
		add_submenu_page('ms-admin.php', 'Stop Spammers', 'Stop Spammers', 'manage_sites', 'kpg_stop_sp_reg_control', 'kpg_stop_sp_reg_control');
	}
 }
if (function_exists('is_network_admin')) {
	//3.1+
	add_action('network_admin_menu', 'kpg_stop_sp_siteadmin_page');
} else {
	//-3.1
	add_action('admin_menu', 'kpg_stop_sp_siteadmin_page');
}

  
function kpg_stop_sp_reg_uninstall() {
	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	kpg_sp_delete_option(); 
	return;
}  

// hook the comment list with a "report Spam" filater
	add_action('admin_menu', 'kpg_stop_sp_reg_init');
	add_action('network_admin_menu', 'kpg_stop_sp_reg_init');


if ( function_exists('register_uninstall_hook') ) {
	register_uninstall_hook(__FILE__, 'kpg_stop_sp_reg_uninstall');
}


function kpg_stop_sp_reg_getafile($f) {
	// try this using Wp_Http
	if( !class_exists( 'WP_Http' ) )
		include_once( ABSPATH . WPINC. '/class-http.php' );
	$request = new WP_Http;
	$result = $request->request( $f );
	// see if there is anything there
	if (empty($result)) return '';
	
	if (is_array($result)) {
		$ansa=$result['body']; 
		return $ansa;
	}
	if (is_object($result) ) {
		$ansa='ERR: '.$result->get_error_message();
	}
	return '';
}

/***********************************************************************
*
*  kpg_sp_get_option() and kpg_sp_update_option()
*
*	These are use to get and set options in WPMU 
*	It may be that the admin doesn't want the users to see
*   the options and stats
*
***********************************************************************/
$kpg_sp_wpmu=''; // bad programing form, but I would like to avoid a db hit here
function kpg_sp_get_option() {
	global $kpg_sp_wpmu;
	$op='kpg_stop_sp_reg_options';
	if ($kpg_sp_wpmu=='N') {
		return get_option($op);
	}
	if  ($kpg_sp_wpmu=='Y') {
		switch_to_blog(1);
		$ansa=get_option( $op );
		if (empty($ansa)) $ansa=array();
		if (!is_array($ansa)) $ansa=array();
		restore_current_blog();
		return $ansa;
	}
	// check to see if we are in an MU envoronment
	if (function_exists('is_multisite') && is_multisite()) {
		$kpg_sp_wpmu='Y';
		switch_to_blog(1);
		$ansa=get_option( $op );
		if (empty($ansa)) $ansa=array();
		if (!is_array($ansa)) $ansa=array();
		// now we have to see if the mu option is set to 'Y'
		$muswitch='N';
		if (array_key_exists('muswitch',$ansa)) $muswitch=$ansa['muswitch'];
		restore_current_blog();
		if ($muswitch=='Y') return $ansa;
	}
	$kpg_sp_wpmu='N';
	return get_option($op);
}
function kpg_sp_update_option($options) {
	global $kpg_sp_wpmu;
	$op='kpg_stop_sp_reg_options';
	if ($kpg_sp_wpmu=='N') {
		return update_option($op, $options);	
	}
	if  ($kpg_sp_wpmu=='Y') {
		switch_to_blog(1);
		$ansa=update_option($op, $options);
		restore_current_blog();
		return $ansa;
	}
	if (function_exists('is_multisite') && is_multisite()) {
		$kpg_sp_wpmu='Y';
		switch_to_blog(1);
		// now we have to see if the mu option is set to 'Y'
		$muswitch='N';
		if (array_key_exists('muswitch',$options)) $muswitch=$options['muswitch'];
		if ($muswitch=='Y') {
			$ansa=update_option($op, $options);	
			restore_current_blog();
			return $ansa;
		}
		// if we are here we do not use the mast blog for data.
		// but we have to update the master blog to tell it to use the local
		$ansa=update_option($op, $options);	
		restore_current_blog();
		// go back and use the local blog
	}
	$kpg_sp_wpmu='N';
	return update_option($op, $options);	
}
function kpg_sp_delete_option() {
	global $kpg_sp_wpmu;
	$op='kpg_stop_sp_reg_options';
	// may leave some stray options around if the blog was not running wpmu aware for a while.
	if ($kpg_sp_wpmu=='N') {
		return delete_option($op);	
	}
	if  ($kpg_sp_wpmu=='Y') {
		switch_to_blog(1);
		$ansa=delete_option($op);
		restore_current_blog();
		return $ansa;
	}
	if (function_exists(is_multisite) && is_multisite()) {
		$kpg_sp_wpmu='Y';
		switch_to_blog(1);
		$ansa=delete_option($op);	
		restore_current_blog();
		return $ansa;
	}
	$kpg_sp_wpmu='N';
	return delete_option($op);	

}
// special request to add to "right now section of the admin page

// WP 2.5+
function kpg_sp_rightnow() {
 	$options=kpg_sp_get_option();
	if (empty($options)) $options=array();
	if (!is_array($options)) $options=array();
	$spmcount=0;
    if (array_key_exists('spmcount',$options)) $spmcount=$options['spmcount'];
 	if (!is_numeric($spmcount)) $spmcount=0;
	$nobuy='N';
	if (array_key_exists('nobuy',$options)) $nobuy=$options['nobuy'];
    if ($nobuy!='Y') $nobuy='N'; 
 		$me=admin_url('options-general.php?page='.plugin_basename(__FILE__));
   if ($spmcount>0) {
    // steal the akismet stats css format 
		// get the path to the plugin
		echo "<p class='akismet-right-now'><a style=\"font-style:italic\" href=\"$me\">Stop Spammer Registrations</a> has prevented $spmcount spammers from registering or leaving comments.";
		if ($nobuy=='N') echo "  <a style=\"font-style:italic\" href=\"http://www.blogseye.com/buy-the-book/\">Buy Keith Graham&apos;s Science Fiction Book</a>";
		echo"</p>";
	} else {
		echo "<p class='akismet-right-now'><a style=\"font-style:italic\" href=\"$me\">Stop Spammer Registrations</a> has not stopped any spammers, yet.";
		if ($nobuy=='N') echo "  <a style=\"font-style:italic\" href=\"http://www.blogseye.com/buy-the-book/\">Buy Keith Graham&apos;s Science Fiction Book</a>";
		echo"</p>";
	}
}


// used only during debugging - please ignore the man behind the curtain.
/* function kpg_logit($line) {
	$f=fopen('log.txt','a');
	fwrite($f,$line);
	fclose($f);
	return;

}
*/

// here are the debug functions
// change the debug=false to debug=true to start debugging.
// the plugin will drop a file sfs_debug_output.txt in the current directory (root, wp-admin, or network) 
// directory must be writeable or plugin will crash.

function sfs_errorsonoff($old=null) {
	$debug=false;  // change to tru to debug
	if (!$debug) return;
	if (empty($old)) return set_error_handler("sfs_ErrorHandler");
	restore_error_handler();
}
function sfs_ErrorHandler($errno, $errmsg, $filename, $linenum, $vars) {
	// write the answers to the file
	// we are only conserned with the errors and warnings, not the notices
	//if ($errno!=E_USER_ERROR && $errno!=E_USER_WARNING) return false;
	$serrno="";
	if ((strpos($filename,'stop-spammer-registrations')<1)&&(strpos($filename,'options-general.php')<1)) return false;
	switch ($errno) {
		case E_ERROR: 
			$serrno="Fatal run-time errors. These indicate errors that can not be recovered from, such as a memory allocation problem. Execution of the script is halted. ";
			break;
		case E_WARNING: 
			$serrno="Run-time warnings (non-fatal errors). Execution of the script is not halted. ";
			break;
		case E_NOTICE: 
			$serrno="Run-time notices. Indicate that the script encountered something that could indicate an error, but could also happen in the normal course of running a script. ";
			break;
		default;
			$serrno="Unknown Error type $errno";
	}
 
	$msg="
	Error number: $errno
	Error type: $serrno
	Error Msg: $errmsg
	File name: $filename
	Line Number: $linenum
	---------------------
	";
	// write out the error
	$f=fopen("sfs_debug_output.txt",'a');
	fwrite($f,$msg);
	fclose($f);
	return false;
}
	
?>
