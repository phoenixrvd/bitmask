<?php

namespace PhoenixRVD\Bitmask;

class BitmaskFactory
{

    public function fromInt(int $bitMask): Bitmask
    {
        return new Bitmask($bitMask);
    }

}