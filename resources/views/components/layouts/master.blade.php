<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of global village</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/metismenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    @stack('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <style>
        body {
            color: #303030 !important;
            background-color: #E5E4E2;
            /* opacity: 0.9; */
            /* background-image: repeating-radial-gradient(circle at 0 0, transparent 0, #e5e5f7 10px), repeating-linear-gradient(#c6c9fc55, #c6c9fc); */

        }

        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Montserrat:wght@400;700&display=swap');

        :root {
            --primary-color: #303030;
            --secondary-color: #0b5394;
            --text-color: #ffffff;
            --heading-font: 'Merriweather', serif;
            --body-font: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--body-font);

        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--heading-font);

        }
    </style>
</head>

<body>
    <div class="header mb-2">
        <x-header.navbar />

    </div>


    <div class="main">
        {{ $slot }}
    </div>
    <div class="footer">
        <x-footer.footer />
    </div>
    <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete ui-autocomplete-input" type="text"
                        placeholder="Search by keyword or #" autocomplete="off">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    <!-- rts backto top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <!-- rts back to top end -->
    <div id="anywhere-home" class="">
    </div>





    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waw.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/metismenu.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/magnifying-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoint.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotop.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sticky-sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/resize-sensor.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/twinmax.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#noticeSlider', {
                type: 'loop',
                perPage: 2,
                autoplay: true,
                pauseOnHover: true,
                interval: 3000,
                speed: 1000,
                gap: '20px',
                arrows: false,

                breakpoints: {
                    768: {
                        perPage: 2
                    },
                    480: {
                        perPage: 1
                    }
                }
            }).mount();
        });
    </script>
    <script async src="https://cse.google.com/cse.js?cx=a5851bf7a6e7f47e8"></script>
    <script>
        function searchGoogle() {
            let query = document.getElementById('search-query').value;
            let resultsContainer = document.getElementById('search-results');
            resultsContainer.innerHTML = `<gcse:searchresults-only></gcse:searchresults-only>`;
            document.querySelector("gcse\\:searchresults-only").setAttribute("queryParameterName", query);
            return false; // Prevent form submission
        }
    </script>
    @stack('script')
</body>

</html>
