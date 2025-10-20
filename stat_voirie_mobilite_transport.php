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

            <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Population couverte par transport/quartier</h4>
                        <div id="chartT8" style="height:400px;"></div>
                    </div>
                </div>
            </div> -->


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

fetch('assets/php/transport/type_voirie.php')
  .then(response => response.json())
  .then(data => {
    chartT1.setOption({
      tooltip: {
        trigger: 'item',
        formatter: "{b}: {c} ({d}%)"
      },
      legend: {
        orient: 'horizontal',
        right: '5%',
        top: 'bottom'
      },
      series: [{
        name: 'Types de voies',
        type: 'pie',
        radius: ['40%', '70%'],
        label: {
          show: true,
          formatter: "{b}\n{d}%"
        },
        data: data
      }]
    });
  })
  .catch(error => console.error('Erreur:', error));

    /***********************************************************************************/
 // Initialize chart instance
var chartT2 = echarts.init(document.getElementById('chartT2'));

// Fetch dynamic data from PHP
fetch('assets/php/transport/get_transports_types.php')
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Erreur PHP :', data.error);
            return;
        }

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
                data: data.types,
                axisLine: { lineStyle: { color: '#888' } },
                axisTick: { show: false }
            },
            series: [{
                type: 'bar',
                data: data.totals,
                barWidth: 25,
                itemStyle: {
                    borderRadius: [5, 5, 5, 5],
                    color: function(params) {
                        // Assign gradient colors dynamically
                        var colors = [
                            ['#42a5f5', '#1e88e5'],
                            ['#66bb6a', '#388e3c'],
                            ['#ffca28', '#f57f17'],
                            ['#ef5350', '#c62828'],
                            ['#ab47bc', '#8e24aa'],
                            ['#26c6da', '#0097a7']
                        ];
                        var colorPair = colors[params.dataIndex % colors.length];
                        return new echarts.graphic.LinearGradient(1, 0, 0, 0, [
                            { offset: 0, color: colorPair[0] },
                            { offset: 1, color: colorPair[1] }
                        ]);
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
    })
    .catch(error => {
        console.error('Erreur lors du chargement des données :', error);
    });
    /************************************************************************************/

var chartT3 = echarts.init(document.getElementById('chartT3'));

fetch('assets/php/transport/get_transports_by_quartier.php')
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Erreur PHP :', data.error);
            return;
        }

        chartT3.setOption({
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: data.types
            },
            xAxis: {
                type: 'category',
                data: data.quartiers
            },
            yAxis: {
                type: 'value'
            },
            series: data.series
        });
    })
    .catch(error => {
        console.error('Erreur lors du chargement des données :', error);
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

fetch('assets/php/transport/voirie_longueur_par_type.php')
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            console.error(data.error);
            return;
        }

        console.log(data);

        chartT5.setOption({
            tooltip: {
                trigger: 'axis',
                backgroundColor: '#fff',
                textStyle: {
                    align: 'left' // ensures left-aligned text inside tooltip
                },
                formatter: function (params) {
                    // 'params' is an array when trigger = 'axis'
                    let commune = params[0].axisValue;
                    let html = `<strong>Commune de ${commune}</strong><br/>`;
                    params.forEach(p => {
                        html += `${p.marker} ${p.seriesName}: <b>${p.value}</b><br/>`;
                    });
                    return html;
                }
            },
            legend: { data: data.types },
            xAxis: {
                type: 'category',
                data: data.communes,
                name: 'Commune'
            },
            yAxis: {
                type: 'value',
                name: 'Longueur (km)'
            },
            series: data.series
        });
    })
    .catch(err => console.error('Erreur chargement données:', err));
    /******************************************************************************************************* */

var chartT6 = echarts.init(document.getElementById('chartT6'));

fetch('assets/php/transport/ligne_transport_by_commune.php')
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Erreur PHP :', data.error);
            return;
        }

        chartT6.setOption({
            tooltip: {
                trigger: 'axis',
                axisPointer: { type: 'shadow' }
            },
            legend: {
                top: '5%',
                data: data.types
            },
            xAxis: {
                type: 'category',
                data: data.communes
            },
            yAxis: {
                type: 'value',
                name: 'Nombre de lignes'
            },
            series: data.series
        });
    })
    .catch(error => {
        console.error('Erreur lors du chargement des données :', error);
    });
    /************************************************************************************************************** */
fetch('assets/php/transport/get_parc_stationnement.php')
    .then(response => response.json())
    .then(data => {
        var chartT7 = echarts.init(document.getElementById('chartT7'));

        chartT7.setOption({
            backgroundColor: '#f9f9f9',
            title: {
                text: 'Surface totale des parcs de stationnement par quartier',
                left: 'center',
                top: 10
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: { type: 'shadow' },
                formatter: "{b} : {c} m²"
            },
            grid: {
                left: '15%',
                right: '10%',
                bottom: '15%',
                containLabel: true
            },
            dataZoom: [
                {
                    type: 'slider',
                    yAxisIndex: 0,
                    start: 0,
                    end: 50, // show 50% of quartiers by default
                    width: 10,
                    right: 0
                },
                {
                    type: 'inside',
                    yAxisIndex: 0
                }
            ],
            xAxis: {
                type: 'value',
                name: 'Surface (m²)',
                axisLine: { lineStyle: { color: '#888' } },
                splitLine: { lineStyle: { type: 'dashed', color: '#ccc' } }
            },
            yAxis: {
                type: 'category',
                data: data.quartiers,
                axisLine: { lineStyle: { color: '#888' } },
                axisTick: { show: false }
            },
            series: [{
                type: 'bar',
                data: data.surfaces,
                barWidth: 18,
                itemStyle: {
                    borderRadius: [3, 3, 3, 3],
                    color: new echarts.graphic.LinearGradient(1, 0, 0, 0, [
                        { offset: 0, color: '#66bb6a' },
                        { offset: 1, color: '#2e7d32' }
                    ])
                },
                label: {
                    show: true,
                    position: 'right',
                    fontSize: 11,
                    color: '#333'
                }
            }]
        });

        window.addEventListener('resize', () => chartT7.resize());
    })
    .catch(error => console.error('Erreur chargement data:', error));
    /************************************************************************************************************* */
    /*var chartT8 = echarts.init(document.getElementById('chartT8'));
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
    });*/
    /************************************************************************************************************** */
var chartT9 = echarts.init(document.getElementById('chartT9'));

fetch('assets/php/transport/get_voirie_etat.php')
    .then(response => response.json())
    .then(json => {
        if (json.error) {
            console.error(json.error);
            return;
        }

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
                radius: ['45%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: true,
                    position: 'outside',
                    formatter: "{b}\n{d}%",
                    fontSize: 13,
                    fontWeight: "bold"
                },
                labelLine: { show: true, length: 15 },
                itemStyle: {
                    borderRadius: 6,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                data: json.data.map(item => {
                    let color;
                    switch (item.name) {
                        case 'Bon état': color = '#66bb6a'; break;
                        case 'Moyen état': color = '#ffca28'; break;
                        case 'Mauvais état': color = '#ef5350'; break;
                        case 'En ruine': color = '#8d6e63'; break;
                        default: color = '#90a4ae';
                    }
                    return { ...item, itemStyle: { color } };
                })
            }]
        });
    });

</script>