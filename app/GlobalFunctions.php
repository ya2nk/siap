<?php

function hoursToMinutes($hours)
{
    $minutes = 0;
    if (strpos($hours, ':') !== false)
    {
        // Split hours and minutes.
        list($hours, $minutes) = explode(':', $hours);
    }
    return $hours * 60 + $minutes;
}
function minutesToHours($minutes)
{
    $hours = (int)($minutes / 60);
    $minutes -= $hours * 60;
    if($hours >= 24){
      $hours = $hours-24;
    }
    return sprintf("%d:%02.0f", $hours, $minutes);
}

function getTime($time){
    $h = floor($time/3600);
    $m = floor(($time % 3600) /60);
    $s = $time % 60;
    $h = $h < 10 ? '0'.$h : $h;
    $m = $m < 10 ? '0'.$m : $m;
    $s = $s < 10 ? '0'.$s : $s;
    return $h.':'.$m.':'.$s;
}