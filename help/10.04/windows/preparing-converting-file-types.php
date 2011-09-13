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
    <title xmlns="">Konvertering af ikke-understøttede filtyper</title>
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
              <h1 class="entry-title">Konvertering af ikke-understøttede filtyper</h1>
              <div class="entry-content">
                <div class="sect1" title="Konvertering af ikke-understøttede filtyper">
                  <p>Selvom de programmer, der er tilgængelige i Ubuntu, understøtter de fleste almindelige filtyper, er der stadig mange filtyper, som ikke er understøttet. Hvis du har filer i et ikke-understøttet format, anbefales det, at du forsøger at konvertere dem til et understøttet format, før du skifter til Ubuntu. Dette afsnit omhandler nogle almindelige, ikke-understøttede eller kun delvist understøttede filtyper og angiver mulige alternativer og metoder til konvertering.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>Nogle filtyper kan ikke bruges i Ubuntu</strong>
                          </span>
                        </p>
                      </li>
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>Kontrollér om de filtyper du bruger er understøttet</strong>
                          </span>
                        </p>
                      </li>
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>Konvertér de filer, som ikke er en understøttet type</strong>
                          </span>
                        </p>
                      </li>
                    </ul>
                  </div>
                  <div class="sect2" title="Konvertering af ikke-understøttede lydformater">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-converting-audio"></a>Konvertering af ikke-understøttede lydformater</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>Mange almindelige lydformater kan ikke afspilles på Ubuntu uden installation af ekstra software. Dette skyldes juridiske begrænsninger.</strong>
                            </span>
                          </p>
                        </li>
                      </ul>
                    </div>
                    <p>Som følge af juridiske begrænsninger og tekniske problemer med visse lydformater kan Ubuntu desværre ikke afspille visse lydformater med det samme. Der kan tilføjes understøttelse til visse begrænsede formater, efter at du har installeret Ubuntu, men det kan være fordelagtigt at konvertere lydfiler til et format med god understøttelse. Det er særlig vigtigt, hvis filerne er indkodet med brug af en variant af <span class="emphasis"><em>Digital Rights Management (DRM)</em></span>-software. DRM-begrænsninger kan gøre filerne umulige at afspille i alle andre programmer, end det program, hvortil de blev tilknyttet.</p>
                    <p>Følgende store lydformater er proprietære, og er derfor ikke understøttet som standard i Ubuntu:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>MP3</p>
                        </li>
                        <li class="listitem">
                          <p>WMA</p>
                        </li>
                        <li class="listitem">
                          <p>AAC</p>
                        </li>
                        <li class="listitem">
                          <p>RealAudio</p>
                        </li>
                      </ul>
                    </div>
                    <p>For et godt understøttet lydformat til at erstatte MP3 og WMA kan du overveje <span class="emphasis"><em>Ogg Vorbis</em></span>-formatet. For et godt støttet tabsfri (meget høj kvalitet)-format til at erstatte AAC Lossless og WMA-VBR kan du overveje <span class="emphasis"><em>FLAC</em></span>-formatet. Begge disse formater er åbne og kan afspilles i Ubuntu uden installation af ekstra software.</p>
                    <p>Der er mange forskellige lydkonverteringsprogrammer til Windows, nogle af disse kan endda hentes helt gratis. Disse programmer bliver også kaldt <span class="emphasis"><em>lyd (re)encoders</em></span>. Dit valg af program afhænger af hvilket format du ønsker at konvertere fra og til. Se hjemmesider såsom <a class="ulink" href="http://www.download.com/Rippers-Encoders/3150-2140_4-0.html?tag=dir" target="_top">Download.com</a> for en liste over potentielle brugbare programmer.</p>
                    <p>Det er stadig muligt at tilføje understøttelse af mange begrænsede formater (såsom de ovennævnte) i Ubuntu efter installation. Læs dokumentet <a class="ulink" href="https://help.ubuntu.com/community/RestrictedFormats" target="_top">begrænsede formater</a> på Ubuntu fællesskabet hjælpe hjemmeside for yderligere information.</p>
                  </div>
                  <div class="sect2" title="Konvertering af ikke understøttede videoformater">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-converting-video"></a>Konvertering af ikke understøttede videoformater</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>Mange almindelige videoformater kan ikke afspilles på Ubuntu uden installation af ekstra software. Dette skyldes juridiske restriktioner.</strong>
                            </span>
                          </p>
                        </li>
                      </ul>
                    </div>
                    <p>Som med lydformater er der, på grund af juridiske og tekniske spørgsmål, mange videoformater der ikke understøttes i Ubuntu som standard. Selvom understøttelse til nogle formater kan tilføjes på et senere tidspunkt, anbefales det at du konverterer vigtige videofiler i ikke understøttet formater til et format, som er godt understøttet i Ubuntu.</p>
                    <p>Som ved lydformater, er der mange videokonverteringsprogrammer der kan hentes gratis til Windows. Overvej at konvertere dine videofiler til et format der er godt understøttet i Ubuntu, såsom <span class="emphasis"><em>Ogg Theora</em></span>.</p>
                    <p>Følgende større videoformater understøttes ikke som standard i Ubuntu:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>WMV</p>
                        </li>
                        <li class="listitem">
                          <p>RealVideo</p>
                        </li>
                        <li class="listitem">
                          <p>DivX</p>
                        </li>
                        <li class="listitem">
                          <p>QuickTime</p>
                        </li>
                      </ul>
                    </div>
                    <p>Det er stadig muligt at tilføje understøttelse af mange begrænsede formater (såsom de ovennævnte) i Ubuntu efter installation. Læs dokumentet <a class="ulink" href="https://help.ubuntu.com/community/RestrictedFormats" target="_top">begrænsede formater</a> på Ubuntu fællesskabet hjælpe hjemmeside for yderligere information.</p>
                  </div>
                  <div class="sect2" title="Konvertering af ikke-understøttede kontordokumentformater">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-converting-office"></a>Konvertering af ikke-understøttede kontordokumentformater</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>Kontorprogrammerne i Ubuntu kan læse de fleste almindelige dokumentformater uden behov for konvertering</strong>
                            </span>
                          </p>
                        </li>
                      </ul>
                    </div>
                    <p>Ubuntus standard-kontorpakke <span class="application"><strong>OpenOffice.org</strong></span> understøtter rigtig mange kontordokumentformater som standard. Blandt disse dokumentformater er mange af formaterne fra Microsoft Office, Corel og Lotus. Hvis du opdager, at du har filer i formater, som ikke er understøttet, har din nuværende kontorpakke/program sandsynligvis mulighed for at gennem filerne i et bedre understøttet format.</p>
                    <p>OpenDocument-filformaterne øger hele tiden deres popularitet og forventes at blive de filformater, som Ubuntu de facto understøtter. Mange ældre programmer kan imidlertid ikke gemme til OpenDocument-formatet, men formater som f.eks. .doc og RTF er også godt understøttede.</p>
                  </div>
                  <div class="sect2" title="Konvertering fra programspecifikke formater">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-converting-specific"></a>Konvertering fra programspecifikke formater</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>Nogle filformater er specifikke for særlige Windows-programmer, og kan derfor ikke bruges med Ubuntu-software</strong>
                            </span>
                          </p>
                        </li>
                      </ul>
                    </div>
                    <p>Mange programmer bruger filformater der er specifikke for dem. Et godt eksempel er <span class="application"><strong>Adobe Photoshop</strong></span>-filformatet. Formater som disse er generelt i stand til at lagre yderligere data i forhold til udbredte standard formater, og er derfor stadig nyttige. Du kan opleve, at der findes programmer i Ubuntu til at konvertere eller bruge program-specifikke formater. <span class="application"><strong>GIMP</strong></span> er i stand til f.eks. at bruge Adobe PSD-filer.</p>
                    <p>Hvis du er usikker på om et format, er programspecifikt eller om det har et brugbart alternativ, søg hjælp fra en <a class="ulink" href="http://www.ubuntu.com/support" target="_top">Ubuntu-støttekanal</a>.</p>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
