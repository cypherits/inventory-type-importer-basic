<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-4 mt-5">
                <div class="row justify-content-center">
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_inventory')?>'">
                        <a href="<?= base_url('dashboard/create_inventory')?>"><span class="icon-create_inventory"></span><br><br>Create Inventory</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_inventory')?>'">
                        <a href="<?= base_url('dashboard/list_inventory')?>"><span class="icon-list_inventory"></span><br><br>All Inventory</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_products')?>'">
                        <a href="<?= base_url('dashboard/create_products')?>"><span class="icon-create_order"></span><br><br>Create Product</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_products')?>'">
                        <a href="<?= base_url('dashboard/list_products')?>"><span class="icon-list_order"></span><br><br>All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>