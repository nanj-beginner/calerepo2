<label for="start" class="col-sm-2 control-label required">開始</label>
<div class="col-sm-3">
  <input type="text" name="calendar[start]" id="datetimepicker1" class="form-control" required="true" value="{{$param->getStart()}}" maxlength="16" >
</div>
<label for="end" class="col-sm-1 control-label required">終了</label>
<div class="col-sm-3">
  <input type="text" name="calendar[end]" id="datetimepicker2" class="form-control" required="true" value="{{$param->getEnd()}}" maxlength="16" >
</div>
<div class="col-sm-3">
  <select id="select_date" class="form-control">
    <option value="">日付を簡単指定</option>
    <option value="lastmonth">先月</option>
    <option value="yesterday">昨日</option>
    <option value="today">今日</option>
    <option value="thismonth">今月</option>
    <option value="tomorrow">明日</option>
    <option value="nextmonth">来月</option>
  </select>
</div>