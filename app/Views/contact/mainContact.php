<div class="container-fluid">
    <div class="mx-n4 mt-n4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-0">
                    <div class="card-body p-0">
                        <div class="profile-bg position-relative overflow-hidden">
                            <div class="ms-5 mt-5">
                                <h1 class="text-white"><?php echo lang('Text.contact_page_title'); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-4"></div>
        <div class="col-12 col-lg-4">
            <div class="card mt-n5">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title mb-4"><?php echo lang('Text.contact_fill_the_form'); ?></h5>
                        <div class="col-12 col-md-6 col-lg-6 mt-2">
                            <label for="txt-name<?php echo $uniquid; ?>"><?php echo lang('Text.name'); ?></label>
                            <input type="text" id="txt-name<?php echo $uniquid; ?>" class="form-control required" />
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mt-2">
                            <label for="txt-lastName<?php echo $uniquid; ?>"><?php echo lang('Text.last_name'); ?></label>
                            <input type="text" id="txt-lastName<?php echo $uniquid; ?>" class="form-control required" />
                        </div>
                        <div class="col-12 mt-2">
                            <label for="txt-email<?php echo $uniquid; ?>"><?php echo lang('Text.email'); ?></label>
                            <input type="text" id="txt-email<?php echo $uniquid; ?>" class="form-control required email" />
                        </div>
                        <div class="col-12 mt-2">
                            <label for="txt-description<?php echo $uniquid; ?>"><?php echo lang('Text.description'); ?></label>
                            <textarea id="txt-description<?php echo $uniquid; ?>" class="form-control required" rows="10"></textarea>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <button id="btn-send" class="btn btn-primary"><?php echo lang('Text.send'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4"></div>
    </div>
</div>
<script>
    $('#btn-send').on('click', function() {
        let result = checkRequiredValues();
        let emailFormat = checkEmailFormat();

        if (result == 0 && emailFormat == 0) {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Main/sendContactEmail'); ?>",
                data: {
                    'name': $('#txt-name<?php echo $uniquid; ?>').val(),
                    'lastName': $('#txt-lastName<?php echo $uniquid; ?>').val(),
                    'email': $('#txt-email<?php echo $uniquid; ?>').val(),
                    'description': $('#txt-description<?php echo $uniquid; ?>').val()
                },
                dataType: "json",
                success: function(response) {
                    if (response.error == 0) {
                        showAlert('success', '<?php echo lang('Text.success'); ?>', '<?php echo lang('Text.success_email_recived'); ?>');
                        setTimeout(() => {
                            window.location.reload();
                        }, "2000");
                    } else
                        showAlert('error', '<?php echo lang('Text.important'); ?>', '<?php echo lang('Text.error'); ?>');
                },
                error: function(error) {
                    showAlert('error', '<?php echo lang('Text.important'); ?>', '<?php echo lang('Text.error'); ?>');
                }
            });
        } else
            showAlert('warning', 'Error', '<?php echo lang('Text.invalid_form_values'); ?>');
    });

    function checkRequiredValues() {
        let response = 0;
        let value = '';

        $('.required').each(function() {
            value = $(this).val();
            if (value == '') {
                $(this).addClass('is-invalid');
                response = 1
            }
        });

        return response;
    }

    function checkEmailFormat() {
        let response = 0;
        let value = '';
        let regex = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

        $('.email').each(function() {
            value = $(this).val();
            if (value !== '') {
                if (!regex.test(value)) {
                    $(this).addClass('is-invalid');
                    response = 1;
                }
            }
        });
        return response;
    }

    $('.required').on('focus', function() {
        $(this).removeClass('is-invalid');
    });
</script>