<div class="col-sm-12">
  <h3 class="calendar-header">{{$primary->getSummary()}}</h3>
</div>
<label for="id" class="col-sm-2 control-label required">カレンダー</label>
<div class="col-sm-10">
  @foreach ($calendars as $calendar)
    @if ($param->isEqualId($calendar->getId()))
      <input type="radio" name="calendar[id]" value="{{$calendar->getId()}}" checked required="true" id="{{$calendar->getId()}}" />
    @else
      <input type="radio" name="calendar[id]" value="{{$calendar->getId()}}" required="true"  id="{{$calendar->getId()}}"/>
    @endif
    <label for="{{$calendar->getId()}}" style="background-color:{{$calendar->getBackgroundColor()}}">
      {{$calendar->getSummary()}}
    </label>
  @endforeach
</div>