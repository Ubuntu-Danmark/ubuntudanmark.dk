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
    <title xmlns="">E-post og kontoindstillinger</title>
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
              <h1 class="entry-title">E-post og kontoindstillinger</h1>
              <div class="entry-content">
                <div class="sect1" title="E-post og kontoindstillinger">
                  <p>Du kan bruge den samme e-mail-konto i Ubuntu, som du har gjort under Windows. Hvis du har en webbaseret e-postkonto, skal du bare kunne få adgang til det ved hjælp af en webbrowser, som du ville have gjort i Windows. Ellers skal du notere følgende oplysninger, så du kan genskabe dine kontoindstillinger på Ubuntu:</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>E-postadresse</p>
                      </li>
                      <li class="listitem">
                        <p>Adgangskode</p>
                      </li>
                      <li class="listitem">
                        <p>POP3- eller IMAP-server</p>
                      </li>
                      <li class="listitem">
                        <p>SMTP-server</p>
                      </li>
                      <li class="listitem">
                        <p>Godkendelsesmetode</p>
                      </li>
                    </ul>
                  </div>
                  <p>Instruktionerne til at eksportere e-post og e-postkontoindstillinger er specifikke for bestemte programmer. Instruktioner til nogle populære e-postklienter er givet i de følgende afsnit, brugere af andre programmer kan finde en vejledning der er relevante for deres e-postprogram på Ubuntu <a class="ulink" href="https://help.ubuntu.com/community" target="_top">Ubuntu fældeskabs hjælpe hjemmesiden</a>.</p>
                  <div class="sect2" title="Microsoft Outlook Express">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-email-msoe"></a>Microsoft Outlook Express</h3>
                        </div>
                      </div>
                    </div>
                    <p>Disse instruktioner er beregnet til brugere af <span class="application"><strong>Microsoft Outlook Express 6</strong></span>. Hvis du bruger en anden version af <span class="application"><strong>Outlook Express</strong></span>, kan du finde en vejledning specifik for den pågældende version af <a class="ulink" href="https://help.ubuntu.com/community" target="_top">Ubuntu fællesskab hjælpehjemmesiden</a>.</p>
                    <div class="sect3" title="Eksportering af adressebogen">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-email-msoe-address"></a>Eksportering af adressebogen</h4>
                          </div>
                        </div>
                      </div>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Åben <span class="application"><strong>Outlook Express</strong></span> og tryk <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Exporter</span> → <span class="guimenuitem">Adressebog...</span></p>
                          </li>
                          <li class="listitem">
                            <p><span class="application"><strong>Eksportværktøj til Adressekartotek</strong></span> vil starte. Vælg indstillingen <em class="guilabel">Tekstfil (semikolonseparerende værdier)</em> og tryk derefter på <span class="guibutton"><strong>Eksporter</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Gem filen et sted du kan huske. Giv filen et beskrivende navn, f.eks <code class="filename">e-post-adressebog.csv</code>, og tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg de detaljer fra adressebogen, som du ønsker at eksportere. Hvis du er usikker, så afkryds alle muligheder. Tryk derefter på <span class="guibutton"><strong>Udfør</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Du vil modtage en besked om, at <em class="guilabel">Eksport af adressekartoteket er gennemført.</em>. Tryk <span class="guibutton"><strong>OK</strong></span> og derefter <span class="guibutton"><strong>Luk</strong></span>. Din adressebog, skulle nu være blevet korrekt eksporteret.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Eksport af e-post fra Outlook Express">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-email-msoe-mail"></a>Eksport af e-post fra Outlook Express</h4>
                          </div>
                        </div>
                      </div>
                      <p>Fordi <span class="application"><strong>Microsoft Outlook Express</strong></span> ikke er i stand til at eksportere sine e-post til et mellemliggende format, skal du installere et andet stykke software for at eksportere dine e-mail.</p>
                      <p>Se <a class="xref" href="preparing-email.html#preparing-email-import" title="Forberedning af e-post til eksport med Mozilla Thunderbird">“Forberedning af e-post til eksport med Mozilla Thunderbird”</a> for instruktioner om at importere din e-post til <span class="application"><strong>Mozilla Thunderbird</strong></span> programmet, der giver mulighed for eksport af dine meddelelser.</p>
                    </div>
                  </div>
                  <div class="sect2" title="Microsoft Office Outlook">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-email-msoutlook"></a>Microsoft Office Outlook</h3>
                        </div>
                      </div>
                    </div>
                    <p>Disse instruktioner er beregnet til brugere af <span class="application"><strong>Microsoft Office Outlook 2003</strong></span>. Hvis du er en bruger af en anden version af <span class="application"><strong>Outlook</strong></span>, kan du finde en vejledning specifikt for denne version på wiki'en.</p>
                    <div class="sect3" title="Eksport af alle Outlook data">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-email-msoutlook-pst"></a>Eksport af alle Outlook data</h4>
                          </div>
                        </div>
                      </div>
                      <div class="caution" title="Pas på" style="margin-left: 0.5in; margin-right: 0.5in;">
                        <table border="0" summary="Caution">
                          <tr>
                            <td rowspan="2" align="center" valign="top" width="25">
                              <img alt="[Pas på]" src="../../libs/admon/caution.png" />
                            </td>
                            <th align="left"></th>
                          </tr>
                          <tr>
                            <td align="left" valign="top">
                              <p>Denne metode kan være upålidelig og bør kun anvendes til sikkerhedskopieringsformål.</p>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Åbn <span class="application"><strong>Outlook</strong></span> og tryk <span class="guimenuitem">Funktioner</span> → <span class="guimenuitem">Indstillinger...</span></p>
                          </li>
                          <li class="listitem">
                            <p>Vælg fanen <em class="guilabel">Konfiguration af e-mail</em> og tryk <span class="guibutton"><strong>Datafiler...</strong></span></p>
                          </li>
                          <li class="listitem">
                            <p>En skærm ved navn <em class="guilabel">Outlook-datafiler</em> vil blive vist. Vælg den første fil i listen, skriv navnet ned, og tryk <span class="guibutton"><strong>Åbn mappe...</strong></span></p>
                          </li>
                          <li class="listitem">
                            <p>Der vil blive åbnet en mappe. Inden du går videre, skal du lukke <span class="application"><strong>Outlook</strong></span> - i vinduet <em class="guilabel">Outlook-datafiler</em> skal du trykke <span class="guibutton"><strong>Luk</strong></span>, derefter skal du trykke <span class="guibutton"><strong>OK</strong></span> eller <span class="guibutton"><strong>Annuller</strong></span> i vinduet <em class="guilabel">Indstillinger</em>. Luk nu <span class="application"><strong>Outlook</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Find nu filen du havde valgt i <span class="application"><strong>Outlook</strong></span> i den netop åbnede mappe. Hvis du har problemer med at finde filen, kan du kigge efter typen <span class="emphasis"><em>Office-datafil</em></span> eller filtypenavnet <code class="filename">.pst</code>.</p>
                          </li>
                          <li class="listitem">
                            <p>Kopier filen til den placering, du bruger til at gemme dine eksporterede indstillinger.</p>
                          </li>
                          <li class="listitem">
                            <p>Gentag denne proces for alle de filer der var vist i <em class="guilabel">Outlook-datafiler</em> vinduet.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Eksportér dine kontakter">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-email-msoutlook-address"></a>Eksportér dine kontakter</h4>
                          </div>
                        </div>
                      </div>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Åbn <span class="application"><strong>Outlook</strong></span> og tryk på <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Importer og eksporter...</span></p>
                          </li>
                          <li class="listitem">
                            <p><span class="application"><strong>Guiden Import og eksport</strong></span> starter. Vælg punktet <em class="guilabel">Eksporter til en fil</em> og tryk derefter på <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Kommaseparerede værdier (DOS)</em> og tryk <span class="guibutton"><strong>Næste</strong></span></p>
                          </li>
                          <li class="listitem">
                            <p>Vælg mappen <em class="guilabel">Kontaktpersoner</em> og tryk <span class="guibutton"><strong>Næste</strong></span>. Vælge derefter hvor du vil gemme filen, og tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Et vindue med <em class="guilabel">Følgende handlinger vil blive udført</em> vil blive vist. Tryk <span class="guibutton"><strong>Udfør</strong></span> for at eksportere dine kontaktpersoner til den placering, du valgte i forrige trin.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Eksport af din kalender">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-email-msoutlook-calendar"></a>Eksport af din kalender</h4>
                          </div>
                        </div>
                      </div>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Åbn <span class="application"><strong>Outlook</strong></span> og tryk på <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Importer og eksporter...</span></p>
                          </li>
                          <li class="listitem">
                            <p><span class="application"><strong>Guiden Import og eksport</strong></span> starter. Vælg punktet <em class="guilabel">Eksporter til en fil</em> og tryk derefter på <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Kommaseparerede værdier (DOS)</em> og tryk <span class="guibutton"><strong>Næste</strong></span></p>
                          </li>
                          <li class="listitem">
                            <p>Vælg mappen <em class="guilabel">Kalender</em> og tryk <span class="guibutton"><strong>Næste</strong></span>. Vælg derefter hvor du vil gemme filen og tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Et vindue med <em class="guilabel">Følgende handlinger vil blive udført</em> vil blive vist. Tryk <span class="guibutton"><strong>Udfør</strong></span> for at eksportere dine kontaktpersoner til den placering, du valgte i forrige trin.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Eksport af e-post">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-email-msoutlook-mail"></a>Eksport af e-post</h4>
                          </div>
                        </div>
                      </div>
                      <div class="note" title="Bemærk" style="margin-left: 0.5in; margin-right: 0.5in;">
                        <table border="0" summary="Note">
                          <tr>
                            <td rowspan="2" align="center" valign="top" width="25">
                              <img alt="[Bemærk]" src="../../libs/admon/note.png" />
                            </td>
                            <th align="left"></th>
                          </tr>
                          <tr>
                            <td align="left" valign="top">
                              <p>Du behøver ikke at eksportere e-postbeskeder, hvis du bruger IMAP til at hente e-post fra din e-postserver - beskederne ligger stadig lagret på serveren. Du behøver kun at eksportere e-postbeskeder, hvis du bruger POP3 til at hente e-post fra din e-postserver. Dette skyldes at beskederne som standard ikke vil blive liggende på serveren, efter de er hentet til din computer, når du bruger POP3.</p>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <p>Fordi <span class="application"><strong>Microsoft Outlook</strong></span> ikke er i stand til fuldt ud at eksportere sine e-post til et anvendeligt mellemliggende format, skal du installere et andet stykke software for at eksportere din e-post.</p>
                      <p>Se <a class="xref" href="preparing-email.html#preparing-email-import" title="Forberedning af e-post til eksport med Mozilla Thunderbird">“Forberedning af e-post til eksport med Mozilla Thunderbird”</a> for instruktioner om at importere din e-post til <span class="application"><strong>Mozilla Thunderbird</strong></span> programmet, der giver mulighed for eksport af dine meddelelser.</p>
                    </div>
                  </div>
                  <div class="sect2" title="Forberedning af e-post til eksport med Mozilla Thunderbird">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-email-import"></a>Forberedning af e-post til eksport med Mozilla Thunderbird</h3>
                        </div>
                      </div>
                    </div>
                    <p>Fordi nogle e-postklienter (f.eks <span class="application"><strong>Microsoft Outlook</strong></span> og <span class="application"><strong>Microsoft Outlook Express</strong></span>) ikke gemmer deres mails i et standardformat, skal et ekstra stykke software anvendes til at konvertere e-posten før eksport. <span class="application"><strong>Mozilla Thunderbird</strong></span> er et gratis, open source-program som er i stand til at gøre dette.</p>
                    <p>Nedenstående instrukser forklarer hvordan du får Thunderbird, og derefter bruger det til at forberede e-post-beskeder til eksport:</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Åbn en webbrowser og gå til <a class="ulink" href="http://mozilladanmark.dk/produkter/thunderbird/" target="_top">Mozilla Thunderbird hjemmesiden</a>. Følg linket for at hente <span class="application"><strong>Mozilla Thunderbird</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Når overførslen er færdig, skal du køre installationspakken. Følg instruktionerne for at installere Thunderbird.</p>
                        </li>
                        <li class="listitem">
                          <p>Start <span class="application"><strong>Mozilla Thunderbird</strong></span>, når installationsprogrammet er færdigt. Du vil blive mødt med <span class="application"><strong>Import guide</strong></span>. Følg instruktionerne for at importere alle indstillinger - dette vil importere dine e-post og nogle andre data.</p>
                        </li>
                        <li class="listitem">
                          <p>Hvis <span class="application"><strong>Import guiden</strong></span> ikke vises, skal du trykke på <span class="guimenuitem">Funktioner</span> → <span class="guimenuitem">Importer...</span> og vælge <em class="guilabel">E-mail</em>. Følg vejledningen for at importere din e-post.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Når al din e-post er blevet importeret, skal du lave en kopi af det til eksport. Se <a class="xref" href="preparing-email.html#preparing-email-thunderbird" title="Eksport af e-post-beskeder fra Mozilla Thunderbird">“Eksport af e-post-beskeder fra Mozilla Thunderbird”</a> for instruktioner om, hvordan du gør dette.</p>
                  </div>
                  <div class="sect2" title="Eksport af e-post-beskeder fra Mozilla Thunderbird">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-email-thunderbird"></a>Eksport af e-post-beskeder fra Mozilla Thunderbird</h3>
                        </div>
                      </div>
                    </div>
                    <p>Disse instruktioner er beregnet til brugere af <span class="application"><strong>Mozilla Thunderbird</strong></span> og brugere af <span class="application"><strong>Outlook</strong></span> og <span class="application"><strong>Outlook Express</strong></span>, der har eksporteret deres mail til Thunderbird (se <a class="xref" href="preparing-email.html#preparing-email-import" title="Forberedning af e-post til eksport med Mozilla Thunderbird">“Forberedning af e-post til eksport med Mozilla Thunderbird”</a>).</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Start</span> → <span class="guimenuitem">Kør</span>, skriv <span class="emphasis"><em>%AppData%\Thunderbird\Profiles\</em></span> i boksen, og tryk derefter på <span class="guibutton"><strong>OK</strong></span>. En mappe vil åbne.</p>
                        </li>
                        <li class="listitem">
                          <p>I den nyåbnede mappe, skal du finde en anden mappe med et navn, der mest består af tilfældige tegn, for eksempel <span class="emphasis"><em>fyhsxlr3.default</em></span>. Åbn denne mappe.</p>
                        </li>
                        <li class="listitem">
                          <p>Find en mappe med navnet <code class="filename">Mail</code> i denne mappen. Vælg mappe, og kopiér den til et sikkert sted.</p>
                        </li>
                        <li class="listitem">
                          <p>Lav en sikkerhedskopi af den mappe, du lige har kopieret, når du skifter til Ubuntu. Denne mappe indeholder alle dine e-postmapper fra Thunderbird, i <span class="emphasis"><em>mbox</em></span>-formatet.</p>
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
