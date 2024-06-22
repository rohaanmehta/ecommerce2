<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>
<style>
    .ck-editor__editable {
        min-height: 150px;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary edit-category-btn mr-2' data-toggle="modal" data-target="#exampleModal">Upload Category <i class='pl-2 nav-icon fas fa-upload'></i></button>
                    <a href='<?= base_url('/export-categories'); ?>' target='_blank'>
                        <button class='btn btn-primary'>Export All Category <i class='pl-2 nav-icon fas fa-download'></i></button>
                    </a>
                </div>
            </div>
        </div>
        <div class='row p-5'>
            <div class="mb-2 w-100 d-flex justify-content-end">
                <input type="text" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" name="search" placeholder='Search Name' class="search-input form-control rounded-0" style="max-width:200px;" />
                <button class="search-btn btn btn-dark rounded-0">GO</button>
            </div>

            <table class='table table-bordered table-striped'>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Show on Homepae</td>
                    <td>Order</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($category[0])) {
                    foreach ($category as $row) { ?>
                        <tr>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->category_name; ?></td>
                            <td><?php if ($row->show_on_homepage == 1) {
                                    echo 'YES';
                                } else {
                                    echo 'NO';
                                } ?></td>
                            <td><?= $row->category_order; ?></td>
                            <td>
                                <a href='' id='<?= $row->id ?>' class='edit_category'><button type='button' class='btn-sm btn btn-info'>Edit</button></a>
                                <a href='<?= base_url('/delete-category' . '/' . $row->id); ?>'><button class='btn-sm btn btn-danger'>Delete</button></a>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='5'> No Categories Available !</td>
                    </tr>
                <?php } ?>
            </table>
            <div class='w-100 row justify-content-end pt-2'>
                <div class='text-center'>
                    <?= $links ?>
                </div>
            </div>
        </div>

    </section>
</div>

<!-- Modal -->
<form class='category-form'>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class='mb-2'>
                        <span class='form-label'>Select Image</span>
                        <input type='file' name='slider_image' required class='form-control w-50' />
                    </div> -->
                    <div class='mb-2'>
                        <span class='form-label'>Category Name</span>
                        <input type='text' name='name' required class='form-control w-100 name' placeholder='Category Name' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Category Desc Top</span>
                        <textarea id='editor' name='category_desc_top' class='form-control w-100 category_desc_top'></textarea>
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Category Desc Bottom</span>
                        <textarea id='editor2' name='category_desc_bottom' class='form-control w-100 category_desc_bottom'></textarea>
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Show on Home Page</span>
                        <select class='form-control w-50' class='show_on_home_page' name='show_on_home_page'>
                            <option value='1'>YES</option>
                            <option value='0'>NO</option>
                        </select>
                    </div>

                    <div class='mb-2'>
                        <span class='form-label'>Parent Category</span>
                        <select class='form-control w-50 parent_category' name='parent_category'>
                            <option value=''></option>
                            <?php if (isset($category)) {
                                foreach ($category as $cat) { ?>
                                    <option value='<?= $cat->id ?>' <?php if (isset($product[0])) {
                                                                        if ($cat->id == $product[0]->category_id) {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>><?= $cat->category_name ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>

                    <div class='mb-2'>
                        <span class='form-label'>Pair Category</span>
                        <select class='form-control w-50 pair_category' name='pair_category'>
                            <option value=''></option>
                            <?php if (isset($category)) {
                                foreach ($category as $cat) { ?>
                                    <option value='<?= $cat->id ?>' <?php if (isset($product[0])) {
                                                                        if ($cat->id == $product[0]->pair_category) {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>><?= $cat->category_name ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Category Order</span>
                        <input type='text' name='order' class='order form-control w-50' placeholder='Category Order' />
                    </div>
                    <input type='hidden' class='category_id' name='category_id'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.search-btn').click(function(){
            window.location.href = '<?= base_url('Admin/category/?search=');?>'+$('.search-input').val();
        });
        
        let editor;

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        let editor2;

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(newEditor => {
                editor2 = newEditor;
            })
            .catch(error => {
                console.error(error);
            });


        $('.category-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_category_data') ?>",
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
                            window.location.href = '<?= base_url('/Admin/category'); ?>';
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });
        $('.edit_category').click(function(e) {
            // alert($(this).attr('id'));
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('edit_category_data') ?>",
                data: {
                    id: $(this).attr('id')
                },
                // contentType: false,
                cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    $('.edit-category-btn').trigger('click');
                    // console.log(data);
                    $('.name').val(data.data[0]['category_name']);
                    $('.order').val(data.data[0]['category_order']);
                    $('.show_on_home_page').val(data.data[0]['show_on_homepage']);
                    $('.parent_category').val(data.data[0]['parent_category']);
                    $('.pair_category').val(data.data[0]['pair_category']);
                    $('.category_desc_top').val(data.data[0]['category_desc_top']);
                    $('.category_desc_bottom').val(data.data[0]['category_desc_bottom']);
                    $('.category_id').val(data.data[0]['id']);
                    editor.setData(data.data[0]['category_desc_top']);
                    editor2.setData(data.data[0]['category_desc_bottom']);

                    // document.querySelector('#editor').val(data.data[0]['category_desc_top']);
                    // console.log(data.data[0]['parent_category']);



                }
            });
        });
    });
</script>

<?= $this->endSection() ?>