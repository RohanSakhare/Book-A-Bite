$(function () {


    // =====================================
    // Profit
    // =====================================
    var chart = {
        series: [
            { name: "Earnings this month:", data: [355, 390, 300, 350, 390, 180, 355, 390] },
            { name: "Expense this month:", data: [280, 250, 325, 215, 250, 310, 280, 250] },
        ],

        chart: {
            type: "bar",
            height: 345,
            offsetX: -15,
            toolbar: { show: true },
            foreColor: "#adb0bb",
            fontFamily: 'inherit',
            sparkline: { enabled: false },
        },


        colors: ["#5D87FF", "#49BEFF"],


        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "35%",
                borderRadius: [6],
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'all'
            },
        },
        markers: { size: 0 },

        dataLabels: {
            enabled: false,
        },


        legend: {
            show: false,
        },


        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },

        xaxis: {
            type: "category",
            categories: ["16/08", "17/08", "18/08", "19/08", "20/08", "21/08", "22/08", "23/08"],
            labels: {
                style: { cssClass: "grey--text lighten-2--text fill-color" },
            },
        },


        yaxis: {
            show: true,
            min: 0,
            max: 400,
            tickAmount: 4,
            labels: {
                style: {
                    cssClass: "grey--text lighten-2--text fill-color",
                },
            },
        },
        stroke: {
            show: true,
            width: 3,
            lineCap: "butt",
            colors: ["transparent"],
        },


        tooltip: { theme: "light" },

        responsive: [
            {
                breakpoint: 600,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 3,
                        }
                    },
                }
            }
        ]


    };

    var chart = new ApexCharts(document.querySelector("#chart"), chart);
    chart.render();


    // =====================================
    // Breakup
    // =====================================
    var breakup = {
        color: "#adb5bd",
        series: [38, 40, 25],
        labels: ["2022", "2021", "2020"],
        chart: {
            width: 180,
            type: "donut",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
        },
        plotOptions: {
            pie: {
                startAngle: 0,
                endAngle: 360,
                donut: {
                    size: '75%',
                },
            },
        },
        stroke: {
            show: false,
        },

        dataLabels: {
            enabled: false,
        },

        legend: {
            show: false,
        },
        colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

        responsive: [
            {
                breakpoint: 991,
                options: {
                    chart: {
                        width: 150,
                    },
                },
            },
        ],
        tooltip: {
            theme: "dark",
            fillSeriesColor: false,
        },
    };

    var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
    chart.render();



    // =====================================
    // Earning
    // =====================================
    var earning = {
        chart: {
            id: "sparkline3",
            type: "area",
            height: 60,
            sparkline: {
                enabled: true,
            },
            group: "sparklines",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
        },
        series: [
            {
                name: "Earnings",
                color: "#49BEFF",
                data: [25, 66, 20, 40, 12, 58, 20],
            },
        ],
        stroke: {
            curve: "smooth",
            width: 2,
        },
        fill: {
            colors: ["#f3feff"],
            type: "solid",
            opacity: 0.05,
        },

        markers: {
            size: 0,
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: true,
                position: "right",
            },
            x: {
                show: false,
            },
        },
    };
    new ApexCharts(document.querySelector("#earning"), earning).render();



    new ApexCharts(document.querySelector("#earning"), earning).render();

    // =====================================
    // Daily Booking
    // =====================================
    function fetchDailyBookings() {
        $.ajax({
            url: '/api/bookings/daily',
            method: 'GET',
            success: function (data) {
                var dates = data.map(item => item.date);
                var counts = data.map(item => item.count);

                var dailyBooking = {
                    chart: {
                        type: 'line',
                        height: 350,
                        foreColor: '#adb0bb',
                        fontFamily: 'inherit',
                    },
                    series: [{
                        name: 'Bookings',
                        data: counts
                    }],
                    xaxis: {
                        categories: dates,
                        labels: {
                            style: { cssClass: 'grey--text lighten-2--text fill-color' },
                        },
                    },
                    yaxis: {
                        labels: {
                            style: { cssClass: 'grey--text lighten-2--text fill-color' },
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    markers: {
                        size: 4,
                    },
                    tooltip: {
                        theme: 'dark',
                    },
                };

                var chart = new ApexCharts(document.querySelector("#daily-booking"), dailyBooking);
                chart.render();
            },
            error: function (error) {
                console.error('Error fetching daily bookings:', error);
            }
        });
    }

    fetchDailyBookings();
})


