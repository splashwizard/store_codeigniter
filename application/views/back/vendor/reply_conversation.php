<html lang="en">
<head>
    <?php include 'head.php'; ?>
</head>


<body class="activeit-ready">
<div id="container" class="<?php if($page_name=='product' || $page_name=='digital' || $page_name=='display_settings' || $page_name=='product_bundle'){ echo 'effect mainnav-sm'; } else{ echo 'effect mainnav-lg'; } ?>">
    <!--NAVBAR-->
    <header id="navbar">
        <?php include 'header.php'; ?>
    </header>
    <!--END NAVBAR-->
    <div class="boxed" id="fol">
        <!--CONTENT CONTAINER-->
        <div>

            <div id="content-container">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Conversation</h1>
                </div>
                <div class="tab-base" style="min-height: 900px;">
                    <div class="panel">
                        <div class="panel-body">
                            <!---->
                            <div id="profile_content">
                                <div id="window">
                                    <!--compose-->
                                    <div class="details-wrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tabs-wrapper content-tabs" style="margin:10px;">
                                                    <div>
                                                        <ul class="nav nav-tabs" style="float: left;">
                                                            <li class="active"><a href="#tab1" data-toggle="tab">Inbox</a></li>
                                                            <li><a href="#tab2" data-toggle="tab">Sent</a></li>
                                                            <li><a href="#tab3" data-toggle="tab">All</a></li>
                                                            <li><a href="#tab4" data-toggle="tab">Trash</a></li>
                                                        </ul>
                                                    </div>
                                                    <br>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1">
                                                            <div class="wishlist tickets" style="margin-top: 10px;">
                                                                <table class="table">
                                                                    <thead style = "background-color: #e0e0e0;">
                                                                    <tr>
                                                                        <th><?php echo translate('Customer name');?></th>
                                                                        <th><?php echo translate('Content');?></th>
                                                                        <th><?php echo translate('View');?></th>
                                                                        <th><?php echo translate('Delete');?></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="sent_message">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <input type="hidden" id="inbox" value="0" />
                                                            <div class="pagination_box_inbox"></div>

                                                            <script>
                                                                function inbox_msg(page){
                                                                    if(page == 'no'){
                                                                        page = $('#inbox').val();
                                                                    } else {
                                                                        $('#inbox').val(page);
                                                                    }
                                                                    var alerta = $('#sent_message');
                                                                    alerta.load('<?php echo base_url();?>vendor/vendor_inbox/'+page,
                                                                        function(){
                                                                        }
                                                                    );
                                                                }
                                                                $(document).ready(function() {
                                                                    inbox_msg('0');
                                                                });
                                                            </script>
                                                        </div>

                                                        <!--                 -------------------------------------------->
                                                        <div class="tab-pane fade" id="tab2">
                                                            <div class="wishlist tickets" style="margin-top: 10px;">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th><?php echo translate('Customer name');?></th>
                                                                        <th><?php echo translate('Content');?></th>
                                                                        <th><?php echo translate('View');?></th>
                                                                        <th><?php echo translate('Delete');?></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="vendor_sent_message">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <input type="hidden" id="sent_vendor" value="0" />
                                                            <div class="pagination_box_sent_vendor"></div>

                                                            <script>
                                                                function vendor_sent_msg(page){
                                                                    if(page == 'no'){
                                                                        page = $('#sent_vendor').val();
                                                                    } else {
                                                                        $('#sent_vendor').val(page);
                                                                    }
                                                                    var alerta = $('#vendor_sent_message');
                                                                    alerta.load('<?php echo base_url();?>vendor/vendor_sent_message/'+page,
                                                                        function(){
                                                                        }
                                                                    );
                                                                }
                                                                $(document).ready(function() {
                                                                    vendor_sent_msg('0');
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab3">
                                                            <div class="wishlist tickets" style="margin-top: 10px;">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th><?php echo translate('Customer name');?></th>
                                                                        <th><?php echo translate('Content');?></th>
                                                                        <th><?php echo translate('View');?></th>
                                                                        <th><?php echo translate('Delete');?></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="vendor_all_message">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <input type="hidden" id="vendor_all" value="0" />
                                                            <div class="pagination_box_all_vendor"></div>

                                                            <script>
                                                                function vendor_all_msg(page){
                                                                    if(page == 'no'){
                                                                        page = $('#vendor_all').val();
                                                                    } else {
                                                                        $('#vendor_all').val(page);
                                                                    }
                                                                    var alerta = $('#vendor_all_message');
                                                                    alerta.load('<?php echo base_url();?>vendor/vendor_all_message/'+page,
                                                                        function(){
                                                                        }
                                                                    );
                                                                }
                                                                $(document).ready(function() {
                                                                    vendor_all_msg('0');
                                                                });
                                                            </script>
                                                        </div>

                                                        <div class="tab-pane fade" id="tab4">
                                                            <div class="wishlist tickets" style="margin-top: 10px;">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th><?php echo translate('Customer name');?></th>
                                                                        <th><?php echo translate('Content');?></th>
                                                                        <th><?php echo translate('Restore');?></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="vendor_delete_message">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <input type="hidden" id="delete_vendor" value="0" />
                                                            <div class="pagenation_delete_links_sent_vendor"></div>

                                                            <script>
                                                                function vendor_delete_msg(page){
                                                                    if(page == 'no'){
                                                                        page = $('#delete_vendor').val();
                                                                    } else {
                                                                        $('#delete_vendor').val(page);
                                                                    }
                                                                    var alerta = $('#vendor_delete_message');
                                                                    alerta.load('<?php echo base_url();?>vendor/vendor_delete_message/'+page,
                                                                        function(){
                                                                        }
                                                                    );
                                                                }
                                                                $(document).ready(function() {
                                                                    vendor_delete_msg('0');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

                                <script>
                                    $('body').on('click','.message_view_vendor',function(){
                                        var id = $(this).data('id');
                                        $("#window").load("<?php echo base_url()?>vendor/profile/message_view/"+id);
                                    });
                                </script>
                                <!--compose-->
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                <script src="js/index.js"></script>
                                <!---->

                            </div>
                            <!---->
                        </div>
                        <!--Panel body-->
                    </div>
                </div>
            </div>
            <?php include 'script.php' ?>
        </div>
        <!--END CONTENT CONTAINER-->
        <!--MAIN NAVIGATION-->
        <?php include 'navigation.php' ?>
        <!--END MAIN NAVIGATION-->
    </div>
    <!-- FOOTER -->
    <?php include 'footer.php' ?>
    <!-- END FOOTER -->
    <!-- SCROLL TOP BUTTON -->
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
</div>
<!-- END OF CONTAINER -->
<?php include 'foot.php' ?>
</body>
</html>