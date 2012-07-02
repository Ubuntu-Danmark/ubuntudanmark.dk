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
    <title xmlns="">På nettet med Firefox</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" media="print" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/print.css" />
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
    <link rel="home" href="index.php" title="Internet og netværk" />
    <link rel="up" href="web-apps.php" title="Kapitel 9. Internetprogrammer" />
    <link rel="prev" href="web-apps.php" title="Kapitel 9. Internetprogrammer" />
    <link rel="next" href="email.php" title="Send og modtag e-post" />
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
              <h1 class="entry-title">På nettet med Firefox</h1>
              <div class="entry-content">
                <div class="sect1" title="På nettet med Firefox">
                  <p>Den funktionsrige og sikre internetbrowser <span class="application"><strong>Mozilla Firefox</strong></span> leveres sammen med Ubuntu. <span class="application"><strong>Firefox</strong></span> har faneblade, blokering af pop op-vinduerBegrænsede udvidelsesmo, indbygget søgeværktøj og live-bogmærker. Populære udvidelsesmoduler (plugins) som for eksempel Java, Flash og RealPlayer er også understøttet.</p>
                  <p><span class="application"><strong>Firefox</strong></span> kan åbnes ved at klikke på <span class="guimenu">Programmer</span> → <span class="guisubmenu">Internet</span> → <span class="guimenuitem">Firefox Web Browser</span>.</p>
                  <div class="sect2" title="Hent tilføjelser til din Firefox">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="web-browsing-addons"></a>Hent tilføjelser til din Firefox</h3>
                        </div>
                      </div>
                    </div>
                    <p>Tilføjelser udvider Firefox' funktionalitet, for eksempel ved at fjerne reklamer automatisk eller ændre menuers opførsel.</p>
                    <p>For at se en liste over aktuelt installerede udvidelsesmoduler (plugins) i <span class="application"><strong>Firefox</strong></span>, åbn <span class="guimenu">Programmer</span> → <span class="guisubmenu">Internet</span> → <span class="guimenuitem">Firefox Web Browser</span> og klik på <span class="guimenu">Funktioner</span> → <span class="guimenuitem">Tilføjelser</span>.</p>
                    <div class="sect3" title="Hurtig installation af ofte anvendte udvidelsesmoduler">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="web-browsing-addons-commonrestricted"></a>Hurtig installation af ofte anvendte udvidelsesmoduler</h4>
                          </div>
                        </div>
                      </div>
                      <p>Det er muligt at installere et helt sæt af ofte anvendte begrænsede udvidelsesmoduler på én gang ved at installere pakken <span class="application"><strong>Ubuntu restricted extras</strong></span>.</p>
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
                              <p><span class="emphasis"><em>Begrænsede udvidelsesmoduler</em></span> kan ikke distribueres med Ubuntu på grund af juridiske forhold omkring deres anvendelse i nogle lande. Kontrollér at det er lovligt for dig at bruge denne software, før du installerer den. Læs <a class="ulink" href="http://www.ubuntu.com/ubuntu/licensing" target="_top">Ubuntus webside</a> for mere information om begrænset software.</p>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <p><a class="ulink" href="apt:ubuntu-restricted-extras" target="_top">Klik her</a> for at installere pakken <span class="application"><strong>ubuntu-restricted-extras</strong></span>.</p>
                      <p>Ud over udvidelsesmoduler og multimedie-codecs vil også Windows-skrifttyper blive installeret.</p>
                      <p>Følgende udvidelsesmoduler og codecs bliver installeret med pakken <span class="application"><strong>Ubuntu restricted extras</strong></span>:</p>
                      <div class="itemizedlist">
                        <ul class="itemizedlist" type="disc">
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>flashplugin-installer</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>gstreamer0.10-ffmpeg</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>gstreamer0.10-pitfdll</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>gstreamer0.10-plugins-bad</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>gstreamer0.10-plugins-bad-multiverse</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>gstreamer0.10-plugins-ugly</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>gstreamer0.10-plugins-ugly-multiverse</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>libavcodec-extra-52</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>libmp4v2-0</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>sun-java6-plugin</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>ttf-mscorefonts-installer</strong>
                              </span>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <span class="application">
                                <strong>unrar</strong>
                              </span>
                            </p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="sect3" title="Lyd- og videoudvidelsesmoduler">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="web-browsing-addons-audiovideo"></a>Lyd- og videoudvidelsesmoduler</h4>
                          </div>
                        </div>
                      </div>
                      <p>Der bliver brugt mange forskellige multimedieformater på internettet og du kan opleve, at du ikke er i stand til at afspille visse lyd- og videofiler uden at installere et passende udvidelsesmodul.</p>
                      <p>Quicktime, Real, WMV og mange andre er tilgængelige.</p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Åbn <span class="guimenu">Programmer</span> → <span class="guimenuitem">Ubuntu Softwarecenter</span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Klik på <span class="guibutton"><strong>Lyd og video</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Dobbeltklik på hvert udvidelsesmodul eller program du har brug for og klik på <span class="guibutton"><strong>Installér</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Du bliver bedt om en adgangskode, hvorefter udvidelsesmodulet bliver hentet.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Flash multimedieplugin">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="web-browsing-addons-flash"></a>Flash multimedieplugin</h4>
                          </div>
                        </div>
                      </div>
                      <p><a class="ulink" href="apt:flashplugin-installer" target="_top">Klik her</a> for at installere pakken <span class="application"><strong>flashplugin-installer</strong></span>.</p>
                    </div>
                    <div class="sect3" title="Java browser-modul">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="web-browsing-addons-java"></a>Java browser-modul</h4>
                          </div>
                        </div>
                      </div>
                      <p>Nogle internetsider bruger små <span class="application"><strong>Java</strong></span>-programmer, som kræver et installeret Java-udvidelsesmodul for at køre.</p>
                      <p><a class="ulink" href="apt:sun-java6-plugin" target="_top">Klik her</a> for at installere <span class="application"><strong>sun-java6-plugin</strong></span>-pakken.</p>
                    </div>
                  </div>
                  <div class="sect2" title="Ændr skrifttypens standardstørrelse">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="web-browsing-fontsize"></a>Ændr skrifttypens standardstørrelse</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du synes, at skriftstørrelsen i Firefox er for lille og dermed ikke behagelig for øjnene kan du øge skrifttypens standardstørrelse.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Klik på <span class="guimenuitem">Rediger</span> → <span class="guimenuitem">Præferencer</span> og vælg fanebladet <em class="guilabel">Indhold</em></p>
                        </li>
                        <li class="listitem">
                          <p>Under <em class="guilabel">skrifttyper og farver</em>, ændr <em class="guilabel">Størrelse</em> til en højere værdi (omkring 20 plejer at være behageligt at læse)</p>
                        </li>
                        <li class="listitem">
                          <p>Teksten på hjemmesider vil med det samme se større ud. Klik på <span class="guibutton"><strong>Luk</strong></span></p>
                        </li>
                      </ol>
                    </div>
                    <p>Tryk på <span class="guimenuitem">Vis</span> → <span class="guimenuitem">Zoom</span> → <span class="guimenuitem">Zoom ind</span> for midlertidigt at forstørre en hjemmeside, hvilket også vil øge tekststørrelsen. Du kan også holde <span class="keycap"><strong>Ctrl</strong></span>-knappen nede og rulle med din mus' rullehjul, eller du kan trykke <span class="keycap"><strong>Ctrl</strong></span>+<span class="keycap"><strong>+</strong></span>.</p>
                    <p>Sikr dig at <span class="guimenuitem">Vis</span> → <span class="guimenuitem">Zoom</span> → <span class="guimenuitem">Zoom kun tekst</span> er markeret, hvis du kun ønsker at øge tekststrøelsen.</p>
                    <p>Klik på <span class="guimenuitem">Vis</span> → <span class="guimenuitem">Zoom</span> → <span class="guimenuitem">Nulstil</span> for at returnere siden til dens normale størrelse.</p>
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
    <script async="true" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
