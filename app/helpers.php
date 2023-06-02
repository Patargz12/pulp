<?php

use App\Models\Appointment;

if (!function_exists('isBooked')) {
    function isBooked($scheduleId, $timeSlot)
    {
        return Appointment::where('schedule_id', $scheduleId)
            ->where('time', $timeSlot)
            ->exists();
    }
}
