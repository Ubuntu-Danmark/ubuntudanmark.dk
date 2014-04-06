<div class="wrap">
    <h2><?php _e('Wp2BB Plugin Options', 'wp2bb') ?></h2>

    <?php if (!defined('PHPBBPATH')): ?>
        <div class="error"><p><strong>PhpBB not found!</strong> Please set PhpBB local path before creating or updating posts</p></div>
    <?php endif; ?>

    <?php if (count($_POST)): ?>
        <div class="updated"><p><strong><?php _e('Options saved.', 'wp2bb'); ?></strong></p></div>
    <?php endif; ?>

    <?php
    include_once($phpbb_root_path . 'includes/functions_admin.php');

    $fields = array(
        'wp2bb_phpbbpath' => array(
            'title' => 'phpBB local path',
            'desc' => 'Managed by PHPBB Single Sign On',
            'type' => 'ignore',
        ),
        'wp2bb_phpbburl' => array(
            'title' => 'PhpBB forum URL',
            'desc' => 'Public URL of your forum<br/>(i.e. "http://www.mydomain.com/myforum")',
        ),
        'wp2bb_defforum' => array(
            'title' => 'Default forum for posts',
            'desc' => "Numeric ID of the phpBB forum where topics for new posts will be created (if none specified in the 'forum' custom field of the WP post). If blank, no topics will be created unless 'forum' custom field of the post is set"
        ),
        'wp2bb_defpforum' => array(
            'title' => 'Default forum for pages',
            'desc' => "Numeric ID of the phpBB forum where topics for new pages will be created (if none specified in the 'forum' custom field of the WP page). If blank, no topics will be created unless 'forum' custom field of the page is set"
        ),
        'wp2bb_excludecats' => array(
            'title' => 'Exclude categories',
            'desc' => "Comma separated list of Wordpress categories ID's to be excluded. Any post or page in this categories will not have correspondent messages in the forum"
        ),
        'wp2bb_username' => array(
            'title' => 'Forum user name',
            'desc' => "PhpBB existing user used for creating new topics (i.e. 'admin'). If left blank or user does not exist, 'guest' will be used"
        ),
        'wp2bb_usercolor' => array(
            'title' => 'Forum user color',
            'desc' => "Hex color in which user name will be displayed in the forum (i.e. 'AA0000'). Leave blank for default forum color"
        ),
        'wp2bb_msgtext' => array(
            'title' => 'Topic message text for posts',
            'desc' => 'Message text for the topics in the forum created for every new page in the blog (if none specified in the \'msg\' custom field of the WP page)<br/>
            Some text replacement keywords can be used:<br/>
            {$post} Wordpress post text (in HTML)<br/>
            {$title} Wordpress post title<br/>
            {$purl} Wordpress post Permalink',
            'type' => 'textarea'
        ),
        'wp2bb_msgtextpage' => array(
            'title' => 'Topic message text for pages',
            'desc' => 'Message text for the topic in the forum created for every new page in the blog (if none specified in the \'msg\' custom field of the WP page)<br/>
            Some text replacement keywords can be used:<br/>
            {$post} Wordpress post text (in HTML)<br/>
            {$title} Wordpress post title<br/>
            {$purl} Wordpress post Permalink',
            'type' => 'textarea'
        ),
        'wp2bb_comments0' => array(
            'title' => "'0 messages in the forum' text",
            'desc' => 'Text displayed when there are no comments in the forum for the post',
            'type' => 'textarea'
        ),
        'wp2bb_comments1' => array(
            'title' => "'1 message in the forum' text",
            'desc' => 'Text displayed when there is 1 comment in the forum for the post',
            'type' => 'textarea'
        ),
        'wp2bb_commentsx' => array(
            'title' => "'x messages in the forum' text",
            'desc' => 'Text displayed when there is more than 1 comments in the forum for the post<br/>
            Some text replacement keywords can be used:<br/>
            {$x} Actual number of messages in the forum',
            'type' => 'textarea'
        ),
        'wp2bb_reply' => array(
            'title' => "'Add a message in the forum' text",
            'desc' => "Text displayed in the 'add a reply in the forum' quick link",
            'type' => 'textarea'
        ),
        'wp2bb_onthefly' => array(
            'title' => "Add topics for old posts",
            'desc' => 'If enabled, topics in the forum will be created for old entries in your blog (entries written before wp2bb was installed). These topics will be created when the entries are browsed by your readers'
        )
    );

    foreach ($fields as $key => $data) {

        $data += array('type' => 'field');

        if (count($_POST) && array_key_exists($key, $_POST)) {

            switch ($data['type']) {
                case 'field':
                case 'textarea':
                    $val = $_POST[$key];

                    if ($data['type'] == 'textarea') {
                        $val = str_replace('\"', '"', $val);
                        $val = str_replace("\'", "'", $val);
                        $val = str_replace('\\\\', '\\', $val);
                    }

                    $fields[$key]['value'] = $val;
                    update_option($key, $val);
                    break;
            }
        } else {
            $fields[$key]['value'] = get_option($key);
        }

        switch ($data['type']) {
            case 'field':
                $fields[$key]['field'] = '<input type="text" name="' . $key . '" value="' . $fields[$key]['value'] . '" size="60" />';
                break;
            case 'textarea':
                $fields[$key]['field'] = '<textarea id="details" name="' . $key . '" rows="3" cols="53">' . $fields[$key]['value'] . '</textarea>';
        }
    }

    $fields['wp2bb_phpbbpath']['field'] = '<strong>'.ABSPATH . '/' . PHPBBPATH.'</strong>';
    $fields['wp2bb_onthefly']['field'] = '<select name="wp2bb_onthefly">
        <option value="">No</option>
        <option value="1" ' . (($opt_onthefly_val) ? ' selected="selected"' : '') . '>Yes</option>
    </select>';

    $fields['wp2bb_defforum']['field'] = '<select name="wp2bb_defforum"><option value="0">None</option>' . make_forum_select($fields['wp2bb_defforum']['value'], false, true, false, false) . '</select>';
    $fields['wp2bb_defpforum']['field'] = '<select name="wp2bb_defpforum"><option value="0">None</option>' . make_forum_select($fields['wp2bb_defpforum']['value'], false, true, false, false) . '</select>';
    ?>
    <form name="form1" method="post" id="configuration" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="stage" value="update" />
        <table class="form-table" title="PHPBB">
        <?php foreach ($fields as $key => $data) { ?>
            <tr valign="top">
                <th scope="row"><?php echo $data['title']; ?></th>
                <td>
                    <?php echo $data['field']; ?>
                    <p class=description><?php echo $data['desc']; ?></p>
                </td>
            </tr>
        <?php } ?>
        </table>
        <p class="submit">
            <input type="submit" class="button button-primary" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain'); ?>" />
        </p>

        <br />
        <small><a href="http://www.alfredodehoces.com/wp2bb">Wp2BB</a> by <a href="http://www.alfredodehoces.com">Alfredo de Hoces</a></small>
    </form>
</div>
