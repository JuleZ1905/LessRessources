<?php

use DB_dataCollection\DataAmount\DataAmount;
use DB_dataCollection\MonthlyAmount\MonthlyAmount;

require_once 'dataClasses/DataAmount.php';
require_once 'dataClasses/MonthlyAmount.php';

class Seeder
{

    public static function seed()
    {

        $sql = 

    
        $data[] = new DataAmount(2019, [
            new MonthlyAmount("Januar", 45670),
            new MonthlyAmount("Februar", 6590),
            new MonthlyAmount("März", 3072),
        ]);
        
        $data[] = new DataAmount(2020, [
            new MonthlyAmount("Januar", 45670),
            new MonthlyAmount("Februar", 6590),
            new MonthlyAmount("März", 3072),
        ]);

        return $data;
    }
}
