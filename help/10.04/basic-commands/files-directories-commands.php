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
    <title xmlns="">Fil- og katalogkommandoer</title>
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
              <h1 class="entry-title">Fil- og katalogkommandoer</h1>
              <div class="entry-content">
                <div class="sect1" title="Fil- og katalogkommandoer">
                  <div class="sect2" title="cd">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="cd"></a>cd</h3>
                        </div>
                      </div>
                    </div>
                    <p>Kommandoen <span class="command"><strong>cd</strong></span> skifter mellem kataloger (ofte kaldet mapper). Når du åbner en terminal, vil du være i dit hjemmekatalog. For at bevæge dig rundt i filsystemet skal du bruge <span class="command"><strong>cd</strong></span>.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>For at navigere til rodkataloget skal du skrive: </p>
                          <code class="screen">cd /</code>
                        </li>
                        <li class="listitem">
                          <p>For at navigere til dit hjemmekatalog (hjemmemappen) skal du skrive: </p>
                          <code class="screen">cd</code>
                          <p> eller </p>
                          <code class="screen">cd ~</code>
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
                                  <p>Tegnet <span class="command"><strong>~</strong></span> repræsenterer den aktuelle brugers hjemmekatalog. Som set ovenfor svarer <span class="command"><strong>cd ~</strong></span> til <span class="command"><strong>cd /home/brugernavn/</strong></span>. Når man kører en kommando som root (ved at bruge <span class="command"><strong>sudo</strong></span>, for eksempel), vil <span class="command"><strong>~</strong></span> i stedet pege på <em class="filename">/root</em>. Når du kører en kommando med <span class="command"><strong>sudo</strong></span>, skal den fulde sti til dit hjemmekatalog angives.</p>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </li>
                        <li class="listitem">
                          <p>For at navigere et katalog op i systemhierarkiet skal du skrive </p>
                          <code class="screen">cd ..</code>
                        </li>
                        <li class="listitem">
                          <p>For at navigere til det foregående katalog (eller tilbage) skal du skrive </p>
                          <code class="screen">cd -</code>
                        </li>
                        <li class="listitem">
                          <p>For at navigere gennem flere katalogniveauer på én gang, skal du angive den fulde katalogsti, som du ønsker at gå til. For eksempel, skriv: </p>
                          <code class="screen">cd /var/www</code>
                          <p> for at gå direkte til underkataloget <em class="filename">/www</em> i <em class="filename">/var/</em>. Som et andet eksempel, skriv: </p>
                          <code class="screen">cd ~/Skrivebord</code>
                          <p> for at gå til underkataloget <em class="filename">Skrivebord</em> i dit hjemmekatalog.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="pwd">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="pwd"></a>pwd</h3>
                        </div>
                      </div>
                    </div>
                    <p>Kommandoen <span class="command"><strong>pwd</strong></span> udskriver hvilket katalog, du i øjeblikket befinder dig i (<acronym class="acronym">pwd</acronym> står for <span class="quote">“<span class="quote">print working directory</span>”</span>). Hvis du for eksempel skriver </p>
                    <code class="screen">pwd</code>
                    <p> i <em class="filename">Skrivebord</em>-kataloget, vil den vise <em class="computeroutput">/home/brugernavn/Skrivebord</em>. </p>
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
                            <p><span class="application"><strong>GNOME-terminalen</strong></span> viser også denne information i sit vindues titelbjælke.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="ls">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ls"></a>ls</h3>
                        </div>
                      </div>
                    </div>
                    <p>Kommandoen <span class="command"><strong>ls</strong></span> udskriver en liste over filerne i det aktuelle katalog. At skrive </p>
                    <code class="screen">ls ~</code>
                    <p> vil for eksempel vise dig filerne, der er i dit hjemmekatalog.</p>
                    <p>Hvis du tilføjer tilvalget <span class="command"><strong>-l</strong></span> vil <span class="command"><strong>ls</strong></span> udskrive diverse anden information sammen med filnavnene, såsom nuværende tilladelser for filen og filens ejer.</p>
                  </div>
                  <div class="sect2" title="cp">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="cp"></a>cp</h3>
                        </div>
                      </div>
                    </div>
                    <p>Kommandoen <span class="command"><strong>cp</strong></span> laver en kopi af en fil. Skriv for eksempel: </p>
                    <code class="screen">cp foo bar</code>
                    <p> for at lave en nøjagtig kopi af filen <em class="filename">foo</em> og navngive den <em class="filename">bar</em>. <em class="filename">foo</em> vil forblive uændret.</p>
                  </div>
                  <div class="sect2" title="mv">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="mv"></a>mv</h3>
                        </div>
                      </div>
                    </div>
                    <p>Kommandoen <span class="command"><strong>mv</strong></span> flytter en fil til en anden placering eller omdøber en fil. Eksempler er som følgende: </p>
                    <code class="screen">mv foo bar</code>
                    <p> vil omdøbe filen <em class="filename">foo</em> til <em class="filename">bar</em>. </p>
                    <code class="screen">mv foo ~/Skrivebord</code>
                    <p> vil flytte filen <em class="filename">foo</em> til dit <em class="filename">Skrivebord</em>-katalog, men vil ikke omdøbe den.</p>
                  </div>
                  <div class="sect2" title="rm">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="rm"></a>rm</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="command"><strong>rm</strong></span> bruges til at slette filer. </p>
                    <code class="screen">rm foo</code>
                    <p> sletter filen <em class="filename">foo</em> fra det aktuelle katalog.</p>
                    <p>Som standard vil <span class="command"><strong>rm</strong></span> ikke fjerne kataloger. For at fjerne et katalog, skal du bruge tilvalget <span class="command"><strong>-R</strong></span>. For eksempel vil </p>
                    <code class="screen">rm -R foobar</code>
                    <p> fjerne kataloget foobar, <span class="strong"><strong>og alt dets indhold!</strong></span></p>
                  </div>
                  <div class="sect2" title="mkdir">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="mkdir"></a>mkdir</h3>
                        </div>
                      </div>
                    </div>
                    <p>Kommandoen <span class="command"><strong>mkdir</strong></span> lader dig oprette nye kataloger. Hvis du for eksempel skriver: </p>
                    <code class="screen">mkdir musik</code>
                    <p> opretter du et katalog kaldet <em class="filename">musik</em> i det aktuelle katalog.</p>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
