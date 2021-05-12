

<?php foreach($css_files as $file): ?>
    <link rel="stylesheet" href="<?= $file ?>">
<?php endforeach; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Products</h1>
                    
                    <?= $output; ?>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php foreach($js_files as $file): ?>
    <script src="<?= $file ?>"></script>
<?php endforeach; ?>