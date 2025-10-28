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
                <div class="card text-center">
                    <div class="card-header">
                        <h3><b class="text-white">Voirie</b></h3>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="col-lg-12 mt-3">
                                <!-- ✅ Filters -->
                                <div class="row mb-3">
                                    <select id="filterCommune" class="col-lg-3 form-control">
                                        <option value="">-- Filtrer par commune --</option>
                                    </select>
                                    <select id="filterTypeVoie" class="col-lg-3  form-control">
                                        <option value="">-- Filtrer par type de voie --</option>
                                    </select>
                                    <select id="filterAvancement" class="col-lg-3  form-control">
                                        <option value="">-- Filtrer par avancement --</option>
                                    </select>
                                    <select id="filterEtat" class="col-lg-3  form-control">
                                        <option value="">-- Filtrer par état --</option>
                                    </select>
                                </div>

                                <!-- ✅ DataTable -->
                                <div class="table-responsive">
                                    <table id="tableVoirie" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID Voie</th>
                                                <th>Type de voie</th>
                                                <th>Sens circulation</th>
                                                <th>Nb voie</th>
                                                <th>Longueur</th>
                                                <th>Largeur</th>
                                                <th>Pente transversale</th>
                                                <th>Vitesse référence</th>
                                                <th>Avancement</th>
                                                <th>État</th>
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

    var table = $('#tableVoirie').DataTable({
        ajax: {
            url: 'assets/php/transport/get_voirie.php',
            dataSrc: 'data'
        },
        columns: [
            { data: 'id' },
            { data: 'id_voie' },
            { data: 'type_voie' },
            { data: 'sens_circulation' },
            { data: 'nbr_voie' },
            { data: 'longueur' },
            { data: 'largeur' },
            { data: 'pente_transversale' },
            { data: 'vitesse_reference' },
            { data: 'avancement' },
            { data: 'etat' },
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
                className: 'btn btn-success mb-2'
            }
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json"
        },
        initComplete: function() {
            var api = this.api();

            function fillSelect(selectId, columnIndex) {
                var values = [...new Set(api.column(columnIndex).data().toArray().filter(v => v))];
                values.sort().forEach(v => {
                    $(selectId).append(`<option value="${v}">${v}</option>`);
                });
            }

            fillSelect('#filterCommune', 11);
            fillSelect('#filterTypeVoie', 2);
            fillSelect('#filterAvancement', 9);
            fillSelect('#filterEtat', 10);
        }
    });

    // ✅ Filtering
    $('#filterCommune').on('change', function() {
        table.column(11).search(this.value).draw();
    });
    $('#filterTypeVoie').on('change', function() {
        table.column(2).search(this.value).draw();
    });
    $('#filterAvancement').on('change', function() {
        table.column(9).search(this.value).draw();
    });
    $('#filterEtat').on('change', function() {
        table.column(10).search(this.value).draw();
    });

});
</script>