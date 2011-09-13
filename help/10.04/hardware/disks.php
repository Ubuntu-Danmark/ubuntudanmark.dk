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
    <title xmlns="">Diske og partitioner</title>
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
    <link rel="home" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="up" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="prev" href="jockey.php" title="Proprietære drivere" />
    <link rel="next" href="laptops.php" title="Bærbare computere" />
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
              <h1 class="entry-title">Diske og partitioner</h1>
              <div class="entry-content">
                <div class="sect1" title="Diske og partitioner">
                  <p>Dette afsnit giver instruktioner om, hvordan man håndterer diske og drev, såsom flytbare harddiske.</p>
                  <a id="id454329" class="indexterm"></a>
                  <a id="id454447" class="indexterm"></a>
                  <a id="id454460" class="indexterm"></a>
                  <a id="id454477" class="indexterm"></a>
                  <a id="id499098" class="indexterm"></a>
                  <a id="id499111" class="indexterm"></a>
                  <div class="sect2" title="Undersøg hvor meget diskplads der er tilgængelig">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="checking-usage"></a>Undersøg hvor meget diskplads der er tilgængelig</h3>
                        </div>
                      </div>
                    </div>
                    <p>Klik på <span class="guimenu">System</span> → <span class="guisubmenu">Administration</span> → <span class="guimenuitem">Systemovervågning</span> og vælg fanebladet <em class="guilabel">Filsystemer</em> for at se, hvor meget harddiskplads, der er tilgængelig på din computer.</p>
                    <p>Du kan også klikke på <span class="guimenu">Steder</span> → <span class="guimenuitem">Maskine</span>, højreklikke på en harddisk, klikke på <em class="guilabel">Egenskaber</em> og vælge fanebladet <em class="guilabel">Generelt</em> for at se en oversigt over den aktuelt tilgængelige diskplads på den valgte disk.</p>
                    <div class="sect3" title="Avanceret analyse af diskforbrug">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="advanced-disk-analysis"></a>Avanceret analyse af diskforbrug</h4>
                          </div>
                        </div>
                      </div>
                      <p>For en mere dybdegående analyse af dit filsystem, klik på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Diskforbrugsanalyse</span> for at starte <span class="application"><strong>Diskforbrugsanalyse</strong></span>.</p>
                      <p>Klik på <span class="guibutton"><strong>Skan hjemmemappe</strong></span> for at skanne din hjemmemappe, eller klik på <span class="guibutton"><strong>Skan filsystem</strong></span> for at skanne hele filsystemet.</p>
                      <p>Læs <a class="ulink" href="http://library.gnome.org/users/baobab/2.30/" target="_top">Manual til diskforbrugsanalyse</a> for mere information.</p>
                    </div>
                  </div>
                  <div class="sect2" title="Hvordan kan jeg frigøre noget diskplads?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="free-disk-space"></a>Hvordan kan jeg frigøre noget diskplads?</h3>
                        </div>
                      </div>
                    </div>
                    <p>Der er mange forskellige enkle måder at gøre mere diskplads tilgængelig:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Tøm din papirkurv ved at højreklikke på papirkurv-ikonet på det nederste panel og vælge <em class="guilabel">Tøm papirkurv</em>.</p>
                        </li>
                        <li class="listitem">
                          <p>Kør <span class="application"><strong>Systemoprydning</strong></span> ved at klikke på <span class="guimenu">System</span> → <span class="guisubmenu">Administration</span> → <span class="guisubmenu">Systemoprydning</span>. Dette vil fjerne ubrugte og forældede softwarepakker fra din computer. Læs listen over pakker grundigt igennem, før du klikker på <span class="guibutton"><strong>Ryd op</strong></span>; pakker som du har hentet manuelt og installeret kan være opført som ubrugte, selvom de ikke er det.</p>
                        </li>
                        <li class="listitem">
                          <p>Fjern softwarepakker, som du ikke længere bruger. Læs <a class="ulink" href="../add-applications/#removing" target="_top">Tilføj/fjern programmer</a> for oplysninger om fjernelse af pakker.</p>
                        </li>
                        <li class="listitem">
                          <p>Slet filer du ikke har brug for længere. Du kan bruge Diskforbrugsanalyse (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Diskforbrugsanalyse</span>) til at finde ud af, hvilke filer der optager mest plads. Pas på du ikke sletter filer, som du stadig har brug for!</p>
                        </li>
                      </ul>
                    </div>
                    <p>Du kan også komprimere og arkivere dine gamle og sjældent brugte dokumenter:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Markér de filer og mapper, som du ønsker at komprimere, højreklik på en af dem og vælg <em class="guilabel">Opret arkiv</em>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg et navn, en placering og et format til filen (<code class="filename">.tar.gz</code>-formatet er det mest brugte i Ubuntu, .zip er kompatibelt med Windows og <code class="filename">.tar.lzma</code> giver for det meste den bedste komprimering).</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Klik på <span class="guibutton"><strong>Opret</strong></span>. En arkivfil indeholdende komprimerede kopier af dine filer vil blive oprettet.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Slet de gamle ukomprimerede filer for at frigøre noget diskplads.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Partitionering af en enhed">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="partitioning-device"></a>Partitionering af en enhed</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan bruge <span class="application"><strong>GNOME-partitioneringsprogram</strong></span> til at partitionere lagringsenheder. <a class="ulink" href="apt:gparted" target="_top">Installer <span class="application"><strong>gparted</strong></span>-pakken </a> og tryk derefter på <span class="guimenu">System</span> → <span class="guisubmenu">Administration </span> → <span class="guimenuitem">Partition Editor</span> for at starte partitionshåndteringen.</p>
                    <div class="caution" title="Pas på" style="margin-left: 0.5in; margin-right: 0.5in;">
                      <table border="0" summary="Caution">
                        <tr>
                          <td rowspan="2" align="center" valign="top" width="25">
                            <img alt="[Pas på]" src="../libs/admon/caution.png" />
                          </td>
                          <th align="left"></th>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                            <p>Du bør være forsigtig, når du ændrer diskpartitioner, da det er muligt at miste dine data eller at ændre den forkerte partition.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="sect3" title="Frigør plads til en ny partition">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="freeing-space"></a>Frigør plads til en ny partition</h4>
                          </div>
                        </div>
                      </div>
                      <p>For at oprette en ny partition på en allerede partitioneret enhed, må du først tilpasse størrelsen af en eksisterende partition. Hvis du allerede har fri plads, spring til <a class="xref" href="disks.php#creating-new-partition" title="Oprettelse af en ny partition">“Oprettelse af en ny partition”</a>; ellers, følg instruktionerne nedenfor: </p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Klik på <span class="guimenu">System</span> → <span class="guisubmenu">Administration </span> → <span class="guimenuitem">Partitionshåndtering</span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg den enhed der skal partitioneres fra rullegardinmenuen øverst til højre i hovedvinduet.</p>
                          </li>
                          <li class="listitem">
                            <p>Der vil blive vist en liste over partitioner. Markér den ønskede partition og vælg <span class="guimenu">Partition</span> → <span class="guimenuitem">Afmontér</span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Tilpas/flyt</em> for at tilpasse partitionens størrelse. Vinduet <em class="guilabel">Tilpas/flyt</em> vil blive vist. Du kan bruge feltet <em class="guilabel">Fri efterfølgende plads (MiB)</em> til at vælge, hvor meget plads, der skal frigøres efter denne partition, eller <em class="guilabel">Fri forudgående plads (MiB)</em> til at frigøre plads før denne partition. Du kan også bruge skyderen til at justere partitionens størrelse.</p>
                          </li>
                          <li class="listitem">
                            <p>Klik på <span class="guibutton"><strong>Tilpas/flyt</strong></span> for at anvende ændringerne.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Oprettelse af en ny partition">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="creating-new-partition"></a>Oprettelse af en ny partition</h4>
                          </div>
                        </div>
                      </div>
                      <p>For at oprette en ny partition: </p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Vælg den enhed der skal partitioneres fra rullegardinmenuen øverst til højre i hovedvinduet.</p>
                          </li>
                          <li class="listitem">
                            <p>En liste over partitioner vil blive vist. Markér den partition, der kaldes <em class="guilabel">uallokeret</em> og klik på <span class="guibutton"><strong>Ny</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg det filsystem du ønsker at bruge i <em class="guilabel">Filsystem</em>-rullelisten og klik på <span class="guibutton"><strong>Tilføj</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Klik på <span class="guibutton"><strong>Anvend</strong></span> for at anvende alle de ændringer, du har lavet.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                  </div>
                  <div class="sect2" title="Formatering af en partition">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="partition-formatting"></a>Formatering af en partition</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan bruge <span class="application"><strong>GNOME-Partitionsprogram</strong></span> til at formatere diskpartitioner (læs <a class="xref" href="disks.php#partitioning-device" title="Partitionering af en enhed">“Partitionering af en enhed”</a> for mere information om <span class="application"><strong>GNOME-Partitionsprogram</strong></span>).</p>
                    <p>For at formatere en partition, gør følgende: </p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guisubmenu">Administration </span> → <span class="guimenuitem">Partitionshåndtering</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg den enhed der skal partitioneres fra rullegardinmenuen øverst til højre i hovedvinduet.</p>
                        </li>
                        <li class="listitem">
                          <p>Der vil blive vist en liste over partitioner. Markér den ønskede partition og vælg <span class="guimenu">Partition</span> → <span class="guimenuitem">Afmontér</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Markér den partition du ønsker at formatere, vælg <span class="guimenu">Partition</span> → <span class="guimenuitem">Formatér til</span> og vælg den type filsystem fra listen, som du ønsker at formatere partitionen til.</p>
                        </li>
                        <li class="listitem">
                          <p>Klik på <span class="guibutton"><strong>Anvend</strong></span> for at anvende alle de ændringer, du har lavet.</p>
                        </li>
                      </ol>
                    </div>
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
                            <p>Ved at klikke på <span class="guibutton"><strong>Anvend</strong></span> vil alle filer på partitionen bliver slettet permanent.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Hvad er formatering?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="to-format-meaning"></a>Hvad er formatering?</h3>
                        </div>
                      </div>
                    </div>
                    <p>At formatere en harddisk eller partition betyder, at man forbereder enheden til brug for lagring af data.</p>
                    <p>Handlingen at formatere en harddisk eller partition er, når et specifikt datalagringsformat bliver taget i anvendelse på enheden. Dette format er <span class="quote">“<span class="quote">filsystemet</span>”</span>.</p>
                    <p>Når du køber en disk, er den normalt ikke formateret, og den kan endnu ikke bruges til at gemme data. Når du formaterer enheden, vil du bemærke, at den frie plads på den er mindre end dens oprindelige størrelse. Dette skyldes det forhold, at noget plads skal bruges til at gøre enheden brugbar. Dette område er optaget af filsystemet. Desuden bruger diskproducenterne ofte en anden standard til at måle diskkapaciteten, hvilket skaber yderligere uoverensstemmelse.</p>
                  </div>
                  <div class="sect2" title="Hvad er et filsystem?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="what-is-filesystem"></a>Hvad er et filsystem?</h3>
                        </div>
                      </div>
                    </div>
                    <p>Et filsystem er en bestemt måde at gemme og organisere filer på en lagerenhed, så dom en hardisk, og er en vigtig del af et operativsystem. Uden et filsystem ville det være svært at tilgå filer.</p>
                    <p>Der er forskellige typer filsystemer. De mest almindelige er: </p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>ext2, ext3 og ext4: Disse findes normalt på GNU/Linux operativsystemer. Ubuntu bruger <span class="emphasis"><em>ext4</em></span> som sit standardfilsystem.</p>
                        </li>
                        <li class="listitem">
                          <p><acronym class="acronym">FAT16</acronym> og <acronym class="acronym">FAT32</acronym>: Dette er Microsoft Windows filsystemer, som findes på ældre computere. Hvis du ønsker at dele data mellem to computere, er <span class="emphasis"><em><acronym class="acronym">FAT32</acronym></em></span>-formatet et godt valg.</p>
                        </li>
                        <li class="listitem">
                          <p><acronym class="acronym">NTFS</acronym>: Dette er filsystemet, som bruges af mere moderne versioner af Microsoft Windows.</p>
                        </li>
                        <li class="listitem">
                          <p><acronym class="acronym">HFS+</acronym>: Dette er standardfilsystemet for Mac OSX.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Hvad er en partition?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="partition-meaning"></a>Hvad er en partition?</h3>
                        </div>
                      </div>
                    </div>
                    <p>En partition er en måde at opdele en enheds lagerkapacitet, f.eks. en harddisk, i flere dele, som derefter kan behandles som separate lagringsenheder (<span class="quote">“<span class="quote">logiske enheder</span>”</span>).</p>
                    <p>Hver enkelt logisk enhed bliver opfattet af operativsystemet som en separat enhed og bliver derfor behandlet som en uafhængig disk.</p>
                    <p>Der kan være forskellige grunde til at partitionere en harddisk: </p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>For at skabe fri plads</p>
                        </li>
                        <li class="listitem">
                          <p>For at installere forskellige operativsystemer</p>
                        </li>
                        <li class="listitem">
                          <p>For bedre at organisere data på harddisken</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Montering og afmontering af enheder">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="mount-and-umount"></a>Montering og afmontering af enheder</h3>
                        </div>
                      </div>
                    </div>
                    <p>Når du tilslutter en flytbar lagringsenhed til din computer, skal den <span class="emphasis"><em>monteres</em></span> af operativsystemet, så du kan tilgå filerne på enheden.</p>
                    <p>Læs <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/gosnautilus-460.html" target="_top">Brug flytbare medier</a> for at lære, hvordan man monterer og afmonterer lagringsenheder</p>
                    <p>Når du kopierer filer til en lagringsenhed, bliver de ikke altid skrevet til enheden med det samme. I stedet bliver filerne ofte gemt i en kø, så de alle kan blive overført til enheden samtidig (af effektivitetshensyn). Hvis du frakobler enheden, før alle filerne er blevet overført, risikerer du at miste filerne. For at forhindre dette, bør du altid <span class="emphasis"><em>afmontere</em></span> lagringsenheder, før du frakobler dem.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Arbejde med hardware-enheder</h3>
              <ul>
              <li><a href="jockey.php">Proprietære drivere</a>
                  <ul>
                  <li><a href="jockey.php#jockey-whyproprietary">Hvorfor er nogle drivere proprietære?</a></li>
                  <li><a href="jockey.php#jockey-enable">Aktivering af en proprietær driver</a></li>
                  <li><a href="jockey.php#jockey-disable">Deaktivering af en proprietær driver</a></li>
                  </ul>
              </li>
              <li><a href="disks.php">Diske og partitioner</a>
                  <ul>
                  <li><a href="disks.php#checking-usage">Undersøg hvor meget diskplads der er tilgængelig</a></li>
                  <li><a href="disks.php#free-disk-space">Hvordan kan jeg frigøre noget diskplads?</a></li>
                  <li><a href="disks.php#partitioning-device">Partitionering af en enhed</a></li>
                  <li><a href="disks.php#partition-formatting">Formatering af en partition</a></li>
                  <li><a href="disks.php#to-format-meaning">Hvad er formatering?</a></li>
                  <li><a href="disks.php#what-is-filesystem">Hvad er et filsystem?</a></li>
                  <li><a href="disks.php#partition-meaning">Hvad er en partition?</a></li>
                  <li><a href="disks.php#mount-and-umount">Montering og afmontering af enheder</a></li>
              <li><a href="laptops.php">Bærbare computere</a>
                  <ul>
                  <li><a href="laptops.php#laptops-pm">Strømstyringsindstillinger</a></li>
                  <li><a href="laptops.php#laptops-touchpads">Museplader</a></li>
                  <li><a href="laptops.php#laptops-testing-reports">Find testrapporter for bærbare computere</a></li>
                  </ul>
              </li>
              <li><a href="pm-suspending.php">Sæt din computer i hvile eller dvale</a>
                  <ul>
                  <li><a href="pm-suspending.php#pm-suspend-hibernate-fails">Min computer går ikke korrekt i hvile eller dvale</a></li>
                  <li><a href="pm-suspending.php#pm-hibernate-pattern">Hvorfor får jeg et underligt mønster på skærmen, når jeg sætter computeren i dvale?</a></li>
                  </ul>
              </li>
              <li><a href="input-devices.php">Mus og tastaturer</a>
                  <ul>
                  <li><a href="input-devices.php#input-mice">Mus og andre pegeenheder</a></li>
                  <li><a href="input-devices.php#input-keyboard">Tastaturer</a></li>
                  <li><a href="input-devices.php#input-touchpads">Museplader og tegneplader</a></li>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
