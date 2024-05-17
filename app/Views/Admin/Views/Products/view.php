<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <!-- <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModal">Upload Slider <i class='pl-2 nav-icon fas fa-upload'></i></button>

                </div>
            </div>
        </div> -->
        <div class='row p-5'>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Promote</td>
                    <td>SKU</td>
                    <td>Price</td>
                    <td>Stock</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($products[0])) {
                    foreach ($products as $row) { ?>
                        <tr>
                            <td><?= $row->title; ?></td>
                            <td><?= $row->category_name; ?></td>
                            <td><?= $row->promote; ?></td>
                            <td><?= $row->sku; ?></td>
                            <td><?= $row->price; ?></td>
                            <td><?= $row->stock; ?></td>
                            <td><a class='mr-2' href='<?= base_url('/add_products' . '/' . $row->product_id); ?>'><button class='btn btn-info'>Edit</button></a><a href='<?= base_url('/delete-product' . '/' . $row->product_id); ?>'><button class='btn btn-danger'>Delete</button></a></td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='7'> No Products Available !</td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </section>
</div>

<script>
//   $(document).ready(function() {
//     $('.slider-form').submit(function(e) {
//       e.preventDefault();
//       $.ajax({
//         type: "POST",
//         url: "<//?= base_url('add_slider_data') ?>",
//         data: new FormData(this),
//         contentType: false,
//         cache: false,
//         processData: false,
//         dataType: "json",
//         success: function(data) {
//           if (data.status == '200') {
//             alert('uploaded successfully');
//             setTimeout(function() {
//               // $('#download').css('display', 'block');
//               // $('#loader').css('visibility', 'hidden');
//               window.location.href = '<//?= base_url('/Admin/slider-view');?>';
//             }, 1000);
//             // alert('registered_successfully');

//           }else{
//             alert('something went wrong');
//           }
//         }
//       });
//     });
//   });
</script>

<?= $this->endSection() ?>