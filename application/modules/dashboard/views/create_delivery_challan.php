<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Create Delivery Challan</h3>
                <hr>
                <?= form_open('dashboard/create_delivery_challan', ['id' => 'create_delivery_challan', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('customer_name', 'Customer Name', 'text', true, 'Please Customer Name.') ?>
                <?= create_dashboard_input('address', 'Address', 'textarea', true, 'Please Type Address.') ?>
                <?= create_dashboard_input('contact', 'Contact', 'text', true, 'Please Type Contact.') ?>
                <?= create_dashboard_input('vat_reg_no', 'Vat Reg No', 'text', false, 'Please Type Contact.') ?>
                <?= create_dashboard_input('transport_type', 'Transport Type', 'text', false, 'Please Type Transport Type.') ?>
                <?= create_dashboard_input('driver_name', 'Driver Name', 'text', true, 'Please Select Driver Name.') ?>
                <?= create_dashboard_input('driver_contact', 'Driver Contact', 'text', false, 'Please Type Driver Contact.') ?>
                <?= create_dashboard_input('delivery_date', 'Delivery Date', 'date', false, 'Please Type Delivery Date.') ?>
                <hr>
                <div class="row">
                    <div class="col-12"><h3>Add products</h3> </div>
                    <div class="col-12" id="items">
                        <div class="row single-item">
                            <div class="col-6"><?= create_dashboard_input('products_id[]', 'Select Product', 'select', false, 'Please Select Product.', false, get_product_array_select()) ?></div>
                            <div class="col-6"><?= create_dashboard_input('per_crtn[]', 'Per Carton', 'number', false, 'Please Type Total Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('crtn_qty[]', 'Carton Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('qty[]', 'Total Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 text-right mb-3">
                        <button class="btn btn-success" type="button" id="add-items">Add Item</button>
                    </div>
                </div>
                <?= create_dashboard_input('remark', 'Remark', 'textarea', false, 'Please Type Remark.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Create Delivery Challan</button>
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
        <div class="col-6"><?= create_dashboard_input('per_crtn[]', 'Per Carton', 'number', false, 'Please Type Total Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('crtn_qty[]', 'Carton Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('qty[]', 'Total Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
    </div>
    <hr>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_delivery_challan', function (e) {
        e.preventDefault();
        if (validate('#create_delivery_challan')) {
            var action = $('#create_delivery_challan').attr('action');
            var data =  $('#create_delivery_challan').serializeArray();
//            data.customer_name = $('input[name="customer_name"]').val();
//            data.address = $('textarea[name="address"]').val();
//            data.contact = $('input[name="contact"]').val();
//            data.vat_reg_no = $('input[name="vat_reg_no"]').val();
//            data.transport_type = $('input[name="transport_type"]').val();
//            data.driver_name = $('input[name="driver_name"]').val();
//            data.driver_contact = $('input[name="driver_contact"]').val();
//            data.delivery_date = $('input[name="delivery_date"]').val();
//
//            data.remark = $('textarea[name="remark"]').val();
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
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Delivery Challan Successfully",
                        type: 'success',
                        preConfirm: () => {
                            window.location.href = '<?= base_url('dashboard/list_delivery_challan') ?>';
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
    $(document).on('focusout', 'input', function () {


        $('input[name="per_crtn[]"').each(function () {
            // calculate quantity
            var per_crtn = parseFloat($(this).val());
            var crtn_qty = parseFloat($(this).closest('.single-item').find('input[name="crtn_qty[]"]').val())
//            console.log(per_crtn, crtn_qty)
            var qty = per_crtn * crtn_qty;
            $(this).closest('.single-item').find('input[name="qty[]"]').val(qty);

        });
    });
</script>