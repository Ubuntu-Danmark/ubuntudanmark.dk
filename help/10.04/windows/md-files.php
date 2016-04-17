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
    <title>Filer</title>
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
              <h1 class="entry-title">Filer</h1>
              <div class="entry-content">
                <div class="sect1" title="Filer">
                  <p>Du vil sikkert gerne flytte dine filer til din <span class="emphasis"><em>hjemmemappe</em></span>. Det anses for god praksis at gemme <span class="emphasis"><em>alle</em></span> dine personlige filer (såsom dokumenter, billeder, musik og lignende) i din hjemmemappe. Så de alle er på en let-tilgængelige placering.</p>
                  <p>For at få adgang til din hjemmemappe, skal du trykke på <span class="guimenu">Steder</span> → <span class="guimenuitem">Hjemmemappe</span>. Du vil muligvis finde det nyttigt at have separate mapper til forskellige typer af filer, og nogle mapper kan allerede findes som standard, såsom <code class="filename">Dokumenter</code>, <code class="filename">Musik</code>, <code class="filename">Billeder</code> og <code class="filename">Videoer</code>. Dette vil medvirke til at holde ting organiseret, og du vil være i stand til at finde dine filer hurtigere og nemmere, hvis de er kategoriseret på denne måde. Du kan oprette nye mapper i din hjemmemappe ved at trykke <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Opret mappe</span>.</p>
                  <p>Hvordan du kopierer dine filer fra Windows til din hjemmemappe, vil afhænge af hvordan du besluttede at opbevare dine filer fra Windows. Se <a class="xref" href="preparing-storage.html" title="Flyt dine data på sikker vis">“Flyt dine data på sikker vis”</a> for yderligere information om dette. Uanset hvordan valgte at opbevar dine filer, er fremgangsmåden for at overføre dem, meget enkel. For en cd eller dvd for eksempel, skal du bruge følgende fremgangsmåde:</p>
                  <div class="orderedlist">
                    <ol class="orderedlist" type="1">
                      <li class="listitem">
                        <p>Indsæt disken i drevet på din computer. Efter et kort stykke tid, burde et disk-ikon vises på skrivebordet.</p>
                      </li>
                      <li class="listitem">
                        <p>Dobbeltklik på ikonet for at se indholdet af disken.</p>
                      </li>
                      <li class="listitem">
                        <p>Sikre dig, at din hjemmemappe er åben i et andet vindue. Du kan åbne din hjemmemappe ved at klikke <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Nyt vindue</span>.</p>
                      </li>
                      <li class="listitem">
                        <p>I det vindue der svarer til den disk du har indsat, skal du trykke <span class="guimenuitem">Redigér</span> → <span class="guimenuitem">Vælg alt</span>. Dette vil markere hele indholdet af disken.</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk på <span class="guimenuitem">Redigér</span> → <span class="guimenuitem">Kopiér</span> for at lave en kopi af alle valgte filer.</p>
                      </li>
                      <li class="listitem">
                        <p>I det vindue, der svarer til din hjemmemappe, skal du trykke <span class="guimenuitem">Redigér</span> → <span class="guimenuitem">Indsæt</span> for at kopiere alle filerne til din hjemmemappe. Hvis du har mange filer, kan dette tage lang tid.</p>
                      </li>
                      <li class="listitem">
                        <p>Når kopieringprocessen er færdig vil dine fil være tilgængelige som normalt.</p>
                      </li>
                    </ol>
                  </div>
                  <div class="sect2" title="Import af fotos">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="md-files-photos"></a>Import af fotos</h3>
                        </div>
                      </div>
                    </div>
                    <p>Ubuntu inkluderer <span class="application"><strong>F-Spot fotohåndteringen</strong></span>, som du kan bruge til at organisere alle dine billeder.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn din hjemmemappe, og åbn derefter mappen <span class="emphasis"><em>Billeder</em></span>. Hvis den ikke eksisterer, kan du oprette mappen ved først at trykke på <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Opret mappe</span> og dernæst skrive <strong class="userinput"><code>Billeder</code></strong>.</p>
                        </li>
                        <li class="listitem">
                          <p>Kopier alle dine billeder til mappen du lige har oprettet.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Grafik</span> → <span class="guimenuitem">F-Spot fotohåndtering</span> for at starte <span class="application"><strong>F-Spot</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Vinduet <span class="application"><strong>Importér</strong></span> bør være synligt. Hvis ikke, skal du trykke på knappen <span class="guibutton"><strong>Importér</strong></span>, eller gå til <span class="guimenuitem">Foto</span> → <span class="guimenuitem">Importér...</span> for vise det.</p>
                        </li>
                        <li class="listitem">
                          <p>Fjern markeringen ud for <em class="guilabel">Kopiér filer til fotomappen</em>, for at forhindre at der bliver gemt to kopier af dine billeder.</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg <em class="guilabel">Vælg mappe</em> fra feltet <em class="guilabel">Importkilde</em>. Vælg mappen <code class="filename">Billeder</code> i din hjemmemappe ved at klikke på den én gang.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guibutton"><strong>Importér</strong></span> for at starte importeringen. Afhængig af hvor mange billeder du har, kan dette tage et stykke tid.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Import af musik">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="md-files-music"></a>Import af musik</h3>
                        </div>
                      </div>
                    </div>
                    <p>Et andet nyttigt program som er installeret som standard i Ubuntu er <span class="application"><strong>Rhythmbox musikafspiller</strong></span>. Dette giver dig mulighed for at organisere og afspille al din musik.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn din Hjemmemappe, og åbn derefter mappen <span class="emphasis"><em>Musik</em></span>. Hvis den ikke eksisterer, kan du oprette mappen ved første at trykke på <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Opret mappe</span> og dernæst skrive <strong class="userinput"><code>Musik</code></strong>.</p>
                        </li>
                        <li class="listitem">
                          <p>Kopier alle dine musikfiler til mappen du lige har oprettet.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd og video</span> → <span class="guimenuitem">Rhythmbox musikafspiller</span> for at starte <span class="application"><strong>Rhythmbox</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Musik</span> → <span class="guimenuitem">Importér mappe...</span> for at begynde at importere din musik. Vinduet <span class="application"><strong>Importér folder til bibliotek</strong></span> vises.</p>
                        </li>
                        <li class="listitem">
                          <p>Klik på <code class="filename">Musik</code> mappen i din hjemmemappe for at markere den, og tryk derefter på <span class="guibutton"><strong>Åbn</strong></span> for at importere alt spilbart musik i denne mappe til <span class="application"><strong>Rhythmbox</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Import processen kan tage et stykke tid, afhængig af hvor mange musikfiler du har. Når den er færdig, kan du organisere og afspille din musik ved hjælp af <span class="application"><strong>Rhythmbox</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                    <p><span class="application"><strong>Rhythmbox</strong></span> vil advare dig, hvis det støder på en fil den ikke kan afspille. Det vil sandsynligt være fordi understøttelse af lydformatet den bruger, ikke er installeret i øjeblikket. Se <a class="xref" href="preparing-converting-file-types.html#preparing-converting-audio" title="Konvertering af ikke-understøttede lydformater">“Konvertering af ikke-understøttede lydformater”</a> for yderligere information om dette.</p>
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
