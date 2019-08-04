<?php $this->load->view('dashboard/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="text-primary">Profit Loss Report</h2>
                    <h4><span class="text-info">Total Income :</span><span class="text-success"> <?=$income?></span></h4>
                    <h4><span class="text-info">Total Expense :</span><span class="text-danger"> <?=$expense?></span></h4>
                    <h4><span class="text-info">Total <?=($profit < 0)?'Loss': 'Profit'?> :</span><span class="text-primary"> <?=str_replace('-', '', (string)$profit)?></span></h4>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered dt-responsive" id="projects_table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particular</th>
                                        <th>Expense</th>
                                        <th>Income</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($balance_sheet as $row){
                                    ?>
                                    <tr>
                                        <td><?=date('d-M-Y', strtotime($row->created_at))?></td>
                                        <td><?=$row->particular?></td>
                                        <td><?=$row->credit?></td>
                                        <td><?=$row->debit?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
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
        init_datatable('projects_table', '', col, {});
    });
</script>