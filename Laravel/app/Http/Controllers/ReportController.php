<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\SearchParam;
use App\Services\CsvExportService;
use App\Services\GoogleClient;
use App\Services\GoogleCalendar;

class ReportController extends Controller
{
    /**
     * Google Calendar.
     *
     * @var App\Services\GoogleCalendar
     */
    private $service;

    public function __construct(GoogleClient $client)
    {
        $this->middleware(function ($request, $next) use ($client) {
            $client->setToken($request);
            $this->service = new GoogleCalendar($client);

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $param = SearchParam::withId($this->service->getPrimary()->getId());

        return view('report.index')->with([
            'events' => null,
            'eventsForPieChart' => $this->createEventsForPieChart(null),
            'primary' => $this->service->getPrimary(),
            'calendars' => $this->service->getList(),
            'param' => $param,
        ]);
    }

    public function display(Request $request)
    {
        $param = SearchParam::withRequest($request);

        $events = $this->service->searchEvents(
            $param->getId(),
            $param->getStart(),
            $param->getEnd(),
            $param->getQuery()
        );

        if (empty($events)) {
            $request->session()->flash('notice', '表示するデータがありません。');
        }

        return view('report.index')->with([
            'events' => $events,
            'eventsForPieChart' => $this->createEventsForPieChart($events),
            'primary' => $this->service->getPrimary(),
            'calendars' => $this->service->getList(),
            'param' => $param,
        ]);
    }

    public function download(Request $request)
    {
        $param = SearchParam::withRequest($request);

        $events = $this->service->searchEvents(
            $param->getId(),
            $param->getStart(),
            $param->getEnd(),
            $param->getQuery()
        );

        $exportService = new CsvExportService($param, $events);
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=data.csv',
        );

        return Response::make($exportService->run(), 200, $headers);
    }

    private function createEventsForPieChart(?array $events)
    {
        $forCharts = [];
        if (empty($events)) {
            return $forCharts;
        }

        foreach ($events as $event) {
            $params = [
                'time' => $event->getDiff(),
            ];
            array_push($forCharts, $params);
        }

        return $forCharts;
    }
}
