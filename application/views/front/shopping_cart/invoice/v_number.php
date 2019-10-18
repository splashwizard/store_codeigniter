
<?php
$sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
foreach($sale_details as $row){
    $product_details = json_decode($row['product_details'], true);
    foreach ($product_details as $row1)
    {
        //  ------------first_get-------------
        $option = json_decode($row1['option'],true);
        foreach ($option as $l => $op) {
            $title =  $op['title'];
            $value =  $op['value'];
            // -------compare---------------------
            $products = $this->db->get_where('product', array('product_id' => $row1['id']))->result_array();
            foreach ($products as $items){
                $product_info = json_decode($items['options'], true);
//                                echo $items['options'];
                foreach ($product_info as $item_option){
//                                    echo $item_option['title'];
                    $option_value = $item_option['option'];
                    $option_number = $item_option['option_number'];
                    if($title ==$item_option['title']){
                        foreach ($option_value as $k =>$p_value){
                            if($value == $p_value){
                                foreach ($option_number as $m =>$p_number){
                                    if($k == $m ){
                                        $remain_variation_qty = $p_number-$row1['qty'];
                                        echo '-------------------------result'.$p_number; echo '<br>';
                                        echo '-----------------------------sold_qty'.$row1['qty']; echo '<br>';
                                        echo '-----------------------------remain_qty'.$remain_variation_qty; echo '<br>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}


