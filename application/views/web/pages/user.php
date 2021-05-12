

        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Feature Products</h1>
                    
                    <div class="card-deck">
                        <?php foreach ($all_featured_products as $single_feature_product): ?>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?= base_url('uploads/' . $single_feature_product->product_image); ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $single_feature_product->product_title; ?></h5>
                                    <p class="card-text"><?= word_limiter($single_feature_product->product_short_description, 10) ?></p>
                                    <p class="card-text"><span>Rp. <?= $this->cart->format_number($single_feature_product->product_price);?>/day</span></p>
                                    <a href="<?php echo base_url('single/' . $single_feature_product->product_id); ?>" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    

                    <h1 class="h3 mb-4 text-gray-800">New Products</h1>
                    
                    <div class="card-deck">
                        <?php foreach ($all_featured_products as $single_feature_product): ?>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?= base_url('uploads/' . $single_feature_product->product_image); ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $single_feature_product->product_title; ?></h5>
                                    <p class="card-text"><?= word_limiter($single_feature_product->product_short_description, 10) ?></p>
                                    <p class="card-text"><span>Rp. <?= $this->cart->format_number($single_feature_product->product_price);?>/day</span></p>
                                    <a href="<?php echo base_url('single/' . $single_feature_product->product_id); ?>" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            