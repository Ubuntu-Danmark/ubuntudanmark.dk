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
    <title xmlns="">Brug af skanner</title>
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
    <link rel="home" href="index.php" title="Udskrivning, fax og skanning" />
    <link rel="up" href="index.php" title="Udskrivning, fax og skanning" />
    <link rel="prev" href="faxing.php" title="Brug af fax" />
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
              <h1 class="entry-title">Brug af skanner</h1>
              <div class="entry-content">
                <div class="section" title="Brug af skanner">
                  <p>Mange skannere er automatisk understøttet af Ubuntu, og bør være nemme at installere og bruge. Dette afsnit vil guide dig igennem hvordan du bruger din skanner og hvad du kan gøre, hvis Ubuntu ikke registrerer din skanner.</p>
                  <div class="section" title="Virker min skanner med Ubuntu?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="id336742"></a>Virker min skanner med Ubuntu?</h3>
                        </div>
                      </div>
                    </div>
                    <p>Der er tre måder at se, om din skanner virker i Ubuntu:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Tilslut den og prøv den! Hvis det er en nyere Universal Serial Bus-skanner (USB) skanner, så er det sandsynligt at den bare virker.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Kig på <a class="ulink" href="https://wiki.ubuntu.com/HardwareSupportComponentsScanners" target="_top">listen over skannere der understøttes</a> i Ubuntu.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Kig på <a class="ulink" href="http://www.sane-project.org/sane-backends.html" target="_top">SANE-projektets liste af understøttet skannere</a>. SANE er den software, der anvendes af Ubuntu til det meste af sin skannerunderstøttelse.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="section" title="Brug af din skanner">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="id336796"></a>Brug af din skanner</h3>
                        </div>
                      </div>
                    </div>
                    <p>For at skanne et dokument:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Placér det du ønsker at skanne på skanneren.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Klik på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Grafik</span> → <span class="guimenuitem">Simpel Skanning</span>.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Alternativt, at trykke på skanknappen på skanneren bør også virke.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="section" title="Hvad hvis den siger &quot;Ingen tilgængelige enheder&quot;?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="id336853"></a>Hvad hvis den siger "Ingen tilgængelige enheder"?</h3>
                        </div>
                      </div>
                    </div>
                    <p>Der er to mulige grunde til at få denne besked:</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Din skanner er ikke understøttet i Ubuntu. For eksempel er de fleste paralleportsskannere og Lexmark All-in-One printer/scanner/fax ikke understøttet.</p>
                        </li>
                        <li class="listitem">
                          <p>Driveren til din skanner bliver ikke indlæst automatisk.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Du kan muligvis få din skanner til at virke ved at installere en driver eller ændre nogle konfigurationsfiler. Bed om råd på <a class="ulink" href="/forum/" target="_top">Ubuntu Danmarks forum</a> eller et lignende sted.</p>
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
                            <p>For visse scannere kan det være nødvendigt, først at tilslutte dem <span class="emphasis"><em>efter</em></span> computeren er startet op, for at få dem til at fungere.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="section" title="Manuel installation af skanner">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="id336911"></a>Manuel installation af skanner</h3>
                        </div>
                      </div>
                    </div>
                    <p>Der er enkelte skannere som har ufuldstændige drivere fra Sane-projektet. De kan nogle gange anvendes, men det er ikke sikkert at alle egenskaber vil virke.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Installér pakken <a class="ulink" href="apt:libsane-extras" target="_top">libsane-extras</a>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Tryk <span class="keycap"><strong>Alt</strong></span>+<span class="keycap"><strong>F2</strong></span>, tast <strong class="userinput"><code>gksudo gedit /etc/sane.d/dll.conf</code></strong> ind i boksen og klik <span class="guibutton"><strong>Kør</strong></span> for at åbne SANE-driverfilen til redigering.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Slå den rette til din skanner til, ved at fjerne tegnet <span class="quote">“<span class="quote">#</span>”</span> som står foran navnet på driveren. Du kan blive nødt til at søge på internettet, for at finde ud af hvilken driver der er den rette.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Gem filen og åbne Xsane (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Grafik</span> → <span class="guimenuitem">Xsane - billedskanning</span>). Din skanner vil nu forhåbentlig virke.</p>
                        </li>
                      </ol>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
