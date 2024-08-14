;(function($){
    "use strict";
    
    jQuery('p:empty').remove();


    /* ====================================== 
        Xgenious New js Start
    ======================================== */
    $(document).ready(function () {
        /*
        ========================================
            Faq accordion
        ========================================
        */
        // $(document).on('click', '.faqContents__item__left', function(e) {
        //     let element = $(this).closest('.faqContents__item');
        //     if (element.hasClass('open')) {
        //         element.removeClass('open');
        //         element.find('.faqContents__item__contents').removeClass('open');
        //         element.find('.faqContents__item__contents').slideUp(300);
        //     } else {
        //         element.addClass('open');
        //         element.children('.faqContents__item__contents').slideDown(300);
        //         element.siblings('.faqContents__item').children('.faqContents__item__contents').slideUp(300);
        //         element.siblings('.faqContents__item').removeClass('open');
        //         element.siblings('.faqContents__item').find('.faqContents__item__left').removeClass('open');
        //         element.siblings('.faqContents__item').find('.faqContents__item__contents').slideUp(300);
        //     }
        // });
    });


    /* ====================================== 
        Xgenious New js End
    ======================================== */
    
    /*------------------------------
    * Latest Product Hover
    * ----------------------------*/
    $(document).ready(function () {
        $(document).on('click','#job_apply_button',function(e){
            e.preventDefault();
            $(this).hide();
            $('#job_apply_form_wrapper').addClass('show');
        })
    });

    /*
    ========================================
        Global Slider Init
    ========================================
    */
    var globalSlickInit = $('.global-slick-init');
    if (globalSlickInit.length > 0) {
        //todo have to check slider item
        $.each(globalSlickInit, function(index, value) {
            if ($(this).children('div').length > 1) {
                //todo configure slider settings object
                var sliderSettings = {};
                var allData = $(this).data();
                var infinite = typeof allData.infinite == 'undefined' ? false : allData.infinite;
                var arrows = typeof allData.arrows == 'undefined' ? false : allData.arrows;
                var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                var focusOnSelect = typeof allData.focusonselect == 'undefined' ? false : allData.focusonselect;
                var swipeToSlide = typeof allData.swipetoslide == 'undefined' ? false : allData.swipetoslide;
                var slidesToShow = typeof allData.slidestoshow == 'undefined' ? 1 : allData.slidestoshow;
                var slidesToScroll = typeof allData.slidestoscroll == 'undefined' ? 1 : allData.slidestoscroll;
                var speed = typeof allData.speed == 'undefined' ? '500' : allData.speed;
                var dots = typeof allData.dots == 'undefined' ? false : allData.dots;
                var cssEase = typeof allData.cssease == 'undefined' ? 'linear' : allData.cssease;
                var prevArrow = typeof allData.prevarrow == 'undefined' ? '' : allData.prevarrow;
                var nextArrow = typeof allData.nextarrow == 'undefined' ? '' : allData.nextarrow;
                var centerMode = typeof allData.centermode == 'undefined' ? false : allData.centermode;
                var centerPadding = typeof allData.centerpadding == 'undefined' ? false : allData.centerpadding;
                var rows = typeof allData.rows == 'undefined' ? 1 : parseInt(allData.rows);
                var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                var autoplaySpeed = typeof allData.autoplayspeed == 'undefined' ? 2000 : parseInt(allData.autoplayspeed);
                var lazyLoad = typeof allData.lazyload == 'undefined' ? false : allData.lazyload; // have to remove it from settings object if it undefined
                var appendDots = typeof allData.appenddots == 'undefined' ? false : allData.appenddots;
                var appendArrows = typeof allData.appendarrows == 'undefined' ? false : allData.appendarrows;
                var asNavFor = typeof allData.asnavfor == 'undefined' ? false : allData.asnavfor;
                var verticalSwiping = typeof allData.verticalswiping == 'undefined' ? false : allData.verticalswiping;
                var vertical = typeof allData.vertical == 'undefined' ? false : allData.vertical;
                var fade = typeof allData.fade == 'undefined' ? false : allData.fade;
                var rtl = typeof allData.rtl == 'undefined' ? false : allData.rtl;
                var responsive = typeof $(this).data('responsive') == 'undefined' ? false : $(this).data('responsive');
                //slider settings object setup
                sliderSettings.infinite = infinite;
                sliderSettings.arrows = arrows;
                sliderSettings.autoplay = autoplay;
                sliderSettings.focusOnSelect = focusOnSelect;
                sliderSettings.swipeToSlide = swipeToSlide;
                sliderSettings.slidesToShow = slidesToShow;
                sliderSettings.slidesToScroll = slidesToScroll;
                sliderSettings.speed = speed;
                sliderSettings.dots = dots;
                sliderSettings.cssEase = cssEase;
                sliderSettings.prevArrow = prevArrow;
                sliderSettings.nextArrow = nextArrow;
                sliderSettings.rows = rows;
                sliderSettings.autoplaySpeed = autoplaySpeed;
                sliderSettings.autoplay = autoplay;
                sliderSettings.verticalSwiping = verticalSwiping;
                sliderSettings.vertical = vertical;
                sliderSettings.rtl = rtl;
                if (centerMode != false) {
                    sliderSettings.centerMode = centerMode;
                }
                if (centerPadding != false) {
                    sliderSettings.centerPadding = centerPadding;
                }
                if (lazyLoad != false) {
                    sliderSettings.lazyLoad = lazyLoad;
                }
                if (appendDots != false) {
                    sliderSettings.appendDots = appendDots;
                }
                if (appendArrows != false) {
                    sliderSettings.appendArrows = appendArrows;
                }
                if (asNavFor != false) {
                    sliderSettings.asNavFor = asNavFor;
                }
                if (fade != false) {
                    sliderSettings.fade = fade;
                }
                if (responsive != false) {
                    sliderSettings.responsive = responsive;
                }
                $(this).slick(sliderSettings);
            }
        });
    }

    /*
        ========================================
            scroll, click and item change Js
        ========================================
        */
    const leftItems = document.querySelectorAll('.works__left__item');
    const rightItems = document.querySelectorAll('.works__right__item');
    const sectionScroll = document.querySelector('.worksScrollingWrapper');

    let currentScrollIndex = 0;

    function updateActiveItem() {
        leftItems.forEach((item) => {
            item.classList.remove('active');
        });
        rightItems.forEach((item) => {
            item.classList.remove('active');
        });

        leftItems[currentScrollIndex].classList.add('active');
        rightItems[currentScrollIndex].classList.add('active');
    }

    if (sectionScroll != null) {
        sectionScroll.addEventListener('wheel', (event) => {
            // Calculate the direction of the scroll
            const directionScroll = event.deltaY > 0 ? 1 : -1;

            currentScrollIndex += directionScroll;

            if (currentScrollIndex < 0) {
                currentScrollIndex = 0;
            } else if (currentScrollIndex >= leftItems.length) {
                currentScrollIndex = leftItems.length - 1;
            }

            updateActiveItem();

            if (currentScrollIndex > 0 && currentScrollIndex < leftItems.length - 1) {
                event.preventDefault();
            }
        });

        leftItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentScrollIndex = index;
                updateActiveItem();
            });
        });

    }

    /*
    ========================================
        scroll and class add js
    ========================================
    */
    $(window).on("scroll", function() {
        function isElementInViewport(elem, offset = 0) {
            if(elem == null){
                return;
            }
            let scrollTop = $(window).scrollTop();
            let elementTop = $(elem) !== undefined ? $(elem).offset()?.top : 0;
            let elementBottom = elementTop + $(elem).outerHeight();
            return elementBottom - offset >= scrollTop && elementTop <= scrollTop + $(window).height();
        }
        let targetSection = ".worksScrollingWrapper";
        let offsetValue = 200;

        if (isElementInViewport(targetSection, offsetValue)) {
            $(targetSection).addClass("full_height");
        } else {
            $(targetSection).removeClass("full_height");
        }
    });
    $(window).trigger("scroll");

    /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
    $(window).on( 'elementor/frontend/init' ,function(){
        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function($scope, $){
            activeTestimonialSliderOne();
            initOurTime();
            initVisitorTime();
        });
    });


    /*----------------------------
    * Testimonial Slider
    * --------------------------*/
    function activeTestimonialSliderOne() {
        var testimonialOneSliderthree = $('.testimonial-carousel');
        if (testimonialOneSliderthree.length < 1){
            return;
        }
        $.each(testimonialOneSliderthree,function (index,value) {
            let el = $(this);
            let $selector = $('#'+el.attr('id'));
            let loop = el.data('loop');
            let items = el.data('items');
            let autoplay =  el.data('autoplay');
            let margin =  el.data('margin');
            let dots =   el.data('dots');
            let nav =  false;
            let autoplaytimeout =  el.data('autoplaytimeout');
            let responsive =  {
                0: {
                    items: 1
                },
                460: {
                    items: 1
                },
                599: {
                    items: 1
                },
                768: {
                    items: 1
                },
                960: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1920: {
                    items: items
                }
            };

            var sliderSettings = {
                "items": items,
                "loop": loop,
                "dots": dots,
                "margin": margin,
                "autoplay": autoplay,
                "autoPlayTimeout": autoplaytimeout,
                "nav": nav,
                "navtext": ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],

            };

            wowCarouselInit($selector,sliderSettings,responsive,'fadeIn','fadeOut');

        });
    }


    //owl init function
    function wowCarouselInit($selector,sliderSettings,responsive,animateIn=false,animateOut=false){
        $( $selector).owlCarousel({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText : sliderSettings.navtext,
            animateIn :animateIn,
            animateOut :animateOut,
            responsive: responsive,
            smartSpeed: 2000
        });
    }
    function wowCarouselInitWidthStagePadding($selector,sliderSettings,responsive,animateIn=false,animateOut=false){
        $( $selector).owlCarousel({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText : sliderSettings.navtext,
            animateIn :animateIn,
            animateOut :animateOut,
            responsive: responsive,
            center: sliderSettings.center,
            stagePadding:100,
            smartSpeed: 2000
        });
    }
    function initOurTime() {
        if (!$('#our_time').length){return}
        renderTime('our_time');
    }
    function initVisitorTime() {
        if (!$('#visitor_time').length){return}
        renderLocalTime('visitor_time');
    }
    function renderTime(selector){
        var bdTime = new Date().toLocaleString("en-US", {timeZone: "asia/dhaka"});
        var currentTime = new Date(bdTime);
        var diem = "AM";

        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if(h == 0){
            h = 12;
        }else if(h > 12){
            h = h - 12;
            diem = "PM"
        }
        if(h < 10){
            h = "0" + h;
        }
        if(m < 10){
            m = "0" + m;
        }
        if(s < 10){
            s = "0" + s;
        }
        var myClock = document.getElementById(selector);
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        setTimeout(function (){
            renderTime(selector)
        }, 1000);
    }
 function renderLocalTime(selector){
        var currentTime = new Date();
        var diem = "AM";
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if(h == 0){
            h = 12;
        }else if(h > 12){
            h = h - 12;
            diem = "PM"
        }
        if(h < 10){
            h = "0" + h;
        }
        if(m < 10){
            m = "0" + m;
        }
        if(s < 10){
            s = "0" + s;
        }
        var myClock = document.getElementById(selector);
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        setTimeout(function (){
            renderTime(selector)
        }, 1000);
    }


    $(document).ready(function(){

     /*------------------------------
       counter section activation
     -------------------------------*/
        var counternumber = $('.count-num');
        counternumber.counterUp({
            delay: 20,
            time: 3000
        });
        /**
         * Wedocs toggle
         * @since 1.0.5
         */
        $(document).on('click','.wedocs-single-wrap .wedocs-sidebar ul.doc-nav-list li.page_item_has_children > a',function (e){
            e.preventDefault();
            var el = $(this).parent();
            if (el.hasClass('wd-state-open')){
               el.removeClass('wd-state-open').addClass('wd-state-closed');
            }else{
                el.addClass('wd-state-open').removeClass('wd-state-closed');
            }
        });

        /**
        * weDocs Form auto complete
         * @since 1.0.5
        * */
        /* ----------------------------------------
        *  Single page search
        * -------------------------------------- */
        $(document).on('focus','.weDocsSearchFormSinglePage input[name="q"]',function (e){
            $('.weDocs-single-form-backdrop').addClass('show');
        });

        $(document).on('click','.weDocsSearchFormSinglePage .close',function (e){
            $('.weDocsSearchFormSinglePage input[name="q"]').val('');
            $('.weDocs-single-form-backdrop').removeClass('show');
            $('.weDocsSearchFormSinglePage .close').removeClass('show');
            $('.wedoc-single-page-search-wrap').find('.ajax-search-wrap').removeClass('show');
            $('.wedoc-single-page-search-wrap').find('.ajax-search-wrap').html('');
        });

        $(document).on('click','.weDocs-single-form-backdrop',function (e){
            $('.weDocs-single-form-backdrop').removeClass('show');
            if ($('.weDocsSearchFormSinglePage input[name="q"]').val().length <1){
                $('.wedoc-single-page-search-wrap').find('.ajax-search-wrap').removeClass('show');
                $('.wedoc-single-page-search-wrap').find('.ajax-search-wrap').html('');
            }
        });

        $(document).on('keyup','.weDocsSearchFormSinglePage input[name="q"]',function (e){
            var el = $(this);
            var qValue = el.val();
            var parentId = $('input[name="doc_parent_id"]').val();
            var mesContainer = $('.wedoc-single-page-search-wrap').find('.ajax-search-wrap');
            var closeBtnWrap =  $('.wedoc-single-page-search-wrap .close');

            $('.weDocs-single-form-backdrop').addClass('show');
            closeBtnWrap.addClass('show');
            if (qValue.length){
                mesContainer.html('<span>searching please wait...</span>');
                mesContainer.addClass('show');

                    $.ajax({
                        type : 'POST',
                        url: xgObj.ajaxUrl,
                        data:{
                            action : 'wedoc_single_search_form_ajax',
                            q : qValue,
                            parent_id : parentId,
                        },
                        success: function (data){
                            // console.log(data)
                            if (data){
                                mesContainer.html(data);
                            }else{
                                mesContainer.html('<span class="text-danger">Nothing Found</span>');
                            }
                        },
                        error:function (error){
                        }
                    })

            }
        });



        /* ----------------------------------
        *   Doc Page Search
        * --------------------------------- */

        $(document).on('focus','.weDocsSearchForm input[name="q"]',function (e){
            $('.weDocs-form-backdrop').addClass('show');
        });
        $(document).on('click','.weDocsSearchForm .close',function (e){
            $('.weDocsSearchForm input[name="q"]').val('');
            $('.weDocs-form-backdrop').removeClass('show');
            $('.weDocsSearchForm .close').removeClass('show');
            $('.weDocs-search-form-wrapper').find('.ajax-search-wrap').removeClass('show');
        });
        $(document).on('click','.weDocs-form-backdrop',function (e){
            $('.weDocs-form-backdrop').removeClass('show');
            if ($('.weDocsSearchForm input[name="q"]').val().length <1){
                $('.weDocs-search-form-wrapper').find('.ajax-search-wrap').removeClass('show');
            }
        });

        $(document).on('keyup','.weDocsSearchForm input[name="q"]',function (e){
            var el = $(this);
            var qValue = el.val();
            var mesContainer = $('.weDocs-search-form-wrapper').find('.ajax-search-wrap');
            var closeBtnWrap =  $('.weDocs-search-form-wrapper .close');

            $('.weDocs-form-backdrop').addClass('show');
            closeBtnWrap.addClass('show');
            if (qValue.length){
                mesContainer.html('<span>searching please wait...</span>');
                mesContainer.addClass('show');
                wedocAjaxCall(qValue);
            }
        });


    function wedocAjaxCall($q){
        var mesContainer = $('.weDocs-search-form-wrapper').find('.ajax-search-wrap');
        $.ajax({
            type : 'POST',
            url: xgObj.ajaxUrl,
            data:{
                action : 'wedoc_search_form_ajax',
                q : $q
            },
            success: function (data){
                if (data){
                    mesContainer.html(data);
                }else{
                    mesContainer.html('<span class="text-danger">Nothing Found</span>');
                }
            },
            error:function (error){
            }
        })
    }
    /*---------------------------------
    * Magnific Popup
    * --------------------------------*/
        // $('.video-play-btn,.play-video-btn').magnificPopup({
        //     type: 'video'
        // });

    });

})(jQuery);