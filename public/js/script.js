"use strict";

$(window).on("load", function() {
        $(".loader").fadeOut("slow");
    }),

    $(window).on("scroll", function() {
        $(window).scrollTop() > 70 ? ($(".navbar").addClass("shrink"),
            $(".navbar .navbar-brand.orange_logo> img").attr("src", "images/logo.svg"),
            $(".index-light .navbar .navbar-brand.orange_logo> img").attr("src", "images/logo.svg"),
            $(".active-navbar .navbar .navbar-brand.orange_logo> img").attr("src", "images/logo.svg"),
            $(".index-only-side-nav .navbar  .navbar-brand").addClass("display_none"),
            $(".index-only-side-nav .navbar").removeClass("shrink")) : ($(".navbar").removeClass("shrink"),
            $(".index-light .navbar .navbar-brand.orange_logo> img").attr("src", "images/logo.svg"),
            $(".active-navbar .navbar .navbar-brand.orange_logo> img").attr("src", "images/logo.svg"),
            $(".active-navbar .navbar").addClass("shrink"),
            $(".index-only-side-nav .navbar  .navbar-brand").removeClass("display_none"),
            $(".index-only-side-nav .navbar").removeClass("shrink"))
    });
var $menuLeft = $(".pushmenu-left"),
    $menuRight = $(".pushmenu-right"),
    $toggleright = $(".menu_bars");

$toggleright.on("click", function() {
    return $(".menu_bars").toggleClass("active"), $menuRight.toggleClass("pushmenu-open"), $("body").toggleClass("pushmenu-push-toLeft"), $(".navbar").toggleClass("navbar-right_open"), !1
}), $(".push_nav li a").on("click", function() {
    return $toggleright.toggleClass("active"), $menuRight.toggleClass("pushmenu-open"), $("body").toggleClass("pushmenu-push-toLeft"), $(".navbar").toggleClass("navbar-right_open"), !0
});


$(".scroll").on("click", function(a) {
    var elementClick = $(this).attr("href");
    if(elementClick){
        var destination = $(elementClick).offset().top - $('.navbar').height();

        a.preventDefault(), $("html,body").animate({
            scrollTop: destination,
            scrollBottom: destination
        }, 1200)
    }
});

$('.anchor').on('click', function(e) {
    var elementClick = $(this).attr("href")
    var destination = $(elementClick).offset().top - $('.navbar').height();

    e.preventDefault(), $("html,body").animate({
        scrollTop: destination,
        scrollBottom: destination
    }, 1200)

});

$(document).ready(function() {
    $("#top-menu").changeActiveNav();
});



