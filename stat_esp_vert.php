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

    /************************************************************ */

    /* Scroll container */
    .scroll-container {
        position: relative;
        overflow: hidden;
    }

    .scroll-wrapper {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding-bottom: 10px;
    }

    .scroll-wrapper::-webkit-scrollbar {
        display: none;
        /* hide scrollbar */
    }

    /* Flip Card */
    .flip-card {
        flex: 0 0 280px;
        /* fixed width */
        height: 350px;
        /* fixed height */
        perspective: 1000px;
        border-radius: 20px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.8s ease;
        transform-style: preserve-3d;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 20px;
        backface-visibility: hidden;
        overflow: hidden;
    }

    .flip-card-front img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
        border-radius: 20px;
    }

    .flip-card:hover .flip-card-front img {
        transform: scale(1.1);
    }

    .flip-card-back {
        background: linear-gradient(135deg, #318f94, #5cc38c);
        color: white;
        transform: rotateY(180deg);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
    }

    .flip-card-back h5 {
        font-size: 1.3rem;
        margin-bottom: 10px;
    }

    /* Navigation arrows */
    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .scroll-btn.left {
        left: -20px;
    }

    .scroll-btn.right {
        right: -20px;
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
                        <h3><b class="text-white"> Espace vert et aménagement paysager </b></h3>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface des espaces verts par quartier</h4>
                                    <div id="chartEV1" style="height:375px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <!-- 2. Typologie galerie -->

                        <style>
                            .scroll-btn {
                                position: absolute;
                                top: 50%;
                                transform: translateY(-50%);
                                background: #16a085;
                                color: white;
                                border: none;
                                border-radius: 50%;
                                width: 35px;
                                height: 35px;
                                cursor: pointer;
                            }

                            .scroll-btn.left {
                                left: 0;
                            }

                            .scroll-btn.right {
                                right: 0;
                            }
                        </style>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">
                                        Typologie par photo + fiche technique
                                    </h4>

                                    <div class="scroll-container mt-4">
                                        <button class="scroll-btn left" onclick="scrollGallery(-1)">&#10094;</button>
                                        <div id="gallery" class="scroll-wrapper"></div>
                                        <button class="scroll-btn right" onclick="scrollGallery(1)">&#10095;</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- ************************************ parcs **************************************************** -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface totale par thématique (Parc)</h4>
                                    <div id="chartSurfaceThematique" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d’arbres par thématique (Parc)</h4>
                                    <div id="chartArbresThematique" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Types de plantation (Parc)</h4>
                                    <div id="chartTypePlantation" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface totale par quartier (Parc)</h4>
                                    <div id="chartSurfaceQuartier" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>


                        <!-- ************************************ parcs **************************************************** -->

                        <!-- 3. Nombre de plantations par quartier -->
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre de plantations par quartier</h4>
                                    <div id="chartEV3" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Espace vert par type -->
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Espace vert par type</h4>
                                    <div id="chartEV4" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 5. Espace vert / Surface bâtie -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Espace vert / Surface bâtie par quartier</h4>
                                    <div id="chartEV5" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>



                        <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Superficie plantée</h4>
                                    <div id="chartSuperficie" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Taux d'avancement </h4>
                                    <div id="chartAvancement" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d’arbres plantés</h4>
                                    <div id="chartArbres" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Type et nature de plantation</h4>
                                    <div id="chartTypeNature" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition par gestionnaire</h4>
                                    <div id="chartGestionnaire" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">État physique </h4>
                                    <div id="chartEtat" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition par commune </h4>
                                    <div id="chartCommune" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Superficie plantée vs totale</h4>
                                    <div id="chartSuperficie_ceinture_verte" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->

                    <!-- 
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Avancement du projet (%)</h4>
                                    <div id="chartAvancement_ceinture_verte" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->

                    <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Avancement par statut (%)</h4>
                                    <div id="chartAvancementStatus" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->

                    <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre d’arbres plantés</h4>
                                    <div id="chartArbres" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->
                    <!-- 
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition par type de plantation</h4>
                                    <div id="chartPlantationType" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->


                    <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Détails par gestionnaire</h4>
                        <div id="chartGestionnaireDetail" style="height:400px;"></div>
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
    $(document).ready(function() {
        /**************** 1. Surface des espaces verts par quartier *****************/
        var chartEV1 = echarts.init(document.getElementById('chartEV1'));

        fetch('assets/php/espace_vert/espaces_verts_surface_par_quartier.php')
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                chartEV1.setOption({
                    tooltip: {
                        formatter: "{b}: {c} m²"
                    },
                    visualMap: {
                        min: 0,
                        max: Math.max(...data.map(d => d.value)) || 1000,
                        left: 'left',
                        top: 'bottom',
                        text: ['Plus', 'Moins'],
                        calculable: true,
                        inRange: {
                            color: ['#c8e6c9', '#2e7d32']
                        }
                    },
                    series: [{
                        type: 'treemap',
                        data: data
                    }]
                });
            })
            .catch(err => console.error('Erreur chargement données:', err));
        /****************************************************************** */




        /**************** 3. Nombre de plantations par quartier *****************/
        var chartEV3 = echarts.init(document.getElementById('chartEV3'));

        fetch('assets/php/espace_vert/plantations_par_quartier.php')
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                chartEV3.setOption({
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
                        type: 'value',
                        name: 'Plantations'
                    },
                    yAxis: {
                        type: 'category',
                        data: data.quartiers
                    },
                    series: [{
                        type: 'bar',
                        data: data.data,
                        label: {
                            show: true,
                            position: 'right',
                            fontWeight: 'bold'
                        },
                        animationDuration: 1200
                    }]
                });
            })
            .catch(err => console.error('Erreur chargement données:', err));
        /**************** 4. Espace vert par type *****************/
        var chartEV4 = echarts.init(document.getElementById('chartEV4'));

        fetch('assets/php/espace_vert/espaces_verts_repartition.php')
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                chartEV4.setOption({
                    tooltip: {
                        trigger: 'item',
                        formatter: '{b}: {c} m² ({d}%)'
                    },
                    legend: {
                        orient: 'vertical',
                        right: 10,
                        top: 'middle'
                    },
                    series: [{
                        name: 'Superficie',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                            show: true,
                            position: 'outside'
                        },
                        labelLine: {
                            show: true,
                            length: 15,
                            length2: 10
                        },
                        data: data,
                        itemStyle: {
                            borderRadius: 6,
                            borderColor: '#fff',
                            borderWidth: 2
                        }
                    }],
                    color: [
                        '#5470C6', '#91CC75', '#FAC858',
                        '#EE6666', '#73C0DE', '#3BA272',
                        '#FC8452', '#9A60B4', '#EA7CCC'
                    ]
                });
            })
            .catch(err => console.error('Erreur chargement données:', err));
        /**************** 5. Espace vert / Surface bâtie *****************/
