<?php
/**
 * Rdy4Racing
 * @author: Said
 */
require_once ('GeneralMultiplayerConfiguration.php');

class CustomConfiguration extends GeneralMultiplayerConfiguration
{
    /** Multiplayer Server Options */
    protected $defaultGameName; // Name of last multiplayer game we hosted
    protected $collisionFadeThresh; // Collision impacts are reduced to zero at this latency
    protected $announceAllowed; // Whether to announce server to matchmaker
    protected $announceHost; // Whether servers will attempt to register with the matchmaking service
    protected $inDevelopment; // Whether server is running an unchecked mod.  Server will not be listed in normal matchmaking queries
    protected $closedQualifySessions; // 0 = open to all, 1 = open but drivers will be pending an open session, 2 = closed
    protected $closedRaceSessions; // 0 = open to all (currently N/A), 1 = open but drivers will be pending an open session, 2 = closed
    protected $raceRejoin; // Whether disconnected players can rejoin a race session: 0=no 1=yes with fresh vehicle 2=yes with vehicle in same physical state
    protected $enforceRealName; // Whether Server will display real name used at time of account creation
    protected $driverSwapSetups; // whether vehicle setup is transferred during driver swaps (except steering lock and brake pressure) ... note that UI garage is now loaded for vehicle when you become a passenger
    protected $nagleAlgoritm; // whether server's system messages are delayed for better packing (lower bandwidth, but some clients see unacceptable delays)
    protected $loadingSleepTime; // Milliseconds that dedicated server sleeps between each instance while loading tracks and vehicles
    protected $loadingPriority; // Dedicated server's priority level when loading tracks and vehicles: 0=low, 1=normal, 2=high
    protected $pauseWhileZeroPlayers; // Whether to pause a dedicated server (and stay in practice session) if no human players are present
    protected $httpServerEnabled; // Whether the dedicated server starts a HTTP server
    protected $httpServerMaxFileSize; // Maximum file size, in MB, that the HTTP server will provide
    protected $httpServerDocumentRoot; // Document root for HTTP server. This path is relative to path stored in data.path. data.path located in root install path
    protected $httpServerSendRate; // EXPERIMENTAL Data rate (kilo bits per second) at which internal HTTP Server will delivery content
    protected $allowedTractionControl; // max level 0-3
    protected $allowedAntilockBrackes; // max level 0-2
    protected $allowedStabilityControl; // max level 0-2
    protected $allowedAutoShift; // max level 0-3
    protected $allowedAutoClutch; // max level 0-1
    protected $allowedInvulnerability; // max level 0-1
    protected $allowedOppositeLock; // max level 0-1
    protected $allowedSteeringHelp; // max level 0-3
    protected $allowedBrakeHelp; // max level 0-2
    protected $allowedSpinRecovery; // max level 0-1
    protected $allowedAutoPit; // max level 0-1
    protected $allowedAutoLift; // max level 0-1
    protected $allowedAutoBlip; // max level 0-1
    protected $forcedDrivingView; // 0=no restrictions on driving view, 1=cockpit/tv cockpit/nosecam only, 2=cockpit/nosecam only, 3=cockpit only, 4=tracksides, 5=tracksides group 1
    protected $mustbeStopped; // Whether drivers must come to a complete stop before exiting back to the monitor
    protected $allowAiToggle; // Whether users are allowed to toggle to AI control on the fly
    protected $allowSpectators; // Whether to allow spectator clients to join the server.
    protected $allowPassengers; // Whether to allow spectators to join a car as a co-driver/passenger.  If set to 1 and Allow Spectators is set to 0, spectators will be kicked from the game during the Race Session.
    protected $allowHotsaps; // 0=drivers can only change at pitstops using the pit menu, 1=Drivers can switch at anytime with the Driver Hotswap key
    protected $allowSpectatorChat; // Whether to allow spectators to send chat messages
    protected $allowPassengerChat; // Whether to allow passengers to send chat messages
    protected $maxMpPlayers;
    protected $maxDataPerClient; // if desired, a per-client upload limit (in kbps) will be used if lower than the computed throttle rate
    protected $uniqueVehicleCheck; // server setting, will check client vehicles to deny duplicates of the same vehicle
    protected $minimumAi; // server will ensure this number of AI, but only at the beginning of practice/qual sessions
    protected $maximumAi; // prevent more than this # of AI (there may be other limits)
    protected $votePercentageAddAi; // must EXCEED this percentage to pass vote for adding AI (set to 100 to disable)
    protected $votePercentageNextSession; // must EXCEED this percentage to pass vote to advance to next session (set to 100 to disable)
    protected $votePercentageOther; // must EXCEED this percentage to pass vote for race restart, event restart, or load next race (set to 100 to disable)
    protected $voteMinVoters; // minimum voters required to call vote (except for adding AIs)
    protected $voteMaxRaceRestarts; // maximum race restarts called by vote
    protected $superAdminPassword; // Chat "/admin <password>" to become super-admin. Super-admins are secret and can change the regular admin password with "/apwd <new_password>" (which also removes all current regular admin control).
    protected $adminPassword; // Chat "/admin <password>" to become admin (make sure admin and super-admin passwords are different).  Exit or chat "/admin" to become non-admin.  One super-admin plus three regular admins are now allowed.
    protected $adminFunctionality; // 0 = non-admin's can NEVER call or vote, 1 = non-admin's can't call or vote if admin is present, 2 = non-admin's can call and vote, but admin's vote wins, 3 = if non-admin calls, all voting is normal, but any admin calls win instantly
    protected $allowAnyEvent; // 0 = don't allow users to vote for specific tracks, 1 = allow users to vote for any track in server list, 2 = allow users to vote for any track, note that admins can do anything
    protected $testDay; // 0 = normal sessions (practice, qualifying, warmup, race), 1 = 30-hour test "day"
    protected $practice1Time; // 0 = use default from GDB, otherwise this is # of minutes for practice 1 (1-10 by 1, 15-90 by 5, 105-165 by 15)
    protected $qualifyingTime; // 0 = use default from GDB, otherwise this is # of minutes for qualifying (1-10 by 1, 15-90 by 5, 105-165 by 15)
    protected $qualifyingLaps; // 0 = use default from GDB, otherwise this is # of laps allowed in qualifying
    protected $warmupTime; // 0 = use default from GDB, otherwise this is # of minutes for warmup (1-10 by 1, 15-90 by 5, 105-165 by 15)
    protected $raceClientWait; // Seconds to wait at the beginning of a race session for clients to get ready and go to grid
    protected $allowHotlapCompletion; // Allow hotlap completion before switching sessions (1=testday/practice1 2=practice2 4=practice3 8=practice4 16=qual, 32=warmup, 63=all)
    protected $delayBetweenSessions; // Dedicated server delay before switching sessions automatically (after hotlaps are completed, if option is enabled), previously hardcoded to 45
    protected $delayAfterRace; // Dedicated server additional delay (added to "Delay Between Sessions" before loading next track
    protected $serverSessionEndTimeout; // Session is advanced automatically after N seconds after completion (non-dedicated server only)
    protected $clientFuelVisible; // whether fuel level is visible in results file (0=never, 1=on clients, 2=on server, 3=both)
    protected $pitSpeedOverride; // pitlane speed limit override in meters/sec (0=disabled)
    protected $enableAutodownloads; // Whether to allow clients to autodownload files that they are missing.
    protected $unthrottlePrefix; // Prefix of any clients to be unthrottled (use with caution!)
    protected $unthrottleId; // Unique ID of client to be unthrottled (use with caution!)
    protected $lessenRestrictions; // Allows careful users to test the limits
    protected $joinPassword; // Password for clients to join game
    protected $isolation; // Reserved
    protected $MOTD;



