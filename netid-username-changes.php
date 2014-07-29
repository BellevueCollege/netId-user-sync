<?php
require_once("netid-user-sync-config.php");
require_once("write-logs.php");

class netidUsernameChanges
{
     protected  $dbh = "";

    public function __construct()
    {
        if (substr(netidUserSyncConfig::$netIdDatabaseDsn,0,5) === 'dblib')
        {
            putenv('TDSVER='.netidUserSyncConfig::$netIdDatabaseTdsVer);
        }
        try
        {
            $this->dbh = new PDO(netidUserSyncConfig::$netIdDatabaseDsn,netidUserSyncConfig::$netIdDatabaseLogin,netidUserSyncConfig::$netIdDatabasePassword);
        }
        catch(PDOException $ex)
        {
           writeLogs("An exception occurred while retrieving  data! See error log.".$ex);
           writeLogs("Connection: ". (($this->dbh != null) ? $this->dbh->errorInfo() : "null"));
        }
    }
    function getRecordsUsernameChanges()
    {
        try
        {
            $appName = netidUserSyncConfig::$application_name;
            $whichQuery = "";
            if(isset($appName))
            {
                switch($appName)
                {
                    case MAIN:
                        $whichQuery = netidUserSyncConfig::$getUsernamesForMain ;
                        break;

                    case COMMONS:
                        $whichQuery = netidUserSyncConfig::$getUsernamesForCommons;
                        break;

                    case EVENTS:
                        $whichQuery = netidUserSyncConfig::$getUsernamesForEvents;
                        break;

                    case STUDENTWEB:
                        $whichQuery = netidUserSyncConfig::$getUsernamesForStudentWeb;
                        break;
                }
                writeLogs("get which query ".$whichQuery);
                $query = $this->dbh->prepare($whichQuery);
                $query->execute();
                if($query)
                {
                    $rs = $query->fetchAll();
                    if($rs)
                    {
                        return $rs;
                    }
                }
            }
            return null;
        }
        catch( Exception $ex)
        {
           writeLogs("An exception occurred while retrieving  data! See error log.".$ex);
           writeLogs("Connection: ". (($this->dbh != null) ? $this->dbh->errorInfo() : "null"));
        }
    }


    function updateFlag($originalUsername)
    {
        $appName = netidUserSyncConfig::$application_name;
        $whichQuery = "";
        writeLogs("myappname :".$appName);
        if(isset($appName))
        {
             switch($appName)
             {
                 case MAIN:
                     $whichQuery = netidUserSyncConfig::$netIDWWWFlagUpdateQuery;
                     break;

                 case COMMONS:
                     $whichQuery = netidUserSyncConfig::$netIDCommonsFlagUpdateQuery;
                      break;

                 case EVENTS:
                     $whichQuery = netidUserSyncConfig::$netIDEventsFlagUpdateQuery;
                     break;

                 case STUDENTWEB:
                     $whichQuery = netidUserSyncConfig::$netIDStudentWebFlagUpdateQuery;
                     break;
             }
        }
        if(isset($whichQuery) && !empty($whichQuery))
        {
            try
            {

                $query = $this->dbh->prepare($whichQuery);
                $query->execute(array($originalUsername));
                if($query)
                {
                    $rowsAffected = $query->rowCount();
                    writeLogs("rows updated in $appName :".$rowsAffected);
                    if($rowsAffected > 0)
                        return true;
                }
            }
            catch(Exception $ex)
            {
                writeLogs("An exception occurred while retrieving  data! See error log.".$ex);
                writeLogs("Connection: ". (($this->dbh != null) ? $this->dbh->errorInfo() : "null"));
            }
        }
        return false;
    }

    function closeDbConnection()
    {
        // close database connection
        $this->dbh = null;
    }

}
