function checkTimezone() {
    if (!app.cookie.has("visitor-timezone")) {
        let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        app.cookie.set("visitor-timezone", timezone, 7);
    }
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

        // app.http.get('/api/product/1').then(function(res) {
        //     console.log(res);
        //     app.toast('Product ' + res.json.name + ' received').show(3000);
        // }).catch((resp) => {
        //     app.toast('XHR error on ' + resp.status.code + ' ' + resp.status.text).show(3000);
        // }).finally(() => {
        //     app.toast('XHR request completed!').show(3000);
        // });

    }); // end of document ready
})(jQuery); // end of jQuery name space