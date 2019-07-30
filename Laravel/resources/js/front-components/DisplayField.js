export default class DisplayField {


  constructor() {
    this.items = ['d_title', 'd_description', 'd_start',
                  'd_end', 'd_time', 'd_attendee', 'd_location'];

    this.orders = ['s_title', 's_description', 's_start',
                    's_end', 's_time', 's_attendee', 's_location'];

    this.setDispChangeEvent();
  }

  convertToId (target) {
    return target.slice(0, 1) === '#' ? target : "#" + target;
  }

  getOrderName (index) {
    return this.orders[index];
  }

  check (id, checked) {
    $(this.convertToId(id)).prop("checked", checked);
  }

  show (id, show) {
    if (show) {
      $(this.convertToId(id)).show();
    } else {
      $(this.convertToId(id)).hide();
    }
  }

  checked (id) {
    return $(this.convertToId(id)).prop("checked");
  }

  checkedAtLeastOne () {
    let flg = false;

    for (const val of this.items) {
      if ($("#" + val).prop("checked")) {
        flg = true;
        break;
      }
    }

    return flg;
  }

  setDispChangeEvent () {
    $("#d_title").change(() => this.show("#s_title", $("#d_title").prop("checked")));

    $("#d_description").change(() => this.show("#s_description", $("#d_description").prop("checked")));

    $("#d_start").change(() => this.show("#s_start", $("#d_start").prop("checked")));

    $("#d_end").change(() => this.show("#s_end", $("#d_end").prop("checked")));

    $("#d_time").change(() => this.show("#s_time", $("#d_time").prop("checked")));

    $("#d_attendee").change(() => this.show("#s_attendee", $("#d_attendee").prop("checked")));

    $("#d_location").change(() => this.show("#s_location", $("#d_location").prop("checked")));
  }
}
