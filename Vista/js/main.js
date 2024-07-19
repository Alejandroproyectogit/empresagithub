(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    
    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

$(document).ready(function() {
    // Manejar clic en el botón de WhatsApp
    $('.whatsapp-btn').click(function() {
        var phone = $(this).data('whatsapp');
        $('#phoneContent').text(phone);
        $('#phoneModal').modal('show');
    });

    // Manejar clic en el botón de correo electrónico
    $('.email-btn').click(function() {
        var email = $(this).data('email');
        $('#emailContent').text(email);
        $('#emailModal').modal('show');
    });
});




document.addEventListener("DOMContentLoaded", function() {
    // Handle opening the correct modal
    document.querySelectorAll('.btn-primary[data-bs-toggle="modal"]').forEach(function(button) {
        button.addEventListener('click', function() {
            const userId = button.getAttribute('data-id');
            const modal = document.querySelector(`#updateModal${userId}`);

            if (modal) {
                const bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }
        });
    });

    // Example of form validation or other logic excluding password
    document.querySelectorAll('form[id^="actualizarUsuario"]').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            let nombre = form.querySelector('input[name="Upnombre"]').value;
            let correo = form.querySelector('input[name="Upcorreo"]').value;
            let telefono = form.querySelector('input[name="Uptelefono"]').value;
            let usuario = form.querySelector('input[name="Upusuario"]').value;

            if (!nombre || !correo || !telefono || !usuario) {
                alert('Todos los campos son obligatorios.');
                event.preventDefault();
            }
        });
    });
});