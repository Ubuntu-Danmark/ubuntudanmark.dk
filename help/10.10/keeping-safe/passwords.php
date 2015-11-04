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
    <title xmlns="">Adgangskoder</title>
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
    <link rel="home" href="index.php" title="Hold din computer sikker" />
    <link rel="up" href="index.php" title="Hold din computer sikker" />
    <link rel="prev" href="index.php" title="Hold din computer sikker" />
    <link rel="next" href="users.php" title="Tildel en separat brugerkonto til hver person" />
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
            $primary_header_menu = str_replace(' menu-item-636', ' menu-item-636 current-menu-item', $primary_header_menu);
            echo($primary_header_menu);
            ?></ul>
          </div>
        </div>
      </div>
      <div id="secondary-header">
        <div id="secondary-access">
          <div id="loco-search-form">
            <form id="searchform" method="get" action="/help/10.10/search.php">
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
              <h1 class="entry-title">Adgangskoder</h1>
              <div class="entry-content">
                <div class="sect1" title="Adgangskoder">
                  <p>Hold din adgangskode sikker. Hvis du ønsker at ændre den, kan du gøre det ved at åbne <span class="application"><strong>Om mig</strong></span> (<span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Om mig</span>) og klikke <span class="guibutton"><strong>Skift adgangskode…</strong></span>.</p>
                  <p>Det er muligt at logge automatisk ind i Ubuntu.</p>
                  <div class="warning" title="Advarsel" style="margin-left: 0.5in; margin-right: 0.5in;">
                    <table border="0" summary="Warning">
                      <tr>
                        <td rowspan="2" align="center" valign="top" width="25">
                          <img alt="[Advarsel]" src="../libs/admon/warning.png" />
                        </td>
                        <th align="left"></th>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <p>Automatisk logind frarådes kraftigt, da det mindsker sikkerheden for dit system.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="orderedlist">
                    <ol class="orderedlist" type="1">
                      <li class="listitem">
                        <p>Åbn <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Logindskærm</span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk på <span class="guibutton"><strong>Lås op</strong></span> og indtast din adgangskode for at få adgang til indstillingerne</p>
                      </li>
                      <li class="listitem">
                        <p>Marker <em class="guilabel">Log automatisk ind som</em>.</p>
                      </li>
                      <li class="listitem">
                        <p>Vælg et brugernavn fra rullelisten, som skal logges ind.</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk på <span class="guibutton"><strong>Luk</strong></span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Ændringerne vil træde i kraft ved genstart.</p>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Hold din computer sikker</h3>
              <ul>
              <li><a href="passwords.php">Adgangskoder</a></li>
              <li><a href="users.php">Tildel en separat brugerkonto til hver person</a></li>
              <li><a href="updates.php">Hold din software opdateret</a></li>
              <li><a href="lock-screen.php">Lås din skærm mens du er væk</a></li>
              <li><a href="firewall.php">Sæt en firewall op</a>
                  <ul>
                  <li><a href="firewall.php#id406848">Firewall konfigurationsværktøjer</a></li>
                  <li><a href="firewall.php#id451691">Test af firewallen og overvågning af netværkstrafik</a></li>
                  </ul>
              </li>
              <li><a href="avoid-internet-crime.php">Undgå internetirritation og -kriminalitet</a></li>
              <li><a href="backup-files.php">Opret sikkerhedskopier af dine filer</a></li>
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
