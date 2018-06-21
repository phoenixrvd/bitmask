<?php

class StateMap
{
    const OPTION_1 = 1;
    const OPTION_2 = 2;
    const OPTION_4 = 4;
    // What is next ????
}

// Check for Active Feature
$activeFeatures = 6;

if (($activeFeatures & StateMap::OPTION_1) === StateMap::OPTION_1) {
    // Do this
}

if (($activeFeatures & StateMap::OPTION_2) !== StateMap::OPTION_2) {
    // Do this
}

// Activation and deactivation from options ist not 'Human Readable'.
