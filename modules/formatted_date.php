<?php

if (!function_exists('get_formatted_date')) {
    function get_formatted_date(string $date)
    {
        $dateTimeObj = new DateTime($date, new DateTimeZone('Asia/Jakarta'));

        // Timestamp for October 3, 2023
        $dateFormatted = IntlDateFormatter::formatObject(
            $dateTimeObj,
            'eeee, d MMMM y',
            'id'
        );

        // Format the date into the desired format
        return $dateFormatted;
    }
}
