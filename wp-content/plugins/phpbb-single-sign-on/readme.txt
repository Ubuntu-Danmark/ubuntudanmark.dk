=== PHPBB Single Sign On ===
Contributors: onigoetz
Tags: phpbb, authentication, password, login, single sign on, wrapper, connector
Requires at least: 2.8.0
Tested up to: 3.4.0

Authenticate in Wordpress and phpBB at the same time

== Description ==

This plugin allows to use the password from a working phpBB installation to log into a Wordpress blog. or on the other side to log into phpBB with the Wordpress user.

The user needs to exists in at least one of the two instllations. if the user doesn't exist in one installation, it will create the user.

With WP2BB, you can now define that your posts are published in a forum, so that your community can add comments directly on them

The username for the administration must be the same on the two installations.
Otherwise you will end having admins that have no privileges on the other part.

This version tries to get the application working with multiple databases.
Please give me feedbacks.

P.S. : WP2BB was created by Alfredo de Hoces (http://www.alfredodehoces.com/)

== Changelog ==

= Roadmap =
* Make it work on multiple db's
* Uninstaller

= 0.8.7 = 
* added wpbb_get_user_id_from_string() to replace get_user_id_from_string() as it doesn't exist in non mulitsite installations

= 0.8.6 =
* Fixed a bug where we could login to the ACP with a wrong password
* Managed to make the "remember me" work on both parts
* Fixed the duplicate username creation
* Fixed some calls to "username" -> "username_clean"

= 0.8.5 =
* Now includes WP2BB !!!
* Fixed some little bugs
* Added a way to disable the ACP Reauth

= 0.8 =
* Cleaner admin Area
* Added a way to patch files for the "validate_username" bug
* Rewrote some parts involved in login the user in the two codes are now separated

= 0.7.1 =
* Corrected a bug on new installation with the paths
* Works with Wordpress 3

= 0.7 =
* Ability to put wordpress in a child folder of phpbb or at the same level
* Bugfix : Enabled capital letters logins on both sides.
* Bugfix : "Parameter 1 to wpbb_login() expected to be a reference, value given..." should be corrected.

= 0.6.3 =
* Bugfix : Changed common.orig.php to common-orig.php to solve some problems
* Change : Changed the match from username_clean to username, should solve some problems with the double usernames

= 0.6.2 =
* Bugfix : Removed the backslash before the comments. was because of a security feature of wordpress that caused every entry to be backslashed. Phpbb manages it differently, and that caused a double check that added these backslashes.

= 0.6.1 =
* Bugfix : annoying bug in the admin area, now it is possible to change db to wpdb

= 0.6 =
* Preliminary version for the multiple databases
* Bugfix : Captcha problem if the user makes 3 errors in his password in phpbb (reported by Ramon Fincken http://www.ramonfincken.com/ )
* Bugfix : op_userexists function doesn't exist (patch proposed by Brian Pan)
* Bugfix : Blank user creation when logging in the first time from phpbb (Brian Pan tracked down the bug and I made the little fix)
* Added options to the control Panel
* Better install instructions.
* Removed complicated installations steps.
* Now Compatible with Onepress, totally new function names.

= 0.5 =
* Enabled synchronisation

= 0.4.6 =
* Bugfix : Blank page on admin area fix

= 0.4.4 =
* Bugfix : Created a duplicata of wordpress user on every login
* Bugfix : Cannot automatically create users

= 0.4.2 =
* Bugfix : Url in options panel

= 0.4.1 =
* Bugfix : Url to options panel

= 0.4 =
* The login works now if the user exists in the two databases with the same password
* New installation script
* New Presentation of the options page

= 0.3 =
* Bugfix : Corrected a bug wich accepted all passwords

= 0.2 =
* Login working from wordpress
* Options page finished

= 0.1 =
* New options page
* Fork of the onepress framework. dropping all framework dependencies



== Installation ==

1. Extract the archive
1. upload the phpbb-sso directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the path to PHPBB in the options
1. When the path is right some fields related to phpbb will appear, fill them and save.
1. Click on "install files" to install files.
1. If all tests are OK you cant logout and login to test.

How to configure ?

there are three ways to configure it.

In the example, the root of the website is "/www/"

= Example 1 =
Blog  : /www/
Forum : /www/forum/

Path to configure:
To PHPBB from Wordpress : forum/
To Wordpress from PHPBB : ../

= Example 2 =
Blog  : /www/blog/
Forum : /www/

Path to configure:
To PHPBB from Wordpress : ../
To Wordpress from PHPBB : blog/

= Example 3 =
Blog  : /www/blog/
Forum : /www/forum/

Path to configure:
To PHPBB from Wordpress : ../forum/
To Wordpress from PHPBB : ../blog/


= Troubleshooting =

If for any reason you removed the "common-orig.php" file and can't get your forum to work again, simply go to phpbb.com and download the complete package corresponding to your version.

in that package get the file named "common.php" and upload it to your server named "common-orig.php"

== Uninstall ==

To uninstall, you have a few steps to make

Go the the Plugin options, revert the "auth mode" to "DB" and not "wpbb"
If it doesn't work go to the ACP in General -> Client communication -> Authentication

Then go to the wordpress control panel and disable the plugin.

The last step is then to go with FTP in the PHPBB folder and rename the file "common.php" to "common.wp.php" and the file "common-orig.php" to "common.php".

Your configurations should be separated again



