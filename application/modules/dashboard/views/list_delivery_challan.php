<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="text-primary">Delivery Challan</h2>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered dt-responsive" id="projects_table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Contact</th>
                                        <th>Driver Name</th>
                                        <th>Driver Contact</th>
                                        <th>Delivery Date</th>
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
        init_datatable('projects_table', '<?= base_url('dashboard/getAllDeliveryChallan') ?>', col, {});
    });
</script>