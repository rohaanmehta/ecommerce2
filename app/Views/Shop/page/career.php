<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
    .responsive-map {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .responsive-map iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
</style>
<div class='card p-5'>
    <p class='h2'> JOIN WITH US ! </p>

    <p class='h5 mb-4'>Interior designer position open at Bandra</p>

    <div class='mb-3'> <span class='h4'>Education Qualification :</span> Atleast Gradute</div>
    <div class='mb-3'> <span class='h4'>Gross Salary :</span> 20 - 25k</div>
    <div class='mb-3'> <span class='h4'>Roles and Responsibilities :</span> Client Consultation,
        Conceptualization and Design Development,
        Space Planning,
        Material and Finishes Selection,
        Project Management,
        Documentation,
        Client Communication
    </div>

    <form class='contact-form'>
        <div class='row form-control p-0 mt-3' style='display:flex'>
            <div class='col-6'>
                <p class='h3 mb-3 pl-3 mt-3'>Contact Us</p>
                <div class='w-100 mb-3'>
                    <div class='col-6'>
                        <input type='text' placeholder='Name' required name='name' class='form-control'>
                    </div>
                </div>
                <div class='w-100 mb-3'>
                    <div class='col-6'>
                        <input type='text' placeholder='Mobile No' required name='number' class='form-control'>
                    </div>
                </div>
                <div class='w-100 mb-3'>
                    <div class='col-6'>
                        <input type='text' placeholder='Email' required name='email' class='form-control'>
                    </div>
                </div>
                <div class='w-100 mb-3'>
                    <div class='col-6'>
                        <button class='w-100 btn btn-primary'>Submit</button>
                    </div>
                </div>
            </div>
            <div class='col-6 p-0'>
                <img width='100%' src='<?= base_url('/uploads/contactus.avif'); ?>'>
            </div>
        </div>
        <div class="responsive-map mt-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15084.84212221855!2d72.8296543!3d19.054479049999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8e123f8d27b%3A0x437996b49a236a78!2sBandra%20West%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1711288327854!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</div>
</form>

<script>
    $(document).ready(function() {
        $('.contact-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('contact_form') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('Submitted successfully');

                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.href = '<?= base_url('/career'); ?>';
                        }, 2000);
                        // alert('registered_successfully');

                    } else {
                        alert('someything went wrong');
                    }
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>