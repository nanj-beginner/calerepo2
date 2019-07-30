export default class Storage {
  constructor() {
    this.s = window.localStorage ? window.localStorage : null;
  }

  available () {
    return this.s !== null;
  }

  unavailable () {
    return !this.available();
  }

  set (name, value) {
    this.s.setItem(name, value);
  }

  get (name) {
    return this.s.getItem(name);
  }

  has (name) {
    return this.s.getItem(name) !== null && this.s.getItem(name) !== 'null';
  }
}
