


<section class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <?php echo validation_errors(); ?> 
                <div class="col-md-6 border border-3 ">
                    <h2 class="text-center my-4">Sign Up</h2>
                    <div id="alert" class="alert d-none"></div>
                    <form id="mobileForm" class="d-flex flex-column align-items-center">
                        <div class="form-group w-100">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control mb-3" id="mobile_number" name="mobile_number" required>
                        </div>
                        <button type="button" id="sendOtpBtn" class="btn btn-primary  mb-5">Send OTP</button>
                    </form>

                    <form id="otpForm" class="d-none">
                        <p id="otpdiv" style="display:none;"></p>
                        <div class="form-group">
                            <label for="otp">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" required>
                        </div>
                        <button type="button" id="verifyOtpBtn" class="btn btn-primary btn-block m-2">Verify OTP</button>
                        <button type="button" id="resendOtpBtn" class="btn btn-secondary btn-block d-none mb-5">Resend OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

$(document).ready(function() {
    var otpSentTime;

    $('#sendOtpBtn').click(function() {
        var mobileNumber = $('#mobile_number').val();
        $.ajax({
            url: '<?php echo site_url('Authentication/Signup/send_otp'); ?>',
            type: 'POST',
            data: { mobile_number: mobileNumber },
            success: function(response) {
                response = JSON.parse(response);
                if (response.success) {
                    $('#otpdiv').show();
                    $('#otpdiv').html('Your OTP is: '+response.otp);
                    $('#alert').removeClass('d-none alert-danger').addClass('alert-success').text(response.message);
                    $('#mobileForm').addClass('d-none');
                    $('#otpForm').removeClass('d-none');
                    otpSentTime = new Date().getTime();
                    setTimeout(function() {
                        $('#resendOtpBtn').removeClass('d-none');
                    }, 180000);
                } else {
                    $('#alert').removeClass('d-none alert-success').addClass('alert-danger').text(response.message);
                }
            }
        });
    });

    $('#verifyOtpBtn').click(function() {
        var otp = $('#otp').val();
        $.ajax({
            url: '<?php echo site_url('Authentication/Signup/verify_otp'); ?>',
            type: 'POST',
            data: { otp: otp},
            success: function(response) {
                response = JSON.parse(response);

                if (response.success) {
                    window.location.href = '<?php echo site_url('New-Signup'); ?>';
                } else {
                    $('#alert').removeClass('d-none alert-success').addClass('alert-danger').text(response.message);
                }
            }
        });
    });

    $('#resendOtpBtn').click(function() {
        $('#resendOtpBtn').addClass('d-none');
        $('#mobileForm').removeClass('d-none');
        $('#otpForm').addClass('d-none');
    });
});
</script>