    public $variableMap = array();

    function __construct()
    {
        $this->variableMap =    array(
                                    'defaultGameName' => 'Default Game Name',
                                    'collisionFadeThresh' => 'Collision Fade Thresh',
                                    'announceAllowed' => 'Announce Allowed',
                                    'announceHost' => 'Announce Host',
                                    'inDevelopment' => 'In developement',
                                    'closedQualifySessions' => 'Closed Qualify Sessions',
                                    'closedRaceSessions' => 'Closed Race Sessions',
                                    'raceRejoin' => 'Race Rejoin',
                                    'enforceRealName' => 'Enforce Real Name',
                                    'driverSwapSetups' => 'Driver Swap Setups',
                                    'nagleAlgoritm' => 'Nagle Algorithm',
                                    'loadingSleepTime' => 'Loading Sleep Time',
                                    'loadingPriority' => 'Loading Priority',
                                    'pauseWhileZeroPlayers' => 'Pause While Zero Players',
                                    'httpServerEnabled' => 'HTTP Server Enabled',
                                    'httpServerMaxFileSize' => 'HTTP Server Max File Size',
                                    'httpServerDocumentRoot' => 'HTTP Server Document Root',
                                    'httpServerSendRate' => 'HTTP Server Send Rate',
                                    'allowedTractionControl' => 'Allowed Traction Control',
                                    'allowedAntilockBrackes' => 'Allowed Antilock Brakes',
                                    'allowedStabilityControl' => 'Allowed Stability Control',
                                    'allowedAutoShift' => 'Allowed Auto Shift',
                                    'allowedAutoClutch' => 'Allowed Auto Clutch',
                                    'allowedInvulnerability' => 'Allowed Invulnerability',
                                    'allowedOppositeLock' => 'Allowed Opposite Lock',
                                    'allowedSteeringHelp' => 'Allowed Steering Help',
                                    'allowedBrakeHelp' => 'Allowed Brake Help',
                                    'allowedSpinRecovery' => 'Allowed Spin Recovery',
                                    'allowedAutoPit' => 'Allowed Auto Pit',
                                    'allowedAutoLift' => 'Allowed Auto Lift',
                                    'allowedAutoBlip' => 'Allowed Auto Blip',
                                    'forcedDrivingView' => 'Forced Driving View',
                                    'mustbeStopped' => 'Must Be Stopped',
                                    'allowAiToggle' => 'Allow AI Toggle',
                                    'allowSpectators' => 'Allow Spectators',
                                    'allowPassengers' => 'Allow Passengers',
                                    'allowHotsaps' => 'Allow Hotswaps',
                                    'allowSpectatorChat' => 'Allow Spectator Chat',
                                    'allowPassengerChat' => 'Allow Passenger Chat',
                                    'maxMpPlayers' => 'Max MP Players',
                                    'maxDataPerClient' => 'Max Data Per Client',
                                    'uniqueVehicleCheck' => 'Unique Vehicle Check',
                                    'minimumAi' => 'Minimum AI',
                                    'maximumAi' => 'Maximum AI',
                                    'votePercentageAddAi' => 'Vote Percentage Add AI',
                                    'votePercentageNextSession' => 'Vote Percentage Next Session',
                                    'votePercentageOther' => 'Vote Percentage Other',
                                    'voteMinVoters' =>  'Vote Min Voters',
                                    'allowedAutoLift' => 'Allowed Auto Lift',
                                    'allowedAutoBlip' => 'Allowed Auto Blip',
                                    'forcedDrivingView' => 'Forced Driving View',
                                    'mustbeStopped' => 'Must Be Stopped',
                                    'allowAiToggle' => 'Allow AI Toggle',
                                    'allowSpectators' => 'Allow Spectators',
                                    'allowPassengers' => 'Allow Passengers',
                                    'allowHotsaps' => 'Allow Hotswaps',
                                    'allowSpectatorChat' => 'Allow Spectator Chat',
                                    'allowPassengerChat' => 'Allow Passenger Chat',
                                    'maxMpPlayers' => 'Max MP Players',
                                    'maxDataPerClient' => 'Max Data Per Client',
                                    'uniqueVehicleCheck' => 'Unique Vehicle Check',
                                    'minimumAi' => 'Minimum AI',
                                    'maximumAi' => 'Maximum AI',
                                    'votePercentageAddAi' => 'Vote Percentage Add AI',
                                    'votePercentageNextSession' => 'Vote Percentage Next Session',
                                    'votePercentageOther' => 'Vote Percentage Other',
                                    'voteMinVoters' => 'Vote Min Voters',
                                     'MOTD' => 'MOTD',
                                     'isolation' => 'Isolation',
                                     'joinPassword' => 'Join Password',
                                     'lessenRestriction' => 'Lessen Restrictions',
                                     'unthrottleId' => 'Unthrottle ID',
                                     'unthrottlePrefix' => 'Unthrottle Prefix',
                                     'enableAutodownloads' => 'Enable Autodownloads',
                                     'pitSpeedOverride' => 'Pit Speed Override',
                                     'clientFuelVisible' => 'Client Fuel Visible',
                                     'serverSessionEndTimeout' => 'Server Session End Timeout',
                                     'delayAfterRace' => 'Delay After Race',
                                     'delayBetweenSessions'=> 'Delay Between Sessions',
                                     'allowHotlapCompletion'=> 'Allow Hotlap Completion',
                                     'raceClientWait'=> 'Race Client Wait',
                                     'warmupTime' => 'Warmup Time',
                                     'qualifyingLaps' => 'Qualifying Laps',
                                     'qualifyingTime'  => 'Qualifying Time',
                                     'practice1Time' => 'Practice 1 Time',
                                     'testDay' => 'Test Day',
                                     'allowAnyEvent' => 'Allow Any Event',
                                     'adminFunctionality' => 'Admin Functionality',
                                     'adminPassword' => 'Admin Password',
                                     'superAdminPassword' => 'SuperAdminPassword',
                                     'voteMaxRaceRestarts' => 'Vote Max Race Restarts',
                                     'netConnectionType' => 'Net Connection Type',
                                     'upSteamRatedKBPS' => 'Upstream Rated KBPS',
                                     'downStreamRatedKBPS' => 'Downstream Rated KBPS',
                                     'bindIp' => 'Bind IP',
                                     'multiplayerEnumType' => 'Multiplayer Enum Type',
                                     'multiplayerSortType' => 'Multiplayer Sort Type',
                                     'multiplayerSortField' => 'Multiplayer sort field',
                                     'multiplayerSortValue' => 'Multiplayer sort value',
                                     'multiplayerFilterPasswordServers' => 'Multiplayer filter password servers',
                                     'multiplayerFilterFirstOperand' => 'Multiplayer filter first operand',
                                     'multiplayerFilterOperator' => 'Multiplayer filter operator',
                                     'multiplayerFilterSecondOperand' => 'Multiplayer filter second operand',
                                     'multiplayerAutoRetrieveServers' => 'Multiplayer auto retrieve servers',
                                     'netFlushThreshold' => 'Net Flush Threshold',
                                     'simulationPort' => 'Simulation Port',
                                     'httpServerPort' => 'HTTP Server Port',
                                     'allowChatInCar' => 'Allow Chat In Car',
                                     'autoScrollChat' => 'Autoscroll Chat',
                                     'colorCodeChat' => 'Colorcode Chat',
                                     'displayLaggyLabels' => 'Display Laggy Labels',
                                     'delayVehicleGraphics' => 'Delay Vehicle Graphics',
                                     'temporaryVehicleGraphics' => 'Temporary Vehicle Graphics',
                                     'extrapolationTime' => 'Extrapolation Time',
                                     'positionSpring' => 'Position Spring',
                                     'orientatinSpring' => 'Orientation Spring',
                                     'dampingMultiplier' => 'Damping Multiplier',
                                     'pathPrediction' => 'Path Prediction',
                                     'remoteVechicleCollision' => 'Remote Vehicle Collision',
                                     'leaveJoinMessages' => 'Leave/Join Messages',
                                     'buddyListAnnounce' => 'Buddy List Announce',
                                     'autoJoinChatServer' => 'Auto Join Chat Server',
                                     'spectatorMode' => 'Spectator Mode',
                                     'spectatorStartingView' => 'Spectator Starting View',
                                     'spectacteVehicle' => 'Spectate Vehicle',
                                     'showSeating' => 'Show Seating',
                                     'lobbyChatNickName' => 'Lobby Chat Nickname',
                                     'liveUpdates' => 'Live Updates',
                                     'autoExit' => 'Auto Exit',
                                     'downloadCustomSkins' => 'Download Custom Skins'
        );

    }


