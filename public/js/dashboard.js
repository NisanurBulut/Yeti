$(document).ready(function () {
  $.ajax({
    url: '/getDaiylDemands',
    type: 'GET',
    async: true,
    dataType: 'json',
    success: function (data) {
      data.yAxis.forEach((element,key) => {
          data.yAxis[key]= parseFloat(element);
      });
      drawChart(data);
    },
  });
});

function drawChart(data) {
    Highcharts.chart('baseLine', {
        title: {
            text: ''
        },
        subtitle: {
            text: 'Kaynak: Yeti talep listesi'
        },

        yAxis: {
            title: {
                text: 'Toplam talep sayısı'
            }
        },
        xAxis: {
            categories: data.xAxis
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        chart: {
            type: 'line'
        },
        series: [{
            data: data.yAxis,
            name:"Toplam talep"
        }]
    });
}
