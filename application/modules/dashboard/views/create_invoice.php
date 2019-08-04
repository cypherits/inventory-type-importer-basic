<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Create Invoice</h3>
                <hr>
                <?= form_open('dashboard/create_invoice', ['id' => 'create_invoice', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('customer_name', 'Customer Name', 'text', true, 'Please Customer Name.') ?>
                <?= create_dashboard_input('address', 'Address', 'textarea', true, 'Please Type Address.') ?>
                <?= create_dashboard_input('contact', 'Contact', 'text', true, 'Please Type Contact.') ?>
                <?= create_dashboard_input('order_no', 'Order No', 'text', false, 'Please Type Order_ No.') ?>
                <?= create_dashboard_input('vat_reg_no', 'Vat Reg No', 'text', false, 'Please Type Vat Reg No.') ?>
                <?= create_dashboard_input('transport_method', 'Transport Method', 'text', false, 'Please Type Transport Method.') ?>
                <?= create_dashboard_input('driver_name', 'Driver Name', 'text', false, 'Please Type Driver Name.') ?>
                <?= create_dashboard_input('executive_name', 'Executive Name', 'text', true, 'Please Type Executive Name.') ?>
                <hr>
                <div class="row">
                    <div class="col-12"><h3>Add products</h3> </div>
                    <div class="col-12" id="items">
                        <div class="row single-item">
                            <div class="col-6"><?= create_dashboard_input('products_id[]', 'Select Product', 'select', false, 'Please Select Product.', false, get_product_array_select()) ?></div>
                            <div class="col-6"><?= create_dashboard_input('per_crtn[]', 'Per Carton Quantity', 'number', false, 'Please Type Per Carton Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('crtn_qty[]', 'Number of Carton', 'number', false, 'Please Type Number of Carton.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('qty[]', 'Total Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('unit_price[]', 'Unit Price', 'number', false, 'Please Type Unit Price.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('crtn_price[]', 'Carton Price', 'number', false, 'Please Type Carton Price.') ?></div>
                            <div class="col-6"><?= create_dashboard_input('total_price[]', 'Total Price', 'number', false, 'Please Type Total Price.') ?></div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 text-right">
                        <button class="btn btn-success" type="button" id="add-items">Add Item</button>
                    </div>
                </div>
                <?= create_dashboard_input('total_ammount', 'Total Ammount', 'text', false, 'Please Type total_ammount.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Create Invoice</button>
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
        <div class="col-6"><?= create_dashboard_input('per_crtn[]', 'Per Carton Quantity', 'number', false, 'Please Type Per Carton Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('crtn_qty[]', 'Number of Carton', 'number', false, 'Please Type Number of Carton.') ?></div>
        <div class="col-6"><?= create_dashboard_input('qty[]', 'Total Quantity', 'number', false, 'Please Type Total Quantity.') ?></div>
        <div class="col-6"><?= create_dashboard_input('unit_price[]', 'Unit Price', 'number', false, 'Please Type Unit Price.') ?></div>
        <div class="col-6"><?= create_dashboard_input('crtn_price[]', 'Carton Price', 'number', false, 'Please Type Carton Price.') ?></div>
        <div class="col-6"><?= create_dashboard_input('total_price[]', 'Total Price', 'number', false, 'Please Type Total Price.') ?></div>
    </div>
    <hr>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_invoice', function (e) {
        e.preventDefault();
        if (validate('#create_invoice')) {
            var action = $('#create_invoice').attr('action');
            var data = {};
            data.customer_name = $('input[name="customer_name"]').val();
            data.address = $('textarea[name="address"]').val();
            data.contact = $('input[name="contact"]').val();
            data.order_no = $('input[name="order_no"]').val();
            data.vat_reg_no = $('input[name="vat_reg_no"]').val();
            data.transport_method = $('input[name="transport_method"]').val();
            data.driver_name = $('input[name="driver_name"]').val();
            data.executive_name = $('input[name="executive_name"]').val();
            data.total_ammount = $('input[name="total_ammount"]').val();
            
            products_id = [];
            $('form').find('select[name="products_id[]"]').each(function(){
                products_id.push($(this).val());
            });
            data.products_id = products_id;
            per_crtn = [];
            $('form').find('input[name="per_crtn[]"]').each(function(){
                per_crtn.push($(this).val());
            });
            data.per_crtn = per_crtn;
            crtn_qty = [];
            $('form').find('input[name="crtn_qty[]"]').each(function(){
                crtn_qty.push($(this).val());
            });
            data.crtn_qty = crtn_qty;
            qty = [];
            $('form').find('input[name="qty[]"]').each(function(){
                qty.push($(this).val());
            });
            data.qty = qty;
            unit_price = [];
            $('form').find('input[name="unit_price[]"]').each(function(){
                unit_price.push($(this).val());
            });
            data.unit_price = unit_price;
            crtn_price = [];
            $('form').find('input[name="crtn_price[]"]').each(function(){
                crtn_price.push($(this).val());
            });
            data.crtn_price = crtn_price;
            total_price = [];
            $('form').find('input[name="total_price[]"]').each(function(){
                total_price.push($(this).val());
            });
            data.total_price = total_price;
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Invoice Added Successfully",
                        type: 'success',
                        preConfirm: () => {
                            window.location.href = '<?= base_url('dashboard/list_invoice') ?>';
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
        
        $('input[name="per_crtn[]"').each(function(){
            // calculate quantity
            var per_crtn = parseFloat($(this).val());
            var crtn_qty = parseFloat($(this).closest('.single-item').find('input[name="crtn_qty[]"]').val())
//            console.log(per_crtn, crtn_qty)
            var qty = per_crtn * crtn_qty;
            $(this).closest('.single-item').find('input[name="qty[]"]').val(qty);
            
            var unit_price = parseFloat($(this).closest('.single-item').find('input[name="unit_price[]"]').val());
            var crtn_price = per_crtn * unit_price;
            $(this).closest('.single-item').find('input[name="crtn_price[]"]').val(parseFloat(crtn_price).toFixed(2));
            
            var total_price = unit_price * qty;
            $(this).closest('.single-item').find('input[name="total_price[]"]').val(parseFloat(total_price).toFixed(2));
            if(!isNaN(total_price)){
                total += total_price;
            }
        });
        $('#input_total_ammount').val(parseFloat(total).toFixed(2));
    });
</script>