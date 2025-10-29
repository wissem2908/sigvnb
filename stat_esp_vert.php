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
        justify-content: center;
        /* horizontally center the cards */
        align-items: center;
        /* vertically center if heights differ */
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
                    <br/>
                       <div class="card text-center" style="background: #345b61">
                        <div class="card-header">
                            <h3><b class="text-white">Parc</b></h3>
                        </div>
                        <div class="row">
                            <!-- column -->
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

                            <div class="col-lg-12">
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

                            <!-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface des espaces verts par quartier</h4>
                                    <div id="chartEV1" style="height:375px;"></div>
                                </div>
                            </div>
                        </div> -->
                            <!-- column -->
                            <!-- column -->
                            <!-- 2. Typologie galerie -->



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
                            <!-- <div class="col-lg-5">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Nombre de plantations par quartier</h4>
                                    <div id="chartEV3" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->

                            <!-- 4. Espace vert par type -->
                            <!-- <div class="col-lg-7">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Espace vert par type</h4>
                                    <div id="chartEV4" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->

                            <!-- 5. Espace vert / Surface bâtie -->
                            <!-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Espace vert / Surface résidence par quartier</h4>
                                    <div id="chartEV5" style="height:400px;"></div>
                                </div>
                            </div>
                        </div> -->





                        </div>

                    </div>
                       <div class="card text-center" style="background: #345b61">
                        <div class="card-header">
                            <h3><b class="text-white">Espace vert</b></h3>
                        </div>
                    <div class="row">
                        <!-- column -->
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

                        <!-- <div class="col-lg-12">
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
                        </div> -->

                        <div class="col-lg-12">
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



                        <!-- ************************************ parcs **************************************************** -->

                        <!-- <div class="col-lg-6">
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
                        </div> -->


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
                                    <h4 class="card-title" style="font-size:18px; font-weight:bold">Espace vert / Surface résidence par quartier</h4>
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


                    </div>
                </div>
                 
                    <div class="card text-center" style="background: #345b61">
                        <div class="card-header">
                            <h3><b class="text-white">Ceinture verte </b></h3>
                        </div>
                        <div class="row">
                            <!-- column -->





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

                            <div class="col-lg-6 offset-lg-3">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Répartition par gestionnaire</h4>
                                        <div id="chartGestionnaire" style="height:400px;"></div>
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
                axisPointer: { type: 'shadow' }
            },
            grid: {
                left: '10%',
                right: '10%',
                bottom: '15%',
                containLabel: true
            },
            xAxis: {
                type: 'value',
                name: 'Plantations'
            },
            yAxis: {
                type: 'category',
                data: data.quartiers,
                axisLabel: {
                    interval: 0,  // show all labels
                    rotate: 0     // or 45 if long names
                }
            },
            dataZoom: [
                {
                    type: 'slider',
                    yAxisIndex: 0,
                    start: 0,
                    end: data.quartiers.length > 20 ? 40 : 100 // show portion if many quartiers
                },
                {
                    type: 'inside',
                    yAxisIndex: 0
                }
            ],
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
                radius: ['40%', '65%'], // make a donut chart to improve spacing
                avoidLabelOverlap: true,
                label: {
                    show: true,
                    position: 'outside',
                    formatter: '{c} m² ({d}%)',
                    color: '#262626',
                    fontWeight: 'bold'
                },
                labelLine: {
                    show: true,
                    length: 30,
                    length2: 25,
                    smooth: true
                },
                labelLayout: {
                    hideOverlap: true,
                    moveOverlap: 'shiftY'
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
                            return (
                                params[0].axisValue +
                                "<br/>Espace vert: " + ev.toLocaleString() + " m²" +
                                "<br/>Surface résidence: " + bati.toLocaleString() + " m²" +
                                "<br/>Ratio: " + ratio + "%"
                            );
                        }
                    },
                    legend: {
                        data: ['Espace vert', 'Surface résidence']
                    },
                    xAxis: {
                        type: 'category',
                        data: quartiers,
                        axisLabel: {
                            interval: 0, // ✅ Show every label
                            rotate: 30, // ✅ Rotate for readability
                            fontSize: 10 // optional: adjust font size
                        }
                    },
                    yAxis: {
                        type: 'value',
                        name: 'm²'
                    },
                    series: [{
                            name: 'Espace vert',
                            type: 'bar',
                            stack: 'total',
                            data: ev,
                            itemStyle: {
                                color: '#66BB6A'
                            }
                        },
                        {
                            name: 'Surface résidence',
                            type: 'bar',
                            stack: 'total',
                            data: bati,
                            itemStyle: {
                                color: '#8D6E63'
                            }
                        }
                    ]
                });
            });

    });

    /************************************************ centure verte ***************************************************************/

    /**************************************************/

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

    /************************************************************/
    // --- 4. Type et nature de plantation ---
    var chartTypeNature = echarts.init(document.getElementById('chartTypeNature'));

    $.getJSON('assets/php/espace_vert/ceinture_verte/get_type.php', function(data) {
        chartTypeNature.setOption({
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} ha' // removed ({d}%)
            },
            legend: [{
                    orient: 'vertical',
                    left: '2%',
                    top: 'center',
                    formatter: function(name) {
                        if (name === data.nature[0].nature) {
                            return '{title|Nature:}\n\n{name|' + name + '}';
                        }
                        return '\n{name|' + name + '}';
                    },
                    textStyle: {
                        fontSize: 13,
                        color: '#444',
                        rich: {
                            title: {
                                fontSize: 14,
                                fontWeight: 'bold',
                                color: '#000',
                                margin: [0, 0, 20, 0]
                            },
                            name: {
                                fontSize: 13,
                                color: '#444'
                            }
                        }
                    },
                    data: data.nature.map(item => item.nature)
                },
                {
                    orient: 'vertical',
                    right: '2%',
                    top: 'center',
                    formatter: function(name) {
                        if (name === data.type[0].type_zone) {
                            return '{title|Type:}\n{name|' + name + '}';
                        }
                        return '{name|' + name + '}';
                    },
                    textStyle: {
                        fontSize: 13,
                        color: '#444',
                        rich: {
                            title: {
                                fontSize: 14,
                                fontWeight: 'bold',
                                color: '#000',
                                padding: [0, 0, 6, 0]
                            },
                            name: {
                                fontSize: 13,
                                color: '#444'
                            }
                        }
                    },
                    data: data.type.map(item => item.type_zone)
                }
            ],
            series: [{
                    name: 'Nature de plantation',
                    type: 'pie',
                    radius: ['30%', '55%'],
                    center: ['50%', '50%'],
                    label: {
                        show: false
                    }, // <-- removed the percentage label
                    data: data.nature.map(item => ({
                        name: item.nature,
                        value: item.total_surface
                    }))
                },
                {
                    name: 'Type de zone',
                    type: 'pie',
                    radius: ['60%', '80%'],
                    center: ['50%', '50%'],
                    label: {
                        show: false
                    }, // <-- removed the percentage label
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
                    rotate: 30 // rotate if labels are long
                }
            },
            yAxis: {
                type: 'value',
                name: 'Surface (ha)', // <-- Added Y-axis label
                nameLocation: 'middle', // position of the label
                nameGap: 35 // distance from axis
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
                    formatter: "{d}%"
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
                        formatter: '{d}%',
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

            const thematiques = data.surface_thematique.map(d => d.thematique_parc);
            const surfaces = data.surface_thematique.map(d => d.total_surface);

            chartA.setOption({
                tooltip: {
                    trigger: 'axis',
                    formatter: params => {
                        const p = params[0];
                        return `<b>${p.axisValue}</b><br>${p.marker} Surface : <b>${p.value.toLocaleString()}</b> m²`;
                    }
                },
                grid: {
                    left: '3%',
                    right: '3%',
                    bottom: '15%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: thematiques,
                    axisLabel: {
                        rotate: 30,
                        interval: 0, // ✅ show all labels
                        fontSize: 11
                    }
                },
                yAxis: {
                    type: 'value',
                    name: 'Surface (m²)',
                    axisLabel: {
                        formatter: value => value.toLocaleString() + ' m²'
                    }
                },
                series: [{
                    name: 'Surface totale',
                    type: 'bar',
                    data: surfaces,
                    itemStyle: {
                        color: '#3498db'
                    },
                    label: {
                        show: true,
                        position: 'top',
                        formatter: p => p.value.toLocaleString() + ' m²',
                        fontSize: 10
                    }
                }]
            });

            // --- B. Nombre total d’arbres par thématique ---
            var chartB = echarts.init(document.getElementById('chartArbresThematique'));
            chartB.setOption({
                tooltip: {
                    trigger: 'axis',
                    formatter: '{b} : {c} arbres'
                },
                xAxis: {
                    type: 'category',
                    data: data.arbres_thematique.map(d => d.thematique_parc),
                    axisLabel: {
                        rotate: 30, // ✅ show all labels clearly
                        interval: 0 // ✅ ensure every label is displayed
                    }
                },
                yAxis: {
                    type: 'value',
                    name: 'Nombre d’arbres' // ✅ show unit on Y axis
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
                tooltip: {
                    trigger: 'axis'
                },
                xAxis: {
                    type: 'category',
                    data: data.surface_quartier.map(d => d.numero_quartier),
                    axisLabel: {
                        interval: 0, // show all labels
                        rotate: 30, // rotate to prevent overlap
                        fontSize: 12
                    }
                },
                yAxis: {
                    type: 'value',
                    name: 'Surface (ha)',
                    nameLocation: 'middle',
                    nameGap: 35
                },
                series: [{
                    type: 'bar',
                    data: data.surface_quartier.map(d => d.total_surface),
                    itemStyle: {
                        color: '#9b59b6'
                    },
                    // label: {
                    //     show: true,
                    //     position: 'top',
                    //     formatter: '{c}'
                    // }
                }]
            });

            // Make chart responsive
            window.addEventListener('resize', () => chartD.resize());

        });
    });
</script>