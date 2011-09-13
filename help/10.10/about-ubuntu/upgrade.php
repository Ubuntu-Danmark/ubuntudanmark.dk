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
    <title xmlns="">Hvordan kan jeg opgradere til den seneste version af Ubuntu?</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <link xmlns="" rel="stylesheet" id="openid-css" href="http://ubuntudanmark.dk/wp-content/plugins/openid/f/openid.css?ver=519" type="text/css" media="all" />
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
    <link rel="home" href="index.php" title="Ubuntu - Linux for mennesker!" />
    <link rel="up" href="index.php" title="Ubuntu - Linux for mennesker!" />
    <link rel="prev" href="ubuntu-backing-support.php" title="Opbakning og support" />
    <link rel="next" href="about-linux.php" title="Hvad er Linux?" />
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
              <h1 class="entry-title">Hvordan kan jeg opgradere til den seneste version af Ubuntu?</h1>
              <div class="entry-content">
                <div class="sect1" title="Hvordan kan jeg opgradere til den seneste version af Ubuntu?">
                  <p>Hver sjette måned bliver der udgivet en ny version af Ubuntu. Opdateringshåndtering vil informere dig, når en ny version er tilgængelig og kan hentes. Sådan tjekker man, om der er en ny version:</p>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Åbn Softwarekilder (<span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Softwarekilder</span>) og vælg fanebladet <em class="guilabel">Opdateringer</em>.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Under <em class="guilabel">Udgivelsesopgradering</em>, kontrollér at <em class="guilabel">Almindelige udgivelser</em> er markeret og klik på <span class="guibutton"><strong>Luk</strong></span>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Åbn Opdateringshåndtering (<span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Opdateringshåndtering</span>), klik på <span class="guibutton"><strong>Kontrollér</strong></span> og indtast din adgangskode, hvis det kræves. Vent mens listen over tilgængelige opdateringer bliver hentet.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Hvis der er en ny version af Ubuntu tilgængelig, vil en boks i toppen af vinduet blive vist, der fortæller, at en ny distributionsudgivelse er tilgængelig.</p>
                      </li>
                      <li class="step" title="Trin 5">
                        <p>For at opgradere til den seneste udgivelse, gem alle dine åbne dokumenter og klik på <span class="guibutton"><strong>Opgradér</strong></span>-knappen i Opdateringshåndtering.</p>
                      </li>
                    </ol>
                  </div>
                  <p>Opgraderinger tager for det meste et stykke tid at færdiggøre. Typisk skal omkring 700 MB pakker hentes og installeres, selvom den faktiske mængde afhænger af, hvor mange pakker, der allerede er installeret på din computer.</p>
                  <p>Du kan kun opgradere til den seneste Ubuntu-udgivelse, hvis du kører den næst-seneste udgivelse. Hvis du har en ældre udgivelse, skal du opgradere til den næste udgivelse efter den og så videre, indtil du kører den nyeste version. Brugere af version 7.10 skal f.eks. opgradere til version 8.04 før en opgradering til version 8.10. En undtagelse fra denne regel er LTS-udgivelser (LangTidsSupport). Du kan opgradere direkte fra den tidligere LTS-udgivelse til den nuværende udgivelse.</p>
                  <div class="sect2" title="Opgradering til en udviklingsudgivelse">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="upgrade-development"></a>Opgradering til en udviklingsudgivelse</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du ønsker at installere og teste den seneste udviklingsversion af Ubuntu, før den bliver udgivet, tryk <span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>F2</strong></span>, skriv <strong class="userinput"><code>update-manager -c -d</code></strong> i feltet og klik på <span class="guibutton"><strong>Kør</strong></span>. Hvis der er en tilgængelig udviklingsversion, vil en <span class="guibutton"><strong>Opdatér</strong></span>-knap blive vist i Opdateringshåndtering. Klik på den for at opgradere til udviklingsversionen.</p>
                    <div class="caution" title="Pas på" style="margin-left: 0.5in; margin-right: 0.5in;">
                      <table border="0" summary="Caution">
                        <tr>
                          <td rowspan="2" align="center" valign="top" width="25">
                            <img alt="[Pas på]" src="../libs/admon/caution.png" />
                          </td>
                          <th align="left"></th>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                            <p>Udviklingsudgivelser lider ofte af pakkenedbrud og andre problemer. Installér kun en udviklingsversion, hvis du er indstillet på at forsøge at løse disse problemer selv.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Ubuntu - Linux for mennesker!</h3>
              <ul>
              <li><a href="about-ubuntu-name.php">Om navnet</a></li>
              <li><a href="free-software.php">Fri software</a></li>
              <li><a href="ubuntu-difference.php">Forskellen</a></li>
              <li><a href="ubuntu-desktop.php">Skrivebordsmiljøet</a></li>
              <li><a href="version-numbers.php">Versions- og udgivelsesnumre</a></li>
              <li><a href="ubuntu-backing-support.php">Opbakning og support</a></li>
              <li><a href="upgrade.php">Hvordan kan jeg opgradere til den seneste version af Ubuntu?</a>
                  <ul>
                  <li><a href="upgrade.php#upgrade-development">Opgradering til en udviklingsudgivelse</a></li>
                  </ul>
              </li>
              <li><a href="about-linux.php">Hvad er Linux?</a></li>
              <li><a href="about-gnu.php">Hvad er GNU?</a></li>
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
