$(function() {
    $('#register_phone').kendoMaskedTextBox({
        mask: "999 999 9999"
    });
    $('#register_country').kendoComboBox({
        dataTextField: "text",
        dataValueField: "value",
        dataSource: [
            { text: "98+ ایران", value: "+98" },
        ],
        filter: "contains",
        suggest: true,
        index: 0
    });
    $(window).on('load', function (e) {
        var toggle_password = $('.uk-form-password-toggle');
        toggle_password.parent().find('input').after(toggle_password);
    });
});
// variables
var $login_card = $('#login_card'),
    $register_form = $('#register_form');

var $form = {
    $register: $register_form.find('form')
};

altair_login_page = {
    init: function () {
    }
};