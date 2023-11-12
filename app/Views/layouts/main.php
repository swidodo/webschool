
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi</title>
        <link href="<?= base_url ('css/styles.css');?>" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <link href="<?= base_url('assets/css/sweetalert2.min.css');?>" rel="text/stylesheet">
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
        <style>
            .chart--container {
            width: 100%;
            height: 100%;
            min-height: 530px;
            }

            #myChart button {
            z-index: 1000;
            }

            .zc-ref {
            display: none;
            }
        </style>
      </head>
    <body class="nav-fixed">
        <?= $this->include('includes/navbar.php');?>
        <div id="layoutSidenav">
            <?= $this->include('includes/sidebar');?>
            <div id="layoutSidenav_content">
                <?= $this->renderSection('page-content');?>
                <?= $this->include('includes/footer');?>
            </div>
        </div>
        <?= $this->include('includes/script');?>
    </body>
</html>
