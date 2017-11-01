/**
 * Created by glalex on 11.09.2017.
 */

$(function () {
    var hobbyItems = $(".hobby-icons-cont .hobby-item"),
        employeesMen = $(".employees .men .item"),
        employeesWomen = $(".employees .women .item"),
        hobbyIndexGlobal = 0,
        autoPlayDelayGlobal = 2000,
        autoPlayTimerGlobal;

    function hobbiesTurnOn (employeesArray, number) {
        var i = 0,
            timeDelay = 50;

        for (i = 0; i < number; i++) {

            (function (j) {
                setTimeout(function () {
                    $(employeesArray[j]).addClass("active");
                }, j * timeDelay);
            })(i);

            // $(employeesArray[i]).addClass("active");
        }
    }

    function hobbyHandler(element) {
        var menNumber = 0,
            womenNumber = 0,
            i = 0, j = 0,
            offsetDelay = 400;

        hobbyItems.removeClass("active");
        $(element).addClass("active");
        $(employeesMen).removeClass("active");
        $(employeesWomen).removeClass("active");

        menNumber = $(element).attr("data-men");
        womenNumber = $(element).attr("data-women");

        setTimeout(function () {
            hobbiesTurnOn(employeesMen, menNumber);
            hobbiesTurnOn(employeesWomen, womenNumber);
        }, offsetDelay);
    }

    $(hobbyItems).on("mouseover", function(){
        hobbyIndexGlobal = hobbyItems.index(this);
        hobbyHandler(this);
        clearInterval(autoPlayTimerGlobal);
    });

    $(hobbyItems).on("mouseleave", function(){
        autoPlayTimerGlobal = setInterval( function () {
                hobbyIndexGlobal++;
                if(hobbyIndexGlobal >= hobbyItems.length) {
                    hobbyIndexGlobal = 0;
                }
                hobbyHandler(hobbyItems[hobbyIndexGlobal])
            },
            autoPlayDelayGlobal
        );
    });

    hobbyHandler(hobbyItems[0]); // generate initial call on the first element

    autoPlayTimerGlobal = setInterval( function () {
            hobbyIndexGlobal++;
            if(hobbyIndexGlobal >= hobbyItems.length) {
                hobbyIndexGlobal = 0;
            }
            hobbyHandler(hobbyItems[hobbyIndexGlobal])
        },
        autoPlayDelayGlobal
    );

    // ANIMATION BLOCK
    if (!isMobileViewFlag) {
        // ****************************************************************************
        // *************     ANIMATIONS FOR THIS PAGE    *************

        $('.info-block-cont .title-cont').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeInLeft',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.info-block-cont .text-cont').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeInRight',
            classToRemove: 'transparent',
            offset: 100,
            delay: 1000
        });


        $('.our-hobbies .hobby-icons-cont, .our-hobbies .employees').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeInUp',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });


        $('.team-group .team-member').addClass("transparent").viewportChecker({
            classToAdd: 'animated fadeIn',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });

        $('.send-sv-btn').addClass("transparent").viewportChecker({
            classToAdd: 'animated flash',
            classToRemove: 'transparent',
            offset: 0,
            delay: 1000
        });
    }




});