(function($){
    "use strict";

    $(document).ready(function () {
        /*
        ========================================
            Faq accordion
        ========================================
        */
        $(document).on('click', '.faqContents__item__left', function(e) {
            let element = $(this).closest('.faqContents__item');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('.faqContents__item__contents').removeClass('open');
                element.find('.faqContents__item__contents').slideUp(300);
            } else {
                element.addClass('open');
                element.children('.faqContents__item__contents').slideDown(300);
                element.siblings('.faqContents__item').children('.faqContents__item__contents').slideUp(300);
                element.siblings('.faqContents__item').removeClass('open');
                element.siblings('.faqContents__item').find('.faqContents__item__left').removeClass('open');
                element.siblings('.faqContents__item').find('.faqContents__item__contents').slideUp(300);
            }
        });

        /* 
        ========================================
            Mouse Scroll and slide js 
        ========================================
        */
        const scrollContainer = document.querySelector('.scroll-container');
        let isDragging = false;
        let startX, scrollLeft;
        const handleStart = (e) => {
            isDragging = true;
            startX = (e.touches ? e.touches[0].pageX : e.pageX) - scrollContainer.offsetLeft;
            scrollLeft = scrollContainer.scrollLeft;
        };
        const handleMove = (e) => {
            if (!isDragging) return;
            const horizontal = (e.touches ? e.touches[0].pageX : e.pageX) - scrollContainer.offsetLeft;
            const horizontalMove = (horizontal - startX) * 2;
            scrollContainer.scrollLeft = scrollLeft - horizontalMove;
        };
        const handleEnd = () => {
            isDragging = false;
        };

        if(scrollContainer != null) {
            scrollContainer.addEventListener('mousedown', handleStart);
            scrollContainer.addEventListener('touchstart', handleStart);
            scrollContainer.addEventListener('mousemove', handleMove);
            scrollContainer.addEventListener('touchmove', handleMove);
            scrollContainer.addEventListener('mouseup', handleEnd);
            scrollContainer.addEventListener('touchend', handleEnd);
            scrollContainer.addEventListener('mouseleave', handleEnd);
        }
        if(scrollContainer != null) {
            scrollContainer.addEventListener('wheel', (e) => {
                const scrollSpeedMultiplier = 4;
                scrollContainer.scrollLeft += e.deltaY * scrollSpeedMultiplier;
    
                e.preventDefault();
            });
        }

        /* 
        ========================================
            Contact Form Focus Js
        ========================================
        */
        $(document).on('focusin', '.contactForm__item .form-control', (e) => {
            e.preventDefault();
            const $focusedInput = $(e.currentTarget);
        
            $focusedInput.closest('.contactForm__item').addClass('focused');
        });
        
        $(document).on('focusout', '.contactForm__item .form-control', (e) => {
            e.preventDefault();
            const $blurredInput = $(e.currentTarget);
        
            $blurredInput.closest('.contactForm__item').removeClass('focused');
        });
        




        /* 
        ========================================
            Tab
        ========================================
        */
        $(document).on('click', 'ul.tabs li', (e) => {
            e.preventDefault();
        
            const $clickedTab = $(e.currentTarget);
            const tabId = $clickedTab.data('tab');
        
            $('ul.tabs li').removeClass('active');
            $('.tab-content-item').removeClass('active');
        
            $clickedTab.addClass('active');
            $("#" + tabId).addClass('active');
        });
        
        /*
        ========================================
            counter Odometer
        ========================================
        */
        $(".singleCounter__count").each(function() {
            $(this).isInViewport(function(status) {
                if (status === "entered") {
                    for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                        var el = document.querySelectorAll('.odometer')[i];
                        el.innerHTML = el.getAttribute("data-odometer");
                    }
                }
            });
        });


        
    });

})(jQuery);
