<?php
include('includes/header2.php');
?>
<style>
    .card-header {
        background: linear-gradient(to right, #318f94 0%, #5ec58c 100%);

        color: #fff;
    }

    .retour {
        float: inline-end;
        margin-top: -24px;
        margin-bottom: -7px;
    }
            .container-fluid {

        max-width: 95% !important;
    }
</style>

<div class="page-wrapper">
    <br />
    <div class="container-fluid">

                <div class="row">
            <div class="col-12">
                <div class="card text-center" style="background: #345b61">
                    <div class="card-header">
                        <h3><b class="text-white">Voirie, mobilité et transports </b></h3>
                    </div>
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Classification des voiries</h4>
                        <div id="chartT1" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Types de transport</h4>
                        <div id="chartT2" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d’arrêts + répartition</h4>
                        <div id="chartT3" style="height:400px;"></div>

                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->

            <!-- column -->
            <!-- column -->
            <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Habitants par quartier</h4>
                        <div id="chartT4" style="height:400px;"></div>
                    </div>
                </div>
            </div>  -->
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold"> Longueur voirie par catégoriee</h4>
                        <div id="chartT5" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Lignes de transport par commune</h4>
                        <div id="chartT6" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Capacité de stationnement par quartier</h4>
                        <div id="chartT7" style="height:400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Population couverte par transport/quartier</h4>
                        <div id="chartT8" style="height:400px;"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">État de la route (bon, moyen, mauvais)</h4>
                        <div id="chartT9" style="height:400px;"></div>
                    </div>
                </div>
            </div>
           </div>
            </div>


        </div>

        </div>
    </div>
</div>
</div>








<!-- Mini Galerie Section -->


<footer class="footer">
    © ANURB 2025 - Tous Droits Réservés.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<?php
include('includes/footer.php');
?>

<script src="assets/js/users.js"></script>

<script>
    /***************************************************************************************************/
    var chartT1 = echarts.init(document.getElementById('chartT1'));
    chartT1.setOption({
        // title: {
        //     text: 'Classification des transports',
        //     left: 'center'
        // },
        tooltip: {
            trigger: 'item',
            formatter: "{b}: {c} ({d}%)"
        },
        series: [{
            type: 'pie',
            radius: ['40%', '70%'],
            data: [{
                    value: 45,
                    name: 'Transport Public'
                },
                {
                    value: 30,
                    name: 'Transport Privé'
                },

                {
                    value: 10,
                    name: 'Autres'
                }
            ]
        }]
    });


    /***********************************************************************************/
  var chartT2 = echarts.init(document.getElementById('chartT2'));
chartT2.setOption({
    backgroundColor: '#f9f9f9',
    tooltip: {
        trigger: 'axis',
        axisPointer: { type: 'shadow' },
        formatter: "{b} : {c}"
    },
    grid: {
        left: '10%',
        right: '10%',
        bottom: '10%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        name: 'Nombre',
        axisLine: { lineStyle: { color: '#888' } },
        splitLine: { lineStyle: { type: 'dashed', color: '#ccc' } }
    },
    yAxis: {
        type: 'category',
        data: ['Bus', 'Tram', 'Métro', 'Taxi'],
        axisLine: { lineStyle: { color: '#888' } },
        axisTick: { show: false }
    },
    series: [{
        type: 'bar',
        data: [120, 40, 25, 90],
        barWidth: 25,
        itemStyle: {
            borderRadius: [5, 5, 5, 5],
            color: function(params) {
                // different color for each bar
                var colors = [
                    new echarts.graphic.LinearGradient(1, 0, 0, 0, [
                        { offset: 0, color: '#42a5f5' },
                        { offset: 1, color: '#1e88e5' }
                    ]),
                    new echarts.graphic.LinearGradient(1, 0, 0, 0, [
                        { offset: 0, color: '#66bb6a' },
                        { offset: 1, color: '#388e3c' }
                    ]),
                    new echarts.graphic.LinearGradient(1, 0, 0, 0, [
                        { offset: 0, color: '#ffca28' },
                        { offset: 1, color: '#f57f17' }
                    ]),
                    new echarts.graphic.LinearGradient(1, 0, 0, 0, [
                        { offset: 0, color: '#ef5350' },
                        { offset: 1, color: '#c62828' }
                    ])
                ];
                return colors[params.dataIndex];
            }
        },
        label: {
            show: true,
            position: 'right',
            fontSize: 14,
            fontWeight: 'bold',
            color: '#333'
        }
    }]
});

    /************************************************************************************/

    var chartT3 = echarts.init(document.getElementById('chartT3'));
    chartT3.setOption({
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Bus', 'Tram']
        },
        xAxis: {
            type: 'category',
            data: ['Quartier A', 'Quartier B', 'Quartier C']
        },
        yAxis: {
            type: 'value'
        },
        series: [{
                name: 'Bus',
                type: 'bar',
                stack: 'total',
                data: [12, 18, 25]
            },
            {
                name: 'Tram',
                type: 'bar',
                stack: 'total',
                data: [5, 8, 10]
            }
        ]
    });

    /************************************************************************** */
