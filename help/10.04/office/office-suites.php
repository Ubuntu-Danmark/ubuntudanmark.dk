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
    <title xmlns="">Kontorpakker</title>
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
    <link rel="home" href="index.php" title="Kontor" />
    <link rel="up" href="index.php" title="Kontor" />
    <link rel="prev" href="index.php" title="Kontor" />
    <link rel="next" href="office-oohelp.php" title="Få hjælp til OpenOffice" />
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
              <h1 class="entry-title">Kontorpakker</h1>
              <div class="entry-content">
                <div class="sect1" title="Kontorpakker">
                  <p>Der er flere kontorpakker tilgængelige til Ubuntu. En kontorpakke er en samling af kontorprogrammer, som sammen kan bruges til at udføre en række opgaver.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p><span class="application"><strong>OpenOffice.org</strong></span> er installeret som standard. Den har god kompatibilitet med <span class="application"><strong>Microsoft Office</strong></span> og har mange professionelle funktioner.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>GNOME Office</strong></span> er en valgfri kontorpakke, med vægt på enkelhed og brugervenlighed.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>KOffice</strong></span> er en kontorpakke bygget til KDE. Den er meget omfattende og byder på flere nye funktioner, herunder en høj grad af integration mellem forskellige programmer i pakken.</p>
                      </li>
                    </ul>
                  </div>
                  <div class="table">
                    <a id="id573483"></a>
                    <p class="title">
                      <b>Tabel 1. Sammenligning af kontorpakkefunktioner</b>
                    </p>
                    <div class="table-contents">
                      <table summary="Sammenligning af kontorpakkefunktioner" border="1">
                        <colgroup>
                          <col />
                          <col />
                          <col />
                          <col />
                        </colgroup>
                        <thead>
                          <tr>
                            <th>Komponent</th>
                            <th>OpenOffice.org</th>
                            <th>GNOME Kontor</th>
                            <th>KOffice</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Tekstbehandlingsprogram</td>
                            <td>X</td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Regneark</td>
                            <td>X</td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Præsentationsredigering</td>
                            <td>X</td>
                            <td> </td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Database</td>
                            <td>X</td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Tegning/Illustrationsredigering</td>
                            <td>X</td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Billedredigering</td>
                            <td> </td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Teknisk diagram-/Flowchart-redigering</td>
                            <td> </td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Projektplanlægger</td>
                            <td> </td>
                            <td>X</td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Formelredigering</td>
                            <td>X</td>
                            <td> </td>
                            <td>X</td>
                          </tr>
                          <tr>
                            <td>Rapportdesigner</td>
                            <td> </td>
                            <td> </td>
                            <td>X</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <br class="table-break" />
                  <p>
                    <span class="emphasis">
                      <em>En <span class="quote">“<span class="quote">X</span>”</span> angiver, at kontorpakken har den givne funktion.</em>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Kontor</h3>
              <ul>
              <li><a href="office-suites.php">Kontorpakker</a></li>
              <li><a href="office-oohelp.php">Få hjælp til OpenOffice</a></li>
              <li><a href="office-dtp.php">DTP og tegneprogrammer</a></li>
              <li><a href="office-finance.php">Finansprogrammer</a></li>
              <li><a href="office-document-templates.php">Anskaffelse af dokumentskabeloner</a></li>
              <li><a href="sending-office-documents.php">Folk kan ikke åbne dokumenter, som jeg har sendt til dem</a></li>
              <li><a href="create-pdfs.php">Hvordan kan jeg oprette kopier af mine dokumenter i PDF-format?</a></li>
              <li><a href="finding-clipart.php">Finde billedudklip (clipart) til brug i dokumenter</a></li>
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
