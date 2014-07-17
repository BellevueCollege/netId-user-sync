<?php
require_once("netid-user-sync-config.php");
function writeLogs($message)
{
     if(netidUserSyncConfig::$logs)
        error_log($message);
}
?>
