<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=base_name()?> - Dashboard</title>

<link rel="favicon icon" href="<?=base_url()?>assets/img/logo-transparant.png">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/adminlte.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<!-- Daterange picker -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/ekko-lightbox/ekko-lightbox.css">

<link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.js"></script>

<!-- Toastr -->
<script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>

<style>
    .integration-fixed{
        position:fixed;
        z-index:10000000
    }
    .integration-fixed__top-left{
        top:0;
        left:0;
    }
    .integration-fixed__top-right{
        top:0;
        right:0;
    }
    .integration-fixed__bottom-left{
        bottom:0;
        left:0;
    }
    .integration-fixed__bottom-right{
        bottom:0;
        right:0;
    }
    .whatsapp-container {
        padding: 24px
    }

    .whatsapp-button {
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF!important;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none!important;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
        transform: scale(0.9)
    }

    .whatsapp-button:hover {
        transform: scale(1);
        background-color: #1fcc5f
    }
</style>