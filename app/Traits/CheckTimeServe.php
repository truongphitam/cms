<?php

namespace App\Traits;

use Carbon\Carbon;

trait CheckTimeServe
{
    /**
     * Check service time
     *
     * @return bool
     */
    protected function checkTimeServe()
    {
        if (config('app.env') !== 'production') {
            return TRUE;
        }

        $start = Carbon::today()->addMinutes((int) config('cart.time_checkout.start') * 60);
        $end = Carbon::today()->addMinutes((int) config('cart.time_checkout.end') * 60);
        
//        return Carbon::now()->between($start, $end);
        return false; // Stop serve for now
    }
}