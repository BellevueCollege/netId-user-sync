<?php
/*
 * Copy/Rename the file as netid-user-sync-config.php/
 *
 */
/*
const MAIN = "main";
const COMMONS = "commons";
const EVENTS = "events";
const STUDENTWEB = "studentweb";
const DEFAULT_EMAIL_DOMAIN = "@bellevuecollege.edu";


class netidUserSyncConfig
{

    public static $dsn = ''; // DevMSSQL2008 is configured in /etc/freetds/freetds.conf file
// Database credentials
    public static $netIdDatabaseLogin = "";
    public static $netIdDatabasePassword = '';


    public static $sqlColumnEntryID = "EntryID";
    public static $sqlColumnUserSID = "UserSID";
    public static $sqlColumnOriginalUsername = "OriginalUsername";
    public static $sqlColumnNewUsername = "NewUsername";
    public static $sqlColumnWPCommonsComplete = "WPCommonsComplete";
    public static $sqlColumnWPWWWComplete = "WPWWWComplete";
    public static $sqlColumnWPEventsComplete = "WPEventsComplete";
    public static $sqlColumnWPStudentWebComplete = "WPStudentWebComplete";

    //query to get update www complete flag in netid database.
    public static $netIDWWWFlagUpdateQuery = <<<EOS
UPDATE statement
EOS;

//query to get update commons complete flag in netid database.
    public static $netIDCommonsFlagUpdateQuery = <<<EOS
        UPDATE statement
EOS;
//query to get update events complete flag in netid database.
    public static $netIDEventsFlagUpdateQuery = <<<EOS
        UPDATE statement
EOS;

//query to get update student web complete flag in netid database.
    public static $netIDStudentWebFlagUpdateQuery = <<<EOS
        UPDATE statement
EOS;

//query to get usernames for main site or www complete flag is set to 0 in netid database.

    public static $getUsernamesForMain= <<<EOS
       SELECT statement
EOS;
    //query to get usernames for commons complete flag is set to 0 in netid database.
    public static $getUsernamesForCommons= <<<EOS
       SELECT statement
EOS;
//query to get usernames for Events complete flag is set to 0 in netid database.
    public static $getUsernamesForEvents= <<<EOS
       SELECT statement
EOS;
//query to get usernames for student web complete flag is set to 0 in netid database.
    public static $getUsernamesForStudentWeb= <<<EOS
       SELECT statement
EOS;


    public static $application_name = "";// Application the plugin is running on. Options available - main, commons, events, studentweb

    public static $logs = false;
    public static $cronInterval = 60 ; //time in seconds;

}

*/
?>