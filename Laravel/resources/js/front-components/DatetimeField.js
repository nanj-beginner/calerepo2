export default class DatetimeField {
  constructor () {
    $.datetimepicker.setLocale('ja');

    this.start = $('#datetimepicker1');
    this.end = $('#datetimepicker2');

    this.start.datetimepicker({
      closeOnDateSelect: true,
    });

    this.end.datetimepicker({
      closeOnDateSelect: true,
    });
  }

  exceedDay (day) {
    const startDate = new Date(this.start.val());
    const endDate = new Date(this.end.val());
    const diff = endDate.getTime() - startDate.getTime();

    if (Math.floor(diff / (1000 * 60 * 60 * 24)) > day) {
      return true;
    } else {
      return false;
    }
  }
}
