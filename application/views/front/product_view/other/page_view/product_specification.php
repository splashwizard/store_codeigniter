<?php

    $discus_id = $this->db->get_where('general_settings',array('type'=>'discus_id'))->row()->value;

    $fb_id = $this->db->get_where('general_settings',array('type'=>'fb_comment_api'))->row()->value;

    $comment_type = $this->db->get_where('general_settings',array('type'=>'comment_type'))->row()->value;

?>

<!-- PAGE -->
<section class="page-section specification">
    <div class="container">
        <div class="tabs-wrapper prodes-tabs regtabber">
            <ul class="nav nav-tabs">
                <li  class="active"  ><a href="#tab1" data-toggle="tab"><span><?php echo translate('Description'); ?></span></a></li>
                <li ><a href="#tab2" data-toggle="tab"><span><?php echo translate('additional_specification'); ?></span></a></li>
                <li ><a href="#tab3" data-toggle="tab"><span><?php echo translate('Shipping & Policies'); ?></span></a></li>
                <li ><a href="#tab4" data-toggle="tab"><span><?php echo translate('reviews'); ?></span></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                	<div class="tabberinner patb-30">
                		<?php echo $row['description'];?>
                	</div>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <div class="tabberinner patb-30">
                    <?php 
                        $a = $this->crud_model->get_additional_fields($row['product_id']);
                        if(count($a)>0){
                    ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td style="text-align:center;width: 30%;" >Title</td>
                                <td style="text-align:center;">Description</td>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach ($a as $val) {

                            ?>

                                <tr>
                                    <td style="text-align:center;width: 30%;"><?php echo $val['name']; ?></td>
                                    <td style="text-align:center;"><?php echo $val['value']; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    <?php 
                        }
                    ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab3">
                	<div class="tabberinner patb-30">
                		<?php
	                        echo $this->db->get_where('business_settings',array('type'=>'shipment_info'))->row()->value;
	                    ?>
                	</div>
                </div>
                <div class="tab-pane fade" id="tab4">
                	<div class="tabberinner patb-30">
					<?php if($comment_type == 'disqus'){ ?>
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES * * */
                        var disqus_shortname = '<?php echo $discus_id; ?>';
                        
                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES * * */
                            var disqus_shortname = '<?php echo $discus_id; ?>';
                        
                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function () {
                            var s = document.createElement('script'); s.async = true;
                            s.type = 'text/javascript';
                            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                        }());
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                    <?php
                        }
                        else if($comment_type == 'facebook'){
                    ?>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=<?php echo $fb_id; ?>";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-comments" data-href="<?php echo $this->crud_model->product_link($row['product_id']); ?>" data-numposts="5"></div>

                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
            
            <hr class="page-divider">
        </div>
    </div>
</section>
<!-- /PAGE -->

<style>

@media(max-width: 768px) {

	.specification .nav-tabs>li{

		float: none;

		display: block;

		text-align: center;

	}

}

</style>