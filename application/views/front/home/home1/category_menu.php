<!-- PAGE -->

<section class="page-section category_menu homebanner pat-0">
    <div class="container-fluid">
        <div class="row main-slider-row">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-lr-0-md">
                                <div class="main-slider">
                                    <div class="owl-carousel" id="main-slider">
                                        <?php
                                        $this->db->order_by("slides_id", "desc");
                                        $this->db->where("uploaded_by", "admin");
                                        $this->db->where("status", "ok");
                                        $slides=$this->db->get('slides')->result_array();
                                        $i=1;
                                        foreach($slides as $row){
                                        ?>
                                        <div class="item slide<?php echo $i; ?> alt">
                                            <img class="slide-img image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo $this->crud_model->file_view('slides',$row['slides_id'],'100','','no','src','','','.jpg') ?>" alt="" />
                                            <div class="caption">
                                                <div class="div-table">
                                                    <div class="div-cell">
                                                        <div class="caption-content">
                                                            <p class="caption-text">
                                                                <?php if($row['button_text']!=NULL){ ?>
                                                                <a class="btn pull-right" style="background:<?php echo $row['button_color']; ?>; color:<?php echo $row['text_color']; ?>" href="<?php echo $row['button_link']; ?>">
                                                                    <?php echo $row['button_text']; ?>
                                                                </a>
                                                                <?php } ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- /PAGE -->

<script>
    $(document).ready(function(){
        $('.category_side_set').each(function(){
            var obj = $(this);
            var childPos = obj.offset();
            var parentPos = obj.parent().offset();
            var reduce_top = childPos.top - parentPos.top;
            obj.find('.sub-menu').css('top','-'+reduce_top+'px');
        });
    });
</script>
