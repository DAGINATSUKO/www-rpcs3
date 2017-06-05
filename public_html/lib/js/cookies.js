$(document).ready(function() {
    function cookie_ANNOUNCE() {
        days = 30;
        myDate = new Date();
        myDate.setTime(myDate.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = 'cookie_ANNOUNCE=Accepted; expires=' + myDate.toGMTString();
    }
    var cookie = document.cookie.split(';')
        .map(function(x) {
            return x.trim().split('=');
        })
        .filter(function(x) {
            return x[0] === 'cookie_ANNOUNCE';
        })
        .pop();
    if (cookie && cookie[1] === 'Accepted') {
        $(".cookie_ANNOUNCE").hide();
    }
    $('.accept_ANNOUNCE').on('click', function() {
        cookie_ANNOUNCE();
        return false;
    });
    $(document).ready(function() {
        $(".accept_ANNOUNCE").click(function() {
            $(".cookie_ANNOUNCE").fadeOut(288);
        });
    });
});