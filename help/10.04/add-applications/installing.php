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
    <title xmlns="">Installation af et program</title>
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
    <link rel="home" href="index.php" title="Tilføj, fjern og opdatér programmer" />
    <link rel="up" href="index.php" title="Tilføj, fjern og opdatér programmer" />
    <link rel="prev" href="installation-windows-ubuntu.php" title="Hvordan er softwareinstallation på Ubuntu anderledes end på Windows?" />
    <link rel="next" href="removing.php" title="Fjern et program" />
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
              <h1 class="entry-title">Installation af et program</h1>
              <div class="entry-content">
                <div class="sect1" title="Installation af et program">
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Klik på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Ubuntu Softwarecenter</span> og søg efter et program, eller vælg en kategori og find et program på listen.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Vælg det program du er interesseret i, og klik på <span class="guibutton"><strong>Installér</strong></span>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Du vil blive bedt om at indtaste din adgangskode. Når du har gjort dette vil installationen begynde, såfremt du har en fungerende internetforbindelse.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Installationen afsluttes normalt hurtigt, men kan tage lidt tid, hvis du har en langsom internetforbindelse. Når den er færdig, vil dit nye program være klart til brug. De fleste programmer kan tilgås fra menuen Programmer.</p>
                      </li>
                    </ol>
                  </div>
                  <p>Kig i <a class="ulink" href="../software-center/" target="_top">manualen til Ubuntu softwarecenter</a> for flere oplysninger om brug af <span class="application"><strong>Ubuntu softwarecenter</strong></span>.</p>
                  <div class="sect2" title="Andre metoder til at installere programmer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="installing-others"></a>Andre metoder til at installere programmer</h3>
                        </div>
                      </div>
                    </div>
                    <div class="sect3" title="Brug Synaptic-pakkehåndteringen">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="installing-synaptic"></a>Brug Synaptic-pakkehåndteringen</h4>
                          </div>
                        </div>
                      </div>
                      <p>Synaptic kan bruges til at håndtere avancerede softwarepakker (såsom serverprogrammer), som Softwarecenter ikke håndterer.</p>
                      <div class="procedure">
                        <ol class="procedure" type="1">
                          <li class="step" title="Trin 1">
                            <p>Klik på  <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Synaptic - pakkehåndtering</span>. Indtast din adgangskode, hvis du bliver spurgt om denne.</p>
                          </li>
                          <li class="step" title="Trin 2">
                            <p>Klik på <span class="guibutton"><strong>Søg</strong></span> for at søge efter et program, eller tryk på <span class="guibutton"><strong>Sektioner</strong></span> og gennemse kategorierne.</p>
                          </li>
                          <li class="step" title="Trin 3">
                            <p>Højreklik på det program, du vil installere, og vælg <em class="guilabel">Markér til installation</em>.</p>
                          </li>
                          <li class="step" title="Trin 4">
                            <p>Hvis du bliver spurgt, om du ønsker at markere yderligere ændringer, skal du klikke på <span class="guibutton"><strong>Markér</strong></span>.</p>
                          </li>
                          <li class="step" title="Trin 5">
                            <p>Vælg øvrige programmer, du ønsker at installere.</p>
                          </li>
                          <li class="step" title="Trin 6">
                            <p>Klik på <span class="guibutton"><strong>Anvend</strong></span>, og klik derefter på <span class="guibutton"><strong>Anvend</strong></span> i det vindue der vises. De programmer, du har valgt, vil blive hentet og installeret.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Hent og installér en .deb pakke">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="installing-deb"></a>Hent og installér en .deb pakke</h4>
                          </div>
                        </div>
                      </div>
                      <p>Du kan hente og installere programmer fra websteder. Disse programmer er pakket i Debian-pakker (.deb). Sådan installerer du en Debian-pakke:</p>
                      <div class="procedure">
                        <ol class="procedure" type="1">
                          <li class="step" title="Trin 1">
                            <p>Hent pakken fra en hjemmeside.</p>
                          </li>
                          <li class="step" title="Trin 2">
                            <p>Dobbeltklik på pakken. Den vil blive åbnet i pakkeinstallations-programmet.</p>
                          </li>
                          <li class="step" title="Trin 3">
                            <p>Klik på <span class="guibutton"><strong>Installér</strong></span> for at installere pakken.</p>
                          </li>
                        </ol>
                      </div>
                      <p>Det kan ikke anbefales at installere enkeltpakker på denne måde af følgende grunde:</p>
                      <div class="itemizedlist">
                        <ul class="itemizedlist" type="disc">
                          <li class="listitem">
                            <p>Pakkernes sikkerhed er ikke blevet kontrolleret af Ubuntu-medlemmer, og de kan indeholde software, der kan skade din computer. Du bør kun hente enkeltpakker fra websteder, som du har tillid til.</p>
                          </li>
                          <li class="listitem">
                            <p>Pakken kan kræve yderligere software for at køre, som ikke kan installeres automatisk. Du bliver nødt til at finde og installere denne software selv.</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="sect3" title="Klik på et link på en webside">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="installing-webpage"></a>Klik på et link på en webside</h4>
                          </div>
                        </div>
                      </div>
                      <p>Nogle websider har links, som installerer programmer, når du klikker på dem. Disse er kendt som <span class="quote">“<span class="quote">apt:</span>”</span>-links. Når du har klikket på linket, bliver du spurgt om hvorvidt du vil installere ekstra software. Klik <span class="guibutton"><strong>Installér</strong></span> for at starte installationen.</p>
                      <p>Programmet kan kun hentes og installeres, hvis det er tilgængelig i de softwarearkiver, som i øjeblikket er aktiveret på din computer. Dette betyder, at hjemmesider ikke kan narre dig til at installere software, som er potentielt skadelige for din computeren.</p>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
