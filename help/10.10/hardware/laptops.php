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
    <title xmlns="">Bærbare computere</title>
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
    <link rel="prev" href="disks.php" title="Diske og partitioner" />
    <link rel="next" href="pm-suspending.php" title="Sæt din computer i hvile eller dvale" />
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
              <h1 class="entry-title">Bærbare computere</h1>
              <div class="entry-content">
                <div class="sect1" title="Bærbare computere">
                  <p>Dette afsnit indeholder information for folk, der bruger Ubuntu på en bærbar computer.</p>
                  <div class="sect2" title="Strømstyringsindstillinger">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="laptops-pm"></a>Strømstyringsindstillinger</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan ændre din bærbare computers strømstyringsindstillinger for at forlænge batteriets levetid og reducere energispild.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Strømstyring</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Tilpas indstillingerne, så de passer til dine ønsker. Ændringer træder i kraft med det samme.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Visning af en pauseskærm bruger ofte mere strøm, end hvis du blot lader skærmen gå i sort. Du kan måske forbedre din bærbare computeres batterilevetid en smule ved at slå pauseskærmen fra.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Pauseskærm</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Ændr <em class="guilabel">Tema for pauseskærm</em> til <em class="guilabel">Sort skærm</em>. Dette vil ganske enkelt vise en sort skærm som en pauseskærm.</p>
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
                            <p>Når din bærbare computer kører på batteri, er skærmen en af de største strømslugere. Ved at skrue ned for skærmens lysstyrke kan man ofte forbedre batteriets levetid betydeligt. Mange bærbare computere tillader dig gøre dette ved at trykke <span class="keycap"><strong>Fn</strong></span>+<span class="keycap"><strong>F7</strong></span> flere gange.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Museplader">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="laptops-touchpads"></a>Museplader</h3>
                        </div>
                      </div>
                    </div>
                    <p>De fleste bærbare computere har en museplade, som bruges til at styre musemarkøren. Der er mange måder at ændre den måde, musepladen opfører sig på. De mest grundlæggende musepladeindstillinger kan tilpasses som beskrevet nedenfor.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Mus</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Klik på fanebladet <em class="guilabel">Museplade</em>.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Her kan du tilpasse musepladens indstillinger, så de passer til dig. Ændringer vil træde i kraft med det samme.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Visse museplader kan blive genkendt som normale museenheder, selvom de faktisk er museplader. I sådanne tilfælde vil fanebladet <em class="guilabel">Museplade</em> ikke være tilgængeligt i museindstillingerne.</p>
                    <p>Mere avancerede indstillinger til pegeplader kan tilgås med værktøjet <span class="application"><strong>gsynaptics</strong></span>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Installér pakken <a class="ulink" href="apt:gsynaptics" target="_top">gsynaptics</a>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p><span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Touchpad</span>.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Her finder du et par forskellige faneblade med flere valg til justering af pegeplade.</p>
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
                            <p>Læs <a class="ulink" href="https://help.ubuntu.com/community/SynapticsTouchpad" target="_top">fællesskabets supportsider</a> for mere information om museplader.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Find testrapporter for bærbare computere">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="laptops-testing-reports"></a>Find testrapporter for bærbare computere</h3>
                        </div>
                      </div>
                    </div>
                    <p>Mange bærbare computere bliver regelmæssigt testet af Ubuntu-fællesskabet for at sikre, at forskellige funktioner virker korrekt. Resultaterne af disse tests er tilgængelige, så du kan læse dem, og de kan give indsigt i ethvert problem, du kan opleve med din bærbare computer.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Se <a class="ulink" href="https://wiki.ubuntu.com/LaptopTestingTeam" target="_top">fællesskabets supportsider</a> for en komplet liste over tests af bærbare computere.</p>
                        </li>
                      </ul>
                    </div>
                    <p>Du kan selv deltage i testarbejdet ved at kontakte <a class="ulink" href="https://wiki.ubuntu.com/LaptopTestingTeam" target="_top">holdet til test af bærbare computere</a>.</p>
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
