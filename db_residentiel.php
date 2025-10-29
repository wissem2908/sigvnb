<?php
include('includes/header2.php');
?>
<style>
    .container-fluid {

        max-width: 95% !important;
    }
    .card-header {
    background: linear-gradient(to right, #318f94 0%, #5ec58c 100%);
    color: #fff;
}

</style>




<div class="page-wrapper">
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card text-center" >
                    <div class="card-header">
                        <h3><b class="text-white">Résidence</b></h3>
                    </div>
<br/>
                  <div class="row">
    <div class="col-12">
          <div class="row">
            <div class='col-lg-3'>
    <select id="filterCommune" class='form-control'>
          <option value="">-- Filtrer par commune --</option>
      </select>
            </div>
   <div class='col-lg-3' >
          <select id="filterAvancement"  class='form-control'>
          <option value="">-- Filtrer par avancement --</option>
      </select>
   </div>
<div class='col-lg-3'>
      <select id="filterQuartier"  class='form-control'>
          <option value="">-- Filtrer par quartier --</option>
      </select>
</div>
<div class="col-lg-3">
    <select id="filterIdentifiant"  class='form-control'>
          <option value="">-- Filtrer par identifiant --</option>
      </select>
</div>
   
  
  </div>
        <div class="card-body bg-white p-3 table-responsive">
            <table id="tableResidence" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Densité</th>
                        <th>Identifiant</th>
                        <th>Superficie foncière</th>
                        <th>Superficie parcellaire</th>
                        <th>Surface moy. logement</th>
                        <th>COS</th>
                        <th>CES</th>
                        <th>Surface plancher</th>
                        <th>Étages</th>
                        <th>Logements</th>
                        <th>Habitants</th>
                        <th>Avancement</th>
                        <th>Quartier</th>
                        <th>Commune</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>






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

<script>
$(document).ready(function() {

    var table = $('#tableResidence').DataTable({
        ajax: {
            url: 'assets/php/residence/get_residences.php',
            dataSrc: 'data'
        },
        columns: [
            { data: 'OBJECTID' },
            { data: 'type_residence' },
            { data: 'densite' },
            { data: 'identifiant' },
            { data: 'superficie_fonciere' },
            { data: 'superficie_parcellaire' },
            { data: 'surface_moy_log' },
            { data: 'cos' },
            { data: 'ces' },
            { data: 'surface_plancher' },
            { data: 'nbr_etage' },
            { data: 'nbr_logements' },
            { data: 'nbr_habitant' },
            { data: 'avancement' },
            { data: 'n_quartier' },
            { data: 'commune' }
        ],
        responsive: true,
        scrollX: true,
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exporter Excel',
                className: 'btn btn-success'
            }
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json"
        },
        initComplete: function() {
            var api = this.api();

            // Get unique values for each filter
            function fillSelect(selectId, columnIndex) {
                var values = [...new Set(api.column(columnIndex).data().toArray().filter(v => v))];
                values.sort().forEach(val => {
                    $(selectId).append(`<option value="${val}">${val}</option>`);
                });
            }

            fillSelect('#filterCommune', 15);
            fillSelect('#filterAvancement', 13);
            fillSelect('#filterQuartier', 14);
            fillSelect('#filterIdentifiant', 3);
        }
    });

    // ✅ Filter events
    $('#filterCommune').on('change', function() {
        table.column(15).search(this.value).draw();
    });
    $('#filterAvancement').on('change', function() {
        table.column(13).search(this.value).draw();
    });
    $('#filterQuartier').on('change', function() {
        table.column(14).search(this.value).draw();
    });
    $('#filterIdentifiant').on('change', function() {
        table.column(3).search(this.value).draw();
    });
});
</script>
