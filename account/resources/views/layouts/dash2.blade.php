
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $settings->site_name }} | @yield('title')</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Swift and Secure Money Transfer to any UK bank account will become a breeze with {{$settings->site_name}}." />
  <meta name="csrf_token" content="{{ csrf_token() }}" id="csrf_token" data-turbolinks-permanent>
  <link rel="shortcut icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}" />
  <link rel="stylesheet" href="{{ asset('dash2/libs/%40fortawesome/fontawesome-pro/css/all.min.css') }}">
  <link href="{{ asset('dash2/konanauth/public/asset/fonts/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('dash2/public/dashboard/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('dash2/konanauth/public/dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('dash2/konanauth/public/dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
  <link rel="stylesheet" href="{{ asset('dash2/konanauth/public/vendor/megaphone/css/megaphone.css') }}">
  <style >[wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid], [wire\:loading\.inline-flex] {display: none;}[wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short], [wire\:loading\.delay\.long], [wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest] {display:none;}[wire\:offline] {display: none;}[wire\:dirty]:not(textarea):not(input):not(select) {display: none;}input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {animation-duration: 50000s;animation-name: livewireautofill;}@keyframes livewireautofill { from {} }</style>
    
    <style>
        @font-face {
        font-family: Graphik;
        font-weight: 400;
        src: url("{{ asset('dash2/konanauth/public/public/asset/fonts/Graphik/GraphikRegular.otf') }}");
    }

    @font-face {
        font-family: Graphik;
        font-weight: 500;
        src: url("{{ asset('dash2/konanauth/public/https://nothingdevelopers.xyz/konan/public/asset/fonts/Graphik/GraphikRegular.otf') }}");
    }

    @font-face {
        font-family: Graphik;
        font-weight: 700;
        src: url("{{ asset('dash2/konanauth/public/asset/fonts/Graphik/GraphikMedium.otf') }}");
    }

    @font-face {
        font-family: Graphik;
        font-weight: 800;
        src: url("{{ asset('dash2/konanauth/public/asset/fonts/Graphik/GraphikBold.otf ') }}");
    }

    @font-face {
        font-family: Graphik;
        font-weight: 900;
        src: url("{{ asset('dash2/konanauth/public/asset/fonts/Graphik/GraphikMedium.otf') }}");
    }
</style>

<style>

.iti {
    position: relative;
    display: block;
}

body
{
    font-family: "Graphik", sans-serif;
}
pre,code,kbd,samp
{
    font-family: "Graphik", Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}
.tooltip
{
    font-family: "Graphik", sans-serif;
}
.popover
{
    font-family: "Graphik", sans-serif;
}
.text-monospace
{
    font-family: "Graphik", Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace !important;
}
.btn-group-colors > .btn:before
{
    font-family: "Graphik", sans-serif;
}
.has-danger:after
{
    font-family: 'Graphik';
}
.fc-icon
{
    font-family: "Graphik", sans-serif;
}
.ql-container
{
    font-family: "Graphik", sans-serif;
}
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
        width: 4.75rem;
        height: 4.75rem;
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
</style></head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
 
    <div class="page-loading active text-indigo">
    <div class="page-loading-inner">
      <div class="page-spinner"></div><span></span>
    </div>
  </div>
  <div class="d-flex justify-content-center">
     
    <div id="google_translate_element"></div>
    
    </div>
  
  <div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
      <div id="kt_aside" class="aside aside-default bg-white aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
        <div class="aside-logo flex-column-auto pt-9 pb-5" id="kt_aside_logo">
          <a href="/">
            <img alt="Logo" src="{{ asset('storage/app/public/'.$settings->logo)}}" class="logo-default" style="height:auto; max-width:30%;"/>
            <img alt="Logo" src="{{ asset('storage/app/public/'.$settings->logo)}}" class="h-50px logo-minimize" style="height:auto; max-width:30%;"/>
          </a>
        </div>
        <div class="aside-menu flex-column-fluid">
          <div class="menu menu-column menu-fit menu-rounded menu-title-dark menu-icon-dark menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
            <div class="menu-fit hover-scroll-y me-lg-n5 pe-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="20px" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer">
              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link  active " href="{{ route('dashboard') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-home fs-3"></i>
                  </span>
                  <span class="menu-title">Dashboard</span>
                </a>
              </div>
           
              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('accounthistory') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-heart-rate fs-3"></i>
                  </span>
                  <span class="menu-title">Transactions</span>
                </a>
              </div>



              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('localtransfer') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-send fs-3"></i>
                  </span>
                  <span class="menu-title">Local Transfer</span>
                </a>
              </div>

              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('internationaltransfer') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-bank fs-3"></i>
                  </span>
                  <span class="menu-title">International Wire Transfer</span>
                </a>
              </div>


              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('deposits') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-download fs-3"></i>
                  </span>
                  <span class="menu-title">Deposit</span>
                </a>
            </div>
              
              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('loan') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-coin fs-3"></i>
                  </span>
                  <span class="menu-title">Loan Request</span>
                </a>
              </div>
              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{route('veiwloan')}}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-exchange fs-3"></i>
                  </span>
                  <span class="menu-title">Loan History</span>
                </a>
              </div>
              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('profile') }}">
                  <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <i class="fal fa-cog fs-3"></i>
                  </span>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('support') }}">
                  <span class="menu-icon">
                    <i class="fal fa-clipboard-list-check fs-3"></i>
                  </span>
                  <span class="menu-title">Support Ticket</span>
                </a>
              </div>

              <div class="menu-item"><!--begin:Menu link-->
                <a class="menu-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <span class="menu-icon">
                    <i class="fal fa-sign-out fs-3"></i>
                  </span>
                  <span class="menu-title">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
              {{ csrf_field() }}
            </form>
              </div>
            </div>
          </div>
        </div>
        <div class="aside-footer flex-column-auto" id="kt_aside_footer"></div>
      </div>
    </div>
  </div>
  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
      <!--begin::Container-->
      <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Logo bar-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
          <!--begin::Logo-->
          <a href="{{ route('dashboard') }}" class="d-lg-none">
            <img alt="Logo" src="{{ asset('storage/app/public/'.$settings->logo)}}" style="height:auto; max-width:30%;"/>
          </a>
          <!--end::Logo-->
        </div>
        <!--end::Logo bar-->
        <!--begin::Topbar-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
          <!--begin::Search-->
          <div class="d-flex align-items-stretch">

          </div>
          <!--end::Search-->
          <!--begin::Toolbar wrapper-->
          <div class="d-flex align-items-stretch flex-shrink-0">
            <div class="megaphone d-flex align-items-center ms-1 ms-lg-3">
    <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px" id="kt_notify_button">
    {{-- <i class="fa-thin fa-bell fa-2x text-primary  fa-shake "></i> --}}
