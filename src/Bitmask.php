<?php

namespace PhoenixRVD\Bitmask;

class Bitmask
{
    /**
     * @var int
     */
    private $intMask;

    public function __construct(int $initialValue = 0)
    {
        $this->intMask = $initialValue;
    }

    public function on(int ...$bitNumbers): self
    {
        $this->intMask |= $this->bitNumbersToInt($bitNumbers);

        return $this;
    }

    private function bitNumbersToInt(array $bitNumbers): int
    {
        $result = 0;

        foreach ($bitNumbers as $bit) {
            $result += $this->bitNumberToInt($bit);
        }

        return $result;
    }

    private function bitNumberToInt(int $bitNumber): int
    {
        return 1 << $bitNumber;
    }

    public function off(int ...$bitNumbers): self
    {
        $this->intMask &= (~$this->bitNumbersToInt($bitNumbers));

        return $this;
    }

    public function isOff(int $bitNumber): bool
    {
        return !$this->isOn($bitNumber);
    }

    public function isOn(int $bitNumber): bool
    {
        $intValue = $this->bitNumberToInt($bitNumber);

        return ($this->intMask & $intValue) === $intValue;
    }

    public function toInt(): int
    {
        return $this->intMask;
    }

    public function __toString()
    {
        return (string) $this->intMask;
    }
}
