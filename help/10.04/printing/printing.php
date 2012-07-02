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
    <title xmlns="">Udskrivning</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/jquery.corner.js?ver=2.08"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/jquery.nivo.slider.pack.js?ver=2"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="http://ubuntudanmark.dk/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://ubuntudanmark.dk/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="http://ubuntudanmark.dk/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="http://ubuntudanmark.dk/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="http://ubuntudanmark.dk/download/" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="shortcut icon" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
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
    <link rel="home" href="index.php" title="Udskrivning, fax og skanning" />
    <link rel="up" href="index.php" title="Udskrivning, fax og skanning" />
    <link rel="prev" href="index.php" title="Udskrivning, fax og skanning" />
    <link rel="next" href="faxing.php" title="Brug af fax" />
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
              <h1 class="entry-title">Udskrivning</h1>
              <div class="entry-content">
                <div class="section" title="Udskrivning">
                  <p>De fleste printere understøttes automatisk af Ubuntu. Programmet <span class="application"><strong>Printeropsætning</strong></span> giver dig mulighed for at tilføje printere, samt redigere deres indstillinger. Du kan også bruge dette program til at dele printeren med andre computere på netværket, deaktivere printeren, eller genstarte den.</p>
                  <div class="section" title="Lokal udskrivning">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="local"></a>Lokal udskrivning</h3>
                        </div>
                      </div>
                    </div>
                    <p>En lokal printer er en der er forbundet direkte til din computer (i modsætning til en netværksprinter, der omtales i følgende afsnit).</p>
                    <p>For at tilføje en ny lokal printer, skal du slutte printeren til computeren og tænde den. De fleste printere vil automatisk blive opdages og konfigureret. Når printeren opfanges, vil et printer ikon blive vist i statusfeltet, og efter at have ventet et øjeblik, bør du få en pop op med teksten <em class="guilabel">Printer tilføjet</em>.</p>
                    <p>Hvis din printer ikke blev genkendt efter kort tid er du nødt til at foretage følgende:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Få fat i modelnavnet for din printer.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Sørg for at printeren er tændt.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Vælge <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Udskrivning</span>.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Tryk på knappen <span class="guibutton"><strong>Ny</strong></span> eller vælg <span class="guimenuitem">Server</span> → <span class="guimenuitem">Ny</span> → <span class="guimenuitem">Printer</span>.</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Din printer skulle bliver genkendt automatisk. Er dette tilfældet, klik <span class="guibutton"><strong>Næste</strong></span> og derefter <span class="guibutton"><strong>Anvend</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 6">
                          <p>Til sidst kan du angive en beskrivelse og placering af din printer.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Hvis din printer ikke blev genkendt automatisk, kan du prøve at vælge port og printerdriver manuelt. Nogle printere har brug for yderligere opsætning. Søg i databasen <a class="ulink" href="http://www.linuxprinting.org/" target="_top">LinuxPrinting.org</a> eller se <a class="ulink" href="https://wiki.ubuntu.com/HardwareSupportComponentsPrinters" target="_top">Printersiden på Ubuntus wiki</a> for informationer om din printer.</p>
                  </div>
                  <div class="section" title="Netværksudskrivning">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="network"></a>Netværksudskrivning</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan også indstille dit Ubuntusystem til at sende udskriftsjob til en netværksprinter. Netværksprintere er placeret et sted på netværket. For at indstille en netværksprinter:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Få fat i modelnavnet for din printer.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Sørg for at printeren er tændt.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Vælge <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Udskrivning</span>.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Tryk på knappen <span class="guibutton"><strong>Ny</strong></span> eller vælg <span class="guimenuitem">Server</span> → <span class="guimenuitem">Ny</span> → <span class="guimenuitem">Printer</span>.</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Udfold <em class="guilabel">Netværksprinter</em>.</p>
                        </li>
                        <li class="step" title="Trin 6">
                          <p>En liste af genkendte printere vises. Hvis din ønskede printer vises, skal du vælge denne. Hvis printeren er direkte forbundet til en Windows-maskine på dit netværk, skal du vælge <em class="guilabel">Windows Printer via SAMBA</em>. Ellers skal du vælge den protokol, printeren bruger til at kommunikere, eller klikke <em class="guilabel">Find netværksprinter</em> for manuelt at indtaste et værtsnavn eller IP.</p>
                        </li>
                        <li class="step" title="Trin 7">
                          <p>Klik på <span class="guibutton"><strong>Næste</strong></span> og udfyld detaljerne for netværksprinteren.</p>
                        </li>
                        <li class="step" title="Trin 8">
                          <p>Tryk på <span class="guibutton"><strong>Anvend</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 9">
                          <p>Til sidst kan du angive en beskrivelse og placering af din printer.</p>
                        </li>
                      </ol>
                    </div>
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
                            <p>Hvis du ikke kender protokollen eller detaljerne for din netværksprinter bør du rådføre dig med din netværksadminstrator.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="section" title="Afprøvning af en printer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="testing"></a>Afprøvning af en printer</h3>
                        </div>
                      </div>
                    </div>
                    <p>For at kontrollere om printeren fungere korrekt:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Vælge <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Udskrivning</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Højre-klik på printerens navn i listen.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Klik <span class="guibutton"><strong>Egenskaber</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Under fanebladet <em class="guilabel">Indstillinger</em>, Klik <span class="guibutton"><strong>Udskriv testside</strong></span>. En side vil derefter blive udskrevet hvis printeren fungerer korrekt.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="section" title="Hvordan kontrollerer jeg blækbeholdningen på min printer?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="printer-inklevels"></a>Hvordan kontrollerer jeg blækbeholdningen på min printer?</h3>
                        </div>
                      </div>
                    </div>
                    <p>For at finde ud af hvor meget blæk der er tilbage i din printer, følg instruktionerne der gælder for din printer:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="strong"><strong>Hewlett-Packard-printere (HP):</strong></span> Tryk <span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>F2</strong></span>, skriv <strong class="userinput"><code>hp-toolbox</code></strong> og klik <span class="guibutton"><strong>Kør</strong></span>. Vælg <em class="guilabel">Supplies</em> fanebladet i HP Device Manager vinduet, som viser en oversigt af blækniveauerne.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="strong"><strong>Epson- og nogle Canon-printere:</strong></span> Installer <a class="ulink" href="apt:mtink" target="_top">mtink</a> pakken og klik <span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">mtink</span> for at kontroller blækniveauerne.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="strong"><strong>Andre Epson- and Canon-printere:</strong></span> Installer <a class="ulink" href="apt:inkblot" target="_top">inkblot</a> pakken, tryk <span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>F2</strong></span>, skriv <strong class="userinput"><code>inkblot</code></strong> og klik <span class="guibutton"><strong>Kør</strong></span>. Et printerikon vil komme til syne i meddelelsesområdet i det øverste panel; klik på det for at se blækniveauerne.</p>
                        </li>
                      </ul>
                    </div>
                    <p>For printere fra andre fabrikanter, er den bedste chance for at se blækniveauet for din printer i Ubuntu, at installere en officel Linux-driver fra frabrikanten, hvis en sådan eksisterer.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Udskrivning, fax og skanning</h3>
              <ul>
              <li><a href="printing.php">Udskrivning</a>
                  <ul>
                  <li><a href="printing.php#local">Lokal udskrivning</a></li>
                  <li><a href="printing.php#network">Netværksudskrivning</a></li>
                  <li><a href="printing.php#testing">Afprøvning af en printer</a></li>
                  <li><a href="printing.php#printer-inklevels">Hvordan kontrollerer jeg blækbeholdningen på min printer?</a></li>
                  </ul>
              </li>
              <li><a href="faxing.php">Brug af fax</a></li>
              <li><a href="scanning.php">Brug af skanner</a>
                  <ul>
                  <li><a href="scanning.php#id336742">Virker min skanner med Ubuntu?</a></li>
                  <li><a href="scanning.php#id336796">Brug af din skanner</a></li>
                  <li><a href="scanning.php#id336853">Hvad hvis den siger "Ingen tilgængelige enheder"?</a></li>
                  <li><a href="scanning.php#id336911">Manuel installation af skanner</a></li>
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
    <script async="true" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
