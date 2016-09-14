/**
 * jQuery Plugin to obtain touch gestures from  mobile device
 * Common usage: wipe images (left and right to show the previous or next image)
 *
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @modifyed hoho (http://www.thinkcart.net)
 */
(function($) {
    $.fn.touchwipe = function(settings) {
        var config = {
            min_move_x: 20,
            min_move_y: 20,
            wipeLeft: function() { return null; },
            wipeRight: function() { return null; },
            wipeUp: function() { return null; },
            wipeDown: function() { return null; },
            wipeEnd: function(){ },
            preventDefaultEvents: true
        };

        if (settings) $.extend(config, settings);

        this.each(function() {
            var startX;
            var startY;
            var isMoving = false;

            function cancelTouch() {
                this.removeEventListener('touchmove', onTouchMove);
                startX = null;
                isMoving = false;
            }

            function onTouchMove(e) {
                if(isMoving) {
                    var x = e.touches[0].pageX;
                    var y = e.touches[0].pageY;
                    var dx = startX - x;
                    var dy = startY - y;
                    if(Math.abs(dx) >= config.min_move_x) {
                        cancelTouch();
                        if(dx > 0) {
                            var result = config.wipeLeft();
                        } else {
                            var result = config.wipeRight();
                        }
                    }else if(Math.abs(dy) >= config.min_move_y) {
                        cancelTouch();
                        if(dy > 0) {
                            var result = config.wipeUp();
                        } else {
                            var result = config.wipeDown();
                        }
                    }
                    if(config.preventDefaultEvents) {
                        if(result !== null) e.preventDefault();
                    }
                    config.wipeEnd();
                }
            }

            function onTouchStart(e){
                if (e.touches.length == 1) {
                    startX = e.touches[0].pageX;
                    startY = e.touches[0].pageY;
                    isMoving = true;
                    this.addEventListener('touchmove', onTouchMove, false);
                }
            }

            if ('ontouchstart' in document.documentElement) {
                this.addEventListener('touchstart', onTouchStart, false);
            }
        });

        return this;
   };

 })(jQuery);