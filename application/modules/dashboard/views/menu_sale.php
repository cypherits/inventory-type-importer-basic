<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-4 mt-5">
                <div class="row justify-content-center">
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_invoice')?>'">
                        <a href="<?= base_url('dashboard/create_invoice')?>"><span class="icon-create_invoice"></span><br><br>Create Invoice</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_invoice')?>'">
                        <a href="<?= base_url('dashboard/list_invoice')?>"><span class="icon-list_invoice"></span><br><br>All Invoice</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_orders')?>'">
                        <a href="<?= base_url('dashboard/create_orders')?>"><span class="icon-create_order"></span><br><br>Create Orders</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_orders')?>'">
                        <a href="<?= base_url('dashboard/list_orders')?>"><span class="icon-list_order"></span><br><br>All Orders</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_bills')?>'">
                        <a href="<?= base_url('dashboard/create_bills')?>"><span class="icon-create_bill"></span><br><br>Create Bills</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_bills')?>'">
                        <a href="<?= base_url('dashboard/list_bills')?>"><span class="icon-list_bill"></span><br><br>All Bills</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_money_receipt')?>'">
                        <a href="<?= base_url('dashboard/create_money_receipt')?>"><span class="icon-create_receipt"></span><br><br>Create Money Receipt</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_money_receipt')?>'">
                        <a href="<?= base_url('dashboard/list_money_receipt')?>"><span class="icon-list_receipt"></span><br><br>All Money Receipt</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_delivery_challan')?>'">
                        <a href="<?= base_url('dashboard/create_delivery_challan')?>"><span class="icon-create_delivery"></span><br><br>Create Delivery Challan</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_delivery_challan')?>'">
                        <a href="<?= base_url('dashboard/list_delivery_challan')?>"><span class="icon-list_delivery"></span><br><br>All Delivery Challan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>