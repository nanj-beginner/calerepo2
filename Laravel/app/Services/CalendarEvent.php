<?php

namespace App\Services;

use Google_Service_Calendar_Event;
use Carbon\Carbon;

class CalendarEvent extends Google_Service_Calendar_Event
{
    public function getDesc()
    {
        $description = $this->getDescription();
        $description = str_replace("\n", '', $description);
        $description = str_replace('"', "'", $description);

        return $description;
    }

    public function getStartFormat($format = 'Y/m/d H:i')
    {
        $date = new Carbon($this->getStart()->getDateTime());

        return $date->format($format);
    }

    public function getEndFormat($format = 'Y/m/d H:i')
    {
        $date = new Carbon($this->getEnd()->getDateTime());

        return $date->format($format);
    }

    public function getDiff()
    {
        if ($this->getEnd()) {
            $start = new Carbon($this->getStart()->getDateTime());
            $end = new Carbon($this->getEnd()->getDateTime());

            return sprintf('%.1f', $start->diffInHours($end));
        }

        return '';
    }

    public function getAttendeesName()
    {
        if (!$this->getAttendees()) {
            return '';
        }
        $name = '';
        foreach ($this->getAttendees() as $attendee) {
            if ($attendee->getDisplayName()) {
                $name .= $attendee->getDisplayName().'・';
            }
        }

        return rtrim($name, '・');
    }
}