fetch('assets/php/espace_vert/get_espace_vert_bati.php')
    .then(res => res.json())
    .then(data => {
        const quartiers = data.map(d => d.quartier);
        const ev = data.map(d => d.espace_vert);
        const bati = data.map(d => d.surface_batie);

        var chartEV5 = echarts.init(document.getElementById('chartEV5'));
        chartEV5.setOption({
            tooltip: {
                trigger: 'axis',
                formatter: function(params) {
                    let ev = params[0].value,
                        bati = params[1].value;
                    let ratio = (ev / (ev + bati) * 100).toFixed(1);
                    return params[0].axisValue + "<br/>Espace vert: " + ev.toLocaleString() + " m²<br/>Surface bâtie: " + bati.toLocaleString() + " m²<br/>Ratio: " + ratio + "%";
                }
            },
            legend: { data: ['Espace vert', 'Surface bâtie'] },
            xAxis: { type: 'category', data: quartiers },
            yAxis: { type: 'value', name: 'm²' },
            series: [
                { name: 'Espace vert', type: 'bar', stack: 'total', data: ev, itemStyle: { color: '#66BB6A' } },
                { name: 'Surface bâtie', type: 'bar', stack: 'total', data: bati, itemStyle: { color: '#8D6E63' } }
            ]
        });
    });
    });

    /************************************************ centure verte************************************************************** */
    // var chart = echarts.init(document.getElementById('chartSuperficie_ceinture_verte'));

    // var option = {
    //     backgroundColor: '#fff',
    //     // title: {
    //     //     text: 'Superficie plantée vs totale',
    //     //     left: 'center',
    //     //     textStyle: { color: '#262626', fontSize: 18 }
    //     // },
    //     tooltip: {
    //         trigger: 'item'
    //     },
    //     legend: {
    //         bottom: 0,
    //         textStyle: {
    //             color: '#262626'
    //         }
    //     },
    //     series: [{
    //         name: 'Superficie',
    //         type: 'pie',
    //         radius: ['40%', '70%'],
    //         avoidLabelOverlap: false,
    //         itemStyle: {
    //             borderRadius: 10,
    //             borderColor: '#1b2a47',
    //             borderWidth: 2
    //         },
    //         label: {
    //             show: true,
    //             formatter: '{b}: {d}%'
    //         },
    //         data: [{
    //                 value: 320,
    //                 name: 'Plantée'
    //             },
    //             {
    //                 value: 180,
    //                 name: 'Non plantée'
    //             }
    //         ]
    //     }]
    // };

    // chart.setOption(option);

    /*************************************************************************** */

    // var chart = echarts.init(document.getElementById('chartAvancement_ceinture_verte'));

    // var option = {
    //     backgroundColor: '#fff',
    //     // title: {
    //     //     text: 'Avancement du projet (%)',
    //     //     left: 'center',
    //     //     textStyle: { color: '#fff', fontSize: 18 }
    //     // },
    //     series: [{
    //         type: 'gauge',
    //         startAngle: 180,
    //         endAngle: 0,
    //         center: ['50%', '65%'],
    //         radius: '90%',
    //         min: 0,
    //         max: 100,
    //         splitNumber: 10,
    //         axisLine: {
    //             lineStyle: {
    //                 width: 15,
    //                 color: [
    //                     [0.3, '#ff4c4c'], // Rouge = faible
    //                     [0.7, '#ffb84c'], // Orange = moyen
    //                     [1, '#4caf50'] // Vert = bon
    //                 ]
    //             }
    //         },
    //         pointer: {
    //             icon: 'rect',
    //             length: '60%',
    //             width: 6,
    //             offsetCenter: [0, '0%'],
    //             itemStyle: {
    //                 color: '#262626'
    //             }
    //         },
    //         axisLabel: {
    //             color: '#262626'
    //         },
    //         axisTick: {
    //             show: false
    //         },
    //         splitLine: {
    //             length: 15,
    //             lineStyle: {
    //                 color: '#262626'
    //             }
    //         },
    //         detail: {
    //             fontSize: 22,
    //             color: '#262626',
    //             offsetCenter: [0, '40%'],
    //             formatter: '{value} %'
    //         },
    //         data: [{
    //             value: 65
    //         }]
    //     }]
    // };

    // chart.setOption(option);

    /******************************************************************* */
    //   $(document).ready(function() {
    //     var chart = echarts.init(document.getElementById('chartAvancementStatus'));

    //     var option = {
    //         backgroundColor: '#fff',
    //         // title: {
    //         //     text: 'Avancement par statut (%)',
    //         //     left: 'center',
    //         //     textStyle: { color: '#fff', fontSize: 18 }
    //         // },
    //         tooltip: {
    //             trigger: 'axis',
    //             axisPointer: {
    //                 type: 'shadow'
    //             }
    //         },
    //         xAxis: {
    //             type: 'value',
    //             max: 100,
    //             axisLine: {
    //                 lineStyle: {
    //                     color: '#262626'
    //                 }
    //             },
    //             splitLine: {
    //                 show: false
    //             }
    //         },
    //         yAxis: {
    //             type: 'category',
    //             data: ['Planifié', 'En cours', 'Achevé'],
    //             axisLine: {
    //                 lineStyle: {
    //                     color: '#262626'
    //                 }
    //             },
    //             axisLabel: {
    //                 color: '#262626'
    //             }
    //         },
    //         series: [{
    //             type: 'bar',
    //             data: [20, 50, 30], // % pour chaque statut
    //             barWidth: '40%',
    //             itemStyle: {
    //                 borderRadius: [5, 5, 5, 5],
    //                 color: function(params) {
    //                     const colors = ['#ff9800', '#03a9f4', '#4caf50'];
    //                     return colors[params.dataIndex];
    //                 }
    //             },
    //             label: {
    //                 show: true,
    //                 position: 'right',
    //                 formatter: '{c} %',
    //                 color: '#262626',
    //                 fontWeight: 'bold'
    //             }
    //         }]
    //     };

    //     chart.setOption(option);
    // });

    /*********************************** */

    // var chart = echarts.init(document.getElementById('chartArbres'));

    // var option = {
    //     backgroundColor: '#fff',
    //     // title: {
    //     //     text: 'Nombre d’arbres plantés',
    //     //     left: 'center',
    //     //     top: 20,
    //     //     textStyle: { color: '#262626', fontSize: 20 }
    //     // },
    //     series: [{
    //         type: 'gauge',
    //         startAngle: 90,
    //         endAngle: -270,
    //         pointer: {
    //             show: false
    //         },
    //         progress: {
    //             show: true,
    //             overlap: false,
    //             roundCap: true,
    //             clip: false,
    //             itemStyle: {
    //                 color: '#4caf50'
    //             }
    //         },
    //         axisLine: {
    //             lineStyle: {
    //                 width: 20,
    //                 color: [
    //                     [1, '#234']
    //                 ]
    //             }
    //         },
    //         splitLine: {
    //             show: false
    //         },
    //         axisTick: {
    //             show: false
    //         },
    //         axisLabel: {
    //             show: false
    //         },
    //         data: [{
    //             value: 7500,
    //             name: 'Arbres'
    //         }], // valeur = nb d'arbres plantés
    //         detail: {
    //             valueAnimation: true,
    //             fontSize: 30,
    //             color: '#262626',
    //             offsetCenter: [0, '0%'],
    //             formatter: '{value} 🌳'
    //         }
    //     }]
    // };

    // chart.setOption(option);

    /************************************* */
    // var chart = echarts.init(document.getElementById('chartPlantationType'));

    // fetch('assets/php/espace_vert/plantation_repartition_type.php')
    //     .then(res => res.json())
    //     .then(data => {
    //         if (data.error) {
    //             console.error(data.error);
    //             return;
    //         }

    //         var option = {
    //             backgroundColor: '#fff',
    //             tooltip: {
    //                 trigger: "item"
    //             },
    //             legend: {
    //                 bottom: 0,
    //                 textStyle: {
    //                     color: "#262626"
    //                 }
    //             },
    //             series: [{
    //                 name: "Plantations",
    //                 type: "pie",
    //                 radius: [30, 150],
    //                 center: ["50%", "50%"],
    //                 roseType: "area",
    //                 itemStyle: {
    //                     borderRadius: 8
    //                 },
    //                 label: {
    //                     color: "#262626",
    //                     fontWeight: "bold"
    //                 },
    //                 data: data
    //             }],
    //             color: [
    //                 '#5470C6', '#91CC75', '#FAC858',
    //                 '#EE6666', '#73C0DE', '#3BA272',
    //                 '#FC8452', '#9A60B4', '#EA7CCC'
    //             ]
    //         };

    //         chart.setOption(option);
    //     })
    //     .catch(err => console.error('Erreur chargement données:', err));
    /**************************************************** */

    // var chart = echarts.init(document.getElementById('chartGestionnaireDetail'));

    // var option = {
    //     backgroundColor: '#fff',
    //     // title: {
    //     //     text: "Détails par gestionnaire",
    //     //     left: "center",
    //     //     textStyle: { color: "#fff", fontSize: 20 }
    //     // },
    //     tooltip: {
    //         trigger: "axis",
    //         axisPointer: {
    //             type: "shadow"
    //         }
    //     },
    //     legend: {
    //         top: 40,
    //         textStyle: {
    //             color: "#262626"
    //         }
    //     },
    //     grid: {
    //         left: "3%",
    //         right: "4%",
    //         bottom: "3%",
    //         containLabel: true
    //     },
    //     xAxis: {
    //         type: "category",
    //         data: ["Commune", "Wilaya", "Association", "Privé", "ONF"],
    //         axisLine: {
    //             lineStyle: {
    //                 color: "#262626"
    //             }
    //         },
    //         axisLabel: {
    //             color: "#262626"
    //         }
    //     },
    //     yAxis: {
    //         type: "value",
    //         axisLine: {
    //             lineStyle: {
    //                 color: "#262626"
    //             }
    //         },
    //         splitLine: {
    //             show: false
    //         },
    //         axisLabel: {
    //             color: "#262626"
    //         }
    //     },
    //     series: [{
    //             name: "Superficie gérée (ha)",
    //             type: "bar",
    //             stack: "total",
    //             data: [1200, 950, 600, 400, 300],
    //             itemStyle: {
    //                 color: "#4caf50"
    //             }
    //         },
    //         {
    //             name: "Arbres plantés",
    //             type: "bar",
    //             stack: "total",
    //             data: [3500, 2800, 1500, 900, 600],
    //             itemStyle: {
    //                 color: "#03a9f4"
    //             }
    //         },
    //         {
    //             name: "Avancement (%)",
    //             type: "bar",
    //             stack: "total",
    //             data: [70, 60, 50, 40, 35],
    //             itemStyle: {
    //                 color: "#ff9800"
    //             }
    //         }
    //     ]
    // };

    // chart.setOption(option);


    /********************************************* centure vert ************************************************** */

    // var chartSuperficie; // make global

    // $.getJSON("assets/php/espace_vert/ceinture_verte/get_superficie.php", function (data) {
    //     if (data.error) {
    //         console.error("Erreur PHP:", data.error);
    //         return;
    //     }

    //     chartSuperficie = echarts.init(document.getElementById('chartSuperficie'));

    //     chartSuperficie.setOption({
    //         tooltip: { trigger: 'item' },
    //         legend: { bottom: 0 },
    //         series: [{
    //             type: 'pie',
    //             radius: ['50%', '70%'],
    //             label: { formatter: '{b}: {d}%' },
    //             data: [
    //                 { value: data.plantee, name: 'Plantée' },
    //                 { value: data.non_plantee, name: 'Non plantée' }
    //             ]
    //         }]
    //     });
    // });


    /************************************************* */

    // --- 2. Avancement par statut ---
    fetch('assets/php/espace_vert/ceinture_verte/get_avancement.php')
        .then(response => response.json())
        .then(data => {
            const categories = Object.keys(data);
            const values = Object.values(data);

            var chartAvancement = echarts.init(document.getElementById('chartAvancement'));
            chartAvancement.setOption({
                // title: {
                //     text: "Taux d'avancement des plantations",
                //     left: "center"
                // },
                tooltip: {
                    trigger: 'axis'
                },
                xAxis: {
                    type: 'value',
                    max: 100
                },
                yAxis: {
                    type: 'category',
                    data: categories
                },
                series: [{
                    type: 'bar',
                    data: values,
                    label: {
                        show: true,
                        position: 'right',
                        formatter: '{c}%'
                    },
                    itemStyle: {
                        color: '#27ae60'
                    }
                }]
            });
        })
        .catch(err => console.error(err));
    /********************************************/
    // --- 3. Nombre d’arbres plantés ---
    // var chartArbres = echarts.init(document.getElementById('chartArbres'));
    // chartArbres.setOption({
    //     // title: { text: 'Nombre d’arbres plantés par an', left: 'center' },
    //     tooltip: {
    //         trigger: 'axis',
    //         formatter: '{b}: {c} arbres'
    //     },
    //     legend: {
    //         data: ['Nombre d’arbres'],
    //         top: 25
    //     },
    //     xAxis: {
    //         type: 'category',
    //         data: ['2021', '2022', '2023', '2024']
    //     },
    //     yAxis: {
    //         type: 'value',
    //         name: 'Arbres plantés'
    //     },
    //     series: [{
    //             name: 'Nombre d’arbres',
    //             type: 'bar',
    //             data: [12000, 18000, 25000, 31000],
    //             itemStyle: {
    //                 color: '#27ae60'
    //             },
    //             barWidth: '50%'
    //         },
    //         {
    //             name: 'Tendance',
    //             type: 'line',
    //             smooth: true,
    //             data: [12000, 18000, 25000, 31000],
    //             symbol: 'circle',
    //             symbolSize: 8,
    //             lineStyle: {
    //                 color: '#1abc9c',
    //                 width: 3
    //             },
    //             itemStyle: {
    //                 color: '#1abc9c'
    //             }
    //         }
    //     ]
    // });
    /*********************************************************** */
    // --- 4. Type et nature de plantation ---
    var chartTypeNature = echarts.init(document.getElementById('chartTypeNature'));

    $.getJSON('assets/php/espace_vert/ceinture_verte/get_type.php', function(data) {
        chartTypeNature.setOption({
            // title: {
            //     text: 'Type et Nature de plantation',
            //     left: 'center'
            // },
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} ha ({d}%)'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                top: 'center'
            },
            series: [{
                    name: 'Nature de plantation',
                    type: 'pie',
                    radius: ['30%', '55%'],
                    label: {
                        formatter: '{b}\n{d}%'
                    },
                    data: data.nature.map(item => ({
                        name: item.nature,
                        value: item.total_surface
                    }))
                },
                {
                    name: 'Type de zone',
                    type: 'pie',
                    radius: ['60%', '80%'],
                    label: {
                        formatter: '{b}\n{d}%'
                    },
                    data: data.type.map(item => ({
                        name: item.type_zone,
                        value: item.total_surface
                    }))
                }
            ]
        });
    });

    // Responsive
    $(window).on('resize', function() {
        chartTypeNature.resize();
    });

    /*********************************************************/
    var chartGestionnaire = echarts.init(document.getElementById('chartGestionnaire'));

    $.getJSON('assets/php/espace_vert/ceinture_verte/get_gestionnaire.php', function(data) {
        chartGestionnaire.setOption({
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: data.labels,
                axisLabel: {
                    rotate: 30
                } // rotate if labels are long
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                type: 'bar',
                data: data.values,
                itemStyle: {
                    color: '#16a085'
                },
                barWidth: '50%'
            }]
        });
    });

    // Responsive
    $(window).on('resize', function() {
        chartGestionnaire.resize();
    });

    /****************************************************************/

    // --- 6. État physique ---
    var chartEtat = echarts.init(document.getElementById('chartEtat'));

    $.getJSON('assets/php/espace_vert/ceinture_verte/get_etat_physique.php', function(data) {
        chartEtat.setOption({
            // title: {
            //     text: "État physique des plantations",
            //     left: "center"
            // },
            tooltip: {
                trigger: "item",
                formatter: "{b}: {c} ha ({d}%)"
            },
            legend: {
                bottom: 0
            },
            series: [{
                name: "État physique",
                type: "pie",
                radius: ["40%", "70%"],
                label: {
                    formatter: "{b}\n{d}%"
                },
                data: data
            }]
        });
    });

    // Make chart responsive
    $(window).on('resize', function() {
        chartEtat.resize();
    });

    /*************************************************************************/

    fetch('assets/php/espace_vert/ceinture_verte/repartition_by_commune.php')
        .then(response => response.json())
        .then(data => {
            const communeData = data.commune.map(item => ({
                name: item.commune,
                value: item.total_surface
            }));

            var chartCommune = echarts.init(document.getElementById('chartCommune'));
            chartCommune.setOption({
                //   title: {
                //     text: 'Répartition des surfaces par commune',
                //     left: 'center',
                //     textStyle: { color: '#2c3e50', fontSize: 18, fontWeight: 'bold' }
                //   },
                tooltip: {
                    trigger: 'item',
                    formatter: '{b}: {c} ha ({d}%)'
                },
                legend: {
                    type: 'scroll',
                    orient: 'vertical',
                    left: 'left',
                    top: 'middle'
                },
                series: [{
                    name: 'Surface',
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
                        formatter: '{b}\n{d}%',
                        fontSize: 12
                    },
                    labelLine: {
                        smooth: true,
                        length: 10,
                        length2: 15
                    },
                    data: communeData,
                    color: [
                        '#1abc9c', '#f62d51', '#0275d8', '#2ecc71', '#3498db',
                        '#2980b9', '#9b59b6', '#8e44ad', '#f39c12', '#d35400'
                    ]
                }]
            });
        });

    /**************************************************************************** */


    // Responsive charts
    $(window).on('resize', function() {
        chartSuperficie.resize();
        chartAvancement.resize();
        chartArbres.resize();
        chartTypeNature.resize();
        chartGestionnaire.resize();
        chartEtat.resize();
        chartCommune.resize();
    });
