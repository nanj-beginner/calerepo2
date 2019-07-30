import Storage from "./front-components/Storage";

export default class Categorize {

  constructor() {
    this.s = new Storage();

    this.setDefaultCategories();

    $('.class-th').hide();
    $('.class-td').hide();

    $("#toggle-class").click(() => {
      if ($(".class-th").is(':visible')) {
        $(".class-th").hide();
        $(".class-td").hide();
        $("#collapse-categorize").hide();
      } else {
        $(".class-th").show()
        $(".class-td").show()
        $("#collapse-categorize").show();
      }
    });

    $("#category-set").click(() => {
      if(!$("#target-category").val() || !$("#target-title").val()) {
        return false
      }
      $("#registered").empty();
      this.setCategories($("#target-title").val(), $("#target-category").val(), true);
      this.setDefaultCategories();
      $("#target-title").val("");
      $("#target-category").val("");
    });
  }

  setCategories (title, string, toSession) {
    const reg = new RegExp(title);
    if (toSession) {
      this.setCategoryToSession(title, string);
    }

    let i = 0;
    for (const tdSummary of $("#calendar-table tr td.summary")) {
      const target = "#category" + i;
      const summary = $(tdSummary).html();
      if (summary.match(reg)) {
          $(target).val(string);
      }
      i++;
    }
  }

  setCategoryToSession (title, string) {
    if (this.s.unavailable()) {
      return;
    }
    let categories = [];
    let data = {};
    data[title] = string;
    if (this.s.has("categories")) {
      categories = JSON.parse(this.s.get("categories"));
    }
    categories.push(data);

    this.s.set("categories", JSON.stringify(categories));
  }

  setDefaultCategories () {
    if (this.s.unavailable()) {
      return;
    }
    if (!this.s.has("categories")) {
      return;
    }

    const categories = JSON.parse(this.s.get("categories"))

    if (categories.length > 0) {
      let i = 0;
      for (const data of categories) {
        const key = Object.keys(data);
        this.setCategories(String(key), data[key], false);
        i++;
      }
    }
  }
}
