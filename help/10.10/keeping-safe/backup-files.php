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
    <title>Opret sikkerhedskopier af dine filer</title>
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
    <link rel="home" href="index.php" title="Hold din computer sikker" />
    <link rel="up" href="index.php" title="Hold din computer sikker" />
    <link rel="prev" href="avoid-internet-crime.php" title="Undgå internetirritation og -kriminalitet" />
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
              <h1 class="entry-title">Opret sikkerhedskopier af dine filer</h1>
              <div class="entry-content">
                <div class="sect1" title="Opret sikkerhedskopier af dine filer">
                  <p>Uventet tab af dele af dit arbejde og dine indstillinger er et problem du indimellem kan løbe ind i af den ene eller anden grund. Der er mange forskellige grunde til sådanne <span class="emphasis"><em>datatab</em></span>. Det kan være alt fra strømsvigt til en utilsigtet sletning af en fil. Det anbefales meget kraftigt, at du tager regelmæssige sikkerhedskopier af dine vigtige filer, så du ikke mister disse filer, hvis du løber ind i et problem.</p>
                  <p>Det er klogt at gemme sine sikkerhedskopier væk fra computeren. Det betyder, at du bør bruge en form for lagerplads, som ikke er permanent forbundet med din computer. Der er forskellige valgmuligheder:</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Skrivbare cd'er og dvd'er</p>
                      </li>
                      <li class="listitem">
                        <p>Eksterne harddiske eller hukommelseskort</p>
                      </li>
                      <li class="listitem">
                        <p>En anden computer på netværket</p>
                      </li>
                    </ul>
                  </div>
                  <p>En simpel metode til at sikkerhedskopiere dine filer er, at du manuelt kopierer dem til en sikker placering (se ovenfor) gennem <span class="application"><strong>Filhåndteringen</strong></span>.</p>
                  <p>Som alternativ kan du bruge et dedikeret sikkerhedskopieringsprogram, som f.eks <span class="application"><strong>Simple Backup Suite</strong></span>.</p>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p><a class="ulink" href="apt:sbackup" target="_top">Installer pakken <span class="application"><strong>sbackup</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-arkivet.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>For at lave en sikkerhedskopi, skal du trykke <span class="guimenu">System</span> → <span class="guisubmenu">Administration</span> → <span class="guimenuitem">Simple Backup Config</span> og indtast din administrator adgangskode når du bliver bedt om det.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Vælge den metode du vil bruge til sikkerhedskopring, under fanen <em class="guilabel">General</em>. Hvis du ikke er sikker på, hvad du bør sikkerhedskopiere, skal du vælge <em class="guilabel">Use recommended backup settings</em>. Dette vil udføre daglige akkumulerende og ugentlig komplette sikkerhedskopieringer af alle bruger-og systemfiler til standard mappen <code class="filename">/var/backup</code>, med undtagelse af multimedier og midlertidige filer samt filer større end 100 MB.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Tryk på <span class="guibutton"><strong>Gem</strong></span> for at gemme dine indstillinger.</p>
                      </li>
                      <li class="step" title="Trin 5">
                        <p>Hvis du ønsker at sikkerhedskopiere dine filer med det samme, så tryk på <span class="guibutton"><strong>Backup Now!, ellers skal du trykke pLuk for at annullere den planlagte backup.</strong></span></p>
                      </li>
                      <li class="step" title="Trin 6">
                        <p>Din sikkerhedskopi vil starte i baggrunden, og du vil se pop-up-vindue med oplysninger om proces-id. Klik på <span class="guibutton"><strong>Luk</strong></span>. Sikkerhedskopieringen kan tager et stykke tid, afhængig af størrelsen af kopierede filer.</p>
                      </li>
                      <li class="step" title="Trin 7">
                        <p>Din sikkerhedskopi vil blive gemt som en mappe under <code class="filename">/var/backup</code>. Du skal være en <a class="ulink" href="../administrative/" target="_top">administrator</a> for at få adgang til din sikkerhedskopi.</p>
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
                          <p>Simple Backup Suite giver ikke mulighed for at skrive sikkerhedskopier direkte til cd'er eller dvd'er. Du er nødt til manuelt at brænde sikkerhedskopier ved hjælp af for eksempel diskbrændingsprogrammet Brasero (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd og Video</span> → <span class="guimenuitem">Brasero diskbrænder</span>). Som alternativt kan du tilpasse <span class="application"><strong>Simple Backup Config</strong></span> til at sikkerhedskopiere dine filer til et andet sted (f.eks. en ekstern server eller eksterne drev). Se <a class="ulink" href="https://help.ubuntu.com/community/BackupYourSystem/SimpleBackupSuite" target="_top">fællesskabets hjælpewiki</a> for detaljer om hvordan du bruger Simple Backup Suite-software.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <p>Hvis du vil gendanne et sikkerhedskopi lavet med <span class="application"><strong>Simple Backup Config</strong></span>, skal du trykke <span class="guimenu">System</span> → <span class="guisubmenu">Administration</span> → <span class="guimenuitem">Simple Backup Restore</span> og vælg Restore Source Folder og Available backups fra rullemenuen. Vælg de filer og mapper, du vil gendanne, tryk på knappen <span class="guibutton"><strong>Restore</strong></span> og bekræft dit valg. Hvis du ønsker at gendanne et andet sted, du istedet trykke på <span class="guibutton"><strong>Restore As…</strong></span>.</p>
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
                          <p>Som standard ejes alle genskabte filer og mapper af root. Dette er fordi Simple Backup Suite kører med root-privilegier. Du er nødt til <a class="ulink" href="http://library.gnome.org/users/user-guide/2.32/nautilus-permissions" target="_top">ændre disse fil eller mappes tilladelser</a> via <span class="application"><strong>Filbrowseren</strong></span>.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <p>Nogle generelle råd til at skabe en god sikkerhedskopi gives herunder:</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Foretag regelmæssig sikkerhedskopiering</p>
                      </li>
                      <li class="listitem">
                        <p>Test altid dine sikkerhedskopier efter du har oprettet dem for at sikre, at de er lavet korrekt</p>
                      </li>
                      <li class="listitem">
                        <p>Sæt tydelige mærkater på dine sikkerhedskopier og opbevar dem et sikkert sted</p>
                      </li>
                    </ul>
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
