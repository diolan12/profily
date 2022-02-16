function checkTimezone() {
    let timezone = getCookie("visitor-timezone");
    if (timezone == null) {
        timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        setCookie("visitor-timezone", timezone, 7);
    }
}

function deleteToast() {
    let current = window.location.href.split("?")[0];
    replaceState(current);
}

document.addEventListener('DOMContentLoaded', function() {
    var elemScrollspy = document.querySelectorAll('.scrollspy');
    var activateds = document.querySelectorAll('.activated');
    var options = {
        throttle: 50,
        scrollOffset: 64,
        getActiveElement: function(id) {
            activateds.forEach(function(el) {
                el.classList.remove('active');
                // console.log(el);
            })

            // console.log(id);
            return 'a[scroll="' + id + '"]';
        },
        activeClass: 'active'
    };
    var scrollSpy = M.ScrollSpy.init(elemScrollspy, options);

    var elemSlider = document.querySelectorAll('.slider');
    var slider = M.Slider.init(elemSlider, options);
});
(function($) {
    $(function() {
        M.AutoInit();

        // set client timezone
        checkTimezone();
        deleteToast();

        // $('.slider').slider();
    }); // end of document ready
})(jQuery); // end of jQuery name space