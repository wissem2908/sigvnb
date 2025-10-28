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
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Types des voiries</h4>
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
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold"> Longueur voirie par type</h4>
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
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface totale des parcs de stationnement par quartier</h4>
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


                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">État d'avancement</h4>
                                    <div id="chartT10" style="height:400px;"></div>
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
                    axisPointer: {
                        type: 'shadow'
                    },
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
                    axisLine: {
                        lineStyle: {
                            color: '#888'
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
                    data: data.types,
                    axisLine: {
                        lineStyle: {
                            color: '#888'
                        }
                    },
                    axisTick: {
                        show: false
                    }
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
                            return new echarts.graphic.LinearGradient(1, 0, 0, 0, [{
                                    offset: 0,
                                    color: colorPair[0]
                                },
                                {
                                    offset: 1,
                                    color: colorPair[1]
                                }
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
                    data: data.quartiers,
                    axisLabel: {
                        interval: 0, // show all labels
                        rotate: 30, // rotate to prevent overlap
                        fontSize: 12
                    }
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

    // Make chart responsive
    window.addEventListener('resize', () => chartT3.resize());

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
    $(document).ready(function() {
        $.getJSON("assets/php/transport/voirie_longueur_par_type.php", function(data) {
            if (!data || data.error) {
                console.error("Erreur chargement:", data ? data.error : "Aucune donnée reçue");
                return;
            }

            // --- 🔹 Communes list
            var communes = data.communes || [];
            if (communes.length === 0) return;

            // --- 🔹 Calculate total length per commune ---
            var communeTotals = communes.map(c => {
                var total = data.types.reduce((sum, type) => {
                    let seriesObj = data.series.find(s => s.name === type);
                    if (!seriesObj || !seriesObj.data) return sum;
                    let idx = data.communes.indexOf(c);
                    return sum + (parseFloat(seriesObj.data[idx]) || 0);
                }, 0);
                return {
                    name: c,
                    total: total
                };
            });

            // --- 🔹 Sort communes by total descending ---
            communeTotals.sort((a, b) => b.total - a.total);
            communes = communeTotals.map(c => c.name);

            // --- 🔹 Rebuild sorted series data ---
            var sortedSeries = data.types.map(type => {
                var s = data.series.find(x => x.name === type);
                return {
                    name: type,
                    type: "bar",
                    stack: false,
                    emphasis: {
                        focus: "series"
                    },
                    data: communes.map(c => {
                        let idx = data.communes.indexOf(c);
                        return (s && s.data && s.data[idx]) ? s.data[idx] : 0;
                    })
                };
            });

            // --- 🔹 Init chart ---
            var chartT5 = echarts.init(document.getElementById("chartT5"));

            var option = {
                tooltip: {
                    trigger: "axis",
                    axisPointer: {
                        type: "shadow"
                    },
                    confine: true,
                    enterable: true,
                    extraCssText: `
                    max-height:200px;
                    overflow:auto;
                    pointer-events:auto;
                    padding:8px;
                    text-align:left;
                    white-space:normal;
                `,
                    formatter: function(params) {
                        var axisVal = params[0] ? params[0].axisValue : "";
                        var html = `<div style="font-weight:700;margin-bottom:6px;">Commune de ${axisVal}</div>`;
                        var nonZero = params.filter(p => p.value && p.value > 0);

                        if (nonZero.length === 0) {
                            html += "<div>Aucune donnée</div>";
                        } else {
                            nonZero.forEach(p => {
                                html += `
                                <div style="margin-bottom:4px;">
                                    <span style="display:inline-block;width:10px;height:10px;background:${p.color};
                                                 border-radius:50%;margin-right:6px;vertical-align:middle;"></span>
                                    <span style="vertical-align:middle;">${p.seriesName}: <b>${p.value} km</b></span>
                                </div>`;
                            });
                        }
                        return html;
                    }
                },
                legend: {
                    type: "scroll",
                    top: 0,
                    textStyle: {
                        color: "#333"
                    }
                },
                grid: {
                    left: "3%",
                    right: "4%",
                    bottom: "10%",
                    containLabel: true
                },
                xAxis: {
                    type: "category",
                    data: communes,
                    axisLabel: {
                        rotate: 30
                    }
                },
                yAxis: {
                    type: "value",
                    name: "Longueur (km)"
                },
                series: sortedSeries
            };

            chartT5.setOption(option);
        }).fail(function(err) {
            console.error("Erreur requête:", err);
        });
    });

    /******************************************************************************************************* */

    $(document).ready(function() {
        $.getJSON("assets/php/transport/ligne_transport_by_commune.php", function(data) {
            if (data.error) {
                console.error("Erreur PHP :", data.error);
                return;
            }

            // --- 🔹 Prepare data like in the typologies chart ---
            var communes = data.communes;
            var types = data.types;
            var seriesData = data.series;

            // --- 🔹 Compute total per commune ---
            var communeTotals = communes.map((commune, i) => {
                let total = 0;
                seriesData.forEach(s => {
                    total += s.data[i] || 0;
                });
                return {
                    name: commune,
                    total: total
                };
            });

            // --- 🔹 Sort communes by total (descending) ---
            communeTotals.sort((a, b) => b.total - a.total);
            communes = communeTotals.map(c => c.name);

            // --- 🔹 Reorder data according to sorted communes ---
            var series = seriesData.map(s => ({
                name: s.name,
                type: 'bar',
                emphasis: {
                    focus: 'series'
                },
                data: communes.map(c => {
                    let idx = data.communes.indexOf(c);
                    return s.data[idx] || 0;
                })
            }));

            // --- 🔹 Initialize chart ---
            var chart = echarts.init(document.getElementById('chartT6'));

            var option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    },
                    confine: true,
                    enterable: true,
                    backgroundColor: '#fff',
                    extraCssText: `
                    max-height:200px;
                    overflow:auto;
                    pointer-events:auto;
                    padding:8px;
                    text-align:left;
                    white-space:normal;
                `,
                    formatter: function(params) {
                        var axisVal = params[0] ? params[0].axisValue : '';
                        var html = `<div style="font-weight:700;margin-bottom:6px;">Commune de ${axisVal}</div>`;
                        var nonZero = params.filter(p => p.value && p.value > 0);

                        if (nonZero.length === 0) {
                            html += '<div>Aucune ligne de transport</div>';
                        } else {
                            nonZero.forEach(p => {
                                html += `
                                <div style="margin-bottom:4px;">
                                    <span style="display:inline-block;width:10px;height:10px;background:${p.color};
                                                 border-radius:50%;margin-right:6px;vertical-align:middle;"></span>
                                    <span style="vertical-align:middle;">${p.seriesName}: <b>${p.value}</b></span>
                                </div>`;
                            });
                        }
                        return html;
                    }
                },
                legend: {
                    type: 'scroll',
                    top: 0,
                    textStyle: {
                        color: '#333'
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '10%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: communes,
                    axisLabel: {
                        rotate: 30
                    }
                },
                yAxis: {
                    type: 'value',
                    name: 'Nombre de lignes'
                },
                series: series
            };

            chart.setOption(option);
        }).fail(function(jqxhr, textStatus, error) {
            console.error("Erreur lors du chargement des données :", textStatus, error);
        });
    });
    /************************************************************************************************************** */
    fetch('assets/php/transport/get_parc_stationnement.php')
        .then(response => response.json())
        .then(data => {
            var chartT7 = echarts.init(document.getElementById('chartT7'));

            chartT7.setOption({
                backgroundColor: '#f9f9f9',
                // title: {
                //     text: 'Surface totale des parcs de stationnement par quartier',
                //     left: 'center',
                //     top: 10
                // },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    },
                    formatter: "{b} : {c} m²"
                },
                grid: {
                    left: '15%',
                    right: '10%',
                    bottom: '15%',
                    containLabel: true
                },
                dataZoom: [{
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
                    axisLine: {
                        lineStyle: {
                            color: '#888'
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
                    data: data.quartiers,
                    axisLine: {
                        lineStyle: {
                            color: '#888'
                        }
                    },
                    axisTick: {
                        show: false
                    }
                },
                series: [{
                    type: 'bar',
                    data: data.surfaces,
                    barWidth: 18,
                    itemStyle: {
                        borderRadius: [3, 3, 3, 3],
                        color: new echarts.graphic.LinearGradient(1, 0, 0, 0, [{
                                offset: 0,
                                color: '#66bb6a'
                            },
                            {
                                offset: 1,
                                color: '#2e7d32'
                            }
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
                    textStyle: {
                        fontSize: 13
                    }
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
                    labelLine: {
                        show: true,
                        length: 15
                    },
                    itemStyle: {
                        borderRadius: 6,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    data: json.data.map(item => {
                        let color;
                        switch (item.name) {
                            case 'Bon état':
                                color = '#66bb6a';
                                break;
                            case 'Moyen état':
                                color = '#ffca28';
                                break;
                            case 'Mauvais état':
                                color = '#ef5350';
                                break;
                            case 'En ruine':
                                color = '#8d6e63';
                                break;
                            default:
                                color = '#90a4ae';
                        }
                        return {
                            ...item,
                            itemStyle: {
                                color
                            }
                        };
                    })
                }]
            });
        });

        /******************************** avancement ***********************************************/

fetch('assets/php/transport/get_avancement_voirie.php')
    .then(response => response.json())
    .then(data => {
        // ✅ Prepare data in same format as commune example
        const avancementData = data.avancement.map((name, i) => ({
            name: name,
            value: data.totaux[i]
        }));

        // ✅ Initialize chart
        var chartAvancement = echarts.init(document.getElementById('chartT10'));

        chartAvancement.setOption({
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} ({d}%)'
            },
            legend: {
                type: 'scroll',
                orient: 'vertical',
                left: 'left',
                top: 'middle'
            },
            series: [{
                name: 'Avancement des travaux',
                type: 'pie',
                radius: ['20%', '75%'],
                roseType: 'radius',
                itemStyle: {
                    borderRadius: 8,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: true,
                    formatter: '{d}%',
                    fontSize: 12
                },
                labelLine: {
                    smooth: true,
                    length: 10,
                    length2: 15
                },
                data: avancementData,
                color: [
                    '#1abc9c', '#f62d51', '#3498db', '#2ecc71', '#9b59b6',
                    '#8e44ad', '#f39c12', '#d35400', '#34495e', '#16a085'
                ]
            }]
        });
    })
    .catch(error => console.error('Erreur lors du chargement des données :', error));

</script>