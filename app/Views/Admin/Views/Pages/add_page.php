<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>
<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Page</li>
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
        <form class='page-form'>
            <div class='p-5 m-3 card'>
                <div class='mb-2'>
                    <span class='form-label'> Page Name </span>
                    <input name='page_name' class='form-control name' placeholder="Page Name" value='<?php if (isset($page[0])) {
                                                                                                            echo $page[0]->page_name;
                                                                                                        } ?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Page Content </span>
                    <textarea name='page_content' id="editor" class='form-control w-100 content' placeholder="Title"><?php if (isset($page[0])) {
                                                                                                                            echo $page[0]->page_content;
                                                                                                                        } ?></textarea>
                </div>
                <input type="hidden" class='id' value="<?php if (isset($page[0])) {
                                                            echo $page[0]->id;
                                                        } ?>" />

                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary'> Save Page</button>
                </div>
            </div>
        </form>

    </section>
</div>

<script>
    $(document).ready(function() {
        let editor;

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        $('.page-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_page_data') ?>",
                data: {
                    id: $('.id').val(),
                    name: $('.name').val(),
                    content: document.getElementById("editor").value,
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
                            window.location.href = '<?= base_url('/Admin/pages'); ?>';
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