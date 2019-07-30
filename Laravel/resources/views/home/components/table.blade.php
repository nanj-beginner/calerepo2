<table id="calendar-table" class="table table-bordered table-striped table-hover">
    <tr>
        @foreach ($param->getSortArray() as $sort)
        @if ($sort == 's_title' && $param->hasDisp('title'))
        <th>タイトル</th>
        @endif
        @if ($sort == 's_description' && $param->hasDisp('description'))
        <th>説明</th>
        @endif
        @if ($sort == 's_start' && $param->hasDisp('start'))
        <th>開始日時</th>
        @endif
        @if ($sort == 's_end' && $param->hasDisp('end'))
        <th>終了日時</th>
        @endif
        @if ($sort == 's_time' && $param->hasDisp('time'))
        <th>時間</th>
        @endif
        @if ($sort == 's_attendee' && $param->hasDisp('attendee'))
        <th>参加者</th>
        @endif
        @if ($sort == 's_location' && $param->hasDisp('location'))
        <th>場所</th>
        @endif
        @endforeach
        <th class="class-th">分類</th>
    </tr>
    @foreach($events as $index => $event)
    <tr>
        @foreach ($param->getSortArray() as $sort)
        @if ($sort == 's_title' && $param->hasDisp('title'))
        <td class="summary">{{$event->getSummary()}}</td>
        @endif
        @if ($sort == 's_description' && $param->hasDisp('description'))
        <td>{{$event->getDescription()}}</td>
        @endif
        @if ($sort == 's_start' && $param->hasDisp('start'))
        <td>{{$event->getStartFormat($param->getFormat())}}</td>
        @endif
        @if ($sort == 's_end' && $param->hasDisp('end'))
        <td>{{$event->getEndFormat($param->getFormat())}}</td>
        @endif
        @if ($sort == 's_time' && $param->hasDisp('time'))
        <td id="time{{$index}}">{{$event->getDiff()}}{{$param->getUnit()}}</td>
        @endif
        @if ($sort == 's_attendee' && $param->hasDisp('attendee'))
        <td>{{$event->getAttendeesName()}}</td>
        @endif
        @if ($sort == 's_location' && $param->hasDisp('location'))
        <td>{{$event->getLocation()}}</td>
        @endif
        @endforeach
        <td class="class-td"><input type="text" id="category{{$index}}" maxlength="30" class="form-control" />
        </td>
    </tr>
    @endforeach
</table>