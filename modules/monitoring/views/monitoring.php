<?php
defined('BASEPATH') or exit('No direct script access allowed');
$tahun = date('Y') + 1;
$month = date('m');
?>
<!-- Loader SpinKit -->
<div id="overlay" class="overlay">
    <div class="spinner show">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
<main class="container-fluid mt-2 pt-2 mb-5 pb-3">
    <div id="responsive" class="">
        <table class="table display table-responsive table-hover table-bordered table-height" cellspacing="0" width="100%" id="table-monitoring" style="overflow-y: hidden;">
            <thead class="custom-ogi shadow-light text-uppercase">
                <tr>
                    <!-- <th>No</th> -->
                    <th>Kode Depo</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;Distributor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Area</th>
                    <th>Div</th>
                    <th>System</th>
                    <th>Last<br>Transaction</th>
                    <th>Next<br>Transaction</th>
                    <th>Status</th>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo '<th data-placement="top" data-html="true" class="date_selector"><b style="color: #d3250f; text-decoration-style: dotted;text-decoration-color: #d3250f;text-decoration-line: underline;">' . $i . '</b></th>';
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.19/datatables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
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
    //! initDatatables
    function initTable() {
        $("#overlay").show();
        return $('#table-monitoring').DataTable({
            //? Order
            "order": [],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            //? ProcessingLoader
            "language": {
                "processing": false,
            },
            //? FixedColumn
            // "scrollY": "300px",
            // "scrollX": true,
            // "paging": false,
            // "fixedColumns": {
            //     leftColumns: 2,
            // },
            //? ServerSide
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
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "autoWidth": false,
            "retrieve": true,
            //? customColoumn
            "columnDefs": [{
                "targets": '_all',
                "orderable": false,

                // "targets": '_all',
                // "searchable": false
            }, {
                // "targets": [coloumnDate],
                // "visible": false,
            }],
            //? InitComplete
            "initComplete": function(settings) {
                $("#overlay").hide();
                var modules = $("#selected-modul").val();
                var month = $("#selected-bulan").val();
                var year = $("#selected-tahun").val();
                //? setTooltip
                let i = 1;
                for (i; i <= 31; ++i) {
                    $("#table-monitoring thead .date_selector").eq(i - 1).each(function() {
                        var $td = $(this);
                        //? postAjax
                        $.post("<?= site_url('get_status_dots/') ?>" + i + "/" + modules + "/" + month + "/" + year, function(data) {
                            $('[data-toggle="tooltip"]').tooltip('dispose')
                            let datas = $.parseJSON(data);
                            if (!datas.length == '0') {
                                let datas = $.parseJSON(data);
                                var done = datas[0].data_done;
                                var undone = datas[0].data_undone;
                                $td.attr('data-toggle', "tooltip");
                                $td.attr('title', "DONE : " + done + " <br> UNDONE : " + undone);
                                $('[data-toggle="tooltip"]').tooltip();
                            }
                        });
                    });
                };

                /* Apply the tooltips */
                $('#table-monitoring thead th[title]').tooltip({
                    "container": 'body'
                });
            }
        });
    }
    // ! passByRefrencee ColoumnDynamic
    function dynamicColoumnTable($month){
        var coloumnDate;
        const d = new Date();
        if ($month == '01' || $month == '03' || $month == '05' || $month == '07' || $month == '08' || $month == '10' || $month == '12') {
            //? monthDate31
            coloumnDate = 'NULL';
            $('#table-monitoring').DataTable().columns([coloumnDate]).visible(false);
        } else if ($month == '04' || $month == '06' || $month == '09' || $month == '11') {
            //? monthDate30
            coloumnDate = '38,39';
            $('#table-monitoring').DataTable().columns([coloumnDate]).visible(false);
        } else if ($month == '02') {
            //? monthDate28 || Febuary
            coloumnDate = '36,37,38,39';
            $('#table-monitoring').DataTable().columns([coloumnDate]).visible(false);
        }
    }
    // ! passByRefrencee titleDisplay
    function changeTitle(modules, month, year, bln) {
        if (modules == 'LBP') {
            modules = 'LBP';
            $('.title').html("Monitoring " + modules + " " + month + " " + year);
            $('#table-monitoring').DataTable().clear().destroy();
            initTable(bln);
        } else if (modules == 'SAPKASBANK') {
            modules = 'KASBANK';
            $('.title').html("Monitoring " + modules + " " + month + " " + year);
            $('#table-monitoring').DataTable().clear().destroy();
            initTable(bln);
        } else if (modules == 'SAPINV') {
            modules = 'INVENTORY';
            $('.title').html("Monitoring " + modules + " " + month + " " + year);
            $('#table-monitoring').DataTable().clear().destroy();
            initTable(bln);
        } else {
            modules = 'TPR PROMO';
            $('.title').html("Monitoring " + modules + " " + month + " " + year);
            $('#table-monitoring').DataTable().clear().destroy();
            initTable(bln);
        }
    }
    // ! eventReport
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

    // ! onEventDocument
    $(document).ready(function() {
        //? initVar
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const montNumber = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
        const d = new Date();
        const y = new Date().getFullYear();
        $('.title').html("Monitoring LBP " + monthNames[d.getMonth()] + " " + y);
        // ! callFunct DatatablesRetive and DynamicColoumn
        initTable();
        dynamicColoumnTable(montNumber[d.getMonth()]);

        //! SelectedEventDropdown ChangeTitle
        $('#selected-modul').on('change', function() {
            let modules = $(this).val();
            let bln = $('#selected-bulan').val();
            const d = new Date(bln);
            let year = $('#selected-tahun').val();

            changeTitle(modules, monthNames[d.getMonth()], year, bln);
            dynamicColoumnTable(montNumber[d.getMonth()]);
        });
        $('#selected-bulan').on('change', function() {
            let modules = $('#selected-modul').val();
            let bln = $(this).val();
            const d = new Date(bln);
            let year = $('#selected-tahun').val();

            changeTitle(modules, monthNames[d.getMonth()], year, bln);
            dynamicColoumnTable(montNumber[d.getMonth()]);
        });
        $('#selected-tahun').on('change', function() {
            let modules = $('#selected-modul').val();
            let bln = $('#selected-bulan').val();
            const d = new Date(bln);
            let year = $(this).val();

            changeTitle(modules, monthNames[d.getMonth()], year, bln);
            dynamicColoumnTable(montNumber[d.getMonth()]);
        });

        $('#selected-group-region').on('change', function() {
            let modules = $('#selected-modul').val();
            let bln = $('#selected-bulan').val();
            const d = new Date(bln);
            let year = $('#selected-tahun').val();
            let greg = $("#selected-group-region option:selected").text();
            let select_gregion = $(this).val();

            changeTitle(modules, monthNames[d.getMonth()], year, bln);
            dynamicColoumnTable(montNumber[d.getMonth()]);
            //! getDataRegion by groupRegion
            $.ajax({
                url: "<?= site_url('search_region') ?>",
                type: 'POST',
                data: "grup_region=" + select_gregion,
                success: function(data) {
                    $("#selected-region").html(data);
                }
            });

        });
        $('#selected-region').on('change', function() {
            let modules = $('#selected-modul').val();
            let bln = $('#selected-bulan').val();
            const d = new Date(bln);
            let year = $('#selected-tahun').val();

            changeTitle(modules, monthNames[d.getMonth()], year, bln);
            dynamicColoumnTable(montNumber[d.getMonth()]);
        });
    });

    //! windowResize
//     var delay = (function() {
//         var timer = 0;
//         return function(callback, ms) {
//             clearTimeout(timer);
//             timer = setTimeout(callback, ms);
//         };
//     })();
//     $(function() {
//         var pause = 100;
//         // will only process code within delay(function() { ... }) every 100ms.
//         $(window).resize(function() {
//             delay(function() {
//                 $('#responsive').removeClass('table-responsive');
//                 var width = $(window).width();
//                 if (width >= 768 && width <= 959) {
//                     // code for tablet view
//                 } else if (width >= 480 && width <= 767) {
//                     $('#responsive').addClass('table-responsive');
//                     // code for mobile landscape
//                 } else if (width <= 479) {
//                     // code for mobile portrait
//                 }
//             }, pause);
//         });
//         $(window).resize();
//     });
// </script>