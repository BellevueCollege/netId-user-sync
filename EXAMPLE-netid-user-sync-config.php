<?php
/*
 * Copy/Rename the file as netid-user-sync-config.php
 */

const MAIN = 'main';
const COMMONS = 'commons';
const EVENTS = 'events';
const STUDENTWEB = 'studentweb';
const DEFAULT_EMAIL_DOMAIN = '@bellevuecollege.edu';

class netidUserSyncConfig
{
    /**
     * DSN to use for connecting to the NetID database
     *
     * Example String: dblib:host=dbserver.example.com:1144\MyInstance;dbname=SomeDatabase
     * More information: http://php.net/manual/en/ref.pdo-dblib.connection.php
     * @static
     */
    public static $dsn = '';

    /**
     * Database server username
     * @static
     */
    public static $netIdDatabaseLogin = '';

    /**
     * Database server password
     * @static
     */
    public static $netIdDatabasePassword = '';

    /**
     * FreeTDS version to use when connecting to database
     *
     * If using the FreeTDS library to make database connections use this
     * version of the TDS protoco to make that connection.
     * @static
     */
    public static $netIdDatabaseTDSVer = '8.0';

    public static $sqlColumnEntryID = 'EntryID';
    public static $sqlColumnUserSID = 'UserSID';
    public static $sqlColumnOriginalUsername = 'OriginalUsername';
    public static $sqlColumnNewUsername = 'NewUsername';
    public static $sqlColumnWPCommonsComplete = 'WPCommonsComplete';
    public static $sqlColumnWPWWWComplete = 'WPWWWComplete';
    public static $sqlColumnWPEventsComplete = 'WPEventsComplete';
    public static $sqlColumnWPStudentWebComplete = 'WPStudentWebComplete';

    /**
     * Query to get update www complete flag in netid database.
     * @static
     */
    public static $netIDWWWFlagUpdateQuery = <<<EOS
UPDATE statement
EOS;

    /**
     * Query to get update commons complete flag in netid database.
     * @static
     */
    public static $netIDCommonsFlagUpdateQuery = <<<EOS
        UPDATE statement
EOS;

    /**
     * Query to get update events complete flag in netid database.
     * @static
     */
    public static $netIDEventsFlagUpdateQuery = <<<EOS
        UPDATE statement
EOS;

    /**
     * Query to get update student web complete flag in netid database.
     * @static
     */
    public static $netIDStudentWebFlagUpdateQuery = <<<EOS
        UPDATE statement
EOS;

    /**
     * Query to get usernames for main site or www complete flag is set to 0 in netid database.
     * @static
     */
    public static $getUsernamesForMain= <<<EOS
       SELECT statement
EOS;

    /**
     * Query to get usernames for commons complete flag is set to 0 in netid database.
     * @static
     */
    public static $getUsernamesForCommons= <<<EOS
       SELECT statement
EOS;

    /**
     * Query to get usernames for Events complete flag is set to 0 in netid database.
     * @static
     */
    public static $getUsernamesForEvents= <<<EOS
       SELECT statement
EOS;

    /**
     * Query to get usernames for student web complete flag is set to 0 in netid database.
     * @static
     */
    public static $getUsernamesForStudentWeb= <<<EOS
       SELECT statement
EOS;

    /**
     * Application the plugin is running on
     *
     * Options available - main, commons, events, studentweb
     * @static
     */
    public static $application_name = '';

    public static $logs = false;
    public static $cronInterval = 60; //time in seconds;
}
