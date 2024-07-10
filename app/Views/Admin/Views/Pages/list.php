<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pages List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pages List </li>
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
                                            } ?>" name="search" placeholder='Search Page Name' class="search-input form-control rounded-0" style="max-width:200px;" />
                <button class="search-btn btn btn-dark rounded-0">GO</button>
            </div>
            <table class='table table-bordered table-striped' style='font-size:15px'>
                <tr>
                    <td>Page Name</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($pages[0])) {
                    foreach ($pages as $row) { ?>
                        <tr>
                            <td width='150px'><?php echo $row->page_name; ?></td>

                            <td width='150px'>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                        <a href='<?= base_url('Admin/add_page/' . $row->id); ?>' class=''><button type='button' class='btn btn-sm btn-info w-100 mb-2'>Edit</button></a>
                                        <a href='<?= base_url('Admin/delete-page/' . $row->id); ?>'><button class='btn btn-sm btn-danger w-100'>Delete</button></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='5'> No Pages Available !</td>
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
            window.location.href = '<?= base_url('Admin/pages/?search='); ?>' + $('.search-input').val();
        });
    });
</script>
<?= $this->endSection() ?>