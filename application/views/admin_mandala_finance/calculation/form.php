<!-- Basic Form Elements -->
<section class="panel">
    <div class="panel-heading">
        <h3><?php if($this->uri->segment(4) == null) {echo "Add"; } else {echo "Update";} ?> <?php echo $this->menu_title; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-bottom-50">
                    <br />
                    <!-- Horizontal Form -->
                    <?php echo form_open_multipart(current_url());?>
                    	<div class="form-group row">
			                <div class="col-md-3">
			                    <label>Vehicle Type Name</label>
			                </div>
			                <div class="col-md-9">
			                    <?php
			                        echo form_input(array("name" => "vehicle_type_name", "value" => $vehicle_type_name, "class" => "form-control", "placeholder" => "Vehicle Type Name"));
			                        echo form_error("vehicle_type_name");
			                    ?>
			                </div>
			            </div>

		                <div class="form-group row">
			                <div class="col-md-3">
			                    <label>Vehicle Age</label>
			                </div>
			                <div class="col-md-2">
                                <label style="font-weight: 500">
                                    < 5 Tahun
                                </label>
			                </div>
                            <div class="col-md-3">
                                <?php if($this->uri->segment(4) == null): ?>
                                    <button id="add_interest_5Year" class="btn btn-success">Add Interest</button>
                                <?php else: ?>
                                    <button id="update_interest_5Year" class="btn btn-success">Update Interest</button>
                                <?php endif ?>
                            </div>
			            </div>
                        <?php if($dt_interest_5Year == null): ?>
                        
                            <div class="list_interest_5Year">
                        
                            </div>
                        <?php else: ?>
                            <?php foreach($list_dt_interest_5Year as $dt): ?>
                                <div class='form-group row'>
                                    <div class ='col-md-3'>
                                        <label>Interest (<?php echo $dt->dt_interest_name ?>)</label>
                                    </div>
                                    <div class='col-sm-9'>
                                        <input name='interests5Year[]' value="<?php echo $dt->dt_interest_value ?>" type='number' step='any' class='form-control' />
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="list_interest_5Year">
                                
                            </div>
                        <?php endif ?>
                        

                        <div class="form-group row" style="margin-top: 15px;">
			                <div class="col-md-3">
			                    <label>Vehicle Age</label>
			                </div>
			                <div class="col-md-2">
                                <label style="font-weight: 500">
                                    5 - 10 Tahun
                                </label>
			                </div>
			            </div>
                        <?php if($dt_interest_10Year == null): ?>
                        
                            <div class="list_interest_10Year">
                        
                            </div>
                        <?php else: ?>
                            <?php foreach($list_dt_interest_10Year as $dt): ?>
                                <div class='form-group row'>
                                    <div class ='col-md-3'>
                                        <label>Interest (<?php echo $dt->dt_interest_name ?>)</label>
                                    </div>
                                    <div class='col-sm-9'>
                                        <input name='interests10Year[]' value="<?php echo $dt->dt_interest_value ?>" type='number' step='any' class='form-control' />
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="list_interest_10Year">
                                
                            </div>
                        <?php endif ?>
                        


                        <div class="form-group row" style="margin-top: 15px;">
			                <div class="col-md-3">
			                    <label>Vehicle Age</label>
			                </div>
			                <div class="col-md-2">
                                <label style="font-weight: 500">
                                    11 - 15 Tahun
                                </label>
			                </div>
			            </div>
                        <?php if($dt_interest_15Year == null): ?>
                        
                            <div class="list_interest_15Year">
                        
                            </div>
                        <?php else: ?>
                            <?php foreach($list_dt_interest_15Year as $dt): ?>
                                <div class='form-group row'>
                                    <div class ='col-md-3'>
                                        <label>Interest (<?php echo $dt->dt_interest_name ?>)</label>
                                    </div>
                                    <div class='col-sm-9'>
                                        <input name='interests15Year[]' value="<?php echo $dt->dt_interest_value ?>" type='number' step='any' class='form-control' />
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="list_interest_15Year">
                                
                            </div>
                        <?php endif ?>
				        <div class="form-actions">
                            <div class="form-group row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn width-150 btn-primary">Submit</button>
                                    <a href="<?php echo base_url() . ADMIN_URL ?><?php echo $this->uri->segment(2); ?>/"><button type="button" class="btn btn-default">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <!-- End Horizontal Form -->

                    <input type="text" id="totalCount" hidden value="<?php echo $totalCount ?>"/>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->

<script>
var initialValue5Year = 12;
var initialValue10Year = 12;
var initialValue15Year = 12;
$(document).ready(function() {
    $('#add_interest_5Year').on('click', function(event) {
        event.preventDefault();
        let count = parseInt($('#totalCount').val());
        if(!isNaN(count) )
        {
            initialValue5Year =  (count + 1) * 12;
            initialValue10Year = (count + 1) * 12;
            initialValue15Year = (count + 1) * 12;
        }
        
        $(".list_interest_5Year").append("<div class='form-group row'><div class ='col-md-3'><label>Interest (" + initialValue5Year + " Bulan" + ")</label></div><div class='col-sm-9'><input name='interests5Year[]' type='number' step='any' class='form-control' /></div></div>");
        $(".list_interest_10Year").append("<div class='form-group row'><div class ='col-md-3'><label>Interest (" + initialValue5Year + " Bulan" + ")</label></div><div class='col-sm-9'><input name='interests10Year[]' type='number' step='any' class='form-control' /></div></div>");
        $(".list_interest_15Year").append("<div class='form-group row'><div class ='col-md-3'><label>Interest (" + initialValue5Year + " Bulan" + ")</label></div><div class='col-sm-9'><input name='interests15Year[]' type='number' step='any' class='form-control' /></div></div>");
        
        initialValue5Year += 12;
    });


    $('#update_interest_5Year').on('click', function(event) {
        event.preventDefault();
        let count = parseInt($('#totalCount').val());
        tempCount += 1;
        if(!isNaN(count) )
        {
            initialValue5Year =  (count + tempCount) * 12;
            initialValue10Year = (count + tempCount) * 12;
            initialValue15Year = (count + tempCount) * 12;
        }
        alert(initialValue15Year);
        
        $(".list_interest_5Year").append("<div class='form-group row'><div class ='col-md-3'><label>Interest (" + initialValue5Year + " Bulan" + ")</label></div><div class='col-sm-9'><input onClick="this.select()" name='newInterests5Year[]' type='number' step='any' class='form-control' /></div></div>");
        $(".list_interest_10Year").append("<div class='form-group row'><div class ='col-md-3'><label>Interest (" + initialValue5Year + " Bulan" + ")</label></div><div class='col-sm-9'><input onClick="this.select()" name='newInterests10Year[]' type='number' step='any' class='form-control' /></div></div>");
        $(".list_interest_15Year").append("<div class='form-group row'><div class ='col-md-3'><label>Interest (" + initialValue5Year + " Bulan" + ")</label></div><div class='col-sm-9'><input onClick="this.select()" name='newInterests15Year[]' type='number' step='any' class='form-control' /></div></div>");
        // initialValue15Year += 12;
    });
});

</script>
