<?php
/**
 * Rdy4Racing
 * @author: Said
 */

class GeneralMultiplayerConfiguration
{
    /** General Options */
    protected $netConnectionType; // 0=28k, 1=56k, 2=ISDN, 3=128kbps cable/dsl 4=256+kbps cable/dsl, 5=LAN, 6=custom
    protected $upSteamRatedKBPS; // Rated uploading speed of connection, in kilobits per second
    protected $downStreamRatedKBPS; // Rated downloading speed of connection, in kilobits per second
    protected $bindIp; // By setting this to anything other than 0.0.0.0 will cause network traffic to bind to the specified IP. This should only be set if the host machine has more than one network adapter
    protected $multiplayerEnumType; // 0=LAN, 1=Internet
    protected $multiplayerSortType; // 0=Ascend, 1=Decend
    protected $multiplayerSortField; // Default to 0 to sort by game name
    protected $multiplayerSortValue; // Blank implies wildcard search
    protected $multiplayerFilterPasswordServers; // Setting to true will add filter to only search for servers that have a password and discard all servers without a password
    protected $multiplayerFilterFirstOperand; // Blank implies no filtering will be done, otherwise this operand must be a field in the active server list
    protected $multiplayerFilterOperato; // Blank implies no filtering will be done, operator can be either >, <, or =
    protected $multiplayerFilterSecondOperand; // Blank implies no filtering will be done, otherwise this must be string value
    protected $multiplayerAutoRetrieveServers; // If true then game will auto download server list when possible. If false, it won't and user will have to manually download the list
    protected $netFlushThreshold; // threshold for auto-accumulation flush while building data chunks (default is standard MTU of 536, minus 64 bytes room for layer headers: 472)
    protected $simulationPort; // range is 1025 - 65535
    protected $httpServerPort; // range is 1025 - 65535. Used for file sharing
    protected $allowChatInCar; // whether to allow incoming chats to appear while in car
    protected $autoScrollChat; // whether to auto-scroll chatbox as new chats arrive
    protected $colorCodeChat; // whether to color-code chats in the chatbox
    protected $displayLaggyLabels; // whether to display vehicle labels on vehicles with laggy connections
    protected $delayVehicleGraphics; // if true, delay loading vehicle graphics when clients join in order to reduce the pause
    protected $temporaryVehicleGraphics; // number of vehicle graphical instances to load at init time for temporary use when clients join (if number is exceeded, quality will deteriorate)
    protected $extrapolationTime; // Extrapolation time (in seconds) before car disappears
    protected $positionSpring; // Position spring at 1000ms latency (lower latencies have stronger springs, higher latencies have same springs)
    protected $orientatinSpring; // Orientation spring at 1000ms latency
    protected $dampingMultiplier; // 1.0 = critical damping, higher values are overdamped, lower values are underdamped and not recommended
    protected $pathPrediction; // Influence of the AI path on remote vehicle prediction (0.0-1.0)
    protected $remoteVechicleCollision; // Maximum distance from current vehicle that we will run collision on remote vehicles to prevent them from appearing to go through walls
    protected $leaveJoinMessages; // 0=none 1=in-car 2=monitor 3=both
    protected $buddyListAnnounce; // whether to allow other players to see what game you are in
    protected $autoJoinChatServer; // Whether to auto join to lobby chat during start up
    protected $spectatorMode; // Join games in spectator mode (rather than with a separate vehicle)
    protected $spectatorStartingView; // Preferred starting camera view as spectator
    protected $spectacteVehicle; // Preferred vehicle to spectate upon join
    protected $showSeating; // Show vehicle seating and status (driver/passenger/spectator) when vehicle labels are on
    protected $lobbyChatNickName; // Nickname to use in Lobby Chat, if this is blank player name will be used
    protected $liveUpdates; // whether to download news and UI elements on game load. (28.8s turn this off)
    protected $autoExit; // whether to automatically exit after leaving auto-hosted/auto-joined games
    protected $downloadCustomSkins;

    public function setAllowChatInCar($allowChatInCar)
    {
        $this->allowChatInCar = $allowChatInCar;
    }

    public function getAllowChatInCar()
    {
        return $this->allowChatInCar;
    }

    public function setAutoExit($autoExit)
    {
        $this->autoExit = $autoExit;
    }

    public function getAutoExit()
    {
        return $this->autoExit;
    }

