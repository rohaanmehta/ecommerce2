<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders List </li>
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
                    <td>Order No</td>
                    <td>User</td>
                    <td>Coupon Code</td>
                    <td>Order Amount</td>
                    <td>Order Status</td>
                    <td>Payment Status</td>
                    <td>Tracking Link</td>
                    <td>Tracking No</td>
                    <td>Order Date</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($list[0])) {
                    foreach ($list as $row) { ?>
                        <tr>
                            <td width='150px'><a href='<?= base_url('admin/order/' . $row->order_no); ?>'><?= $row->order_no; ?></a></td>
                            <td width='150px'><?php echo $row->full_name; ?></td>
                            <td width='150px'><?php echo $row->coupon_code; ?></td>
                            <td width='150px'><?php echo price_format($row->final_price); ?></td>
                            <td width='150px'><?php echo $row->order_status; ?></td>
                            <td width='150px'><?php echo $row->payment_status; ?></td>
                            <td width='150px'><a href='<?php echo $row->tracking_url; ?>' target='_blank'><?php echo $row->tracking_url; ?></a></td>
                            <td width='150px'><?php echo $row->tracking_no; ?></td>
                            <td width='250px'><?php echo date('d-m-Y', strtotime($row->created_at)); ?>
                                <?php
                                $date1 = date_create(date('Y-m-d', strtotime($row->created_at)));
                                $date2 = date_create(date('Y-m-d'));
                                $diff1 = date_diff($date1, $date2);
                                $daysdiff = $diff1->format("%R%a");
                                $daysdiff = abs($daysdiff);
                                if ($daysdiff == 0) {
                                    echo '(Today)';
                                } else {
                                    echo '(' . $daysdiff . ' Day ago)';
                                }
                                ?>
                            </td>
                            <td width='120px' style='align-content:center'>
                                <div class="dropdown">
                                    <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                        <a data-toggle="modal" data-target="#updatestatusModal">
                                            <button id='<?= $row->id; ?>' class='order-btn btn btn-sm btn-info w-100 mb-2'>Update Order Status</button></a>
                                        <a data-toggle="modal" data-target="#trackingModal" href="#">
                                            <button id='<?= $row->id; ?>' class='tracking-btn btn btn-sm btn-info w-100 mb-2'>Update Tracking</button></a>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='5'> No Orders Available !</td>
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

<!-- update status Modal -->
<form action='<?= base_url('update-order-status'); ?>' method='post'>
    <div class="modal fade" id="updatestatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class='form-check-label'>Select Status</label>
                    <select name='order-status' class='form-control order-status' class='form-control'>
                        <option value='IN PROCESS'>IN PROCESS</option>
                        <option value='DISPATCHED'>DISPATCHED</option>
                        <option value='DELIVERED'>DELIVERED</option>
                    </select>
                    <input type='hidden' class='orderid' name='order-id'>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-secondary">Update Status</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action='<?= base_url('update-tracking-status'); ?>' method='post'>
    <!-- update status Modal -->
    <div class="modal fade" id="trackingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Tracking Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class='form-check-label'>Tracking Link</label>
                    <input class='form-control trackinglink' name='trackinglink' value=''>
                    <label class='mt-2 form-check-label'>Tracking No</label>
                    <input class='form-control trackingno' name='trackingno' value=''>
                </div>
                <input type='hidden' class='orderid2' name='order-id'>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-secondary">Update Tracking</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.search-btn').click(function() {
            window.location.href = '<?= base_url('Admin/orders-list/?search='); ?>' + $('.search-input').val();
        });

        $('.order-btn').click(function() {
            $('.orderid').val($(this).attr('id'));

            $.ajax({
                type: "POST",
                url: "<?= base_url('ajax-order-info') ?>",
                data:{
                    id:$('.orderid').val()
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    console.log(data.order[0]['order_status']);
                    if(data.order[0]['order_status'] != ''){
                        $('.order-status').val(data.order[0]['order_status']);
                    }else{
                        $('.order-status').val('IN PROCESS');
                    }
                }
            });
        });
        $('.tracking-btn').click(function() {
            $('.orderid2').val($(this).attr('id'));
            $.ajax({
                type: "POST",
                url: "<?= base_url('ajax-order-info') ?>",
                data:{
                    id:$('.orderid2').val()
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    // console.log(data.order[0]['order_status']);
                    $('.trackinglink').val(data.order[0]['tracking_url']);
                    $('.trackingno').val(data.order[0]['tracking_no']);
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>