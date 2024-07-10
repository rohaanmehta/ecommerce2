<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<style>
    .form-label {
        font-size: 13px;
        color: #3c3c3c;
        margin-bottom: 2px;
    }
</style>
<div class=''>
    <div class='container p-4 p-md-5'>
        <div class="row">
            <div class="col-12">
                <p class="mb-0 h5 font-weight-bold">Account</p>
            </div>
            <div class="col-12 mb-2">
                <p class="m-0 h6 font-weight-light" style="font-size:14px;">Rohaan Mehta</p>
            </div>
            <?php include('app/Views/Shop/Profile/profile_sidebar.php'); ?>

            <div class="col-12 col-md-10">
                <div class='card p-3'>
                    <p class="mb-2 h5 font-weight-bold profile-heading">Addresses</p>

                    <?php if (session()->getFlashdata('message') !== NULL) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($user) && !empty($user) && sizeof($user) < 3) { ?>
                        <div class="row p-3 p-md-4 pt-md-2">
                            <button style='width:100%;' class="add-new-address btn black-btn" data-toggle="modal" data-target="#exampleModal">Add New Address</button>
                        </div>
                    <?php } ?>

                    <form class='save-address'>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content modal-dialog-centered">
                                    <div class="modal-header w-100">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style='width:90%'>
                                        <div class='row'>
                                            <div class='col-12 p-0 mb-2'>
                                                <label class='form-label'>First Name</label><span class='text-danger'> *</span>
                                                <input type='text' class='form-control' id='first_name' name='first_name' placeholder="Enter name here" />
                                            </div>
                                            <div class='col-12 p-0 mb-2'>
                                                <label class='form-label'>Last Name</label><span class='text-danger'> *</span>
                                                <input type='text' class='form-control' id='last_name' name='last_name' placeholder="Enter name here" />
                                            </div>
                                            <div class='col-12 col-md-6 p-0 mb-2'>
                                                <div class='mr-md-2'>
                                                    <label class='form-label'>Mobile Number</label><span class='text-danger'> *</span>
                                                    <input type='text' onkeypress="return event.charCode >= 48 && event.charCode <= 57 " class='form-control' id='mobile_no' name='mobile_no' placeholder="Enter mobile number here" />
                                                </div>
                                            </div>
                                            <div class='col-12 col-md-6 p-0 mb-2'>
                                                <label class='form-label'>Postal Code</label><span class='text-danger'> *</span>
                                                <input type='text' onkeypress="return event.charCode >= 48 && event.charCode <= 57 " class='form-control' id='postal_code' name='postal_code' placeholder="Enter postal code here" />
                                            </div>
                                            <div class='col-12 col-md-6 p-0 mb-2'>
                                                <div class='mr-md-2'>
                                                    <label class='form-label'>State</label><span class='text-danger'> *</span>
                                                    <input type='text' class='form-control' id='state' name='state' placeholder="Delivery state" />
                                                </div>
                                            </div>
                                            <div class='col-12 col-md-6 p-0 mb-2'>
                                                <label class='form-label'>City/Town</label><span class='text-danger'> *</span>
                                                <input type='text' class='form-control' id='city' name='city' placeholder="Delivery City/Town" />
                                            </div>
                                            <div class='col-12 p-0 mb-2'>
                                                <label class='form-label'>Address</label><span class='text-danger'> *</span>
                                                <input type='text' class='form-control' id='address' name='address' placeholder="Enter delivery address here" />
                                            </div>
                                            <div class='col-12 p-0 mb-2'>
                                                <label class='form-label'>Landmark</label><span class='text-danger'> *</span>
                                                <input type='text' class='form-control' id='landmark' name='landmark' placeholder="Eg. Behind the park" />
                                            </div>
                                            <div class='col-12 p-0 mb-2'>
                                                <label class='form-label'>Instructions </label>
                                                <input type='text' class='form-control' id='instructions' name='instructions' placeholder="Any instructions please add here" />
                                            </div>
                                            <input type='hidden' value='' name='address_id' id='address_id'>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <button type="submit" class="btn black-btn">Save Address</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row p-2">
                        <?php if (isset($user) && !empty($user)) {
                            foreach ($user as $row) { ?>
                                <div class="col-12 p-2 mb-2" style='border:1px solid lightgrey;border-radius:4px;' id='<?= $row->id; ?>'>
                                    <!-- <div class="col-12"> -->
                                    <p class='mb-1 mt-2' style='font-size:15px;color:#303030;font-weight:600;'><?= $row->first_name . '&nbsp' . $row->last_name ?></p>
                                    <p class='mb-1' style='font-size:14px;color:#727272;'><?= $row->address_1 . ' ' . $row->landmark . ' ' . $row->city . ' ' . $row->state . ' ' . $row->postal_code ?></p>
                                    <p class='mb-1' style='font-size:15px;color:#303030;'><?= $row->mobile_no; ?></p>
                                    <div class='d-flex justify-content-end w-100 text-end'>
                                        <a class='edit-address text-info' style='font-size:14px;cursor:pointer;' id='<?= $row->id; ?>'>Edit</a>
                                        &nbsp <a class='delete-address text-danger' style='font-size:14px;cursor:pointer;' id='<?= $row->id; ?>'>Delete</a>
                                    </div>
                                    <!-- </div> -->
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        $('.add-new-address').click(function() {
            $('#first_name').val('');
            $('#last_name').val('');
            $('#mobile_no').val('');
            $('#postal_code').val('');
            $('#state').val('');
            $('#city').val('');
            $('#address').val('');
            $('#landmark').val('');
            $('#instructions').val('');
            $('#address_id').val('');
        });

        $('.save-address').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?= base_url('profile/save_edit_address') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        window.location.reload();
                    } else {
                        $.each(data, function(key, value) {
                            // alert();
                            if (value) {
                                $("#" + key).addClass("border-danger");
                            } else {
                                $("#" + key).removeClass("border-danger");
                            }
                        });
                    }
                }
            });
        });

        $('.edit-address').click(function() {
            $('#address_id').val('');
            $.ajax({
                type: "POST",
                url: "<?= base_url('profile/get_address') ?>",
                data: {
                    id: $(this).attr('id')
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        console.log(data);
                        $('#exampleModal').modal('toggle');
                        $('#first_name').val(data.user[0]['first_name']);
                        $('#last_name').val(data.user[0]['last_name']);
                        $('#mobile_no').val(data.user[0]['mobile_no']);
                        $('#postal_code').val(data.user[0]['postal_code']);
                        $('#state').val(data.user[0]['state']);
                        $('#city').val(data.user[0]['city']);
                        $('#address').val(data.user[0]['address_1']);
                        $('#landmark').val(data.user[0]['landmark']);
                        $('#instructions').val(data.user[0]['instructions']);
                        $('#address_id').val(data.user[0]['id']);
                    }
                }
            });
        });

        $('.delete-address').click(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('profile/delete_address') ?>",
                data: {
                    id: $(this).attr('id')
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    window.location.reload();
                }
            });
        });
    });
</script>
<?= $this->endSection('scripts') ?>