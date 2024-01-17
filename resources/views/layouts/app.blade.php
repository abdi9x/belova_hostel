<!DOCTYPE html>
<html lang=id>

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1,minimum-scale=1">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>{{config('app.name')}} | {{\Request::route()->getName()}}</title>
    <link rel=icon href="{{asset('img/index/belova.png')}}">
    <link rel="stylesheet preload" as=style href="{{asset('css/preload.min.css')}}">
    <link rel="stylesheet preload" as=style href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet preload" as=style href="{{asset('css/libs.min.css')}}">
    <link rel="stylesheet preload" as=style href="{{asset('plugins/MaterialDesign/css/materialdesignicons.min.css')}}">
    @yield('css')
    <link rel=stylesheet href="{{asset('css/floatbutton.min.css')}}">
</head>

<body>
    <header class="header d-flex align-items-center" data-page="{{\Request::route()->getName()}}">
        <div class="container position-relative d-flex justify-content-between align-items-center">
            <a class="brand d-flex align-items-center" href="{{route('home')}}">
                <img class="img" width="84" height="84" src="{{asset('img/index/logo_full.png')}}">
                <span class="brand_name" style="margin-left:12px; white-space: nowrap;"> Premium Hostel</span>
            </a>
            <div class="header_offcanvas offcanvas offcanvas-end" id=menuOffcanvas>
                <div class="header_offcanvas-header d-flex justify-content-between align-content-center"><a class="brand d-flex align-items-center" href={{route('home')}}><span class="brand_logo theme-element"><svg id=brandOffset width=22 height=23 viewBox="0 0 22 23" fill=none xmlns=http://www.w3.org/2000/svg>
                                <path fill-rule=evenodd clip-rule=evenodd d="M7.03198 3.80281V7.07652L3.86083 9.75137L0.689673 12.4263L0.667474 6.56503C0.655304 3.34138 0.663875 0.654206 0.686587 0.593579C0.71907 0.506918 1.4043 0.488223 3.87994 0.506219L7.03198 0.529106V3.80281ZM21.645 4.36419V5.88433L17.0383 9.76316C14.5046 11.8966 11.2263 14.6552 9.75318 15.8934L7.07484 18.145V20.3225V22.5H3.85988H0.64502L0.667303 18.768L0.689673 15.036L2.56785 13.4609C3.60088 12.5946 6.85989 9.85244 9.81009 7.36726L15.1741 2.84867L18.4096 2.8464L21.645 2.84413V4.36419ZM21.645 15.5549V22.5H18.431H15.217V18.2638V14.0274L15.4805 13.7882C15.8061 13.4924 21.5939 8.61606 21.6236 8.61248C21.6353 8.61099 21.645 11.7351 21.645 15.5549Z" fill=currentColor />
                            </svg> </span><span class=brand_name>Hosteller</span> </a><button class=close type=button data-bs-dismiss=offcanvas><i class=icon-close--entypo></i></button></div>
                <nav class=header_nav>
                    <ul class=header_nav-list>
                        <li class="header_nav-list_item"><a class="nav-item" href="{{route('home')}}" data-page="home">Beranda</a></li>
                        <li class=header_nav-list_item><a class=nav-item href="{{route('fasilitas')}}" data-page=fasilitas>Fasilitas</a></li>
                        <li class="header_nav-list_item"><a class="nav-item" href="{{route('Pilihan-Kamar')}}" data-page="Pilihan-Kamar">Pilihan Kamar</a></li>
                        <li class="header_nav-list_item"><a class="nav-item" href="{{route('galeri-foto')}}" data-page="galeri-foto">Galeri</a></li>
                        <li class="header_nav-list_item dropdown"><a class="nav-link nav-link--contacts dropdown-toggle d-inline-flex align-items-center" href=# data-bs-toggle=collapse data-bs-target=#contactsMenu aria-expanded=false aria-controls=contactsMenu>Hubungi Admin <i class="icon-chevron_down--entypo icon"></i></a>
                            <div class="dropdown-menu collapse" id=contactsMenu>
                                <ul class=dropdown-list>
                                <li class=list-item><a class="dropdown-item nav-item" data-page="contacts01" href="https://www.instagram.com/belovacenterliving/" target="_blank"><i class="mdi mdi-instagram icon"></i> Instagram</a></li>
                                    <li class=list-item><a class="dropdown-item nav-item" data-page=contacts01 href="https://wa.me/6285100990139" target="_blank"><i class="icon-whatsapp icon"></i> Admin 1</a></li>
                                    <li class=list-item><a class="dropdown-item nav-item" data-page=contacts02 href="https://wa.me/6285100990139" target="_blank"><i class="icon-whatsapp icon"></i> Admin 2</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <ul class="socials d-flex align-items-center">
                    <li class=list-item><a class=link href="#"><i class=icon-facebook></i></a></li>
                    <li class=list-item><a class=link href="#"><i class=icon-instagram></i></a></li>
                    <li class=list-item><a class=link href="#"><i class=icon-twitter></i></a></li>
                    <li class=list-item><a class=link href="#"><i class=icon-whatsapp></i></a></li>
                </ul>
            </div><button class="header_trigger d-lg-none" type=button data-bs-toggle=offcanvas data-bs-target=#menuOffcanvas><i class=icon-stream></i></button>
        </div>
    </header>

    @yield('content')

    <footer class="footer accent">
        <div class=container>
            <div class="footer_main d-sm-flex flex-wrap flex-lg-nowrap justify-content-between">
                <div class="footer_main-block footer_main-block--about col-sm-7 col-lg-auto d-flex flex-column">
                    <a class="brand d-flex align-items-center" href="{{route('home')}}">
                        <img class="img" width="84" height="84" src="{{asset('img/index/logo_full.png')}}">
                        <span class="brand_name" style="margin-left:12px; white-space: nowrap;"> Premium Hostel</span>
                    </a>
                    <p class=footer_main-block_text>Penyedia Layanan kos (Hostel) dengan fasilitas lengkap, standar kamar premium terletak di pusat kota Solo</p>
                </div>
                <div class="footer_main-block footer_main-block--nav col-sm-6 col-lg-auto">
                    <h4 class=footer_main-block_header>Quick links</h4>
                    <ul class="footer_main-block_nav d-flex flex-lg-column">
                        <li class=list-item><a class="link underlined underlined--white nav-item" data-page=home href="{{route('home')}}">Beranda</a></li>
                        <li class=list-item><a class="link underlined underlined--white nav-item" data-page=fasilitas href="{{route('fasilitas')}}">Fasilitas</a></li>
                        <li class=list-item><a class="link underlined underlined--white nav-item" data-page=Pilihan-Kamar href="{{route('Pilihan-Kamar')}}">Pilihan Kamar</a></li>
                        <li class=list-item><a class="link underlined underlined--white nav-item" data-page=galeri-foto href="{{route('galeri-foto')}}">Galeri</a></li>
                    </ul>
                </div>
                <div class="footer_main-block footer_main-block--contacts col-sm-5 col-lg-auto">
                    <h4 class=footer_main-block_header>Contact Us</h4>
                    <ul class=footer_main-block_contacts>
                        <li class="list-item d-flex"><i class="icon-location icon"></i>
                            <p class=wrapper><span class=linebreak>54826 Fadel Circles </span><span class=linebreak>Darrylstad, AZ 90995</span></p>
                        </li>
                        <li class="list-item d-flex"><span class="icon-call icon"><svg width=28 height=29 viewBox="0 0 28 29" fill=none xmlns=http://www.w3.org/2000/svg>
                                    <path d="M26.9609 19.75L21 17.1797C20.7812 17.125 20.5625 17.0703 20.3438 17.0703C19.7969 17.0703 19.3047 17.2891 19.0312 17.6719L16.625 20.625C12.7969 18.7656 9.73438 15.7031 7.875 11.875L10.8281 9.46875C11.2109 9.19531 11.4297 8.70312 11.4297 8.15625C11.4297 7.9375 11.375 7.71875 11.3203 7.5L8.75 1.53906C8.47656 0.9375 7.875 0.5 7.21875 0.5C7.05469 0.5 6.94531 0.554688 6.83594 0.554688L1.3125 1.86719C0.546875 2.03125 0 2.6875 0 3.50781C0 17.3438 11.2109 28.5 24.9922 28.5C25.8125 28.5 26.4688 27.9531 26.6875 27.1875L27.9453 21.6641C27.9453 21.5547 27.9453 21.4453 27.9453 21.2812C27.9453 20.625 27.5625 20.0234 26.9609 19.75ZM24.9375 26.75C12.1406 26.75 1.75 16.3594 1.75 3.5625L7.16406 2.30469L9.67969 8.15625L5.6875 11.4375C8.36719 17.0703 11.4297 20.1328 17.1172 22.8125L20.3438 18.8203L26.1953 21.3359L24.9375 26.75Z" fill=currentColor />
                                </svg></span>
                            <p class="wrapper d-flex flex-column"><a class=link href=tel:+1234567890>(329) 580-7077</a>
                                <a class=link href=tel:+1234567890>(650) 382-5020</a>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="footer_main-block footer_main-block--follow col-sm-5 col-lg-auto d-flex flex-column">
                    <h4 class=footer_main-block_header>Follow Us</h4>
                    <p class=footer_main-block_text>Venenatis urna cursus eget nunc scelerisque</p>
                    <ul class="socials d-flex align-items-center">
                        <li class=list-item><a class=link href="#"><i class=icon-facebook></i></a></li>
                        <li class=list-item><a class=link href="https://www.instagram.com/belovacenterliving/" target="_blank"><i class=icon-instagram></i></a></li>
                        <li class=list-item><a class=link href="#"><i class=icon-twitter></i></a></li>
                        <li class=list-item><a class=link href="#"><i class=icon-whatsapp></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=footer_copyright>
            <div class=container>
                <p class=footer_copyright-text><span class=linebreak>Belova.id &copy; <?= date('Y') ?></span> <span class=linebreak>All rights reserved</span></p>
            </div>
        </div>
    </footer>
    
    <script src="{{asset('js/common.min.js')}}"></script>
    <script src="{{asset('js/index.min.js')}}"></script>
    <script src="{{asset('js/gallery.min.js')}}"></script>
    <!-- <script src=js/demo.js></script> -->
    @yield('page_js')
</body>

</html>