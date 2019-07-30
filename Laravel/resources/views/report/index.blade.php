@extends('layouts.master')

@section('content')

<div class="col-xs-2 left">
</div>
<div class="col-xs-8 main">
    @if ($calendars)
    <form action="/report" class="form-horizontal form" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            @include('home.components.conditions.calendars')
        </div>
        <div class="form-group">
            @include('home.components.conditions.date-select')
        </div>
        <div class="form-group">
            @include('home.components.conditions.search-query')
        </div>
        <div class="form-group">
            @include('home.components.conditions.display-items')
        </div>
        <div class="form-group">
            @include('home.components.conditions.display-orders')
        </div>
        <div class="form-group">
            @include('home.components.conditions.date-format')
            @include('home.components.conditions.date-unit')
        </div>
        <div class="form-group">
            <label for="empty" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <button type="submit" name="commit" value="{{App\Enums\DisplayType::Table}}" class="btn btn-primary" id="tbl-btn"
                    data-disable-with="表を表示">表を表示</button>
                <button type="submit" name="commit" value="{{App\Enums\DisplayType::Csv}}" class="btn btn-primary" id="csv-btn"
                    data-disable-with="CSV出力">CSV出力</button>
            </div>
        </div>
    </form>
    @endif
    <hr />
    @if ($events)
    @include('home.components.setting-script')
    <div class="row">
        <div class="col-sm-12 for-table">
            <h3 id="all-result">出力結果</h3>
            @if ($param->isTableType())
            @include('home.components.table')
            @include('home.components.categorize')
            @endif
            @if ($param->isCsvType())
            <label for="export-textarea" class="col-sm-2 control-label"></label>
            @endif
            <hr />
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            @if (session('notice'))
            {{session('notice')}}
            @endif
        </div>
    </div>
    @endif
</div>
<div class="col-xs-2 right adv-div">
</div>
@endsection

@section('before-script')
<script>
const submit_type = "{{$param->getType()}}"
const events = @json($eventsForPieChart);
</script>
@endsection
