<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Monitoring PMA">
    <meta name="robot" content="noindex, nofollow">
    <meta name="keywords" content="Monitoring PMA">
    <meta name="keywords" content="Monitoring PMA">
    <title><?= $title ?></title>
    <!-- Main CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugins -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <link href="<?= base_url('assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/addons/datatables-select.min.css') ?>" rel="stylesheet">
    <!-- Style CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
    <style>
        .teal.accent-3 {
            background-color: #cb240f !important;
        }

        table thead tr th {
            font-size: 11px;
            font-weight: 500;
        }

        table.table th {
            line-height: 13px;
            text-align: center;
            padding: 12px 8px 12px 8px;
            vertical-align: middle;
        }

        table tbody tr td {
            font-size: 11px;
            font-weight: 300;
        }

        table.table td {
            line-height: 13px;
            vertical-align: middle;
            padding: 12px 8px 12px 8px;
        }

        table tbody tr td p {
            margin: 0;
            margin: 0;
            font-size: 43px;
        }

        .red-pma {
            padding: 0px 0;
            background: #cc0000;
            background: -webkit-linear-gradient(right, #f05454 0%, #cc0000 65%);
            background: -moz-linear-gradient(right, #f05454 0%, #cc0000 65%);
            background: -o-linear-gradient(right, #f05454 0%, #cc0000 65%);
            background: -ms-linear-gradient(right, #f05454 0%, #cc0000 65%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#cc0000', endColorstr='#f05454', GradientType=1);
        }

        h1.cs-header-title {
            margin-top: auto;
            font-weight: 600;
            font-size: 40px;
        }

        .custom-ogi {
            box-shadow: 0px -15px 15px -15px rgba(0, 0, 0, .2) inset, 0px 15px 15px -15px rgba(0, 0, 0, .2) inset;
        }

        table.table-hover tbody tr:hover {
            cursor: pointer;
            background:none;
            transition: .3s;
            box-shadow: 0px -15px 15px -15px rgba(0, 0, 0, .2) inset, 0px 15px 15px -15px rgba(0, 0, 0, .2) inset;
        }
    </style>
</head>