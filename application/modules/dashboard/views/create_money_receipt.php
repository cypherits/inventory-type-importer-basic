<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Create Money Receipt</h3>
                <hr>
                <?= form_open('dashboard/create_money_receipt', ['id' => 'create_money_receipt', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('customer_name', 'Customer Name', 'text', true, 'Please Customer Name.') ?>
                <?= create_dashboard_input('address', 'Address', 'textarea', true, 'Please Type Address.') ?>
                <?= create_dashboard_input('contact', 'Contact', 'text', true, 'Please Type Contact.') ?>
                <?= create_dashboard_input('reference', 'Reference', 'text', false, 'Please Type Reference.') ?>
                <?= create_dashboard_input('order_no', 'Order No', 'text', false, 'Please Type Order No.') ?>
                <?= create_dashboard_input('order_date', 'Order Date', 'date', false, 'Please Select Order Date.') ?>
                <hr>
                <div class="row">
                    <div class="col-12"><h3>Add Items</h3> </div>
                    <div class="col-12" id="items">
                        <div class="row">
                            <div class="col-6"><?= create_dashboard_input('particular[]', 'Particulars', 'select', false, 'Please Select Particulars.', false, get_product_array_select()) ?></div>
                            <div class="col-6"><?= create_dashboard_input('ammount[]', 'Ammount', 'number', false, 'Please Type Total Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('remarks[]', 'Remark', 'textarea', false, 'Please Type Total Quantity.') ?></div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 text-right mb-3">
                        <button class="btn btn-success" type="button" id="add-items">Add Item</button>
                    </div>
                </div>
                <?= create_dashboard_input('total', 'Total', 'text', false, 'Please Type Total.') ?>
                <?= create_dashboard_input('paid', 'Paid', 'text', false, 'Please Type Total.') ?>
                <?= create_dashboard_input('due', 'Due', 'text', false, 'Please Type Total.') ?>
                <?= create_dashboard_input('payment_type', 'Payment Type', 'select', false, 'Please Select Payment Type.', false, ['cash' => 'Cash', 'chq' => 'Cheque']) ?>
                <div id="bank" class="d-none"><?= create_dashboard_input('bank_name', 'Bank Name', 'text', false, 'Please Type Bank Name.') ?>
                <?= create_dashboard_input('chq_no', 'Cheque No', 'text', false, 'Please Type Cheque No.') ?>
                <?= create_dashboard_input('chq_ammount', 'Cheque Amount', 'text', false, 'Please Type Cheque Amount.') ?></div>
                <?= create_dashboard_input('in_words', 'In Words', 'text', false, 'Please Type In Words.') ?>
                <?= create_dashboard_input('remark', 'Remark', 'textarea', false, 'Please Type Bank Name.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Create Money Receipt</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<div class="d-none" id="item-ref">
    <div class="row">
        <div class="col-6"><?= create_dashboard_input('particular[]', 'Particulars', 'select', false, 'Please Select Particulars.', false, get_product_array_select()) ?></div>
        <div class="col-6"><?= create_dashboard_input('ammount[]', 'Ammount', 'number', false, 'Please Type Total Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('remarks[]', 'Remark', 'textarea', false, 'Please Type Total Quantity.') ?></div>
    </div>
    <hr>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_money_receipt', function (e) {
        e.preventDefault();
        if (validate('#create_money_receipt')) {
            var action = $('#create_money_receipt').attr('action');
            var data =  $('#create_money_receipt').serializeArray();
//            data.customer_name = $('input[name="customer_name"]').val();
//            data.address = $('textarea[name="address"]').val();
//            data.contact = $('input[name="contact"]').val();
//            data.reference = $('input[name="reference"]').val();
//            data.order_no = $('input[name="order_no"]').val();
//            data.order_date = $('input[name="order_date"]').val();
//            data.payment_type = $('select[name="payment_type"]').val();
//            data.bank_name = $('input[name="bank_name"]').val();
//            data.chq_no = $('input[name="chq_no"]').val();
//            data.chq_ammount = $('input[name="chq_ammount"]').val();
//            data.total = $('input[name="total"]').val();
//            data.remark = $('textarea[name="remark"]').val();
//            data.in_words = $('input[name="in_words"]').val();
//            data.paid = $('input[name="paid"]').val();
//            data.due = $('input[name="due"]').val();
//
//            particular = [];
//            $('form').find('seelct[name="particular[]"]').each(function () {
//                particular.push($(this).val());
//            });
//            data.particular = particular;
//            remarks = [];
//            $('form').find('textarea[name="remarks[]"]').each(function () {
//                remarks.push($(this).val());
//            });
//            data.remarks = remarks;
//            ammount = [];
//            $('form').find('input[name="ammount[]"]').each(function () {
//                ammount.push($(this).val());
//            });
//            data.ammount = ammount;
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Order Added Successfully",
                        type: 'success',
                        preConfirm: () => {
                            window.location.href = '<?= base_url('dashboard/list_money_receipt') ?>';
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
    $(document).on('click', '#add-items', function () {
        var html = $('#item-ref').html();
        $('#items').append(html);
    });
    $(document).on('focusout', 'input', function(){
        var total = 0;
        
        $('input[name="ammount[]"').each(function(){
        console.log('here');
            // calculate quantity
            var amount = parseFloat($(this).val());
            if(!isNaN(amount)){
                total += amount;
            }
            
        });
        var paid = parseFloat($('#input_paid').val());
        if(!isNaN(paid)){
            var due = total - paid;
        }else{
            var due = total - total;
        } 
        $('#input_due').val(parseFloat(due).toFixed(2));
        $('#input_total').val(parseFloat(total).toFixed(2));
    });
    $(document).on('change', '#input_payment_type', function(){
        var val = $(this).val();
        if(val == 'chq'){
            $('#bank').removeClass('d-none');
        }else{
            $('#bank').addClass('d-none');
        }
    });
</script>