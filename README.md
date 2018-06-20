# Bitmask

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Example](#example)
- [Testing](#testing)
- [Copyright and license](#copyright-and-license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

In PHP a number is (mostly) 4 Bytes long. This means that one number actually uses 32 bits of the internal storage.

In this case 32 boolean values can be stored as single integer.  The problem ist a 'magic numbers'.

## Example

Without this API [before.php](examples/before.php)

```php
<?php

class StateMap {
    const OPTION_1 = 1;
    const OPTION_2 = 2;
    const OPTION_4 = 4;
    // What is next ????
}

// Check for Active Feature
$activeFeatures = 6;

if(($activeFeatures & StateMap::OPTION_1) === StateMap::OPTION_1){
    // Do this
}

if(($activeFeatures & StateMap::OPTION_2) !== StateMap::OPTION_2) {
    // Do this
}

// Activation and deactivation from options ist not 'Human Readable'.
```

With this API  [after.php](examples/after.php)

```php
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

if($activeFeatures->isOff(StateMap::OPTION_2)) {
    // Do that
}

// Activate options
$activeFeatures->on(StateMap::OPTION_5, StateMap::OPTION_6);

// Deactivate options
$activeFeatures->on(StateMap::OPTION_4, StateMap::OPTION_1);
```

## Testing

```bash
composer bitmask:test
```

## Copyright and license

Code released under the [MIT License](LICENSE). 