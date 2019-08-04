<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-4 mt-5">
                <div class="row justify-content-center">
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/menu_sale')?>'">
                        <a href="<?= base_url('dashboard/menu_sale')?>"><span class="icon-sales"></span><br><br>Sales</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/menu_inventory')?>'">
                        <a href="<?= base_url('dashboard/menu_inventory')?>"><span class="icon-inventory"></span><br><br>Inventory</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/menu_accounts')?>'">
                        <a href="<?= base_url('dashboard/menu_accounts')?>"><span class="icon-accounts"></span><br><br>Accounts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>