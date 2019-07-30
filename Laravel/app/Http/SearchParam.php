<?php

namespace App\Http;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Enums\DisplayType;

class SearchParam
{
    const DISPLAY_FORMAT = 'Y/m/d H:i';
    private $id;
    private $start;
    private $end;
    private $query;
    private $format;
    private $unit;
    private $sort;
    private $type;
    private $disp;

    public static function withId(string $id)
    {
        $instance = new static();
        $instance->id = $id;
        $instance->start = Carbon::now()->format(self::DISPLAY_FORMAT);
        $instance->end = Carbon::now()->addDay()->format(self::DISPLAY_FORMAT);
        $instance->type = DisplayType::Table;

        return $instance;
    }

    public static function withRequest(Request $request)
    {
        $instance = new static();

        foreach ($request->input('calendar') as $key => $param) {
            $instance->$key = $param;
        }

        $instance->type = $request->input('commit');

        return $instance;
    }

    public function isEqualId(string $id)
    {
        return $this->id === $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getQuery()
    {
        return $this->query ? $this->query : '';
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function getFormat()
    {
        switch ($this->format) {
            case '0': $format = 'Y/m/d H:i'; break;
            case '1': $format = 'Y年m月d日 H時i分'; break;
            case '2': $format = 'H:i'; break;
            case '3': $format = 'H時i分'; break;
            case '4': $format = 'Y/m/d'; break;
            case '5': $format = 'Y年m月d日'; break;
            default: $format = self::DISPLAY_FORMAT;
        }

        return $format;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isTableType()
    {
        return $this->type == DisplayType::Table;
    }

    public function isTextType()
    {
        return $this->type == DisplayType::Text;
    }

    public function isCsvType()
    {
        return $this->type == DisplayType::Csv;
    }

    public function getSortArray()
    {
        return explode(',', $this->sort);
    }

    public function hasDisp(string $id)
    {
        return array_has($this->disp, $id);
    }
}
