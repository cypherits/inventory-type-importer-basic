<?php $this->load->view('dashboard/header') ?>
<?php
$months = [
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
];
$year = [];
for($i = 2019; $i <= date('Y'); $i++){
    $year[$i] = $i;
}
?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Profit Loss</h3>
                <hr>
                <?= form_open('dashboard/get_profit_loss', ['id' => 'create_products', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('month', 'Select Month (leave empty for all)', 'select', false, '', false, $months) ?>
                <?= create_dashboard_input('year', 'Select Year (leave empty for all)', 'select', false, '', false, $year) ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Get Report</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>
