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
    <title xmlns="">Sæt en firewall op</title>
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
    <link rel="home" href="index.php" title="Hold din computer sikker" />
    <link rel="up" href="index.php" title="Hold din computer sikker" />
    <link rel="prev" href="lock-screen.php" title="Lås din skærm mens du er væk" />
    <link rel="next" href="avoid-internet-crime.php" title="Undgå internetirritation og -kriminalitet" />
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
              <h1 class="entry-title">Sæt en firewall op</h1>
              <div class="entry-content">
                <div class="sect1" title="Sæt en firewall op">
                  <p>Du kan vælge at installere en firewall for at beskytte din computer mod uautoriseret adgang fra folk på internettet eller dit netværk. En firewall blokerer ukendte kilder fra at oprette forbindelse til din computer, dette bidrager til at forhindre brud på sikkerheden. Hvis du bruger en ruter til at oprette forbindelse til internettet, kan ruteren allerede have en firewall konfigureret, som regulerer forbindelser fra internettet til dit netværk. Dette afsnit omhandler opsætning af en firewall på Ubuntu, til at regulere forbindelser til din computer.</p>
                  <div class="sect2" title="Firewall konfigurationsværktøjer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="id406848"></a>Firewall konfigurationsværktøjer</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Ukompliceret Firewall (UFW)</strong></span> er standardskonfigurationsprogram til firewall i Ubuntu. Det er et kommandolinjeprogrammet. De fleste brugere vil foretrække at bruge <span class="application"><strong>Gufw</strong></span>, som er et grafisk program til at konfigurere <span class="application"><strong>UFW</strong></span> med.</p>
                    <p>Avancerede brugere vil muligvis fortrække at bruge <span class="application"><strong>UFW</strong></span> direkte i terminalen. Se <a class="ulink" href="man:ufw" target="_top">Manualen til UFW</a> eller <a class="ulink" href="https://help.ubuntu.com/community/UFW" target="_top">Fæleskabs-dokumentationssiden for <span class="application"><strong>UFW</strong></span></a> for mere information. Alternativt kan du bruge <span class="application"><strong>iptables</strong></span> - se <a class="ulink" href="man:iptables" target="_top">Manualen til iptables</a>.</p>
                    <div class="sect3" title="Gufw">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="gufw"></a>Gufw</h4>
                          </div>
                        </div>
                      </div>
                      <p>At installere og aktivere <span class="application"><strong>Gufw</strong></span>:</p>
                      <div class="procedure">
                        <ol class="procedure" type="1">
                          <li class="step" title="Trin 1">
                            <p>
                              <a class="ulink" href="apt:gufw" target="_top">Installer pakken <span class="application"><strong>gufw</strong></span>.</a>
                            </p>
                          </li>
                          <li class="step" title="Trin 2">
                            <p>Vælg <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Konfiguration af brandmur</span>, for at starte <span class="application"><strong>Gufw</strong></span>.</p>
                          </li>
                          <li class="step" title="Trin 3">
                            <p>For at aktivere firewallen, skal du blot markere feltet ud for <span class="guibutton"><strong>Aktiveret</strong></span> under <span class="quote">“<span class="quote">Actual Status</span>”</span>.</p>
                          </li>
                        </ol>
                      </div>
                      <p>Standardkonfigurationen er at nægte forbindelser. Det betyder, at et program der forsøger at oprette forbindelse til din computer, vil blive afvist. Visse programmer eller tjenester, der bruger internettet, kræver muligvis at du tilføje en undtagelse.</p>
                      <p>For at tilføje en undtagelse:</p>
                      <div class="procedure">
                        <ol class="procedure" type="1">
                          <li class="step" title="Trin 1">
                            <p>Tryk på <span class="guibutton"><strong>Tilføjguibutton&gt;.</strong></span></p>
                          </li>
                          <li class="step" title="Trin 2">
                            <p>Du kan vælge fra <span class="guibutton"><strong>Prækonfigureret</strong></span> tilvalg for fælles programmer og tjenester, eller du kan manuelt tilføje portundtagelser under fanen <span class="guibutton"><strong>Simpel</strong></span> eller <span class="guibutton"><strong>Avanceret</strong></span>.</p>
                          </li>
                          <li class="step" title="Trin 3">
                            <p>For at finde ud af, hvilken type undtagelse et bestemt program kræver, bør du konsultere hjælp for det pågældende program.</p>
                          </li>
                        </ol>
                      </div>
                      <p>Se <a class="ulink" href="https://help.ubuntu.com/community/Gufw" target="_top">Ubuntu-fældeskabs dokumentationside for <span class="application"><strong>Gufw</strong></span></a>, for en grafisk gennemgang for grundlæggende brug af Gufw.</p>
                    </div>
                  </div>
                  <div class="sect2" title="Test af firewallen og overvågning af netværkstrafik">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="id451691"></a>Test af firewallen og overvågning af netværkstrafik</h3>
                        </div>
                      </div>
                    </div>
                    <p>For at teste firewallen er det bedst at scanne den fra en anden computer. Et populært program til dette er <span class="application"><strong>nmap</strong></span>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>
                            <a class="ulink" href="apt:nmap" target="_top">Installer pakken <span class="application"><strong>nmap</strong></span>.</a>
                          </p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Kør:</p>
                          <pre class="screen">
                            <span class="command">
                              <strong>nmap -vAPN 192.168.1.100</strong>
                            </span>
                          </pre>
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
                                  <p>Insaæt IP-adressen på den computer du vil scanne i stedet for <span class="emphasis"><em>192.168.1.100</em></span>.</p>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Kør følgende, for at se hvilke tjenester der er forbundet med åbne porte:</p>
                          <pre class="screen">
                            <span class="command">
                              <strong>lsof -i -n -P</strong>
                            </span>
                          </pre>
                        </li>
                      </ol>
                    </div>
                    <p>Du kan også bruge en online firewalltesttjeneste, som <a class="ulink" href="http://www.grc.com/" target="_top">ShieldsUP</a>.</p>
                    <p>En faktisk overvågning af din nettrafik kan udføres med enten <span class="application"><strong>Wireshark</strong></span> eller <span class="application"><strong>Snort</strong></span>. <span class="application"><strong>Wireshark</strong></span> kan analysere netværkspakker og <span class="application"><strong>Snort</strong></span> er anvendt i Netværks Indbruds Detektionssystemer (NIDS) og vil give dig besked om usædvanlig trafik.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Hold din computer sikker</h3>
              <ul>
              <li><a href="passwords.php">Adgangskoder</a></li>
              <li><a href="users.php">Tildel en separat brugerkonto til hver person</a></li>
              <li><a href="updates.php">Hold din software opdateret</a></li>
              <li><a href="lock-screen.php">Lås din skærm mens du er væk</a></li>
              <li><a href="firewall.php">Sæt en firewall op</a>
                  <ul>
                  <li><a href="firewall.php#id406848">Firewall konfigurationsværktøjer</a></li>
                  <li><a href="firewall.php#id451691">Test af firewallen og overvågning af netværkstrafik</a></li>
                  </ul>
              </li>
              <li><a href="avoid-internet-crime.php">Undgå internetirritation og -kriminalitet</a></li>
              <li><a href="backup-files.php">Opret sikkerhedskopier af dine filer</a></li>
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
