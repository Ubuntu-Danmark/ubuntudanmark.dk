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
    <title xmlns="">Installer softwarepakker uden en internetforbindelse</title>
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
    <link rel="prev" href="adding-repos.php" title="Tilføjelse et softwarepakkearkiv" />
    <link rel="next" href="restricted-software.php" title="Hvad er begrænset og ikke-fri software?" />
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
              <h1 class="entry-title">Installer softwarepakker uden en internetforbindelse</h1>
              <div class="entry-content">
                <div class="sect1" title="Installer softwarepakker uden en internetforbindelse">
                  <p>Hvis du ikke er forbundet til internettet, kan du bruge en cd, der indeholder pakke filer, til at installere programmer på din computer. Ubuntu installations-cd'en kan bruges til dette formål, og andre cd'er med forskellige pakker er også tilgængelige. Derudover kan programmet <span class="application"><strong>APTonCD</strong></span> automatisk gemme installerede pakker fra dit system, og oprette cd'er med indholdet af forskellige arkiver på dem.</p>
                  <div class="sect2" title="Installér pakkefiler ved hjælp af Ubuntus installations-cd">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-installation-cd"></a>Installér pakkefiler ved hjælp af Ubuntus installations-cd</h3>
                        </div>
                      </div>
                    </div>
                    <p>Visse pakker fra Ubuntu-pakkearkiverne <span class="emphasis"><em>Main</em></span> og <span class="emphasis"><em>Restricted</em></span> kan installeres fra Ubuntu-installations-cd'en. Du skal blot indsætte din Ubuntu-installations-cd og åbne <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Synaptic - pakkehåndtering</span>. For kun at se pakkerne på Ubuntu-installations-cd'en, skal du klikke på knappen <span class="guibutton"><strong>Oprindelse</strong></span> i nederste venstre hjørne af Synaptic-vinduet. Pakkerne vil stå opført under sektionen <span class="guimenuitem">Ubuntu 10.10_Maverick_Meerkat</span>.</p>
                    <p>Hvis pakkerne ikke vises, kan det være, fordi cd'en ikke står nævnt som et pakkearkiv (cd'en burde som standard være anført som et arkiv). For at tilføje cd'en som et pakkearkiv, skal du følge instruktionerne i <a class="xref" href="offline.php#repository-cds" title="Aktivere andre cd'er som kan bruges til at installere pakker">“Aktivere andre cd'er som kan bruges til at installere pakker”</a> herunder.</p>
                  </div>
                  <div class="sect2" title="Aktivere andre cd'er som kan bruges til at installere pakker">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="repository-cds"></a>Aktivere andre cd'er som kan bruges til at installere pakker</h3>
                        </div>
                      </div>
                    </div>
                    <p>For at gøre det muligt for Synaptic og andre pakkehåndteringer at installere software fra cd'er, som indeholder pakker:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Softwarekilder</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guibutton"><strong>Anden software</strong></span> og klik på knappen <span class="guibutton"><strong>Tilføj cd-rom</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Indsæt cd'en.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Pakkerne skulle herefter blive listet. For at få Synaptic til kun at vise pakker fra cd'en, skal du klikke på knappen <span class="guibutton"><strong>Oprindelse</strong></span> i det nederste venstre hjørne af Synaptic-vinduet og derefter finde navnet på cd'en på listen i øverste venstre hjørne af vinduet.</p>
                  </div>
                  <div class="sect2" title="Brug APTonCD til at installere pakker">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="aptoncd"></a>Brug APTonCD til at installere pakker</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>APTonCD</strong></span> kan bruges til at oprette en cd som indeholder alle de pakker du har installeret på dit system, eller den kan oprette cd'er med pakker eller hele arkiver, ud fra dit valg. I en pakkehåndtering såsom <span class="application"><strong>Synaptic</strong></span> skal du finde <span class="emphasis"><em>aptoncd</em></span>-pakken og installere den.</p>
                    <p>Yderligere dokumentation af APTonCD kan findes på dets hjemmeside <a class="ulink" href="http://aptoncd.sourceforge.net" target="_top"> aptoncd.sourceforge.net</a></p>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
