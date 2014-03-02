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
    <title xmlns="">Tilføjelse et softwarepakkearkiv</title>
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
    <link rel="prev" href="removing.php" title="Fjern et program" />
    <link rel="next" href="offline.php" title="Installer softwarepakker uden en internetforbindelse" />
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
              <h1 class="entry-title">Tilføjelse et softwarepakkearkiv</h1>
              <div class="entry-content">
                <div class="sect1" title="Tilføjelse et softwarepakkearkiv">
                  <p>Software er tilgængelig fra tredjepartskilder, såvel som fra standard Ubuntu-softwarepakkearkiver. Hvis du vil installere software fra et tredjeparts-softwarepakkearkiv, skal du føje det til pakkehåndteringens liste over tilgængelige arkiver.</p>
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
                          <p>Tilføj kun softwarekilder fra steder du stoler på. Tredjeparts softwarekilder bliver ikke kontrolleret for sikkerhed af Ubuntu-medlemmer og kan indeholde software, som er skadelig for din computer.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Åbn <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Softwarekilder</span> og vælg <em class="guilabel">Anden software</em>.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Klik på <span class="guibutton"><strong>Tilføj</strong></span> for at tilføje et nyt arkiv.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Indtast APT-linjen for det ekstra pakkearkiv. Linjen bør kunne findes på hjemmesiden for pakkearkivet, og den skal se ud i denne stil:</p>
                        <pre class="programlisting">deb http://archive.ubuntu.com/ubuntu/ lucid main</pre>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Klik på <span class="guibutton"><strong>Tilføj kilde</strong></span> og klik derefter på <span class="guibutton"><strong>Luk</strong></span> for at gemme dine ændringer.</p>
                      </li>
                      <li class="step" title="Trin 5">
                        <p>Du vil blive underrettet om, at informationen om tilgængelig software er forældet. Klik på <span class="guibutton"><strong>Genindlæs</strong></span>.</p>
                      </li>
                      <li class="step" title="Trin 6">
                        <p>Pakker fra det nye arkiv vil nu være tilgængelig i dit pakkehåndteringsprogram.</p>
                      </li>
                    </ol>
                  </div>
                  <p>Som en sikkerhedsforanstaltning benytter de fleste softwarearkiver en GPG-nøgle til digitalt at underskrive de filer, de leverer. Dette gør det nemt at kontrollere, at filerne ikke er blevet ændret siden deres oprettelse. For at din pakkehåndtering kan være i stand til at kontrollere dette, skal du bruge den offentlige nøgle, der modsvarer signaturerne. Nøglen bør kunne hentes fra arkivets hjemmeside.</p>
                  <p>Hent GPG-nøglen. Klik derefter på <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Softwarekilder</span>, vælg fanen <em class="guilabel">Godkendelse</em>, klik <span class="guibutton"><strong>Importér Nøglefil…</strong></span> og vælge GPG-nøglen, der skal importeres.</p>
                  <p>Du kan også tilføje GPG-nøglen ved at indtaste følgende kommando i terminalen:</p>
                  <pre class="screen">
                    <span class="command">
                      <strong>sudo apt-key adv --recv-keys --keyserver keyserver.ubuntu.com key-fingerprint</strong>
                    </span>
                  </pre>
                  <div class="sect2" title="Tilføjelse af et personligt pakkearkiv (PPA)">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="adding-ppa"></a>Tilføjelse af et personligt pakkearkiv (PPA)</h3>
                        </div>
                      </div>
                    </div>
                    <p><a class="ulink" href="https://launchpad.net/" target="_top">Launchpad</a> giver alle brugere deres eget personlige pakkearkiv (PPA), som kan bruges til at bygge og opbevare Ubuntu-pakker. Ligesom du kan tilføje en almindelig softwarekilde, kan du også tilføje et PPA til pakkehåndteringens liste over tilgængelige kilder. Et PPA fungerer som et almindeligt Ubuntu-arkiv. Du kan installere software på den sædvanlige måde -- eksempelvis ved hjælp af apt-get eller synaptic -- og Ubuntu vil bede dig om at installere opdateringer, når de bliver tilgængelige.</p>
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
                            <p>Du henter og installerer PPA-pakker på egen risiko. Ubuntu, Launchpad og Canonical er ikke ansvarlige for disse pakker. Du skal være sikker på at du har tillid til PPA-ejeren, før du installerer deres software.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <p>Før du starter bør du gøre dig fortrolig med <a class="xref" href="adding-repos.php" title="Tilføjelse et softwarepakkearkiv">“Tilføjelse et softwarepakkearkiv”</a>.</p>
                    <p>APT-linjen for en PPA kan findes på PPA-oversigtssiden på Launchpad, og vil ligne følgende:</p>
                    <pre class="programlisting">deb http://ppa.launchpad.net/<span class="emphasis"><em>bruger</em></span>/ppa/<span class="emphasis"><em>ppa-navn</em></span> lucid main</pre>
                    <p>Som en sikkerhedsforanstaltning bruger alle PPA'er en unik GPG-nøgle til digitalt at underskrive de pakker, de leverer. Det gør det nemt at kontrollere, at pakkerne ikke er blevet ændret siden Launchpad byggede dem, og for at sikre at du henter fra den PPA, du ønsker. For at dit pakkehåndteringsprogram skal kunne kontrollere dette, skal du bruge den offentlige nøgle, der modsvarer signaturerne. Nøglen bør være tilgængelig i oversigtssiden for PPA'en på Launchpad. Du vil se advarsler om, at du henter fra en ikke-betroet kilde, indtil du tilføjer PPA'ens nøgle til dit system.</p>
                    <p>Nøglen der bruges til at underskrive en PPA, er anført på PPA-oversigtssiden. Instruktioner om hvordan en nøgle tilføjes kan findes i <a class="xref" href="adding-repos.php" title="Tilføjelse et softwarepakkearkiv">“Tilføjelse et softwarepakkearkiv”</a>.</p>
                    <p>Yderligere oplysninger om tilføjelse af en PPA-softwarekilde kan findes på <a class="ulink" href="https://help.launchpad.net/Packaging/PPA" target="_top">Launchpad</a>.</p>
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
