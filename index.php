<?php
/**
 * @author sreklaoui
 * package @instanceLauncher
 */

/** Name Series
 * Marussia_MR01
 * FISI_2012
 * GT2_C6R
 * Clio_Cupo
 * */

require_once ('MultiplayerConfiguration.php');
require_once '/lib/Zend/Loader/StandardAutoloader.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set("soap.wsdl_cache_enabled", 0);


$bootStrap = new BootStrap();

class BootStrap
{
    protected $soapServer;
    protected $server;

    public function __construct(){
        $mConfiguration = new MultiplayerConfiguration(); // Instance creator
        $customConfiguration = new CustomConfiguration(); // Configuration for the instance
        // Default configuration
        $customConfiguration->setAdminPassword('putas');
        $customConfiguration->setDefaultGameName('Marussia_MR01');
        $customConfiguration->setForcedDrivingView('1');
        $customConfiguration->setEnforceRealName('1'); //Want the real name
        $customConfiguration->setJoinPassword('FuckThis');
        //Aids configuration
        $customConfiguration->setAllowedTractionControl('0'); // No Aids
        $customConfiguration->setAllowedAntilockBrackes('0');
        $customConfiguration->setAllowedStabilityControl('0');
        $customConfiguration->setAllowedAutoShift('0');
        $customConfiguration->setAllowedSteeringHelp('0');
        $customConfiguration->setAllowedBrakeHelp('0');
        $customConfiguration->setAllowedSpinRecovery('0');
        $customConfiguration->setAllowedAutoPit('0');
        $customConfiguration->setAllowedAutoLift('0');
        $customConfiguration->setAllowedAutoBlip('0');


        //For practice session
        $customConfiguration->setPractice1Time('100'); //In minutes
        $customConfiguration->setQualifyingTime('0');
        $customConfiguration->setQualifyinLaps('0');
        $customConfiguration->setWarmupTime('0');


        //For Message of the day
        $customConfiguration->setMOTD('Bienvenidos  a R4R');

        $mConfiguration->instanceCreate($customConfiguration);
        //$this->initAutoload();
        //$this->startSoapServer();
    }



    protected function initAutoload(){
        // Initialize Zend autoloader
        $loader = new \Zend\Loader\StandardAutoloader(array(
            'autoregister_zf' => true,
            'fallback_autoloader' => true,
        ));

        $loader->register();
    }

    protected function startSoapServer(){
        if(isset($_GET['wsdl'])){
            $this->server = new Zend\Soap\AutoDiscover();
            $this->server->setClass('MultiplayerConfiguration');
            $this->server->setUri("http://127.0.0.1".$_SERVER['SCRIPT_NAME']."?wsdl");
            $wsdl=$this->server->generate();
            $this->server->handle();
        }else{
            $wsdl = "http://127.0.0.1".$_SERVER['SCRIPT_NAME']."?wsdl";
            $this->soapServer = new \Zend\Soap\Server($wsdl);
            $this->soapServer->setWSDLCache(0);
            $this->soapServer->setObject(new MultiplayerConfiguration());
            $this->soapServer->handle();
        }
    }





}