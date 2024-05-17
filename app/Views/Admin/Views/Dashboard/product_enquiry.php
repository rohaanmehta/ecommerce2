<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Enquiries</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Enquiries</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class='row p-5'>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>Product</td>
                    <td> Name </td>
                    <td> Mobile No</td>
                </tr>

                <?php if (isset($list[0])) {
                    foreach ($list as $row) { ?>
                        <tr>
                            <td><?= $row->title; ?></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->contact; ?></td>
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