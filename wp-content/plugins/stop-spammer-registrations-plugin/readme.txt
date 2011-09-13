=== Stop Spammer Registrations Plugin ===
Tags: spam, registration, spammers, MU
Donate link: http://www.amazon.com/gp/product/1456336584?ie=UTF8&tag=thenewjt30page&linkCode=as2&camp=1789&creative=390957&creativeASIN=1456336584
Requires at least: 2.8
Tested up to: 3.1
Contributors: Keith Graham
Stable tag: 2.0

This plugin checks against StopForumSpam.com, Project Honeypot and BotScout to to prevent spammers from registering or making comments.

== Description ==
This plugin checks against StopForumSpam.com, Project Honeypot and BotScout to to prevent spammers from registering or making comments.

The Stop Spammer Registrations plugin works by checking the IP address, email and user id of anyone who tries to register, login, or leave a comment. This effectively blocks spammers who try to register on blogs or leave spam. It checks a users credentials against up to three databases: <a href="http://www.stopforumspam.com/">Stop Forum Spam</a>, <a href="http://www.projecthoneypot.org/">Project Honeypot</a>, and <a href="http://www.botscout.com/">BotScout</a>. In order to use the Project HoneyPot or BotScout spam databases you will need to register at those sites and get a free API key. Stop Forum Spam does not require a key so this plugin will work immediately without getting a key. The API key for Stop Forum Spam is only used for reporting spam.

This plugin keeps track of the last 25 spammer emails and IP addresses in a cache to avoid pinging databases more often than necessary. The results of the last 25 checks are saved and displayed.

In case a user results in a false positive on one of the spam databases there is a white list that can be entered of email address or IP addresses. This will allow such users to register, login and comment on the bog.

Requirements: The plugin uses the WP_Http class to query the spam databases. Normally, if WordPress is working, then this class can access the databases. If, however, the system administrator has turned off the ability to open a url, then the plugin will not work. Sometimes placing a php.ini file in the blog's root directory with the line "allow_url_fopen=On" will solve this.

The plugin is ON when it is installed and enabled. To turn it off just disable the plugin from the plugin menu..

The plugin keeps a count of the spammers that it has blocked and displays this on the WordPress dashboard. It also displays the last 25 hits on email or IP and it also shows a history of the last 25 times it has made a check, showing rejections, passing emails and errors. When there is data to display there will also be a button to clear out the data.

The plugin will also reject registrations, comments and pings where the HTTP_ACCEPT header is missing. This header is present in all browsers and its absence indicates that a program, not a human, is attempting to leave spam.

If you are running a networked WPMU system of blogs, you can optionally control this plugin from the control panel of the main blog. By checking the "Networked ON" radio button, the individual blogs will not see the options page. The API keyes will only have to entered in one place and the history will only appear in one place, making the plugin easier to use for administrating many blogs. The comments, however, still must be maintained from each blog. The Network buttons only appear if you have a Networked installation.

The plugin adds links to the Comment Moderation page to check a comment's credentials agains the spam databases. If you have entered the Stop Forum Spam API key you can also report the spammer to the SFS database. Please make sure that the comment is actually spam and not from some clueless commentor who likes to salt his comments with spammy links. (I find that comments that do not specifically reference the post are always spam. "Nice Blog" comments I tend to report immediately.)

Problems: In systems with constraints on memory and many other plugins, this plugin will sometimes fail trying to retrieve its options. This results in resetting the configuration. The plugin uses two or three thousand bytes to store the history, cache, and settings. This is not very much, but some plugins use much more memory, and they will cause this plugin to fail. The solution is to remove or disable some of the plugins that are hogging all the memory.

StopForumSpam.com limits checks to 10,000 per day for each IP so the plugin may stop validating on very busy sites. I have not seen this happen, yet. Results are cached in order to thwart repeated attempts.

You may see your own email in the cache as spammers try to use it to leave comments. You may have to white list your own email if that is the case, to keep the plugin from locking you out.

Watch the <a href="http://www.youtube.com/watch?v=EKrUX0hHAx8" target="_blank">youtube spam trap video!</a> The video shows one of my plugins that anti-spam cops use. They run honey pots or sites that do nothing but attract spammers. These sites report as many as 500 spammers per hour to the same database that this plugin checks. 
 
== Installation ==
1. Download the plugin.
2. Upload the plugin to your wp-content/plugins directory.
3. Activate the plugin.
4. Add the appropriate API keys (optional). Update the white list.

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
Options added. 1) Reject if Accept header not found. Spammers use some kind of lazy approach that does not send the HTTP_ACCEPT header. All real browsers have this header. 2) Check on BL Blacklist. If for some reason the ip and email pass on the StopForumSpam db you can have a second check on Project Honeypot. 3) Added a white list in case there are IPs or emails that have problems. 4) Stopped checking for Usernames because of too many false positives. 4) Made checking for emails optional. Most spammers use bogus or random emails anyway. 5) Ability to recheck comments against the HoneyPot db from the comments admin form.

= 1.16 =
Added RoboScout.com spam check to ip address. Added limits to checking to allow know spammers who are not recent spammers or do not have many spam reported. Added a complete list of passed and rejected login attempts. Fixed a bug introduced in 1.15. Fixed check on accept headers that prevented it from working.

= 1.17 =
Fixed another bad bug. Added a warning if the host does not allow url fopens. Reduced memory requirements. Cache less information.
This has some functions partially complete, but I had to release as is to fix the bugs that appear on new install. It's my own fault, because last time I did not test from a clean WP install.

= 2.0 =
Made the plugin WPMU aware. Streamlined some of the code. Limited the cached spam sizes to reduce memory overhead.
Changed the way that the plugin decides when to check an ip and email. This will help it when working with other plugins. It also checks in multiple places in case the is_email() function is not called. It allows admins to change the minimum requirements for spam, forgiving spammers who have few incidents or have not spammed for a period of time.


== Support ==
This plugin is free and I expect nothing in return. If you wish to support my programming, buy the book: 
<a href="http://www.amazon.com/gp/product/1456336584?ie=UTF8&tag=thenewjt30page&linkCode=as2&camp=1789&creative=390957&creativeASIN=1456336584">Error Message Eyes: A Programmer's Guide to the Digital Soul</a>

