/**
 * Created by glalex on 12.09.2017.
 */

$(function () {
    var visualContainers = document.querySelectorAll(".visual-wrapper .visual");
    var visualVideos = document.querySelectorAll(".visual-wrapper .visual video");

    var sliderItems = document.querySelectorAll("#my-thumbs-list .slider-item");

    // if (!isMobileViewFlag) {
    //     $("#my-thumbs-list").mThumbnailScroller({
    //         axis:"x", //change to "y" for vertical scroller
    //         setLeft: "0", // initial css left property of content
    //         speed: 100,
    //         type:"hover-precise"
    //     });
    // } else {
    //     $("#my-thumbs-list").mThumbnailScroller({
    //         setLeft: "0",
    //         type:"click-100",
    //         theme:"buttons-in"
    //     });
    // }

    if (!isMobileViewFlag) {
        var prevVideoIndex = 2;
        visualContainers[prevVideoIndex].classList.add("vis-active");

        $(sliderItems).on("mouseover", function() {
            visualContainers[prevVideoIndex].classList.remove("vis-active");
            prevVideoIndex = +this.getAttribute("data-number");
            visualContainers[prevVideoIndex].classList.add("vis-active");
            visualVideos[prevVideoIndex].play();
        });

        $(sliderItems).on("mouseleave", function() {

            // visualContainers[prevVideoIndex].classList.remove("vis-active");
            visualVideos[prevVideoIndex].pause();
        });

        // *************     ANIMATIONS FOR THIS PAGE    *************
        // $('#my-thumbs-list .slider-item .slide-title').addClass("transparent").viewportChecker({
        //     classToAdd: 'animated fadeIn',
        //     classToRemove: 'transparent',
        //     offset: 0,
        //     delay: 1000
        // });

        $('.promo-block .promo-info').addClass("transparent").viewportChecker({
            classToAdd: 'animated pulse',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.list-block .service-item-list li').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeInUp',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

    }
});