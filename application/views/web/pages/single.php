

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">				
                <div class="grid images_3_of_2">
                    <img src="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $get_single_product->product_title?></h2>
                    <p><?php echo $get_single_product->product_short_description?></p>					
                    <div class="price">
                        <p>Price: <span>RP <?php echo $this->cart->format_number($get_single_product->product_price)?></span></p>
                        <p>Category: <span><?php echo $get_single_product->category_name?></span></p>
                        
                    </div>
                    <div class="add-cart">
                        <form action="<?php echo base_url('save/cart');?>" method="post">
                            <label>Duration: </label>
                            <input type="number" class="buyfield" name="qty" value="1"/><label>hour</label>
                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>
                            <input type="submit" class="buysubmit" name="submit" value="Rental Now"/>
                        </form>				
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Product Details</h2>
                    <p><?php echo $get_single_product->product_long_description?></p>
                </div>

            </div>
            
        </div>
    </div>
</div>
