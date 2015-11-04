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
    <title xmlns="">Hvad er begrænset og ikke-fri software?</title>
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
    <link rel="home" href="index.php" title="Tilføj, fjern og opdatér programmer" />
    <link rel="up" href="index.php" title="Tilføj, fjern og opdatér programmer" />
    <link rel="prev" href="offline.php" title="Installer softwarepakker uden en internetforbindelse" />
    <link rel="next" href="default-repos.php" title="Oversigt over standard-programpakkearkiver i Ubuntu" />
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
              <h1 class="entry-title">Hvad er begrænset og ikke-fri software?</h1>
              <div class="entry-content">
                <div class="sect1" title="Hvad er begrænset og ikke-fri software?">
                  <p>Hovedparten af den software, der er til rådighed til Ubuntu er fri software med åben kildekode. Denne software er fri for alle at installere og bruge, og folk kan ændre og genudgive softwaren, hvis de ønsker. Ubuntu er bygget af denne type software.</p>
                  <p><span class="strong"><strong>Ikke-fri software</strong></span> er software, der ikke frit kan videredistribueres eller ændres. Dette gør det vanskeligt for Ubuntu-udviklere at forbedre denne software og løse problemer med den. Derfor anbefales det, at du bruger <a class="ulink" href="http://www.ubuntu.com/ubuntu/philosophy" target="_top">fri software</a> i stedet.</p>
                  <p><span class="strong"><strong>Begrænset software</strong></span> er software, hvor der er begrænsninger i brugen heraf, som forhindrer det i at blive klassificeret som fri software. Ikke-fri software er en form for begrænset software hvor begrænsningen består i softwaren har en ikke-fri licens. Andre årsager til at software klassificeres som ikke-fri kan være af juridisk karakter (brug af visse typer af software er ulovlig i nogle lande) og patentforhindringer (noget software kræver en patentlicens for at kunne bruges lovligt).</p>
                  <p>I nogle tilfælde er begrænset software den eneste mulighed. Sådanne tilfælde omfatter software til afspilning af lyd og video i visse formater, visse skrifttyper og <a class="ulink" href="../hardware/jockey.php" target="_top">drivere til visse grafikkort</a>.</p>
                  <p>Når du installere begrænset software, vil du modtage en advarsel fra pakkehåndteringen. Hvis den begrænsede software ikke kan bruges lovligt i dit land, er der ikke meget, du kan gøre; du bør ikke installere softwaren. Hvis softwaren er begrænset, blot fordi den ikke er fri, kan du vælge at bruge den (for eksempel i tilfælde af drivere til grafikkort). Vær opmærksom på, at det meste begrænsede software ikke er understøttet i Ubuntu, og problemer med denne type software ofte ikke kan løses af Ubuntu-udviklere.</p>
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
                          <p>Undertiden er det svært at afgøre, hvorfor en bestemt softwarepakke er begrænset. Hvis dette er tilfældet, kan du søge rådgivning på <a class="ulink" href="/forum/" target="_top">Ubuntu Danmarks forum</a>. Hvis du stadig ikke kan finde ud af, hvorfor en pakke er begrænset, bør du udvise forsigtighed med at installere den, da det kan være ulovligt at bruge den i dit land.</p>
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
