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
    <title>Programmer til forskellige opgaver</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="theme-color" content="#dd4814" />
    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="/support/" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/light-wordpress-theme/style.css" />
    <link rel="pingback" href="/xmlrpc.php" />
    <link rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="/comments/feed/" />
    <link rel="stylesheet" type="text/css" media="print" href="/wp-content/themes/light-wordpress-theme/print.css" />
    <script async="true" type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script async="true" type="text/javascript" src="/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" type="text/javascript" src="/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
    <link rel="index" title="Ubuntu Danmark" href="/" />
    <link rel="prev" title="Om Ubuntu" href="/om-ubuntu/" />
    <link rel="next" title="Download" href="/download/" />
    <link rel="canonical" href="/support/" />
    <link rel="shortcut icon" href="/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <script async="true" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script async="true" type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-3824272-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
    <link rel="home" href="index.php" title="Ny bruger af Ubuntu?" />
    <link rel="up" href="index.php" title="Ny bruger af Ubuntu?" />
    <link rel="prev" href="desktop.php" title="Finde rundt på skrivebordet" />
    <link rel="next" href="connecting.php" title="Opretter forbindelse til internettet" />
    <style type="text/css">
    .itemizedlist, .itemizedlist li {
        list-style:none;
        margin:0;
    }
    .itemizedlist img {
        vertical-align:text-bottom;
        margin:0;
    }
    </style>
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
              <h1 class="entry-title">Programmer til forskellige opgaver</h1>
              <div class="entry-content">
                <div class="section" title="Programmer til forskellige opgaver">
                  <p>Ubuntu indeholder fra start en bred vifte af programmer. Disse inkluderer:</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img  src="../libs/img/firefox24.png" /></span> Surf på internettet med <span class="guimenu">Programmer</span> → <span class="guisubmenu">Internet</span> → <span class="guimenuitem">Firefox Web Browser</span></p>
                      </li>
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img src="../libs/img/evolution.png" /></span> Håndter e-post and kalender med <span class="guimenu">Programmer</span> → <span class="guimenuitem">Kontor</span> → <span class="guimenuitem">Evolution E-post og Kalender</span></p>
                      </li>
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img src="../libs/img/empathy24.png" /></span> Chat og lav video opkald med <span class="guimenuitem">Programmer</span> → <span class="guimenuitem">Internet</span> → <span class="guimenuitem">Empathy - IM-Klient</span></p>
                      </li>
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img src="../libs/img/f-spot24.png" /></span> Importer, organiser og rediger billeder med <span class="guimenu">Programmer</span> → <span class="guimenuitem">Grafik</span> → <span class="guimenuitem">F-Spot fotohåndtering</span></p>
                      </li>
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img src="../libs/img/applications-office.png" /></span> Komplet kontorpakke <span class="application"><strong>Openoffice.org</strong></span> under <span class="guimenu">Programmer</span> → <span class="guimenuitem">Kontor</span></p>
                      </li>
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img src="../libs/img/rhythmbox24.png" /></span> Importer, køb og organiser musik med <span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd og video</span> → <span class="guimenuitem">Rhythmbox musikafspiller</span></p>
                      </li>
                      <li class="listitem">
                        <p><span class="inlinemediaobject"><img src="../libs/img/ubuntuone24.png" /></span> Sikkerhedskopier og synkroniser filer med <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Ubuntu One</span></p>
                      </li>
                    </ul>
                  </div>
                  <div class="tip" title="Vink" style="margin-left: 0.5in; margin-right: 0.5in;">
                    <table border="0" summary="Tip">
                      <tr>
                        <td rowspan="2" align="center" valign="top" width="25">
                          <img alt="[Vink]" src="../libs/admon/tip.png" />
                        </td>
                        <th align="left"></th>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <p>Du kan finde og installere flere programmer med et enkelt tryk på en knap. Se <a class="xref" href="add-applications.php" title="Tilføj programmer">“Tilføj programmer”</a> for forklaring.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Ny bruger af Ubuntu?</h3>
              <ul>
              <li><a href="welcome.php">Velkommen til Ubuntu</a></li>
              <li><a href="desktop.php">Finde rundt på skrivebordet</a></li>
              <li><a href="applications.php">Programmer til forskellige opgaver</a></li>
              <li><a href="connecting.php">Opretter forbindelse til internettet</a></li>
              <li><a href="add-applications.php">Tilføj programmer</a></li>
              <li><a href="music-video.php">Afspil musik og videoer</a></li>
              <li><a href="updates.php">Hold dig opdateret</a></li>
              <li><a href="help.php">Find mere information/hjælp</a></li>
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
