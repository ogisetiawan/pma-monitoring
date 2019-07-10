<?php
defined('BASEPATH') or exit('No direct script access allowed');
$tahun = date('Y') + 1;
$month = date('m');
?>
<!-- Header Title -->
    <div class="d-flex justify-content-between shadow-sm p-2">
        <div>
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <button type="button" onClick="fnExcelReport()" class="btn btn-outline"><i class="fas fa-file-excel pr-2"></i>XLSX</button>
                <button type="button" class="btn btn-outline"><i class="far fa-file-pdf pr-2"></i>PDF</button>
                <button type="button" class="btn btn-outline"><i class="fas fa-print pr-2"></i>PRINT</button>
            </div>
        </div>
        <div class="">
            <div class="form-row">
                <div class="col-auto col-xs-12">
                    <select id="selected-modul" class="form-control custom-select-sm" title=" Group Region">
                        <option value="LBP">LBP</option>
                        <option value="SAPKASBANK">KASBANK</option>
                        <option value="SAPINV">INVENTORY</option>
                        <option value="PTPR">TPR PROMO</option>
                    </select>
                </div>
                <div class="col-auto col-xs-12">
                    <select id="selected-bulan" class="form-control custom-select-sm" title=" Bulan">
                        <option <?php if ($month == '01') {
                                    echo "selected ";
                                } ?>value="01"> January</option>
                        <option <?php if ($month == '02') {
                                    echo "selected ";
                                } ?>value="02"> Febuary</option>
                        <option <?php if ($month == '03') {
                                    echo "selected ";
                                } ?>value="03"> March</option>
                        <option <?php if ($month == '04') {
                                    echo "selected ";
                                } ?>value="04"> April</option>
                        <option <?php if ($month == '05') {
                                    echo "selected ";
                                } ?>value="05"> May</option>
                        <option <?php if ($month == '06') {
                                    echo "selected ";
                                } ?>value="06"> June</option>
                        <option <?php if ($month == '07') {
                                    echo "selected ";
                                } ?>value="07"> July</option>
                        <option <?php if ($month == '08') {
                                    echo "selected ";
                                } ?>value="08"> August</option>
                        <option <?php if ($month == '09') {
                                    echo "selected ";
                                } ?>value="09"> September</option>
                        <option <?php if ($month == '10') {
                                    echo "selected ";
                                } ?>value="10"> October</option>
                        <option <?php if ($month == '11') {
                                    echo "selected ";
                                } ?>value="11"> November</option>
                        <option <?php if ($month == '12') {
                                    echo "selected ";
                                } ?>value="12"> December</option>
                    </select>
                </div>
                <div class="col-auto col-xs-12">
                    <select class="form-control custom-select-sm" id="selected-tahun" title="Tahun">
                        <?php
                        for ($i = 2016; $i <= $tahun; $i++) { ?>
                            <option value="<?php echo $i ?>" <?php if (date('Y') == $i) {
                                                                    echo "selected ";
                                                                } ?>><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-auto col-xs-12">
                    <select id="selected-group-region" class="form-control custom-select-sm" title=" Group Region">
                        <option value="" selected>-- SELECT GROUP REGION --</option>
                        <option value="1">West</option>
                        <option value="2">Central</option>
                        <option value="3">East</option>
                    </select>
                </div>
                <div class="col-auto col-xs-12">
                    <select id="selected-region" class="form-control custom-select-sm" title=" Region" data-style="btn-sm btn-default" data-width="100px">
                        <option value="">-- SELECT REGION --</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <section class="text-center mt-4">
        <h4 class="font-medium font-weight-light text-uppercase">
            <span class="bq-reds pl-1 test2 title">
            </span>
        </h4>
    </section>
<!-- Header Title -->

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
<!-- Loader SpinKit -->

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
            <tbody class="text-center data-monitoring">
            </tbody>
        </table>
    </div>
</main>
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
                //! COUNT STATUS
                // console.log($(".data-monitoring td:nth-child(4):contains('GT')").length);
                // var billable = 0;
                // let table = $('#table-monitoring').DataTable();
                // var rowCount = table.rows()[0].length;
                // for (var row = 0; row < rowCount; row++) {
                //     if (table.cells(row, 3).data().indexOf('GT') > -1) {
                //         billable++;
                //     }
                // }
                // alert(billable + ' total');
            }
        });
    }
    // ! passByRefrencee ColoumnDynamic
    function dynamicColoumnTable($month) {
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
            dynamicColoumnTable(montNumber[d.getMonth()])

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
    // 
</script>