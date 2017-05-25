$(function() {
    $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

new Vue({
    el: '#vue-app',
    data: {
        name: 'roro'
    }
});


new Vue({
    el: 'submit_template',
    methods: {
        say: function (message) {
            alert(message)
        }
    }
})

var example1 = new Vue({
    el: '#example-1',
    data: {
        counter: 0
    }
});