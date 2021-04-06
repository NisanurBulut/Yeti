Highcharts.ajax({
    url: '/dashboard/getDaiylDemands',
    dataType: 'text',
    success: function(data) {
        console.log(data);
        var lines = data.split('\n');
        lines.forEach(function(line, lineNo) {
            var items = line.split(',');

            // header line containes categories
            if (lineNo == 0) {
                items.forEach(function(item, itemNo) {
                    if (itemNo > 0) options.xAxis.categories.push(item);
                });
            }

            // the rest of the lines contain data with their name in the first position
            else {
                var series = {
                    data: []
                };
                items.forEach(function(item, itemNo) {
                    if (itemNo == 0) {
                        series.name = item;
                    } else {
                        series.data.push(parseFloat(item));
                    }
                });

                options.series.push(series);

            }

        });

        Highcharts.chart('container', options);
    },
    error: function (e, t) {
        console.error(e, t);
    }
});















// Highcharts.chart('baseLine', {
//     title: {
//         text: 'Yıl içindeki günlük veriler'
//     },

//     subtitle: {
//         text: 'Kaynak: Yeti Telep Listesi'
//     },

//     yAxis: {
//         title: {
//             text: 'toplam talep sayısı'
//         }
//     },

//     xAxis: {
//         accessibility: {
//             rangeDescription: ''
//         }
//     },

//     legend: {
//         layout: 'vertical',
//         align: 'right',
//         verticalAlign: 'middle'
//     },

//     plotOptions: {
//         series: {
//             label: {
//                 connectorAllowed: false
//             },
//             pointStart: 2010
//         }
//     },

//     series: [{
//         name: 'talep',
//         data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
//     }],

//     responsive: {
//         rules: [{
//             condition: {
//                 maxWidth: 500
//             },
//             chartOptions: {
//                 legend: {
//                     layout: 'horizontal',
//                     align: 'center',
//                     verticalAlign: 'bottom'
//                 }
//             }
//         }]
//     }

// });