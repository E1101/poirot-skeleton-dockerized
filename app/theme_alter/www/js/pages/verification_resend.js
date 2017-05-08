function handleResend(dom) {
    href = $(dom).attr('href');

    $.ajax({
        url: href, // Send Request To Self URL !!!
        method: 'GET',
        headers: {'Accept': 'application/json'},
        success: function (response) {
            // TODO display interval
            console.log(response);
        },
        error: function(response){
            // TODO display resend again
            console.log(response);
        }
    });

    return false;
}
