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
    <!-- Plugins -->
    <link href="<?= base_url('assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/spinkit/1.2.5/spinkit.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->
    <!-- Style CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tail.select@0.5.14/css/default/tail.select-light.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- Main JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Plugin -->
    <script type="text/javascript" src="<?= base_url('assets/js/addons/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tail.select@0.5.14/js/tail.select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //! Login Form
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
                            alert('Berhasil Login.. Mengarahkan');
                            window.location.href = "<?= site_url('') ?>";
                        } else {
                            alert('User tidak ditemukan');
                        }
                    },
                });
            });
            $('#modalLogin').on('shown.bs.modal', function() {
                $('input:visible:enabled:first', this).focus()
            })
        });
    </script>
</head>