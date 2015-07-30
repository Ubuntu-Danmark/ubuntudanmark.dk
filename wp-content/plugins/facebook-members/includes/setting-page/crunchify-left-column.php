<?php
/**
 * @author Crunchify.com
 * Plugin: Facebook Members
 */
?>

<div id="fbtabs">
    <ul>
        <li><a href="#fbtabs-1">Recommendation Bar Setting</a><?=$new_icon?></li>
        <li><a href="#fbtabs-3">Widget/Sidebar Likebox Options</a></li>
        <li><a href="#fbtabs-2">Page/Post Likebox Options</a></li>
    </ul>

    <div id="fbtabs-1">
        <?php
        require_once 'crunchify-left-panel1.php';
        ?>
    </div>

    <div id="fbtabs-2">
        <?php
        require_once 'crunchify-left-panel2.php';
        ?>
    </div>

    <div id="fbtabs-3">
        <?php
        require_once 'crunchify-left-panel3.php';
        ?>
    </div>
</div>
</div>