<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Job Enquiries</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Job Enquiries</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class='row p-5'>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>Name</td>
                    <td>Mobile No</td>
                    <td>Email</td>
                </tr>

                <?php if (isset($list[0])) {
                    foreach ($list as $row) { ?>
                        <tr>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->mobile; ?></td>
                            <td><?= $row->email; ?></td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='3'> No Entries !</td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </section>
</div>
<?= $this->endSection() ?>