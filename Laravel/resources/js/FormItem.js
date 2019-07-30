import SortableField from "./front-components/SortableField";
import DisplayField from "./front-components/DisplayField";
import DatetimeField from "./front-components/DatetimeField";
import BaseField from "./front-components/BaseField";
import Storage from "./front-components/Storage";
import EasyDateSelector from "./front-components/EasyDateSelector";

export default class FormItem {

  constructor() {
    this.s = new Storage();
    this.events = [];
    this.sortableField = new SortableField();
    this.dispField = new DisplayField();
    this.datetimeField = new DatetimeField();
    this.unitField = new BaseField('unit');
    this.formatField = new BaseField('format');
    this.easyDateSelector = new EasyDateSelector();
    this.initBySavedData();
    this.initButtonEvent("#tbl-btn");
    this.initButtonEvent("#text-btn");
    this.initButtonEvent("#csv-btn");

    $("#csv-btn").click(() => {
      $('form').attr('action', '/download');
    });
  }

  // Set values extracted from window.localStorage.
  initBySavedData() {
    if (this.s.unavailable()) {
      return;
    }

    this.dispField.items.forEach((val, i) => {
      const storageItem = this.s.get(val);
      const showTarget = storageItem === null ? true : storageItem === "true";
      this.dispField.check(val, showTarget);
      this.dispField.show(this.dispField.getOrderName(i), showTarget);
    });

    if (this.s.has("sort")) {
      const sorts = this.s.get("sort").split(',').reverse();

      for (const val of sorts) {
        $("#" + val).prependTo(this.sortableField.id);
      }
    }

    if (this.s.has("format")) {
      this.formatField.set(this.s.get("format"));
    } else {
      this.formatField.set(0);
    }

    this.unitField.set(this.s.get("unit"));
  }

  // Save values in window.localStrage.
  saveData() {
    if (this.s.unavailable()) {
      return;
    }

    for (const val of this.dispField.items) {
      this.s.set(val, this.dispField.checked(val));
    }

    this.s.set("unit", this.unitField.get());
    this.s.set("format", this.formatField.get());
    this.s.set("sort", this.sortableField.toArray());
  }

  hasInputError() {
    if (this.datetimeField.exceedDay(365)) {
      alert("カレンダーの範囲期間は1年未満で入力してください。");
      return true;
    }

    if (! this.dispField.checkedAtLeastOne()) {
      alert("表示項目は最低１つチェックをしてください。");
      return true;
    }

    return false;
  }

  initButtonEvent(target) {
    $(target).click(() => {
      if (this.hasInputError()) {
        return false;
      }

      this.sortableField.setHiddenField();
      this.saveData();
    });
  }
}
