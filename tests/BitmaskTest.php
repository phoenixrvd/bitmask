<?php

namespace PhoenixRVD\Bitmask;

use PHPUnit\Framework\TestCase;

class BitmaskTest extends TestCase
{

    /**
     * @var BitmaskFactory
     */
    private $bitmaskFactory;

    public function setUp()
    {
        $this->bitmaskFactory = new BitmaskFactory();
        parent::setUp();
    }

    public function testBitManipulations()
    {
        $bitmask = $this->bitmaskFactory->fromInt(7);

        $this->assertTrue($bitmask->isOn(2));
        $this->assertTrue($bitmask->off(1, 0)->isOff(1));
        $this->assertEquals(4, $bitmask->toInt());
        $this->assertEquals(5, $bitmask->on(0)->toInt());

        $this->assertEquals('test 5', "test $bitmask");
    }
}
