/**
 * Created by glalex on 12.07.2017.
 */

"use strict";


//кнопка скролла вверх
function backToTop() {
    $(window).scroll(function () {
        var bo = $(document).scrollTop();
        var time_to_show = 600;	//$("#indeficator_toshow").offset().top;

        if (bo >= time_to_show) {
            $(".back-to-top").addClass("back-to-top-visible");
        }
        else {
            $(".back-to-top").removeClass("back-to-top-visible");
        }
    });
    $(".back-to-top").click(function (e) {
        e.preventDefault();
        $("html, body").animate({scrollTop: 0}, 1100);
    });
}

backToTop();

// toggleText
jQuery.fn.extend({
    toggleText: function (a, b) {
        var that = this;
        if (that.text() != a && that.text() != b) {
            that.text(a);
        } else if (that.text() == a) {
            that.text(b);
        } else if (that.text() == b) {
            that.text(a);
        }
        return this;
    }
});

// start of: determine is it mobile screen
var mobileViewWidth = 768,
    isMobileViewFlag = true;

function resizeWindowHandler(event) {
    if (window.innerWidth < mobileViewWidth) {
        isMobileViewFlag = true;
    } else {
        isMobileViewFlag = false;
    }
}

resizeWindowHandler(); // initial call
window.addEventListener('resize', resizeWindowHandler);
// end of: determine is it mobile screen