</script>


<!-- Bootstrap bundle (if you use Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your custom scripts -->
<script>
    function scrollGallery(direction) {
        const gallery = document.getElementById('gallery');
        const cardWidth = gallery.querySelector('.flip-card').offsetWidth + 20;
        gallery.scrollBy({
            left: direction * cardWidth,
            behavior: 'smooth'
        });
    }

    $(document).ready(function() {
        console.log("jQuery is working ✅");
    });


    /**************************************** fiche technique ******************************************** */

    $(document).ready(function() {
        $.getJSON("assets/php/espace_vert/get_parcs.php", function(data) {
            let gallery = $("#gallery");
            gallery.empty();

            // ✅ Loop through each "thematique" group (summary)
            data.count_by_thematique.forEach(item => {
                // Build image path based on thématique name
                let imageName = item.thematique_parc + ".png";
                let imagePath = "assets/image_parc/" + imageName;

                // Find all details for this thematique (to calculate extra info)
                let details = data.details.filter(d => d.thematique_parc === item.thematique_parc);

                // Calculate total surface, total arbres, number of quartiers, and types of plantations
                let totalSurface = details.reduce((sum, d) => sum + d.surface_m2, 0);
                let totalArbres = details.reduce((sum, d) => sum + d.nombre_arbres, 0);
                let quartiers = [...new Set(details.map(d => d.numero_quartier))].filter(q => q && q !== '');
                let types = [...new Set(details.map(d => d.type_plantation))].join(', ');

                // ✅ Create card
                let card = `
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="${imagePath}" alt="${item.thematique_parc}">
                </div>
                <div class="flip-card-back">
                    <h5>${item.thematique_parc}</h5>
                    <p>
                        Nombre de parcs : ${item.total}<br>
                        Surface totale : ${totalSurface.toLocaleString()} m²<br>
                        Nombre d'arbres : ${totalArbres.toLocaleString()}<br>
                        Nombre de quartiers : ${quartiers.length}<br>
                        Type(s) : ${types || '—'}
                    </p>
                </div>
            </div>
        </div>`;
                gallery.append(card);
            });
        });


        /*************************************** parcs stat : ******************************************** */

        $.getJSON('assets/php/espace_vert/get_parcs_data_stat.php', function(data) {

            // --- A. Surface totale par thématique ---
            var chartA = echarts.init(document.getElementById('chartSurfaceThematique'));
            chartA.setOption({
                // title: { text: 'Surface totale par thématique' },
                tooltip: {
                    trigger: 'axis'
                },
                xAxis: {
                    type: 'category',
                    data: data.surface_thematique.map(d => d.thematique_parc)
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    type: 'bar',
                    data: data.surface_thematique.map(d => d.total_surface),
                    itemStyle: {
                        color: '#3498db'
                    }
                }]
            });

            // --- B. Nombre total d’arbres par thématique ---
            var chartB = echarts.init(document.getElementById('chartArbresThematique'));
            chartB.setOption({
                // title: { text: 'Nombre d’arbres par thématique' },
                tooltip: {
                    trigger: 'axis'
                },
                xAxis: {
                    type: 'category',
                    data: data.arbres_thematique.map(d => d.thematique_parc)
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    type: 'bar',
                    data: data.arbres_thematique.map(d => d.total_arbres),
                    itemStyle: {
                        color: '#2ecc71'
                    }
                }]
            });

            // --- C. Répartition des types de plantation ---
            var chartC = echarts.init(document.getElementById('chartTypePlantation'));
            chartC.setOption({
                // title: { text: 'Types de plantation' },
                tooltip: {
                    trigger: 'item'
                },
                series: [{
                    type: 'pie',
                    radius: '60%',
                    data: data.type_plantation.map(d => ({
                        name: d.type_plantation,
                        value: d.total
                    })),
                    label: {
                        formatter: '{b}: {c}'
                    }
                }]
            });

            // --- D. Surface totale par quartier ---
            var chartD = echarts.init(document.getElementById('chartSurfaceQuartier'));
            chartD.setOption({
                // title: { text: 'Surface totale par quartier' },
                tooltip: {
                    trigger: 'axis'
                },
                xAxis: {
                    type: 'category',
                    data: data.surface_quartier.map(d => d.numero_quartier)
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    type: 'bar',
                    data: data.surface_quartier.map(d => d.total_surface),
                    itemStyle: {
                        color: '#9b59b6'
                    }
                }]
            });

        });
    });
</script>