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

    .radio-toggle input:checked+label {
        background: #3498db;
        color: #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
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
                        <h3><b class="text-white">Aménagement urbain et typologie résidentielle</b></h3>
                    </div>

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
                  
                        <!-- column -->
                        <!-- column -->

                        <!-- column -->
                        <!-- column -->
                               <!-- column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre de logements par quartier</h4>
                                    <div id="chart2" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'habitants par quartier</h4>
                                    <div id="chart4" style="height:400px;"></div>
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

                        <!-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">Logements et Habitants par résidence</h4>
                                    <div id="chart6_7" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- 


<div class="page-wrapper">
    <br />
    <div class="container-fluid">
       
    </div>
</div>
</div> -->








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
        // Initialisation du graphique
        var chart1 = echarts.init(document.getElementById('chart1'));

        // Charger les données depuis PHP
        fetch('assets/php/residence/residence_by_type.php') // 🔹 adapte le chemin
            .then(response => response.json())
            .then(data => {
                chart1.setOption({
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
                        radius: ['40%', '65%'], // Donut style
                        avoidLabelOverlap: true,
                        data: data, // 🔹 récupère depuis PHP
                        label: {
                            show: true,
                            position: 'outside',
                            formatter: '{c} ({d}%)',
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
                                let colors = ['#2E86C1', '#117864', '#B03A2E', '#F39C12', '#7D3C98', '#16A085'];
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
            })
            .catch(error => {
                console.error('Erreur lors du chargement des données:', error);
            });

        /********************************************** Logements par quartier ********************************************************** */
        // Chart 2 - Nombre de logements par quartier (Horizontal Bar)
        var chart2 = echarts.init(document.getElementById('chart2'));

        fetch('assets/php/residence/get_logements_quartier.php')
            .then(response => response.json())
            .then(data => {
                chart2.setOption({
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    grid: {
                        left: '12%',
                        right: '8%',
                        bottom: '15%',
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
                        data: data.quartiers, // 🔹 Quartiers dynamiques
                        axisLine: {
                            lineStyle: {
                                color: '#666'
                            }
                        },
                        axisLabel: {
                            fontSize: 11, // 🔹 Plus petit pour beaucoup de quartiers
                            interval: 0
                        }
                    },
                    dataZoom: [{
                            type: 'slider',
                            yAxisIndex: 0,
                            start: 0,
                            end: data.quartiers.length > 20 ? 30 : 100, // 🔹 Scroll si +20 quartiers
                            handleSize: 20
                        },
                        {
                            type: 'inside',
                            yAxisIndex: 0
                        }
                    ],
                    series: [{
                        name: 'Nombre de logements',
                        type: 'bar',
                        data: data.totaux, // 🔹 Totaux dynamiques
                        barWidth: '60%', // 🔹 largeur auto
                        itemStyle: {
                            color: function(params) {
                                var colors = [
                                    '#2E86C1', '#28B463', '#F39C12', '#8E44AD',
                                    '#E74C3C', '#1ABC9C', '#D35400', '#7D3C98'
                                ];
                                return colors[params.dataIndex % colors.length];
                            },
                            borderRadius: [3, 3, 0, 0]
                        },
                        emphasis: {
                            itemStyle: {
                                opacity: 0.85
                            },
                            label: {
                                show: true,
                                position: 'right',
                                fontWeight: 'bold',
                                color: '#000'
                            }
                        }
                    }],
                    animationDuration: 600,
                    animationEasing: 'cubicOut'
                });
            })
            .catch(err => console.error("Erreur:", err));





        /************************************************************************************************************************** */
        var chart4 = echarts.init(document.getElementById('chart4'));

        fetch('assets/php/residence/get_habitants_quartier.php')
            .then(res => res.json())
            .then(data => {
                chart4.setOption({
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: data.quartiers,
                        axisTick: {
                            show: false
                        },
                        axisLabel: {
                            rotate: 30
                        } // 🔹 utile si beaucoup de quartiers
                    },
                    yAxis: {
                        type: 'value',
                        name: 'Habitants'
                    },
                    series: [{
                        type: 'bar',
                        data: data.habitants,
                        barWidth: '50%',
                        itemStyle: {
                            borderRadius: [6, 6, 0, 0],
                            color: function(params) {
                                var gradients = [
                                    ['#42a5f5', '#1e88e5'],
                                    ['#66bb6a', '#388e3c'],
                                    ['#ffa726', '#f57c00'],
                                    ['#ab47bc', '#8e24aa'],
                                    ['#ef5350', '#c62828'],
                                    ['#26c6da', '#00838f'],
                                    ['#d4e157', '#9e9d24']
                                ];
                                var g = gradients[params.dataIndex % gradients.length];
                                return new echarts.graphic.LinearGradient(
                                    0, 0, 0, 1,
                                    [{
                                        offset: 0,
                                        color: g[0]
                                    }, {
                                        offset: 1,
                                        color: g[1]
                                    }]
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
            })
            .catch(err => console.error("Erreur chart4:", err));


        /********************************************* Surface de résidence par type *************************************************** */
        var chart5 = echarts.init(document.getElementById('chart5'));

        fetch('assets/php/residence/get_surface_type.php', {
                cache: 'no-store'
            })
            .then(resp => resp.json())
            .then(result => {
                if (result.error) {
                    console.error('API error:', result.error);
                    chart5.setOption({
                        title: {
                            text: 'Erreur API',
                            left: 'center'
                        }
                    });
                    return;
                }

                chart5.setOption({
                    //   title: {
                    //     text: 'Surface foncière par type de résidence',
                    //     left: 'center',
                    //     top: 10,
                    //     textStyle: { fontSize: 15, fontWeight: 'bold' }
                    //   },
                    tooltip: {
                        trigger: 'item',
                        formatter: '{b}: {c} m²'
                    },  legend: {
                        orient: 'horizontal',
                        bottom: 10,
                        textStyle: {
                            fontSize: 13,
                            color: '#555'
                        }
                    },
                    series: {
                        type: 'pie',
                        radius: [0, '65%'],
                        data: result.data,
                       label: {
    show: true,
    position: 'outside',
    formatter: '{c} m²', // 🔹 this creates the text "RESIDENCE INDIVIDUELLE"
  },
                        itemStyle: {
                            borderColor: '#fff',
                            borderWidth: 2
                        }
                    }
                });
            })
            .catch(err => {
                console.error('Fetch error:', err);
                chart5.setOption({
                    title: {
                        text: 'Erreur de chargement',
                        left: 'center'
                    }
                });
            });

        window.addEventListener('resize', () => chart5.resize());

        /*********************************************Logements par résidence***************************************************** */
// Chart 6 - Nombre de logements par résidence (Bar)
var chart6 = echarts.init(document.getElementById('chart6'));

fetch('assets/php/residence/get_logement_type.php', { cache: 'no-store' })
    .then(resp => resp.json())
    .then(result => {
        if (result.error) {
            console.error('API error:', result.error);
            chart6.setOption({
                title: {
                    text: 'Erreur API',
                    left: 'center'
                }
            });
            return;
        }

        chart6.setOption({
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} logements'
            },
            xAxis: {
                type: 'category',
                data: result.labels,
                axisTick: { show: false },
                axisLabel: {
                    interval: 0,   // show all labels
                    rotate: 30,    // rotate to prevent overlap
                    fontSize: 12
                }
            },
            yAxis: {
                type: 'value',
                name: 'Nombre de logements',
                nameLocation: 'middle',
                nameGap: 40
            },
            series: [{
                name: 'Logements',
                type: 'pictorialBar',
                symbol: 'rect',       // rectangle bars
                symbolRepeat: true,
                symbolSize: [20, 10],
                itemStyle: {
                    color: function(params) {
                        var colors = ['#5470C6', '#91CC75', '#EE6666', '#73C0DE', '#FAC858', '#9A60B4', '#EA7CCC'];
                        return colors[params.dataIndex % colors.length];
                    }
                },
                data: result.values,
                label: {
                    show: true,
                    position: 'top',
                    formatter: '{c}'
                }
            }]
        });
    })
    .catch(err => {
        console.error('Fetch error:', err);
        chart6.setOption({
            title: {
                text: 'Erreur de chargement',
                left: 'center'
            }
        });
    });

// Make chart responsive
window.addEventListener('resize', () => chart6.resize());


        /************************************************************************************* */
        var chart7 = echarts.init(document.getElementById('chart7'));

        fetch('assets/php/residence/get_habitants_residence.php', {
                cache: 'no-store'
            })
            .then(resp => resp.json())
            .then(result => {
                if (result.error) {
                    console.error('API error:', result.error);
                    chart7.setOption({
                        title: {
                            text: 'Erreur API',
                            left: 'center'
                        }
                    });
                    return;
                }

                chart7.setOption({
                    //   title: {
                    //     text: "Nombre d'habitants par résidence",
                    //     left: 'center',
                    //     top: 10,
                    //     textStyle: { fontSize: 15, fontWeight: 'bold' }
                    //   },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    grid: {
                        left: '20%',
                        right: '10%',
                        bottom: '15%',
                        containLabel: true
                    },
                    xAxis: {
                        type: 'value'
                    },
                    yAxis: {
                        type: 'category',
                        data: result.labels,
                        axisLabel: {
                            fontSize: 11,
                            interval: 0 // affiche tous les labels
                        }
                    },
                    dataZoom: [{
                            type: 'slider',
                            yAxisIndex: 0,
                            start: 0,
                            end: 40, // 🔹 par défaut montre ~40% des résidences
                            width: 15,
                            right: 5
                        },
                        {
                            type: 'inside',
                            yAxisIndex: 0
                        }
                    ],
                    series: [{
                        name: 'Habitants',
                        type: 'bar',
                        stack: 'total',
                        data: result.values,
                        label: {
                            show: true,
                            position: 'insideRight'
                        },
                        itemStyle: {
                            color: '#73C0DE'
                        }
                    }]
                });
            })
            .catch(err => {
                console.error('Fetch error:', err);
                chart7.setOption({
                    title: {
                        text: 'Erreur de chargement',
                        left: 'center'
                    }
                });
            });

        window.addEventListener('resize', () => chart7.resize());
        /*************************************************************************************** */
        // var chart67 = echarts.init(document.getElementById('chart6_7'));

        // fetch('assets/php/residence/get_logements_habitants.php', {
        //         cache: 'no-store'
        //     })
        //     .then(resp => resp.json())
        //     .then(result => {
        //         if (result.error) {
        //             console.error("Erreur API:", result.error);
        //             chart67.setOption({
        //                 title: {
        //                     text: 'Erreur API',
        //                     left: 'center'
        //                 }
        //             });
        //             return;
        //         }

        //         chart67.setOption({
        //             // title: {
        //             //     text: "Logements et Habitants par résidence",
        //             //     left: 'center',
        //             //     top: 5,
        //             //     textStyle: {
        //             //         fontSize: 15,
        //             //         fontWeight: 'bold'
        //             //     }
        //             // },
        //             tooltip: {
        //                 trigger: 'axis',
        //                 axisPointer: {
        //                     type: 'shadow'
        //                 }
        //             },
        //             legend: {
        //                 top: '10%',
        //                 data: ['Logements', 'Habitants']
        //             },
        //             grid: {
        //                 left: '8%',
        //                 right: '8%',
        //                 bottom: '12%',
        //                 containLabel: true
        //             },
        //             xAxis: {
        //                 type: 'category',
        //                 data: result.residences,
        //                 axisLabel: {
        //                     rotate: 30,
        //                     fontSize: 11
        //                 } // 🔹 rotation pour bcp de résidences
        //             },
        //             yAxis: {
        //                 type: 'value'
        //             },
        //             series: [{
        //                     name: 'Logements',
        //                     type: 'bar',
        //                     barGap: '20%',
        //                     data: result.logements,
        //                     itemStyle: {
        //                         color: '#b5d733'
        //                     },
        //                     label: {
        //                         show: true,
        //                         position: 'top'
        //                     }
        //                 },
        //                 {
        //                     name: 'Habitants',
        //                     type: 'bar',
        //                     data: result.habitants,
        //                     itemStyle: {
        //                         color: '#505472'
        //                     },
        //                     label: {
        //                         show: true,
        //                         position: 'top'
        //                     }
        //                 }
        //             ],
        //             dataZoom: [{
        //                     type: 'slider',
        //                     xAxisIndex: 0,
        //                     start: 0,
        //                     end: 30
        //                 }, // 🔹 scroll horizontal
        //                 {
        //                     type: 'inside',
        //                     xAxisIndex: 0,
        //                     start: 0,
        //                     end: 30
        //                 }
        //             ]
        //         });
        //     })
        //     .catch(err => {
        //         console.error("Erreur fetch:", err);
        //         chart67.setOption({
        //             title: {
        //                 text: 'Erreur chargement données',
        //                 left: 'center'
        //             }
        //         });
        //     });

        // window.addEventListener('resize', () => chart67.resize());
    });
</script>