<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-4 mt-5">
                <div class="row justify-content-center">
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/create_import_expense')?>'">
                        <a href="<?= base_url('dashboard/create_import_expense')?>"><span class="icon-create_expense"></span><br><br>Create Import Expense</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/list_import_expense')?>'">
                        <a href="<?= base_url('dashboard/list_import_expense')?>"><span class="icon-list_expense"></span><br><br>All Import Expense</a>
                    </div>
                    <div class="col-6 card-item-col" onclick="window.location.href = '<?= base_url('dashboard/profit_loss')?>'">
                        <a href="<?= base_url('dashboard/profit_loss')?>"><span class="icon-profit_loss"></span><br><br>Profit & Loss</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>