// Wait for the page to fully load
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        let preloader = document.getElementById("preloader");
        preloader.style.opacity = "0"; // Fade out effect
        setTimeout(() => {
            preloader.style.display = "none"; // Hide preloader after fade-out
            document.querySelector("#main-wrapper").style.display = "block"; // Show content
        }, 500); // 500ms fade-out duration
    }, 1000); // 2-second delay before hiding preloader
});


// login start
// Create floating particles
function createParticles() {
    const container = document.getElementById('particles');
    const particleCount = 50;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';

        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.opacity = Math.random() * 0.5 + 0.2;

        container.appendChild(particle);
    }
}

// Handle form submission
function handleLogin(event) {
    event.preventDefault();

    const email = document.getElementById('email');
    const password = document.getElementById('password');
    let isValid = true;

    // Reset error messages
    document.querySelectorAll('.error-message').forEach(elem => {
        elem.style.display = 'none';
    });

    // Validate email
    if (!isValidEmail(email.value)) {
        showError('emailError', 'Please enter a valid email address');
        isValid = false;
    }

    // Validate password
    if (password.value.length < 6) {
        showError('passwordError', 'Password must be at least 6 characters');
        isValid = false;
    }

    if (isValid) {
        // Simulated login success
        alert('Login successful! (Demo only)');
        document.getElementById('loginForm').reset();
    }

    return false;
}

// Email validation
function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Show error message
function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}


// Handle sign up
function handleSignUp() {
    alert('Sign up would be implemented here');
}

// Add mouse move effect for gradient spheres
document.addEventListener('mousemove', (e) => {
    const spheres = document.querySelectorAll('.gradient-sphere');
    const x = e.clientX / window.innerWidth;
    const y = e.clientY / window.innerHeight;

    spheres.forEach((sphere, index) => {
        const speed = (index + 1) * 20;
        const xOffset = (0.5 - x) * speed;
        const yOffset = (0.5 - y) * speed;

        sphere.style.transform = `translate(${xOffset}px, ${yOffset}px) scale(${1 + (index * 0.1)})`;
    });
});

// Add smooth reveal animation for form elements
document.addEventListener('DOMContentLoaded', () => {
    // Initialize particles
    createParticles();

    // Animate form elements
    const elements = document.querySelectorAll('.form-group, .submit-button, .divider, .social-login, .additional-options');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        setTimeout(() => {
            element.style.transition = 'all 0.6s ease-out';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 100 * index);
    });

    // Add input focus effects
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', () => {
            if (!input.value) {
                input.parentElement.classList.remove('focused');
            }
        });
    });
});

// Add ripple effect to buttons
document.querySelectorAll('.submit-button, .social-button').forEach(button => {
    button.addEventListener('click', function (e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const ripple = document.createElement('div');
        ripple.style.position = 'absolute';
        ripple.style.width = '0';
        ripple.style.height = '0';
        ripple.style.background = 'rgba(255, 255, 255, 0.4)';
        ripple.style.borderRadius = '50%';
        ripple.style.transform = 'translate(-50%, -50%)';
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;
        ripple.style.animation = 'ripple 0.6s ease-out';

        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    });
});

// login end


//
// 333333333333333333333333###############################################
//sidebar links
function toggleDropdown(element) {
    const arrow = element.querySelector('.dropdown-arrow');
    const isExpanded = element.getAttribute('aria-expanded') === 'true';

    if (isExpanded) {
        arrow.classList.add('rotate-right');
        arrow.classList.remove('rotate-top');
    } else {
        arrow.classList.remove('rotate-right');
        arrow.classList.add('rotate-top');
    }

    element.setAttribute('aria-expanded', !isExpanded);
}
