(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 0.5);
    };

    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    // $(window).scroll(function () {
    //     if ($(window).width() < 992) {
    //         if ($(this).scrollTop() > 45) {
    //             $('.fixed-top').addClass('bg-white shadow');
    //         } else {
    //             $('.fixed-top').removeClass('bg-white shadow');
    //         }
    //     } else {
    //         if ($(this).scrollTop() > 45) {
    //             $('.fixed-top').addClass('bg-white shadow').css('top', -45);
    //         } else {
    //             $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
    //         }
    //     }
    // });
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow navbar-scrolled');
            } else {
                $('.fixed-top').removeClass('bg-white shadow navbar-scrolled');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow navbar-scrolled').css('top', -45);

            } else {
                $('.fixed-top').removeClass('bg-white shadow navbar-scrolled').css('top', 0);

            }
        }
    });




    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 50, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    // stater carousel
    $('.stater-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            }
        }
    });


})(jQuery);



/// form validations\

document.getElementById('number').addEventListener('input', function (e) {
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.getElementById('date').addEventListener('input', function (e) {
    const selectedDate = new Date(this.value);
    const today = new Date();
    today.setHours(0, 0, 0, 0); // Set time to 00:00:00 to compare only dates

    if (selectedDate < today) {
        alert('The selected date cannot be in the past.');
        this.value = '';
    }
});

document.getElementById('time').addEventListener('input', function (e) {
    const selectedDate = new Date(document.getElementById('date').value);
    const selectedTime = this.value;
    const now = new Date();

    if (selectedDate.toDateString() === now.toDateString() && selectedTime < now.toTimeString().slice(0, 5)) {
        alert('The selected time cannot be in the past.');
        this.value = '';
    }
});





//  form selection table
// js

document.querySelectorAll('.table').forEach(table => {
    table.addEventListener('click', function () {
        // Remove selection from all tables
        document.querySelectorAll('.table').forEach(t => t.classList.remove('selected'));

        // Select the clicked table
        this.classList.add('selected');

        // Store the selected table ID in a hidden input
        document.getElementById('table_id').value = this.getAttribute('data-table-id');
    });
});

document.getElementById('date').addEventListener('change', function () {
    const date = this.value;
    const time = document.getElementById('time').value;

    fetch(`/check-availability?date=${date}&time=${time}`)
        .then(response => response.json())
        .then(data => {
            if (data.available) {
                alert('Tables are available!');
            } else {
                alert('No tables available at this time.');
            }
        });
});


document.getElementById('bookingForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const form = e.target;
    const formData = new FormData(form);

    // Show loading SweetAlert
    Swal.fire({
        title: 'Submitting...',
        text: 'Please wait while we process your booking.',
        icon: 'info',
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });


    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Show success SweetAlert
                Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Close'
                }).then(() => {
                    // Optionally, redirect or reset the form
                    window.location.href = '/';
                });
            } else if (data.status === 'error') {
                // Show error SweetAlert for validation errors
                let errorMessages = '';
                for (const field in data.errors) {
                    errorMessages += 'Select a Table Required';
                }
                Swal.fire({
                    title: 'Error!',
                    html: errorMessages,
                    icon: 'error',
                    confirmButtonText: 'Close'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'An unexpected error occurred.',
                icon: 'error',
                confirmButtonText: 'Close'
            });
        });
});



document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#bookingForm');
    const submitButton = document.querySelector('button[type="submit"]');
    form.addEventListener('submit', function () {
        submitButton.disabled = true;
        submitButton.innerHTML = 'Submitting...';
    });
});


