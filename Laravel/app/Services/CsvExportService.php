<?php

namespace App\Services;

use App\Http\SearchParam;

class CsvExportService
{
    private $param;
    private $events;
    private $data;
    private $headers = [
        'title' => 'タイトル',
        'description' => '説明',
        'start' => '開始日時',
        'end' => '終了日時',
        'time' => '時間',
        'attendee' => '参加者',
        'location' => '場所',
    ];

    public function __construct(SearchParam $param, array $events)
    {
        $this->param = $param;
        $this->events = $events;
    }

    public function run()
    {
        $this->create();

        return $this->data;
    }

    public function create()
    {
        $stream = fopen('php://temp', 'r+b');
        try {
            $filteredHeaders = array_where($this->headers, function ($english, $japanese) {
                return $this->param->hasDisp($english);
            });
            fputcsv($stream, array_values($filteredHeaders));
            foreach ($this->events as $event) {
                fputcsv($stream, $this->createLine($event));
            }
            rewind($stream);
            $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
            $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
            $this->data = $csv;
        } finally {
            fclose($stream);
        }
    }

    private function createLine($event)
    {
        $line = [];
        foreach ($this->headers as $english => $japanese) {
            if ($this->param->hasDisp($english)) {
                $line[] = $this->getEventValueByJapanese($event, $japanese);
            }
        }

        return $line;
    }

    private function getEventValueByJapanese($event, $japanese)
    {
        if ($japanese == 'タイトル') {
            return $event->getSummary();
        } elseif ($japanese == '説明') {
            return $event->getDescription();
        } elseif ($japanese == '開始日時') {
            return $event->getStartFormat($this->param->getFormat());
        } elseif ($japanese == '終了日時') {
            return $event->getEndFormat($this->param->getFormat());
        } elseif ($japanese == '時間') {
            return $event->getDiff();
        } elseif ($japanese == '参加者') {
            return $event->getAttendeesName();
        } elseif ($japanese == '場所') {
            return $event->getLocation();
        } else {
            return '';
        }
    }
}
