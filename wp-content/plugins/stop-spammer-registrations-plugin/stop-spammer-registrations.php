<?PHP
/*
Plugin Name: Stop Spammer Registrations Plugin
Plugin URI: http://www.BlogsEye.com/
Description: The Stop Spammer Registrations Plugin checks against Spam Databases to to prevent spammers from registering or making comments.
Version: 3.2
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
global $current_user;
if ( empty( $current_user ) ) {
	//add_filter('is_email','kpg_sfs_reg_fixup');	// this hook is killing me!
	add_filter('user_registration_email','kpg_sfs_reg_fixup');	
	//add_filter('pre_user_email','kpg_sfs_reg_fixup');	
	// add the new hooks to stop signups and registrations
	add_filter('login_init','kpg_sfs_login_check');	
	add_filter('before_signup_form','kpg_sfs_login_check');	
	add_action('pre_comment_on_post','kpg_sfs_login_check');	
	add_filter('preprocess_comment','kpg_sfs_newcomment');	
	add_action('admin_init','kpg_sfs_login_check');
	add_action('xmlrpc_call','kpg_sfs_login_check');
} 

// make a function to unset all the hooks once a check to the db is done in order to prevent recusive checks
function kpg_sfs_reg_unhook() {
	//remove_filter( 'is_email', 'kpg_sfs_reg_fixup' );
	remove_filter( 'user_registration_email', 'kpg_sfs_reg_fixup' );
	//remove_filter( 'pre_user_email', 'kpg_sfs_reg_fixup' );
	// new hooks
	remove_filter( 'login_init', 'kpg_sfs_login_check' );
	remove_filter( 'before_signup_form', 'kpg_sfs_login_check' );
	remove_action( 'pre_comment_on_post', 'kpg_sfs_login_check' );
	remove_filter( 'preprocess_comment', 'kpg_sfs_newcomment');	
	remove_action( 'admin_init', 'kpg_sfs_login_check' );
	remove_action( 'xmlrpc_call', 'kpg_sfs_login_check' );
	return;
}



// check to see if this is an MU installation
if (function_exists('is_multisite') && is_multisite()) {
	// include the hook the get/set options so that it works for multisite
	// check the blog 1 options to see if we should hook the mu options
	$muswitch='Y';
	global $blog_id;
	if (isset($blog_id)&&$blog_id==1) {
		// no need to switch blogs
		$ansa=get_option('kpg_stop_sp_reg_options');
		if (empty($ansa)) $ansa=array();
		if (!is_array($ansa)) $ansa=array();
	} else {
		switch_to_blog(1);
		$ansa=get_option('kpg_stop_sp_reg_options');
		if (empty($ansa)) $ansa=array();
		if (!is_array($ansa)) $ansa=array();
		restore_current_blog();
	}
	if (array_key_exists('muswitch',$ansa)) $muswitch=$ansa['muswitch'];
	if ($muswitch!='N') $muswitch='Y';
	if ($muswitch=='Y') {
		include('includes/sfr-mu-options.php');
		kpg_ssp_global_setup();
	}
}
/************************************************************
* 	kpg_sfs_login_check()
*	
*	hooked from login, registration and comments forms.
*   This works differently than the email checks.
*   this looks up the IP address only and does a wp_die if 
*   there is a hit in the cache or one of the db sites
*
*************************************************************/
function kpg_sfs_login_check() {
	// there are multiple entry points.
	// Login check is hooked from the "PRE" forms and has no parameters
	// we start here gathering information and then passing it on to the full check with email, author and ip
	// prevent from running multiple times
	kpg_sfs_reg_unhook();
	if(is_user_logged_in()) {
		return; // I know that I checked it before, but check again
	}
	// get things from the post to pass to the check
	// see if they are sending an email
	$em='';
	if (array_key_exists('email',$_POST)) {
		$em=$_POST['email'];
	} else if (array_key_exists('user_email',$_POST)) {
		$em=$_POST['user_email'];
	} else if (array_key_exists('user_login',$_POST)) {
		$em=$_POST['user_login'];
	}
	if (strpos($em,'@')===false) { // not an email, but a username (or some other crap)
		$em='';
	}
	// see if they have an author or username
	$author='';
	if (array_key_exists('author',$_POST)) {
		$author=$_POST['author'];
	} else if (array_key_exists('user_name',$_POST)) {
		$author=$_POST['user_name'];
	}
	// get the ip 
	$ip=$_SERVER['REMOTE_ADDR'];
	$ip=check_forwarded_ip($ip);
	// now call the generic checker
	sfs_errorsonoff();
    $ansa=kpg_sfs_check($em,$author,$ip,'2');
	sfs_errorsonoff('off');
	return $ansa;
}
/************************************************************
* 	kpg_sfs_reg_fixup()
*	Hooked from is_email() 
*	this is called when the email must be returned
*************************************************************/
function kpg_sfs_reg_fixup($email) {
	kpg_sfs_reg_unhook();
	if(is_user_logged_in()) {
		return $email;
	}
	// we have only the email, need the author and ip
	$em=$email;
	if (empty($em)) {
		if (array_key_exists('email',$_POST)) {
			$em=$_POST['email'];
		} else if (array_key_exists('user_email',$_POST)) {
			$em=$_POST['user_email'];
		}
		if (strpos($em,'@')===false) { // not an email, but a username (or some other crap)
			$em='';
		}
	}
	// see if they have an author or username
	$author='';
	if (array_key_exists('author',$_POST)) {
		$author=$_POST['author'];
	} else if (array_key_exists('user_name',$_POST)) {
		$author=$_POST['user_name'];
	}
	// get the ip 
	$ip=$_SERVER['REMOTE_ADDR'];
	$ip=check_forwarded_ip($ip);
	sfs_errorsonoff();
    kpg_sfs_check($em,$author,$ip,'1');
	sfs_errorsonoff('off');

	return $email;
}
/************************************************************
* 	kpg_sfs_newcomment()
*	hooked from comments - have to return commmentdata
*
*************************************************************/
function kpg_sfs_newcomment($commentdata) {
	kpg_sfs_login_check();
	return $commentdata;
}



