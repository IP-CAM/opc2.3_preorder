

<?php
if (!isset($preorder_setting['preorder_status'])){
    $preorder_setting['preorder_status']=-1;
}

?>

<table class="table">
    <tr>
        <td class="col-xs-3">
            <h5><strong><?php echo $text_module_settings; ?></strong></h5>
            <span class="help"><i class="fa fa-info-circle"></i>&nbsp;<?php echo $text_module_settings_help; ?></span>
        </td>
        <td>
            <div class="col-xs-4">
                <select name="preorderenabled" class="preorderEnabled form-control">

                    <option value="yes" <?php echo (!empty($preorder_setting['preorderenabled']) && $preorder_setting['preorderenabled'] == 'yes') ? 'selected=selected' : '' ?>><?php echo $text_enabled; ?></option>
                    <option value="no" <?php echo (empty($preorder_setting['preorderenabled']) || $preorder_setting['preorderenabled'] == 'no') ? 'selected=selected' : '' ?>><?php echo $text_disabled; ?></option>
                </select>
            </div>
        </td>
    </tr>
    <tr>
        <td class="col-xs-3">
            <h5><strong><?php echo $text_module_settings_order_status; ?></strong></h5>
            <span class="help"><i class="fa fa-info-circle"></i>&nbsp;<?php echo $text_module_settings_order_status_help; ?></span>
        </td>
        <td>
            <div class="col-xs-4">
                <select name="preorder_status" class="preorderEnabled form-control">

                     <?php     foreach ($order_statuses as $os){

                         $selected=" ";
                         if ($os['order_status_id']==$preorder_setting['preorder_status']){
                             $selected=" selected ";
                         }
                  echo  "<option " .$selected.  "value='".$os['order_status_id']."'>". $os['name']." </option>";
                        } ?>


                </select>
            </div>
        </td>
    </tr>


    <tr>
        <td class="col-xs-3">
            <h5><strong><?php echo $text_module_status ?></strong></h5>
            <span class="help"><i class="fa fa-info-circle"></i>&nbsp;<?php echo $text_module_status_help; ?></span>
        </td>
        <td>
            <div class="col-xs-6">
                <?php foreach($stock_statuses as $stock_status) { ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="preorder_stock_status[<?php echo $stock_status['stock_status_id']?>]" value="1" <?php echo isset($preorder_setting['preorder_stock_status'][$stock_status['stock_status_id']]) ? 'checked="checked"' : ''; ?>/> <?php echo $stock_status['name'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
        </td>
    </tr>
</table>