</div></div>

            <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
              <!--begin::Menu wrapper-->
              <div class="cursor-pointer symbol symbol-50px symbol-circle" data-kt-menu-trigger="{default: 'click'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                <div class="symbol-label fs-2 fw-bolder text-dark"> <img alt="" src="{{$settings->site_address}}/storage/app/public/photos/{{Auth::user()->profile_photo_path}}" width="50" height="50" style='border-radius: 50%;'></div>
              </div>
              <!--begin::User account menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true" style="">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px symbol-circle me-5">
                      <div class="symbol-label fs-2 fw-bolder text-dark">JO</div>
                    </div>
                    <!--end::Avatar-->

                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                      <div class="fw-bolder d-flex align-items-center fs-5">
                        {{ Auth::user()->name }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}
                      </div>

                      <!-- <div class="fw-semibold text-hover-primary fs-5">
                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="197d7c7476597b7676747a71786b6d37777c6d">[email&#160;protected]</a>
                      </div> -->
                    </div>
                    <!--end::Username-->
                  </div>
                </div>

                <div class="separator"></div>

                <div class="menu-item px-5 mb-0">
                  <a href="{{ route('support') }}" class="menu-link px-5 py-3">
                    <i class="fal fa-clipboard-list-check me-3"></i> Support Ticket
                  </a>
                </div>

                <div class="separator"></div>
                <div class="menu-item px-5 mb-0">
                  <a href="{{ route('profile') }}" class="menu-link px-5 py-3">
                    <i class="fal fa-user me-3"></i> My Profile
                  </a>
                </div>

                <div class="separator"></div>

                <div class="menu-item px-5 mb-0">
                  <a href="{{ route('logout') }}" class="menu-link px-5 py-3" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="fal fa-sign-out me-3"></i> Sign Out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                  {{ csrf_field() }}
                </form>
                </div>
                <!--end::Menu item-->
              </div>
              <!--end::User account menu-->
              <!--end::Menu wrapper-->
            </div>
            <!--end::User -->
            <!--begin::Aside Toggle-->
            <div class="d-flex align-items-center d-lg-none ms-1 ms-lg-3">
              <div class="btn btn-icon btn-icon-dark btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_toggle">
                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                <span class="svg-icon svg-icon-2x">
                  <i class="fa-thin fa-bars"></i>
                </span>
                <!--end::Svg Icon-->
              </div>
            </div>
            <!--end::Aside Toggle-->
          </div>
          <!--end::Toolbar wrapper-->
        </div>
        <!--end::Topbar-->
      </div>
      <!--end::Container-->
    </div>
    @yield('content')

    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
      <!--begin::Container-->
      <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
          <span class="text-muted fw-bold me-2">2023 ©</span>
          <a href="/" target="_blank" class="text-gray-800 text-hover-primary">{{ $settings->site_name }}</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
       
        <!--end::Menu-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::Footer-->
  </div>

  <script src="{{ asset('dash2/konanauth/public/dashboard/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/public/dashboard/js/scripts.bundle.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/public/asset/fonts/fontawesome/js/all.js') }}"></script>
  <script src="{{ asset('dash2/konanauth/public/dashboard/js/custom/general.js') }}"></script>
  
  
  <script src="{{ asset('dash2/konanauth/public/asset/fonts/fontawesome/js/all.js') }}"></script>
<script src="{{ asset('dash2/konanauth/public/vendor/livewire/livewire.js?id=90730a3b0e7144480175') }}" data-turbo-eval="false" data-turbolinks-eval="false" >
</script><script data-turbo-eval="false" data-turbolinks-eval="false" >window.livewire = new Livewire();window.Livewire = window.livewire;window.livewire_app_url = '{{ $settings->site_url}}';window.livewire_token = 'XBojR3fhO5iYl8wefukaV6n5mCsjqnBSdc4GbFMk';window.deferLoadingAlpine = function (callback) {window.addEventListener('livewire:load', function () {callback();});};let started = false;window.addEventListener('alpine:initializing', function () {if (! started) {window.livewire.start();started = true;}});document.addEventListener("DOMContentLoaded", function () {if (! started) {window.livewire.start();started = true;}});</script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>

@if($settings->whatsapp)
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "{{$settings->whatsapp}}", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
            pre_filled_message: "Hello I am", // WhatsApp pre-filled message
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
@endif

<script src="{{  asset('dash2/konanauth/public/dashboard/js/alpine.js')  }}"></script>

 @if($settings->tido)
    <script src="//code.tidio.co/{{$settings->tido}}" async></script>
    @endif

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

