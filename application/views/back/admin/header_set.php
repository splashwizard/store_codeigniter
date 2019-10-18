<div class="row">
    <div class="col-md-12 form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate('homepage');?></label>
            <div class="col-sm-6">
                <input id="set_homepage" class='sw' data-set='set_homepage' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','45','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate('all_categories');?></label>
            <div class="col-sm-6">
                <input id="set_all_categories" class='sw' data-set='set_all_categories' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','46','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate('featured_products');?></label>
            <div class="col-sm-6">
                <input id="set_featured_products" class='sw' data-set='set_featured_products' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','47','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("today's_deal");?></label>
            <div class="col-sm-6">
                <input id="set_todays_deal" class='sw' data-set='set_todays_deal' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','48','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php if($this->crud_model->get_type_name_by_id('general_settings','82','value') == 'ok'){?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("bundled_product");?></label>
            <div class="col-sm-6">
                <input id="set_bundled_product" class='sw' data-set='set_bundled_product' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','49','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php } if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("classifieds");?></label>
            <div class="col-sm-6">
                <input id="set_classifieds" class='sw' data-set='set_classifieds' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','50','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("latest_products");?></label>
            <div class="col-sm-6">
                <input id="set_latest_products" class='sw' data-set='set_latest_products' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','51','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php if ($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok') {?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("all_brands");?></label>
            <div class="col-sm-6">
                <input id="set_all_brands" class='sw' data-set='set_all_brands' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','52','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php }?>
        <?php if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
                if ($this->crud_model->get_type_name_by_id('general_settings','81','value') == 'ok'){?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("all_vendors");?></label>
            <div class="col-sm-6">
                <input id="set_all_vendors" class='sw' data-set='set_all_vendors' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','53','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php
        		}
        	}
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("blogs");?></label>
            <div class="col-sm-6">
                <input id="set_blogs" class='sw' data-set='set_blogs' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','54','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok' && $this->crud_model->get_type_name_by_id('general_settings','81','value') == 'ok') {?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("store_locator");?></label>
            <div class="col-sm-6">
                <input id="set_store_locator" class='sw' data-set='set_store_locator' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','55','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <?php }?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("contact");?></label>
            <div class="col-sm-6">
                <input id="set_contact" class='sw' data-set='set_contact' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','56','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo translate("more");?></label>
            <div class="col-sm-6">
                <input id="set_more" class='sw' data-set='set_more' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('ui_settings','57','value') == 'yes'){ ?>checked<?php } ?> />
            </div>
        </div>
    </div>
</div>
<script>
	$(".sw").each(function(){
        var h = $(this);
        var id = h.attr('id');
        var set = h.data('set');
        new Switchery(document.getElementById(id), {color:'rgb(100, 189, 99)', secondaryColor: '#cc2424', jackSecondaryColor: '#c8ff77'});
        var changeCheckbox = document.querySelector('#'+id);
        changeCheckbox.onchange = function() {
          //alert($(this).data('id'));
          ajax_load(base_url+''+user_type+'/ui_settings/'+set+'/'+changeCheckbox.checked,'site','othersd');
          if(changeCheckbox.checked == true){
            $.activeitNoty({
                type: 'success',
                icon : 'fa fa-check',
                message : 'enabled',
                container : 'floating',
                timer : 3000
            });
          } else {
            $.activeitNoty({
                type : 'danger',
                icon : 'fa fa-check',
                message : 'disabled',
                container : 'floating',
                timer : 3000
            });
          }
          //alert(changeCheckbox.checked);
        };

    });
</script>