<!-- Basic Form Elements -->
<div class="row">
        <!-- <div class="col-xs-12"> -->
    <?php if(isset($_SESSION['success'])){?>
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success</h4>
                    <?php echo $_SESSION['success'];?>
                </div>
            </div>
        <?php }?>
        <?php if(isset($_SESSION['error'])){?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="color:white;"><i class="icon fa fa-ban"></i> Failed</h4>
                    <?php echo $_SESSION['error'];?>
                </div>
            </div>  
        <?php }?>
    <!-- </div> -->
</div>
<section class="panel">
    
    <div class="panel-heading">
        <h3><?php echo $this->menu_title; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-bottom-50">
                    <br />
                    <!-- Horizontal Form -->
                    <?php echo form_open_multipart(current_url() . '/' . $this->session->userdata('admin_id'));?>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="form-control-label" for="l0">Old Password</label>
                            </div>
                            <div class="col-md-9">
                                <?php 
                                    echo form_input(array('name' => 'old_admin_password', 'value' => '', 'class' => 'form-control', 'placeholder' => 'Old Password'));
                                    echo form_error('old_admin_password');
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="form-control-label" for="l0">New Password</label>
                            </div>
                            <div class="col-md-9">
                                <?php 
                                    echo form_input(array('name' => 'admin_password', 'value' => '', 'class' => 'form-control', 'placeholder' => 'New Password'));
                                    echo form_error('admin_password');
                                ?>
                            </div>
                        </div>

				        <div class="form-actions">
                            <div class="form-group row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn width-150 btn-primary">Submit</button>
                                    <a href="<?php echo base_url() . ADMIN_URL . ADMIN_URL_CALCULATION; ?>"><button type="button" class="btn btn-default">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <!-- End Horizontal Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->