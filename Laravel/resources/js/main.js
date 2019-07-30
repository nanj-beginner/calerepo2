// 0 YYYY/mm/DD HH:MM
// 1 YYYY年mm月DD HH時MM分
// 2 HH:MM
// 3 HH時MM分
const data_format = (datetime,format) => {
  d = datetime
  if (format == '1') {
    d = d.replace("/", "年").replace("/", "月").replace(" ", "日 ").replace(":", "時") + "分"
  } else if (format == '2') {
    sp = d.split(" ")
    d = sp[1]
  } else if (format == '3') {
      sp = d.split(" ")
      d = sp[1].replace(":","時") + "分"
  }
  return d;
}

$(() => {
  // initialize.
  const formItem = new FormItem();
  const categorize = new Categorize();
  // Caution! THE EVENTS MUST BE SET BEFORE EXECUTING MAIN.JS.
  const pieChart = new PieChart(events);
});
