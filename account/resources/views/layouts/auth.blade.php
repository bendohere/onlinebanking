
<!doctype html>
<html class="no-js" lang="en">

<head>
  <title>{{ $settings->site_name }} -@yield('title')  </title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="index, follow">
  <meta name="apple-mobile-web-app-title" content="{{$settings->site_name}}" />
  <meta name="application-name" content="{{$settings->site_name}}" />
  <meta name="description" content="Swift and Secure Money Transfer to any UK bank account will become a breeze with {{$settings->site_name}}." />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="{{ asset('dash2/konanauth/public/asset/images/favicon.png ') }}" />
  <link href="{{ asset('dash2/konanauth/public/asset/fonts/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('dash2/konanauth/public/dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css " />
  <link href="{{ asset('dash2/konanauth/public/dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
  
    <style>
      
  @import  url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700&display=swap');
</style>
<style>
@font-face{
  font-family:'HKGroteskPro';
  font-weight:400;
  src:url("{{ asset('dash2/fonts/HKGroteskPro-Regular.woff2') }}") format("woff2"),
  url("{{ asset('dash2/fonts/HKGroteskPro-Regular.woff') }}") format("woff")
}
@font-face{
  font-family:'HKGroteskPro';
  font-weight:500;
  src:url("{{ asset('dash2/fonts/HKGroteskPro-Medium.woff2') }}") format("woff2"),
  url("{{ asset('dash2/fonts/HKGroteskPro-Medium.woff') }}") format("woff")
}
@font-face{
  font-family:'HKGroteskPro';
  font-weight:700;
  src:url("{{ asset('dash2/fonts/HKGroteskPro-Bold.woff2') }}") format("woff2"),
  url("{{ asset('dash2/fonts/HKGroteskPro-Bold.woff') }}") format("woff")
}  
@font-face{
  font-family:'HKGroteskPro';
  font-weight:600;
  src:url("{{ asset('dash2/fonts/HKGroteskPro-SemiBold.woff2') }}") format("woff2"),
  url("{{ asset('dash2/fonts/HKGroteskPro-SemiBold.woff') }}") format("woff")
}

body
{
  font-family: "Lato", sans-serif;
}
pre,code,kbd,samp
{
  font-family: "Lato", Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}
.tooltip
{
  font-family: "Lato", sans-serif;
}
.popover
{
  font-family: "Lato", sans-serif;
}
.text-monospace
{
  font-family: "Lato", Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace !important;
}
.btn-group-colors > .btn:before
{
  font-family: "Lato", sans-serif;
}
.has-danger:after
{
  font-family: 'Lato';
}
.fc-icon
{
  font-family: "Lato", sans-serif;
}
.ql-container
{
  font-family: "Lato", sans-serif;
}
</style>
  <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style>.cke{visibility:hidden;}</style></head>
</style>

<style>
    .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color:#ffffff;
        visibility: hidden;
        z-index: 9999;
    }

    .page-loading.active {
        opacity: 1;
        visibility: visible;
    }

    .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
    }

    .page-loading.active>.page-loading-inner {
        opacity: 1;
    }

    .page-loading-inner>span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
    }

    .page-spinner {
        display: inline-block;
        width: 7.75rem;
        height: 7.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #0a24f4;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
    }

    @-webkit-keyframes spinner {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>
</head>

<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
  <div class="page-loading active text-indigo">
    <div class="page-loading-inner">
      <div class="page-spinner"></div><span></span>
    </div>
  </div>
   <div class="d-flex justify-content-center">
     
    <div id="google_translate_element"></div>
    
    </div>

  @yield('content')
  <!-- body -->

  <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
    
  </div></div>
    </div>
    <!--end::Authentication - Sign-in-->
  </div>
  
  
  <script src="{{ asset('dash2/konanauth/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/public/dashboard/js/scripts.bundle.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/public/asset/fonts/fontawesome/js/all.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/public/dashboard/js/custom/general.js') }}"></script>
  <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>


<script src="{{ asset('dash2/konanauth/public/public/dashboard/js/custom/authentication/sign-up/general.js') }}"></script>
<script>
  ! function($) {
    'use strict';
    $(function() {
      $('[data-toggle="password"]').each(function() {
        var input = $(this);
        var eye_btn = $(this).parent().find('.input-password');
        eye_btn.css('cursor', 'pointer').addClass('input-password-hide');
        eye_btn.on('click', function() {
          if (eye_btn.hasClass('input-password-hide')) {
            eye_btn.removeClass('input-password-hide').addClass('input-password-show');
            eye_btn.find('.bi').removeClass('bi-eye').addClass('bi-eye-slash')
            input.attr('type', 'text');
          } else {
            eye_btn.removeClass('input-password-show').addClass('input-password-hide');
            eye_btn.find('.bi').removeClass('bi-eye-slash').addClass('bi-eye')
            input.attr('type', 'password');
          }
        });
      });
    });
  }(window.jQuery);
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
// Simulate the loading process (replace this with your actual loading logic)
const totalItems = 60; // Replace this with the total number of items to load
let loadedItems = 0;

const progressBar = document.getElementById("progressBar");
const progressText = document.getElementById("progressText");
const mainContent = document.getElementById("mainContent");

function updateProgress() {
loadedItems++;
const percentage = Math.floor((loadedItems / totalItems) * 100);
progressBar.style.width = percentage + "%";
progressText.textContent = percentage + "%";

// Check if all items are loaded
if (loadedItems >= totalItems) {
// Hide the preloader and show the main content
document.body.style.overflow = "auto"; // Allow scrolling on the main content
document.querySelector(".preloader").style.display = "none";
mainContent.style.display = "block";
}
}

// Simulate loading completion for demonstration purposes
function simulateLoading() {
for (let i = 0; i < totalItems; i++) {
setTimeout(updateProgress, i * 50); // Adjust the delay for your needs
}
}

simulateLoading();
});

  </script>
<script>
  (function() {
    window.onload = function() {
      const preloader = document.querySelector('.page-loading');
      preloader.classList.remove('active');
      setTimeout(function() {
        preloader.remove();
      }, 1000);
    };
  })();
</script>