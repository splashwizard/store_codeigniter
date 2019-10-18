<div class="logsection mab-30">
    <?php

    $this->db->where('object_id', $object_id);

    $rates = $this->db->get('shipping')->result()[0]->rates;

    $rates1 =   json_decode($rates, true);

    foreach ($rates1 as $k =>$items){

      $total =   count((array)$rates1);
        ?>
        <div class="radio" style="display: flex">
            <div style="cc-selector customradiogroup">
                <input type="radio" class="priority" name="priorityN" onclick="getResults();" value="<?php echo $items['object_id'];?>" >
                <input type="hidden" id = "shippment_object_id" value = "<?php echo $object_id;?>">
            </div>
            <div>
                <?php  echo $items['duration_terms']; echo '<br>';?>
                $<?php  echo $items['amount'];?>
            </div>
        </div>
        <input type="hidden" value="<?php echo $items['object_id'];?>">
        <input type="hidden" value="<?php echo $items['carrier_account'];?>">
        <input type="hidden" value="<?php echo $items['servicelevel']['token'];?>">
        <?php
    }
    ?>



    <script type="text/javascript">
        function getResults() {
            var testVar;
            var shippment_object_id = '\'<?php echo $object_id?>\'';
            var radios = document.getElementsByName("priorityN");
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {

                    testVar = (radios[i].value);

                    //onclick="getPartID(<?php //echo $row['part_id'];?>//)";
                    document.getElementById("myLink").innerHTML = '<a onclick="send_rate_id(\''+ testVar +'\','+shippment_object_id+')">'+'Continue To Checkout'+"</a>"


                }
            }
        }
    </script>

</div>









<div class="row ">
    <hr style="    margin-bottom: -21px; margin-right: 40px;">
    <div class="col-md-12 nxtcbtns">
        <span class="contunie__checkout__btn themebgcolor noborder mar-5" id = "myLink"  >
               <?php echo translate('Continue To Checkout');?>
            </span>
        <a class="cancelorder__btn blackbg" href="<?php echo base_url(); ?>home/cancel_order">
            <?php echo translate('cancel_order');?>
        </a>
    </div>
</div>

<script>
    // function radio_check_rates(asdf) {
    //     alert(asdf);
    //
    // }
</script>