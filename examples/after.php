<?php

class StateMap {
    const OPTION_1 = 0;
    const OPTION_2 = 1;
    const OPTION_4 = 2;
    const OPTION_5 = 3;
    const OPTION_6 = 4;
}

// Check for Active Feature
$activeFeatures = (new \PhoenixRVD\Bitmask\BitmaskFactory())->fromInt(6);

if($activeFeatures->isOn(StateMap::OPTION_1)){
    // Do this
}

if($activeFeatures->isOff(StateMap::OPTION_2)){
    // Do that
}

// Activate options
$activeFeatures->on(StateMap::OPTION_5, StateMap::OPTION_6);

// Deactivate options
$activeFeatures->on(StateMap::OPTION_4, StateMap::OPTION_1);

// Output of new value
echo $activeFeatures;