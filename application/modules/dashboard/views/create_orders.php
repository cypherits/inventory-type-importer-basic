<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Create Order</h3>
                <hr>
                <?= form_open('dashboard/create_orders', ['id' => 'create_orders', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('customer_name', 'Customer Name', 'text', true, 'Please Customer Name.') ?>
                <?= create_dashboard_input('address', 'Address', 'textarea', true, 'Please Type Address.') ?>
                <?= create_dashboard_input('contact', 'Contact', 'text', true, 'Please Type Contact.') ?>
                <?= create_dashboard_input('reference', 'Reference', 'text', false, 'Please Type Reference.') ?>
                <?= create_dashboard_input('date_of_visit', 'Date of Visit', 'date', true, 'Please Select Date of Visit.') ?>
                <?= create_dashboard_input('payment_type', 'Payment Type', 'select', false, 'Please Select Payment Type.', false, ['cash' => 'Cash', 'chq' => 'Cheque']) ?>
                <div id="bank" class="d-none"><?= create_dashboard_input('bank_name', 'Bank Name', 'text', false, 'Please Type Bank Name.') ?>
                <?= create_dashboard_input('chq_no', 'Cheque No', 'text', false, 'Please Type Cheque No.') ?>
                <?= create_dashboard_input('chq_ammount', 'Cheque Amount', 'text', false, 'Please Type Cheque Amount.') ?></div>
                <hr>
                <div class="row">
                    <div class="col-12"><h3>Add products</h3> </div>
                    <div class="col-12" id="items">
                        <div class="row single-item">
                            <div class="col-6"><?= create_dashboard_input('products_id[]', 'Select Product', 'select', false, 'Please Select Product.', false, get_product_array_select()) ?></div>
                            <div class="col-6"><?= create_dashboard_input('qty[]', 'Total Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('rate[]', 'Rate', 'number', false, 'Please Type Total Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('total_rate[]', 'Total', 'number', false, 'Please Type Total Quantity.') ?></div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 text-right mb-3">
                        <button class="btn btn-success" type="button" id="add-items">Add Item</button>
                    </div>
                </div>
                <?= create_dashboard_input('total_ammount', 'Total Amount', 'number', true, 'Please Type Total Amount.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Order</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<div class="d-none" id="item-ref">
    <div class="row single-item">
        <div class="col-6"><?= create_dashboard_input('products_id[]', 'Select Product', 'select', false, 'Please Select Product.', false, get_product_array_select()) ?></div>
        <div class="col-6"><?= create_dashboard_input('qty[]', 'Total Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('rate[]', 'Rate', 'number', false, 'Please Type Total Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('total_rate[]', 'Total', 'number', false, 'Please Type Total Quantity.') ?></div>
    </div>
    <hr>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_orders', function (e) {
        e.preventDefault();
        if (validate('#create_orders')) {
            var action = $('#create_orders').attr('action');
            var data =  $('#create_orders').serializeArray();
//            data.customer_name = $('input[name="customer_name"]').val();
//            data.address = $('textarea[name="address"]').val();
//            data.contact = $('input[name="contact"]').val();
//            data.reference = $('input[name="reference"]').val();
//            data.date_of_visit = $('input[name="date_of_visit"]').val();
//            data.bank_name = $('input[name="bank_name"]').val();
//            data.total_ammount = $('input[name="total_ammount"]').val();
//            
//            products_id = [];
//            $('form').find('select[name="products_id[]"]').each(function () {
//                products_id.push($(this).val());
//            });
//            data.products_id = products_id;
//            qty = [];
//            $('form').find('input[name="qty[]"]').each(function () {
//                qty.push($(this).val());
//            });
//            data.qty = qty;
//            rate = [];
//            $('form').find('input[name="rate[]"]').each(function () {
//                rate.push($(this).val());
//            });
//            data.rate = rate;
//            total_rate = [];
//            $('form').find('input[name="total_rate[]"]').each(function () {
//                total_rate.push($(this).val());
//            });
//            data.total_rate = total_rate;
            console.log(data);
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Order Added Successfully",
                        type: 'success',
                        preConfirm: () => {
                            window.location.href = '<?= base_url('dashboard/list_orders') ?>';
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
        
        $('input[name="qty[]"').each(function(){
            // calculate quantity
            var qty = parseFloat($(this).val());
            
            var rate = parseFloat($(this).closest('.single-item').find('input[name="rate[]"]').val());
            
            var total_rate = rate * qty;
            $(this).closest('.single-item').find('input[name="total_rate[]"]').val(parseFloat(total_rate).toFixed(2));
            if(!isNaN(total_rate)){
                total += total_rate;
            }
        });
        $('#input_total_ammount').val(parseFloat(total).toFixed(2));
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