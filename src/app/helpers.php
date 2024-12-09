<?php

use Carbon\Carbon;

if (!function_exists('fillDays')) {

    function fillDays($collection)
    {
        $result = [];
        $time = Carbon::now();

        $startOfDate = $time->copy()->subMonth(1)->startOfDay();
        $differencesInDay = round($startOfDate->diffInDays($time));

        for ($i = $differencesInDay; $i >= 0; $i--) {
            $x = date('Y-m-d', strtotime('-' . $i . 'days'));
            // $jalali = jdate($x)->format('%m-%d');

            $categories = $collection->has($x) ? count($collection[$x]) : 0;

            $result[] = [
                'date'       => $x,
                'categories' => $categories
            ];
        }

        $data = [
            'categories' => array_column($result, 'categories'),
            'date'       => array_column($result, 'date'),
        ];
    
        return $data;
    }
}