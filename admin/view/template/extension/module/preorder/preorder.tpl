<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
<div class="page-header">
  <div class="container-fluid">
 <p>HIIIIIII</p>

</div>
    <div class="container-fluid">
        <?php if  ( $error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
        </div>
    </div>








    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"   id="form-preorder">

            <input type="hidden" name="preorder_status" value="1" />
            <input type="hidden" name="store_id" value="<?php echo $store['store_id']; ?>" />
            <div class="tabbable">
                <div class="tab-buttons pull-right">
                    <button type="" class="btn btn-success save-changes"><i class="fa fa-check"></i>&nbsp;Save Changes</button>
                    <a onclick="location = '<?php echo $cancel; ?>'" class="btn btn-warning"><i class="fa fa-times"></i>&nbsp;<?php echo $button_cancel?></a>
                </div>
                <div class="tab-navigation form-inline">
                    <ul class="nav nav-tabs mainMenuTabs" id="mainTabs">
                        <li ><a href="#orders" data-toggle="tab"><i class="fa fa-bell"></i>&nbsp;Pre-Orders</a></li>
                        <li><a href="#controlpanel" data-toggle="tab"><i class="fa fa-power-off"></i>&nbsp;Control Panel</a></li>
                        <li class="active"><a href="#settings" data-toggle="tab"><i class="fa fa-cog"></i>&nbsp;Settings</a></li>

                    </ul>

                </div><!-- /.tab-navigation -->
                <div class="tab-content">
                    <div id="orders" class="tab-pane ">
                         <?="ORDERS"?>
                    </div>
                    <div id="controlpanel" class="tab-pane">
                        <?="ORDERS2"?>

                    </div>
                    <div id="settings" class="tab-pane active">

                        <?php
                            include_once 'preorder/form3.php';
                        ?>

                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->
        </form>
    </div>























</div>
<?php echo $footer; ?>