<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="text-primary">Inventory</h2>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered dt-responsive" id="projects_table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Size</th>
                                        <th>Import Invoice Reference</th>
                                        <th>Per Carton</th>
                                        <th>No of Carton</th>
                                        <th>Total Unit</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer') ?>
<script>
    $(document).ready(function () {
        var col = [];
        init_datatable('projects_table', '<?= base_url('dashboard/getAllInventory') ?>', col, {});
    });
</script>