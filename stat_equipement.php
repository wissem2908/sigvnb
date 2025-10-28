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

    #typologyChart,
    #typeChart {
        width: 48%;
        height: 550px;
        background: #fff;
        border-radius: 8px;
        padding: 10px;
    }

    #quartierChart {
        flex: 2;
        height: 400px;
        background: #23455e;
        border-radius: 8px;
    }

    #statCard {
        flex: 1;
        height: 400px;
        background: #fff;
        border-radius: 8px;
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;

    }

    #statCard {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
    }

    .stat-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #5cc38c;
    }

    .stat-number {
        font-size: 28px;
        margin-bottom: 15px;
        color: #5cc38c;
    }

    .progress-bar {
        width: 90%;
        height: 18px;
        background: #ccc;
        border-radius: 10px;
        margin: 15px 0;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        background: #5cc38c;
    }

    .stat-footer {
        display: flex;
        justify-content: space-between;
        width: 90%;
        font-size: 14px;
        margin-top: 10px;
    }

    #resetFilter {
        margin: 10px 0;
        padding: 6px 12px;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    #resetFilter:hover {
        background: #2ecc71;
    }

    /**************************************** */
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
                        <h3><b class="text-white"> Activité Économique et Équipement Public</b></h3>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'Equipements par fonction</h4>
                                    <div id="fonctionChart" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'Equipements par Typologie</h4>
                                    <div id="typologieChart" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <!-- column -->

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface plancher vs Surface foncier par quartier </h4>
                                    <!-- <div class="radio-toggle">
                                        <input type="radio" id="residence" name="chartType" value="residence" checked>
                                        <label for="residence">Par Résidence</label>

                                        <input type="radio" id="quartier" name="chartType" value="quartier">
                                        <label for="quartier">Par Quartier</label>
                                    </div> -->

                                    <div id="chart3" style="height:400px; width:100%"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'Equipements par Quartier</h4>
                                    <div id="quartierChart" style="width: 100%; height: 400px;"></div>

                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-block">

                                    <div id="donutChart" style="width: 100%; height: 435px;"></div>
                                    <div id="statCard" style="width: 100%; height: 435px;">
                                        <div class="stat-title">Cliquez sur un Quartier</div>
                                        <div class="stat-number"></div>
                                        <div class="progress-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <div class="stat-footer">
                                            <div>Total: <span id="total"></span></div>
                                            <div>Pourcentage: <span id="percent"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition des Equipements par Commune</h4>
                        <div id="communeChart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div> -->
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold"> Répartition des typologies d’équipements par commune</h4>
                                    <div id="heatmapChart" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Pyramide des communes selon les équipements</h4>
                                    <div id="pyramidChart" style="width: 100%; height: 465px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Activité par commune/surface</h4>
                                    <div class="radio-toggle">
                                        <input type="radio" id="activite" name="chartType" value="activite" checked>
                                        <label for="activite">Activité par commune</label>

                                        <input type="radio" id="surface" name="chartType" value="surface">
                                        <label for="surface">Surface par commune</label>
                                    </div>
                                    <div id="donutChartAquipementParActivite" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Liste des équipements</h4>

                                    <!-- 🔍 Filter Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Fonction</label>
                                            <select id="filterFonction" class="form-control">
                                                <option value="">-- Fonction --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Commune</label>
                                            <select id="filterCommune" class="form-control">
                                                <option value="">-- Commune --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Avancement</label>
                                            <select id="filterAvancement" class="form-control">
                                                <option value="">-- Avancement --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Quartier</label>
                                            <select id="filterQuartier" class="form-control">
                                                <option value="">-- Quartier --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Équipement</label>
                                            <select id="filterEquipement" class="form-control">
                                                <option value="">-- Equipement --</option>
                                            </select>
                                        </div>

                                        <div class=" col-lg-6 offset-3 mb-3">
                                            <button id="applyFilter" class="btn btn-primary btn-sm">Rechercher</button>
                                            <button id="resetFilter" class="btn btn-secondary btn-sm">Réinitialiser</button>
                                        </div>

                                        <!-- Scroll wrapper -->
                                        <div style="overflow-x: auto;">
                                            <table id="equipementTable" class="display table table-bordered" style="width:100%; min-width: 1200px;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fonction</th>
                                                        <th>Équipement</th>
                                                        <th>Abréviation</th>
                                                        <th>Superficie Foncière</th>
                                                        <th>COS</th>
                                                        <th>CES</th>
                                                        <th>Surface Plancher</th>
                                                        <th>Nombre Étages</th>
                                                        <th>Avancement</th>
                                                        <th>Quartier</th>
                                                        <th>Commune</th>

                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Chart -->
                            <!-- <div class="col-lg-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Équipements par commune</h4>
                        <div id="chartCommune" style="width: 100%; height: 395px;"></div>
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
    $(function() {
        $.getJSON("assets/php/equipement/get_equipements_data.php", function(data) {
            var fonctions = Object.keys(data);
            var fonctionCounts = fonctions.map(f => {
                return Object.values(data[f]).reduce((a, b) => a + b, 0);
            });

            var fonctionChart = echarts.init(document.getElementById('fonctionChart'));
            var typologieChart = echarts.init(document.getElementById('typologieChart'));

            var gradientColors = [
                ['#f39c12', '#d35400'],
                ['#27ae60', '#145a32'],
                ['#2980b9', '#1a5276'],
                ['#8e44ad', '#512e5f'],
                ['#e74c3c', '#922b21'],
                ['#16a085', '#0b5345']
            ];

            // Fonction chart
            var optionFonction = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                xAxis: {
                    type: 'value',
                    splitLine: {
                        show: false
                    }
                },
                yAxis: {
                    type: 'category',
                    data: fonctions
                },
                series: [{
                    type: 'bar',
                    data: fonctionCounts,
                    itemStyle: {
                        color: function(params) {
                            var c = gradientColors[params.dataIndex % gradientColors.length];
                            return new echarts.graphic.LinearGradient(0, 0, 1, 1, [{
                                    offset: 0,
                                    color: c[0]
                                },
                                {
                                    offset: 1,
                                    color: c[1]
                                }
                            ]);
                        }
                    },
                    label: {
                        show: true,
                        position: 'right'
                    }
                }]
            };
            fonctionChart.setOption(optionFonction);

            // Typologie chart (updates when clicking fonction)
            function renderTypologieChart(fonction) {
                var categories = Object.keys(data[fonction]);
                var values = Object.values(data[fonction]);

                var optionTypologie = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
                        type: 'category',
                        data: categories,
                        axisLabel: {
                            rotate: 30
                        }
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                        type: 'bar',
                        data: values,
                        itemStyle: {
                            color: function(params) {
                                var c = gradientColors[params.dataIndex % gradientColors.length];
                                return new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                                        offset: 0,
                                        color: c[0]
                                    },
                                    {
                                        offset: 1,
                                        color: c[1]
                                    }
                                ]);
                            }
                        },
                        label: {
                            show: true,
                            position: 'top'
                        }
                    }]
                };
                typologieChart.setOption(optionTypologie);
            }

            // Default load = first fonction
            renderTypologieChart(fonctions[0]);

            // On click -> show breakdown
            fonctionChart.on('click', function(params) {
                renderTypologieChart(params.name);
            });
        });
    });

    /************************************************************************************** */
    $(function() {
        // Charger données depuis ton PHP
        $.getJSON("assets/php/equipement/equipement_by_quartier.php", function(data) {
            var quartiers = Object.keys(data); // ex: ["Quartier Q1", "Quartier Q2"]
            var values = Object.values(data); // ex: [5, 8]
            var totalEquipements = values.reduce((a, b) => a + b, 0);

            // === Graphique principal (bar chart) ===
            var quartierChart = echarts.init(document.getElementById('quartierChart'));
            var barOption = {
                backgroundColor: "#fff",
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                xAxis: {
                    type: 'category',
                    data: quartiers,
                    axisLabel: {
                        rotate: 45,
                        color: "#262626"
                    }
                },
                yAxis: {
                    type: 'value',
                    name: "Nombre d'équipements",
                    axisLabel: {
                        color: "#262626"
                    },
                    splitLine: {
                        show: false
                    }
                },
                series: [{
                    type: 'bar',
                    data: values,
                    itemStyle: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                                offset: 0,
                                color: '#a4c8f0'
                            },
                            {
                                offset: 1,
                                color: '#3a6b9b'
                            }
                        ]),
                        borderRadius: [6, 6, 0, 0],
                        shadowBlur: 10,
                        shadowColor: "rgba(0,0,0,0.5)"
                    },
                    label: {
                        show: true,
                        position: 'top',
                        color: "#262626",
                        fontWeight: "bold"
                    }
                }]
            };
            quartierChart.setOption(barOption);

            // === Donut chart (TOTAL seulement) ===
            var donutChart = echarts.init(document.getElementById('donutChart'));
            var donutOption = {
                backgroundColor: "#fff",
                series: [{
                    type: "pie",
                    radius: ["50%", "70%"],
                    avoidLabelOverlap: false,
                    label: {
                        show: false
                    },
                    labelLine: {
                        show: false
                    },
                    data: [{
                        value: totalEquipements,
                        name: "TOTAL"
                    }],
                    itemStyle: {
                        color: "#a4c8f0",
                        borderRadius: 10,
                        borderColor: "#23455e",
                        borderWidth: 2
                    }
                }],
                graphic: {
                    type: "text",
                    left: "center",
                    top: "center",
                    style: {
                        text: "TOTAL\n" + totalEquipements,
                        fill: "#262626",
                        fontSize: 20,
                        fontWeight: "bold",
                        textAlign: "center"
                    }
                }
            };
            donutChart.setOption(donutOption);

            // === Interaction: clic sur un quartier ===
            quartierChart.on('click', function(params) {
                var quartier = params.name;
                var value = params.value;
                var percent = ((value / totalEquipements) * 100).toFixed(2);

                // Cacher donut chart et montrer stat card
                $("#donutChart").hide();
                $("#statCard").css("display", "flex");

                // Mettre à jour la stat card
                $(".stat-title").text(`"${quartier}"`);
                $(".stat-number").text(value + " Equipements");
                $("#total").text(totalEquipements);
                $("#percent").text(percent + " %");
                $(".progress").css("width", percent + "%");
            });
        });
    });


    /**************************************************************************************************** */

    // $(function() {
    //     $.getJSON("assets/php/equipement/equipement_by_commune.php", function(dataFromPHP) {
    //         var treemapData = Object.keys(dataFromPHP).map(c => ({
    //             name: c,
    //             value: dataFromPHP[c]
    //         }));

    //         var treemapChart = echarts.init(document.getElementById('communeChart'));

    //         var option = {
    //             backgroundColor: "#fff",
    //             tooltip: {
    //                 formatter: function(info) {
    //                     return `<b>${info.name}</b><br/>Équipements: ${info.value}`;
    //                 }
    //             },
    //             series: [{
    //                 type: 'treemap',
    //                 data: treemapData,
    //                 label: {
    //                     show: true,
    //                     color: "#fff",
    //                     fontWeight: "bold",
    //                     formatter: "{b}\n{c}"
    //                 },
    //                 itemStyle: {
    //                     borderColor: "#329093",
    //                     borderWidth: 2,
    //                     gapWidth: 4
    //                 },
    //                 levels: [{
    //                     color: [
    //                         '#5DADE2', '#48C9B0', '#F4D03F',
    //                         '#EB984E', '#AF7AC5', '#F1948A', '#7FB3D5'
    //                     ]
    //                 }]
    //             }]
    //         };

    //         treemapChart.setOption(option);
    //     });
    // });

    /************************************************************************************ */
    $(document).ready(function() {
        $.getJSON("assets/php/equipement/repartition_typologies.php", function(data) {
            var communes = Object.keys(data);
            if (communes.length === 0) return;

            // --- 🔹 Calculate total for each commune ---
            var communeTotals = communes.map(c => {
                var total = Object.values(data[c]).reduce((a, b) => a + b, 0);
                return {
                    name: c,
                    total: total
                };
            });

            // --- 🔹 Sort communes by total descending ---
            communeTotals.sort((a, b) => b.total - a.total);

            // --- 🔹 Extract sorted names ---
            communes = communeTotals.map(c => c.name);

            // --- 🔹 Get all unique typologies ---
            var types = [...new Set(communes.flatMap(c => Object.keys(data[c])))];

            // --- 🔹 Build dataset for ECharts ---
            var series = types.map(type => ({
                name: type,
                type: 'bar',
                stack: false,
                emphasis: {
                    focus: 'series'
                },
                data: communes.map(c => data[c][type] || 0)
            }));

            var chart = echarts.init(document.getElementById('heatmapChart'));

            var option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
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
                        var axisVal = params[0] ? params[0].axisValue : '';
                        var html = '<div style="font-weight:700;margin-bottom:6px;">' + axisVal + '</div>';
                        var nonZero = params.filter(p => p.value && p.value > 0);

                        if (nonZero.length === 0) {
                            html += '<div>Aucun équipement</div>';
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
                    name: 'Nombre d’équipements'
                },
                series: series
            };

            chart.setOption(option);
        });
    });

    /**************************************************************************************** */

    fetch("assets/php/equipement/pyramide_equipement_par_commune.php")
        .then(response => response.json())
        .then(data => {
            // Trier du + grand au + petit
            var sortedData = Object.entries(data).sort((a, b) => b[1] - a[1]);

            // Transformer en série pour le funnel
            var seriesData = sortedData.map(d => ({
                name: d[0],
                value: d[1]
            }));

            var pyramidChart = echarts.init(document.getElementById('pyramidChart'));

            var option = {
                backgroundColor: "#fff",
                tooltip: {
                    trigger: "item",
                    formatter: "{b} : {c} équipements"
                },
                legend: {
                    bottom: 0,
                    textStyle: {
                        color: "#555", // ✅ text color (change here)
                        fontSize: 13
                    },
                    icon: "circle"
                },
                series: [{
                    name: "Communes",
                    type: "funnel",
                    sort: "descending",
                    gap: 5,
                    label: {
                        show: true,
                        position: "inside",
                        color: "#000", // ✅ black text inside the pyramid
                        fontWeight: "bold",
                        fontSize: 12
                    },
                    labelLine: {
                        show: false
                    },
                    itemStyle: {
                        borderWidth: 0, // ✅ remove border
                        borderColor: "transparent", // ✅ just in case
                        shadowBlur: 0, // ✅ remove shadow if you want it clean
                        shadowColor: "transparent"
                    },
                    data: seriesData,
                    color: [
                        "#27ae60", // vert (plus équipée)
                        "#e67e22", // orange
                        "#e74c3c" // rouge (moins équipée)
                    ]
                }]
            };

            pyramidChart.setOption(option);
        })
        .catch(err => console.error("Erreur de chargement:", err));

    /********************************************************************************** */

    var donutActivite = echarts.init(document.getElementById('donutChartAquipementParActivite'));

    function formatData(obj) {
        return Object.entries(obj).map(d => ({
            name: d[0],
            value: d[1]
        }));
    }

    function updateChart(type, data) {
        let dataset = formatData(type === "activite" ? data.activite : data.surface);
        let title = type === "activite" ? "Répartition des équipements par activité" : "Répartition des surfaces par commune";

        donutActivite.setOption({
            // title: {
            //     text: title,
            //     left: "center",
            //     textStyle: { color: "#262626", fontSize: 18, fontWeight: "bold" }
            // },
            tooltip: {
                trigger: "item",
                formatter: "{b} : {c} ({d}%)"
            },
            legend: {
                bottom: 0,
                textStyle: {
                    color: "#262626"
                },
                icon: "circle"
            },
            series: [{
                name: type === "activite" ? "Activités" : "Surfaces",
                type: "pie",
                radius: ["40%", "70%"],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: "#23455e",
                    borderWidth: 3
                },
                label: {
                    show: true,
                    formatter: "{b}\n{d}%",
                    color: "#262626",
                    fontWeight: "bold"
                },
                data: dataset,
                color: ["#27ae60", "#2980b9", "#f1c40f", "#9b59b6", "#e67e22"]
            }]
        });
    }

    // Charger les données via PHP
    let chartData = null;
    fetch("assets/php/equipement/activity_data.php")
        .then(res => res.json())
        .then(data => {
            chartData = data;
            updateChart("activite", chartData); // init par défaut

            // Listener sur radios
            document.querySelectorAll("input[name='chartType']").forEach(radio => {
                radio.addEventListener("change", function() {
                    updateChart(this.value, chartData);
                });
            });
        })
        .catch(err => console.error("Erreur chargement data:", err));


    /**************************************************************************************** */

    $(document).ready(function() {
        $.getJSON("assets/php/equipement/list_equipements.php", function(jsonData) {
            console.log("Equipements JSON:", jsonData);

            // 🟢 Sort data so that rows with COS or CES ≠ 0 appear first
            jsonData.sort((a, b) => {
                const aHasValue = (parseFloat(a.cos) !== 0 && !isNaN(a.cos)) || (parseFloat(a.ces) !== 0 && !isNaN(a.ces));
                const bHasValue = (parseFloat(b.cos) !== 0 && !isNaN(b.cos)) || (parseFloat(b.ces) !== 0 && !isNaN(b.ces));
                return bHasValue - aHasValue;
            });

            // 🟢 Initialize DataTable
            var table = $('#equipementTable').DataTable({
                data: jsonData,
                columns: [{
                        data: 'OBJECTID'
                    },
                    {
                        data: 'fonction'
                    },
                    {
                        data: 'equipement'
                    },
                    {
                        data: 'abreviation'
                    },
                    {
                        data: 'superficie_fonciere'
                    },
                    {
                        data: 'cos'
                    },
                    {
                        data: 'ces'
                    },
                    {
                        data: 'surface_plancher'
                    },
                    {
                        data: 'nbr_etage'
                    },
                    {
                        data: 'avancement'
                    },
                    {
                        data: 'n_quartier'
                    },
                    {
                        data: 'commune'
                    },
                ],
                pageLength: 5,
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'liste_des_equipements',
                    text: '📊 Exporter en Excel',
                    className: 'btn btn-success'
                }]
            });

            // 🟢 Populate filter <select> elements dynamically
            function populateSelect(selector, columnIndex) {
                let uniqueValues = new Set();
                table.column(columnIndex).data().each(function(value) {
                    if (value && value.trim() !== "") {
                        uniqueValues.add(value.trim());
                    }
                });

                const sorted = Array.from(uniqueValues).sort((a, b) => a.localeCompare(b, 'fr', {
                    numeric: true
                }));
                const select = $(selector);
                select.empty().append('<option value="">-- Tous --</option>');
                sorted.forEach(val => select.append(`<option value="${val}">${val}</option>`));
            }

            // Populate all filters including the new one
            populateSelect('#filterFonction', 1);
            populateSelect('#filterEquipement', 2); // 🆕 new filter
            populateSelect('#filterCommune', 11);
            populateSelect('#filterAvancement', 9);
            populateSelect('#filterQuartier', 10);

            // 🟢 Exact match filtering helper
            function exact(val) {
                return val ? '^' + $.fn.dataTable.util.escapeRegex(val) + '$' : '';
            }

            // 🟢 Apply Filters (Exact match)
            $('#applyFilter').on('click', function() {
                const fonction = $('#filterFonction').val();
                const equipement = $('#filterEquipement').val(); // 🆕 new filter value
                const commune = $('#filterCommune').val();
                const avancement = $('#filterAvancement').val();
                const quartier = $('#filterQuartier').val();

                table
                    .column(1).search(exact(fonction), true, false)
                    .column(2).search(exact(equipement), true, false) // 🆕 apply equipement filter
                    .column(11).search(exact(commune), true, false)
                    .column(9).search(exact(avancement), true, false)
                    .column(10).search(exact(quartier), true, false)
                    .draw();
            });

            // 🟢 Reset Filters
            $('#resetFilter').on('click', function() {
                $('#filterFonction, #filterEquipement, #filterCommune, #filterAvancement, #filterQuartier').val('');
                table.search('').columns().search('').draw();
            });
        });
    });


    /*********************************************************************************** */
    /*******************************************Surface foncier vs Surface plancher************************************************* */
    var chart3 = echarts.init(document.getElementById('chart3'));

    // Charger les données depuis PHP
    fetch('assets/php/residence/get_surface.php')
        .then(res => res.json())
        .then(data => {
            // Récupérer uniquement les données des quartiers
            const categories = data.quartiers;
            const foncier = data.surfaceFoncierQuart;
            const plancher = data.surfacePlancherQuart;

            chart3.setOption({
                //   title: {
                //     text: 'Surface par quartier',
                //     left: 'center',
                //     top: 10,
                //     textStyle: { fontSize: 15, fontWeight: 'bold' }
                //   },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    },
                    formatter: function(params) {
                        let content = `<strong>${params[0].name}</strong><br/>`;
                        params.forEach(p => {
                            content += `${p.marker} ${p.seriesName}: ${p.value} m²<br/>`;
                        });
                        return content;
                    }
                },
                legend: {
                    top: 40,
                    textStyle: {
                        fontSize: 12
                    }
                },
                xAxis: {
                    type: 'category',
                    data: categories,
                    axisLabel: {
                        rotate: 30,
                        fontSize: 11
                    }
                },
                yAxis: {
                    type: 'value',
                    name: 'm²'
                },
                series: [{
                        name: 'Surface foncier',
                        type: 'bar',
                        data: foncier,
                        itemStyle: {
                            color: '#3498db',
                            borderRadius: [6, 6, 0, 0]
                        }
                    },
                    {
                        name: 'Surface plancher',
                        type: 'bar',
                        data: plancher,
                        itemStyle: {
                            color: '#2ecc71',
                            borderRadius: [6, 6, 0, 0]
                        }
                    }
                ],
                animationEasing: 'elasticOut',
                animationDelay: function(idx) {
                    return idx * 100;
                }
            });
        })
        .catch(err => console.error("Erreur données surface:", err));

    window.addEventListener('resize', () => chart3.resize());
</script>