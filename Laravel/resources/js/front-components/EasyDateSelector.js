export default class EasyDateSelector {
  constructor() {
    this.now = new Date();

    this.start = "";
    this.e = "";

    this.setSelectChangeEvent();
  }

  setSelectChangeEvent() {
    const selectElelment = document.querySelector('#select_date');

    selectElelment.addEventListener('change', (e) => {
      const target = e.target.value;

      // return null if falsy value comes into #select_date.
      if (! target) {
        return ;
      }

      switch (target){
        case 'lastmonth':
          this.setLastMonth();
          break;
        case 'yesterday':
          this.setYesterday();
          break;
        case 'today':
          this.setToday();
          break;
        case 'thismonth':
          this.setThisMonth();
          break;
        case 'tomorrow':
          this.setTomorrow();
          break;
        case 'nextmonth':
          this.setNextMonth();
          break;
        default:
          return;
      }

      // switch文内でthis.start, this.eに値を代入しておく
      document.querySelector('#datetimepicker1').value = this.start;
      document.querySelector('#datetimepicker2').value = this.end;
    });
  }

  zeroPad(data) {
    if (data < 10) {
      return "0" + data;
    } else {
      return data;
    }
  }

  setLastMonth() {
    const lastMonth = new Date(this.now.getFullYear(), (this.now.getMonth() - 1), 1);

    this.start = lastMonth.getFullYear() + "/" + this.zeroPad(lastMonth.getMonth() + 1) + "/01 00:00";
    this.end = this.now.getFullYear() + "/" + this.zeroPad(this.now.getMonth() + 1) + "/01 00:00";
  }

  setYesterday() {
    const yesterday = new Date(this.now.getFullYear(), this.now.getMonth(), (this.now.getDate() - 1));

    this.start = yesterday.getFullYear() + "/" + this.zeroPad(yesterday.getMonth() + 1) + "/" + this.zeroPad(yesterday.getDate()) + " 00:00";
    this.end = this.now.getFullYear() + "/" + this.zeroPad(this.now.getMonth() + 1) + "/" + this.zeroPad(this.now.getDate()) + " 00:00";
  }

  setToday() {
    const tomorrow = new Date(this.now.getFullYear(), this.now.getMonth(), (this.now.getDate() + 1));

    this.start = this.now.getFullYear() + "/" + this.zeroPad(this.now.getMonth() + 1) + "/" + this.zeroPad(this.now.getDate()) + " 00:00";
    this.end = tomorrow.getFullYear() + "/" + this.zeroPad(tomorrow.getMonth() + 1) + "/" + this.zeroPad(tomorrow.getDate()) + " 00:00";
  }

  setThisMonth() {
    const nextMonth = new Date(this.now.getFullYear(), (this.now.getMonth() + 1), this.now.getDate());

    this.start = this.now.getFullYear() + "/" + this.zeroPad(this.now.getMonth() + 1) + "/01" + " 00:00";
    this.end = nextMonth.getFullYear() + "/" + this.zeroPad(nextMonth.getMonth() + 1) + "/01 00:00";
  }

  setTomorrow() {
    const tomorrow = new Date(this.now.getFullYear(), this.now.getMonth(), (this.now.getDate() + 1));
    const dayafter = new Date(this.now.getFullYear(), this.now.getMonth(), (this.now.getDate() + 2));

    this.start = tomorrow.getFullYear() + "/" + this.zeroPad(tomorrow.getMonth() + 1) + "/" + this.zeroPad(tomorrow.getDate()) + " 00:00";
    this.end = dayafter.getFullYear() + "/" + this.zeroPad(dayafter.getMonth() + 1) + "/" + this.zeroPad(dayafter.getDate()) + " 00:00";
  }

  setNextMonth() {
    const nextMonth = new Date(this.now.getFullYear(), (this.now.getMonth() + 1), this.now.getDate());
    const month2 = new Date(this.now.getFullYear(), (this.now.getMonth() + 2), this.now.getDate());

    this.start = nextMonth.getFullYear() + "/" + this.zeroPad(nextMonth.getMonth() + 1) + "/01 00:00";
    this.end = month2.getFullYear() + "/" + this.zeroPad(month2.getMonth() + 1) + "/01 00:00";
  }
}
