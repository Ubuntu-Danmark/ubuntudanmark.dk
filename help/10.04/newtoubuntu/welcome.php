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
    <title xmlns="">Velkommen til Ubuntu</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/jquery.corner.js?ver=2.08"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/jquery.nivo.slider.pack.js?ver=2"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="http://ubuntudanmark.dk/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://ubuntudanmark.dk/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="http://ubuntudanmark.dk/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="http://ubuntudanmark.dk/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="http://ubuntudanmark.dk/download/" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="shortcut icon" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta xmlns="" http-equiv="X-UA-Compatible" content="chrome=1" />
    <script xmlns="" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script xmlns="" type="text/javascript">
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
    <link rel="prev" href="index.php" title="Ny bruger af Ubuntu?" />
    <link rel="next" href="desktop.php" title="Finde rundt på skrivebordet" />
  </head>
  <body class="single single-post">
    <div id="wrapper" class="hfeed">
      <div id="header">
        <div id="branding">
          <div id="blog-title">
            <span>
              <a href="http://ubuntudanmark.dk/" title="Ubuntu Danmark" rel="home">Ubuntu Danmark</a>
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
              <h1 class="entry-title">Velkommen til Ubuntu</h1>
              <div class="entry-content">
                <div class="section" title="Velkommen til Ubuntu">
                  <img src="../libs/img/distributor-logo.png" class="alignleft" />
                  <p>Ubuntu er et fældeskabs udviklet operativsystem, perfekt til hjemmet, arbejdscomputere og servere. Uanset om du bruger det derhjemme, i skolen eller på arbejde, indeholder Ubuntu alle de programmer du får brug for.</p>
                  <p>Ubuntus vigtigste løfter er: </p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Ubuntu vil altid være gratis, og der er ingen ekstra gebyr for "enterprise"-udgaven.</p>
                      </li>
                      <li class="listitem">
                        <p>For at gøre Ubuntu brugbar for så mange mennesker som muligt indeholder Ubuntu det allerbedste, som fri software-fællesskabet kan tilbyde inden for oversættelser og tilgængeligheds-infrastruktur.</p>
                      </li>
                      <li class="listitem">
                        <p>Ubuntu udgives regelmæssigt og periodisk; der bliver lavet en ny udgivelse hver sjette måned. Hver udgivelse understøttes i mindst 18 måneder.</p>
                      </li>
                      <li class="listitem">
                        <p>Ubuntu støtter helhjertet principperne bag udvikling af åben kildekode-software (open source). Vi opfordrer folk til at bruge åben kildekode-software, forbedre det og give det videre.</p>
                      </li>
                    </ul>
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
                          <p>Se <a class="ulink" href="../about-ubuntu/" target="_top">Om Ubuntu</a>, for yderligere information om Ubuntu.</p>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
