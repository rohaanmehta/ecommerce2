<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sliders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sliders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary upload-slider-btn' data-toggle="modal" data-target="#exampleModal">Upload Slider <i class='pl-2 nav-icon fas fa-upload'></i></button>

                </div>
            </div>
        </div>
        <div class='row p-5'>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>PC Image</td>
                    <td>Mobile Image</td>
                    <td>Link</td>
                    <td>Order</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($sliders[0])) {
                    foreach ($sliders as $row) { ?>
                        <tr>
                            <td width='220px'><img width='200px' src='<?= base_url('/uploads/slider/' . $row->name); ?>'></td>
                            <td width='220px'><img width='200px' src='<?= base_url('/uploads/slider/' . $row->mobile_name); ?>'></td>
                            <td><?= $row->link; ?></td>
                            <td width='100px'><?= $row->order; ?></td>
                            <td width='220px'>
                                <a><button id='<?= $row->id ?>' class='btn btn-info edit-btn'>Edit</button></a>
                                <a href='<?= base_url('/delete-slider' . '/' . $row->id); ?>'><button class='btn btn-danger'>Delete</button></a>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='3'> No Sliders Available !</td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </section>
</div>
<!-- Modal -->
<form class='slider-form'>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='mb-2'>
                        <span class='form-label'>Select PC Image</span>
                        <input type='file' name='slider_image' class='form-control w-50' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Select Mobile Image</span>
                        <input type='file' name='mobile_image' class='form-control w-50' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Link</span>
                        <input type='text' name='link' class='link form-control w-50' placeholder='Link' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Order</span>
                        <input type='text' name='order' required class='order form-control w-50' placeholder='Order' />
                    </div>
                    <input type='hidden' name='edit-id' class='form-control w-50 edit-id' />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            $('.upload-slider-btn').trigger('click');
            $('.edit-id').val($(this).attr('id'));

            $.ajax({
                type: "POST",
                url: "<?= base_url('get_slider_data') ?>",
                data: {
                    id:$(this).attr('id')
                },
                
                dataType: "json",
                success: function(data) {
                    $('.link').val(data.data[0]['link']);
                    $('.order').val(data.data[0]['order']);
                }
            });
        });

        $('.slider-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_slider_data') ?>",
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
                            window.location.href = '<?= base_url('/Admin/slider-view'); ?>';
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