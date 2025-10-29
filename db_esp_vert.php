<?php include('includes/header2.php'); ?>

<style>
    .container-fluid {
        max-width: 95% !important;
    }

    .card-header {
        background: linear-gradient(to right, #16a085 0%, #1abc9c 100%);
        color: #fff;
    }

    .dataTables_wrapper .dt-buttons {
        margin-bottom: 10px;
    }
</style>

<div class="page-wrapper">
    <br />
    <div class="container-fluid">
        <input type="hidden" id="pageType" value="<?php echo $_GET['value'] ?>" />

        <!-- Espaces verts -->
        <div class="row" id="espacesVertsSection" style="display:none;">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h3><b class="text-white">Espaces Verts</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableEspacesVerts" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type d'espace</th>
                                        <th>Surface (ha)</th>
                                        <th>Numéro quartier</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parc -->
        <div class="row" id="parcSection" style="display:none;">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h3><b class="text-white">Parcs</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableParc" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Thématique du parc</th>
                                        <th>Surface (m²)</th>
                                        <th>Numéro quartier</th>
                                        <th>Type de plantation</th>
                                        <th>Nombre d'arbres</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <!-- ✅ Ceinture Verte Section -->
        <div class="row" id="ceintureVerteSection" style="display:none;">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header" >
                        <h3><b>Ceinture Verte</b></h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableCeintureVerte" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type de zone</th>
                                        <th>Nature de plantation</th>
                                        <th>Surface (m²)</th>
                                        <th>Gestionnaire</th>
                                        <th>État végét.</th>
                                        <th>État avancement</th>
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

<footer class="footer">
    © ANURB 2025 - Tous Droits Réservés.
</footer>

<?php include('includes/footer.php'); ?>

<script>
$(document).ready(function() {
    const pageType = $('#pageType').val();

    // --- ESPACES VERTS ---
    if (pageType === 'esp_vert') {
        $('#espacesVertsSection').show();

        $('#tableEspacesVerts').DataTable({
            ajax: {
                url: 'assets/php/espace_vert/get_espaces_verts.php',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'type_espace' },
                { data: 'surface_ha' },
                { data: 'numero_quartier' }
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
            }
        });
    }

    // --- PARCS ---
    else if (pageType === 'parc') {
        $('#parcSection').show();

        $('#tableParc').DataTable({
            ajax: {
                url: 'assets/php/espace_vert/get_parcs_table.php',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'thematique_parc' },
                { data: 'surface_m2' },
                { data: 'numero_quartier' },
                { data: 'type_plantation' },
                { data: 'nombre_arbres' }
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
            }
        });
    }

     else if (pageType === 'ceinture_verte') {
        $('#ceintureVerteSection').show();

        $('#tableCeintureVerte').DataTable({
            ajax: {
                url: 'assets/php/espace_vert/get_ceinture_verte.php',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'type_zone' },
                { data: 'nature_plantation' },
                { data: 'surface' },
                { data: 'gestionnaire' },
                { data: 'etat_veget' },
                { data: 'etat_avancement' },
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
            }
        });
    } else {
        console.log('Page type is not ceinture_verte — table hidden.');
    }
});
</script>
