<?php

namespace App\Services;

use Google_Service_Calendar;
use Google_Client;
use Carbon\Carbon;

class GoogleCalendar extends Google_Service_Calendar
{
    const FORMAT = 'Y-m-d\TH:i:00+09:00';

    /**
     * @var array
     */
    private $list;

    private $primary;

    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->list = $this->calendarList->listCalendarList()->getItems();
        $this->primary = array_first($this->list, function ($value) {
            return $value->getPrimary() === true;
        });
    }

    public function getList()
    {
        return $this->list;
    }

    public function getPrimary()
    {
        return $this->primary;
    }

    public function searchEvents(?string $id, ?string $start, ?string $end, ?string $q)
    {
        $options = [
            'timeMin' => $this->convDateFormat($start),
            'timeMax' => $this->convDateFormat($end),
            'q' => $q,
            'orderBy' => 'startTime',
            'singleEvents' => true,
        ];

        // Get events.
        $results = $this->events->listEvents($id, $options)->getItems();

        $events = [];
        // Modify event data for display.
        foreach ($results as $data) {
            $events[] = new CalendarEvent([
                'summary' => $data->getSummary(),
                'location' => $data->getLocation(),
                'description' => $data->getDescription(),
                'start' => $data->getStart(),
                'end' => $data->getEnd(),
                'attendees' => $data->getAttendees(),
            ]);
        }

        return  $events;
    }

    private function convDateFormat($date)
    {
        return (new Carbon($date))->format(self::FORMAT);
    }
}
