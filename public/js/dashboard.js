$(document).ready(function () {
  $.ajax({
    url: '/getDailyDemands',
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
  $.ajax({
    url: '/getAppDemandCountList',
    type: 'GET',
    async: true,
    dataType: 'json',
    success: function (data) {
        console.log(data);
        data.forEach((element,key) => {
            data[key].y= parseFloat(element.y);
        });
      drawAppDemandPieChart(data);
    },
  });
});

function drawChart(data) {
    Highcharts.chart('baseLine', {
        title: {
            text: 'Günlük Toplam Talep Sayısı'
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
        chart: {
            type: 'line'
        },
        series: [{
            data: data.yAxis,
            name:"Toplam talep"
        }]
    });
}

function drawAppDemandPieChart(data) {
    Highcharts.chart('pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Uygulamaya Düşen Toplam Talep Sayısı'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Uygulama',
            colorByPoint: true,
            data: data
        }]
    });
 }
