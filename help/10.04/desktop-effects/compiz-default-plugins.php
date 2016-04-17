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
    <title>Brug af tastaturgenveje med visuelle effekter</title>
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
    <link rel="home" href="index.php" title="Visuelle effekter" />
    <link rel="up" href="index.php" title="Visuelle effekter" />
    <link rel="prev" href="compiz-configure.php" title="Konfigurering af visuelle effekter" />
    <link rel="next" href="compiz-configure-advanced.php" title="Aktivering af ekstra effekter" />
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
              <h1 class="entry-title">Brug af tastaturgenveje med visuelle effekter</h1>
              <div class="entry-content">
                <div class="sect1" title="Brug af tastaturgenveje med visuelle effekter">
                  <p>Ubuntu inkluderer ekstra udvidelselsesmoduler til <span class="application"><strong>Compiz</strong></span>, som giver ekstra funktionalitet med visse tastaturkombinationer. Eksempler på disse udvidelsesmoduler er Programskifter, Galleri og Skalering.</p>
                  <p>Disse ekstra udvidelsesmoduler er forklaret i dette afsnit.</p>
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
                          <p>Nogle kommandoer bruger knappen <span class="keycap"><strong>Super</strong></span>, hvilket er Windows-knappen på mange tastaturer.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="sect2" title="Programskifter">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="application-switcher"></a>Programskifter</h3>
                        </div>
                      </div>
                    </div>
                    <p>Programskifteren giver samme funktionalitet som den traditionelle GNOME og KDE ALT+TAB-skifter, men anvender direkte miniaturebillederne af vinduerne som forvisning. Du kan bruge Programskifter til at skifte mellem vinduer i forskellige sammenhænge med forskellige tastaturgenveje.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>Tab</strong></span> for at bladre til det næste vindue.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Shift</strong></span>+<span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>Tab</strong></span> for at bladre til det foregående vindue.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Ctrl</strong></span>+<span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>Tab</strong></span> for at bladre til det næste vindue i alle arbejdsområder.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Shift</strong></span>+<span class="keycap"><strong>Ctrl</strong></span>+<span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>Tab</strong></span> for at bladre til det foregående vindue i alle arbejdsområder.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Skrivebordsvæg">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="desktop-wall"></a>Skrivebordsvæg</h3>
                        </div>
                      </div>
                    </div>
                    <p>Skrivebordsvæg er et midre ressourcekrævende alternativ til Skrivebordterning. Det bruges til at skifte arbejdsområde, understøtter forhåndsvisning af arbejdsområder og kan anvende arbejdsområder på vandret og lodret plan. Udvidelsesmodulet galleri fungerer godt med udvidelsesmodulet Skrivebordsvæg.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>For at navigere i Skrivebordsvæggen, skal du trykke på <span class="keycap"><strong>Ctrl</strong></span>+<span class="keycap"><strong>Alt</strong></span> og pil op, ned, til venstre eller til højre.</p>
                        </li>
                        <li class="listitem">
                          <p>For at navigere i Skrivebordsvæggen med et vindue, skal du trykke på <span class="keycap"><strong>Ctrl</strong></span>+<span class="keycap"><strong>Skift</strong></span>+<span class="keycap"><strong>Alt</strong></span> og pil op, ned, til venstre eller til højre.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Forbedret skrivebords-zoom">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="enhanced-zoom-desktop"></a>Forbedret skrivebords-zoom</h3>
                        </div>
                      </div>
                    </div>
                    <p>Udvidelsesmodulet Forbedret skrivebordszoom, gør det muligt at zoome ind på hele skærmen, for bedre læsbarhed. Det er muligt at fortsætte med at arbejde med andre programmer, mens man er zoomet ind.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>C</strong></span> for at centrere musen på skærmen.</p>
                        </li>
                        <li class="listitem">
                          <p>Brug <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>1</strong></span> for at låse zoom-området (synsfeltet), så det ikke følger musemarkørens bevægelser.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>v</strong></span> for at ændre størrelsen på det fokuserede vindue så det fylder synsfeltet.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>r</strong></span> for at justere zoom-niveauet så vinduet fylder synsfeltet.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Galleri">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="expo"></a>Galleri</h3>
                        </div>
                      </div>
                    </div>
                    <p>Som standard aktiveres Galleri ved at flytte musemarkøren til øverste venstre hjørne af skærmen eller ved at trykke <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>E</strong></span>. Dette får visningområdet til at zoome ud indtil alle visningområder er skalerede og synlige på skærmen i en gitterformation, komplet med alle åbne vinduer.</p>
                  </div>
                  <div class="sect2" title="Negativ">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="negative"></a>Negativ</h3>
                        </div>
                      </div>
                    </div>
                    <p>Udvidelsesmodulet Negativ sørger hurtigt for vinduer i høj kontrast, til synshandicappede, ved at invertere farverne på de enkelte vinduer, eller alle vinduer på en gang.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>n</strong></span> for at aktivere eller deaktivere Negativ på det fokuserede vindue.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="keycap"><strong>Super</strong></span>+<span class="keycap"><strong>m</strong></span> for at aktivere eller deaktivere Negativ på skærmen.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Visningområdeskifter">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="viewport-switcher"></a>Visningområdeskifter</h3>
                        </div>
                      </div>
                    </div>
                    <p>Visningområdeskifteren bruges til at skifte et <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/overview-workspaces.html" target="_top">arbejdsområde</a> via forskellige tastetryk og knapper. Du kan bruge den med musens midterknap på skrivebordet, og ved at trykke på en tastekombination og vælge en arbejdsområdenummer.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Tryk Button5 (Rul op) for at flytte til næste arbejdsområde.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk Button4 (Rul ned) for at flytte til foregående arbejdsområde.</p>
                        </li>
                      </ul>
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
              <h3 class="widgettitle">Visuelle effekter</h3>
              <ul>
              <li><a href="compiz-intro.php">Hvad er visuelle effekter?</a></li>
              <li><a href="compiz-configure.php">Konfigurering af visuelle effekter</a></li>
              <li><a href="compiz-default-plugins.php">Brug af tastaturgenveje med visuelle effekter</a>
                  <ul>
                  <li><a href="compiz-default-plugins.php#application-switcher">Programskifter</a></li>
                  <li><a href="compiz-default-plugins.php#desktop-wall">Skrivebordsvæg</a></li>
                  <li><a href="compiz-default-plugins.php#enhanced-zoom-desktop">Forbedret skrivebords-zoom</a></li>
                  <li><a href="compiz-default-plugins.php#expo">Galleri</a></li>
                  <li><a href="compiz-default-plugins.php#negative">Negativ</a></li>
                  <li><a href="compiz-default-plugins.php#viewport-switcher">Visningområdeskifter</a></li>
                  </ul>
              </li>
              <li><a href="compiz-configure-advanced.php">Aktivering af ekstra effekter</a></li>
              <li><a href="compiz-problems.php">Almindelige problemer</a></li>
              <li><a href="compiz-moreinfo.php">Yderligere information</a></li>
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