$(function () {
    var html = document.documentElement,
        body = document.body;

    var searchBtnStatus = 0,
        searchContainerInput = $(".search-container .input-container input")[0],
        searchBtn = $(".search-container .search-btn")[0];

    var mainMenu = $("header .main-menu"),
        mainMenuItems = $("header .main-menu .menu-item"),
        header = $("header"),
        headerMenuBtn = $("header .menu-btn"),
        headerMenuBtnState = 0;

    var tempScrollTop = 0,
        currentScrollTop = 0,
        referTopPoint = 80,
        distanceTop,
        firstPageLoadFlag = true;

    // distanceTop = html.scrollTop || body && body.scrollTop || 0;
    // distanceTop -= html.clientTop; // в IE7- <html> смещён относительно (0,0)

    var pagesList = ["index", "service", "portfolio", "blog", "company", "contacts"];


    // ***************************************************
    determineActivePage();
    scrollMenuHandler();
    // showMenu();
    resizeWindowHandler(); // initial call!!!
    // ***************************************************


    // **************************       FUNCTIONS       ***************************************************
    
    function determineActivePage() {
        var currentLocation = window.location.href,
            status = false;

        for (var i = 0; i < pagesList.length; i++) {
            if (currentLocation.indexOf(pagesList[i]) != -1) {
                $("header .main-menu .menu-item.active").removeClass("active");
                $(mainMenuItems[i]).addClass("active");
                status = true;
                break;
            }
        }

        // if page is out of list - suppose - index
        if (!status) {
            $(mainMenuItems[0]).addClass("active");
        }

    }

    function hideMenu (){
        if (distanceTop > referTopPoint){
            if ($(header).hasClass("header-hidden")){
                $(header).removeClass("header-visible");
            }
            else {
                $(header).addClass("header-hidden");
            }
        }
    }

    function showMenu(){
        if (distanceTop > referTopPoint){
            if( !($(header).hasClass("header-visible")) ){
                $(header).removeClass("header-hidden");
                $(header).addClass("header-visible");
                $(header).addClass("header-darkness");
            }
        }
        else {
            $(header).removeClass("header-darkness");
            setTimeout(function(){
                $(header).removeClass("header-hidden header-visible");
            }, 100);
        }
    }

    // *******************************         END OF FUNCTIONS       ************************************


    // *****************    EVENT HANDLERS    *******************

    function resizeWindowHandler(event) {
        if (window.innerWidth < 1101) {
            // $(mainMenu).css("display", "none");
            headerMenuOff();
        } else {
            $(mainMenu).css("display", "inline-block");
        }

        if (window.innerWidth < mobileViewWidth) {
            referTopPoint = 40;
        } else {
            referTopPoint = 80;
        }
    }

    function scrollMenuHandler(event) {
        distanceTop = html.scrollTop || body && body.scrollTop || 0;
        distanceTop -= html.clientTop; // в IE7- <html> смещён относительно (0,0)
        currentScrollTop = window.pageYOffset;

        if (!firstPageLoadFlag) {
            // check if mobile header is not active (not opened list)
            if( !$(header).hasClass("active")) {
                if (currentScrollTop > tempScrollTop) {//scroll down
                    hideMenu();
                }
                else if (currentScrollTop < tempScrollTop) {//scroll top
                    showMenu();
                    // default_style();
                }
            }
        }
        else {
            firstPageLoadFlag = false;
            showMenu();
        }
        // console.log("currentScrollTop", currentScrollTop);

        tempScrollTop = currentScrollTop;
    }

    // ***************** REGISTER EVENT HANDLERS *******************

    window.addEventListener('resize', resizeWindowHandler);
    window.addEventListener('scroll', scrollMenuHandler);

    // **************************************************

    // add target="_blank" for all anchors
    // $("a:not(.menu-item)").attr("target", "_blank");

    function headerMenuOn() {
        $(headerMenuBtn).addClass("menu-btn-active");
        $(mainMenu).slideDown();
        $(header).addClass("active");
        $(header).addClass("header-black");
        $("html, body").addClass("scroll-lock");
    }

    function headerMenuOff() {
        $(headerMenuBtn).removeClass("menu-btn-active");
        $(mainMenu).slideUp();
        $(header).removeClass("active");
        $(header).removeClass("header-black");
        $("html, body").removeClass("scroll-lock");
    }

    // start of mobile-menu show/hide
    $(headerMenuBtn).on("click", function () {
        // $(this).toggleClass("menu-btn-active");
        // // $("mainMenu").toggleClass("show-menu");
        // $(mainMenu).slideToggle();
        // $(header).toggleClass("active");
        // $(header).toggleClass("header-black");
        // $("html, body").toggleClass("scroll-lock");

        if (headerMenuBtnState) {
            headerMenuBtnState = 0;
            headerMenuOff();
        } else {
            headerMenuBtnState = 1;
            headerMenuOn();
        }
    });
    // end of mobile-menu show/hide

    $(searchBtn).on("click", function (event) {
        if (!searchBtnStatus) {
            event.preventDefault();
            // searchContainerInput.setAttribute("autofocus", "autofocus");
            $(searchContainerInput).addClass("active").fadeIn(400);
            searchBtnStatus = 1;
        }
        else {
            if(searchContainerInput.value.length) {
                //event.preventDefault();
                //location.href = "/search-result.html";
                // console.log(location.href);
            }
            // searchBtnStatus = 0;
        }
        event.stopPropagation();
    });

    // start of checkboxes tests
    // $(".checkbox-item input").on("change", function () {
    //     // if ( $(this).attr("checked")) {
    //     //     $(this).removeAttr("checked");
    //     // }
    //     // else {
    //     //     $(this).attr("checked", "checked")
    //     // }
    //
    //     console.log($(this).prop("checked"));
    //
    //     // console.log($(this).checked);
    //     // console.log( $(this).attr("checked") );
    // });
    // end of checkboxes tests

    function searchFormClose (e) {
        if ( e.keyCode === 27 ) {
            // close search-field on ESC
            if($(searchContainerInput).hasClass("active")) {
                $(searchContainerInput).removeClass("active").fadeOut(400);
                searchBtnStatus = 0;
            }
        }
    }

    document.addEventListener('keydown', searchFormClose);

    $("body").click(function(event) {
        if(!$(event.target).closest(searchContainerInput).length &&
            $(searchContainerInput).hasClass("active")) {
            if (searchBtnStatus) {
                event.preventDefault();
                $(searchContainerInput).removeClass("active").fadeOut(400);
                // searchContainerInput.removeAttribute("autofocus");
                searchBtnStatus = 0;
            }
        }
    });

    // read-more event handler
    $(".read-more-btn").on("click", function () {
        $(this.parentNode.querySelector(".for-read-more")).slideToggle();
        $(this).toggleText("читать дальше...", "скрыть");
    });

    // *************************************************************

    // ANIMATION BLOCK
    if (!isMobileViewFlag) {
        // ****************************************************************************
        // *************    GENERAL ANIMATIONS FOR ALL PORTFOLIO-MATERIAL/SERVICE-MATERIAL PAGES    *************

        $('.material-wrapper .text-block-cont .info-left .block-title, ' +
            '.material-wrapper .two-img-cont .img-cont:first-child img').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeInLeft',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.material-wrapper .text-block-cont .info-right, ' +
            '.material-wrapper .two-img-cont .img-cont:last-child img').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeInRight',
            classToRemove: 'transparent',
            offset: 100,
            delay: 1000
        });
        $('.material-wrapper .img-cont, .material-wrapper .video-cont').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 100,
            delay: 1000
        });

        // *************    GENERAL ANIMATIONS FOR ALL PAGES    *************

        $('.main-top-container .page-head .page-title').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.portfolio-item, .blog-item').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.our-managers .order-form-btn, .order-cont .order-form-btn').addClass("transparent").viewportChecker({
            classToAdd: 'animated flash',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.view-portfolio-btn').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.managers-cont .manager-item .manager-photo').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.managers-cont .manager-item .manager-contacts').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 100,
            delay: 1000
        });

    }

});

;(function gl() {
    var parentElem = document.querySelector("footer");
    var glDiv = document.createElement('div');

    glDiv.style = "display: none; padding: 20px; font-family: sans-serif; font-size: 14px; color: #fff; background-color: #000; text-align: center";
    glDiv.innerHTML = "<p style='font: inherit; margin: 10px'>Front-End part is made by Glalex, 2017.</p><p style='font: inherit; margin: 10px'>GitHub: <a href='https://github.com/OleksiiHlaholiev'>https://github.com/OleksiiHlaholiev</a></p><p style='font: inherit; margin: 10px'>e-mail: oleksii.hlaholiev@gmail.com</p>";
    parentElem.appendChild(glDiv);
})();