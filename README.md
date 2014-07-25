netId-user-sync
===============

Contributors: Bellevue College
Tags:
Tested for: 3.9.1
Stable tag: 1
License:
License URI:


== Description ==
This plugin synchronizes Netid username changes into wordpress applications. The plugin let the user set up a cron job that runs according to the configured interval and updates the usernames
in the wordpress database.




== Installation ==

1. Download plugin files from https://github.com/BellevueCollege/netId-user-sync.

2. Place the plugin folder in your `wp-content/plugins/` directory.

3. Configure freetds.conf file to access MSSQL server. Follow these instructions:

    1.Open file freetds.conf file .(Tts located in a path like this- /etc/freetds directory).
    Add the following lines to the end of the file:
    [DevMSSQL2008]
            host = SQL server
            instance = database instance
            port =  //ex.: 51651
            tds version = 8.0 or above

   Above is the information to connect to the MSSQL server database using freetds library.
   Make sure that the tds version is greater than 8.0
   You can call the settings group anything. In this case I called it as DevMSSQL2008. User will have to use this string as the value of the hostname in the $netIdDatabaseDsn variable in the config file.

4. BEFORE Activating the plugin, create config file and configure it.

5. Activate the plugin.



== Changelog ==
= v1 =
* Initial version
