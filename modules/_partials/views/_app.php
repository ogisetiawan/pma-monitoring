<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $description ?>">
    <meta name="robot" content="noindex, nofollow">
    <meta name="keywords" content="<?= $keyword ?>">
    <meta name="author" content="@ogisetiawan">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/pma.ico') ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugins CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/spinkit/1.2.5/spinkit.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tail.select@0.5.14/css/default/tail.select-light.css" rel="stylesheet">
    <!-- <link href="https://unpkg.com/pnotify@4.0.0/dist/PNotifyBrightTheme.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.6/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- Main JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Plugin JS-->
    <script type="text/javascript" src="<?= base_url('assets/js/addons/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tail.select@0.5.14/js/tail.select.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.6/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="https://unpkg.com/pnotify@4.0.0/dist/umd/PNotify.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            //! initTailSelect
            tail.select(".tail-select-multiple", {
                search: true,
                width: "100%",
                multiLimit: 10,
                multiple: true,
            });
            tail.select(".tail-select-single", {
                search: true,
                width: "100%",
            });
            //! sweetAlert
            function sweetAlert(type, title, text, btn) {
                Swal.fire({
                    type: type,
                    title: title,
                    text: text,
                    confirmButtonClass: btn,
                    timer: 2000
                })
            }
            //! LoginForm
            $("#form-login").submit(function(e) {
                e.preventDefault();
                var serializedData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('checkLogin') ?>",
                    data: serializedData,
                    dataType: "JSON",
                    cache: false,
                    success: function(respone) {
                        if (respone == 1) {
                            sweetAlert('success', 'Success...', 'Login processed..!!', 'btn-success');
                            window.location.href = "<?= site_url('') ?>";
                        } else {
                            sweetAlert('error', 'Oops...', 'Invalid Username or password..!!', 'btn-danger');
                        }
                    },
                });
            });
            $('#modalLogin').on('shown.bs.modal', function() {
                $('input:visible:enabled:first', this).focus()
            })
            //! InputForm
            $("#form-input").submit(function(e) {
                e.preventDefault();
                var serializedData = $(this).serialize();
                $status = '';
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn-success',
                        cancelButton: 'btn-danger'
                    },
                })
                $.post('<?= site_url('check_form_nosales') ?>', serializedData, function(respone) {
                    if (respone == 1) {
                        $status = 'Updated';
                    } else {
                        $status = 'Insert';
                    }

                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure ' + $status + ' ?',
                        text: "Form request..!!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, ' + $status + ' it!',
                        cancelButtonText: 'No, cancel!',
                        animation: false,
                        customClass: {
                            popup: 'animated bounceInDown'
                        },
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.post('<?= site_url('insertUpdate_form_nosales') ?>', serializedData + "&status=" + $status, function(data) {
                                console.log(data);
                                swalWithBootstrapButtons.fire(
                                    $status + '!',
                                    'Your data has been ' + data + '',
                                    'success'
                                )
                            });
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your form request is safe :)',
                                'error'
                            )
                        }
                    });
                });
            });
        });
    </script>
</head>