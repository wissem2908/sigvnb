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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition des Equipements par Commune</h4>
                        <div id="communeChart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
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
                        <h4 class="card-title">Pyramide des communes selon les équipements</h4>
                        <div id="pyramidChart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Activité par commune/surface</h4>
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


<div class="col-lg-8">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">Liste des équipements</h4>
            <button id="resetFilter">Réinitialiser le filtre</button>
            
            <!-- Scroll wrapper -->
            <div style="overflow-x: auto;">
                <table id="equipementTable" class="display" style="width:100%; min-width: 1200px;">
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
                            <th>Nom</th>
                            <th>Observation</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- End Scroll wrapper -->
        </div>
    </div>
</div>


            <!-- Chart -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Équipements par commune</h4>
                        <div id="chartCommune" style="width: 100%; height: 395px;"></div>
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

    $(function() {
        $.getJSON("assets/php/equipement/equipement_by_commune.php", function(dataFromPHP) {
            var treemapData = Object.keys(dataFromPHP).map(c => ({
                name: c,
                value: dataFromPHP[c]
            }));

            var treemapChart = echarts.init(document.getElementById('communeChart'));

            var option = {
                backgroundColor: "#fff",
                tooltip: {
                    formatter: function(info) {
                        return `<b>${info.name}</b><br/>Équipements: ${info.value}`;
                    }
                },
                series: [{
                    type: 'treemap',
                    data: treemapData,
                    label: {
                        show: true,
                        color: "#fff",
                        fontWeight: "bold",
                        formatter: "{b}\n{c}"
                    },
                    itemStyle: {
                        borderColor: "#329093",
                        borderWidth: 2,
                        gapWidth: 4
                    },
                    levels: [{
                        color: [
                            '#5DADE2', '#48C9B0', '#F4D03F',
                            '#EB984E', '#AF7AC5', '#F1948A', '#7FB3D5'
                        ]
                    }]
                }]
            };

            treemapChart.setOption(option);
        });
    });

    /************************************************************************************ */
$(document).ready(function () {
    $.getJSON("assets/php/equipement/repartition_typologies.php", function (data) {
        console.log("Heatmap Data:", data);

        var communes = Object.keys(data);
        if (communes.length === 0) return;

        // Récupérer toutes les typologies uniques
        var types = [...new Set(communes.flatMap(c => Object.keys(data[c])))] ;

        // Construire dataset pour heatmap : [x, y, value]
        var heatmapData = [];
        communes.forEach((commune, i) => {
            types.forEach((type, j) => {
                heatmapData.push([i, j, data[commune][type] || 0]);
            });
        });

        var chart = echarts.init(document.getElementById('heatmapChart'));

        var option = {
            tooltip: {
                position: 'top',
                formatter: function (params) {
                    return communes[params.value[0]] + " - " + types[params.value[1]] +
                           " : " + params.value[2] + " équipements";
                }
            },
            grid: {
                left: '15%',
                bottom: '15%'
            },
            xAxis: {
                type: 'category',
                data: communes,
                splitArea: { show: true },
                axisLabel: { color: "#262626", rotate: 30 }
            },
            yAxis: {
                type: 'category',
                data: types,
                splitArea: { show: true },
                axisLabel: { color: "#262626" }
            },
            visualMap: {
                min: 0,
                max: Math.max(...heatmapData.map(d => d[2])),
                calculable: true,
                orient: 'horizontal',
                left: 'center',
                bottom: '5%'
            },
            series: [{
                name: 'Équipements',
                type: 'heatmap',
                data: heatmapData,
                label: { show: false },
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
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
                //   title: {
                //       text: "Pyramide des communes selon les équipements",
                //       left: "center",
                //       textStyle: {
                //           color: "#262626",
                //           fontSize: 22,
                //           fontWeight: "bold"
                //       }
                //   },
                tooltip: {
                    trigger: "item",
                    formatter: "{b} : {c} équipements"
                },
                legend: {
                    bottom: 0,
                    textStyle: {
                        color: "#262626"
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
                        color: "#fff",
                        fontWeight: "bold"
                    },
                    labelLine: {
                        show: false
                    },
                    itemStyle: {
                        borderRadius: 5,
                        shadowBlur: 10,
                        shadowColor: "rgba(0,0,0,0.3)"
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
    return Object.entries(obj).map(d => ({ name: d[0], value: d[1] }));
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
        tooltip: { trigger: "item", formatter: "{b} : {c} ({d}%)" },
        legend: { bottom: 0, textStyle: { color: "#262626" }, icon: "circle" },
        series: [{
            name: type === "activite" ? "Activités" : "Surfaces",
            type: "pie",
            radius: ["40%", "70%"],
            avoidLabelOverlap: false,
            itemStyle: { borderRadius: 10, borderColor: "#23455e", borderWidth: 3 },
            label: { show: true, formatter: "{b}\n{d}%", color: "#262626", fontWeight: "bold" },
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
            radio.addEventListener("change", function () {
                updateChart(this.value, chartData);
            });
        });
    })
    .catch(err => console.error("Erreur chargement data:", err));


    /**************************************************************************************** */




$(document).ready(function () {
    $.getJSON("assets/php/equipement/list_equipements.php", function (jsonData) {
        console.log("Equipements JSON:", jsonData);

        // DataTable
        var table = $('#equipementTable').DataTable({
            data: jsonData,
            columns: [
                { data: 'OBJECTID' },
                { data: 'fonction' },
                { data: 'equipement' },
                { data: 'abreviation' },
                { data: 'superficie_fonciere' },
                { data: 'cos' },
                { data: 'ces' },
                { data: 'surface_plancher' },
                { data: 'nbr_etage' },
                { data: 'avancement' },
                { data: 'n_quartier' },
                { data: 'commune' },
                { data: 'nom' },
                { data: 'observation' }
            ],
            pageLength: 3
        });

        // Chart data
        var data = {};
        jsonData.forEach(function (row) {
            var commune = row.commune ? row.commune.trim() : "Inconnue";
            data[commune] = (data[commune] || 0) + 1;
        });

        var chartData = Object.keys(data).map(function (c) {
            return { value: data[c], name: c };
        });

        // Init ECharts
        var chart = echarts.init(document.getElementById('chartCommune'));
        var option = {
            tooltip: { trigger: "item" },
            legend: { bottom: 0, textStyle: { color: "#262626" } },
            series: [{
                name: "Communes",
                type: "pie",
                radius: [30, 150],
                center: ["50%", "50%"],
                roseType: "area",
                itemStyle: { borderRadius: 8 },
                label: { color: "#262626", fontWeight: "bold" },
                data: chartData
            }]
        };
        chart.setOption(option);

        // Filter table on chart click
        chart.on("click", function (params) {
            var commune = params.name;
            table.column(11).search('^' + commune + '$', true, false).draw();
        });

        // Reset filter
      $("#resetFilter").off('click').on('click', function () {
    console.log("Reset filter clicked");

    // Clear global search and ALL column searches, then redraw
    table.search('').columns().search('').draw();

    // Also clear the DataTables built-in search input (UI)
    $('.dataTables_filter input[type="search"]').val('');

    // If you used regex column searches previously, you can explicitly clear them like:
    // table.column(11).search('', false, false); // (col index for 'commune')
    // table.draw();
});
    });
});

</script>