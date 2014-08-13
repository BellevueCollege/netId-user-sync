<?php
/*
Plugin Name: NetId User Sync
Plugin URI: https://github.com/BellevueCollege/netId-user-sync
Description: Synchronize username updates with Net ID application
Author: Bellevue College Technology Development and Communications
Version: 1.1.0.1
Author URI: http://www.bellevuecollege.edu
*/

    require_once("netid-username-changes.php");
    require_once("write-logs.php");

add_filter('cron_schedules', 'time_interval');

// add once 1 minute interval to wp schedules
function time_interval($interval) {
    $cron_interval = isset(netidUserSyncConfig::$cronInterval) ? netidUserSyncConfig::$cronInterval : 60 ; // default to 60 sec or 1 min
    $interval['defined_minutes'] = array('interval' => $cron_interval , 'display' => 'Once '.$cron_interval.' seconds');
    return $interval;
}
add_action( 'username_cron', 'user_sync' );

if ( ! wp_next_scheduled( 'username_cron' ) ) {
    wp_schedule_event( time(), 'defined_minutes', 'username_cron' );
}
else
{
    //error_log("my cron is already scheduled");
}
wp_cron();



function user_sync()
{
    writeLogs("Running ....");
    global $wpdb;
    $netidUserOb = new netidUsernameChanges();
    $resultSet = $netidUserOb->getRecordsUsernameChanges();
    //writeLogs("result set :".print_r($resultSet,true));
    if(isset($resultSet) && is_array($resultSet))
    {
        for($i=0;$i<count($resultSet);$i++)
        {
           if(isset($resultSet[$i]) && is_array($resultSet[$i]))
           {
               if(isset($resultSet[$i]['flag']) && $resultSet[$i]['flag'] != 1)
               {
                   if(isset(netidUserSyncConfig::$sqlColumnOriginalUsername) && isset(netidUserSyncConfig::$sqlColumnNewUsername))
                   {
                        $keyOUsername = netidUserSyncConfig::$sqlColumnOriginalUsername;
                        $keyNUsername = netidUserSyncConfig::$sqlColumnNewUsername;

                        if(isset($resultSet[$i][$keyOUsername]))
                        {
                            if(username_exists( $resultSet[$i][$keyOUsername] ) && isset($keyNUsername) && isset($resultSet[$i][$keyNUsername]) && !empty($resultSet[$i][$keyNUsername]))
                            {
                                writeLogs("original username :".$resultSet[$i][$keyOUsername]);
                                writeLogs("newusername :".$resultSet[$i][$keyNUsername]);
                                $newEmail = $resultSet[$i][$keyNUsername].DEFAULT_EMAIL_DOMAIN; //
                                if(isset(netidUserSyncConfig::$userTable) && !empty(netidUserSyncConfig::$userTable))
                                {
                                    $table_name = $wpdb->prefix . netidUserSyncConfig::$userTable;
                                    $returnval = $wpdb->update( $table_name, array('user_login' => $resultSet[$i][$keyNUsername], 'user_email' => $newEmail), array('user_login' => $resultSet[$i][$keyOUsername]));
                                    writeLogs("update in worpdress :".$returnval);
                                    if($returnval)
                                    {
                                        if($netidUserOb->updateFlag($resultSet[$i][$keyOUsername]))
                                            writeLogs("Flag updated to 1 for new username ".$resultSet[$i][$keyNUsername]);
                                    }
                                }
                                else
                                {
                                    writeLogs("User table name not set in the configuration");
                                }
                            }
                        }
                       else
                       {

                       }
                   }
               }

           }
        }
    }
    $netidUserOb->closeDbConnection();
}
