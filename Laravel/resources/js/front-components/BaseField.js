export default class BaseField {
  constructor (itemName) {
    this.item = $("#" + itemName);
  }

  get () {
    return this.item.val();
  }

  set (value) {
    this.item.val(value);
  }
}
