<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
  .login_Input {
    width: 100%;
    max-width: 400px;
    height: 40px;
    padding-top: 8px;
  }

  .login_Links:hover {
    color: #fff
  }
</style>
<div class='invisible'>gap fill</div>
<div class="mb-5">
  <div class="text-center w-100" style='margin-top:20px;font-size:25px'>
    <p>CREATE A ACCOUNT</p>
  </div>
  <form class='register-form'>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' required name='first_name' placeholder='First Name' />
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' required name='last_name' placeholder='Last Name' />
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' required name='country' placeholder='COUNTRY' />
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' required name='state' placeholder='STATE' />
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' required name='city' placeholder='CITY' />
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' required name='email' placeholder='Email' />
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='password' class='m-auto login_Input form-control rounded-0' id='password' name='password' placeholder='Password' />
        <span class='text-danger' id='msg' style='display:none;font-size:13px;'> Password should be more than 5 characters </span>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <button class='login_Input login_Links btn rounded-0 btn-dark'>SIGN UP</button>
      </div>
    </div>
    <div class="row text-center justify-content-center">
      <p> Returning Customer ? <a href='<?= base_url("login") ?>' style='text-decoration:none' href=''> Sign In </a></p>
    </div>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('.register-form').submit(function(e) {
      e.preventDefault();
      $('#msg').css('display','none');

      if($('#password').val().length < 5){
        $('#msg').css('display','block');
        return false;
      }

      $.ajax({
        type: "POST",
        url: "<?= base_url('add_register_data') ?>",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data.status == '200') {
            setTimeout(function() {
              // $('#download').css('display', 'block');
              // $('#loader').css('visibility', 'hidden');
              window.location.href = '<?= base_url();?>';
            }, 2000);
            // alert('registered_successfully');

          }else{
            alert('someything went wrong');
          }
        }
      });
    });
  });
</script>
<?= $this->endSection() ?>