    public function setAutoJoinChatServer($autoJoinChatServer)
    {
        $this->autoJoinChatServer = $autoJoinChatServer;
    }

    public function getAutoJoinChatServer()
    {
        return $this->autoJoinChatServer;
    }

    public function setAutoScrollChat($autoScrollChat)
    {
        $this->autoScrollChat = $autoScrollChat;
    }

    public function getAutoScrollChat()
    {
        return $this->autoScrollChat;
    }

    public function setBindIp($bindIp)
    {
        $this->bindIp = $bindIp;
    }

    public function getBindIp()
    {
        return $this->bindIp;
    }

    public function setBuddyListAnnounce($buddyListAnnounce)
    {
        $this->buddyListAnnounce = $buddyListAnnounce;
    }

    public function getBuddyListAnnounce()
    {
        return $this->buddyListAnnounce;
    }

    public function setColorCodeChat($colorCodeChat)
    {
        $this->colorCodeChat = $colorCodeChat;
    }

    public function getColorCodeChat()
    {
        return $this->colorCodeChat;
    }

    public function setDampingMultiplier($dampingMultiplier)
    {
        $this->dampingMultiplier = $dampingMultiplier;
    }

    public function getDampingMultiplier()
    {
        return $this->dampingMultiplier;
    }

    public function setDelayVehicleGraphics($delayVehicleGraphics)
    {
        $this->delayVehicleGraphics = $delayVehicleGraphics;
    }

    public function getDelayVehicleGraphics()
    {
        return $this->delayVehicleGraphics;
    }

    public function setDisplayLaggyLabels($displayLaggyLabels)
    {
        $this->displayLaggyLabels = $displayLaggyLabels;
    }

    public function getDisplayLaggyLabels()
    {
        return $this->displayLaggyLabels;
    }

    public function setDownStreamRatedKBPS($downStreamRatedKBPS)
    {
        $this->downStreamRatedKBPS = $downStreamRatedKBPS;
    }

    public function getDownStreamRatedKBPS()
    {
        return $this->downStreamRatedKBPS;
    }

    public function setDownloadCustomSkins($downloadCustomSkins)
    {
        $this->downloadCustomSkins = $downloadCustomSkins;
    }

    public function getDownloadCustomSkins()
    {
        return $this->downloadCustomSkins;
    }

    public function setExtrapolationTime($extrapolationTime)
    {
        $this->extrapolationTime = $extrapolationTime;
    }

    public function getExtrapolationTime()
    {
        return $this->extrapolationTime;
    }

    public function setHttpServerPort($httpServerPort)
    {
        $this->httpServerPort = $httpServerPort;
    }

    public function getHttpServerPort()
    {
        return $this->httpServerPort;
    }

    public function setLeaveJoinMessages($leaveJoinMessages)
    {
        $this->leaveJoinMessages = $leaveJoinMessages;
    }

    public function getLeaveJoinMessages()
    {
        return $this->leaveJoinMessages;
    }

    public function setLiveUpdates($liveUpdates)
    {
        $this->liveUpdates = $liveUpdates;
    }

    public function getLiveUpdates()
    {
        return $this->liveUpdates;
    }

    public function setLobbyChatNickName($lobbyChatNickName)
    {
        $this->lobbyChatNickName = $lobbyChatNickName;
    }

    public function getLobbyChatNickName()
    {
        return $this->lobbyChatNickName;
    }

    public function setMultiplayerAutoRetrieveServers($multiplayerAutoRetrieveServers)
    {
        $this->multiplayerAutoRetrieveServers = $multiplayerAutoRetrieveServers;
    }

    public function getMultiplayerAutoRetrieveServers()
    {
        return $this->multiplayerAutoRetrieveServers;
    }

    public function setMultiplayerEnumType($multiplayerEnumType)
    {
        $this->multiplayerEnumType = $multiplayerEnumType;
    }

    public function getMultiplayerEnumType()
    {
        return $this->multiplayerEnumType;
    }

    public function setMultiplayerFilterFirstOperand($multiplayerFilterFirstOperand)
    {
        $this->multiplayerFilterFirstOperand = $multiplayerFilterFirstOperand;
    }

    public function getMultiplayerFilterFirstOperand()
    {
        return $this->multiplayerFilterFirstOperand;
    }

