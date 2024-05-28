<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reviews List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reviews List </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class='row p-5'>
            <table class='table table-bordered table-striped' style='font-size:15px'>
                <tr>
                    <td>User</td>
                    <td>Product</td>
                    <td>Stars</td>
                    <td>Review</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($reviews[0])) {
                    foreach ($reviews as $row) { ?>
                        <tr>
                            <td width='150px'><?php if ($row->first_name != '') {
                                                    echo $row->first_name . ' ' . $row->last_name;
                                                } else {
                                                    echo $row->user_id;
                                                } ?></td>
                            <td width='250px'><?php if ($row->title != '') { ?><a target='_blank' href='<?= base_url($row->category_name . '/' . $row->product_slug); ?>'><?php echo $row->title;
                                                                                                                                                                } ?></a></td>
                            <td width='30px'><?= $row->stars; ?></td>
                            <td><?= $row->review; ?></td>
                            <td width='200px'><?= date('d-m-Y H:i:s', strtotime($row->created_at)); ?></td>
                            <td width='150px'>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                        <a href='<?= base_url('Admin/decline-review/' . $row->id); ?>' class=''><button type='button' class='btn btn-sm btn-info w-100 mb-2'>Decline</button></a>
                                        <a href='<?= base_url('Admin/delete-review2/' . $row->id); ?>'><button class='btn btn-sm btn-danger w-100'>Delete</button></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='5'> No Reviews Available !</td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </section>
</div>

<?= $this->endSection() ?>