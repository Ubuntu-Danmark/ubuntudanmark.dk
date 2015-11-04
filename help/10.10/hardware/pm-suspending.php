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
    <title xmlns="">Sæt din computer i hvile eller dvale</title>
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
    <link rel="home" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="up" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="prev" href="laptops.php" title="Bærbare computere" />
    <link rel="next" href="input-devices.php" title="Mus og tastaturer" />
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
              <h1 class="entry-title">Sæt din computer i hvile eller dvale</h1>
              <div class="entry-content">
                <div class="sect1" title="Sæt din computer i hvile eller dvale">
                  <p>For at spare energi kan du sætte din computer i nogle forskellige strømbesparende tilstande, når du ikke bruger den:</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p><span class="strong"><strong>Hvile</strong></span> svarer til at lægge computeren til at sove. Computeren vil stadig være tændt og alt dit arbejde vil være åbent, men den vil bruge meget mindre energi. Du kan vække computeren ved at trykke på en tast eller klikke med musen.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="strong"><strong>Dvale</strong></span> er at slukke computeren fuldstændigt, men samtidig gemme computerens aktuelle tilstand (som f.eks. at bevare alle dine åbne dokumenter). Når du tænder computeren igen efter dvale, bør alt dit arbejde blive genoprettet, som det var, før systemet gik i dvale. Når systemet er i dvale, bruger det ingen strøm.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="strong"><strong>Luk ned</strong></span> er at slukke computeren fuldstændigt uden at gemme computerens aktuelle tilstand. Systemet bruger ikke strøm, når det er lukket ned.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="strong"><strong>Genoptagelse</strong></span> er at bringe computeren ud af en strømbesparende tilstand og vende tilbage til normal drift. Du kan genoptage driften fra hviletilstand ved at trykke på en tast på tastaturet eller ved at klikke med musen. Du kan genoptage driften fra dvaletilstand ved at trykke på computerens tænd/sluk-knap.</p>
                      </li>
                    </ul>
                  </div>
                  <p>Du kan manuelt sætte din computer i en strømbesparende tilstand ved at klikke på <span class="application"><strong>Brugerskifter</strong></span> øverst i højre hjørne af skærmen og derefter klikke på den passende knap.</p>
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
                          <p>Nogle computere kan have problemer med at gå i bestemte strømbesparende tilstande. Den bedste måde at undersøge, om din computer kan håndtere en strømbesparende tilstand er at prøve at skifte til denne tilstand og se, om den opfører sig, som du forventer. Du bør altid sikre dig, at du har gemt alle vigtige dokumenter, før du sætter computeren i hvile eller dvale.</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="sect2" title="Min computer går ikke korrekt i hvile eller dvale">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="pm-suspend-hibernate-fails"></a>Min computer går ikke korrekt i hvile eller dvale</h3>
                        </div>
                      </div>
                    </div>
                    <p>Nogle computere kan ikke gå korrekt i hvile eller dvale med Ubuntu. Hvis det er tilfældet for din computer, kan du opleve et eller flere af de følgende symptomer:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Computeren slukker ikke, efter at du har klikket for at sætte den i dvale.</p>
                        </li>
                        <li class="listitem">
                          <p>Dine tidligere åbne programmer bliver ikke gendannet, når du tænder computeren igen efter dvale.</p>
                        </li>
                        <li class="listitem">
                          <p>Computeren vågner ikke op, efter du har sat den i hvile.</p>
                        </li>
                        <li class="listitem">
                          <p>Visse programmer og hardware-enheder virker ikke længere korrekt efter genoptagelse fra dvaletilstand eller opvågning fra hviletilstand.</p>
                        </li>
                      </ul>
                    </div>
                    <p>Hvis du oplever et af disse problemer, kan du rapportere fejlen til <a class="ulink" href="https://bugs.launchpad.net/ubuntu/+filebug" target="_top">Launchpad</a>. Problemerne vil forhåbentlig blive løst i en senere version af Ubuntu.</p>
                    <p>Hvis din hardware ikke virker korrekt, efter at din computer har været i hvile eller dvale, kan du genstarte computeren, hvorefter den bør virke normalt igen. Hvis et program ikke virker korrekt, kan du forsøge at lukke programmet og starte det igen.</p>
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
                            <p>Sørg for at gemme alle dine åbne dokumenter, før du tester hvile- og dvaleproblemer.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Hvorfor får jeg et underligt mønster på skærmen, når jeg sætter computeren i dvale?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="pm-hibernate-pattern"></a>Hvorfor får jeg et underligt mønster på skærmen, når jeg sætter computeren i dvale?</h3>
                        </div>
                      </div>
                    </div>
                    <p>Din skærm viser måske et sort og hvidt mønster lige efter, at du har klikket for at sætte din computer i dvale. Dette er normalt ikke noget, man bør bekymre sig om, og det er blot den måde nogle computeres grafikkort reagerer på de indledende trin i dvaleprocessen.</p>
                    <p>Hvis computeren viser et mønster i længere tid uden at slukke sig selv, har du måske et problem med dvalefunktionen. Læs <a class="link" href="pm-suspending.php#pm-suspend-hibernate-fails" title="Min computer går ikke korrekt i hvile eller dvale">Min computer går ikke korrekt i hvile eller dvale</a> for mere information.</p>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
