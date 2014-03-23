<?php
/**
 * Rdy4Racing
 * @author Said
 */

require_once ('CustomConfiguration.php');



class MultiplayerConfiguration
{
    const RFACTOR_EXE_PATH = 'C:/Program Files (x86)/rFactor2/Core/';
    const RFACTOR_EXE = 'rFactor2 Dedicated2'; // must be a link
    const RFACTOR_MULTIPLAYER_FILE_PATH = 'C:\Users\Said\Documents\rFactor2\UserData\player\Multiplayer.ini';
    const RFACTOR_MULTIPLAYER_BACKUP_PATH = 'C:\Users\Said\Documents\rFactor2\UserData\player\backups';

    protected $multiplayerFile;

    function __construct(){
        $this->multiplayerFile = fopen(self::RFACTOR_MULTIPLAYER_FILE_PATH, "r+b");
    }


    public function instanceCreate(CustomConfiguration $configuration)
    {
        $this->applyConfiguration($configuration);
        $this->startInstance();
    }


    /**
     * Starts new server instance
     */
    protected function startInstance()
    {
        /**
        $toExecute = '"'.self::RFACTOR_EXE_PATH.self::RFACTOR_EXE.'.lnk"'." +path=.. +oneclick";
        $wshShell = new COM("WScript.Shell");
        $process = $wshShell->Run($toExecute,0,false);
        print_r($process);
        die();
        **/

        $envars   = " +oneclick";

        $path = self::RFACTOR_EXE.'.lnk'.$envars;

        chdir(self::RFACTOR_EXE_PATH);

        $descriptorspec = array (
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
        );

        if ( is_resource( $prog = proc_open("start /b " . $path, $descriptorspec, $pipes, self::RFACTOR_EXE_PATH, NULL) ) )
        {
            $ppid = proc_get_status($prog)['pid'];
        }
        else
        {
            echo("Failed to execute!");
            exit();
        }

        $output = array_filter(explode(" ", shell_exec("wmic process get parentprocessid,processid | find \"$ppid\"")));
        array_pop($output);
        $pid = end($output);

        echo("\nProcess ID: $pid ; Parent's Process ID: $ppid\n");
        // returns right process
        $task = shell_exec("tasklist /fi \"PID eq $pid\"");
        echo("\n\nProcess: \n$task\n\n");
        // returns no process found
        $task = shell_exec("tasklist /fi \"PID eq $ppid\"");
        echo("\n\nParent Process: \n$task\n\n");

    }



    /**
     * Creates a Multiplayer.ini with the new configuration
     * @param CustomConfiguration $configuration
     */
    protected function applyConfiguration(CustomConfiguration $configuration)
    {
        $found=false;
        $settings = $configuration->getCustomSettings();
        $variableMap  = $configuration->getVariableMap();
        $newFile = null;
        while(!feof($this->multiplayerFile)){
            $line = fgets($this->multiplayerFile);
            $value = explode('=', $line);
            foreach($settings as $nameSetting=>$newValue){
                if(isset($variableMap[$nameSetting]) && $value[0] == $variableMap[$nameSetting]){
                    $newFile .= $variableMap[$nameSetting].'="'.$newValue.'"'.PHP_EOL;
                    $found=true;
                }
            }
            if(!$found){
                $newFile .= $line;
            }
            $found=false;
        }
        fclose($this->multiplayerFile);
        file_put_contents(self::RFACTOR_MULTIPLAYER_FILE_PATH,$newFile);
    }





}