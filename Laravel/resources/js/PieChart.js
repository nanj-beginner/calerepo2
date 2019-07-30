export default class PieChart {

  constructor (events) {
    this.events = events;
    this.dataPoints = [];
    this.chart = null;

    $("#show_graph").click(() => {
      if (this.events !== null && this.events.length > 0) {
        this.showChart();
      }
    });
  }

  // Main work flow.
  showChart () {
    this.setOthers();
    this.createDataPoints();
    this.createChart();
    this.renderChart();
  }

  // set others category if the category is null or empty.
  setOthers () {
    let i = 0;
    for (const event of events) {
      if ($(`#category${i}`).val() === null || $(`#category${i}`).val() === "") {
        $(`#category${i}`).val("その他");
      }
      i++;
    }
  }

  createDataPoints () {
    let i = 0;
    for (const event of events) {
      const c_target = "#category" + i;
      if (this.existsDataPoint(this.dataPoints, $(c_target).val())) {
        const index = this.getDataPointIndex(this.dataPoints, $(c_target).val());
        this.dataPoints[index].sum += Number(event.time);
      } else {
        const data = {
          y: 0,
          sum: Number(event.time),
          indexLabel: $(c_target).val() + " " + "#percent%",
          legendText: $(c_target).val(),
        }
        this.dataPoints.push(data);
      }
      i++;
    }
    const total = this.dataPoints.reduce((t, d) => t + d.sum, 0);
    for (const d of this.dataPoints) {
      d.indexLabel += " (" + d.sum + ")";
      d.y = d.sum / total;
    }
    this.dataPoints.sort(this.compareDataPoint);
  }

  createChart () {
    this.chart = new CanvasJS.Chart("chartContainer", {
      title: {
        text: $('input[name="calendar[start]"]').val()+ "-" + $('input[name="calendar[end]"]').val(),
      },
      animationEnabled: true,
      data: [{
        type: "pie",
        startAngle: 270,
        toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>",
        showInLegend: true,
        explodeOnClick: true,
        dataPoints: this.dataPoints,
      }]
    })
  }

  renderChart () {
    this.chart.render();
  }

  existsDataPoint = (dataPoints, string) => {
    if (dataPoints.length > 0) {
      for (const d of dataPoints) {
        if (d.legendText === string)
          return true;
      }
    } else {
      return false;
    }
    return false;
  }

  getDataPointIndex = (dataPoints, string) => {
    let i = 0;
    for (const d of dataPoints) {
      if (d.legendText === string) {
        return i;
      }
      i++;
    }
  }

  compareDataPoint = (a, b) => {
    if (a.y < b.y) {
      return 1;
    }
    if (a.y > b.y) {
      return -1;
    }
    return 0;
  }
}
