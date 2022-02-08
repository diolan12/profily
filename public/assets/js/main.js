document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.scrollspy');
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
    var scrollSpy = M.ScrollSpy.init(elems, options);

    var elems = document.querySelectorAll('.slider');
    var slider = M.Slider.init(elems, options);
});
(function($) {
    $(function() {
        M.AutoInit();
        // $('.slider').slider();
    }); // end of document ready
})(jQuery); // end of jQuery name space