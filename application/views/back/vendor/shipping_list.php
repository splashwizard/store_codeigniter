<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
        <thead>
        <tr>
            <th> <div style="text-transform: initial"><?php echo translate('no');?></div></th>

            <th><div style="text-transform: initial"><?php echo translate('Product ID');?></div></th>

            <th><div style="text-transform: initial"><?php echo translate('Title');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipping ID');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Buyer ID');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Rates');?></div></th>

            <th><div style="text-transform: initial"><?php echo translate('Zip code');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipment Date');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Tax');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipment Price');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Grand total');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipping state');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Label');?></div></th>
        </tr>
        </thead>
        <tbody>


        <?php
        foreach($shipping_list as $i=> $row){
            ?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo $row['product_id']?></td>
                <td><?php echo
                    $this->db->where('product_id', $row['product_id']);
                    $title = $this->db->get('product')->row()->title;
                    echo $title;
                    ?>
                </td>
                <td><?php echo $row['object_id']?></td>
                <td><?php echo $row['user_id']?></td>
                <td><?php echo $row['object_updated']?></td>

                <td><?php echo $row['zip_code']?></td>
                <td><?php echo $row['shipment_date']?></td>


                    <?php
                        $sale_data = $this->db->get('sale')->result_array();
                    foreach ($sale_data as $row1) {



                               if($row1['shipment_id'] == $row['object_id']){
                                   ?>
                            <td><?php echo $row1['vat'];?></td>
                            <td><?php echo $row1['shipping'];?></td>
                            <td><?php echo $row1['grand_total']; ?></td>
                    <?php

                               }

                    }

                    ?>

                <td><a class="button" href="<?php echo $row['tracking_url_provider']?>">Tracking</a></td>
                <td class="printlabl"><a class="button" onclick="pay_for_print('<?php echo $row['label_url']?>')">Print</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<div id='export-div' style="padding:40px;">
    <h1 id ='export-title' style="display:none;"><?php echo translate('users'); ?></h1>
    <table id="export-table" class="table" data-name='users' data-orientation='p' data-width='1500' style="display:none;">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="150">
            <col width="150">
        </colgroup>
        <thead>
        <tr>
            <th><?php echo translate('no');?></th>
            <th><?php echo translate('name');?></th>
            <th><?php echo translate('e-mail');?></th>
            <th><?php echo translate('total_purchase');?></th>
        </tr>
        </thead>
        <tbody >
        <?php
        $i = 0;
        foreach($all_users as $row){
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['username']; ?> <?php echo $row['surname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo currency('','def').$this->crud_model->total_purchase($row['user_id']); ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script>
    // https://localhost/store1/
    console.log(base_url);
    function pay_for_print(url){
        alert("You paid 0.7 dollar");
        window.open(
            url,
            '_blank' // <- This is what makes it open in a new window.
        );
        $.ajax({
            url: base_url + 'vendor/pay_tax_for_label'
        });
    }
    function print_label() {
        window.print();
    }

</script>