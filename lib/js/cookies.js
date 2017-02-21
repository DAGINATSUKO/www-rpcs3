$(document).ready(function() {
    function cookie_DISCLAIMER() {
        days = 30;
        myDate = new Date();
        myDate.setTime(myDate.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = 'cookie_DISCLAIMER=Accepted; expires=' + myDate.toGMTString();
    }
    var cookie = document.cookie.split(';')
        .map(function(x) {
            return x.trim().split('=');
        })
        .filter(function(x) {
            return x[0] === 'cookie_DISCLAIMER';
        })
        .pop();
    if (cookie && cookie[1] === 'Accepted') {
        $(".cookie_DISCLAIMER").hide();
    }
    $('.accept_DISCLAIMER').on('click', function() {
        cookie_DISCLAIMER();
        return false;
    });
    $(document).ready(function() {
        $(".accept_DISCLAIMER").click(function() {
            $(".cookie_DISCLAIMER").fadeOut(288);
        });
    });
});