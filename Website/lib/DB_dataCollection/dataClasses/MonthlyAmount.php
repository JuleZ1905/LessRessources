<?php

namespace DB_dataCollection\MonthlyAmount;

use JsonSerializable;

class MonthlyAmount implements JsonSerializable
{

    public function __construct(string $month, int $amount)
    {
        $this->month = $month;
        $this->amount = $amount;
    }


    public function jsonSerialize()
    {
        return [
            $this->month => $this->amount
        ];
    }
}
