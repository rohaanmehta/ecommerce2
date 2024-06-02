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
</style>
<div class="col-2 p-0" style="border-right:1px solid #dfdfdf">
    <div class="col-12 mt-3">
        <p class="mb-2 h5 font-weight-light profile-sidebar-option">Account</p>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">Profile</a>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">Addresses</a>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">Change Password</a>
    </div>
    <div class="col-12" style="padding-bottom:15px;border-bottom:1px solid #dfdfdf">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">Delete Account</a>
    </div>

    <div class="col-12 mt-3">
        <p class="mb-2 h5 font-weight-light profile-sidebar-option">Orders</p>
    </div>
    <div class="col-12" style="padding-bottom:15px;border-bottom:1px solid #dfdfdf">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">My Orders</a>
    </div>

    <div class="col-12 mt-3">
        <p class="mb-2 h5 font-weight-light profile-sidebar-option">Credits</p>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">Coupons</a>
    </div>
    <div class="col-12">
        <a class="mb-2 profile-sidebar-value" href="<?= base_url(); ?>">WishList</a>
    </div>
</div>