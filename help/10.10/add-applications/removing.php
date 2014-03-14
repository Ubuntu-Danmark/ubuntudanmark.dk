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
    <title xmlns="">Fjern et program</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" media="print" href="/wp-content/themes/light-wordpress-theme/print.css" />
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/jquery.corner.js?ver=2.08"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/slider/jquery.nivo.slider.pack.js?ver=2"></script>
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
    <link rel="home" href="index.php" title="Tilføj, fjern og opdatér programmer" />
    <link rel="up" href="index.php" title="Tilføj, fjern og opdatér programmer" />
    <link rel="prev" href="installing.php" title="Installation af et program" />
    <link rel="next" href="adding-repos.php" title="Tilføjelse et softwarepakkearkiv" />
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
              <h1 class="entry-title">Fjern et program</h1>
              <div class="entry-content">
                <div class="sect1" title="Fjern et program">
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Klik på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Ubuntu softwarecenter</span>.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Find det program, som du ønsker at fjerne på listen eller ved at søge efter det i sektionen <span class="emphasis"><em>Installeret software</em></span>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Vælg et program og klik på <span class="guibutton"><strong>Fjern</strong></span>.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Du vil blive bedt om at indtaste din adgangskode. Når du har gjort dette, vil programmet blive fjernet. Det burde ikke tage særlig lang tid.</p>
                      </li>
                    </ol>
                  </div>
                  <div class="note" title="Bemærk" style="margin-left: 0.5in; margin-right: 0.5in;">
                    <table border="0" summary="Note">
                      <tr>
                        <td rowspan="2" align="center" valign="top" width="25">
                          <img alt="[Bemærk]" src="../libs/admon/note.png" />
                        </td>
                        <th align="left"></th>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <p>Nogle programmer afhænger af at andre er installeret for at virke korrekt. Hvis du forsøger at fjerne et program som er nødvendigt for et andet program, vil begge blive fjernet. Du vil blive bedt om at bekræfte, at du vil udføre disse handlinger, før programmerne bliver fjernet.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <p>Kig i <a class="ulink" href="../software-center/" target="_top">manualen til Ubuntu softwarecenter</a> for flere oplysninger om brug af <span class="application"><strong>Ubuntu softwarecenter</strong></span>.</p>
                  <p>Hvis det program, du ønsker at fjerne, ikke er tilgængeligt i <span class="application"><strong>Ubuntu softwarecenter</strong></span>, skal du bruge Synaptic (<span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Synaptic - pakkehåndtering</span>) for at fjerne det i stedet.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Tilføj, fjern og opdatér programmer</h3>
              <ul>
              <li><a href="installation-windows-ubuntu.php">Hvordan er softwareinstallation på Ubuntu anderledes end på Windows?</a></li>
              <li><a href="installing.php">Installation af et program</a>
                  <ul>
                  <li><a href="installing.php#installing-others">Andre metoder til at installere programmer</a></li>
                  </ul>
              </li>
              <li><a href="removing.php">Fjern et program</a></li>
              <li><a href="adding-repos.php">Tilføjelse et softwarepakkearkiv</a>
                  <ul>
                  <li><a href="adding-repos.php#adding-ppa">Tilføjelse af et personligt pakkearkiv (PPA)</a></li>
                  </ul>
              </li>
              <li><a href="offline.php">Installer softwarepakker uden en internetforbindelse</a>
                  <ul>
                  <li><a href="offline.php#ubuntu-installation-cd">Installér pakkefiler ved hjælp af Ubuntus installations-cd</a></li>
                  <li><a href="offline.php#repository-cds">Aktivere andre cd'er som kan bruges til at installere pakker</a></li>
                  <li><a href="offline.php#aptoncd">Brug APTonCD til at installere pakker</a></li>
                  </ul>
              </li>
              <li><a href="restricted-software.php">Hvad er begrænset og ikke-fri software?</a></li>
              <li><a href="default-repos.php">Oversigt over standard-programpakkearkiver i Ubuntu</a>
                  <ul>
                  <li><a href="default-repos.php#default-repos-main">Software-arkiver</a></li>
                  <li><a href="default-repos.php#default-repos-update">Opdateringspakkearkiv</a></li>
                  </ul>
              </li>
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
