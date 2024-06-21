<style>
    .profile-option {
        color: #979797;
        font-size: 16px;
    }

    .profile-value {
        color: #646464;
        font-size: 16px;
    }

    .profile-heading {
        padding-bottom: 14px;
        border-bottom: 1px solid #dfdfdf;
    }
    .profile-sidebar-option{
        font-size:15px;color:#727272;
    }
    
    .profile-sidebar-value{
        font-size:14px;color:#727272;
    }
    a:hover{
        text-decoration: none !important;
        color:#000;
    }
</style>

<div class="col-2 p-0 mobile_Head_Hide" style="border-right:1px solid #dfdfdf">
    <div class="col-12 mt-3">
        <p class="mb-2 h5 font-weight-light profile-sidebar-option">Account</p>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url('profile'); ?>">Profile</a>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url('profile/address'); ?>">Addresses</a>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url('profile/change_password'); ?>">Change Password</a>
    </div>
    <div class="col-12" style="padding-bottom:15px;border-bottom:1px solid #dfdfdf">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url('profile/delete_account'); ?>">Delete Account</a>
    </div>

    <div class="col-12 mt-3">
        <p class="mb-2 h5 font-weight-light profile-sidebar-option">Orders</p>
    </div>
    <div class="col-12" style="padding-bottom:15px;border-bottom:1px solid #dfdfdf">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url('profile/myorders'); ?>">My Orders</a>
    </div>

    <div class="col-12 mt-3">
        <p class="mb-2 h5 font-weight-light profile-sidebar-option">Credits</p>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url('profile/coupons'); ?>">Coupons</a>
    </div>
    <!-- <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<//?= base_url(); ?>">WishList</a>
    </div> -->
</div>