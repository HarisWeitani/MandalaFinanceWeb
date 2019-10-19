<section class="panel">
    <div class="panel-heading">
        <h3>
           List <?php echo $this->menu_title; ?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <a href ="<?php echo base_url() . ADMIN_URL . $this->router->fetch_class() ;?>/form" class="btn btn-success margin-inline"> Add New</a>
                <div class="margin-bottom-50">
                    <table class="table table-bordered table-hover nowrap" id="table_view" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2">Jenis Kendaraan</th>
                                <th rowspan="2">Usia Kendaraan</th>
                                <th colspan="<?php echo $tempMonth; ?>">Bunga / Jangka Waktu</th>
                                <th rowspan="2">Actions</th>
                            </tr>
                            <tr>
                                <?php foreach($list_month as $month): ?>
                                    <td><?php echo $month->dt_interest_name; ?></td>
                                <?php endforeach ?>
                                
                                <!-- <td>12 Bulan</td>
                                <td>24 Bulan</td>
                                <td>36 Bulan</td> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list_calculation as $k => $result): ?>
                                <tr>
                                    
                                    <?php $init = 0; ?>
                                    <?php $multiplier = 3; ?>
                                    <?php if($count == $init || $count % ($init + $multiplier) == 0)  : ?>
                                    <td rowspan="3">
                                        <?php echo $result->vehicle_type_name; ?>
                                    </td>
                                    <?php endif ?>
                                    <!-- <td>
                                        <?php echo $result->vehicle_type_name; ?>
                                    </td> -->
                                    

                                    <td><?php echo $result->vehicle_age; ?></td>
                                    <?php foreach($result->interests as $i): ?>
                                        <td>
                                            <?php if(strlen($i->dt_interest_value) > 0 ): ?>
                                                <?php echo $i->dt_interest_value ?>
                                                
                                            <?php else: ?>
                                                <?php echo "Kosong gan" ?>
                                            <?php endif?>
                                        </td>

                                    <?php endforeach; ?>
                                    <?php if($count == $init || $count % ($init + $multiplier) == 0)  : ?> 
                                    <td rowspan="3">
                                        <a href="<?php echo base_url() . ADMIN_URL . $this->router->fetch_class(); ?>/form/<?php echo $result->calculation_id ?>" class="btn btn-warning margin-inline">Edit</a>
                                        <!-- <button type="button" class="open-deleteModal btn btn-danger margin-inline" data-toggle="modal" data-id="<?php echo $result->calculation_id; ?>" data-target="#deleteModal">
                                            Delete
                                        </button> -->
                                    </td>
                                    <?php endif ?>
                                </tr>
                                <?php $count = $count + 1; ?>   
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Jenis Kendaraan</th>
                            <th>Usia Kendaraan</th>
                            <th colspan="<?php echo $tempMonth; ?>">Bunga / Jangka Waktu</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<form id="delete" method="post" action="<?php echo base_url(). ADMIN_URL . $this->router->fetch_class(); ?>/delete">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Delete Item</h4>
                </div>
                <div class="modal-body">
                    Are you sure u want to delete this Item??
                    <br/>
                    <br/>
                    YOU NO LONGER ENABLE TO RETRIEVE THE DATA AFTER IT DELETED
                    <input type="hidden" class="form-control" name="modal" id="modal" value="" />
                </div>
                <div class="modal-footer">
                    <input type="submit" id="submit" value="Delete Item" class="btn btn-primary" />
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal -->


<!-- End  -->

<script>
    // DataTable Custom
    var table = "";

    $(document).ready(function() {
        // table = $('#table_view').DataTable({
        //     "processing":true,
        //     "serverSide":true,
        //     "ajax":{
        //         url:"<?php echo base_url() . 'api/datatable/server_side/ms_calculation'; ?>",
        //         type:"POST"
        //     },
        //     "columns": [
        //         {orderable: false},
        //         null,
        //         null,
        //         null
        //     ],
        //     dom:
        //         "<'row'<'#add_new.col-sm-3'><'#export_all.col-sm-3'><'col-sm-2'f><'#bulk_paid.col-sm-1'><'#bulk_void.col-sm-1'><'col-sm-2'l>>" +
        //         "<'row'<'col-sm-12'tr>>" +
        //         "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        //     renderer: 'bootstrap',
        //     "scrollX": true,
        //     "order": [[ 0, "DESC" ]],
        //     "aLengthMenu": [
        //         [25, 50, 100, 200],
        //         [25, 50, 100, 200]
        //     ],
        //     "language": {
        //         "search": "Search:",
        //         "thousands": ","
        //     },
        //     rowsGroup: [// Always the array (!) of the column-selectors in specified order to which rows groupping is applied
		// 			// (column-selector could be any of specified in https://datatables.net/reference/type/column-selector)
		// 	'second:name',
        //         0,
        //         2
		//     ],
        // });


        // $('.filterhead_text').each( function () {
        //     var title = $('#table_view thead th').eq( $(this).index() ).text();
        //     $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        // });
    });
  
</script>