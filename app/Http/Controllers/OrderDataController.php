<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDataController extends Controller
{
    public function __invoke()
    {
        $m = 5;
        $n = [1,2,3,4,5,6];

        if ($m >= 0 || count($n) >= 0) {
            $lenghtN = count($n);
            
            if ($m == 0) {
                return $n;
            }

            $m = $m % $lenghtN;
    
            $arrayLastNumbers = array_slice($n, -$m);
            $arrayRemainingNumbers = array_slice($n, 0, $lenghtN - $m);

            return array_merge($arrayLastNumbers, $arrayRemainingNumbers);
        }
    }
}
