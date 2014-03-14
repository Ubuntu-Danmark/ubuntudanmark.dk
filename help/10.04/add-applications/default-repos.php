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
    <title xmlns="">Oversigt over standard-programpakkearkiver i Ubuntu</title>
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
    <link rel="prev" href="restricted-software.php" title="Hvad er begrænset og ikke-fri software?" />
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
              <h1 class="entry-title">Oversigt over standard-programpakkearkiver i Ubuntu</h1>
              <div class="entry-content">
                <div class="sect1" title="Oversigt over standard-programpakkearkiver i Ubuntu">
                  <p>Når du installerer software på Ubuntu, henter pakkehåndteringen automatisk de nødvendige softwarepakker fra et <span class="emphasis"><em>softwarearkiv</em></span>, et sted på internettet, som gemmer samlinger af pakker, der er klar til at blive hentet.</p>
                  <p>Der findes tusindvis af programmer til rådighed til installering på Ubuntu. Disse programmer er lagret i softwarearkiver og er stillet frit til rådighed for alle Ubuntu-brugere. Dette gør det meget nemt at installere nye programmer, og er også meget sikkert, fordi hvert program, du installerer, er bygget specielt til Ubuntu og kontrolleres, før det bliver tilføjet til arkivet.</p>
                  <div class="sect2" title="Software-arkiver">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="default-repos-main"></a>Software-arkiver</h3>
                        </div>
                      </div>
                    </div>
                    <p>For at organisere softwaren, er Ubuntu-arkiverne kategoriseret i fire grupper: <span class="emphasis"><em>Main</em></span>, <span class="emphasis"><em>Restricted</em></span>, <span class="emphasis"><em>Universe</em></span> og <span class="emphasis"><em>Multiverse</em></span>. Baggrunden for hvilken software der kommer i de enkelte kategorier, afhænger på det understøttelsesniveau som software-udviklerholdene giver til programmet, og i hvilken grad programmet stemmer overens med <a class="ulink" href="http://www.ubuntu.com/ubuntu/philosophy" target="_top">Filosofien om fri software</a>.</p>
                    <p>Den almindelige Ubuntu-installations-cd indeholder software fra kategorierne <span class="emphasis"><em>Main</em></span> og <span class="emphasis"><em>Restricted</em></span>.</p>
                    <p>Hvis dit system er forbundet til internettet, vil der være mange flere programmer, som du kan installere. For eksempel er <span class="quote">“<span class="quote">Universe</span>”</span>- og <span class="quote">“<span class="quote">Multiverse</span>”</span>-arkiverne kun tilgængelige over internettet.</p>
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
                            <p><span class="emphasis"><em>Multiverse</em></span>-arkivet indeholder software, som er blevet klassificeret som <span class="emphasis"><em>ikke-fri</em></span>. Denne software er muligvis ikke tilladt i nogle jurisdiktioner. Hver gang du installerer en pakke fra dette arkiv, bør du undersøge, om dit lands love tillader dig at bruge den. Desuden modtager denne software muligvis ikke sikkerhedsopdateringer.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Opdateringspakkearkiv">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="default-repos-update"></a>Opdateringspakkearkiv</h3>
                        </div>
                      </div>
                    </div>
                    <p>Opdateringshåndteringen finder automatisk softwareopdateringer til din computer, når de er tilgængelige. Den indsamler regelmæssigt oplysninger om potentielle opdateringer fra en række opdateringskilder på nettet.</p>
                    <p>Hvis du klikker <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Softwarekilder</span> og vælger fanebladet <em class="guilabel">Opdateringer</em>, vil du bemærke, at fire opdateringskilder er tilgængelige. En beskrivese af hver af disse findes nedenfor:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="strong"><strong>Vigtige sikkerhedsopdateringer:</strong></span> Opdateringer som retter kritiske sikkerhedsmæssige fejl, er til rådighed via denne kilde. Det anbefales at alle brugere lader denne kilde forblive aktiveret (den bør være aktiveret som standard).</p>
                        </li>
                        <li class="listitem">
                          <p><span class="strong"><strong>Anbefalede opdateringer:</strong></span> Opdateringer der retter alvorlige software problemer (som ikke er sikkerhedshuller), stilles til rådighed via denne kilde. De fleste brugere bør lade denne kilde være aktiveret, da amlindelige og irriterende problemer ofte løses med disse opdateringer.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="strong"><strong>Ikke-frigivne opdateringer:</strong></span> Opdateringer, som i øjeblikket testes, før de frigives til alle, er tilgængelige gennem denne opdateringskilde. Du kan aktivere denne kilde hvis du vil hjælpe med at teste nye opdateringer (og få rettelser af problemer hurtigere). Vær opmærksom på, at disse opdateringer måske endnu ikke er grundigt afprøvet, og det kan ikke anbefales, at du aktiverer denne kilde, med mindre du kan acceptere lejlighedsvise problemer.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="strong"><strong>Ikke-understøttede opdateringer:</strong></span> Når nye versioner af populær software bliver frigivet, bliver de undertiden <span class="quote">“<span class="quote">tilbageporteret</span>”</span> til en ældre version af Ubuntu, så brugerne kan drage nytte af nye funktioner og rettelser af problemer. Disse backports er ikke understøttet, der kan opstå problemer, når de er installeret, og bør kun anvendes af personer der har desperat brug for en ny version af en softwarepakke, som de ved er blevet tilbageporteret.</p>
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
