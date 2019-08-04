<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Add Product To Inventory</h3>
                <hr>
                <?= form_open('dashboard/create_inventory', ['id' => 'create_inventory', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('products_id', 'Select Product', 'select', true, 'Please Select Product.', false, get_product_array_select()) ?>
                <?= create_dashboard_input('import_invoice_ref', 'Import Invoice Reference', 'text', true, 'Please Type Import Invoice Reference.') ?>
                <?= create_dashboard_input('per_crtn', 'Per Carton Quantity', 'number', true, 'Please Type Per Carton Quantity.') ?>
                <?= create_dashboard_input('crtn_qty', 'Number of Carton', 'number', true, 'Please Type Number of Carton.') ?>
                <?= create_dashboard_input('qty', 'Total Quantity', 'number', true, 'Please Type Total Quantity.') ?>
                <?= create_dashboard_input('remark', 'Remark', 'textarea', false, 'Please Type Total Quantity.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Add Product To Inventory</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_inventory', function (e) {
        e.preventDefault();
        if (validate('#create_inventory')) {
            var action = $('#create_inventory').attr('action');
            var data = {};
            data.products_id = $('select[name="products_id"]').val();
            data.import_invoice_ref = $('input[name="import_invoice_ref"]').val();
            data.per_crtn = $('input[name="per_crtn"]').val();
            data.crtn_qty = $('input[name="crtn_qty"]').val();
            data.qty = $('input[name="qty"]').val();
            data.remark = $('textarea[name="remark"]').val();
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Inventory Added Successfully",
                        type: 'success',
                        preConfirm: () =>{
                            window.location.href = '<?=base_url('dashboard/list_inventory')?>';
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
        var per_crtn = $('input[name="per_crtn"]').val();
        var crtn_qty = $('input[name="crtn_qty"]').val();
        if (per_crtn != '' && crtn_qty != ''){
            var qty = parseInt(per_crtn)*parseInt(crtn_qty);
            $('input[name="qty"]').val(qty);
        }
    });
</script>