    public function setMOTD($MOTD)
    {
        $this->MOTD = $MOTD;
    }

    public function getMOTD()
    {
        return $this->MOTD;
    }

    public function setAdminFunctionality($adminFunctionality)
    {
        $this->adminFunctionality = $adminFunctionality;
    }

    public function getAdminFunctionality()
    {
        return $this->adminFunctionality;
    }

    public function setAdminPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;
    }

    public function getAdminPassword()
    {
        return $this->adminPassword;
    }

    public function setAllowAiToggle($allowAiToggle)
    {
        $this->allowAiToggle = $allowAiToggle;
    }

    public function getAllowAiToggle()
    {
        return $this->allowAiToggle;
    }

    public function setAllowAnyEvent($allowAnyEvent)
    {
        $this->allowAnyEvent = $allowAnyEvent;
    }

    public function getAllowAnyEvent()
    {
        return $this->allowAnyEvent;
    }

    public function setAllowHotlapCompletion($allowHotlapCompletion)
    {
        $this->allowHotlapCompletion = $allowHotlapCompletion;
    }

    public function getAllowHotlapCompletion()
    {
        return $this->allowHotlapCompletion;
    }

    public function setAllowHotsaps($allowHotsaps)
    {
        $this->allowHotsaps = $allowHotsaps;
    }

    public function getAllowHotsaps()
    {
        return $this->allowHotsaps;
    }

    public function setAllowPassengerChat($allowPassengerChat)
    {
        $this->allowPassengerChat = $allowPassengerChat;
    }

    public function getAllowPassengerChat()
    {
        return $this->allowPassengerChat;
    }

    public function setAllowPassengers($allowPassengers)
    {
        $this->allowPassengers = $allowPassengers;
    }

    public function getAllowPassengers()
    {
        return $this->allowPassengers;
    }

    public function setAllowSpectatorChat($allowSpectatorChat)
    {
        $this->allowSpectatorChat = $allowSpectatorChat;
    }

    public function getAllowSpectatorChat()
    {
        return $this->allowSpectatorChat;
    }

    public function setAllowSpectators($allowSpectators)
    {
        $this->allowSpectators = $allowSpectators;
    }

    public function getAllowSpectators()
    {
        return $this->allowSpectators;
    }

    public function setAllowedSpinRecovery($allowedSpinRecovery)
    {
        $this->allowedSpinRecovery = $allowedSpinRecovery;
    }

    public function getAllowedSpinRecovery()
    {
        return $this->allowedSpinRecovery;
    }

    public function setAllowedAntilockBrackes($allowedAntilockBrackes)
    {
        $this->allowedAntilockBrackes = $allowedAntilockBrackes;
    }

    public function getAllowedAntilockBrackes()
    {
        return $this->allowedAntilockBrackes;
    }

    public function setAllowedAutoBlip($allowedAutoBlip)
    {
        $this->allowedAutoBlip = $allowedAutoBlip;
    }

    public function getAllowedAutoBlip()
    {
        return $this->allowedAutoBlip;
    }

    public function setAllowedAutoClutch($allowedAutoClutch)
    {
        $this->allowedAutoClutch = $allowedAutoClutch;
    }

    public function getAllowedAutoClutch()
    {
        return $this->allowedAutoClutch;
    }

    public function setAllowedAutoLift($allowedAutoLift)
    {
        $this->allowedAutoLift = $allowedAutoLift;
    }

    public function getAllowedAutoLift()
    {
        return $this->allowedAutoLift;
    }

    public function setAllowedAutoPit($allowedAutoPit)
    {
        $this->allowedAutoPit = $allowedAutoPit;
    }

    public function getAllowedAutoPit()
    {
        return $this->allowedAutoPit;
    }

    public function setAllowedAutoShift($allowedAutoShift)
    {
        $this->allowedAutoShift = $allowedAutoShift;
    }

    public function getAllowedAutoShift()
    {
        return $this->allowedAutoShift;
    }

    public function setAllowedBrakeHelp($allowedBrakeHelp)
    {
        $this->allowedBrakeHelp = $allowedBrakeHelp;
    }

    public function getAllowedBrakeHelp()
    {
        return $this->allowedBrakeHelp;
    }

    public function setAllowedInvulnerability($allowedInvulnerability)
    {
        $this->allowedInvulnerability = $allowedInvulnerability;
    }

    public function getAllowedInvulnerability()
    {
        return $this->allowedInvulnerability;
    }

    public function setAllowedOppositeLock($allowedOppositeLock)
    {
        $this->allowedOppositeLock = $allowedOppositeLock;
    }

    public function getAllowedOppositeLock()
    {
        return $this->allowedOppositeLock;
    }

    public function setAllowedStabilityControl($allowedStabilityControl)
    {
        $this->allowedStabilityControl = $allowedStabilityControl;
    }

    public function getAllowedStabilityControl()
    {
        return $this->allowedStabilityControl;
    }

    public function setAllowedSteeringHelp($allowedSteeringHelp)
    {
        $this->allowedSteeringHelp = $allowedSteeringHelp;
    }

    public function getAllowedSteeringHelp()
    {
        return $this->allowedSteeringHelp;
    }

    public function setAllowedTractionControl($allowedTractionControl)
    {
        $this->allowedTractionControl = $allowedTractionControl;
    }

    public function getAllowedTractionControl()
    {
        return $this->allowedTractionControl;
    }

    public function setAnnounceAllowed($announceAllowed)
    {
        $this->announceAllowed = $announceAllowed;
    }

    public function getAnnounceAllowed()
    {
        return $this->announceAllowed;
    }

    public function setAnnounceHost($announceHost)
    {
        $this->announceHost = $announceHost;
    }

    public function getAnnounceHost()
    {
        return $this->announceHost;
    }

    public function setClientFuelVisible($clientFuelVisible)
    {
        $this->clientFuelVisible = $clientFuelVisible;
    }

    public function getClientFuelVisible()
    {
        return $this->clientFuelVisible;
    }

    public function setClosedQualifySessions($closedQualifySessions)
    {
        $this->closedQualifySessions = $closedQualifySessions;
    }

    public function getClosedQualifySessions()
    {
        return $this->closedQualifySessions;
    }

    public function setClosedRaceSessions($closedRaceSessions)
    {
        $this->closedRaceSessions = $closedRaceSessions;
    }

    public function getClosedRaceSessions()
    {
        return $this->closedRaceSessions;
    }

    public function setCollisionFadeThresh($collisionFadeThresh)
    {
        $this->collisionFadeThresh = $collisionFadeThresh;
    }

    public function getCollisionFadeThresh()
    {
        return $this->collisionFadeThresh;
    }

    public function setDefaultGameName($defaultGameName)
    {
        $this->defaultGameName = $defaultGameName;
    }

    public function getDefaultGameName()
    {
        return $this->defaultGameName;
    }

    public function setDelayAfterRace($delayAfterRace)
    {
        $this->delayAfterRace = $delayAfterRace;
    }

    public function getDelayAfterRace()
    {
        return $this->delayAfterRace;
    }

    public function setDelayBetweenSessions($delayBetweenSessions)
    {
        $this->delayBetweenSessions = $delayBetweenSessions;
    }

    public function getDelayBetweenSessions()
    {
        return $this->delayBetweenSessions;
    }

    public function setDriverSwapSetups($driverSwapSetups)
    {
        $this->driverSwapSetups = $driverSwapSetups;
    }

    public function getDriverSwapSetups()
    {
        return $this->driverSwapSetups;
    }

    public function setEnableAutodownloads($enableAutodownloads)
    {
        $this->enableAutodownloads = $enableAutodownloads;
    }

    public function getEnableAutodownloads()
    {
        return $this->enableAutodownloads;
    }

    public function setEnforceRealName($enforceRealName)
    {
        $this->enforceRealName = $enforceRealName;
    }

    public function getEnforceRealName()
    {
        return $this->enforceRealName;
    }

    public function setForcedDrivingView($forcedDrivingView)
    {
        $this->forcedDrivingView = $forcedDrivingView;
    }

    public function getForcedDrivingView()
    {
        return $this->forcedDrivingView;
    }

    public function setHttpServerDocumentRootk($httpServerDocumentRootk)
    {
        $this->httpServerDocumentRootk = $httpServerDocumentRootk;
    }

    public function getHttpServerDocumentRootk()
    {
        return $this->httpServerDocumentRootk;
    }

    public function setHttpServerEnabled($httpServerEnabled)
    {
        $this->httpServerEnabled = $httpServerEnabled;
    }

    public function getHttpServerEnabled()
    {
        return $this->httpServerEnabled;
    }

    public function setHttpServerMaxFileSize($httpServerMaxFileSize)
    {
        $this->httpServerMaxFileSize = $httpServerMaxFileSize;
    }

    public function getHttpServerMaxFileSize()
    {
        return $this->httpServerMaxFileSize;
    }

    public function setHttpServerSendRate($httpServerSendRate)
    {
        $this->httpServerSendRate = $httpServerSendRate;
    }

    public function getHttpServerSendRate()
    {
        return $this->httpServerSendRate;
    }

    public function setInDevelopment($inDevelopment)
    {
        $this->inDevelopment = $inDevelopment;
    }

    public function getInDevelopment()
    {
        return $this->inDevelopment;
    }

    public function setIsolation($isolation)
    {
        $this->isolation = $isolation;
    }

    public function getIsolation()
    {
        return $this->isolation;
    }

    public function setJoinPassword($joinPassword)
    {
        $this->joinPassword = $joinPassword;
    }

    public function getJoinPassword()
    {
        return $this->joinPassword;
    }

    public function setLessenRestrictiona($lessenRestrictiona)
    {
        $this->lessenRestrictiona = $lessenRestrictiona;
    }

    public function getLessenRestrictiona()
    {
        return $this->lessenRestrictiona;
    }

    public function setLoadingPriority($loadingPriority)
    {
        $this->loadingPriority = $loadingPriority;
    }

    public function getLoadingPriority()
    {
        return $this->loadingPriority;
    }

    public function setLoadingSleepTime($loadingSleepTime)
    {
        $this->loadingSleepTime = $loadingSleepTime;
    }

    public function getLoadingSleepTime()
    {
        return $this->loadingSleepTime;
    }

    public function setMaxDataPerClient($maxDataPerClient)
    {
        $this->maxDataPerClient = $maxDataPerClient;
    }

    public function getMaxDataPerClient()
    {
        return $this->maxDataPerClient;
    }

    public function setMaxMpPlayers($maxMpPlayers)
    {
        $this->maxMpPlayers = $maxMpPlayers;
    }

    public function getMaxMpPlayers()
    {
        return $this->maxMpPlayers;
    }

    public function setMaximumAi($maximumAi)
    {
        $this->maximumAi = $maximumAi;
    }

    public function getMaximumAi()
    {
        return $this->maximumAi;
    }

    public function setMinimumAi($minimumAi)
    {
        $this->minimumAi = $minimumAi;
    }

    public function getMinimumAi()
    {
        return $this->minimumAi;
    }

    public function setMustbeStopped($mustbeStopped)
    {
        $this->mustbeStopped = $mustbeStopped;
    }

    public function getMustbeStopped()
    {
        return $this->mustbeStopped;
    }

    public function setNagleAlgoritm($nagleAlgoritm)
    {
        $this->nagleAlgoritm = $nagleAlgoritm;
    }

    public function getNagleAlgoritm()
    {
        return $this->nagleAlgoritm;
    }

    public function setPauseWhileZeroPlayers($pauseWhileZeroPlayers)
    {
        $this->pauseWhileZeroPlayers = $pauseWhileZeroPlayers;
    }

    public function getPauseWhileZeroPlayers()
    {
        return $this->pauseWhileZeroPlayers;
    }

    public function setPitSpeedOverride($pitSpeedOverride)
    {
        $this->pitSpeedOverride = $pitSpeedOverride;
    }

    public function getPitSpeedOverride()
    {
        return $this->pitSpeedOverride;
    }

    public function setPractice1Time($practice1Time)
    {
        $this->practice1Time = $practice1Time;
    }

    public function getPractice1Time()
    {
        return $this->practice1Time;
    }

    public function setQualifyinLaps($qualifyinLaps)
    {
        $this->qualifyinLaps = $qualifyinLaps;
    }

    public function getQualifyinLaps()
    {
        return $this->qualifyinLaps;
    }

    public function setQualifyingTime($qualifyingTime)
    {
        $this->qualifyingTime = $qualifyingTime;
    }

    public function getQualifyingTime()
    {
        return $this->qualifyingTime;
    }

    public function setRaceClientWait($raceClientWait)
    {
        $this->raceClientWait = $raceClientWait;
    }

    public function getRaceClientWait()
    {
        return $this->raceClientWait;
    }

    public function setRaceRejoin($raceRejoin)
    {
        $this->raceRejoin = $raceRejoin;
    }

    public function getRaceRejoin()
    {
        return $this->raceRejoin;
    }

    public function setServerSessionEndTimeout($serverSessionEndTimeout)
    {
        $this->serverSessionEndTimeout = $serverSessionEndTimeout;
    }

    public function getServerSessionEndTimeout()
    {
        return $this->serverSessionEndTimeout;
    }

    public function setSuperAdminPassword($superAdminPassword)
    {
        $this->superAdminPassword = $superAdminPassword;
    }

    public function getSuperAdminPassword()
    {
        return $this->superAdminPassword;
    }

    public function setTestDay($testDay)
    {
        $this->testDay = $testDay;
    }

    public function getTestDay()
    {
        return $this->testDay;
    }

    public function setUniqueVehicleCheck($uniqueVehicleCheck)
    {
        $this->uniqueVehicleCheck = $uniqueVehicleCheck;
    }

    public function getUniqueVehicleCheck()
    {
        return $this->uniqueVehicleCheck;
    }

    public function setUnthrottleId($unthrottleId)
    {
        $this->unthrottleId = $unthrottleId;
    }

    public function getUnthrottleId()
    {
        return $this->unthrottleId;
    }

    public function setUnthrottlePrefix($unthrottlePrefix)
    {
        $this->unthrottlePrefix = $unthrottlePrefix;
    }

    public function getUnthrottlePrefix()
    {
        return $this->unthrottlePrefix;
    }

    public function setVoteMaxRaceRestarts($voteMaxRaceRestarts)
    {
        $this->voteMaxRaceRestarts = $voteMaxRaceRestarts;
    }

    public function getVoteMaxRaceRestarts()
    {
        return $this->voteMaxRaceRestarts;
    }

    public function setVoteMinVoters($voteMinVoters)
    {
        $this->voteMinVoters = $voteMinVoters;
    }

    public function getVoteMinVoters()
    {
        return $this->voteMinVoters;
    }

    public function setVotePercentageAddAi($votePercentageAddAi)
    {
        $this->votePercentageAddAi = $votePercentageAddAi;
    }

    public function getVotePercentageAddAi()
    {
        return $this->votePercentageAddAi;
    }

    public function setVotePercentageNextSession($votePercentageNextSession)
    {
        $this->votePercentageNextSession = $votePercentageNextSession;
    }

    public function getVotePercentageNextSession()
    {
        return $this->votePercentageNextSession;
    }

    public function setVotePercentageOther($votePercentageOther)
    {
        $this->votePercentageOther = $votePercentageOther;
    }

    public function getVotePercentageOther()
    {
        return $this->votePercentageOther;
    }

    public function setWarmupTime($warmupTime)
    {
        $this->warmupTime = $warmupTime;
    }

    public function getWarmupTime()
    {
        return $this->warmupTime;
    } // Message of the day


    public function getCustomSettings(){
        $values = array();
        foreach($this as $attr=>$val){
            if(isset($val)){
                $values[$attr] = $val ;
            }
        }
        return $values;
    }

    public function getVariableMap(){
        return $this->variableMap;
    }


}