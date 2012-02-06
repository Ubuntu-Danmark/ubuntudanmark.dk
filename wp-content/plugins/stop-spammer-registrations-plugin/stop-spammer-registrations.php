<?PHP
/*
Plugin Name: Stop Spammer Registrations Plugin
Plugin URI: http://www.BlogsEye.com/
Description: This plugin checks against StopForumSpam.com, Project Honeypot and BotScout to to prevent spammers from registering or making comments.
Version: 2.20
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
	// get the options and stats
	$stats=kpg_sp_get_option('kpg_stop_sp_reg_stats');
	if (empty($stats)||!is_array($stats)) $stats=array();
	$options=kpg_sp_get_option('kpg_stop_sp_reg_options');
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
	$chkdisp='Y';
	$chkdnsbl='Y';
	$muswitch='Y';
	$sfsfreq=0;
	$hnyage=9999;
	$botfreq=0;
	$sfsage=9999;
	$hnylevel=5;
	$botage=9999;
	$blog=1;
	$kpg_sp_cache=25;
	$kpg_sp_hist=25;
	global $blog_id;
	if (isset($blog_id)) {
		$blog=$blog_id;
	}
	$ip=$_SERVER['REMOTE_ADDR']; 

	// apply the options array
	extract($stats);
	extract($options);
    $muswitch=get_sp_mu_option();
	if (!is_array($badips)) $badips=array();
	if (!is_array($badems)) $badems=array();
	if (!is_array($hist)) $hist=array();
	if (!is_array($wlist)) $wlist=array();
	if (empty($honeyapi)) $honeyapi='';
	if (empty($botscoutapi)) $botscoutapi='';
	if (empty($apikey)) $apikey='';
	if (empty($muswitch)) $muswitch='N';
	if ($muswitch!='N') $muswitch='Y';
	
	if (!is_numeric($spcount)) $spcount=0;
	if (!is_numeric($spmcount)) $spmcount=0;
	if ($nobuy!='Y') $nobuy='N';
	if ($chkemail!='Y') $chkemail='N';
	if ($accept!='Y') $accept='N';
	if ($chkdisp!='Y') $chkdisp='N';
	if ($chkdnsbl!='Y') $chkdnsbl='N';
	if (empty($kpg_sp_cache)) $kpg_sp_cache=25;
	if (empty($kpg_sp_hist)) $kpg_sp_hist=25;


	$stats=array();
	$options=array();
	
	$stats['badips']=$badips;
	$stats['badems']=$badems;
	$stats['hist']=$hist;
	$stats['spcount']=$spcount;
	$stats['spmcount']=$spmcount;
	
	$options['honeyapi']=$honeyapi;
	$options['botscoutapi']=$botscoutapi;
	$options['apikey']=$apikey;
	$options['nobuy']=$nobuy;
	$options['chkemail']=$chkemail;
	$options['accept']=$accept;
	$options['wlist']=$wlist;
	$options['chkdisp']=$chkdisp;
	$options['chkdnsbl']=$chkdnsbl;
	$options['muswitch']=$muswitch;
	$options['kpg_sp_cache']=$kpg_sp_cache;
	$options['kpg_sp_hist']=$kpg_sp_hist;
	
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

	
	kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
	kpg_sp_update_option($options,'kpg_stop_sp_reg_options');

	while(count($hist)>$kpg_sp_hist) {
		array_shift($hist);
	}
	/*
		check x forwarded if the local address is one of the non-routable ip addresses.
		example: X-FORWARDED-FOR: 129.78.138.66, 129.78.64.103
		
		check for 10.
		172.16. - 172.31. (less than 172.32.
		192.168.
		
		note: the x-forwarded-for header is not required and it can be easily spoofed.
		
		I cannot test this. Please report if broken.
	*/
	if (substr($ip,0,3)=='10.' ||
		substr($ip,0,8)=='192.168.' ||
		(substr($ip,0,7)>='172.16.' && substr($ip,0,7)<='172.31.')
	) {
		// see if there is a forwarded header
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
		if (empty($ip)) return $email;
	}
	
	// clean up history
	$now=date('Y/m/d H:i:s');
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
	if (strlen($author)>32) $author=substr($author,0,29).'...';
	if (strlen($em)>80) $em=substr($em,0,80).'...';
	// set up hist channel
	$hist[$now]=array($ip,mysql_real_escape_string($em),mysql_real_escape_string($author),$sname,'begin',$blog);
	$accept_head=false; 
	if (array_key_exists('HTTP_ACCEPT',$_SERVER)) $accept_head=true; // real browsers send HTTP_ACCEPT
	// first check the ip address
	if (in_array($ip,$wlist)) {
	    $hist[$now][4]='White List IP';
		$stats['hist']=$hist;
		kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
		sfs_errorsonoff('off');
		return $email;
	}
	if (in_array($em,$wlist)) {
	    $hist[$now][4]='White List EMAIL';
		$stats['hist']=$hist;
		kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
		sfs_errorsonoff('off');
		return $email;
	}

	
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
	if (strlen($em)>64) {
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
			$query=$query."&email=$em";
		}
		$check=kpg_stop_sp_reg_getafile($query);
		if (substr($check,0,4)=="ERR:") {
			$whodunnit.=$check.', ';
		}
		$n=strpos($check,'<appears>yes</appears>');
		if ($n) {
			$k=strpos($check,'<lastseen>',$n);
			$k+=10;
			$j=strpos($check,'</lastseen>',$k);
			$lastseen=date('Y-m-d',time());
			if (($j-$k)>12&&($j-$k)<24) $lastseen=substr($check,$k,$j-$k); // should be about 20 characters
			if (strpos($lastseen,' ')) $lastseen=substr($lastseen,0,strpos($lastseen,' ')); // trim out the time to save room.
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
	
	// testing the DNSBL sites for a bad ip. This is useful for email spammers, but I do not know if
	// email spammers are the same as comment spammers.
	if (!$deny&&$chkdnsbl=='Y') {
		$ansa=kpg_check_all_dnsbl($ip);
		if ($ansa!==false) {
				$deny=true;
				$whodunnit.=$ansa;
		}
	}
	// test rejecting disposable emails
	if (!$deny&&$chkdisp=='Y') {
	$disposables=array('0815.ru','0clickemail.com','0wnd.net','0wnd.org','10minutemail.com','1chuan.com','1zhuan.com','20minutemail.com','2prong.com','3d-painting.com','4warding.com','4warding.net','4warding.org','675hosting.com','675hosting.net','675hosting.org','6url.com','75hosting.com','75hosting.net','75hosting.org','9ox.net','a-bc.net','afrobacon.com','ajaxapp.net','amilegit.com','amiri.net','amiriindustries.com','anonbox.net','anonymail.dk','anonymbox.com','antichef.com','antichef.net','antispam.de','baxomale.ht.cx','beefmilk.com','binkmail.com','bio-muesli.net','blogmyway.org','bobmail.info','bodhi.lawlita.com','bofthew.com','brefmail.com','bsnow.net','bugmenot.com','bumpymail.com','buyusedlibrarybooks.org','casualdx.com','centermail.com','centermail.net','chogmail.com','choicemail1.com','cool.fr.nf','correo.blogos.net','cosmorph.com','courriel.fr.nf','courrieltemporaire.com','curryworld.de','cust.in','dacoolest.com','dandikmail.com','deadaddress.com','deadspam.com','despam.it','despammed.com','devnullmail.com','dfgh.net','digitalsanctuary.com','discardmail.com','discardmail.de','disposableaddress.com','disposeamail.com','disposemail.com','dispostable.com','dm.w3internet.co.uk example.com','dodgeit.com','dodgit.com','dodgit.org','dontreg.com','dontsendmespam.de','dotmsg.com','dump-email.info','dumpandjunk.com','dumpmail.de','dumpyemail.com','e4ward.com','email60.com','emaildienst.de','emailias.com','emailinfive.com','emailmiser.com','emailtemporario.com.br','emailto.de','emailwarden.com','emailxfer.com','emz.net','enterto.com','ephemail.net','etranquil.com','etranquil.net','etranquil.org','explodemail.com','fakeinbox.com','fakeinformation.com','fakemailz.com','fastacura.com','fastchevy.com','fastchrysler.com','fastkawasaki.com','fastmazda.com','fastmitsubishi.com','fastnissan.com','fastsubaru.com','fastsuzuki.com','fasttoyota.com','fastyamaha.com','filzmail.com','fizmail.com','footard.com','forgetmail.com','frapmail.com','front14.org','fux0ringduh.com','garliclife.com','get1mail.com','getonemail.com','getonemail.net','ghosttexter.de','girlsundertheinfluence.com','gishpuppy.com','gowikibooks.com','gowikicampus.com','gowikicars.com','gowikifilms.com','gowikigames.com','gowikimusic.com','gowikinetwork.com','gowikitravel.com','gowikitv.com','great-host.in','greensloth.com','gsrv.co.uk','guerillamail.biz','guerillamail.com','guerillamail.net','guerillamail.org','guerrillamail.com','guerrillamail.net','guerrillamailblock.com','h8s.org','haltospam.com','hatespam.org','hidemail.de','hotpop.com','ieatspam.eu','ieatspam.info','ihateyoualot.info','iheartspam.org','imails.info','imstations.com','inboxclean.com','inboxclean.org','incognitomail.com','incognitomail.net','ipoo.org','irish2me.com','iwi.net','jetable.com','jetable.fr.nf','jetable.net','jetable.org','jnxjn.com','junk1e.com','kasmail.com','kaspop.com','killmail.com','killmail.net','klassmaster.com','klassmaster.net','klzlk.com','kulturbetrieb.info','kurzepost.de','lifebyfood.com','link2mail.net','litedrop.com','lookugly.com','lopl.co.cc','lortemail.dk','lovemeleaveme.com','lr78.com','maboard.com','mail.by','mail.mezimages.net','mail2rss.org','mail333.com','mail4trash.com','mailbidon.com','mailblocks.com','mailcatch.com','maileater.com','mailexpire.com','mailfreeonline.com','mailin8r.com','mailinater.com','mailinator.com','mailinator.net','mailinator2.com','mailincubator.com','mailme.lv','mailmoat.com','mailnator.com','mailnull.com','mailquack.com','mailshell.com','mailsiphon.com','mailslapping.com','mailzilla.com','mailzilla.org','mbx.cc','mega.zik.dj','meinspamschutz.de','meltmail.com','messagebeamer.de','mierdamail.com','mintemail.com','moncourrier.fr.nf','monemail.fr.nf','monmail.fr.nf','mt2009.com','mx0.wwwnew.eu','mycleaninbox.net','myspaceinc.com','myspaceinc.net','myspaceinc.org','myspacepimpedup.com','myspamless.com','mytrashmail.com','neomailbox.com','nervmich.net','nervtmich.net','netmails.com','netmails.net','netzidiot.de','neverbox.com','no-spam.ws','nobulk.com','noclickemail.com','nogmailspam.info','nomail.xl.cx','nomail2me.com','nospam.ze.tc','nospam4.us','nospamfor.us','nowmymail.com','nurfuerspam.de','objectmail.com','obobbo.com','oneoffemail.com','oneoffmail.com','onewaymail.com','oopi.org','ordinaryamerican.net','ourklips.com','outlawspam.com','owlpic.com','pancakemail.com','pimpedupmyspace.com','poofy.org','pookmail.com','privacy.net','proxymail.eu','punkass.com','putthisinyourspamdatabase.com','quickinbox.com','rcpt.at','recode.me','recursor.net','recyclemail.dk','regbypass.comsafe-mail.net','rejectmail.com','rklips.com','safersignup.de','safetymail.info','sandelf.de','saynotospams.com','selfdestructingmail.com','sendspamhere.com','shiftmail.com','shitmail.me','shortmail.net','sibmail.com','skeefmail.com','slaskpost.se','slopsbox.com','smellfear.com','snakemail.com','sneakemail.com','sofort-mail.de','sogetthis.com','soodonims.com','spam.la','spamavert.com','spambob.com','spambob.net','spambob.org','spambog.com','spambog.de','spambog.ru','spambox.info','spambox.us','spamcannon.com','spamcannon.net','spamcero.com','spamcon.org','spamcorptastic.com','spamcowboy.com','spamcowboy.net','spamcowboy.org','spamday.com','spamex.com','spamfree24.com','spamfree24.de','spamfree24.eu','spamfree24.info','spamfree24.net','spamfree24.org','spamgourmet.com','spamgourmet.net','spamgourmet.org','spamherelots.com','spamhereplease.com','spamhole.com','spamify.com','spaminator.de','spamkill.info','spaml.com','spaml.de','spammotel.com','spamobox.com','spamoff.de','spamslicer.com','spamspot.com','spamthis.co.uk','spamthisplease.com','spamtrail.com','speed.1s.fr','suremail.info','tempalias.com','tempe-mail.com','tempemail.biz','tempemail.com','tempemail.net','tempinbox.co.uk','tempinbox.com','tempomail.fr','temporarily.de','temporaryemail.net','temporaryforwarding.com','temporaryinbox.com','thankyou2010.com','thisisnotmyrealemail.com','throwawayemailaddress.com','tilien.com','tmailinator.com','tradermail.info','trash-amil.com','trash-mail.at','trash-mail.com','trash-mail.de','trash2009.com','trashdevil.com','trashdevil.de','trashmail.at','trashmail.com','trashmail.de','trashmail.me','trashmail.net','trashmail.org','trashmailer.com','trashymail.com','trashymail.net','turual.com','twinmail.de','tyldd.com','uggsrock.com','upliftnow.com','uplipht.com','venompen.com','viditag.com','viewcastmedia.com','viewcastmedia.net','viewcastmedia.org','walala.org','wegwerfadresse.de','wegwerfmail.de','wegwerfmail.net','wegwerfmail.org','wetrainbayarea.com','wetrainbayarea.org','wh4f.org','whopy.com','whyspam.me','wilemail.com','willselfdestruct.com','winemaven.info','wronghead.com','wuzup.net','wuzupmail.net','wwwnew.eu','xagloo.com','xemaps.com','xents.com','xmaily.com','xoxy.net','yep.it','yogamaven.com','yopmail.com','yopmail.fr','yopmail.net','yuurok.com','zippymail.info','zoemail.org');
		$emdomain=explode('@',$em);
		if (count($emdomain)==2&&in_array(strtolower($emdomain[1]),$disposables)) {
			// the email is a disposable email address
			// do you really want this guy????
				$deny=true;
				$whodunnit.='Disposable em:'.$em;
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
		$hist[$now][4]='passed';
		$stats['hist']=$hist;
		kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
		sfs_errorsonoff('off');
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
	$badems[$em]=date("Y/m/d H:i:s");
	if (!empty($ip)) $badips[$ip]=date("Y/m/d H:i:s");
	($badems);
	while (count($badems)>$kpg_sp_cache) array_shift($badems);
	($badips);
	while (count($badips)>$kpg_sp_cache) array_shift($badips);
	// sort the array by date so that the most recent date is last
	$stats['badips']=$badips;
	$stats['badems']=$badems;
	$stats['hist']=$hist;
	kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
	sfs_errorsonoff('off');
	sleep(2); // sleep for a few seconds to annoy spammers and maybe delay next hit on stopforumspam.com
	return false;
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

function kpg_stop_sp_reg_control()  {
// this is the display of information about the page.
	sfs_errorsonoff();
?>
<div class="wrap">
  <h2>Stop Spammers Plugin</h2>
<?php
	$stats=kpg_sp_get_option('kpg_stop_sp_reg_stats');
	if (empty($stats)||!is_array($stats)) $stats=array();
	$options=kpg_sp_get_option('kpg_stop_sp_reg_options');
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
	$muswitch='Y';
	$chkdisp='Y';
	$chkdnsbl='Y';
	
	$sfsfreq=0;
	$hnyage=9999;
	$botfreq=0;
	$sfsage=9999;
	$hnylevel=5;
	$botage=9999;
	$kpg_sp_cache=25;
	$kpg_sp_hist=25;
	
	// apply the options array
	extract($stats);
	extract($options);
    $muswitch=get_sp_mu_option(); // force mu switch to be from blog 1
	if (!is_array($badips)) $badips=array();
	if (!is_array($badems)) $badems=array();
	if (!is_array($hist)) $hist=array();
	if (!is_array($wlist)) $wlist=array();
	if (empty($honeyapi)) $honeyapi='';
	if (empty($botscoutapi)) $botscoutapi='';
	if (empty($apikey)) $apikey='';
	if (empty($muswitch)) $muswitch='Y';
	if ($muswitch!='N') $muswitch='Y';
	if ($nobuy!='Y') $nobuy='N';
	if ($chkemail!='Y') $chkemail='N';
	if ($accept!='Y') $accept='N';
	if ($chkdisp!='Y') $chkdisp='N';
	if ($chkdnsbl!='Y') $chkdnsbl='N';

	if (!is_numeric($spcount)) $spcount=0;
	if (!is_numeric($spmcount)) $spmcount=0;
	if (empty($kpg_sp_cache)) $kpg_sp_cache=25;
	if (empty($kpg_sp_hist)) $kpg_sp_hist=25;
	
	$stats=array();
	$options=array();
	
	$stats['badips']=$badips;
	$stats['badems']=$badems;
	$stats['hist']=$hist;
	$stats['spcount']=$spcount;
	$stats['spmcount']=$spmcount;
	
	$options['honeyapi']=$honeyapi;
	$options['botscoutapi']=$botscoutapi;
	$options['apikey']=$apikey;
	$options['nobuy']=$nobuy;
	$options['chkemail']=$chkemail;
	$options['accept']=$accept;
	$options['wlist']=$wlist;
	$options['chkdisp']=$chkdisp;
	$options['chkdisp']=$chkdisp;
	$options['muswitch']=$muswitch;
	
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
	$options['kpg_sp_cache']=$kpg_sp_cache;
	$options['kpg_sp_hist']=$kpg_sp_hist;

	
	
	kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
	kpg_sp_update_option($options,'kpg_stop_sp_reg_options');

	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	$nonce='';
	if (array_key_exists('nonce',$_POST)) $nonce=$_POST['nonce'];

	
	if (array_key_exists('kpg_stop_spammers_control',$_POST)
			&&wp_verify_nonce($_POST['kpg_stop_spammers_control'],'kpgstopspam_update')) { 
		if (array_key_exists('kpg_stop_clear_cache',$_POST)) {
			// clear the cache
			unset($stats['badips']);
			unset($stats['badems']);
			kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
			$badems=array();
			$badips=array();
			echo "<h2>Cache Cleared</h2>";
		}
		if (array_key_exists('kpg_stop_clear_hist',$_POST)) {
			// clear the cache
			unset($stats['spcount']);
			unset($stats['hist']);
			$hist=array();
			$spcount=0;
			kpg_sp_update_option($stats,'kpg_stop_sp_reg_stats');
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
			
			if (array_key_exists('chkdnsbl',$_POST)) {
				$chkdnsbl=stripslashes($_POST['chkdnsbl']);
			} else {
				$chkdnsbl='N';
			}
			$options['chkdnsbl']=$chkdnsbl;
			
			if (array_key_exists('chkdisp',$_POST)) {
				$chkdisp=stripslashes($_POST['chkdisp']);
			} else {
				$chkdisp='N';
			}
			$options['chkdisp']=$chkdisp;
			
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
			$options['nobuy']=$nobuy;
			
			
			if (array_key_exists('accept',$_POST)) {
				$accept=stripslashes($_POST['accept']);
			} else {
				$accept='N';
			}
			if ($accept!='Y') $accept='N';
			$options['accept']=$accept;
			
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
			
			if (array_key_exists('kpg_sp_cache',$_POST)) $kpg_sp_cache=trim(stripslashes($_POST['kpg_sp_cache']));
			if (array_key_exists('kpg_sp_hist',$_POST)) $kpg_sp_hist=trim(stripslashes($_POST['kpg_sp_hist']));
			// check for numerics in the fields
			if (!is_numeric($sfsfreq)) $sfsfreq=0; 
			if (!is_numeric($hnyage)) $hnyage=0;
			if (!is_numeric($botfreq)) $botfreq=0; 
			if (!is_numeric($hnylevel)) $hnylevel=5;
			if (!is_numeric($botage)) $botage=9999; 
			if (!is_numeric($sfsage)) $sfsage=9999;	
			if (!is_numeric($kpg_sp_cache)) $kpg_sp_cache=25;	
			if (!is_numeric($kpg_sp_hist)) $kpg_sp_hist=25;	
			$options['sfsfreq']=$sfsfreq;
			$options['hnyage']=$hnyage;
			$options['botfreq']=$botfreq;
			$options['sfsage']=$sfsage;
			$options['hnylevel']=$hnylevel;
			$options['botage']=$botage;
			$options['kpg_sp_cache']=$kpg_sp_cache;
			$options['kpg_sp_hist']=$kpg_sp_hist;
			if (empty($muswitch)) $muswitch='Y';
			if ($muswitch!='N') $muswitch='Y';
			$options['muswitch']=$muswitch;
			set_sp_mu_option($muswitch); // sets the muswitch in the main blog if needed.
			
			
			kpg_sp_update_option($options,'kpg_stop_sp_reg_options');
			echo "<h2>Options Updated</h2>";
		}
		extract($options);
		$muswitch=get_sp_mu_option();

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
The Stop Spammer Registrations plugin keeps track of a number of spammer emails and IP addresses in a cache to avoid pinging databases more often than necessary. The results are saved and displayed. </p><p>
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
<p>The Stop Spammer Registrations plugin keeps a count of the spammers that it has blocked and displays this on the WordPress dashboard. It also displays the last hits on email or IP and it also shows a history of the times it has made a check, showing rejections, passing emails and errors. When there is data to display there will also be a button to clear out the data.</p>
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
	<input size="3" name="sfsfreq" type="text" value="<?php echo $sfsfreq; ?>"/> incidents, and occurring less than <input size="4" name="sfsage" type="text" value="<?php echo $sfsage; ?>"/> days ago. 
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
    <br/><br/>
    Deny disposable email addresses:
      <input name="chkdisp" type="checkbox" value="Y" <? if ($chkdisp=='Y') echo  'checked="true"';?>/>
      Some real commenters might use disposable email, but probably not (optional)
    <br/>
    <br/>
    Check agains DNSBL lists such as Spamhaus.org :
      <input name="chkdnsbl" type="checkbox" value="Y" <? if ($chkdnsbl=='Y') echo  'checked="true"';?>/>
      Primarily used for email spam, but might stop comment spam. (optional)
	  <br/>
	  <br/>White List - put IP address or emails here that you don't want blocked. One email or IP to a line.<br/>
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
	<legend>History and Cache Size</legend>
		You can change the number of entries to keep in your history and cache. The size of these items is an issue and will cause problems with some WordPress installations. It is best to keep these small.<br/>
		Cache Size: 
		<select name="kpg_sp_cache">
			<option value="10" <?php if ($kpg_sp_cache=='10') echo "selected=\"true\""; ?>>10</option>
			<option value="25" <?php if ($kpg_sp_cache=='25') echo "selected=\"true\""; ?>>25</option>
			<option value="50" <?php if ($kpg_sp_cache=='50') echo "selected=\"true\""; ?>>50</option>
			<option value="75" <?php if ($kpg_sp_cache=='75') echo "selected=\"true\""; ?>>75</option>
			<option value="100" <?php if ($kpg_sp_cache=='100') echo "selected=\"true\""; ?>>100</option>
		</select><br/>
		History Size: 
		<select name="kpg_sp_hist">
			<option value="10" <?php if ($kpg_sp_hist=='10') echo "selected=\"true\""; ?>>10</option>
			<option value="25" <?php if ($kpg_sp_hist=='25') echo "selected=\"true\""; ?>>25</option>
			<option value="50" <?php if ($kpg_sp_hist=='50') echo "selected=\"true\""; ?>>50</option>
			<option value="75" <?php if ($kpg_sp_hist=='75') echo "selected=\"true\""; ?>>75</option>
			<option value="100" <?php if ($kpg_sp_hist=='100') echo "selected=\"true\""; ?>>100</option>
		</select><br/>
		
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
  <h3>Recent Activity</h3>
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
					// switch to blog and back
					switch_to_blog($blog);
					$num_comm = wp_count_comments( );
					restore_current_blog();
					$snum = number_format_i18n($num_comm->spam);
					$mnum = number_format_i18n($num_comm->moderated );
					$anum = number_format_i18n($num_comm->total_comments);

				    $blogname=get_blog_option( $blog, 'blogname' );
					$blogadmin=esc_url( get_admin_url($blog) );
					if (substr($blogadmin,strlen($blogadmin)-1)=='/') $blogadmin=substr($blogadmin,0,strlen($blogadmin)-1);
					echo "<td style=\"font-size:.8em;padding:2px;\" align=\"center\">";
					echo "$blogname: c<a href=\"$blogadmin/edit-comments.php/\">($anum)</a>,&nbsp; 
					p<a href=\"$blogadmin/edit-comments.php?comment_status=moderated\">($mnum)</a>,&nbsp; 
					s<a href=\"$blogadmin/edit-comments.php?comment_status=spam\">($snum)</a>";
					echo "</td>";
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
  <h3>Cached Values</h3>
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
  <?php
	if (function_exists('is_multisite')&&is_multisite()) {
		echo"<h3>Multisite Maintenance - Blogs with Spam</h3>";
		$blogs=kpg_get_sp_blog_list();
		if (!empty($blogs)) {
		    echo "<table style=\"background-color:#eeeeee;\" cellspacing=\"2\" width=\"90%\">";
			echo "<tr style=\"background-color:ivory;text-align:center;\">
			<td>Blog</td><td>Comments</td><td>Pending</td><td>Spam</td></tr>";
			$nn=0;
			foreach ( (array) $blogs as $key=>$details ) {
				$blog=$details['blog_id'];
				// get the blog info for this blog
				$bname=get_blog_option($blog, 'blogname', 'unknown');
				$bdesc=get_blog_option($blog, 'blogdescription', 'unknown');
				$siteurl=esc_url(get_blog_option($blog, 'siteurl', 'unknown'));
				$blogadmin=esc_url(get_admin_url($blog));
				if (substr($blogadmin,strlen($blogadmin)-1)=='/') $blogadmin=substr($blogadmin,0,strlen($blogadmin)-1);
				switch_to_blog($blog);
				$num_comm = wp_count_comments( );
				restore_current_blog();
				$snum = number_format_i18n($num_comm->spam);
				$mnum = number_format_i18n($num_comm->moderated );
				$anum = number_format_i18n($num_comm->total_comments);
				if ($snum>0||$mnum>0) {
					echo "<tr style=\"background-color:white;\">";
					echo "<td><a href='$blogadmin/index.php'>$bname</a>:  
					$bdesc<br/>
					<a href='$siteurl'>$siteurl</a></td>";
					echo "<td align=\"center\"><a href=\"$blogadmin/edit-comments.php\"> $anum </a></td>";
					echo "<td align=\"center\"><a href=\"$blogadmin/edit-comments.php?comment_status=moderated\"> $mnum </a></td>";
					echo "<td align=\"center\"><a href=\"$blogadmin/edit-comments.php?comment_status=spam\"> $snum </a></td>";
					echo "</tr>";
					$nn++;
				}
			}
			if ($nn==0) {
				echo "<tr style=\"background-color:white;\">";
				echo "<td colspan='4' align='center'>No blogs have comments waiting for moderation or spam</td>";
				echo "</tr>";
			}
		    echo "</table>";
		}
	}
  ?>
</div>
<?php
	sfs_errorsonoff('off');

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

function kpg_stop_sp_reg_check($actions,$comment) {
	$email=urlencode($comment->comment_author_email);
	$ip=$comment->comment_author_IP;
	$action="<a title=\"Check Stop Forum Spam (SFS)\" target=\"_stopspam\" href=\"http://www.stopforumspam.com/search.php?q=$ip\">Check SFS</a> |
	 <a title=\"Check Project HoneyPot\" target=\"_stopspam\" href=\"http://www.projecthoneypot.org/search_ip.php?ip=$ip\">Check HoneyPot</a>";
	$actions['check_spam']=$action;
	return $actions;
}
function kpg_stop_sp_reg_report($actions,$comment) {
	// need to add a new action to the list
	$options=kpg_sp_get_option('kpg_stop_sp_reg_options');
	if (empty($options)) $options=array();
	if (!is_array($options)) $options=array();
	$apikey='';
	if (array_key_exists('apikey',$options)) $apikey=$options['apikey'];
	$honeyapi='';
	if (array_key_exists('honeyapi',$options)) $honeyapi=$options['honeyapi'];
	$botscoutapi='';
	if (array_key_exists('botscoutapi',$options)) $botscoutapi=$options['botscoutapi'];
    
	$email=urlencode($comment->comment_author_email);
	$exst='';
	if (empty($email)){
		$email='no_valid_email@em.em';
		$exst=' style="color:magenta;" ';
	}
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
	$action="<a $exst title=\"Report to Stop Forum Spam (SFS)\"target=\"_stopspam\" href=\"http://www.stopforumspam.com/add?username=$uname&email=$email&ip_addr=$ip&evidence=$evidence&api_key=$apikey\">Report to SFS</a>";
	$actions['report_spam']=$action;
	return $actions;

}


function kpg_stop_sp_reg_init() {
	// we need to find out if it is OK to add the init
	if(!current_user_can('manage_options')) return;
	if (function_exists('is_multisite') && is_multisite()) {
		add_action('mu_rightnow_end','kpg_sp_rightnow');
	} 
	if (current_user_can( 'manage_network' )) {
		add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options',__FILE__,'kpg_stop_sp_reg_control');
		add_filter('comment_row_actions','kpg_stop_sp_reg_check',1,2);	
		add_filter('comment_row_actions','kpg_stop_sp_reg_report',1,2);	
		add_action('rightnow_end', 'kpg_sp_rightnow');
		add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
		return;
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
	
	
	$muswitch=get_sp_mu_option();
	if (!current_user_can( 'manage_network' )&& $muswitch=='Y') return; // we are already not at blog 1 so if wpmu switch is Y get out and don't show options.
	add_options_page('Stop Spammers', 'Stop Spammers', 'manage_options',__FILE__,'kpg_stop_sp_reg_control');
	add_filter('comment_row_actions','kpg_stop_sp_reg_check',1,2);	
	add_filter('comment_row_actions','kpg_stop_sp_reg_report',1,2);	
	add_action('rightnow_end', 'kpg_sp_rightnow');
	add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
	
	return;

}
function kpg_sp_plugin_action_links( $links, $file ) {
	if ( basename($file) == basename(__FILE__))  {
		$me=admin_url('options-general.php?page='.plugin_basename(__FILE__));
		$links[] = "<a href=\"$me\">".__('Settings').'</a>';
	}

	return $links;
}


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
	kpg_sp_delete_option('kpg_stop_sp_reg_options'); 
	kpg_sp_delete_option('kpg_stop_sp_reg_stats'); 
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
*  kpg_sp_get_option($op) and kpg_sp_update_option($options,$op)
*
*	These are use to get and set options in WPMU 
*	It may be that the admin doesn't want the users to see
*   the options and stats
*
*   added the opotion name to the function so that we can use two options.
*
***********************************************************************/
$kpg_sp_wpmu=''; // bad programing form, but I would like to avoid a db hit here

function kpg_set_mu_switch() {
	global $kpg_sp_wpmu;
	if ($kpg_sp_wpmu=='N'||$kpg_sp_wpmu=='Y') {
		return;
	}
	if (!(function_exists('is_multisite') && is_multisite()) ) {
		$kpg_sp_wpmu='N';
		return;
	}
	// 
	$op='kpg_stop_sp_reg_options';
	$kpg_sp_wpmu='Y';
	$muswitch=kpg_sp_get_option($op);
	if ($muswitch!='N') $muswitch='Y';
	if ($muswitch=='N') $kpg_sp_wpmu='N';
	return;
}
function get_sp_mu_option() {
	if (function_exists('is_multisite') && is_multisite()) {
		switch_to_blog(1);
		$op='kpg_stop_sp_reg_options';
		$ansa=get_option( $op );
		if (empty($ansa)) $ansa=array();
		if (!is_array($ansa)) $ansa=array();
		restore_current_blog();
		$muswitch='Y';
		if (array_key_exists('muswitch',$ansa)) $muswitch=$ansa['muswitch'];
		if ($muswitch!='N') $muswitch='Y';
		return $muswitch;
	} else {
		return 'N';
	}
}

function set_sp_mu_option($muswitch) {
	if (function_exists('is_multisite') && is_multisite()) {
		switch_to_blog(1);
		$op='kpg_stop_sp_reg_options';
		$ansa=get_option( $op );
		if (empty($ansa)) $ansa=array();
		if (!is_array($ansa)) $ansa=array();
		$ansa['muswitch']=$muswitch;
		$ansa=update_option($op, $ansa);
		restore_current_blog();
		return $muswitch;
	} else {
		return 'N';
	}
}




function kpg_sp_get_option($op) {
	global $kpg_sp_wpmu;
	kpg_set_mu_switch();
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
}

function kpg_sp_update_option($options,$op) {
	global $kpg_sp_wpmu;
	kpg_set_mu_switch();
	if ($kpg_sp_wpmu=='N') {
		return update_option($op, $options);	
	} else if  ($kpg_sp_wpmu=='Y') {
		switch_to_blog(1);
		$ansa=update_option($op, $options);
		restore_current_blog();
		return $ansa;
	}
}
function kpg_sp_delete_option($op) {
	global $kpg_sp_wpmu;
	//$op='kpg_stop_sp_reg_options';
	// may leave some stray options around if the blog was not running wpmu aware for a while.
	// need to delete from current blog as well as master blog.
	if (function_exists('is_multisite') && is_multisite()) {
		switch_to_blog(1);
		$ansa=delete_option($op);	
		restore_current_blog();
	}
	$kpg_sp_wpmu='N';
	return delete_option($op);	
}
// special request to add to "right now section of the admin page

// WP 2.5+
function kpg_sp_rightnow() {
 	$options=kpg_sp_get_option('kpg_stop_sp_reg_options');
	if (empty($options)) $options=array();
	$stats=kpg_sp_get_option('kpg_stop_sp_reg_stats');
	if (empty($stats)) $stats=array();
	if (!is_array($options)) $options=array();
	if (!is_array($stats)) $stats=array();
	$spmcount=0;
    if (array_key_exists('spmcount',$stats)) $spmcount=$stats['spmcount'];
 	if (!is_numeric($spmcount)) $spmcount=0;
	$nobuy='N';
	if (array_key_exists('nobuy',$options)) $nobuy=$options['nobuy'];
    if ($nobuy!='Y') $nobuy='N'; 
 		$me=admin_url('options-general.php?page='.plugin_basename(__FILE__));
   if ($spmcount>0) {
    // steal the akismet stats css format 
		// get the path to the plugin
		echo "<p><a style=\"font-style:italic;\" href=\"$me\">Stop Spammer Registrations</a> has prevented $spmcount spammers from registering or leaving comments.";
		if ($nobuy=='N') echo "  <a style=\"font-style:italic;\" href=\"http://www.blogseye.com/buy-the-book/\">Buy Keith Graham&apos;s Science Fiction Book</a>";
		echo"</p>";
	} else {
		echo "<p><a style=\"font-style:italic\" href=\"$me\">Stop Spammer Registrations</a> has not stopped any spammers, yet.";
		if ($nobuy=='N') echo "  <a style=\"font-style:italic\" href=\"http://www.blogseye.com/buy-the-book/\">Buy Keith Graham&apos;s Science Fiction Book</a>";
		echo"</p>";
	}
}

// here are the debug functions
// change the debug=false to debug=true to start debugging.
// the plugin will drop a file sfs_debug_output.txt in the current directory (root, wp-admin, or network) 
// directory must be writeable or plugin will crash.

function sfs_errorsonoff($old=null) {
	$debug=false;  // change to true to debug
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
