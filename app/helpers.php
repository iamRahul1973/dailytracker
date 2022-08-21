<?php

if (! function_exists('minutes_to_hours')) {
    function minutes_to_hours($mins)
    {
        return intdiv($mins, 60) . ':' . ($mins % 60);
    }
}
