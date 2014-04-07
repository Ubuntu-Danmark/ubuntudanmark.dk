<?php
/**
 * @author Crunchify.com
 * Plugin: Facebook Members
 */
?>

    <div class="wrap">

        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
            <input type="hidden" name="info_update" id="info_update" value="true"/>

            <?php wp_nonce_field('fmz-update-setting','fmz-update-setting'); ?>

            <u><h2>Facebook Members Like Box Plugin by Crunchify.com</h2></u>

            <div align="left">
                <br>

                <a href="https://twitter.com/Crunchify" class="twitter-follow-button" data-show-count="false"
                   data-size="large">Follow @Crunchify</a>
                <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>

                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FCrunchify&amp;width=292&amp;height=62&amp;show_faces=false&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=false&amp;appId=519929141369894"
                        scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:62px;"
                        allowTransparency="true"></iframe>

            </div>
            <div id="poststuff" class="metabox-holder has-right-sidebar">


                <div style="float:left;width:70%;">

                    <br>

                    <?php
                    require_once 'setting-page/icrunch-left-column.php';
                    require_once 'setting-page/icrunch-right-column.php';
                    require_once 'setting-page/icrunch-footer.php';

                    ?>
