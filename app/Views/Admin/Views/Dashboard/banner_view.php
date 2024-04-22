<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModal">Upload Banner <i class='pl-2 nav-icon fas fa-upload'></i></button>

                </div>
            </div>
        </div>
        <div class='row p-5'>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>Image</td>
                    <td>Type</td>
                    <td>Order</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($Banners[0])) {
                    foreach ($Banners as $row) { ?>
                        <tr>
                            <td><img width='100px' src='<?= base_url('/uploads/banner/' . $row->name); ?>'></td>
                            <td><?= $row->type; ?></td>
                            <td><?= $row->order; ?></td>
                            <td><a href='<?= base_url('/delete-banner' . '/' . $row->id); ?>'><button class='btn btn-danger'>Delete</button></a></td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='4'> No Banners Available !</td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </section>
</div>
<!-- Modal -->
<form class='banner-form'>
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
                        <span class='form-label'>Select Image</span>
                        <input type='file' name='banner_image' required class='form-control w-50' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Order</span>
                        <input type='text' name='order' required class='form-control w-50' placeholder='Order' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Type</span>
                        <select name='type' class='form-control'>
                            <option value='banner1'>banner1</option>
                            <option value='banner2'>banner2</option>
                            <option value='banner3'>banner3</option>
                        </select>
                    </div>
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
    $('.banner-form').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "<?= base_url('add_banner_data') ?>",
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
              window.location.href = '<?= base_url('/Admin/banner-view');?>';
            }, 1000);
            // alert('registered_successfully');

          }else{
            alert('something went wrong');
          }
        }
      });
    });
  });
</script>

<?= $this->endSection() ?>