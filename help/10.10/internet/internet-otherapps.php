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
    <title xmlns="">Andre internetprogrammer</title>
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
    <link rel="home" href="index.php" title="Internet og netværk" />
    <link rel="up" href="web-apps.php" title="Kapitel 9. Internetprogrammer" />
    <link rel="prev" href="internet-instant-messaging.php" title="Chat" />
    <link rel="next" href="web-design.php" title="Design web-sider" />
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
              <h1 class="entry-title">Andre internetprogrammer</h1>
              <div class="entry-content">
                <div class="sect1" title="Andre internetprogrammer">
                  <p>Internettet har meget mere at tilbyde udover at surfe hjemmesider, e-post og chat. Ubuntu indeholder et udvalg af andre programmer for at hjælpe dig med at få mest muligt ud af internettet.</p>
                  <div class="sect2" title="Peer-to-peer netværk">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="internet-otherapps-p2p"></a>Peer-to-peer netværk</h3>
                        </div>
                      </div>
                    </div>
                    <p>Peer-to-peer (P2P) netværk er en måde at dele filer, musik og videoer mellem mennesker verden rundt.</p>
                    <p>En populær P2P-ydelse er <span class="emphasis"><em>BitTorrent</em></span>, og BitTorrent-håndtering er inkluderet i Ubuntu som standard. Find en fil af typen <span class="emphasis"><em>.torrent</em></span> på internettet, klik på den i <span class="application"><strong>Firefox Web Browser</strong></span>, og <span class="application"><strong>Transmission BitTorrent-klient</strong></span> bør starte automatisk.</p>
                    <p>Åbn <span class="application"><strong>Transmission BitTorrent-klient</strong></span>, vælg <span class="guimenu">Programmer</span> → <span class="guimenuitem">Internet</span> → <span class="guimenuitem">Transmission BitTorrent-klient</span>, for at genstarte en download.</p>
                    <p>Et alternativt P2P-program er <span class="application"><strong>aMule fildelings-klienten</strong></span>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:amule" target="_top">Installer pakken <span class="application"><strong>amule</strong></span></a>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guimenuitem">Internet</span> → <span class="guimenuitem">aMule</span> for at åbne <span class="application"><strong>aMule</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Nyhedslæsere">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="internet-otherapps-newsreaders"></a>Nyhedslæsere</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan automatisk modtage nyhedsopdateringer fra internettet. Der er flere forskellige typer af nyhedstjeneste at vælge imellem:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="emphasis"><em>Usenet</em></span> er en af de ældste og giver dig mulighed for at diskutere nyheder og andre emner med folk fra hele verden. <span class="application"><strong>Pan</strong></span> er en nyhedslæser, der fungerer med Usenet.</p>
                          <p><a class="ulink" href="apt:pan" target="_top">Installér pakken <span class="application"><strong>pan</strong></span></a> og vælg <span class="guimenu">Programmer</span> → <span class="guimenuitem">Internet</span> → <span class="guimenuitem">Pan nyhedsgruppe-læser</span> for at starte <span class="application"><strong>Pan</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="emphasis"><em>RSS feeds</em></span> er en populær metode til automatisk at modtage regelmæssige nyhedsopdateringer og artikler. <span class="application"><strong>Liferea Feed Reader</strong></span> er en RSS-feed-læser med mange nyttige funktioner.</p>
                          <p><a class="ulink" href="apt:liferea" target="_top">Installer pakken <span class="application"><strong>liferea</strong></span></a> og vælg derefter <span class="guimenu">Programmer</span> → <span class="guimenuitem">Internet</span> → <span class="guimenuitem">Liferea Feed Reader</span> for at starte <span class="application"><strong>Liferea</strong></span>.</p>
                        </li>
                      </ul>
                    </div>
                    <div class="sect3" title="Opret nyhedsfeeds med Liferea">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="internet-other-apps-newreaders-liferea-create-feeds"></a>Opret nyhedsfeeds med Liferea</h4>
                          </div>
                        </div>
                      </div>
                      <p>Dette afsnit vil dække en grundlæggende procedure til at tilføje nyhedsfeeds til <span class="application"><strong>Liferea</strong></span>. Start <span class="application"><strong>Liferea</strong></span> ved at vælge <span class="guimenu">Programmer</span> → <span class="guimenuitem">Internet</span> → <span class="guimenuitem">Liferea Feed Reader</span></p>
                      <div class="procedure">
                        <ol class="procedure" type="1">
                          <li class="step" title="Trin 1">
                            <p>Hvis du er bag en proxy, skal du vælge <span class="guimenuitem">Tools</span> → <span class="guimenuitem">Preferences</span> → <span class="guimenuitem">Proxy</span> og indtaste dine proxy-indstillinger, og klikke på knappen <span class="guibutton"><strong>Close</strong></span>,</p>
                          </li>
                          <li class="step" title="Trin 2">
                            <p>Tryk <span class="guibutton"><strong>New Subscription</strong></span> på Lifereas værktøjslinje,</p>
                          </li>
                          <li class="step" title="Trin 3">
                            <p>Tryk på knappen <span class="guibutton"><strong>Advanced</strong></span>,</p>
                          </li>
                          <li class="step" title="Trin 4">
                            <p>Indtast adressen på RSS-feed'et i feltet <em class="guilabel">Source</em>,</p>
                          </li>
                          <li class="step" title="Trin 5">
                            <p>Tryk på knappen <span class="guibutton"><strong>OK</strong></span> for at fuldende proceduren.</p>
                          </li>
                          <li class="step" title="Trin 6">
                            <p>Når du har oprettet nyheds-feedet, skal du klikke på knappen <span class="guibutton"><strong>Update All</strong></span> på værktøjslinjen for at opdatere alle dine nyhedskilder.</p>
                          </li>
                        </ol>
                      </div>
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
              <h3 class="widgettitle">Internet og netværk</h3>
              <ul>
                <li><a href="networkmanager.php">1. Opret forbindelse til internettet eller et netværk</a></li>
                <li><a href="connecting.php">2. Måder at forbinde på</a>
                  <ul>
                  <li><a href="connecting-wired.php">Kablet (LAN)</a>
                      <ul>
                      <li><a href="connecting-wired.php#connecting-wired-manual">Manuel indtastning af din netværksopsætning</a></li>
                      </ul>
                  </li>
                  <li><a href="connecting-wireless.php">Trådløs</a></li>
                  <li><a href="connecting-mobile.php">Mobilt bredbånd</a></li>
                  <li><a href="connecting-vpn.php">Virtuelle private netværk</a>
                      <ul>
                        <li><a href="connecting-vpn.php#connecting-vpn-cicso">Cisco VPN</a></li>
                        <li><a href="connecting-vpn.php#connecting-vpn-pptp">PPTP VPN</a></li>
                        <li><a href="connecting-vpn.php#connecting-vpn-openvpn">OpenVPN</a></li>
                        <li><a href="connecting-vpn.php#connecting-vpn-config">Konfigurationsfiler</a></li>
                      </ul>
                  </li>
                  <li><a href="connecting-dsl.php">DSL</a></li>
                  </ul>
                </li>
                <li><a href="disconnecting.php">3. Frakobling</a></li>
                <li><a href="information.php">4. Information om din forbindelse</a></li>
                <li><a href="troubleshooting.php">5. Fejlfinding</a>
                  <ul>
                  <li><a href="troubleshooting-lan.php">Fejlfinding for kablet netopkobling</a>
                      <ul>
                      <li><a href="troubleshooting-lan.php#network-troubleshooting-ifconfig">Få information om den aktuelle netopkobling</a></li>
                      <li><a href="troubleshooting-lan.php#network-troubleshooting-ping">Kontrollér om en netopkobling virker korekt</a></li>
                      </ul>
                  </li>
                  <li><a href="troubleshooting-wireless.php">Fejlfinding af trådløs netopkobling</a>
                      <ul><li><a href="troubleshooting-wireless.php#troubleshooting-wireless-disabled">Kontroller, at enheden er tændt</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-device">Kontroller genkendelse af enheder</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-ndiswrapper">Brug af Windows-drivere til trådløse enheder</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-connection">Kontrollér for forbindelse til ruteren</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-ip">Kontrollér IP-tildeling</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-dns">Kontrollér DNS</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-ipv6">IPV6 understøttes ikke</a></li></ul></li>
                  <li><a href="troubleshooting-mobile.php">Fejlfinding for mobil bredbånd</a></li>
                  <li><a href="troubleshooting-keyring.php">Hvorfor spørger Gnome Nøglering om min adgangskode hver gang jeg logger ind?</a></li>
                  </ul>
                </li>
                <li><a href="modem.php">6. Modemmer</a>
                  <ul>
                  <li><a href="modem-identify.php">Identificer dit modem</a></li>
                  <li><a href="modem-connect.php">Opkobling med et modem</a></li>
                  </ul>
                </li>
                <li><a href="connecttoserver.php">7. Forbind til en server</a>
                  <ul>
                  <li><a href="connecttoserver-ftp.php">FTP</a></li>
                  <li><a href="connecttoserver-ssh.php">SSH</a></li>
                  <li><a href="connecttoserver-windowsshare.php">Windows-deling</a></li>
                  <li><a href="connecttoserver-webdav.php">WebDAV (HTTP)</a></li>
                  <li><a href="connecttoserver-custom.php">Tilpasset</a></li>
                  </ul>
                </li>
                <li><a href="networking.php">8. Hjemmenetværk</a>
                  <ul>
                  <li><a href="networking-browsenetcomps.php">Se andre computere på netværket</a></li>
                  <li><a href="networking-shares.php">Del filer og mapper med andre computere</a>
                    <ul>
                    <li><a href="networking-shares.php#networking-shares-ubuntuone">Deling af filer med Ubuntu One</a></li>
                    <li><a href="networking-shares.php#networking-shares-sharesadmin">Deling af mapper via programmet Delte mapper</a></li>
                    <li><a href="networking-shares.php#networking-shares-nautilus">Deling af mapper via Nautilus</a></li>
                    <li><a href="networking-shares.php#networking-shares-windows">Tilgå delte mapper via Windows</a></li>
                    <li><a href="networking-shares.php#networking-shares-troubleshooting">Problemer med at forbinde til delte mapper i Windows</a></li>
                    </ul>
                  </li>
                  </ul>
                </li>
                <li><a href="web-apps.php">9. Internetprogrammer</a>
                  <ul>
                  <li><a href="web-browsing.php">På nettet med Firefox</a>
                      <ul>
                      <li><a href="web-browsing.php#web-browsing-addons">Hent tilføjelser til din Firefox</a></li>
                      <li><a href="web-browsing.php#web-browsing-fontsize">Ændr skrifttypens standardstørrelse</a></li>
                      </ul>
                  </li>
                  <li><a href="email.php">Send og modtag e-post</a>
                      <ul>
                      <li><a href="email.php#email-evolution-spam">Filtrering af spam</a></li>
                      <li><a href="email.php#email-alternative">Alternative e-post-programmer</a></li>
                      </ul>
                  </li>
                  <li><a href="internet-instant-messaging.php">Chat</a>
                      <ul>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-empathy">Empathy chat</a></li>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-ekiga">Ekiga softwaretelefon</a></li>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-irc">IRC chat</a></li>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-irchelp">Få hjælp via IRC chat</a></li>
                      </ul>
                  </li>
                  <li><a href="internet-otherapps.php">Andre internetprogrammer</a>
                      <ul>
                      <li><a href="internet-otherapps.php#internet-otherapps-p2p">Peer-to-peer netværk</a></li>
                      <li><a href="internet-otherapps.php#internet-otherapps-newsreaders">Nyhedslæsere</a></li>
                      </ul>
                  </li>
                  <li><a href="web-design.php">Design web-sider</a></li>
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
