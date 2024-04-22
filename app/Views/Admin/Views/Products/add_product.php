<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <!-- <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModal">Upload Banner <i class='pl-2 nav-icon fas fa-upload'></i></button>

                </div>
            </div>
        </div> -->
        <form class='product-form'>
            <div class='p-5 m-3 card'>
                <div class='row'>
                    <div class='mb-2 col-3'>
                        <span class='form-label'> Image 1 </span>
                        <input name='image1' class='form-control' type='file'>
                        <img class='m-2' <?php if(isset($product[0]->image_name1)){ ?> src='<?= base_url('uploads/product_images/'.$product[0]->image_name1);?> <?php } ?>' width='100px'>
                    </div>
                    <div class='mb-2 col-3'>
                        <span class='form-label'> Image 2 </span>
                        <input name='image2' class='form-control' type='file'>
                        <img class='m-2' <?php if(isset($product[0]->image_name2)){ ?> src='<?= base_url('uploads/product_images/'.$product[0]->image_name2);?> <?php } ?>' width='100px'>
                    </div>
                    <div class='mb-2 col-3'>
                        <span class='form-label'> Image 3 </span>
                        <input name='image3' class='form-control' type='file'>
                        <img class='m-2' <?php if(isset($product[0]->image_name3)){ ?> src='<?= base_url('uploads/product_images/'.$product[0]->image_name3);?> <?php } ?>' width='100px'>
                    </div>
                    <div class='mb-2 col-3'>
                        <span class='form-label'> Image 4 </span>
                        <input name='image4' class='form-control' type='file'>
                        <img class='m-2' <?php if(isset($product[0]->image_name4)){ ?> src='<?= base_url('uploads/product_images/'.$product[0]->image_name4);?> <?php } ?>' width='100px'>
                    </div>
                </div>
                
                <div class='mb-2'>
                    <span class='form-label'> Title </span>
                    <input name='title' class='form-control' placeholder="Title" value='<?php if(isset($product[0])){ echo $product[0]->title;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Desc </span>
                    <input name='desc' class='form-control' placeholder="desc" value='<?php if(isset($product[0])){ echo $product[0]->desc;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Price </span>
                    <input name='price' class='form-control' placeholder="price" value='<?php if(isset($product[0])){ echo $product[0]->price;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Stock </span>
                    <input name='stock' class='form-control' placeholder="stock" value='<?php if(isset($product[0])){ echo $product[0]->stock;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> SKU </span>
                    <input name='sku' class='form-control' placeholder="sku" value='<?php if(isset($product[0])){ echo $product[0]->sku;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Purchasable </span>
                    <select name='purchasable' class='form-control'>
                        <option value='1' <?php if(isset($product[0])){if($product[0]->purchasable == '1'){ echo 'selected';}}?>>YES</option>
                        <option value='0' <?php if(isset($product[0])){if($product[0]->purchasable == '0'){ echo 'selected';}}?>>NO</option>
                    </select>
                </div>
                <input name='productid' class='form-control' placeholder="" type='hidden' value='<?php if(isset($product[0])){ echo $product[0]->product_id;}?>'>

                <div class='mb-2'>
                    <span class='form-label'> Promote </span>
                    <select name='promote' class='form-control'>
                        <option value=''></option>
                        <option value='section1' <?php if(isset($product[0])){if($product[0]->promote == 'section1'){ echo 'selected';}}?>>Section 1</option>
                        <option value='section2' <?php if(isset($product[0])){if($product[0]->promote == 'section2'){ echo 'selected';}}?>>Section 2</option>
                    </select>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Category </span>
                    <select name='category' class='form-control'>
                        <?php if (isset($categories)) {
                            foreach ($categories as $cat) { ?>
                                <option value='<?= $cat->id ?>' <?php if(isset($product[0])){
                                    if($cat->id == $product[0]->category_id){ echo 'selected';}
                                }?>><?= $cat->category_name ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary'> Save Product</button>
                </div>
            </div>
        </form>

    </section>
</div>

<script>
    $(document).ready(function() {
        $('.product-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_product_data') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.href = '<?= base_url('/Admin/products'); ?>';
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>