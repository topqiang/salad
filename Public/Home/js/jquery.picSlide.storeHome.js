/*******************************************/
/**      http://www.thinkcart.net        **/
/******************************************/

(function($){
    $.fn.extend({
        picSlide:function(options){
            var defaults={
                'auto' : true,
                'time' : 5000,
                'maxWidth' : '100%',
                'imgWrap' : '.swipe ul',
                'imgBox' : '.swipe-wrap li',
                'tabTag' : '.position li',
                'tabClass' : 'cur'
            }
            var options=$.extend(defaults,options);
            return this.each(function(){
                var imgBox = $(this).find(options.imgBox);
                var imgWrap = $(this).find(options.imgWrap);
                var size = imgBox.size();
                var winWidth,eachWidth;
                var setWidth = function(){
                    winWidth = $(window).width();
                    eachWidth = winWidth > options.maxWidth ? options.maxWidth : winWidth;
                    imgBox.width( eachWidth );
                    var width = size * eachWidth;
                    imgWrap.width( width );
                }
                setWidth();
                $(window).resize(function(){
                    setWidth();
                });
                var currentIndex = 0;
                var tab = $(this).find(options.tabTag);
                tab.eq(currentIndex).addClass(options.tabClass);
				var leftpx=0;
                var slide = function(){
                    var scrollLeft = -eachWidth*currentIndex;
					imgWrap.animate({'margin-left':scrollLeft},500);
					tab.removeClass(options.tabClass).eq(currentIndex).addClass(options.tabClass);
                }
                if(options.auto == true){
                    var autoScrollHandler;
                    var autoScroll = function(){
                        currentIndex++;
                        if(currentIndex == size) currentIndex = 0;
                        slide();
                        autoScrollHandler = setTimeout(function(){
                            autoScroll();
                        },options.time);
                    };
                    autoScrollHandler = setTimeout(function(){
                        autoScroll();
                    },options.time);
                }
               $(this).touchwipe({
                    wipeLeft:function(){
                        if(currentIndex == size-1) currentIndex=-1;
                        currentIndex++;
                        slide();
                    },
                    wipeRight:function(){
                        if(currentIndex == 0) currentIndex=size;
                        currentIndex--;
                        slide();
                    },
                    wipeEnd:function(){
                        if(options.auto == true){
                            clearTimeout(autoScrollHandler);
                            autoScrollHandler = setTimeout(function(){
                                autoScroll();
                            },options.time);
                        }
                    }
                });
            });
        }
    });
})(jQuery);