<?php
defined('BASEPATH') or exit('No direct script access allowed');
$tahun = date('Y') + 1;
$month = date('m');
?>
<main class="container-fluid mt-4 pt-2 mb-5 pb-3">
    <div class="table-responsive">
        <table class="table nowrap compact table-hover table-bordered table-height" cellspacing="0" width="100%" id="table-monitoring">
            <thead class="custom-ogi shadow-light text-uppercase">
                <tr>
                    <th>No</th>
                    <th width="50px">Kode Depo</th>
                    <th>Nama Distributor</th>
                    <th>Area</th>
                    <th>Div</th>
                    <th>System</th>
                    <?php
                    if ($month == '01' or $month == '03' or $month == '05' or $month == '07' or $month == '08' or $month == '10' or $month == '12') {
                        $date_calendar = 31;
                    } else if ($month == '04' or $month == '06' or $month == '09' or $month == '11') {
                        $date_calendar = 30;
                    } else {
                        $date_calendar = 28;
                    }
                    for ($i = 1; $i <= $date_calendar; $i++) {
                        echo "<th w data-col-width='100'>" . $i . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
</main>

<!-- Main JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Plugin -->
<script type="text/javascript" src="<?= base_url('assets/js/addons/datatables.min.js') ?>"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->


<!-- JS-Page -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
<script>
    $(document).ready(function() {
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const d = new Date();
        $('.title').html("Monitoring LBP " + monthNames[d.getMonth()]);

        //! Init Datatables
        let tables = $('#table-monitoring').DataTable({
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "autoWidth": false,
            "order": [],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            // "dom": "Bfrtip",
            "buttons": [
                'copyHtml5',
                'excelHtml5',
            ],
            "ajax": {
                "url": "<?= site_url('table_monitoring') ?>",
                "type": "POST",
                "data": function(data) {
                    data.tahun = $("#selected-tahun").val();
                    data.bulan = $("#selected-bulan").val();
                    data.grup_region = $("#selected-group-region").val();
                    data.modul = $("#selected-modul").val();
                    data.region = $("#selected-region").val();
                }
            },
            "columnDefs": [{
                "targets": '_all',
                "orderable": false,

                // "targets": '_all',
                // "searchable": false
            }, ]
        });

        //! SelectedDatatables
        $('#selected-tahun').on('change', function() {
            tables.ajax.reload();
        });
        $('#selected-bulan').on('change', function() {
            // $('#table-monitoring').DataTable().clear().destroy(); //destroy table
            let bln = $(this).val();
            const d = new Date(bln);
            $('.title').html("Monitoring LBP " + monthNames[d.getMonth()]);
            tables.ajax.reload();
        });
        $('#selected-group-region').on('change', function() {
            let bln = $('#selected-bulan').val();
            let greg = $('select[id="selected-group-region"] option:selected').text();
            const d = new Date(bln);
            $('.title').html("Monitoring LBP " + monthNames[d.getMonth()] + " Zone " + greg);
            tables.ajax.reload();
        });
        $('#selected-region').on('change', function() {
            let bln = $('#selected-bulan').val();
            let greg = $('select[id="selected-group-region"] option:selected').text();
            let reg = $('select[id="selected-region"] option:selected').text();
            const d = new Date(bln);
            $('.title').html("Monitoring LBP " + monthNames[d.getMonth()] + " Zone " + greg + " Region " + reg);
            tables.ajax.reload();
        });
        $('#selected-modul').on('change', function() {
            tables.ajax.reload();
        });

        //! OnChangesGrupRegion
        $('#selected-group-region').on('change', function() {
            select_gregion = $("#selected-group-region").val();
            $.ajax({
                url: "<?= site_url('search_region') ?>",
                type: 'POST',
                data: "grup_region=" + select_gregion,
                success: function(data) {
                    $("#selected-region").html(data);
                    console.log(data);
                }
            });
        });

    });

    function fnExcelReport() {
        var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange;
        var j = 0;
        tab = document.getElementById('table-monitoring'); // id of table

        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text = tab_text + "</table>";
        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
        {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
        return (sa);
    }
</script>