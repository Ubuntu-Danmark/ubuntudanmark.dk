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
    <title xmlns="">Opret en live-USB</title>
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
    <link rel="home" href="index.php" title="Opret en USB-opstartsdisk" />
    <link rel="up" href="index.php" title="Opret en USB-opstartsdisk" />
    <link rel="prev" href="requirements.php" title="Krav" />
    <link rel="next" href="booting-from-the-live-usb.php" title="Opstart fra live-USB" />
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
              <h1 class="entry-title">Opret en live-USB</h1>
              <div class="entry-content">
                <div class="sect1" title="Opret en live-USB">
                  <div class="sect2" title="Hent Ubuntu-aftrykket">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="download-the-ubuntu-image"></a>Hent Ubuntu-aftrykket</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hent Ubuntu fra <a class="ulink" href="http://www.ubuntu.com/download" target="_top">Ubuntu-hjemmesiden</a>.</p>
                    <p>Brug <span class="application"><strong>Opret en USB-opstartsdisk</strong></span> sammen med en standard-Ubuntu med skrivebordsmiljø. Andre versioner som Server og Netbook Remix har yderligere systemkrav, der ikke er kompatible med <span class="application"><strong>Opret en USB-opstartsdisk</strong></span>.</p>
                    <p>Den hentede aftryksfil har endelsen ".iso".</p>
                  </div>
                  <div class="sect2" title="Ubuntu-system">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-system"></a>Ubuntu-system</h3>
                        </div>
                      </div>
                    </div>
                    <p>
				</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Indsæt din USB-disk i computerens USB-drev. Kontrollér at computeren genkender USB-disken, før du fortsætter.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Opret en USB-opstartsdisk</span> for at starte <span class="application"><strong>Opret en USB-opstartsdisk</strong></span></p>
                        </li>
                        <li class="listitem">
                          <p>Klik på knappen <span class="guibutton"><strong>Andet...</strong></span> under <em class="guilabel">Kildediskaftryk (.iso) eller cd:</em>, og vælg det Ubuntu-aftryk, du hentede i det forrige trin. Hvis du opretter USB-disken fra en live-cd, skal du indsætte live-cd'en, <span class="application"><strong>Opret en USB-opstartsdisk</strong></span> vil automatisk genkende den.</p>
                        </li>
                        <li class="listitem">
                          <p>Din USB-disk er fremhævet under <em class="guilabel">USB-disk som skal anvendes:</em>. Hvis du har mere end ét element på listen, skal du vælge den USB-disk du vil bruge til din live-USB.</p>
                        </li>
                        <li class="listitem">
                          <p>For at gøre live-USB til en skrivbar disk, skal du angive hvor meget hukommelse der skal bruges som lagerplads. Hvis du ikke ønsker at live-USB skal kunne ændres, skal du vælge den anden mulighed, <em class="guilabel">Kasseres ved lukning, medmindre du gemmer dem andre steder</em>.</p>
                        </li>
                        <li class="listitem">
                          <p>Klik <span class="guibutton"><strong>Lav opstartsdisk</strong></span> for at opret opstartsdisk live-USB.</p>
                        </li>
                      </ol>
                    </div>
                    <p>
			</p>
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
                            <p><span class="application"><strong>Opret en USB-opstartsdisk</strong></span> vil slette alt data fra USB-disken. Sikkerhedskopiér eventuelle filer du ikke ønsker slettet.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Ikke-Ubuntu-system">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="non-ubuntu-system"></a>Ikke-Ubuntu-system</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du ikke har adgang til et system som kører Ubuntu, er det stadig muligt at bruge <span class="application"><strong>Opret en USB-opstartsdisk</strong></span> til at oprette en live-USB. Du kan starte fra en live-cd og køre <span class="application"><strong>Opret en USB-opstartsdisk</strong></span> fra live-cd-miljøet. Du kan også installere Ubuntu i et virtuelt miljø som VirtualBox.</p>
                    <div class="sect3" title="Opret en live-USB fra en live-cd">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="live-usb-from-live-cd"></a>Opret en live-USB fra en live-cd</h4>
                          </div>
                        </div>
                      </div>
                      <p>
					</p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Kopier Ubuntu-aftrykket til en placering på din harddisk, som du har adgang til, mens du kører live-cd-miljøet. Du kan kopiere aftrykket til en offentligt tilgængelig mappe på din harddisk eller du kan kopiere det over på et eksternt-drev.</p>
                          </li>
                          <li class="listitem">
                            <p>Når du har sikret dig, at du kan få adgang til Ubuntu-aftrykket, mens du befinder dig i live-cd'en, skal du følge trinnene i de foregående afsnit for at oprette en live-USB.</p>
                          </li>
                        </ol>
                      </div>
                      <p>
				</p>
                    </div>
                    <div class="sect3" title="Opret en live-USB i et virtuelt Ubuntu-Miljø">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="live-usb-in-vm"></a>Opret en live-USB i et virtuelt Ubuntu-Miljø</h4>
                          </div>
                        </div>
                      </div>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Kopiér Ubuntu-aftrykket til en mappe, der deles af både det virtuelle miljø og dit system. Læs de specifikke instruktioner til dit virtualiseringsprogram, for at finde ud af, hvordan du opretter delte mapper. Du kan også bruge en live-cd, hvis det virtuelle miljø har adgang til dit cd-drev.</p>
                          </li>
                          <li class="listitem">
                            <p>Indsæt USB-disken. Sørg for, at det virtuelle miljø kan montere USB-disken.</p>
                          </li>
                          <li class="listitem">
                            <p>Når du har sikret dig, at du kan få adgang til både Ubuntu-aftrykket og USB-disken fra den virtuelle Ubuntu-installation, skal du følge trinnene i forrige afsnit for at oprette en live-USB.</p>
                          </li>
                        </ol>
                      </div>
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
              <h3 class="widgettitle">Opret en USB-opstartsdisk</h3>
              <ul>
              <li><a href="introduction.php">Introduktion</a></li>
              <li><a href="requirements.php">Krav</a></li>
              <li><a href="making-a-live-usb.php">Opret en live-USB</a>
                  <ul>
                  <li><a href="making-a-live-usb.php#download-the-ubuntu-image">Hent Ubuntu-aftrykket</a></li>
                  <li><a href="making-a-live-usb.php#ubuntu-system">Ubuntu-system</a></li>
                  <li><a href="making-a-live-usb.php#non-ubuntu-system">Ikke-Ubuntu-system</a></li>
                  </ul>
              </li>
              <li><a href="booting-from-the-live-usb.php">Opstart fra live-USB</a></li>
              <li><a href="troubleshooting.php">Fejlfinding</a></li>
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
