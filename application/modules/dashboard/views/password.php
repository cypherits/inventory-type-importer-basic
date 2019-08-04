<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-8 col-xl-6">
            <div class="card card-body p-3">
                <h3 class="card-title mb-0">Import Expense</h3>
                <hr>
                <?= form_open('dashboard/password', ['id' => 'create_import_expense', 'class' => 'needs-validation']); ?>
                
                <?= create_dashboard_input('password', 'Password', 'password', true, 'Please Type Product Size.') ?>
                <?= create_dashboard_input('confirm_password', 'Confirm Password', 'password', true, 'Please Type Product Size.') ?>
                
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-dark rounded-0 w-100" type="submit" data-required="false">Change Password</button>
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
            data.password = $('input[name="password"]').val();
            data.confirm_password = $('input[name="confirm_password"]').val();
            var ajax_global = new Ajax_global('', $.ajax);
            function callback_method(r) {
                if (r.rs == 1) {
                    Swal.fire({
                        title: "Success",
                        description: "Product Added Successfully",
                        type: 'success',
                        preConfirm: () =>{
                            window.location.href = '<?=base_url('dashboard/')?>';
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