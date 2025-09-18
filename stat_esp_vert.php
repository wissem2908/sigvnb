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
</style>

<div class="page-wrapper">
    <br />
    <div class="container">
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">Surface des espaces verts par quartier</h4>
                        <div id="chartEV1" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <!-- 2. Typologie galerie -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Typologie par photo + fiche technique</h4>
                      <div class="scroll-container mt-4">
      <button class="scroll-btn left" onclick="scrollGallery(-1)">&#10094;</button>
      <div id="gallery" class="scroll-wrapper">
        
        <!-- Card 1 -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://picsum.photos/600/400?random=1" alt="Parc">
            </div>
            <div class="flip-card-back">
              <h5>Parc</h5>
              <p>Superficie: 2500m²<br>Équipements: bancs, fontaines</p>
            </div>
          </div>
        </div>
        
        <!-- Card 2 -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://picsum.photos/600/400?random=2" alt="Jardin">
            </div>
            <div class="flip-card-back">
              <h5>Jardin</h5>
              <p>Superficie: 1800m²<br>Équipements: arbres, allées</p>
            </div>
          </div>
        </div>
        
        <!-- Card 3 -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://picsum.photos/600/400?random=3" alt="Stade">
            </div>
            <div class="flip-card-back">
              <h5>Stade</h5>
              <p>Superficie: 5000m²<br>Équipements: terrain, gradins</p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://picsum.photos/600/400?random=4" alt="Salle Polyvalente">
            </div>
            <div class="flip-card-back">
              <h5>Salle Polyvalente</h5>
              <p>Capacité: 300 personnes<br>Équipements: scène, sonorisation</p>
            </div>
          </div>
        </div>

      </div>
      <button class="scroll-btn right" onclick="scrollGallery(1)">&#10095;</button>
    </div>
                    </div>
                </div>
            </div>

            <!-- 3. Nombre de plantations par quartier -->
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Nombre de plantations par quartier</h4>
                        <div id="chartEV3" style="height:400px;"></div>
                    </div>
                </div>
            </div>

            <!-- 4. Espace vert par type -->
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Espace vert par type</h4>
                        <div id="chartEV4" style="height:400px;"></div>
                    </div>
                </div>
            </div>

            <!-- 5. Espace vert / Surface bâtie -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Espace vert / Surface bâtie par quartier</h4>
                        <div id="chartEV5" style="height:400px;"></div>
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
        chartEV1.setOption({
            // title: { text: 'Surface des espaces verts par quartier', left: 'center' },
            tooltip: {
                formatter: "{b}: {c} m²"
            },
            visualMap: {
                min: 1000,
                max: 4000,
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
                data: [{
                        name: 'Quartier A',
                        value: 1500
                    },
                    {
                        name: 'Quartier B',
                        value: 2300
                    },
                    {
                        name: 'Quartier C',
                        value: 1800
                    },
                    {
                        name: 'Quartier D',
                        value: 2500
                    },
                    {
                        name: 'Quartier E',
                        value: 3200
                    }
                ]
            }]
        });

        /****************************************************************** */

        


        /**************** 3. Nombre de plantations par quartier *****************/
var chartEV3 = echarts.init(document.getElementById('chartEV3'));
chartEV3.setOption({
    title: {
        text: 'Nombre de plantations par quartier',
        left: 'center'
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: { type: 'shadow' }
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
        data: ['Quartier A', 'Quartier B', 'Quartier C']
    },
    series: [{
        type: 'bar',
        data: [
            { value: 120, itemStyle: { color: '#66bb6a' } }, // green
            { value: 200, itemStyle: { color: '#42a5f5' } }, // blue
            { value: 300, itemStyle: { color: '#ffa726' } }  // orange
        ],
        label: {
            show: true,
            position: 'right',
            fontWeight: 'bold'
        },
        animationDuration: 1200
    }]
});


        /**************** 4. Espace vert par type *****************/
var chartEV4 = echarts.init(document.getElementById('chartEV4'));
chartEV4.setOption({
    title: {
        text: 'Répartition des espaces verts',
        left: 'center',
        top: 10
    },
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
        radius: ['40%', '70%'], // Donut style
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
        data: [
            { value: 2500, name: 'Parcs' },
            { value: 1800, name: 'Jardins' },
            { value: 1200, name: 'Squares' },
            { value: 900, name: 'Espaces publics' },
            { value: 600, name: 'Autres' }
        ],
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
    ] // palette of distinct colors
});


        /**************** 5. Espace vert / Surface bâtie *****************/
        var chartEV5 = echarts.init(document.getElementById('chartEV5'));
        chartEV5.setOption({
            tooltip: {
                trigger: 'axis',
                formatter: function(params) {
                    let ev = params[0].value,
                        bati = params[1].value;
                    let ratio = (ev / (ev + bati) * 100).toFixed(1);
                    return params[0].axisValue + "<br/>Espace vert: " + ev + " m²<br/>Surface bâtie: " + bati + " m²<br/>Ratio: " + ratio + "%";
                }
            },
            legend: {
                data: ['Espace vert', 'Surface bâtie']
            },
            xAxis: {
                type: 'category',
                data: ['Quartier A', 'Quartier B', 'Quartier C']
            },
            yAxis: {
                type: 'value',
                name: 'm²'
            },
            series: [{
                    name: 'Espace vert',
                    type: 'bar',
                    stack: 'total',
                    data: [1500, 1800, 2000],
                    itemStyle: {
                        color: '#66BB6A'
                    }
                },
                {
                    name: 'Surface bâtie',
                    type: 'bar',
                    stack: 'total',
                    data: [3500, 4200, 3000],
                    itemStyle: {
                        color: '#8D6E63'
                    }
                }
            ]
        });
    });
</script>


<!-- Bootstrap bundle (if you use Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your custom scripts -->
<script>
  function scrollGallery(direction) {
    const gallery = document.getElementById('gallery');
    const cardWidth = gallery.querySelector('.flip-card').offsetWidth + 20;
    gallery.scrollBy({ left: direction * cardWidth, behavior: 'smooth' });
  }

  $(document).ready(function() {
    console.log("jQuery is working ✅");
  });
</script>