// var chartT4 = echarts.init(document.getElementById('chartT4'));
// chartT4.setOption({
//     title: {
//         text: "Nombre d'habitants par quartier",
//         left: 'center'
//     },
//     tooltip: {
//         trigger: 'axis',
//         axisPointer: { type: 'shadow' }
//     },
//     grid: {
//         left: '10%',
//         right: '10%',
//         bottom: '10%',
//         containLabel: true
//     },
//     xAxis: {
//         type: 'value',
//         name: 'Habitants'
//     },
//     yAxis: {
//         type: 'category',
//         data: ['Quartier A', 'Quartier B', 'Quartier C', 'Quartier D', 'Quartier E']
//     },
//     series: [{
//         type: 'bar',
//         data: [1200, 950, 1500, 800, 1100],
//         label: {
//             show: true,
//             position: 'right'
//         },
//         itemStyle: {
//             color: function (params) {
//                 // Palette de couleurs variées
//                 var colors = ['#42a5f5', '#66bb6a', '#ffa726', '#ef5350', '#ab47bc'];
//                 return colors[params.dataIndex % colors.length];
//             },
//             borderRadius: [0, 8, 8, 0]
//         }
//     }]
// });

    /******************************************************************************************** */
    var chartT5 = echarts.init(document.getElementById('chartT5'));
    chartT5.setOption({
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Autoroute', 'Principale', 'Secondaire']
        },
        xAxis: {
            type: 'category',
            data: ['Commune A', 'Commune B', 'Commune C']
        },
        yAxis: {
            type: 'value',
            name: 'Km'
        },
        series: [{
                name: 'Autoroute',
                type: 'bar',
                stack: 'total',
                data: [20, 15, 30]
            },
            {
                name: 'Principale',
                type: 'bar',
                stack: 'total',
                data: [35, 40, 20]
            },
            {
                name: 'Secondaire',
                type: 'bar',
                stack: 'total',
                data: [25, 30, 40]
            }
        ]
    });
    /******************************************************************************************************* */

 var chartT6 = echarts.init(document.getElementById('chartT6'));
chartT6.setOption({
    tooltip: {
        trigger: 'axis',
        axisPointer: { type: 'shadow' }
    },
    legend: {
        top: '5%',
        data: ['Bus', 'Tram', 'Métro']
    },
    xAxis: {
        type: 'category',
        data: ['Commune A', 'Commune B', 'Commune C']
    },
    yAxis: {
        type: 'value',
        name: 'Nombre de lignes'
    },
    series: [
        {
            name: 'Bus',
            type: 'bar',
            stack: 'total',
            data: [5, 7, 3],
            itemStyle: { color: '#42a5f5' }
        },
        {
            name: 'Tram',
            type: 'bar',
            stack: 'total',
            data: [3, 5, 2],
            itemStyle: { color: '#66bb6a' }
        },
        {
            name: 'Métro',
            type: 'bar',
            stack: 'total',
            data: [2, 3, 3],
            itemStyle: { color: '#ffa726' }
        }
    ]
});

    /************************************************************************************************************** */

    var chartT7 = echarts.init(document.getElementById('chartT7'));
    chartT7.setOption({
        tooltip: {
            trigger: 'axis'
        },
        xAxis: {
            type: 'value',
            name: 'Places'
        },
        yAxis: {
            type: 'category',
            data: ['Quartier A', 'Quartier B', 'Quartier C']
        },
        series: [{
            type: 'bar',
            data: [500, 800, 300],
            itemStyle: {
                color: new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                        offset: 0,
                        color: '#4caf50'
                    },
                    {
                        offset: 1,
                        color: '#8bc34a'
                    }
                ])
            },
            label: {
                show: true,
                position: 'right'
            }
        }]
    });
    /************************************************************************************************************* */
    var chartT8 = echarts.init(document.getElementById('chartT8'));
    chartT8.setOption({
        tooltip: {
            trigger: 'item'
        },
        series: [{
            type: 'pie',
            radius: '60%',
            data: [{
                    value: 12000,
                    name: 'Quartier A'
                },
                {
                    value: 8000,
                    name: 'Quartier B'
                },
                {
                    value: 5000,
                    name: 'Quartier C'
                }
            ]
        }]
    });
    /************************************************************************************************************** */

 var chartT9 = echarts.init(document.getElementById('chartT9'));
chartT9.setOption({
    backgroundColor: '#f9f9f9',
    tooltip: {
        trigger: 'item',
        formatter: "{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        right: '5%',
        top: 'center',
        textStyle: { fontSize: 13 }
    },
    series: [{
        name: 'État des routes',
        type: 'pie',
        radius: ['45%', '70%'], // doughnut effect
        avoidLabelOverlap: false,
        label: {
            show: true,
            position: 'outside',
            formatter: "{b}\n{d}%",
            fontSize: 13,
            fontWeight: "bold"
        },
        labelLine: {
            show: true,
            length: 15
        },
        itemStyle: {
            borderRadius: 6,
            borderColor: '#fff',
            borderWidth: 2
        },
        data: [
            { value: 70, name: 'Bon', itemStyle: { color: '#66bb6a' } },
            { value: 20, name: 'Moyen', itemStyle: { color: '#ffca28' } },
            { value: 10, name: 'Mauvais', itemStyle: { color: '#ef5350' } }
        ]
    }]
});

</script>