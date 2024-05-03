<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Users</li>
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
        <form class='user-form row'>
            <div class='p-5 m-3 card col-6'>
                <div class='mb-2'>
                    <span class='form-label'> First Name </span>
                    <input required name='firstname' class='form-control' placeholder="First Name" value='<?php if(isset($product[0])){ echo $product[0]->title;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Last Name </span>
                    <input required name='lastname' class='form-control' placeholder="Last Name" value=''>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Email </span>
                    <input required name='email' class='form-control' placeholder="Email" value=''>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Password </span>
                    <input required name='password' class='form-control' placeholder="Password" value=''>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Role </span>
                    <select required name='role' class='form-control'>
                        <option value='admin'>Admin</option>
                        <option value='customer'>Customer</option>
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
        $('.user-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_user_data') ?>",
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
                            window.location.href = '<?= base_url('/Admin/add-users'); ?>';
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