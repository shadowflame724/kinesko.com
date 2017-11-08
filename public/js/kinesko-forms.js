/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

'use strict';

;( function( $, window, document, undefined )
{
	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
})( jQuery, window, document );
(function (e, t, n) {
    var r = e.querySelectorAll("html")[0];
    r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
})(document, window, 0);

/**
 * Created by glalex on 26.07.2017.
 */

//------------   START OF GLOBAL VARIABLES AND FUNCTIONS   -------------
var successFormTimer,
    kineskoForms = $(".kinesko-form");

function kineskoFormShow(kineskoForm) {
    $(kineskoForm).addClass("active").fadeIn(400);
    $("html, body").addClass("scroll-lock");
    // $("html, body").addClass("html-body-scroll-lock");
    // $("body").addClass("body-scroll-lock");
}

function kineskoFormHide(kineskoForm) {
    $(kineskoForm).removeClass("active").fadeOut(400);

    if(!$("header").hasClass("active")) {
        // check if the header is not active - avoid dual deactivation of body scroll
        $("html, body").removeClass("scroll-lock");
    }

    // $("html, body").removeClass("html-body-scroll-lock");
    // $("body").removeClass("body-scroll-lock");
}

function successFormShow() {
    var timeToShow = 7000;
    kineskoFormShow(".success-form");

    successFormTimer = setTimeout(function () {
        kineskoFormHide(".success-form");
        clearTimeout(successFormTimer);
    }, timeToShow);
}
//------------   end OF GLOBAL VARIABLES AND FUNCTIONS   -------------

// start of order-form logic
$(function () {
    var orderForm = document.querySelector(".order-form");

    $(".order-form-btn").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation(); // to avoid inherit click events
        kineskoFormShow(orderForm);
    });

    $(".order-form .close-btn").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation(); // to avoid inherit click events
        kineskoFormHide(orderForm);
    });

    // form-handler

    $(orderForm).ajaxForm({
        url: "/api/order-store", // путь к обработчику
        type: "POST", //Метод отправки
        success: function () {
            //код в этом блоке выполняется при успешной отправке сообщения
            // alert("Ваше сообщение отправлено!");
            orderForm.reset();
            $(".order-form .add-file-cont label span").text("+ Добавить файл");
            successFormShow();
            kineskoFormHide(orderForm);
        },
        error: function () {
            alert("Произошла ошибка при отправке...( Попробуйте еще раз!");
        }
    });

    function modalClose (e) {
        if ( e.keyCode === 27 ) {
            // close forms on ESC
            if($(orderForm).hasClass("active")) {
                kineskoFormHide(orderForm);
            }
        }
    }

    document.addEventListener('keydown', modalClose);
});
// end of order-form logic

// ************************************************************************************************************ //

// start of callback-form logic
$(function () {
    var callbackForm = document.querySelector(".callback-form");

    $(".callback-form-btn").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation(); // to avoid inherit click events
        kineskoFormShow(callbackForm);
    });

    $(".callback-form .close-btn").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation(); // to avoid inherit click events
        kineskoFormHide(callbackForm);
    });

    // form-handler
    $(callbackForm).submit(function(event) { //устанавливаем событие отправки для формы
        event.preventDefault();
        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "/api/callback-store", // путь к обработчику
            data: form_data,
            success: function () {
                //код в этом блоке выполняется при успешной отправке сообщения
                // alert("Ваше сообщение отправлено!");
                callbackForm.reset();
                successFormShow();
                kineskoFormHide(callbackForm);
            },
            error: function () {
                alert("Произошла ошибка при отправке...( Попробуйте еще раз!");
            }
        });
    });

    function modalClose (e) {
        if ( e.keyCode === 27 ) {
            // close forms on ESC
            if($(callbackForm).hasClass("active")) {
                kineskoFormHide(callbackForm);
            }
        }
    }

    document.addEventListener('keydown', modalClose);
});
// end of callback-form logic

// start of blog-subscribe-form logic
$(function () {
    var blogSubscribeForm = document.querySelector(".blog-subscribe-form");

    // form-handler
    $(blogSubscribeForm).submit(function(event) { //устанавливаем событие отправки для формы
        event.preventDefault();
        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "/api/subscription-store", // путь к обработчику
            data: form_data,
            success: function () {
                //код в этом блоке выполняется при успешной отправке сообщения
                // alert("Ваше сообщение отправлено!");
                blogSubscribeForm.reset();
                successFormShow();
            },
            error: function () {
                alert("Произошла ошибка при отправке...( Попробуйте еще раз!");
            }
        });
    });

});
// end of blog-subscribe-form logic

// ************************************************************************************************************ //

// start of success-form logic
$(function () {
    var successForm = document.querySelector(".success-form");

    $(".success-form .success-close-btn, .success-form .close-btn").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation(); // to avoid inherit click events
        kineskoFormHide(successForm);
        if (successFormTimer) {
            clearTimeout(successFormTimer);
        }
    });

    function modalClose (e) {
        if ( e.keyCode === 27 ) {
            // close forms on ESC
            if($(successForm).hasClass("active")) {
                kineskoFormHide(successForm);
            }
        }
    }

    document.addEventListener('keydown', modalClose);
});
// end of of success-form logic

$(function () {
    $("body").click(function(event) {
        // if($(kineskoForms).hasClass("active")) {
        //     alert("YES!");
        // }
        if(!$(event.target).closest($(".gl-container")).length &&
            $(kineskoForms).hasClass("active")) {
                event.preventDefault();
                kineskoFormHide(kineskoForms);
        }
    });
});

// ************************************************************************************************************ //