/************************************************************
* 	kpg_sfs_check()
*	This is the generic email check so that it can be called
*	from several different hooks
*   returns the email if good. Dies if bad
*
*************************************************************/
function kpg_sfs_check($email='',$author='',$ip,$src='3') {
	if(is_user_logged_in()) {
		return $email;
	}
	// some themes and plugins call is_email on every page and in admin. We'll ignore some of them
    $sname=$_SERVER["REQUEST_URI"];	
	if (empty($sname)) {
		$sname=$_SERVER["SCRIPT_NAME"];	
	}
	if (empty($sname)) {
		$sname=' none? ';
	}
	if (
		strpos($sname,'index.php')||
		strpos($sname,'archive.php')||
		strpos($sname,'archives.php')||
		strpos($sname,'links.php')||
		strpos($sname,'pages.php')||
		strpos($sname,'seach.php')||
		strpos($sname,'single.php')||
		strpos($sname,'page.php')
	) {
		return $email; // no check for the above files
	}

	$now=date('Y/m/d H:i:s',time() + ( get_option( 'gmt_offset' ) * 3600 ));
	$stats=kpg_sp_get_stats();
	extract($stats);
	$options=kpg_sp_get_options();
	extract($options);
	
	if ($chkcomments!='Y') {
		if (strpos($sname,'wp-comments-post.php')>0) return $email;
	}
	if ($chklogin!='Y') {
		if (strpos($sname,'wp-login.php')>0) return $email;
	}
	if ($chksignup!='Y') {
		if (strpos($sname,'wp-signup.php')>0) return $email;
	}
	if ($chkxmlrpc!='Y') {
		if (strpos($sname,'xmlrpc.php')>0) return $email;
	}
	
	
	// clean up cache and history	
	while (count($badips)>$kpg_sp_cache) array_shift($badips);
	while (count($badems)>$kpg_sp_cache) array_shift($badems);
	while (count($goodips)>2) array_shift($goodips);
	//$goodips=array(); // limiting good ips to just a few
	while (count($hist)>$kpg_sp_hist) array_shift($hist);
	$stats['badips']=$badips;
	$stats['badems']=$badems;
	$stats['goodips']=$goodips;
	$stats['hist']=$hist;

    $sname=$_SERVER["REQUEST_URI"];	
	if (empty($sname)) {
		$sname=$_SERVER["SCRIPT_NAME"];	
	}
	if (empty($sname)) {
		$sname=' none? ';
	}
	$blog='';
	if (function_exists('is_multisite') && is_multisite()) {
		global $blog_id;
		if (!isset($blog_id)||$blog_id!=1) {
			$blog=$blog_id;
		}
	}
	$email=trim($email);
	$email=strip_tags($email);
	$whodunnit='';
	// cleanup the input that is breaking the serialize functions here (I hope)
	$em=sanitize_email(strip_tags($email));
	$em=sanitize_text_field($em);
	$em=remove_accents($em);
	$em=utf8_decode($em);
	$em=really_clean($em);
	$author=sanitize_text_field($author);
	$author=remove_accents($author);
	$author=utf8_decode($author);
	$author=really_clean($author);
	// think of other things that might kill the serialize functions
	if (strlen($author)>80) $author=substr($author,0,77).'...';
	if (strlen($em)>80) $em=substr($em,0,80).'...';
	// set up hist channel
	$hist[$now]=array($ip,mysql_real_escape_string($em),mysql_real_escape_string($author),$sname,'begin',$blog);
	//$accept_head=false; 
	//if (array_key_exists('HTTP_ACCEPT',$_SERVER)) $accept_head=true; // real browsers send HTTP_ACCEPT
	// first check the ip address
	
	// check all of the ones that do not require file access
	$deny=false;
	// check whitelists and caches
	
	if (!$deny&&(array_search($ip,$wlist))) {
	    $hist[$now][4]='White List IP';
		$stats['hist']=$hist;
		update_option('kpg_stop_sp_reg_stats',$stats);
		return $email;
	}
	if (!$deny&&!empty($em)&&kpg_sp_searchi($em,$wlist)) {
	    $hist[$now][4]='White List EMAIL';
		$stats['hist']=$hist;
		update_option('kpg_stop_sp_reg_stats',$stats);
		return $email;
	}
	$admin_email = get_settings('admin_email');
	if ($admin_email==$em) {
		//return $email; // whitelist admin email - probably not a good idea
	}
	// check to see if the ip is in the goodips cache
	if (!$deny&&kpg_sp_searchi($ip,$goodips)) {
	    $hist[$now][4]='Cached good ip';
		$stats['hist']=$hist;
		update_option('kpg_stop_sp_reg_stats',$stats);
		return $email;
	}
	
	// try checking to see if there is a referrer
	if (!$deny&&$chkreferer=='Y'&&!empty($_POST)) {
		// someone is sending a post. Therefore the referer must be from our site.
		$ref='';
		if (array_key_exists('HTTP_REFERER',$_SERVER)) {
			$ref=$_SERVER['HTTP_REFERER'];
		}
	    // check to see if our domain is found in the referer
		$host=$_SERVER['HTTP_HOST'];
		if (empty($ref)||strpos($ref,$host)===false) {
			// bad referer
			$whodunnit.='Bad or Missing HTTP_REFERER';
			$deny=true;
		}
	}
    // getting a lot of huge author names
	if (!$deny && $chklong=='Y' && strlen($author)>64) {
			$whodunnit.='long author name '.strlen($author);
			$deny=true;
	}
	// check to see if the results have been cached
	// These are the simple email checks
	if (!empty($em) && !$deny) {
		if (!$deny && array_key_exists($em,$badems)) {
			if (!empty($em)) $badems[mysql_real_escape_string($em)]=$now;
			$badips[$ip]=$now;
			$deny=true;
			$whodunnit.='Cached bad email';
		} 
		if (!$deny && $chklong=='Y' && strlen($em)>64) {
			$badems[mysql_real_escape_string($em)]=$now;
			$deny=true;
			$whodunnit.='email too long';
		}
		if (!$deny && $chkdisp=='Y') {
			$ansa=kpg_check_disp($em);
			if ($ansa) {
				$deny=true;
				$whodunnit.='Disposable em:'.$em;
			}
		}
	}
	// simple ip checks
	if (!$deny && kpg_sp_searchi($ip,$blist)) {
	    $whodunnit.='Black List IP';
		$deny=true;
	}
	if (!$deny && !empty($em) && kpg_sp_searchi($em,$blist)) {
	    $whodunnit.='Black List EMAIL';
		$deny=true;
	}
	if (!$deny&&array_key_exists($ip,$badips)) {
		$whodunnit.='Cached bad ip';
		$deny=true;
	} 
	$accept_head=false; 
	if (array_key_exists('HTTP_ACCEPT',$_SERVER)) $accept_head=true; // real browsers send HTTP_ACCEPT
	if (!$deny&&$accept=='Y'&&!$accept_head) {
		// no accept header - real browsers send the HTTP_ACCEPT header
		$whodunnit.='No Accept header;';
		$deny=true;
	}
	// Ubiquity servers rent their servers to spammers and should be blocked
	if (!$deny&&$chkubiquity=='Y') {
		$ansa=kpg_check_ubiquity($ip);
		if ($ansa!==false) {
				$deny=true;
				$whodunnit.=$ansa;
		}
	}
	// try akismet
	if (!$deny&&$chkakismet=='Y'&&(strpos($sname,'login.php')||strpos($sname,'register.php')||strpos($sname,'signup.php'))) { 
		$ansa=kpg_akismet_check($ip);
		if ($ansa) {
				$deny=true;
				$whodunnit.='Akismet';
		}
	}
	// here is the database lookups section. Simple checks did not work. We need to do a lookup
	if (!$deny && $chksfs=='Y' ) { 
		$query="http://www.stopforumspam.com/api?ip=$ip";
		if ($chkemail=='Y'&&!empty($em)) {
			$query=$query."&email=$em";
		}
		$check='';
		$check=kpg_sfs_reg_getafile($query);
		if (!empty($check)) {
			if (substr($check,0,4)=="ERR:") {
				$whodunnit.=$check.', ';
			}
			$lastseen='';
			$frequency='';
			$n=strpos($check,'<appears>yes</appears>');
			if ($n!==false) {
			    if (strpos($check,'<lastseen>',$n)!==false) {
					$k=strpos($check,'<lastseen>',$n);
					$k+=10;
					$j=strpos($check,'</lastseen>',$k);
					$lastseen=date('Y-m-d',time() + ( get_option( 'gmt_offset' ) * 3600 ));
					if (($j-$k)>12&&($j-$k)<24) $lastseen=substr($check,$k,$j-$k); // should be about 20 characters
					if (strpos($lastseen,' ')) $lastseen=substr($lastseen,0,strpos($lastseen,' ')); // trim out the time to save room.
					if (strpos($check,'<frequency>',$n)!==false) {
						$k=strpos($check,'<frequency>',$n);
						$k+=11;
						$j=strpos($check,'</frequency',$k);
						$frequency='9999';			
						if (($j-$k)&&($j-$k)<7) $frequency=substr($check,$k,$j-$k); // should be a number greater than 0 and probably no more than a few thousand.
					}
				}

				// have freqency and lastseen date - make these options in next release
				// check freq and age
				if (!empty($frequency) && !empty($lastseen) && ($frequency!=255) && ($frequency>=$sfsfreq) && (strtotime($lastseen)>(time()-(60*60*24*$sfsage))) )   { 
				//if ( ($frequency>=$sfsfreq) && (strtotime($lastseen)>(time()-(60*60*24*$sfsage))) )   { 
				// frequency we got from the db, sfsfreq is the min we'll accept (default 0)
				// sfsage is the age in days. we get lastscene from
					$deny=true;
					$whodunnit.="SFS, $lastseen, $frequency";
				}
			}
		}
		//$whodunnit.="Passed SFS, $query $check";
	} 
	
	// testing the DNSBL sites for a bad ip. This is useful for email spammers, but I do not know if
	// email spammers are the same as comment spammers.
	if (!$deny&&$chkdnsbl=='Y') {
		$ansa=@kpg_check_all_dnsbl($ip);
		if ($ansa!==false) {
				$deny=true;
				$whodunnit.=$ansa;
		}
	}

	if (!$deny&&$honeyapi!='') {
		// do a further check on project honeypot here
		$lookup = $honeyapi . '.' . implode('.', array_reverse(explode ('.', $ip ))) . '.dnsbl.httpbl.org';
		$result = explode( '.', @gethostbyname($lookup));
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
		$check='';
		$check=@kpg_sfs_reg_getafile($query);
		if (!empty($check)) {
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
	}
	$hist[$now][4]=$whodunnit;
	if (!$deny) {
		$hist[$now][4].=' passed';
		$goodips[$ip]=$now;
		$stats['hist']=$hist;
		$stats['goodips']=$goodips; // uncomment to cache good ips.
		update_option('kpg_stop_sp_reg_stats',$stats);
		return $email;
	}
	
	// update the history files.
	// record the last few guys that have  tried to spam
	// add the bad spammer to the history list
	$spcount++;
	$spmcount++;
	$stats['spcount']=$spcount;
	$stats['spmcount']=$spmcount;
	// Cache the bad guy
	if (!empty($em)) $badems[$em]=$now;
	if (!empty($ip)) $badips[$ip]=$now;
	asort($badips);
	asort($badems);
	while (count($badips)>$kpg_sp_cache) array_shift($badips);
	while (count($badems)>$kpg_sp_cache) array_shift($badems);
	$stats['badips']=$badips;
	$stats['badems']=$badems;
	$stats['hist']=$hist;
	update_option('kpg_stop_sp_reg_stats',$stats);
	sleep(2); // sleep for a few seconds to annoy spammers and maybe delay next hit on stopforumspam.com
	// here we do wp_die
	header('HTTP/1.1 403 Forbidden');
	wp_die("$rejectmessage","Login Access Denied");
	exit();
}
// this checks to see if there is an ip forwarded involved here and corrects the IP
function check_forwarded_ip($ip) {
	if (substr($ip,0,3)=='10.' ||
		substr($ip,0,8)=='192.168.' ||
		(substr($ip,0,7)>='172.16.' && substr($ip,0,7)<='172.31.')
	) {
		$oldip=$ip;
		// see if there is a forwarded header
		if (function_exists('getallheaders')) {
			$hlist=getallheaders();
			// ucase 
			$ip='';
			foreach ($hlist as $key => $data) {
				if (substr(strtoupper($key),0,strlen('X-FORWARDED-FOR'))=='X-FORWARDED-FOR') {
					// hit on the forwarded ip
					if (strpos($data,',')>0) {
						$ips=explode(',',$data);
					} else {
						$ips=array($data);
					}
					$ip=trim($ips[count($ips)-1]); // gets the last ip - most likely to be spoofed, perhaps the first ip would be better?
					break;
				}
			}
			if (empty($ip)) return $oldip;
		}
	}
	return $ip;
}
// still getting errors from bad data. I am now stripping all but ascii characters from 32 to 126
// email and user ideas are now plain 7 bit ascii as our founding fathers intended.
// there has to be a built-in php function to do this, but I did not find it. 
// There is an MB_ convert, but it did not work on all of my php hosts, so I think it may not be part of a standard install
function really_clean($s) {
	// try to get all non 7-bit things out of the string
	if (empty($s)) return $s;
	$ss=array_slice(unpack("c*", "\0".$s), 1);
	if (empty($ss)) return $s;
	$s='';
	for ($j=0;$j<count($ss);$j++) {
		if ($ss[$j]<127&&$ss[$j]>31) $s.=pack('C',$ss[$j]);
	}
	return $s;
}
function kpg_check_disp($em) {
	$disposables=array('0815.ru','0clickemail.com','0wnd.net','0wnd.org','10minutemail.com','1chuan.com','1zhuan.com','20minutemail.com','2prong.com','3d-painting.com','4warding.com','4warding.net','4warding.org','675hosting.com','675hosting.net','675hosting.org','6url.com','75hosting.com','75hosting.net','75hosting.org','9ox.net','a-bc.net','afrobacon.com','ajaxapp.net','amilegit.com','amiri.net','amiriindustries.com','anonbox.net','anonymail.dk','anonymbox.com','antichef.com','antichef.net','antispam.de','baxomale.ht.cx','beefmilk.com','binkmail.com','bio-muesli.net','blogmyway.org','bobmail.info','bodhi.lawlita.com','bofthew.com','brefmail.com','bsnow.net','bugmenot.com','bumpymail.com','buyusedlibrarybooks.org','casualdx.com','centermail.com','centermail.net','chogmail.com','choicemail1.com','cool.fr.nf','correo.blogos.net','cosmorph.com','courriel.fr.nf','courrieltemporaire.com','curryworld.de','cust.in','dacoolest.com','dandikmail.com','deadaddress.com','deadspam.com','despam.it','despammed.com','devnullmail.com','dfgh.net','digitalsanctuary.com','discardmail.com','discardmail.de','disposableaddress.com','disposeamail.com','disposemail.com','dispostable.com','dm.w3internet.co.uk example.com','dodgeit.com','dodgit.com','dodgit.org','dontreg.com','dontsendmespam.de','dotmsg.com','dump-email.info','dumpandjunk.com','dumpmail.de','dumpyemail.com','e4ward.com','email60.com','emaildienst.de','emailias.com','emailinfive.com','emailmiser.com','emailtemporario.com.br','emailto.de','emailwarden.com','emailxfer.com','emz.net','enterto.com','ephemail.net','etranquil.com','etranquil.net','etranquil.org','explodemail.com','fakeinbox.com','fakeinformation.com','fakemailz.com','fastacura.com','fastchevy.com','fastchrysler.com','fastkawasaki.com','fastmazda.com','fastmitsubishi.com','fastnissan.com','fastsubaru.com','fastsuzuki.com','fasttoyota.com','fastyamaha.com','filzmail.com','fizmail.com','footard.com','forgetmail.com','frapmail.com','front14.org','fux0ringduh.com','garliclife.com','get1mail.com','getonemail.com','getonemail.net','ghosttexter.de','girlsundertheinfluence.com','gishpuppy.com','gowikibooks.com','gowikicampus.com','gowikicars.com','gowikifilms.com','gowikigames.com','gowikimusic.com','gowikinetwork.com','gowikitravel.com','gowikitv.com','great-host.in','greensloth.com','gsrv.co.uk','guerillamail.biz','guerillamail.com','guerillamail.net','guerillamail.org','guerrillamail.com','guerrillamail.net','guerrillamailblock.com','h8s.org','haltospam.com','hatespam.org','hidemail.de','hotpop.com','ieatspam.eu','ieatspam.info','ihateyoualot.info','iheartspam.org','imails.info','imstations.com','inboxclean.com','inboxclean.org','incognitomail.com','incognitomail.net','ipoo.org','irish2me.com','iwi.net','jetable.com','jetable.fr.nf','jetable.net','jetable.org','jnxjn.com','junk1e.com','kasmail.com','kaspop.com','killmail.com','killmail.net','klassmaster.com','klassmaster.net','klzlk.com','kulturbetrieb.info','kurzepost.de','lifebyfood.com','link2mail.net','litedrop.com','lookugly.com','lopl.co.cc','lortemail.dk','lovemeleaveme.com','lr78.com','maboard.com','mail.by','mail.mezimages.net','mail2rss.org','mail333.com','mail4trash.com','mailbidon.com','mailblocks.com','mailcatch.com','maileater.com','mailexpire.com','mailfreeonline.com','mailin8r.com','mailinater.com','mailinator.com','mailinator.net','mailinator2.com','mailincubator.com','mailme.lv','mailmoat.com','mailnator.com','mailnull.com','mailquack.com','mailshell.com','mailsiphon.com','mailslapping.com','mailzilla.com','mailzilla.org','mbx.cc','mega.zik.dj','meinspamschutz.de','meltmail.com','messagebeamer.de','mierdamail.com','mintemail.com','moncourrier.fr.nf','monemail.fr.nf','monmail.fr.nf','mt2009.com','mx0.wwwnew.eu','mycleaninbox.net','myspaceinc.com','myspaceinc.net','myspaceinc.org','myspacepimpedup.com','myspamless.com','mytrashmail.com','neomailbox.com','nervmich.net','nervtmich.net','netmails.com','netmails.net','netzidiot.de','neverbox.com','no-spam.ws','nobulk.com','noclickemail.com','nogmailspam.info','nomail.xl.cx','nomail2me.com','nospam.ze.tc','nospam4.us','nospamfor.us','nowmymail.com','nurfuerspam.de','objectmail.com','obobbo.com','oneoffemail.com','oneoffmail.com','onewaymail.com','oopi.org','ordinaryamerican.net','ourklips.com','outlawspam.com','owlpic.com','pancakemail.com','pimpedupmyspace.com','poofy.org','pookmail.com','privacy.net','proxymail.eu','punkass.com','putthisinyourspamdatabase.com','quickinbox.com','rcpt.at','recode.me','recursor.net','recyclemail.dk','regbypass.comsafe-mail.net','rejectmail.com','rklips.com','safersignup.de','safetymail.info','sandelf.de','saynotospams.com','selfdestructingmail.com','sendspamhere.com','shiftmail.com','shitmail.me','shortmail.net','sibmail.com','skeefmail.com','slaskpost.se','slopsbox.com','smellfear.com','snakemail.com','sneakemail.com','sofort-mail.de','sogetthis.com','soodonims.com','spam.la','spamavert.com','spambob.com','spambob.net','spambob.org','spambog.com','spambog.de','spambog.ru','spambox.info','spambox.us','spamcannon.com','spamcannon.net','spamcero.com','spamcon.org','spamcorptastic.com','spamcowboy.com','spamcowboy.net','spamcowboy.org','spamday.com','spamex.com','spamfree24.com','spamfree24.de','spamfree24.eu','spamfree24.info','spamfree24.net','spamfree24.org','spamgourmet.com','spamgourmet.net','spamgourmet.org','spamherelots.com','spamhereplease.com','spamhole.com','spamify.com','spaminator.de','spamkill.info','spaml.com','spaml.de','spammotel.com','spamobox.com','spamoff.de','spamslicer.com','spamspot.com','spamthis.co.uk','spamthisplease.com','spamtrail.com','speed.1s.fr','suremail.info','tempalias.com','tempe-mail.com','tempemail.biz','tempemail.com','tempemail.net','tempinbox.co.uk','tempinbox.com','tempomail.fr','temporarily.de','temporaryemail.net','temporaryforwarding.com','temporaryinbox.com','thankyou2010.com','thisisnotmyrealemail.com','throwawayemailaddress.com','tilien.com','tmailinator.com','tradermail.info','trash-amil.com','trash-mail.at','trash-mail.com','trash-mail.de','trash2009.com','trashdevil.com','trashdevil.de','trashmail.at','trashmail.com','trashmail.de','trashmail.me','trashmail.net','trashmail.org','trashmailer.com','trashymail.com','trashymail.net','turual.com','twinmail.de','tyldd.com','uggsrock.com','upliftnow.com','uplipht.com','venompen.com','viditag.com','viewcastmedia.com','viewcastmedia.net','viewcastmedia.org','walala.org','wegwerfadresse.de','wegwerfmail.de','wegwerfmail.net','wegwerfmail.org','wetrainbayarea.com','wetrainbayarea.org','wh4f.org','whopy.com','whyspam.me','wilemail.com','willselfdestruct.com','winemaven.info','wronghead.com','wuzup.net','wuzupmail.net','wwwnew.eu','xagloo.com','xemaps.com','xents.com','xmaily.com','xoxy.net','yep.it','yogamaven.com','yopmail.com','yopmail.fr','yopmail.net','yuurok.com','zippymail.info','zoemail.org');
	$emdomain=explode('@',$em);
	if (count($emdomain)==2&&in_array(strtolower($emdomain[1]),$disposables)) {
		// the email is a disposable email address
		// do you really want this guy????
		return true;
	}
	return false;
}

function kpg_akismet_check($ip) {
	// give akismet a try - it seems to know more than anyone
	$api_key=get_option('wordpress_api_key');
	$agent=$_SERVER['HTTP_USER_AGENT'];
	$blogurl=site_url();
	$api_key=urlencode($api_key);
	$agent=urlencode($agent);
	$blogurl=urlencode($blogurl);
	if (empty($api_key)||empty($agent)||empty($blogurl)) return false;
	$request="blog=$blogurl&user_ip=$ip&user_agent=$agent";
	$host = $http_host = $api_key.'.rest.akismet.com';
    $path = '/1.1/comment-check';
    $port = 80;
    $akismet_ua = "WordPress/3.1.1 | Akismet/2.5.3";
    $content_length = strlen( $request );
    $http_request  = "POST $path HTTP/1.0\r\n";
    $http_request .= "Host: $host\r\n";
    $http_request .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $http_request .= "Content-Length: {$content_length}\r\n";
    $http_request .= "User-Agent: {$akismet_ua}\r\n";
    $http_request .= "\r\n";
    $http_request .= $request;
    $response = '';
	//$f=fopen('akismet.txt',"a");
    if( false != ( $fs = @fsockopen( $http_host, $port, $errno, $errstr, 10 ) ) ) {
        fwrite( $fs, $http_request );
         while ( !feof( $fs ) )
            $response .= fgets( $fs, 1160 ); // One TCP-IP packet
        fclose( $fs );
		//fwrite($f,"\r\n$response\r\n");
        $response = explode( "\r\n\r\n", $response, 2 );
    }
	//fwrite($f,"\r\n$request\r\n");
	//fwrite($f,"\r\n$http_request\r\n");
	//fclose($f);
    if ( 'true' == $response[1] )
        return true;
    else
        return false;
}	

function kpg_check_ubiquity($ip) {
	$userve=array(
'XSServer',
array('46.251.228.0','46.251.229.255'),
array('109.230.197.0','109.230.197.255'),
array('109.230.213.0','109.230.213.255'),
array('109.230.216.0','109.230.217.255'),
array('109.230.220.0','109.230.223.255'),
array('109.230.246.0','109.230.246.255'),
array('109.230.248.0','109.230.249.255'),
array('109.230.251.0','109.230.251.255'),
'Ubiquity-Nobis',
array('23.19.0.0','23.19.255.255'),
array('64.120.0.0','64.120.127.255'),
array('67.201.0.0','67.201.7.255'),
array('67.201.40.0','67.201.40.255'),
array('67.201.48.0','67.201.49.255'),
array('69.147.224.0','69.147.225.255'),
array('69.174.60.0','69.174.63.255'),
array('70.32.32.0','70.32.47.255'),
array('72.37.145.0','72.37.145.255'),
array('72.37.204.0','72.37.204.255'),
array('72.37.218.0','72.37.219.255'),
array('72.37.221.0','72.37.221.255'),
array('72.37.222.0','72.37.223.255'),
array('72.37.224.0','72.37.231.255'),
array('72.37.237.0','72.37.237.255'),
array('72.37.242.0','72.37.243.255'),
array('72.37.246.0','72.37.247.255'),
array('108.62.0.0','108.62.255.255'),
array('173.208.0.0','173.208.127.255'),
array('173.234.0.0','173.234.255.255'),
array('174.34.128.0','174.34.191.255'),
array('216.6.224.0','216.6.239.255'),
array('176.31.50.64','176.31.50.95'),
'Balticom',
array('46.23.32.0','46.23.47.255'),
array('82.193.64.0','82.193.95.255'),
array('83.99.128.0','83.99.255.255'),
array('109.73.96.0','109.73.111.255'),
array('212.142.64.0','212.142.127.255'),
'Everhost',
array('31.2.216.0','31.2.223.255'),
array('31.47.208.0','31.47.215.255'),
array('31.220.128.0','31.220.131.255'),
array('46.108.155.0','46.108.155.255'),
array('89.42.8.0','89.42.8.255'),
array('89.42.108.0','89.42.109.255'),
array('89.44.16.0','89.44.31.255'),
array('93.118.64.0','93.118.79.255'),
array('94.60.152.0','94.60.159.255'),
array('94.60.160.0','94.60.191.255'),
array('94.60.192.0','94.60.199.255'),
array('94.63.0.0','94.63.31.255'),
array('94.63.32.0','94.63.47.255'),
array('94.63.56.0','94.63.63.255'),
array('94.63.64.0','94.63.71.255'),
array('94.63.128.0','94.63.135.255'),
array('94.63.152.0','94.63.159.255'),
array('94.63.192.0','94.63.207.255'),
array('94.177.4.0','94.177.5.255'),
array('95.64.24.0','95.64.31.255'),
array('95.64.32.0','95.64.32.255'),
array('95.64.41.0','95.64.41.255'),
array('95.64.42.0','95.64.42.255'),
array('95.64.110.0','95.64.111.255'),
array('95.128.168.0','95.128.168.255'),
array('95.128.174.0','95.128.175.255'),
array('95.187.0.0','95.187.127.255'),
array('178.255.36.0','178.255.37.255'),
array('178.255.38.0','178.255.38.255'),
array('188.208.0.0','188.208.15.255'),
array('188.215.0.0','188.215.0.255'),
array('188.215.32.0','188.215.35.255'),
array('188.229.19.0','188.229.19.255'),
array('188.229.20.0','188.229.23.255'),
array('188.229.38.0','188.229.38.255'),
array('188.229.103.0','188.229.103.255'),
array('188.229.104.0','188.229.111.255'),
array('188.229.124.0','188.229.127.255'),
array('188.240.36.0','188.240.39.255'),
array('188.240.160.0','188.240.175.255'),
array('188.240.192.0','188.240.223.255'),
array('188.247.128.0','188.247.128.255'),
array('188.247.228.0','188.247.229.255'),
'FDC',
array('67.159.0.0','67.159.63.255'),
array('66.90.64.0','66.90.127.255'),
array('208.53.128.0','208.53.191.255'),
array('50.7.0.0','50.7.255.255'),
array('204.45.0.0','204.45.255.255'),
array('76.73.0.0','76.73.255.255'),
array('74.63.64.0','74.63.127.255'),
'Exetel',
array('109.230.244.0','109.230.245.255'),
array('31.214.155.0','31.214.155.255'),
'Virpus',
array('50.115.160.0','50.115.175.255'),
array('173.0.48.0','173.0.63.255'),
array('199.119.224.0','199.119.227.255'),
array('199.180.128.0','199.180.135.255'),
array('208.89.208.0','208.89.215.255'),
'MiscSpamServer',
array('74.63.222.74','74.63.222.74'),
array('86.181.176.121','86.181.176.121'),
array('98.126.4.202','98.126.4.202'),
array('98.126.251.234','98.126.251.234'),
array('188.168.0.0','188.168.255.255'),
array('81.17.22.21','81.17.22.21'),
array('66.219.17.212','66.219.17.212'),
array('46.29.248.0','46.29.249.255'),
array('74.221.208.0','74.221.223.255'),
array('109.169.57.204','109.169.57.204'),
array('184.22.139.0','184.22.139.255'),
array('99.187.246.108','99.187.246.108'),
array('195.62.24.0','195.62.25.255'),
array('141.105.65.151','141.105.65.151'),
array('146.0.74.0','146.0.74.255'),
array('194.28.112.0','194.28.115.255'),
array('159.224.130.96','159.224.130.96')
);
$srv='';
	for ($j=0;$j<count($userve);$j++) {
		if (!is_array($userve[$j])) {
			$srv=$userve[$j];
		} else {
			$st=ip2long($userve[$j][0]);
			$en=ip2long($userve[$j][1]);
			if (ip2long($ip)>=$st && ip2long($ip)<=$en) {
				// bad one
				return $srv;
			}
		}
		//if (ip2long($ip)<$en) break; // done search
	}
	return false;
}
function kpg_check_all_dnsbl($ip) {
 	// just for the heck of it, I found a bunch of blacklist sites
	// these use the dns returns but don't need an api key as far as I know
   $iplist = array(
	    'sbl.spamhaus' 	=> '.sbl.spamhaus.org',
	    'xbl.spamhaus' 	=> '.xbl.spamhaus.org',
	    'dsbl' 	 	=> '.list.dsbl.org',
	    'sorbs' 	=> '.dnsbl.sorbs.net',
	    'spamcop' 	=> '.bl.spamcop.net',
	    'ordb' 		=> '.relays.ordb.org',
	    'njabl' 	=> '.dnsbl.njabl.org'
    ); 
	foreach($iplist as $key=>$data) {
		// check using the dns method.
		// returns the db that caused the hit else returns false
		$lookup = implode('.', array_reverse(explode ('.', $ip ))) . $data;
		$result = explode( '.', gethostbyname($lookup));
		if (count($result)>2) {
			if ($result[0] == 127) {
				// query successful
				// 127 is a good lookup hit
				//  [3] = type of threat - we are only interested in comment spam at this point - if user demand I will change.
				// [2] is the threat level. 25 is recommended
				// [1] is numbr of days since last report
				return $key.':'.$result[1].','.$result[2].','.$result[3];
			} 
		}
		return false;
	}
}
function kpg_sfs_reg_stats_control() {
// this displays the statistics 
	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	// include it so as to make the core plugin smaller
	require("includes/stop-spam-reg-stats.php");

}
function kpg_sfs_reg_control()  {
// this is the display of information about the page.

  require("includes/stop-spam-reg-options.php");
	

}
function kpg_get_sp_blog_list($orderby='blog_id' ) {
	global $wpdb;
	$sql="SELECT blog_id FROM $wpdb->blogs WHERE  public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' ORDER BY $orderby";
	
	$blogs = $wpdb->get_results($sql, ARRAY_A );
	if (empty($blogs)) {
		return array();
	}
	return $blogs;
}

function kpg_sfs_reg_check($actions,$comment) {
	$email=urlencode($comment->comment_author_email);
	$ip=$comment->comment_author_IP;
	$action="<a title=\"Check Stop Forum Spam (SFS)\" target=\"_stopspam\" href=\"http://www.stopforumspam.com/search.php?q=$ip\">Check SFS</a> |
	 <a title=\"Check Project HoneyPot\" target=\"_stopspam\" href=\"http://www.projecthoneypot.org/search_ip.php?ip=$ip\">Check HoneyPot</a>";
	$actions['check_spam']=$action;
	return $actions;
}
function kpg_sfs_reg_report($actions,$comment) {
	// need to add a new action to the list
	$email=urlencode($comment->comment_author_email);
	if (empty($email)){
		return $actions;
	}
	$options=kpg_sp_get_options();
	extract($options);
	
    $ID=$comment->comment_ID;
	$email=urlencode($comment->comment_author_email);
	$exst='';
	$uname=urlencode($comment->comment_author);
	$ip=$comment->comment_author_IP;
	// code added as per Paul at sto Forum Spam
	$content=$comment->comment_content;
	
	$evidence=$comment->comment_author_url;
	if (empty($evidence)) $evidence='';
	preg_match_all('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@',$content, $post, PREG_PATTERN_ORDER);
	if (is_array($post)&&is_array($post[1])) $urls1 = array_unique($post[1]); else $urls1 = array(); 
	//bbcode
	preg_match_all('/\[url=(.+)\]/iU', $content, $post, PREG_PATTERN_ORDER);
	if (is_array($post)&&is_array($post[0])) $urls2 = array_unique($post[0]); else $urls2 = array(); 
	$urls3=array_merge($urls1,$urls2);
    if (is_array($urls3)) $evidence.="\r\n".implode("\r\n",$urls3);	
 	$evidence=urlencode(trim($evidence,"\r\n"));
	if (strlen($evidence)>128) $evidence=substr($evidence,0,125).'...';
	$target=" target=\"_blank\" ";
	$href="href=\"http://www.stopforumspam.com/add.php?username=$uname&email=$email&ip_addr=$ip&evidence=$evidence&api_key=$apikey\" ";
	if (!empty($apikey)) {
		//$target="target=\"kpg_sfs_reg_if1\"";
		// make this the xlsrpc call.
		$href="href=\"#\"";
		$onclick="onclick=\"sfs_ajax_report_spam(this,'$ID','$blog_id','$ajaxurl');return false;\"";
	}
	$action="<a $exst title=\"Report to Stop Forum Spam (SFS)\" $target $href $onclick class='delete:the-comment-list:comment-$ID::delete=1 delete vim-d vim-destructive'>Report to SFS</a>";
	

	$actions['report_spam']=$action;
	return $actions;

}


function kpg_sfs_reg_init() {
	// we need to find out if it is OK to add the init
	$options=kpg_sp_get_options();
    $muswitch=$options['muswitch'];
	if(!current_user_can('manage_options')) return;
	$addtowhitelist=$options['addtowhitelist'];
	$wlist=$options['wlist'];
	$ip=$_SERVER['REMOTE_ADDR'];
	$ip=check_forwarded_ip($ip);
	if ($addtowhitelist=='Y'&&!in_array($ip,$wlist)) {
		// add this ip to your white list
		$wlist[count($wlist)]=$ip;
		$options['wlist']=$wlist;
		update_option('kpg_stop_sp_reg_options',$options);
	}

	// first, simple users just need a simple screen
	if (!function_exists('is_multisite') || !is_multisite()) {
		// just do the basic stuff and get out
		add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options','stopspammersoptions','kpg_sfs_reg_control');
		add_options_page('Stop Spammers History', 'Spammer History', 'manage_options','stopspammerstats','kpg_sfs_reg_stats_control');
		add_action('rightnow_end', 'kpg_sp_rightnow');
		add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
		add_filter('comment_row_actions','kpg_sfs_reg_check',1,2);	
		add_filter('comment_row_actions','kpg_sfs_reg_report',1,2);	
		return;
	}
	// we are in a multisite setup
	// newtwork managers can always see the admin screens and report spam
	if (current_user_can( 'manage_network' )) {
		add_action('mu_rightnow_end','kpg_sp_rightnow');
		add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options','stopspammersoptions','kpg_sfs_reg_control');
		add_options_page('Stop Spammers History', 'Spammer History', 'manage_options','stopspammerstats','kpg_sfs_reg_stats_control');
		add_action('rightnow_end', 'kpg_sp_rightnow');
		add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
		add_filter('comment_row_actions','kpg_sfs_reg_check',1,2);	
		add_filter('comment_row_actions','kpg_sfs_reg_report',1,2);	
		return;
	}
	// user is not a network manager.
	// we only install the management page if the manager has allowed it.	
	if ($muswitch!='Y') { // not networked - each blog has to configure the stuff separately
		add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options','stopspammersoptions','kpg_sfs_reg_control');
		add_options_page('Stop Spammers History', 'Spammer History', 'manage_options','stopspammerstats','kpg_sfs_reg_stats_control');
		add_action('rightnow_end', 'kpg_sp_rightnow');
		add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
		add_filter('comment_row_actions','kpg_sfs_reg_check',1,2);	
		add_filter('comment_row_actions','kpg_sfs_reg_report',1,2);	
		return;
	}
    // multisite and not a network manager and the muswitch is off - means no admin installation at all
	return;

}
function kpg_sp_plugin_action_links( $links, $file ) {
	if ( basename($file) == basename(__FILE__))  {
		$me=admin_url('options-general.php?page=stopspammersoptions');
		$links[] = "<a href=\"$me\">".__('Settings').'</a>';
	}

	return $links;
}


function kpg_sfs_siteadmin_page(){
 // don't restrict this to site admins, because it throws an error if non site admins go to the URL. Instead, control it wtih the site admin test at the next level
	if (function_exists('is_network_admin')) {
		//3.1+
		add_submenu_page('settings.php', 'Stop Spammers', 'Stop Spammers', 'manage_sites', 'stopspammersoptions', 'kpg_sfs_reg_control');
	} else {
		//-3.1
		add_submenu_page('ms-admin.php', 'Stop Spammers', 'Stop Spammers', 'manage_sites', 'stopspammersoptions', 'kpg_sfs_reg_control');
	}
 }
if (function_exists('is_network_admin')) {
	//3.1+
	add_action('network_admin_menu', 'kpg_sfs_siteadmin_page');
} else {
	//-3.1
	add_action('admin_menu', 'kpg_sfs_siteadmin_page');
}

  
function kpg_sfs_reg_uninstall() {
	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	kpg_sp_delete_option('kpg_stop_sp_reg_options'); 
	kpg_sp_delete_option('kpg_stop_sp_reg_stats'); 
	return;
}  

// hook the comment list with a "report Spam" filater
	add_action('admin_menu', 'kpg_sfs_reg_init');
	add_action('network_admin_menu', 'kpg_sfs_reg_init');


if ( function_exists('register_uninstall_hook') ) {
	register_uninstall_hook(__FILE__, 'kpg_sfs_reg_uninstall');
}


function kpg_sfs_reg_getafile($f) {
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

// special request to add to "right now section of the admin page
// WP 2.5+
function kpg_sp_rightnow() {
	$options=kpg_sp_get_options();
	extract($options);
	$stats=kpg_sp_get_stats();
	extract($stats);
 	$me=admin_url('options-general.php?page=stopspammerstats');
    if (function_exists('is_multisite') && is_multisite()) {
		switch_to_blog(1);
		$me=admin_url('options-general.php?page=stopspammerstats');
		restore_current_blog();
	}
	if ($spmcount>0) {
		// steal the akismet stats css format 
		// get the path to the plugin
		echo "<p><a style=\"font-style:italic;\" href=\"$me\">Stop Spammer Registrations</a> has prevented $spmcount spammers from registering or leaving comments.";
		if ($nobuy=='N' && $spmcount>1000) echo "  <a style=\"font-style:italic;\" href=\"http://www.blogseye.com/buy-the-book/\">Buy Keith Graham&apos;s Science Fiction Book</a>";
		echo"</p>";
	} else {
		echo "<p><a style=\"font-style:italic\" href=\"$me\">Stop Spammer Registrations</a> has not stopped any spammers, yet.";
		echo"</p>";
	}
}
function kpg_sp_searchi($needle,$haystack) {
	// ignore case in_array
    foreach($haystack as $val) {
		if (strtolower($val)==strtolower($needle)) return true;
	}
	return false;
}
function kpg_sp_get_stats() {
	$stats=get_option('kpg_stop_sp_reg_stats');
	if (empty($stats)||!is_array($stats)) $stats=array();
	$options=array(
		'badips'=>array(),
		'badems'=>array(),
		'goodips'=>array(),
		'hist'=>array(),
		'spcount'=>0,
		'spmcount'=>0,
		'spmdate'=>'installation',
		'spdate'=>'last cleared'
	);
	$ansa=array_merge($options,$stats);
	if (!is_array($ansa['badips'])) $ansa['badips']=array();
	if (!is_array($ansa['badems'])) $ansa['badems']=array();
	if (!is_array($ansa['hist'])) $ansa['hist']=array();
	if (!is_array($ansa['goodips'])) $ansa['goodips']=array();
	if (!is_numeric($ansa['spcount'])) $ansa['spcount']=0;
	if (!is_numeric($ansa['spmcount'])) $ansa['spmcount']=0;
	if ($ansa['spcount']==0) {
		$ansa['spdate']=date('Y/m/d',time() + ( get_option( 'gmt_offset' ) * 3600 ));
		update_option('kpg_stop_sp_reg_stats',$ansa);
	}
	if ($ansa['spmcount']==0) {
		$ansa['spmdate']=date('Y/m/d',time() + ( get_option( 'gmt_offset' ) * 3600 ));
		update_option('kpg_stop_sp_reg_stats',$ansa);
	}
	
	return $ansa;
}

/*


*/
function kpg_sp_get_options() {
	$opts=get_option('kpg_stop_sp_reg_options');
	if (empty($opts)||!is_array($opts)) $opts=array();
	$options=array(
		'wlist'=>array(),
		'blist'=>array(),
		'apikey'=>'',
		'honeyapi'=>'',
		'botscoutapi'=>'',
		'accept'=>'Y',
		'nobuy'=>'N',
		'chkemail'=>'Y',
		'chksfs'=>'Y',
		'chkreferer'=>'Y',
		'chkdisp'=>'Y',
		'chkdnsbl'=>'Y',
		'chkubiquity'=>'Y',
		'chkakismet'=>'Y',
		'chkcomments'=>'Y',
		'chklogin'=>'Y',
		'chksignup'=>'Y',
		'chklong'=>'Y',
		'chkxmlrpc'=>'Y',
		'addtowhitelist'=>'Y',
		'muswitch'=>'Y',
		'sfsfreq'=>0,
		'hnyage'=>9999,
		'botfreq'=>0,
		'sfsage'=>9999,
		'hnylevel'=>5,
		'botage'=>9999,
		'kpg_sp_cache'=>25,
		'kpg_sp_hist'=>25,
		'rejectmessage'=>"Access Denied<br/>
This site is protected by the Stop Spammer Registrations Plugin.<br/>"
		);
	$ansa=array_merge($options,$opts);
	if (!is_array($ansa['wlist'])) $ansa['wlist']=array();
	if (!is_array($ansa['blist'])) $ansa['blist']=array();
	if (empty($ansa['apikey'])) $ansa['apikey']='';
	if (empty($ansa['honeyapi'])) $ansa['honeyapi']='';
	if (empty($ansa['botscoutapi'])) $ansa['botscoutapi']='';
	if ($ansa['accept']!='Y') $ansa['accept']='N';
	if ($ansa['nobuy']!='Y') $ansa['nobuy']='N';
	if ($ansa['chkemail']!='Y') $ansa['chkemail']='N';
	if ($ansa['chkdisp']!='Y') $ansa['chkdisp']='N';
	if ($ansa['chksfs']!='Y') $ansa['chksfs']='N';
	if ($ansa['chkdnsbl']!='Y') $ansa['chkdnsbl']='N';
	if ($ansa['chkubiquity']!='Y') $ansa['chkubiquity']='N';
	if ($ansa['chkakismet']!='Y') $ansa['chkakismet']='N';
	if ($ansa['chkcomments']!='Y') $ansa['chkcomments']='N';
	if ($ansa['chklogin']!='Y') $ansa['chklogin']='N';
	if ($ansa['chksignup']!='Y') $ansa['chksignup']='N';
	if ($ansa['chkxmlrpc']!='Y') $ansa['chkxmlrpc']='N';
	if ($ansa['muswitch']!='N') $ansa['muswitch']='Y';
	if (empty($ansa['kpg_sp_cache'])) $ansa['kpg_sp_cache']=25;
	if (empty($ansa['kpg_sp_hist'])) $ansa['kpg_sp_hist']=25;
	return $ansa;
}
function sfs_handle_ajax_check($data) {
	// this does a call to the sfs site to check a known spammer
	// returns success or not
	$query="http://www.stopforumspam.com/api?ip=91.186.18.61";
	$check='';
	$check=kpg_sfs_reg_getafile($query);
	if (!empty($check)) {
	    $check=trim($check);
	    $check=trim($check,'0');
		if (substr($check,0,4)=="ERR:") {
			echo "Access to the Stop Forum Spam Database shows errors\r\n";
			echo "response was $check\r\n";
		}
		//Access to the Stop Forum Spam Database is working
		$n=strpos($check,'<response success="true">');
		if ($n===false) {
			echo "Access to the Stop Forum Spam Database is not working\r\n";
			echo "response was\r\n $check\r\n";
		} else {
			echo "Access to the Stop Forum Spam Database is working";
		}
	} else {
		echo "No response from the Stop Forum Spam AP Call\r\n";
	}
	return;
}
function sfs_handle_ajax_sub($data) {
	// get the stuff from the $_GET and call stop forum spam
	// this tages the stuff from the get and uses it to do the get from sfs
	// get the configuration items
	//kpg_ssp_global_setup();
	$options=kpg_sp_get_options();
	if (empty($options)) {
		echo "No Options set";
		exit();
	}
	//print_r($options);
	extract($options);
	// get the comment_id parameter	
	$comment_id=urlencode($_GET['comment_id']);
	if (empty($comment_id)) {
		echo "No comment id found";
		exit();
	}
	// need to pass the blog id also
	$blog='';
	$blog=$_GET['blog_id'];
	if ($blog!='') {
		switch_to_blog($blog);
	} 
	// get the comment
	$comment=get_comment( $comment_id, ARRAY_A );
	if (empty($comment)) {
		echo "No comment found for $comment_id";
		exit();
	}
	//print_r($comment);
	$email=urlencode($comment['comment_author_email']);
	$uname=urlencode($comment['comment_author']);
	$ip_addr=$comment['comment_author_IP'];
	// code added as per Paul at sto Forum Spam
	$content=$comment['comment_content'];
	$evidence=$comment['comment_author_url'];
	if ($blog!='') {
		restore_current_blog();
	}

	if (empty($evidence)) $evidence='';
	preg_match_all('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@',$content, $post, PREG_PATTERN_ORDER);
	$urls1=array();
	$urls2=array();
	if (is_array($post)&&is_array($post[1])) $urls1 = array_unique($post[1]); else $urls1 = array(); 
	//bbcode
	preg_match_all('/\[url=(.+)\]/iU', $content, $post, PREG_PATTERN_ORDER);
	if (is_array($post)&&is_array($post[0])) $urls2 = array_unique($post[0]); else $urls2 = array(); 
	$urls3=array_merge($urls1,$urls2);
    if (is_array($urls3)) $evidence.="\r\n".implode("\r\n",$urls3);	
 	$evidence=urlencode(trim($evidence,"\r\n"));
	if (strlen($evidence)>128) $evidence=substr($evidence,0,125).'...';
	
	if (empty($apikey)) {
		echo "Cannot Report Spam without API Key";
		exit();
	}
$hget="http://www.stopforumspam.com/add.php?ip_addr=$ip_addr&api_key=$apikey&email=$email&username=$uname&evidence=$evidence";
//echo $hget;
   $ret=@kpg_sfs_reg_getafile($hget);
	if (stripos($ret,'data submitted successfully')>0) {
 		echo $ret;
	} else if (stripos($ret,'recent duplicate entry')>0) {
 		echo ' recent duplicate entry ';
	} else {
 		echo $ret;
	}
}
	add_action('wp_ajax_nopriv_sfs_sub', 'sfs_handle_ajax_sub');	
	add_action('wp_ajax_sfs_sub', 'sfs_handle_ajax_sub');	
	add_action('wp_ajax_sfs_check', 'sfs_handle_ajax_check');	// used to check if ajax reporting works
/******************************************
* try ajax version of reporting
* right out of the api playbook
******************************************/
	add_action('admin_head', 'sfs_handle_ajax_new');
	function sfs_handle_ajax_new() {
		// this is the call that handles the call to ajax
		// step 1: Create the script that handles the action
?>
<script type="text/javascript" >
var sfs_ajax_who=null; //use this to update the message in the click
function sfs_ajax_report_spam(t,id,blog,url) {
	sfs_ajax_who=t;
	
	var data= {
		action: 'sfs_sub',
		blog_id: blog,
		comment_id: id,
		ajax_url: url
	}
	jQuery.get(ajaxurl, data, sfs_ajax_return_spam);
}
function sfs_ajax_return_spam(response) {
    sfs_ajax_who.innerHTML="Spam reported";
	sfs_ajax_who.style.color="green";
	sfs_ajax_who.style.fontWeight="bolder";
	//alert(response);
	if (response.indexOf('data submitted successfully')>0) {
		return false;
	}
	if (response.indexOf('recent duplicate entry')>0) {
		sfs_ajax_who.innerHTML="Spam Already reported";
		sfs_ajax_who.style.color="brown";
		sfs_ajax_who.style.fontWeight="bolder";
		return false;
	}
	sfs_ajax_who.innerHTML="Error reporting spam";
	sfs_ajax_who.style.color="red";
	sfs_ajax_who.style.fontWeight="bolder";
	alert(response);
	return false;
}
</script>
<?php		

	}
	
	
	
// here are the debug functions
// change the debug=false to debug=true to start debugging.
// the plugin will drop a file sfs_debug_output.txt in the current directory (root, wp-admin, or network) 
// directory must be writeable or plugin will crash.

function sfs_errorsonoff($old=null) {
	$debug=true;  // change to true to debug, false to stop debugging.
	if (!$debug) return;
	if (empty($old)) return set_error_handler("sfs_ErrorHandler");
	restore_error_handler();
}
function sfs_ErrorHandler($errno, $errmsg, $filename, $linenum, $vars) {
	// write the answers to the file
	// we are only conserned with the errors and warnings, not the notices
	//if ($errno==E_NOTICE || $errno==E_WARNING) return false;
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
	$f=fopen(dirname(__FILE__)."/sfs_debug_output.txt",'a');
	fwrite($f,$msg);
	fclose($f);
	return false;
}

?>