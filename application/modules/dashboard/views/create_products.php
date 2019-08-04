<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Add Product</h3>
                <hr>
                <?= form_open('dashboard/create_products', ['id' => 'create_products', 'class' => 'needs-validation']); ?>
                <?= create_dashboard_input('product_name', 'Product Name', 'text', true, 'Please Type Your Product Name.') ?>
                <?= create_dashboard_input('size', 'Product Size', 'text', true, 'Please Type Product Size.') ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Add Product</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).on('submit', '#create_products', function (e) {
        e.preventDefault();
        if (validate('#create_products')) {
            var action = $('#create_products').attr('action');
            var data = {};
            data.product_name = $('input[name="product_name"]').val();
            data.size = $('input[name="size"]').val();
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Product Added Successfully",
                        type: 'success',
                        preConfirm: () =>{
                            window.location.href = '<?=base_url('dashboard/list_products')?>';
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
</script>