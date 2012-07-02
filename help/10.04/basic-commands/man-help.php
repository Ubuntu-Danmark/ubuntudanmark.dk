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
    <title xmlns="">"Man" og at finde hjælp</title>
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
              <h1 class="entry-title">"Man" og at finde hjælp</h1>
              <div class="entry-content">
                <div class="sect1" title="&quot;Man&quot; og at finde hjælp">
                  <p><span class="strong"><strong><span class="emphasis"><em>kommando</em></span> --help</strong></span> og <span class="strong"><strong>man <span class="emphasis"><em> kommando</em></span></strong></span> er de to vigtigste værktøjer i arbejdet med kommandolinjen.</p>
                  <p>Stort set alle kommandoer forstår tilvalget <span class="strong"><strong>-h</strong></span> (eller <span class="strong"><strong>--help</strong></span>), hvilket frembringer en kort beskrivelse af, hvordan man bruger kommandoen og dens tilvalg, og derefter vender tilbage til kommandoprompten. Skriv </p>
                  <code class="screen">man -h</code>
                  <p> eller </p>
                  <code class="screen">man --help</code>
                  <p> for at se hvordan dette fungerer i praksis.</p>
                  <p>Hver eneste kommando og næsten alle programmer i Linux har en man (manual)-fil, og det er enkelt at finde den. Du skal blot skrive <span class="command"><strong>man kommando</strong></span>, hvilket vil fremvise et længere manualopslag for den angivne kommando. For eksempel vil </p>
                  <code class="screen">man mv</code>
                  <p> vise manualen til kommandoen <span class="command"><strong>mv</strong></span> (move).</p>
                  <p>Flyt op og ned i man-filen med piletasterne. Luk den og vend tilbage til kommandoprompten med <span class="keycap"><strong>q</strong></span>.</p>
                  <code class="screen">man man</code>
                  <p> vil vise manualopslaget for kommandoen <span class="command"><strong>man</strong></span>, som er et godt sted at starte.</p>
                  <code class="screen">man intro</code>
                  <p> er meget nyttig - den viser "Introduktion til brugerkommandoer" som er en velskrevet, rimelig kort introduktion til Linux-kommandolinjen.</p>
                  <p>Der er også <span class="command"><strong>info</strong></span>-sider, som generelt går mere i dybden end <span class="command"><strong>man</strong></span>-siderne. Prøv </p>
                  <code class="screen">info info</code>
                  <p> for introduktionen til info-siderne.</p>
                  <div class="sect2" title="Søg efter man-filer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="searching-ma"></a>Søg efter man-filer</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du ikke er sikker på, hvilken kommando eller hvilket program du skal bruge, kan du prøve at søge i man-filerne.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="command"><strong>man -k foo</strong></span>, vil søge i man-filerne efter <span class="emphasis"><em>foo</em></span>. Prøv </p>
                          <code class="screen">man -k nautilus</code>
                          <p> for at se hvordan dette fungerer i praksis. </p>
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
                                  <p>Dette er det samme som kommandoen <span class="command"><strong>apropos</strong></span>.</p>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </li>
                        <li class="listitem">
                          <p><span class="command"><strong>man -f foo</strong></span>, søger kun i titlerne i dit systems man-filer. Prøv for eksempel </p>
                          <code class="screen">man -f gnome</code>
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
                                  <p>Dette er det samme som kommandoen <span class="command"><strong>whatis</strong></span>.</p>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </li>
                      </ul>
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
              <h3 class="widgettitle">Brug af kommandolinjen</h3>
              <ul>
                <li><a href="using-this-guide.php">Brug af denne vejledning</a></li>
                <li><a href="starting-terminal.php">Start en terminal</a></li>
                <li><a href="files-directories-commands.php">Fil- og katalogkommandoer</a><ul>
                  <li><a href="files-directories-commands.php#cd">cd</a></li>
                  <li><a href="files-directories-commands.php#pwd">pwd</a></li>
                  <li><a href="files-directories-commands.php#ls">ls</a></li>
                  <li><a href="files-directories-commands.php#cp">cp</a></li>
                  <li><a href="files-directories-commands.php#mv">mv</a></li>
                  <li><a href="files-directories-commands.php#rm">rm</a></li>
                  <li><a href="files-directories-commands.php#mkdir">mkdir</a></li></ul></li>
                <li><a href="sys-info-commands.php">Kommandoer vedr. systeminformation</a><ul>
                  <li><a href="sys-info-commands.php#df">df</a></li>
                  <li><a href="sys-info-commands.php#free">free</a></li>
                  <li><a href="sys-info-commands.php#top">top</a></li>
                  <li><a href="sys-info-commands.php#uname">uname</a></li>
                  <li><a href="sys-info-commands.php#lsb_release">lsb_release</a></li></ul></li>
                <li><a href="elevated-privileges.php">Udfør kommandoer med særlige rettigheder</a><ul>
                  <li><a href="elevated-privileges.php#add-group">Tilføj en ny gruppe</a></li>
                  <li><a href="elevated-privileges.php#add-user">Tilføj en ny bruger</a></li></ul></li>
                <li><a href="options.php">Tilvalg</a></li>
                <li><a href="man-help.php">"Man" og at finde hjælp</a><ul>
                  <li><a href="man-help.php#searching-ma">Søg efter man-filer</a></li></ul></li>
                <li><a href="cut-paste.php">Klip og indsæt</a></li>
                <li><a href="other-things.php">Andre nyttige ting</a><ul>
                  <li><a href="other-things.php#save-typing">Gem ved skrivning</a></li>
                  <li><a href="other-things.php#change-text">Ændr teksten</a></li></ul></li>
                <li><a href="more-info.php">Mere information</a></li>
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
