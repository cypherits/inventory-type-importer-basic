<?php $this->load->view('dashboard/header') ?>
<style>
    /*CSS For Payment Invoice Page*/

    .invoice_company .invoice_company_info {
        background: url(<?= base_url('assets/img/invoice_head.png') ?>);
        background-size: cover;
        background-position: center center;
    }

    .invoice_company .invoice_company_info .logo_name h3 {
        color: #fff;
        margin-bottom: 0px;
    }

    .invoice_company .invoice_company_info h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 40px;
        font-weight: 500;
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 0px;
    }

    .invoice_company .invoice_title {
        background: #09094A;
        color: #fff;
        display: inline-block;
        font-weight: 500;
        font-size: 20px;
        font-family: 'Poppins', sans-serif;
        padding: 12px 40px 12px 25px;
        border-left: 12px solid #F30812;
        text-transform: uppercase;
    }

    .invoice_company .invoice_title:after {
        content: "";
        width: 0;
        height: 0;
        border-bottom: 40px solid #09094A;
        border-right: 25px solid transparent;
        position: absolute;
        top: 0;
        display: inline-block;
        margin-left: 40px;
    }

    .invoice_company .invoice_to td {
        border-top: none;
        padding-bottom: 0px;
        padding-right: 0px;
    }

    .invoice_company .invoice_to td:first-child {
        padding-left: 35px;
    }

    .invoice_company .invoice_to td:first-child,
    .invoice_company .invoice_to td:nth-child(3) {
        width: 125px;
        font-weight: 600;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        padding-right: 0px;
    }

    .invoice_company .invoice_to td:nth-child(2) {
        width: 270px;
    }

    .invoice_company .invoice_to td:first-child span,
    .invoice_company .invoice_to td:nth-child(3) span {
        float: right;
    }

    .invoice_details td {
        border-top: none;
        padding-bottom: 0px;
    }

    .invoice_details td:first-child {
        padding-left: 0px !important;
    }

    .travel_details_title {
        margin-bottom: 0px;
    }

    .travel_details .table .thead-dark th {
        background-color: #2761AC !important;
        border-color: #2761AC;
        color: #fff !important;
    }

    .travel_details .table td {
        border-top: 1px solid #D8DDE9;
    }

    .travel_details .table {
        border: 1px solid #D8DDE9;
    }

    .travel_details .table td {
        border-right: 1px solid #D8DDE9;
        border-left: 1px solid #D8DDE9;
    }

    .travel_details .table td:nth-child(2) {
        border-right: unset;
        border-left: unset;
    }

    .invoice_details td:first-child {
        width: 135px !important;
    }

    .invoice_details td:first-child span {
        float: right;
    }

    .total_charge .table td,
    .total_charge .table {
        border: none;
    }

    .total_charge .table td:first-child {
        text-align: left;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        padding: 5px 0 5px 0;
    }

    .total_charge .table td:first-child span {
        float: right;
    }

    .total_charge .table td:last-child {
        text-align: right;
        padding: 5px 0 5px 0;
    }

    .total_charge .table tr:last-child {
        border-top: 1px solid #000;
        margin-top: 5px;
        padding-top: 5px;
    }

    .signature {
        width: 100%;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        border-top: 1px solid #09094A;
        padding-top: 10px;
    }

    .bottom_contact_info i {
        padding: 0px;
        background: #C1E2FF;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        line-height: 50px;
        color: #2785FF;
        margin-bottom: 15px;
    }

    .bottom_contact_info p {
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }

    .thank_you_msg {
        background: #EEF6FF;
    }

    .thank_you_msg p {
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
    @media print(){
        body{
            display: none !important;
        }
        .print{
            display: block !important;
        }
        .no-print{
            display: none !important;
        }

    }
    .print{
        display: none;
    }
    @media print{
        .wrapper{
            display: none !important;
        }
        .print{
            display: block !important;
        }
        .table, .table thead, .table thead tr, .table thead tr th, .table thead tr td, .table tbody tr, .table tbody tr td{
            border-color: #bbb !important;
        }
    } 
</style>
<div class="container mb-3 mt-3 no-print">
    <div class="row">
        <div class="col-12 text-right">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-secondary" type="button" onclick="window.print()"><span class="fa fa-print"></span> Print</button>
            </div>
        </div>
    </div>
</div>
<div class="container p-5 about_us_container invoice_company bg-white">
    <div class="row">
        <div class="col-12 invoice_company_info pt-4 pb-4 mb-5">
            <div class="row">
                <div class="col-md-4 col-12 pl-4 logo_name">
                    <img width="120" src="<?= base_url('assets/img/logo.png') ?>">
                    <h3>RH TRADE INTERNATIONAL</h3>
                </div>

                <div class="col-md-3 offset-md-5 col-12 align-self-center text-center">
                    <h1>Delivery Challan</h1>                          
                </div>                        
            </div>
        </div>
        <div class="col-md-6 col-xl-8 col-xxl-9 pl-0">
            <h1 class="invoice_title">Deliver To</h1><br>
            <table class="table invoice_to">
                <tbody>
                    <tr>
                        <td>Name <span>:</span></td>
                        <td>
                            <?= $customer_name ?>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Contact <span>:</span></td>
                        <td>
                            <?= $contact ?>
                        </td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr> 
                    <tr>
                        <td>Address <span>:</span></td>
                        <td><?= $address ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>                             
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-3 pr-0 mt-3 mt-xl-0">
            <h1 class="invoice_title">Driver Details</h1>
            <table class="table invoice_details">
                <tbody>
                    <tr>
                        <td>Driver Name <span>:</span></td>
                        <td><?= $driver_name ?></td>
                    </tr>
                    <tr>
                        <td>Driver Contact <span>:</span></td>
                        <td><?= $driver_contact ?></td>
                    </tr>
                    <tr>
                        <td>Transport Type <span>:</span></td>
                        <td><?= $transport_type ?></td>
                    </tr>
                    <tr>
                        <td>Delivery Date <span>:</span></td>
                        <td><?= date('d M Y', strtotime($delivery_date)) ?></td>
                    </tr> 
                    <tr>                           
                </tbody>
            </table>
        </div>

        <div class="col-lg-12 mt-4 pl-0 pr-0 payment_info travel_details">
            <h1 class="invoice_title travel_details_title">Items Details</h1>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Per Carton</th>
                        <th>Carton Quantity</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                        ?>
                        <tr>
                            <td><?= get_product_by_id($item->products_id)['product_name'] ?></td>
                            <td><?= get_product_by_id($item->products_id)['size'] ?></td>
                            <td><?= $item->per_crtn ?></td>
                            <td><?= $item->crtn_qty ?></td>
                            <td><?= $item->qty ?></td>
                        </tr>
                        <?php
                    }
                    ?>                         
                </tbody>
            </table>
            <div class="col-xl-3 offset-xl-9 col-lg-4 offset-lg-8 pr-0 total_charge">
                
            </div>
        </div>
        <div class="col-md-5 pl-0">
            <h1 class="invoice_title">Remark</h1>
            <p><?=$remark?></p>
        </div>
        <div class="col-md-3 offset-md-4 pr-0 d-flex align-items-end mt-5">
            <h3 class="text-center signature">Authorised Signature</h3>
        </div>
        <div class="col-md-4 text-center mt-5 pt-5 bottom_contact_info">
            <i class="fa fa-home"></i>
            <p>
                83/B Mouchak Tower, Level-07, Room # 812, Malibagh Mor, Dhaka-1217
            </p>
        </div>
        <div class="col-md-4 text-center mt-5 pt-5 bottom_contact_info">
            <i class="fa fa-phone"></i>
            <p>
                01712-561750<br>01309-632663 
            </p>
        </div>
        <div class="col-md-4 text-center mt-5 pt-5 bottom_contact_info">
            <i class="fa fa-envelope"></i>
            <p>
                rhtradeintl@gmail.com<br>rubel_bpl@yahoo.com
            </p>
        </div>  
        <div class="col-lg-12 p-3 thank_you_msg mt-5">
            <p class="text-center mb-0">Thank You For Your Business.</p>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>
