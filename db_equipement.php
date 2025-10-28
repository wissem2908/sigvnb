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
                        <h3><b class="text-white">Equipement</b></h3>
                    </div>

                    <div class="row">
                   
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h4 class="card-title" style="font-size:18px; font-weight:bold">Liste des équipements</h4> -->

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
</script>