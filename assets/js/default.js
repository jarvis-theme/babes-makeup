define(['jquery','fancybox','flexslider','carousel','bootstrap','modernizr'], function($,fancybox,flexslider,owlCarousel)
{
    return new function(){
        var self = this;
        self.run = function(){
            $(window).load(function() {
                // BIG SLIDER
                $('#bg-slider .flexslider').flexslider({
                    animation: "slide",
                    directionNav: true,
                    controlNav: false,
                    prevText: "",
                    nextText: ""
                });

                $('#testimonial .flexslider').flexslider({
                    animation: "slide",
                    directionNav: true,
                    controlNav: false,
                    prevText: "",
                    nextText: ""
                });

                $('.fancybox').fancybox({
                    padding: 10,
                    openEffect : 'elastic',
                    openSpeed  : 150,
                    closeEffect : 'elastic',
                    closeSpeed  : 150
                });
                
                $('.qtyplus').click(function(e){
                    // Stop acting like a button
                    e.preventDefault();
                    // Get the field name
                    fieldName = $(this).attr('field');
                    // Get its current value
                    var currentVal = parseInt($('input[name='+fieldName+']').val());
                    // If is not undefined
                    if (!isNaN(currentVal)) {
                        // Increment
                        $('input[name='+fieldName+']').val(currentVal + 1);
                    } else {
                        // Otherwise put a 0 there
                        $('input[name='+fieldName+']').val(0);
                    }
                });

                // This button will decrement the value till 0
                $(".qtyminus").click(function(e) {
                    // Stop acting like a button
                    e.preventDefault();
                    // Get the field name
                    fieldName = $(this).attr('field');
                    // Get its current value
                    var currentVal = parseInt($('input[name='+fieldName+']').val());
                    // If it isn't undefined or its greater than 0
                    if (!isNaN(currentVal) && currentVal > 0) {
                        // Decrement one
                        $('input[name='+fieldName+']').val(currentVal - 1);
                    } else {
                        // Otherwise put a 0 there
                        $('input[name='+fieldName+']').val(0);
                    }
                });

                // FANCYBOX THUMB LIST
                $('#thumb-list').owlCarousel({
                    itemsCustom : [
                        [350, 2],
                        [350, 3],
                        [600, 4],
                        [700, 4],
                        [1000, 4],
                        [1200, 3],
                        [1400, 3]
                    ],
                    navigation : true,
                    pagination: false,
                    navigationText: false
                });
                
                resize();
            });

            $(document).ready(function() {
                $('footer h4.title').click(function() {
                    $(this).toggleClass('active');
                    $(this).next().slideToggle(250);
                });
            });
        };
        
        var resize = function(){
            var windowWidth = $(window).width();
            var windowHeight = $(window).height();
            
            // STICKY FOOTER
            var footerHeight = $('footer').outerHeight();
            var footerTop = (footerHeight) * -1
            $('footer').css({marginTop: footerTop});
            $('#main-wrapper').css({paddingBottom: footerHeight});
        };
    }
});