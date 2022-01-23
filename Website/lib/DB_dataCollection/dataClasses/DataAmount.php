<?php

namespace DB_dataCollection\DataAmount;

use JsonSerializable;

class DataAmount implements JsonSerializable
{

    public function __construct(string $year, array $monthlyAmount)
    {
        $this->year = $year;
        $this->monthlyAmount = $monthlyAmount;
    }


    public function jsonSerialize()
    {
        return [
            $this->year => $this->monthlyAmount,
        ];
    }
}
