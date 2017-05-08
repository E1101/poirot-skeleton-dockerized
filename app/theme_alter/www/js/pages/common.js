$(function() {
    altair_login_page.init();
    altair_form_validation.init();
});

altair_form_validation = {
    init: function () {
        for(var item in $form) {
            if($form[item].length) {
                $form[item].parsley()
                    .on('form:validated', function () {
                        altair_md.update_input($form[item].find('.md-input-danger'));
                    })
                    .on('field:validated', function (parsleyField) {
                        if ($(parsleyField.$element).hasClass('md-input')) {
                            altair_md.update_input($(parsleyField.$element));
                        }
                    });
            }
        }
        window.Parsley
            .on('field:validate', function() {
                var $server_side_error = $(this.$element).closest('.md-input-wrapper').siblings('.error_server_side');
                if($server_side_error) {
                    $server_side_error.hide();
                }
            }).addMessages('en', {
                defaultMessage: "این قسمت به درستی وارد نشده است.",
                type: {
                    email: "ایمیل وارد شده نا معتبر است.",
                },
                required: "پر کردن این فیلد الزامی است.",
                length: "تعداد کاراکتر های ورودی باید بین %s و %s کاراکتر باشد.",
            });
    }
};
