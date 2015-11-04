<?php
//Include wordpress files
$wp_blog_header_path = '';
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php'))
{
    $wp_blog_header_path = $_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php';
}
    else if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php'))
{
    $wp_blog_header_path = $_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php';
}

if($wp_blog_header_path != '') {
    //Include Wordpress
    include($wp_blog_header_path);
    header("HTTP/1.0 200 OK");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="da-DK" xml:lang="da-DK">
  <head>
    <title xmlns="">Brug af denne vejledning</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="/comments/feed/" />
    <link rel="stylesheet" type="text/css" media="print" href="/wp-content/themes/light-wordpress-theme/print.css" />
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="/download/" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="shortcut icon" href="/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta xmlns="" http-equiv="X-UA-Compatible" content="chrome=1" />
    <script async="true" xmlns="" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script async="true" xmlns="" type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-3824272-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
  </head>
  <body class="single single-post">
    <div id="wrapper" class="hfeed">
      <div id="header">
        <div id="branding">
          <div id="blog-title">
            <span>
              <a href="/" title="Ubuntu Danmark" rel="home">Ubuntu Danmark</a>
            </span>
          </div>
          <div id="blog-description">Danske brugere</div>
        </div>
        <div id="access">
          <div id="loco-header-menu">
            <ul id="primary-header-menu"><?php
            ob_start();
            dynamic_sidebar('primary-header-menu');
            $primary_header_menu = ob_get_clean();
            $primary_header_menu = str_replace(' menu-item-635', ' menu-item-635 current-menu-item', $primary_header_menu);
            $primary_header_menu = str_replace(' menu-item-637', ' menu-item-637 current-menu-item', $primary_header_menu);
            echo($primary_header_menu);
            ?></ul>
          </div>
        </div>
      </div>
      <div id="secondary-header">
        <div id="secondary-access">
          <div id="loco-search-form">
            <form id="searchform" method="get" action="/help/10.04/search.php">
              <div>
                <input id="s" name="s" type="text" value="" size="32" tabindex="1" />
                <input id="searchsubmit" name="searchsubmit" type="submit" value="Søg" tabindex="2" />
              </div>
            </form>
          </div>
          <div id="loco-sub-header-menu"></div>
        </div>
      </div>
      <div id="main">
        <div id="container">
          <div id="content">
            <div class="page type-page hentry" style="-moz-border-radius: 5px 5px 5px 5px;">
              <h1 class="entry-title">Brug af denne vejledning</h1>
              <div class="entry-content">
                <div class="sect1" title="Brug af denne vejledning">
                  <p>
      <span class="emphasis"><em>"I Linux er der grafiske brugergrænseflader (GUIs), hvor du kan pege og klikke og trække, og forhåbentligt få ordnet dine sager uden først at læse en bunke dokumentation. Det traditionelle Unix-miljø er en kommandolinjegrænseflade (CLI), hvor du indtaster kommandoer for at fortælle computeren, hvad den skal gøre. Det er hurtigere og mere effektivt, men kræver at du først finder ud af hvad kommandoer er." -- fra <span class="strong"><strong>man intro(1)</strong></span></em></span>
    </p>
                  <p>Denne vejledning vil gøre dig bekendt med grundlæggende GNU/Linux-skalkommandoer. Det er ikke meningen, at det skal være en fuldstændig guide til kommandolinjen, blot en introduktion til at komplimentere Ubuntus grafiske værktøjer.</p>
                  <p>
      </p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Alle kommandonavne, filnavne eller stier til kataloger vil blive vist i en <span class="command"><strong>fastbredde-skrifttype</strong></span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Alle kommandoerne i denne vejledning skal gives fra en kommandoprompt i en <span class="application"><strong>Terminal</strong></span> og vil blive vist som: </p>
                        <code class="screen">kommando der skal skrives</code>
                      </li>
                      <li class="listitem">
                        <p><span class="strong"><strong>Bemærk at Linux skelner mellem store og små bogstaver.</strong></span> Bruger, bruger og BRUGER er alle forskellige i Linux.</p>
                      </li>
                    </ul>
                  </div>
                  <p>
    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Brug af kommandolinjen</h3>
              <ul>
                <li><a href="using-this-guide.php">Brug af denne vejledning</a></li>
                <li><a href="starting-terminal.php">Start en terminal</a></li>
                <li><a href="files-directories-commands.php">Fil- og katalogkommandoer</a><ul>
                  <li><a href="files-directories-commands.php#cd">cd</a></li>
                  <li><a href="files-directories-commands.php#pwd">pwd</a></li>
                  <li><a href="files-directories-commands.php#ls">ls</a></li>
                  <li><a href="files-directories-commands.php#cp">cp</a></li>
                  <li><a href="files-directories-commands.php#mv">mv</a></li>
                  <li><a href="files-directories-commands.php#rm">rm</a></li>
                  <li><a href="files-directories-commands.php#mkdir">mkdir</a></li></ul></li>
                <li><a href="sys-info-commands.php">Kommandoer vedr. systeminformation</a><ul>
                  <li><a href="sys-info-commands.php#df">df</a></li>
                  <li><a href="sys-info-commands.php#free">free</a></li>
                  <li><a href="sys-info-commands.php#top">top</a></li>
                  <li><a href="sys-info-commands.php#uname">uname</a></li>
                  <li><a href="sys-info-commands.php#lsb_release">lsb_release</a></li></ul></li>
                <li><a href="elevated-privileges.php">Udfør kommandoer med særlige rettigheder</a><ul>
                  <li><a href="elevated-privileges.php#add-group">Tilføj en ny gruppe</a></li>
                  <li><a href="elevated-privileges.php#add-user">Tilføj en ny bruger</a></li></ul></li>
                <li><a href="options.php">Tilvalg</a></li>
                <li><a href="man-help.php">"Man" og at finde hjælp</a><ul>
                  <li><a href="man-help.php#searching-ma">Søg efter man-filer</a></li></ul></li>
                <li><a href="cut-paste.php">Klip og indsæt</a></li>
                <li><a href="other-things.php">Andre nyttige ting</a><ul>
                  <li><a href="other-things.php#save-typing">Gem ved skrivning</a></li>
                  <li><a href="other-things.php#change-text">Ændr teksten</a></li></ul></li>
                <li><a href="more-info.php">Mere information</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div id="footer">
        <div id="siteinfo"></div>
      </div>
    </div>
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