    public function setMultiplayerFilterOperatos($multiplayerFilterOperatos)
    {
        $this->multiplayerFilterOperatos = $multiplayerFilterOperatos;
    }

    public function getMultiplayerFilterOperatos()
    {
        return $this->multiplayerFilterOperatos;
    }

    public function setMultiplayerFilterPasswordServers($multiplayerFilterPasswordServers)
    {
        $this->multiplayerFilterPasswordServers = $multiplayerFilterPasswordServers;
    }

    public function getMultiplayerFilterPasswordServers()
    {
        return $this->multiplayerFilterPasswordServers;
    }

    public function setMultiplayerFilterSecondOperand($multiplayerFilterSecondOperand)
    {
        $this->multiplayerFilterSecondOperand = $multiplayerFilterSecondOperand;
    }

    public function getMultiplayerFilterSecondOperand()
    {
        return $this->multiplayerFilterSecondOperand;
    }

    public function setMultiplayerSortField($multiplayerSortField)
    {
        $this->multiplayerSortField = $multiplayerSortField;
    }

    public function getMultiplayerSortField()
    {
        return $this->multiplayerSortField;
    }

    public function setMultiplayerSortType($multiplayerSortType)
    {
        $this->multiplayerSortType = $multiplayerSortType;
    }

    public function getMultiplayerSortType()
    {
        return $this->multiplayerSortType;
    }

    public function setMultiplayerSortValue($multiplayerSortValue)
    {
        $this->multiplayerSortValue = $multiplayerSortValue;
    }

    public function getMultiplayerSortValue()
    {
        return $this->multiplayerSortValue;
    }

    public function setNetConnectionType($netConnectionType)
    {
        $this->netConnectionType = $netConnectionType;
    }

    public function getNetConnectionType()
    {
        return $this->netConnectionType;
    }

    public function setNetFlushThreshold($netFlushThreshold)
    {
        $this->netFlushThreshold = $netFlushThreshold;
    }

    public function getNetFlushThreshold()
    {
        return $this->netFlushThreshold;
    }

    public function setOrientatinSpring($orientatinSpring)
    {
        $this->orientatinSpring = $orientatinSpring;
    }

    public function getOrientatinSpring()
    {
        return $this->orientatinSpring;
    }

    public function setPathPrediction($pathPrediction)
    {
        $this->pathPrediction = $pathPrediction;
    }

    public function getPathPrediction()
    {
        return $this->pathPrediction;
    }

    public function setPositionSpring($positionSpring)
    {
        $this->positionSpring = $positionSpring;
    }

    public function getPositionSpring()
    {
        return $this->positionSpring;
    }

    public function setRemoteVechicleCollision($remoteVechicleCollision)
    {
        $this->remoteVechicleCollision = $remoteVechicleCollision;
    }

    public function getRemoteVechicleCollision()
    {
        return $this->remoteVechicleCollision;
    }

    public function setShowSeating($showSeating)
    {
        $this->showSeating = $showSeating;
    }

    public function getShowSeating()
    {
        return $this->showSeating;
    }

    public function setSimulationPort($simulationPort)
    {
        $this->simulationPort = $simulationPort;
    }

    public function getSimulationPort()
    {
        return $this->simulationPort;
    }

    public function setSpectacteVehicle($spectacteVehicle)
    {
        $this->spectacteVehicle = $spectacteVehicle;
    }

    public function getSpectacteVehicle()
    {
        return $this->spectacteVehicle;
    }

    public function setSpectatorMode($spectatorMode)
    {
        $this->spectatorMode = $spectatorMode;
    }

    public function getSpectatorMode()
    {
        return $this->spectatorMode;
    }

    public function setSpectatorStartingView($spectatorStartingView)
    {
        $this->spectatorStartingView = $spectatorStartingView;
    }

    public function getSpectatorStartingView()
    {
        return $this->spectatorStartingView;
    }

    public function setTemporaryVehicleGraphics($temporaryVehicleGraphics)
    {
        $this->temporaryVehicleGraphics = $temporaryVehicleGraphics;
    }

    public function getTemporaryVehicleGraphics()
    {
        return $this->temporaryVehicleGraphics;
    }

    public function setUpSteamRatedKBPS($upSteamRatedKBPS)
    {
        $this->upSteamRatedKBPS = $upSteamRatedKBPS;
    }

    public function getUpSteamRatedKBPS()
    {
        return $this->upSteamRatedKBPS;
    }





}