export default class SortableField {
  constructor() {
    this.item = $("#sortable");
    this.id = "#sortable";

    this.item.sortable();
    this.item.disableSelection();

    // Add hidden input field to the form.
    const hidden_sort = $('<input>').attr({
      type: 'hidden',
      id: 'hidden_sort',
      name: 'calendar[sort]',
    });

    $('form').append(hidden_sort);
  }

  toArray () {
    return this.item.sortable("toArray");
  }

  setHiddenField () {
    $("#hidden_sort").val(this.toArray());
  }
}
