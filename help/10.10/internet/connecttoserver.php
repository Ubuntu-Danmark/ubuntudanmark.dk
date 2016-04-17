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
    <title>Kapitel 7. Forbind til en server</title>
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
    <link rel="home" href="index.php" title="Internet og netværk" />
    <link rel="up" href="index.php" title="Internet og netværk" />
    <link rel="prev" href="modem-connect.php" title="Opkobling med et modem" />
    <link rel="next" href="connecttoserver-ftp.php" title="FTP" />
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
            <form action="/" method="get" id="searchform">
              <div>
                <input type="text" tabindex="1" size="32" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" value="" name="s" id="s">
                <input type="submit" tabindex="2" value="Søg" name="searchsubmit" id="searchsubmit">
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
              <h1 class="entry-title">Kapitel 7. Forbind til en server</h1>
              <div class="entry-content">
                <div class="chapter" title="Kapitel 7. Forbind til en server">
                  <p>Ubuntu kan oprette forbindelse til en række forskellige servere ved hjælp af <span class="guimenu">Steder</span> → <span class="guimenuitem">Tilslut server...</span></p>
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
