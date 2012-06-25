=== Stop Spammer Registrations Plugin ===
Tags: spam,registration,login,spammers,MU,StopForumSpam,Honeypot,BotScout,DNSBL,Spamhaus.org,Ubiquity Servers,HTTP_ACCEPT,disposable email
Donate link: http://www.blogseye.com/buy-the-book/
Requires at least: 2.8
Tested up to: 3.3
Contributors: Keith Graham
Stable tag: 3.2

The Stop Spammer Registrations Plugin checks against StopForumSpam.com to prevent spammers from registering or making comments.

== Description ==
Eliminates 99% of spam registrations and comments. Checks all attempts to leave spam against StopForumSpam.com, Project Honeypot, BotScout, DNSBL lists such as Spamhaus.org, known spammer hosts such as Ubiquity Servers, disposable email addresses, very long email address and names, and HTTP_ACCEPT header.
 

The Stop Spammer Registrations Plugin now checks for spammer IPs much earlier in the comment and registration process. When a spammer IP is detected, the plugin stops wordpress from completing any further operations and an access denied message is presented to the spammer. The text of the message can be edited.

How the plugin works: 

This plugin checks against StopForumSpam.com, Project Honeypot and BotScout to to prevent spammers from registering or making comments. The Stop Spammer Registrations plugin works by checking the IP address, email and user id of anyone who tries to register, login, or leave a comment. This effectively blocks spammers who try to register on blogs or leave spam. It checks a users credentials against up to three databases: Stop Forum Spam, Project Honeypot, and BotScout. Optionally checks against Akismet for Logins and Registrations.

Optionally the plugin will also check for disposable email addresses, check for the lack of a HTTP_ACCEPT header, and check against several DNSBL lists such as Spamhaus.org. It also checks against known spam hosts such as Ubiquity Servers IP ranges, which is a major source of Spam Comments. When the plugin receives data that should be coming from a valid comment form it checks the HTTP_REFERER value and it it does not exist it causes the request to fail. 

Limitations: 

StopForumSpam.com limits checks to 10,000 per day for each IP so the plugin may stop validating on very busy sites. I have not seen this happen, yet. The plugin will not stop spam that has not been reported to the various databases. You will always get some comments from spammers who are not yet reported. You can help others and yourself by reporting spam. If you do not report spam, the spammer will keep hitting you. This plugin works best with Akismet. Akismet works well, but clutters the database with spam comments that need to be deleted regularly, and Akismet does not work with spammer registrations. Since Akismet does not check registrations and logins, the plugin will use the Akismet database to check these events, too. 

API Keys: 

API Keys are NOT required for the plugin to work. Stop Forum Spam does not require a key so this plugin will work immediately without a key. The API key for Stop Forum Spam is only used for reporting spam. In order to use the Project HoneyPot or BotScout spam databases you will need to register at those sites and get a free API key. 

History: 

The Stop Spammer Registrations plugin keeps a count of the spammers that it has blocked and displays this on the WordPress dashboard. It also displays the last hits on email or IP and it also shows a history of the times it has made a check, showing rejections, passing emails and errors. When there is data to display there will also be a button to clear out the data. You can control the size of the list and clear the history.
If a user tries to log in and passes all checks for spammers an icon appears next to the IP address. Only users you know should be allowed to login, so by clicking the icon, you can add the IP to your black list. 

Cache: 

The Stop Spammer Registrations plugin keeps track of a number of spammer emails and IP addresses in a cache to avoid pinging databases more often than necessary. The results are saved and displayed. You can control the length of the cache list and clear it at any time. The plugin caches ip addresses that do not fail, assuming that they may be valid users. In order to prevent re-checking these IP addresses, the plugin stores the last two IP addresses that passed all tests.

Reporting Spam: 

On the comments moderation page, the plugin adds extra options to check comments against the various databases and to report to the Stop Forum Spam database. You will need a Stop Forum Spam API key in order to report spam/ 

Network MU Installation Option: 

If you are running a networked WPMU system of blogs, you can optionally control this plugin from the control panel of the main blog. By checking the "Networked ON" radio button, the individual blogs will not see the options page. The API keyes will only have to entered in one place and the history will only appear in one place, making the plugin easier to use for administrating many blogs. The comments, however, still must be maintained from each blog. The Network buttons only appear if you have a Networked installation.

Requirements: 

The plugin uses the WP_Http class to query the spam databases. Normally, if WordPress is working, then this class can access the databases. If, however, the system administrator has turned off the ability to open a url, then the plugin will not work. Sometimes placing a php.ini file in the blog’s root directory with the line "allow_url_fopen=On" will solve this. 
There is a button that allows you check access to the StopForumSpam database from the plugin Options page. This will tell you if the host allows opening of remote URL addresses.


 
== Installation ==
1. Download the plugin.
2. Upload the plugin to your wp-content/plugins directory.
3. Activate the plugin.
4. Under the settings, add the appropriate API keys (optional). Update the white list. Set any of the optional items and limits.

== Changelog ==

= 1.0 =
* initial release 

= 1.2 =
 * renumber releases due to typo
 
= 1.3 =
 * Check the ip address whenever email is checked.
 
= 1.4 =
 * Checks the user name. Cache failed attempts with option to clear cache. Cleans up after itself when uninstalled. 

= 1.5 =
* fixed a bug where the the admin user was cached in error.

