



        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Product List</h1>
                    
                    <?php
                        $arr_chunk_product = array_chunk($get_all_product, 4);
                    ?>

                    <div class="card-deck">
                        <?php foreach ($arr_chunk_product as $chunk_products): ?>
                            <?php foreach ($chunk_products as $single_products): ?>
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="<?= base_url('uploads/' . $single_products->product_image); ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $single_products->product_title; ?></h5>
                                        <p class="card-text"><?= word_limiter($single_products->product_short_description, 10) ?></p>
                                        <p class="card-text"><span>Rp. <?= $this->cart->format_number($single_products->product_price);?>/day</span></p>
                                        <a href="<?php echo base_url('single/' . $single_products->product_id); ?>" class="btn btn-primary">Details</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            