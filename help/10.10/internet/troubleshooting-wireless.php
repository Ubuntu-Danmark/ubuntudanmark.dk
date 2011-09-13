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
    <title xmlns="">Fejlfinding af trådløs netopkobling</title>
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
    <link rel="home" href="index.php" title="Internet og netværk" />
    <link rel="up" href="troubleshooting.php" title="Kapitel 5. Fejlfinding" />
    <link rel="prev" href="troubleshooting-lan.php" title="Fejlfinding for kablet netopkobling" />
    <link rel="next" href="troubleshooting-mobile.php" title="Fejlfinding for mobil bredbånd" />
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
              <h1 class="entry-title">Fejlfinding af trådløs netopkobling</h1>
              <div class="entry-content">
                <div class="sect1" title="Fejlfinding af trådløs netopkobling">
                  <p>Selv om afsnittet ikke er fyldestgørende, dækker dette nogle almindelige problemer med trådløs netopkobling.</p>
                  <p>Der er meget mere information til rådighed fra <a class="ulink" href="https://help.ubuntu.com/community/WifiDocs" target="_top">fællesskabets dokumentation</a>.</p>
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
                          <p>Denne fejlfindingsguide er designet til at blive gennemført trin for trin. Hvis du når til slutningen af et afsnit og ikke bliver henvist til et andet - så prøv <a class="xref" href="connecting-wireless.php" title="Trådløs">“Trådløs”</a>. Hvis dette heller ikke løser det, så begynd forfra igen.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="sect2" title="Kontroller, at enheden er tændt">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-disabled"></a>Kontroller, at enheden er tændt</h3>
                        </div>
                      </div>
                    </div>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Mange trådløse netværksenheder kan være tændt eller slukket. Kontroller, om der er en hardwareswitch. Nogle enheder kan slukkes fra Windows, og det kan være nødvendigt at tænde dem igen fra Windows.</p>
                        </li>
                        <li class="listitem">
                          <p>Hvis den er tændt, så se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-device" title="Kontroller genkendelse af enheder">“Kontroller genkendelse af enheder”</a>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Kontroller genkendelse af enheder">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-device"></a>Kontroller genkendelse af enheder</h3>
                        </div>
                      </div>
                    </div>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn en <span class="application"><strong>Terminal</strong></span> (<span class="guimenu">Program</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span>) og indtast kommandoen: <code class="code">sudo lshw -C network</code></p>
                        </li>
                      </ol>
                    </div>
                    <p>Du bør se et output, sammen med ordene "CLAIMED, UNCLAIMED, ENABLED or DISABLED"</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Claimed - dette indikerer at en driver er indlæst, men ikke fungerer, se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-ndiswrapper" title="Brug af Windows-drivere til trådløse enheder">“Brug af Windows-drivere til trådløse enheder”</a></p>
                        </li>
                        <li class="listitem">
                          <p>Unclaimed - der er ingen driver indlæst, se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-ndiswrapper" title="Brug af Windows-drivere til trådløse enheder">“Brug af Windows-drivere til trådløse enheder”</a>.</p>
                        </li>
                        <li class="listitem">
                          <p>Enabled - der er en driver indlæst, se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-connection" title="Kontrollér for forbindelse til ruteren">“Kontrollér for forbindelse til ruteren”</a>.</p>
                        </li>
                        <li class="listitem">
                          <p>Disabled - se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-disabled" title="Kontroller, at enheden er tændt">“Kontroller, at enheden er tændt”</a>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Brug af Windows-drivere til trådløse enheder">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-ndiswrapper"></a>Brug af Windows-drivere til trådløse enheder</h3>
                        </div>
                      </div>
                    </div>
                    <p>Understøtter et system kaldet ndiswrapper. Dette giver dig mulighed for at bruge en trådløs enhedsdriver fra Windows under Ubuntu.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Find Windows-driveren til dit system, og find den fil, der ender med <code class="code">.inf</code>.</p>
                        </li>
                        <li class="listitem">
                          <p><a class="ulink" href="apt:ndisgtk" target="_top">Installer pakken <span class="application"><strong>ndisgtk</strong></span></a>.</p>
                        </li>
                        <li class="listitem">
                          <p>Åbn <span class="application"><strong>ndisgtk</strong></span> (<span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Windows Wireless Drivers</span>).</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg <em class="guilabel">Install new driver</em>.</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg placeringen af din .inf-fil fra Windows, og tryk på <span class="guibutton"><strong>Install</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Klik på <span class="guibutton"><strong>O.k.</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Kontrollér for forbindelse til ruteren">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-connection"></a>Kontrollér for forbindelse til ruteren</h3>
                        </div>
                      </div>
                    </div>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn en <span class="application"><strong>Terminal</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span>) og indtast kommandoen: <code class="code">iwconfig</code>.</p>
                        </li>
                        <li class="listitem">
                          <p>Hvis ESSID for vores router er vist, kan der være et problem med ACPI-understøttelsen. Start kernen med <code class="code">pci=noacpi</code> mulighed.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Kontrollér IP-tildeling">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-ip"></a>Kontrollér IP-tildeling</h3>
                        </div>
                      </div>
                    </div>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn en <span class="application"><strong>Terminal</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span>) og skriv komandoen: <code class="code">ifconfig</code>.</p>
                        </li>
                        <li class="listitem">
                          <p>Hvis der vises en IP-adresse, så se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-dns" title="Kontrollér DNS">“Kontrollér DNS”</a>.</p>
                        </li>
                        <li class="listitem">
                          <p>Skriv kommandoen <code class="code">sudo dhclient grænsefladenavn</code> fra <span class="application"><strong>Terminal</strong></span> hvor grænsefladenavn er forbindelsen beskrevet tidligere.</p>
                        </li>
                        <li class="listitem">
                          <p>Hvis du modtager en besked, der siger <code class="code">bound to xxx.xxx.xxx.xxx</code>, så se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-dns" title="Kontrollér DNS">“Kontrollér DNS”</a></p>
                        </li>
                        <li class="listitem">
                          <p>Hvis ikke så genstart systemet.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Kontrollér DNS">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-dns"></a>Kontrollér DNS</h3>
                        </div>
                      </div>
                    </div>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn en <span class="application"><strong>Terminal</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span>) og skriv kommandoen: <code class="code">ping -c3 85.190.27.2</code>.</p>
                        </li>
                        <li class="listitem">
                          <p>Skriv nu kommandoen: <code class="code">ping www.ubuntu.com</code>. Hvis du får et svar fra begge, så se <a class="xref" href="troubleshooting-wireless.php#troubleshooting-wireless-ipv6" title="IPV6 understøttes ikke">“IPV6 understøttes ikke”</a>.</p>
                        </li>
                        <li class="listitem">
                          <p>Indtast kommandoen: <code class="code">cat /etc/resolv.conf</code>. Hvis der ikke er opført en navneserver, så kontakt din internetudbyder og find ud af dine primære og sekundære domænenavneservere. Se <a class="xref" href="connecting-wireless.php" title="Trådløs">“Trådløs”</a>, når du har disse oplysninger.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="IPV6 understøttes ikke">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="troubleshooting-wireless-ipv6"></a>IPV6 understøttes ikke</h3>
                        </div>
                      </div>
                    </div>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>IPv6 understøttes som standard i Ubuntu og kan undertiden give problemer.</p>
                        </li>
                        <li class="listitem">
                          <p>Åbn en <span class="application"><strong>Terminal</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span>) og skriv kommandoen: <code class="code">gksudo gedit /etc/modprobe.d/aliases</code>, for at deaktivere det.</p>
                        </li>
                        <li class="listitem">
                          <p>Find linjen <code class="code">alias net-pf-10 ipv6</code> og ændr den så der står <code class="code">alias net-pf-10 off</code>.</p>
                        </li>
                        <li class="listitem">
                          <p>Genstart Ubuntu.</p>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
