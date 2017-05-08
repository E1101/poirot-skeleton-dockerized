

$(function()
{
    var send = true;

    var $inputMobile = $('input[name=mobile_code]');
    var $inputEmail  = $('input[name=email_code]');


    if (! $('.verification-status.verification-mobile').hasClass('verificate') )
        $inputMobile.fadeIn();

    if (! $('.verification-status.verification-email').hasClass('verificate') )
        $inputEmail.fadeIn();


    $inputMobile
        .on('keydown', function() {
            if(this.value.length == 4)
                return false;
        })
        .on('keyup', function() {
            if(this.value.length == 4 && send) {
                send = false;
                SendRequest(this.value, 'mobile');
            }
        })
    ;

    $inputEmail
        .on('keydown', function() {
            if(this.value.length == 5)
                return false;
        })
        .on('keyup', function() {
            if(this.value.length == 5 && send) {
                send = false;
                SendRequest(this.value, 'email');
            }
        })
    ;


    var SendRequest = function(value, medium) {
        $.ajax({
            url: '', // Send Request To Self URL !!!
            method: 'POST',
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json"
            },
            data: '{"'+medium+'": "' + value +'" }',
            success: function (response) {
                ValidationSuccess(response, medium);
            },
            error: function(response){
                SendRequest(value);
            }
        });
    } ;

    var ValidationSuccess = function(response, medium)
    {
        if (medium == 'mobile') {
            if (response.result.verifications.mobile.is_validated) {
                $('.verification-status.verification-mobile').addClass('verificate');
                $inputMobile.hide('fast');
            } else {
                $inputMobile.addClass('md-input-danger').parent().addClass('md-input-wrapper-danger');
                send = true;
            }

            $inputMobile.val('');
        }

        if (medium == 'email') {
            if (response.result.verifications.email.is_validated) {
                $('.verification-status.verification-email').addClass('verificate');
                $inputEmail.hide('fast');
            } else {
                $inputEmail.addClass('md-input-danger').parent().addClass('md-input-wrapper-danger');
                send = true;
            }

            $inputEmail.val('');
        }

        //if ( $('.verification-status').length == $('.verification-status.verificate').length )
        if ( response.result.is_validated )
            // All Identifiers is verified
            // redirect
            window.location.reload(false);
            // allow login
            // $('form button[type=submit]').removeAttr('disabled');

        send = true;
    };
});
