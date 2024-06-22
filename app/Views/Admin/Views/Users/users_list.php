<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users List</li>
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
        <div class="mb-2 w-100 d-flex justify-content-end">
                <input type="text" value="<?php if (isset($_GET['search'])) {
                                                echo $_GET['search'];
                                            } ?>" name="search" placeholder='Search Name' class="search-input form-control rounded-0" style="max-width:200px;" />
                <button class="search-btn btn btn-dark rounded-0">GO</button>
            </div>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                </tr>

                <?php if (isset($users[0])) {
                    foreach ($users as $row) { ?>
                        <tr>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->first_name; ?></td>
                            <td><?= $row->last_name; ?></td>
                            <td><?= $row->email; ?></td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='7'> No Users Available !</td>
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
<script>
    $(document).ready(function() {
        $('.search-btn').click(function() {
            window.location.href = '<?= base_url('Admin/users-list/?search='); ?>' + $('.search-input').val();
        });
    });
</script>
<?= $this->endSection() ?>