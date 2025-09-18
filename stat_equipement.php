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
</style>

<div class="page-wrapper">
    <br />
    <div class="container">
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'Equipements par Typologie</h4>
                        <div id="typologyChart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d'Equipements par Type</h4>
                        <div id="typeChart" style="width: 100%; height: 400px;"></div>
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
                        <h4 class="card-title" style="font-size:18px; font-weight:bold"> Répartition des types d’équipements par commune</h4>
                        <div id="stackedChart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Pyramide des quartiers selon les équipements</h4>
                        <div id="pyramidChart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Répartition des équipements par activité</h4>
                        <div id="donutChartAquipementParActivite" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <div class="card">
                    <div class="card-block" >
                        <h4 class="card-title">liste des équipements </h4>
                         <button id="resetFilter">Réinitialiser le filtre</button>
                        <table id="equipementTable" class="display">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Type</th>
                                    <th>Quartier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>École 1</td>
                                    <td>Écoles</td>
                                    <td>Quartier A</td>
                                </tr>
                                <tr>
                                    <td>Hôpital 1</td>
                                    <td>Santé</td>
                                    <td>Quartier A</td>
                                </tr>
                                <tr>
                                    <td>Stade 1</td>
                                    <td>Sport</td>
                                    <td>Quartier B</td>
                                </tr>
                                <tr>
                                    <td>Bibliothèque</td>
                                    <td>Culture</td>
                                    <td>Quartier C</td>
                                </tr>
                                <tr>
                                    <td>École 2</td>
                                    <td>Écoles</td>
                                    <td>Quartier B</td>
                                </tr>
                                <tr>
                                    <td>Clinique</td>
                                    <td>Santé</td>
                                    <td>Quartier C</td>
                                </tr>
                                <tr>
                                    <td>Marché</td>
                                    <td>Commerce</td>
                                    <td>Quartier D</td>
                                </tr>
                                <tr>
                                    <td>École 3</td>
                                    <td>Écoles</td>
                                    <td>Quartier D</td>
                                </tr>
                                <tr>
                                    <td>Complexe Sportif</td>
                                    <td>Sport</td>
                                    <td>Quartier A</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Equipements par quartier</h4>
                        <div id="chartQuartier" style="width: 100%; height: 395px;"></div>
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
        // === Sample Data ===
        var data = {
            "EQUIPEMENTS ADMINISTRATIFS": {
                "Mairie": 30,
                "Préfecture": 10,
                "Tribunal": 8
            },
            "EQUIPEMENTS CULTURELS": {
                "Bibliothèque": 15,
                "Théâtre": 7,
                "Musée": 6
            },
            "EQUIPEMENTS DE COMMERCES ET SERVICES": {
                "Supermarché": 150,
                "Marché": 200,
                "Boutique": 250
            },
            "EQUIPEMENTS EDUCATIFS": {
                "Écoles primaires": 120,
                "Collèges": 60,
                "Lycées": 30
            }
        };

        var typologies = Object.keys(data);
        var typologyCounts = typologies.map(t => {
            return Object.values(data[t]).reduce((a, b) => a + b, 0);
        });

        var typologyChart = echarts.init(document.getElementById('typologyChart'));
        var typeChart = echarts.init(document.getElementById('typeChart'));

        // Gradient colors (to simulate 3D shading)
        var gradientColors = [
            ['#f39c12', '#d35400'],
            ['#27ae60', '#145a32'],
            ['#2980b9', '#1a5276'],
            ['#8e44ad', '#512e5f'],
            ['#e74c3c', '#922b21'],
            ['#16a085', '#0b5345'],
            ['#d35400', '#873600'],
            ['#2ecc71', '#1d8348'],
            ['#c0392b', '#641e16'],
            ['#3498db', '#1f618d'],
            ['#9b59b6', '#5b2c6f'],
            ['#f1c40f', '#9a7d0a'],
            ['#1abc9c', '#117864'],
            ['#34495e', '#1c2833'],
            ['#7f8c8d', '#4d5656']
        ];

        // Typology Chart
        var optionTypology = {
            backgroundColor: "#fff",
            // title: {
            //     text: "Nombre d'Equipements par Typologie",
            //     left: 'center',
            //     textStyle: {
            //         color: "#262626",
            //         fontSize: 18,
            //         fontWeight: "bold"
            //     }
            // },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            xAxis: {
                type: 'value',
                axisLabel: {
                    color: "#262626"
                },
                splitLine: {
                    show: false
                }
            },
            yAxis: {
                type: 'category',
                data: typologies,
                axisLabel: {
                    color: "#262626",
                    fontWeight: "bold"
                }
            },
            series: [{
                type: 'bar',
                data: typologyCounts,
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
                    },
                    borderRadius: [4, 12, 12, 4],
                    shadowBlur: 12,
                    shadowColor: "rgba(0,0,0,0.6)",
                    shadowOffsetX: 4,
                    shadowOffsetY: 4
                },
                label: {
                    show: true,
                    position: 'right',
                    color: "#262626",
                    fontWeight: "bold"
                }
            }]
        };
        typologyChart.setOption(optionTypology);

        // Type Chart
        function renderTypeChart(filterTypology = null) {
            var categories = [];
            var values = [];

            if (filterTypology) {
                categories = Object.keys(data[filterTypology]);
                values = Object.values(data[filterTypology]);
            } else {
                for (var t in data) {
                    for (var type in data[t]) {
                        categories.push(type);
                        values.push(data[t][type]);
                    }
                }
            }

            var optionType = {
                backgroundColor: "#fff",
                // title: {
                //     text: "Nombre d'Equipements par Type",
                //     left: 'center',
                //     textStyle: {
                //         color: "#262626",
                //         fontSize: 18,
                //         fontWeight: "bold"
                //     }
                // },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                xAxis: {
                    type: 'category',
                    data: categories,
                    axisLabel: {
                        rotate: 45,
                        color: "#262626"
                    }
                },
                yAxis: {
                    type: 'value',
                    name: "Nombre d'equipements",
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
                        },
                        borderRadius: [12, 12, 0, 0],
                        shadowBlur: 12,
                        shadowColor: "rgba(0,0,0,0.6)",
                        shadowOffsetX: 3,
                        shadowOffsetY: 5
                    },
                    label: {
                        show: true,
                        position: 'top',
                        color: "#262626",
                        fontWeight: "bold"
                    }
                }]
            };
            typeChart.setOption(optionType);
        }

        renderTypeChart();

        // Click interaction
        typologyChart.on('click', function(params) {
            renderTypeChart(params.name);
        });
    });
    /************************************************************************************** */
    $(function() {
        // === Example data (à remplacer avec ta base) ===
        var data = {
            "Quartier A": 120,
            "Quartier B": 80,
            "Quartier C": 50,
            "Quartier D": 200,
            "Quartier E": 60,
            "Quartier F": 30
        };

        var quartiers = Object.keys(data);
        var values = Object.values(data);
        var totalEquipements = values.reduce((a, b) => a + b, 0);

        // === Graphique principal (bar chart) ===
        var quartierChart = echarts.init(document.getElementById('quartierChart'));
        var barOption = {
            backgroundColor: "#fff",
            // title: {
            //     text: "Nombre d'Equipements par Quartier",
            //     left: 'center',
            //     textStyle: {
            //         color: "#fff",
            //         fontSize: 18,
            //         fontWeight: "bold"
            //     }
            // },
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


    /**************************************************************************************************** */

    var data = {
        "Commune A": 320,
        "Commune B": 150,
        "Commune C": 210,

    };

    var treemapData = Object.keys(data).map(c => ({
        name: c,
        value: data[c]
    }));

    var treemapChart = echarts.init(document.getElementById('communeChart'));

    var option = {
        backgroundColor: "#fff",
        // title: {
        //     text: "Répartition des Equipements par Commune",
        //     left: 'center',
        //     textStyle: { color: "#fff", fontSize: 20, fontWeight: "bold" }
        // },
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

    /************************************************************************************ */

    var data = {
        "Commune A": {
            "Écoles": 120,
            "Santé": 80,
            "Sport": 50,
            "Commerces": 70
        },
        "Commune B": {
            "Écoles": 90,
            "Santé": 40,
            "Sport": 20,
            "Commerces": 50
        },
        "Commune C": {
            "Écoles": 100,
            "Santé": 60,
            "Sport": 30,
            "Commerces": 20
        },
        "Commune D": {
            "Écoles": 50,
            "Santé": 25,
            "Sport": 15,
            "Commerces": 30
        },
        "Commune E": {
            "Écoles": 70,
            "Santé": 40,
            "Sport": 25,
            "Commerces": 20
        }
    };

    // Extraire communes et types
    var communes = Object.keys(data);
    var types = Object.keys(data[communes[0]]);

    // Préparer les séries pour le stacked chart
    var series = types.map(type => ({
        name: type,
        type: 'bar',
        stack: 'total',
        emphasis: {
            focus: 'series'
        },
        label: {
            show: true,
            color: "#fff"
        },
        data: communes.map(c => data[c][type])
    }));

    // Créer le graphique
    var stackedChart = echarts.init(document.getElementById('stackedChart'));

    var option = {
        backgroundColor: "#fff",
        // title: {
        //     text: "Répartition des types d’équipements par commune",
        //     left: 'center',
        //     textStyle: { color: "#fff", fontSize: 20, fontWeight: "bold" }
        // },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: types,
            top: 30,
            textStyle: {
                color: "#262626"
            }
        },
        grid: {
            left: '5%',
            right: '5%',
            bottom: '10%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            data: communes,
            axisLabel: {
                color: "#262626"
            },
            axisLine: {
                lineStyle: {
                    color: "#aaa"
                }
            }
        },
        yAxis: {
            type: 'value',
            name: "Nombre d'équipements",
            axisLabel: {
                color: "#262626"
            },
            axisLine: {
                lineStyle: {
                    color: "#aaa"
                }
            },
            splitLine: {
                show: false
            }
        },
        series: series,
        color: ['#5DADE2', '#48C9B0', '#F4D03F', '#EB984E', '#AF7AC5']
    };

    stackedChart.setOption(option);

    /**************************************************************************************** */

    var data = {
        "Quartier A": 300,
        "Quartier B": 180,
        "Quartier C": 140,

    };

    // Transformer en tableau trié du + grand au + petit
    var sortedData = Object.entries(data).sort((a, b) => b[1] - a[1]);

    // Préparer pour le funnel chart
    var seriesData = sortedData.map(d => ({
        name: d[0],
        value: d[1]
    }));

    var pyramidChart = echarts.init(document.getElementById('pyramidChart'));

    var option = {
        backgroundColor: "#fff",
        title: {
            text: "Pyramide des quartiers selon les équipements",
            left: "center",
            textStyle: {
                color: "#fff",
                fontSize: 22,
                fontWeight: "bold"
            }
        },
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
            name: "Quartiers",
            type: "funnel",
            sort: "descending", // du plus grand en haut vers le plus petit en bas
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
                "#27ae60", // vert (plus équipé)


                "#e67e22",
                "#e74c3c" // rouge (moins équipé)
            ]
        }]
    };

    pyramidChart.setOption(option);


    /********************************************************************************** */


    // === Exemple de dataset par activité ===
    var data = {
        "Écoles": 420,
        "Santé": 280,
        "Sport": 160,
        "Culture": 90,
        "Commerces": 150
    };

    var seriesData = Object.entries(data).map(d => ({
        name: d[0],
        value: d[1]
    }));

    var donutActivite = echarts.init(document.getElementById('donutChartAquipementParActivite'));

    var option = {
        backgroundColor: "#fff",
        //   title: {
        //     text: "Répartition des équipements par activité",
        //     left: "center",
        //     textStyle: { color: "#262626", fontSize: 20, fontWeight: "bold" }
        //   },
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
            name: "Activités",
            type: "pie",
            radius: ["40%", "70%"], // Donut
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
            data: seriesData,
            color: [
                "#27ae60", // écoles
                "#2980b9", // santé
                "#f1c40f", // sport
                "#9b59b6", // culture
                "#e67e22" // commerces
            ]
        }]
    };

    donutActivite.setOption(option);


    /**************************************************************************************** */





   $(document).ready(function() {
      // Initialiser DataTable
var table = $('#equipementTable').DataTable({
  pageLength: 5 // Affiche seulement 6 lignes par page
});



      // Préparer les données du chart (nombre par quartier)
      var data = {};
      table.rows().every(function() {
        var quartier = this.data()[2].trim();
        data[quartier] = (data[quartier] || 0) + 1;
      });

      var chartData = Object.keys(data).map(function(q) {
        return { value: data[q], name: q };
      });

      // Initialiser le Nightingale Chart
      var chart = echarts.init(document.getElementById('chartQuartier'));
      var option = {
        backgroundColor: "#fff",
        // title: {
        //   text: "Équipements par quartier",
        //   left: "center",
        //   textStyle: { color: "#262626", fontSize: 18, fontWeight: "bold" }
        // },
        tooltip: { trigger: "item" },
        legend: {
          bottom: 0,
          textStyle: { color: "#262626" }
        },
        series: [
          {
            name: "Quartiers",
            type: "pie",
            radius: [30, 150],
            center: ["50%", "50%"],
            roseType: "area",
            itemStyle: {
              borderRadius: 8
            },
            label: {
              color: "#262626",
              fontWeight: "bold"
            },
            data: chartData
          }
        ]
      };
      chart.setOption(option);

      // Filtrer tableau au clic sur quartier (exact match)
      chart.on("click", function(params) {
        var quartier = params.name;
        table.column(2).search('^' + quartier + '$', true, false).draw();
      });

      // Bouton reset filtre
      $("#resetFilter").on("click", function() {
        table.column(2).search("").draw(); // reset search
      });
    });
</script>