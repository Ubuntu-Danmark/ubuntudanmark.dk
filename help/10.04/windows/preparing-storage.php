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
    <title xmlns="">Flyt dine data på sikker vis</title>
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
              <h1 class="entry-title">Flyt dine data på sikker vis</h1>
              <div class="entry-content">
                <div class="sect1" title="Flyt dine data på sikker vis">
                  <p>Når du har samlet alle de filer og indstillinger, som du kan få brug for, skal du oprette en kopi af dem, som kan gemmes sikkert, mens du installerer Ubuntu. Der er mange måder at gemme en kopi af disse data på, og hvilken metode du vælger vil afhænge af dine særlige omstændigheder.</p>
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
                          <p>Efter du har lavet en kopi af dine filer, er det meget vigtigt at <span class="strong"><strong>teste filerne</strong></span> for at sikre at de er blevet kopieret korrekt. Hvis du har mange filer, så kontroller i det mindste de vigtigste filer og tilfældigt andre filer såvidt muligt. Dette vil medvirke til at beskytte dig mod tab af data.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="sect2" title="Direkte overførsel">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-storage-direct"></a>Direkte overførsel</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du installerer Ubuntu på en anden computer end den hvor dine data er gemt, kan du lade de data du har samlet ligge på denne computer, og sikkert overføre din data, når Ubuntu er installeret på den anden computer.</p>
                    <p>Når du er klar, kan du overføre data mellem computere ved hjælp af en netværksforbindelse.</p>
                  </div>
                  <div class="sect2" title="Cd- eller dvd-disk">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-storage-cddvd"></a>Cd- eller dvd-disk</h3>
                        </div>
                      </div>
                    </div>
                    <p>En typisk og pålidelig måde at sikkerhedskopiere data er ved hjælp af en brændbar cd- eller dvd-skive. Cd'er og dvd'er kan bruges af næsten alle computere, og er relativt billige. Dog skal din computer have et cd- eller dvd-brænderdrev drev installeret, og det kan være nødvendigt for dig at bruge flere cd'er eller dvd'er, hvis de data du har indsamlet, er større end kapaciteten af en enkelt disk.</p>
                    <p>Hvis det er muligt så brug dvd'er, da disse har en større kapacitet, og derved skal du bruge færre skiver for at gemme al din data. Cd'er har typisk en kapacitet på 650-700MB, mens DVD'er, der normalt kan rumme op til 4,5 GB data (hvilket nogenlunde svarer til 7 cd'er).</p>
                    <p>For at gemme data på en tom cd eller dvd, skal du bruge et <span class="emphasis"><em>cd-brænder</em></span> program. Microsoft Windows XP indeholder en sådan program som standard, selv om andre sådanne programmer vil være i stand til at lagre dine data lige så godt.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Sikre dig at dit cd- eller dvd-brænder ikke indeholder en diske. Fjern eventuelle disks fra drevet.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Start</span> → <span class="guimenuitem">Denne computer</span>. Find dit cd- eller dvd-bænderdrev - det vil sandsynligvis have et navn som f.eks <em class="guilabel">cd-rw-drev</em>.</p>
                        </li>
                        <li class="listitem">
                          <p>Dobbelt-klik på ikonet for drevet. En tom mappe bør åbne, med overskriften <em class="guilabel">Cd-skrivningsopgaver</em> vises i det blå panelet til venstre på skærmen.</p>
                        </li>
                        <li class="listitem">
                          <p>Efterlad mappen åben og åben derefter den mappe der indeholder de filer som du har samlet sammen.</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg så mange filer, som du kan få på den disken du har valgt at bruge. Du kan kontrollere størrelsen af den aktuelle markering ved at højreklikke på en af de valgte filer og vælge <em class="guilabel">Egenskaber</em> fra menuen der vises. Feltet <em class="guilabel">Størrelse</em> under fanen <em class="guilabel">Generelt</em> viser størrelsen af den aktuelle markering.</p>
                        </li>
                        <li class="listitem">
                          <p>Kopier de valgte filer til cd- eller dvd-drevet, som du åbnede tidligere.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guibutton"><strong>Skriv disse filer til cd</strong></span>, som kan findes i det blå panel. <span class="application"><strong>Guiden Cd-skrivning</strong></span> startes.</p>
                        </li>
                        <li class="listitem">
                          <p>Følg intruktionerne i <span class="application"><strong>Guiden Cd-skrivning</strong></span>. Dette vil skrive de valgte filer til en tom cd eller dvd.</p>
                        </li>
                        <li class="listitem">
                          <p>Skub cd'en ud når brændingen er færdig, og sæt den derefter tilbage i drevet. Åbn drevet, under <code class="filename">Denne computer</code>, og kontroller at de filer du lige har kopieret til cd'en er synlige der. Prøv at åbne nogle af dem bare for at være sikker.</p>
                        </li>
                        <li class="listitem">
                          <p>Gentag denne procedure, indtil alle de filer, du har samlet sammen, er gemt sikkert på cd'er eller dvd'er.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Når du har gemt din data på skiver, sikre dig at skiverne er godt beskyttet og mærkes korrekt. Hvis du ridser eller beskadiger en skive, kan du miste nogle af de filer, der lagres på skiven. Mærkning af skiverne hjælper også til at undgå forvirring, og vil give dig mulighed for hurtigt at finde din data, når tid kommer til at overføre det til en computer.</p>
                  </div>
                  <div class="sect2" title="Ekstern harddisk eller andre flytbare drev">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-storage-removable"></a>Ekstern harddisk eller andre flytbare drev</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du har adgang til en ekstern harddisk eller en anden flytbar lagringsenhed, med en stor nok kapacitet, så kan du bare kopiere de filer du har samlet til denne enhed. Når du er klar til at overføre filer til din Ubuntu installation, kan du blot tilslutte drevet og kopiere filerne tilbage fra den igen.</p>
                    <p>Flytbare lagerenheder såsom eksterne harddiske vil have en bestemt type <span class="emphasis"><em>filsystem</em></span>. <span class="emphasis"><em>FAT</em></span> (også kaldet <span class="emphasis"><em>FAT32</em></span> eller <span class="emphasis"><em>vfat</em></span>) er det bedst understøttede filsystem til brug på flytbare enheder i Ubuntu.</p>
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
                            <p>Bemærk venligst at FAT32 kun understøtter en maksimal filstørrelse på 4GB. Hvis du har planer om at overføre større filer, som dvd-aftryk, bør du vælge et andet filsystem, såsom NTFS.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <p>Du kan se formatet af en ekstern disk ved at højreklikke på det i <code class="filename">Denne computer</code> og vælge <em class="guilabel">Egenskaber</em>. Formatet på disken vises i fanen <em class="guilabel">Generelt</em> under <em class="guilabel">Filsystem</em>.</p>
                  </div>
                  <div class="sect2" title="Netværksdeling">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-storage-network"></a>Netværksdeling</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis din computer er tilsluttet et netværk, kan du være i stand til midlertidigt at gemme, de filer som du har samlet sammen, på en anden computer på netværket.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Sikre dig at en computer på netværket har tilstrækkelig diskplads til at give dig mulighed for at kopiere dine filer over på den.</p>
                        </li>
                        <li class="listitem">
                          <p>Sikre dig at du er i stand til at kopiere filer over på den anden computer fra din computer. For at kunne gøre dette, skal computeren have mindst én <span class="emphasis"><em>netværksdeling/delte mappe</em></span>, og du skal have <span class="emphasis"><em>skriverettigheder</em></span> til netværksdelingen.</p>
                        </li>
                        <li class="listitem">
                          <p>Åbn netværksdelingen på din computer. Dette kan normalt tilgås ved at trykke på <span class="guimenuitem">Start</span> → <span class="guimenuitem">Denne computer</span> → <span class="guimenuitem">Netværkssteder</span> og derefter finde netværksdelingen eller computeren som udbyder netværksshare.</p>
                        </li>
                        <li class="listitem">
                          <p>Kopier de filer, du har samlet, over i netværksdelingen. Afhængig af størrelse på dine filer og hastigheden af din netværksforbindelse, kan dette tage noget tid.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Sekundære harddiskpartition">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-storage-partition"></a>Sekundære harddiskpartition</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du har en anden partition til rådighed på harddisken, eller har to harddiske, så er det muligt at kopiere de filer du har samlet, til det andet drev.</p>
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
                            <p>Vær meget forsigtig med ikke at overskrive den partition, som du har gemt dine data på. Det anbefales at lave en ekstra sikkerhedskopi af dine filer på cd'er eller dvd'er i tilfælde af dette.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <p>Du skal blot kopiere de filer, du har samlet, til det andet drev som det vises i <code class="filename">Denne computer</code>. Sikr dig, at dette drev (eller denne partition)  <span class="strong"><strong>ikke</strong></span> er det, som du har tænkt dig at installere Ubuntu på.</p>
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
                <li><a href="preparing.php">1. Forberedelse til skiftet</a><ul>
                    <li><a href="preparing-converting-file-types.php">Konvertering af ikke-understøttede filtyper</a><ul>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-audio">Konvertering af ikke-understøttede lydformater</a></li>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-video">Konvertering af ikke understøttede videoformater</a></li>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-office">Konvertering af ikke-understøttede kontordokumentformater</a></li>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-specific">Konvertering fra programspecifikke formater</a></li></ul></li>
                    <li><a href="preparing-settings-internet.php">Indstillinger for internetforbindelse</a><ul>
                      <li><a href="preparing-settings-internet.php#preparing-settings-internet-dialup">Opkaldsinternetforbindelse</a></li>
                      <li><a href="preparing-settings-internet.php#preparing-settings-internet-broadband">Bredbåndsinternetforbindelse</a></li>
                      <li><a href="preparing-settings-internet.php#preparing-settings-internet-proxy">Indstillinger til proxyserver</a></li></ul></li>
                    <li><a href="preparing-settings-network.php">Indstillinger for netværk</a><ul>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-home">Hjemmenetværk</a></li>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-windows">Windows-netværk</a></li>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-wireless">Trådløse netværk</a></li>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-vpn">VPN'er</a></li></ul></li>
                    <li><a href="preparing-settings-im.php">Chatindstillinger</a></li>
                    <li><a href="preparing-bookmarks.php">Bogmærker fra netbrowser</a><ul>
                      <li><a href="preparing-bookmarks.php#preparing-bookmarks-ie">Internet Explorer</a></li>
                      <li><a href="preparing-bookmarks.php#preparing-bookmarks-firefox">Mozilla Firefox</a></li>
                      <li><a href="preparing-bookmarks.php#preparing-bookmarks-opera">Opera</a></li></ul></li>
                    <li><a href="preparing-email.php">E-post og kontoindstillinger</a><ul>
                      <li><a href="preparing-email.php#preparing-email-msoe">Microsoft Outlook Express</a></li>
                      <li><a href="preparing-email.php#preparing-email-msoutlook">Microsoft Office Outlook</a></li>
                      <li><a href="preparing-email.php#preparing-email-import">Forberedning af e-post til eksport med Mozilla Thunderbird</a></li>
                      <li><a href="preparing-email.php#preparing-email-thunderbird">Eksport af e-post-beskeder fra Mozilla Thunderbird</a></li></ul></li>
                    <li><a href="preparing-storage.php">Flyt dine data på sikker vis</a><ul>
                      <li><a href="preparing-storage.php#preparing-storage-direct">Direkte overførsel</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-cddvd">Cd- eller dvd-disk</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-removable">Ekstern harddisk eller andre flytbare drev</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-network">Netværksdeling</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-partition">Sekundære harddiskpartition</a></li></ul></li>
                <li><a href="md.php">2. Overførsel af dine data til Ubuntu</a><ul>
                  <li><a href="md-files.php">Filer</a><ul>
                    <li><a href="md-files.php#md-files-photos">Import af fotos</a></li>
                    <li><a href="md-files.php#md-files-music">Import af musik</a></li></ul></li>
                  <li><a href="md-emails.php">E-post</a></li>
                  <li><a href="md-contacts.php">Kontakter-/Adressebog</a></li>
                  <li><a href="md-calendar.php">Kalender</a></li>
                  <li><a href="md-bookmarks.php">Browser-bogmærker/foretrukne</a></li></ul></li>
                <li><a href="glossary.php">Liste over Windowsord</a></li>
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
