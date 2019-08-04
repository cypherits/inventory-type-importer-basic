<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inventory</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/icon/style.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/datetimepicker/css/datetimepicker.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/datatables/datatables.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/sweetalert/sweetalert.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.default.css" id="theme-stylesheet">
        <link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom.css">
        <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon.ico">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <style>
            #spinner-wrap{
                position: absolute;
                width: 100%;
                height: 100%;
                z-index: 99999999;
                background: #311054cc;
                display: none;
                left: 0;
                top: 0;
            }
            .spinner {
                margin: 100px auto;
                width: 40px;
                height: 40px;
                position: relative;
                text-align: center;

                -webkit-animation: sk-rotate 2.0s infinite linear;
                animation: sk-rotate 2.0s infinite linear;

                margin-top: calc(50vh - 20px);
            }

            .dot1, .dot2 {
                width: 60%;
                height: 60%;
                display: inline-block;
                position: absolute;
                top: 0;
                background-color: #fff;
                border-radius: 100%;

                -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
                animation: sk-bounce 2.0s infinite ease-in-out;
            }

            .dot2 {
                top: auto;
                bottom: 0;
                -webkit-animation-delay: -1.0s;
                animation-delay: -1.0s;
            }

            @-webkit-keyframes sk-rotate { 100% { -webkit-transform: rotate(360deg) }}
            @keyframes sk-rotate { 100% { transform: rotate(360deg); -webkit-transform: rotate(360deg) }}

            @-webkit-keyframes sk-bounce {
                0%, 100% { -webkit-transform: scale(0.0) }
                50% { -webkit-transform: scale(1.0) }
            }

            @keyframes sk-bounce {
                0%, 100% { 
                    transform: scale(0.0);
                    -webkit-transform: scale(0.0);
                } 50% { 
                    transform: scale(1.0);
                    -webkit-transform: scale(1.0);
                }
            }
        </style>
        <div id="spinner-wrap">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <div class="side-navbar-wrapper">
                <!-- Sidebar Header    -->
                <div class="sidenav-header d-flex align-items-center justify-content-center">
                    <!-- User Info-->
                    
                    <!-- Small Brand information, appears on minimized sidebar-->
                    <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>IM</strong><strong class="text-primary">S</strong></a></div>
                </div>
                <!-- Sidebar Navigation Menus-->
                <div class="main-menu">
                    <ul id="side-main-menu" class="side-menu list-unstyled">
                        <li class=""><a href="<?= base_url() ?>"> <i class="fa fa-home"></i>Home</a></li>

                        <li class="">
                            <a href="#menu-projects" aria-expanded="false" data-toggle="collapse"> <i class="icon-sales"></i>Sales <i class="fa fa-caret-right"></i></a>
                            <ul id="menu-projects" class="collapse list-unstyled ">
                                <li class="">
                                    <a href="#menu-invoice" aria-expanded="false" data-toggle="collapse">Invoice</a>
                                    <ul id="menu-invoice" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_invoice') ?>">Create Invoice</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_invoice') ?>">All Invoice</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="#menu-orders" aria-expanded="false" data-toggle="collapse">Order Requisition</a>
                                    <ul id="menu-orders" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_orders') ?>">Create Order</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_orders') ?>">All Order</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="#menu-bills" aria-expanded="false" data-toggle="collapse">Bills</a>
                                    <ul id="menu-bills" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_bills') ?>">Create Bills</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_bills') ?>">All Bills</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="#menu-money_receipt" aria-expanded="false" data-toggle="collapse">Money Receipt</a>
                                    <ul id="menu-money_receipt" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_money_receipt') ?>">Create Money Receipt</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_money_receipt') ?>">All Money Receipt</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="#menu-delivery_challan" aria-expanded="false" data-toggle="collapse">Delivery Challan</a>
                                    <ul id="menu-delivery_challan" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_delivery_challan') ?>">Create Delivery Challan</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_delivery_challan') ?>">All Delivery Challan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#menu-inventory-parent" aria-expanded="false" data-toggle="collapse"> <i class="icon-inventory"></i>Inventory <i class="fa fa-caret-right"></i></a>
                            <ul id="menu-inventory-parent" class="collapse list-unstyled ">
                                <li class="">
                                    <a href="#menu-inventory" aria-expanded="false" data-toggle="collapse">Inventory</a>
                                    <ul id="menu-inventory" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_inventory') ?>">Create Inventory</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_inventory') ?>">All Inventory</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="#menu-products" aria-expanded="false" data-toggle="collapse">Products</a>
                                    <ul id="menu-products" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_products') ?>">Create Products</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_products') ?>">All Products</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#menu-accounts-parent" aria-expanded="false" data-toggle="collapse"> <i class="icon-accounts"></i>Accounts <i class="fa fa-caret-right"></i></a>
                            <ul id="menu-accounts-parent" class="collapse list-unstyled ">
                                <li class="">
                                    <a href="#menu-import-expanse" aria-expanded="false" data-toggle="collapse">Import Expense</a>
                                    <ul id="menu-import-expanse" class="collapse list-unstyled ml-3">
                                        <li class=""><a href="<?= base_url('dashboard/create_import_expense') ?>">Create Import Expense</a></li>
                                        <li class=""><a href="<?= base_url('dashboard/list_import_expense') ?>">All Import Expense</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="<?= base_url('dashboard/profit_loss') ?>">Profit & Loss</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="<?= base_url('dashboard/password') ?>"> <i class="fa fa-key"></i>Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="page">
            <!-- navbar-->
            <header class="header">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a><a href="index.html" class="navbar-brand">
                                    <div class="brand-text d-none d-md-inline-block"><span>Inventory Management </span><strong class="text-primary">System</strong></div></a></div>
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                <!-- Notifications dropdown-->

                                <!-- Log out-->
                                <li class="nav-item"><a href="<?= base_url('auth/logout') ?>" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span> <i class="fa fa-sign-out-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <section>