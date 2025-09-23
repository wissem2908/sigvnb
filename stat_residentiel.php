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

    .radio-toggle {
  display: flex;
  gap: 15px;
  justify-content: center;
  margin-bottom: 15px;
}

.radio-toggle input {
  display: none;
}

.radio-toggle label {
  padding: 8px 18px;
  border-radius: 20px;
  border: 2px solid #3498db;
  cursor: pointer;
  font-weight: 500;
  transition: all 0.3s ease;
}

.radio-toggle input:checked + label {
  background: #3498db;
  color: #fff;
  box-shadow: 0 3px 6px rgba(0,0,0,0.15);
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
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition des résidences par type</h4>
                        <div id="chart1" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre de logements par quartier</h4>
                        <div id="chart2" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface plancher vs Surface foncier </h4>
                        <div class="radio-toggle">
  <input type="radio" id="residence" name="chartType" value="residence" checked>
  <label for="residence">Par Résidence</label>

  <input type="radio" id="quartier" name="chartType" value="quartier">
  <label for="quartier">Par Quartier</label>
</div>

                        <div id="chart3" style="height:400px;"></div>

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
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'habitants par quartier</h4>
                        <div id="chart4" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold"> Surface de résidence par type</h4>
                        <div id="chart5" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Nombre de logements par type de résidence</h4>
                        <div id="chart6" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Nombre d'habitants par résidence</h4>
                        <div id="chart7" style="height:400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Logements et Habitants par résidence</h4>
                        <div id="chart6_7" style="height:400px;"></div>
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
    $(document).ready(function() {
        // Chart 1 - Répartition par type (Pie)
        var chart1 = echarts.init(document.getElementById('chart1'));
        chart1.setOption({
            // title: { 
            //     text: 'Répartition par type', 
            //     left: 'center',
            //     top: 10,
            //     textStyle: {
            //         fontSize: 16,
            //         fontWeight: 'bold',
            //         color: '#333'
            //     }
            // },
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} ({d}%)'
            },
            legend: {
                orient: 'horizontal',
                bottom: 10,
                textStyle: {
                    fontSize: 13,
                    color: '#555'
                }
            },
            series: [{
                type: 'pie',
                radius: ['40%', '65%'], // Donut style (plus lisible)
                avoidLabelOverlap: true,
                data: [{
                        value: 120,
                        name: 'Type A'
                    },
                    {
                        value: 200,
                        name: 'Type B'
                    },
                    {
                        value: 150,
                        name: 'Type C'
                    }
                ],
                label: {
                    show: true,
                    position: 'outside',
                    formatter: '{b}: {d}%',
                    fontSize: 12,
                    color: '#333'
                },
                labelLine: {
                    length: 15,
                    length2: 10,
                    lineStyle: {
                        color: '#777'
                    }
                },
                itemStyle: {
                    borderRadius: 4,
                    borderColor: '#fff',
                    borderWidth: 2,
                    color: function(params) {
                        let colors = ['#2E86C1', '#117864', '#B03A2E'];
                        return colors[params.dataIndex % colors.length];
                    }
                },
                emphasis: {
                    scale: true,
                    scaleSize: 8,
                    itemStyle: {
                        shadowBlur: 12,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.3)'
                    }
                }
            }],
            animationDuration: 800,
            animationEasing: 'cubicOut'
        });

        /********************************************** Logements par quartier ********************************************************** */
        // Chart 2 - Nombre de logements par quartier (Horizontal Bar)
        var chart2 = echarts.init(document.getElementById('chart2'));
        chart2.setOption({
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            grid: {
                left: '10%',
                right: '5%',
                bottom: '10%',
                containLabel: true
            },
            xAxis: {
                type: 'value',
                axisLine: {
                    lineStyle: {
                        color: '#666'
                    }
                },
                splitLine: {
                    lineStyle: {
                        type: 'dashed',
                        color: '#ccc'
                    }
                }
            },
            yAxis: {
                type: 'category',
                data: ['Quartier A', 'Quartier B', 'Quartier C'],
                axisLine: {
                    lineStyle: {
                        color: '#666'
                    }
                },
                axisLabel: {
                    fontSize: 13
                }
            },
            series: [{
                name: 'Nombre de logements',
                type: 'bar',
                data: [120, 200, 150],
                barWidth: 28,
                itemStyle: {
                    color: function(params) {
                        // Define a palette of colors
                        var colors = [
                            '#2E86C1', '#28B463', '#F39C12', '#8E44AD',
                            '#E74C3C', '#1ABC9C', '#D35400', '#7D3C98'
                        ];
                        // Pick color by index (loop if more bars than colors)
                        return colors[params.dataIndex % colors.length];
                    },
                    borderRadius: [4, 4, 0, 0]
                },
                emphasis: {
                    itemStyle: {
                        opacity: 0.8 // subtle highlight on hover
                    },
                    label: {
                        show: true,
                        position: 'right',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                }
            }],
            animationDuration: 800,
            animationEasing: 'cubicOut'
        });



        /*******************************************Surface foncier vs Surface plancher************************************************* */
     var chart3 = echarts.init(document.getElementById('chart3'));

    // Données par résidence
    var residences = ['Résidence A', 'Résidence B', 'Résidence C', 'Résidence D'];
    var surfaceFoncierResid = [500, 1000, 800, 1200];
    var surfacePlancherResid = [700, 1100, 900, 1500];

    // Données par quartier
    var quartiers = ['Quartier 1', 'Quartier 2', 'Quartier 3'];
    var surfaceFoncierQuart = [2000, 3000, 2500];
    var surfacePlancherQuart = [2800, 3500, 3100];

    function updateChart(type) {
        let categories, foncier, plancher, title;

        if (type === "residence") {
            categories = residences;
            foncier = surfaceFoncierResid;
            plancher = surfacePlancherResid;
            title = "Surface par résidence";
        } else {
            categories = quartiers;
            foncier = surfaceFoncierQuart;
            plancher = surfacePlancherQuart;
            title = "Surface par quartier";
        }

        chart3.setOption({
            // title: { text: title, left: 'center' },
            tooltip: { trigger: 'axis', axisPointer: { type: 'shadow' } },
            legend: { top: 30 },
            xAxis: { type: 'category', data: categories },
            yAxis: { type: 'value', name: 'm²' },
            series: [
                { name: 'Surface foncier', type: 'bar', data: foncier, itemStyle: { color: '#3498db' } },
                { name: 'Surface plancher', type: 'bar', data: plancher, itemStyle: { color: '#2ecc71' } }
            ]
        });
    }

    // Initialisation
    updateChart("residence");

    // Événement radio
    document.querySelectorAll("input[name='chartType']").forEach(radio => {
        radio.addEventListener("change", function () {
            updateChart(this.value);
        });
    });


        /************************************************************************************************************************** */
        var chart4 = echarts.init(document.getElementById('chart4'));

        var quartiers = ['Quartier A', 'Quartier B', 'Quartier C', 'Quartier D', 'Quartier E'];
        var habitants = [800, 1200, 950, 1100, 700];

        chart4.setOption({
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            xAxis: {
                type: 'category',
                data: quartiers,
                axisTick: {
                    show: false
                }
            },
            yAxis: {
                type: 'value',
                name: 'Habitants'
            },
            series: [{
                type: 'bar',
                data: habitants,
                barWidth: '50%',
                itemStyle: {
                    borderRadius: [6, 6, 0, 0],
                    color: function(params) {
                        // Define a palette of gradients
                        var gradients = [
                            ['#42a5f5', '#1e88e5'], // bleu
                            ['#66bb6a', '#388e3c'], // vert
                            ['#ffa726', '#f57c00'], // orange
                            ['#ab47bc', '#8e24aa'], // violet
                            ['#ef5350', '#c62828'], // rouge
                            ['#26c6da', '#00838f'], // cyan
                            ['#d4e157', '#9e9d24'] // jaune/olive
                        ];
                        var g = gradients[params.dataIndex % gradients.length];
                        return new echarts.graphic.LinearGradient(
                            0, 0, 0, 1,
                            [{
                                    offset: 0,
                                    color: g[0]
                                },
                                {
                                    offset: 1,
                                    color: g[1]
                                }
                            ]
                        );
                    }
                },
                label: {
                    show: true,
                    position: 'top',
                    fontWeight: 'bold'
                }
            }],
            animationEasing: 'elasticOut',
            animationDelay: function(idx) {
                return idx * 120;
            }
        });

        /********************************************* Surface de résidence par type *************************************************** */
        var chart5 = echarts.init(document.getElementById('chart5'));

        chart5.setOption({
            // title: {
            //     text: 'Surface de résidence par type',
            //     left: 'center'
            // },
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} m²'
            },
            series: {
                type: 'sunburst',
                radius: [0, '80%'],
                data: [{
                        name: 'Type A',
                        value: 1200
                    },
                    {
                        name: 'Type B',
                        value: 800
                    },
                    {
                        name: 'Type C',
                        value: 600
                    }
                ],
                label: {
                    rotate: 'radial'
                }
            }
        });

        /*********************************************Logements par résidence***************************************************** */
        // Chart 6 - Nombre de logements par résidence (Bar)
        var chart6 = echarts.init(document.getElementById('chart6'));

        chart6.setOption({
            // title: {
            //     text: 'Logements par résidence',
            //     left: 'center'
            // },
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} logements'
            },
            xAxis: {
                type: 'category',
                data: ['Résidence 1', 'Résidence 2', 'Résidence 3'],
                axisTick: {
                    show: false
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Logements',
                type: 'pictorialBar',
                symbol: 'rect', // tu peux changer (circle, triangle, diamond, image…)
                symbolRepeat: true,
                symbolSize: [20, 10], // largeur et hauteur des symboles
                itemStyle: {
                    color: '#5470C6'
                },
                data: [50, 80, 120]
            }]
        });

        /************************************************************************************* */
        var chart7 = echarts.init(document.getElementById('chart7'));

        chart7.setOption({
            // title: {
            //     text: 'Habitants par résidence',
            //     left: 'center'
            // },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            grid: {
                left: '10%',
                right: '10%',
                bottom: '10%',
                containLabel: true
            },
            xAxis: {
                type: 'value'
            },
            yAxis: {
                type: 'category',
                data: ['Résidence 1', 'Résidence 2', 'Résidence 3']
            },
            series: [{
                name: 'Habitants',
                type: 'bar',
                stack: 'total',
                data: [200, 350, 400],
                label: {
                    show: true,
                    position: 'insideRight'
                },
                itemStyle: {
                    color: '#73C0DE'
                }
            }]
        });

        /*************************************************************************************** */

        var chart67 = echarts.init(document.getElementById('chart6_7'));

        chart67.setOption({
            // title: {
            //     text: 'Logements et Habitants par résidence',
            //     left: 'center'
            // },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            legend: {
                top: '10%',
                data: ['Logements', 'Habitants']
            },
            grid: {
                left: '8%',
                right: '8%',
                bottom: '10%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                data: ['Résidence 1', 'Résidence 2', 'Résidence 3']
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Logements',
                    type: 'bar',
                    barGap: '20%',
                    data: [50, 80, 120],
                    itemStyle: {
                        color: '#b5d733'
                    },
                    label: {
                        show: true,
                        position: 'top'
                    }
                },
                {
                    name: 'Habitants',
                    type: 'bar',
                    data: [200, 350, 400],
                    itemStyle: {
                        color: '#505472'
                    },
                    label: {
                        show: true,
                        position: 'top'
                    }
                }
            ]
        });
    });
</script>