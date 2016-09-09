var $j = jQuery.noConflict();
(function($j) {
    $j(document).ready(function() {

        $j('body').append('<div id="blackout"></div>');

        var boxWidth = 500;

        function centerBox() {


            var winWidth = $j(window).width();

            var winHeight = $j(document).height();
            var scrollPos = $j(window).scrollTop();


            var disWidth = (winWidth - boxWidth) / 2
            var disHeight = scrollPos + 5;

            $j('.popup-box').css({'width' : boxWidth+'px', 'left' : disWidth+'px', 'top' : disHeight+'px'});
            $j('#blackout').css({'width' : winWidth+'px', 'height' : winHeight+'px'});

            return false;
        }
        $j(window).resize(centerBox);
        $j(window).scroll(centerBox);
        centerBox();
        $j('[class*=popup-link]').click(function(e) {

            e.preventDefault();
            e.stopPropagation();

            var name = $j(this).attr('class');
            var id = name[name.length - 1];
            var scrollPos = $j(window).scrollTop();

            $j('#popup-box-'+id).show();
            $j('#blackout').show();
            $j('html,body').css('overflow', 'hidden');

            $j('html').scrollTop(scrollPos);
        });

        $j('[class*=popup-box]').click(function(e) {

            e.stopPropagation();
        });
        $j('html').click(function() {
            var scrollPos = $j(window).scrollTop();

            $j('[id^=popup-box-]').hide();
            $j('#blackout').hide();
            $j("html,body").css("overflow","auto");
            $j('html').scrollTop(scrollPos);
        });
        $j('.close').click(function() {
            var scrollPos = $j(window).scrollTop();

            $j('[id^=popup-box-]').hide();
            $j('#blackout').hide();
            $j("html,body").css("overflow","auto");
            $j('html').scrollTop(scrollPos);
        });
    });
}) ($j);