$(document).ready(function() {
    if (typeof $.fn.bootstrapBtn == 'undefined') {
        $.fn.bootstrapBtn = $.fn.button.noConflict();
    }

    $(document).find(".market_dialog").each(function() {
        if (window.innerWidth < 767.98) {
            $(this).dialog({
                autoOpen: false,
                modal: true,
                position: {
                    my: "center top",
                    at: "center top"
                },
                show: {
                    effect: "blind",
                    duration: 700
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
            });
        } else {
            $(this).dialog({
                autoOpen: false,
                modal: true,
                position: {
                    my: "center middle",
                    at: "center middle"
                },
                show: {
                    effect: "blind",
                    duration: 700
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
            });
        }
    });


    $('#order_dialog').dialog({
        autoOpen: false,
        modal: true,
        position: {
            my: "center middle",
            at: "center middle"
        },
        show: {
            effect: "blind",
            duration: 500
        },
        hide: {
            effect: "blind",
            duration: 300
        },
    });



    var form = document.getElementById('mail_send');

    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
        }
        else{
            $('#mail_send_result').css('display', 'block');
            $('#mail_send_result_content').addClass('mail_sending');
            $('#mail_send_result_content').removeClass('mail_send_ok');
            $('#mail_send_result_content').removeClass('mail_send_error');
            $('#mail_send_result_text').html('Отправка сообщения...');

            var msg   = $('#mail_send').serialize();
            $.ajax({
            type: 'POST',
            url: '/mail_send',
            data: msg,
            success: function(data) {
                if(data==='OK'){
                    $('#mail_send_result_content').addClass('mail_send_ok');
                    $('#mail_send_result_content').removeClass('mail_send_error');
                    $('#mail_send_result_content').removeClass('mail_sending');
                }
                else{
                    $('#mail_send_result_content').addClass('mail_send_error');
                    $('#mail_send_result_content').removeClass('mail_send_ok');
                    $('#mail_send_result_content').removeClass('mail_sending');
                }
                $('#mail_send_result_text').html(setEmailStatus(data));
                form.classList.remove('was-validated');
                if(data==='OK') {form.reset();}
            },
            error:  function(xhr, str){
                $('#mail_send_result_content').addClass('mail_send_error');
                $('#mail_send_result_content').removeClass('mail_send_ok');
                $('#mail_send_result_content').removeClass('mail_sending');
                $('#mail_send_result_text').html('Ошибка отправки сообщения. Перезагрузите страницу или попробуйте позже.');
            }
            });
        }
    }, false);


        function setEmailStatus(data){
            switch(data){
                case 'OK': 
                    return 'Спасибо :) Сообщение отправлено. Мы вам ответим в ближайшее время.';
                    break;

                case 'TRANSPORT_ERROR': 
                    return 'Ошибка отправки сообщения. Проверьте правильность email.';
                    break;

                case 'ERROR': 
                    return 'Ошибка отправки сообщения. Повторите попытку или попробуйте позже.';
                    break;   
                    
                default: 
                    return ':( Ошибка!';
                    break;   
            }
        }

        $.each($('.mail_send_result_close'), function(key, value){
            $(value).click(function(event) {
                $('#mail_send_result').css('display', 'none');
            });   
        });

        $('.order_radio').click( function(e) {
            order_radio_set();
        });

        $('.order_close').click(function(){
            $('#order_dialog').dialog('close');
        });

        $('.order_open').click(function(){
            order_radio_set();
            $('#order_dialog').dialog('open');
        });

        function order_radio_set(){
            $.each($('.order_radio'), function(key, radio){
                var className = '.'+$(radio).attr('switch-class');
               
                if($(radio).is(':checked')){

                    $.each( $(className), function(key, element){
                        $(element).css('display', 'flex');

                        $.each( $(element).find('input'),function(key, child_radio){
                            $(child_radio).attr('disabled', false);
                        }) ;
                    });
                }
                else{
                    
                    $.each( $(className), function(key, element){
                        $(element).css('display', 'none');
                        
                        $.each( $(element).find('input'),function(key, child_radio){
                            $(child_radio).attr('disabled', true);
                        }) ;
                    });
                }
            });
        }
        
        var order_form = document.getElementById('order-form');

        order_form.addEventListener('submit', function(event) {

            if (order_form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                order_form.classList.add('was-validated');   
            }
            else{
                $('#mail_send_result').css('display', 'block');
                $('#mail_send_result_content').addClass('mail_sending');
                $('#mail_send_result_content').removeClass('mail_send_ok');
                $('#mail_send_result_content').removeClass('mail_send_error');
                $('#mail_send_result_text').html('Обработка заказа...');

                var msg   = $('#order-form').serialize();
                $.ajax({
                type: 'POST',
                url: '/new_order',
                data: msg,
                success: function(data) {

                    if(data==='OK'){
                        $('#mail_send_result_content').addClass('mail_send_ok');
                        $('#mail_send_result_content').removeClass('mail_send_error');
                        $('#mail_send_result_content').removeClass('mail_sending');
                    }
                    else{
                        $('#mail_send_result_content').addClass('mail_send_error');
                        $('#mail_send_result_content').removeClass('mail_send_ok');
                        $('#mail_send_result_content').removeClass('mail_sending');
                    }
                    $('#mail_send_result_text').html(setOrderStatus(data));
                    
                    
                    if(data==='OK') {
                        order_form.reset();
                        $('#order_dialog').dialog('close');
                        order_form.classList.remove('was-validated');
                    }
                    
                },
                error:  function(xhr, str){
                    $('#mail_send_result_content').addClass('mail_send_error');
                    $('#mail_send_result_content').removeClass('mail_send_ok');
                    $('#mail_send_result_content').removeClass('mail_sending');
                    $('#mail_send_result_text').html(setOrderStatus('ERROR'));
                }
                });
            }

        });

        function setOrderStatus(data){
            switch(data){
                case 'OK': 
                    return 'Спасибо :) Ваша заявка принята. Мы свяжемся с Вами в ближайшее время.';
                    break;

                case 'TRANSPORT_ERROR': 
                    return 'Ошибка сервера. Обновите страницу и попробуйте еще раз.';
                    break;

                case 'ERROR': 
                    return 'Ошибка. Повторите попытку или попробуйте позже.';
                    break;   
                    
                default: 
                    return ':( Ошибка!';
                    break;   
            }
        }

 });



