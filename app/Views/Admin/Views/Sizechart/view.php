<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>
<style>
    .ck-editor__editable {
        min-height: 300px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sizechart</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sizechart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class='row p-5'>
            <div class="mb-2 w-100 d-flex justify-content-end">
                <input type="text" value="<?php if (isset($_GET['search'])) {
                                                echo $_GET['search'];
                                            } ?>" name="search" placeholder='Search Category Name' class="search-input form-control rounded-0" style="max-width:200px;" />
                <button class="search-btn btn btn-dark rounded-0">GO</button>
            </div>
            <table class='table table-bordered table-striped'>
                <tr>
                    <!-- <td>ID</td> -->
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($sizechart[0])) {
                    foreach ($sizechart as $row) { ?>
                        <tr>
                            <td><?= $row->category_name; ?></td>
                            <td>
                                <?php if (isset($row->sizechart) && !empty($row->sizechart)) { ?>
                                    <a href='' id='<?= $row->id ?>' data-toggle="modal" data-target=".bd-example-modal-xl" class='upload-sizechart btn-sm btn btn-info'>Edit </a>
                                    <a href='<?= base_url('/delete_sizechart' . '/' . $row->id); ?>'><button class='btn-sm btn btn-danger'>Delete</button></a>
                                <?php } else { ?>
                                    <a href='' id='<?= $row->id ?>' data-toggle="modal" data-target=".bd-example-modal-xl" class='upload-sizechart btn-sm btn btn-info'>Upload </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='5'> No categories available to upload Sizechart!</td>
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

<form class='sizechart-form'>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Sizechart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='mb-2'>
                        <span class='form-label'>Sizechart</span>
                        <textarea name='sizechart' id='editor' class='form-control w-50'></textarea>
                    </div>
                    <input type='hidden' class='sizechartid' name='sizechartid'>
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
        $('.search-btn').click(function() {
            window.location.href = '<?= base_url('Admin/sizechart-list/?search='); ?>' + $('.search-input').val();
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

        $('.upload-sizechart').click(function() {
            // alert($(this).attr('id'));
            $('.sizechartid').val($(this).attr('id'));

            $.ajax({
                type: "POST",
                url: "<?= base_url('get_sizechart') ?>",
                data: {
                    id: $('.sizechartid').val(),
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        console.log(data);
                        editor.setData(data['sizechart'][0]['sizechart']);
                    } else {
                        editor.setData('');
                    }
                }
            });
        });

        $('.sizechart-form').submit(function(e) {
            e.preventDefault();
            // console.log(document.getElementById("editor").value);

            $.ajax({
                type: "POST",
                url: "<?= base_url('add_sizechart') ?>",
                data: {
                    id: $('.sizechartid').val(),
                    sizechart: document.getElementById("editor").value,
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.href = '<?= base_url('/Admin/sizechart-list'); ?>';
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