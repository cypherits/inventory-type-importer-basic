<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Import Expense</h3>
                <hr>
                <?= form_open('dashboard/create_import_expense', ['id' => 'create_import_expense', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('products_id', 'Select Product', 'select', false, 'Please Select Product.', false, get_product_array_select()) ?>
                <?= create_dashboard_input('qty', 'Quantity', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('lc_opening_payment_to_bank', 'LC Opening Payment To Bank', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('bank_charges', 'Bank Charges', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('payment_to_exporter', 'Payment To Exporter', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('customs_duty', 'Customs Duty', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('others_payment', 'Others Payment', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('cnf_bill', 'CNF Bill', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('transportation_fare', 'Transportation Fare', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('others_cost', 'Others Cost', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('total_expense', 'Total Expense', 'number', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('unit_cost', 'Unit Cost', 'number', true, 'Please Type Product Size.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Add Import Expense</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_import_expense', function (e) {
        e.preventDefault();
        if (validate('#create_import_expense')) {
            var action = $('#create_import_expense').attr('action');
            var data = {};
            data.products_id = $('select[name="products_id"]').val();
            data.qty = $('input[name="qty"]').val();
            data.lc_opening_payment_to_bank = $('input[name="lc_opening_payment_to_bank"]').val();
            data.bank_charges = $('input[name="bank_charges"]').val();
            data.payment_to_exporter = $('input[name="payment_to_exporter"]').val();
            data.customs_duty = $('input[name="customs_duty"]').val();
            data.others_payment = $('input[name="others_payment"]').val();
            data.cnf_bill = $('input[name="cnf_bill"]').val();
            data.transportation_fare = $('input[name="transportation_fare"]').val();
            data.others_cost = $('input[name="others_cost"]').val();
            data.total_expense = $('input[name="total_expense"]').val();
            data.unit_cost = $('input[name="unit_cost"]').val();
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Product Added Successfully",
                        type: 'success',
                        preConfirm: () =>{
                            window.location.href = '<?=base_url('dashboard/list_import_expense')?>';
                        }
                    });
                } else {
                    $($(r.fields).get().reverse()).each(function (idex, val) {
                        $('[name="' + val + '"]').addClass('invalid').focus();
                        $('[name="' + val + '"]').parent().find('.invalid-feedback').show();
                        $('[name="' + val + '"]').parent().find('.invalid-icon').show();
                    });
                }
            }
            ajax_global.execute_ajax(action, data, callback_method);
        }
    });
    $(document).on('focusout', 'input', function(){
        var total = 0;
        var qty = (isNaN(parseFloat($('#input_qty').val())))?0:parseFloat($('#input_qty').val());
        total += (isNaN(parseFloat($('#input_lc_opening_payment_to_bank').val())))?0:parseFloat($('#input_lc_opening_payment_to_bank').val());
        total += (isNaN(parseFloat($('#input_bank_charges').val())))?0:parseFloat($('#input_bank_charges').val());
        total += (isNaN(parseFloat($('#input_payment_to_exporter').val())))?0:parseFloat($('#input_payment_to_exporter').val());
        total += (isNaN(parseFloat($('#input_customs_duty').val())))?0:parseFloat($('#input_customs_duty').val());
        total += (isNaN(parseFloat($('#input_others_payment').val())))?0:parseFloat($('#input_others_payment').val());
        total += (isNaN(parseFloat($('#input_cnf_bill').val())))?0:parseFloat($('#input_cnf_bill').val());
        total += (isNaN(parseFloat($('#input_transportation_fare').val())))?0:parseFloat($('#input_transportation_fare').val());
        total += (isNaN(parseFloat($('#input_others_cost').val())))?0:parseFloat($('#input_others_cost').val());
        var unit_cost = total/qty;
        $('#input_total_expense').val(parseFloat(total).toFixed(2));
        $('#input_unit_cost').val(parseFloat(unit_cost).toFixed(2));
    });
</script>