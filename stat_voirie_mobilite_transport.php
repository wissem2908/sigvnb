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
</style>

<div class="page-wrapper">
    <br />
    <div class="container">
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Classification des transports</h4>
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Habitants par quartier</h4>
                        <div id="chartT4" style="height:400px;"></div>
                    </div>
                </div>
            </div>
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
                        <h4 class="card-title">Lignes de transport par commune</h4>
                        <div id="chartT6" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Capacité de stationnement par quartier</h4>
                        <div id="chartT7" style="height:400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Population couverte par quartier</h4>
                        <div id="chartT8" style="height:400px;"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">État de la route (bon, moyen, mauvais)</h4>
                        <div id="chartT9" style="height:400px;"></div>
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
        tooltip: {
            trigger: 'axis'
        },
        xAxis: {
            type: 'value',
            name: 'Nombre'
        },
        yAxis: {
            type: 'category',
            data: ['Bus', 'Tram', 'Métro', 'Taxi']
        },
        series: [{
            type: 'bar',
            data: [120, 40, 25, 90],
            itemStyle: {
                color: '#42a5f5'
            },
            label: {
                show: true,
                position: 'right'
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
    var chartT4 = echarts.init(document.getElementById('chartT4'));
    chartT4.setOption({
        tooltip: {
            trigger: 'item'
        },
        series: [{
            type: 'pictorialBar',
            symbol: 'rect',
            data: [5, 3, 2],
            symbolRepeat: true,
            barCategoryGap: '40%',
            itemStyle: {
                color: '#9c27b0'
            }
        }],
        xAxis: {
            type: 'category',
            data: ['Gares Ferroviaires', 'Stations Métro', 'Gares Routières']
        },
        yAxis: {
            type: 'value',
            name: 'Nombre'
        }
    });
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
            trigger: 'axis'
        },
        xAxis: {
            type: 'category',
            data: ['Commune A', 'Commune B', 'Commune C']
        },
        yAxis: {
            type: 'value',
            name: 'Lignes'
        },
        series: [{
            type: 'line',
            smooth: true,
            data: [10, 15, 8],
            itemStyle: {
                color: '#ff9800'
            }
        }]
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
        tooltip: {},
        radar: {
            indicator: [{
                    name: 'Bon',
                    max: 100
                },
                {
                    name: 'Moyen',
                    max: 100
                },
                {
                    name: 'Mauvais',
                    max: 100
                }
            ]
        },
        series: [{
            type: 'radar',
            data: [{
                value: [70, 20, 10],
                name: 'État des routes'
            }]
        }]
    });
</script>