= 1.6 =
* Improved caching to help stop false rejections.
 
= 1.7 =
* Included signup form, that I forgot to add before. Cached data is automatically expired after 24 hours.
 
= 1.8 =
* fixed the cache cleanup (again). Changed the name in the titles and menus of the plugin to reflect that it does more than stop registrations.

= 1.9 =
* Added link to report spam to StopForumSpam.com database.

= 1.10 =
* Improved the access to StopForumSpam.com database. Fixed white space at end of plugin.
 
= 1.11 =
* Stored the StopForumSpam API Key. Fixed a possible security hole on the settings page.
 
= 1.12 =
* Fixed typo error.
 
= 1.13 =
* Changed Evidence field to spam url or content

= 1.14 =
* Changes suggested by Paul at StopForumSpam. Fix bug in zero history data. There has been much interest in the plugin so there has been lots of feedback. I am sorry for all the updates, but they are all good stuff.

= 1.15 =
* Options added. 1) Reject if Accept header not found. Spammers use some kind of lazy approach that does not send the HTTP_ACCEPT header. All real browsers have this header. 2) Check on BL Blacklist. If for some reason the ip and email pass on the StopForumSpam db you can have a second check on Project Honeypot. 3) Added a white list in case there are IPs or emails that have problems. 4) Stopped checking for Usernames because of too many false positives. 4) Made checking for emails optional. Most spammers use bogus or random emails anyway. 5) Ability to recheck comments against the HoneyPot db from the comments admin form.

= 1.16 =
* Added RoboScout.com spam check to ip address. Added limits to checking to allow know spammers who are not recent spammers or do not have many spam reported. Added a complete list of passed and rejected login attempts. Fixed a bug introduced in 1.15. Fixed check on accept headers that prevented it from working.

= 1.17 =
* Fixed another bad bug. Added a warning if the host does not allow url fopens. Reduced memory requirements. Cache less information.
This has some functions partially complete, but I had to release as is to fix the bugs that appear on new install. It's my own fault, because last time I did not test from a clean WP install.

= 2.0 =
* Made the plugin WPMU aware. Streamlined some of the code. Limited the cached spam sizes to reduce memory overhead. Changed the way that the plugin decides when to check an ip and email. This will help it when working with other plugins. It also checks in multiple places in case the is_email() function is not called. It allows admins to change the minimum requirements for spam, forgiving spammers who have few incidents or have not spammed for a period of time.

= 2.10 =
* Fixed the way the cache is sorted. Added DNSBL support for spamhaus, dsbl, sorbs, spamcop, ordb, and njabl. These are email spam databases and they get only a small portion of the comment spam, but some is better than none. Added a list of common disposable email sites so that users who use disposable sites can be blocked. The list is only popular sites and is not exhaustive. Real commentators probably won't use the disposable sites, but some bloggers may be nervous about blocking them, so it is optional. Divided the options into a stats and a parameters wp_option array. Something in spam, probably a foreign language character, has been breaking the options causing the blog to "forget" when the stored array is broken. Now, when the stats array breaks, the configuration items will still be available. Rewrote the MU options, although it is not tested on subdomain installations.

= 2.20 =
* Fixed several networked blog issues. Added a dummy email address so that pingbacks can be reported. Added Multisite Maintenance. Fixed a few minor bugs. Testing use of X-Forwarded-For HTTP ip address when the blog is behind a proxy. I cannot test this because I don't have access to a site behind a proxy. Please report if the X-forwarded-for header handling is broken.

= 3.0 =
* Restructured the Plugin completely, changing many of the ways it works. Changed the points and places where spam is checked. Spam is now being checked for much earlier. Added an Access denied screen. Optionally block Ubiquity Servers. Use AJAX to report Spam so that there is no need to open a new window.

= 3.1 =
* Changed access to SFS db to stop false positives

= 3.2 =
* Added automatic addition of admins to IP white list. Added ability to specify where plugin actions work. Added WP API key update for those who don't use Akismet. Added checks for long names and emails. Added HTTP_REFERER checks. Added a check so users can see if they have access to the StopForumSpam database. Added a long list of known Spam Hosting company IP addresses.   

== Support ==
This plugin is free and I expect nothing in return. Please rate the plugin at: http://wordpress.org/extend/plugins/stop-spammer-registrations-plugin/
If you wisht to support my programming, buy my book: 
<a href="http://www.blogseye.com/buy-the-book/">Error Message Eyes: A Programmer's Guide to the Digital Soul</a>
Other plugins:
<a href="http://wordpress.org/extend/plugins/permalink-finder/">Permalink Finder Plugin</a>
<a href="http://wordpress.org/extend/plugins/open-in-new-window-plugin/">Open in New Window Plugin</a>
<a href="http://wordpress.org/extend/plugins/kindle-this/">Kindle This - publish blog to user's Kindle</a>
<a href="http://wordpress.org/extend/plugins/stop-spammer-registrations-plugin/">Stop Spammer Registrations Plugin</a>
<a href="http://wordpress.org/extend/plugins/no-right-click-images-plugin/">No Right Click Images Plugin</a>
<a href="http://wordpress.org/extend/plugins/collapse-page-and-category-plugin/">Collapse Page and Category Plugin</a>
<a href="http://wordpress.org/extend/plugins/custom-post-type-list-widget/">Custom Post Type List Widget</a>


