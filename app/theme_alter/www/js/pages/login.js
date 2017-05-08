
var $login_card = $('#login_card'),
    $login_form = $('#login_form'),
    $reset_form = $('#reset_form');

var $form = {
    $login: $login_form.find('form'),
    $reset: $reset_form.find('form')
};

altair_login_page = {
    init: function () {
        // show login form (hide other forms)
        var login_form_show = function() {
            $login_form
                .show()
                .siblings()
                .hide();
        };

        // show password reset form (hide other forms)
        var reset_form_show = function() {
            $reset_form
                .show()
                .siblings()
                .hide();
        };

        $('.back_to_login').on('click',function(e) {
            e.preventDefault();
            $('#signup_form_show').fadeIn('280');
            // card animation & complete callback: login_form_show
            altair_md.card_show_hide($login_card,undefined,login_form_show,undefined);
        });
    }
};
