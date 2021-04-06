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
            text: 'Günlük toplam talep sayısı gösterimi'
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


Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
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
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Other',
            y: 7.05
        }]
    }]
});