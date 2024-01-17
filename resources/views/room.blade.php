@extends('layouts.app')
@section('css')
<link rel=stylesheet href="{{asset('css/room.min.css')}}">
@endsection
@section('content')
<?php
function thousandsCurrencyFormat($n, $precision = 2)
{
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'jt';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
    // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ($precision > 0) {
        $dotzero = '.' . str_repeat('0', $precision);
        $n_format = str_replace($dotzero, '', $n_format);
    }

    return $n_format . $suffix;
}
?>
<header class=page>
    <div class=container>
        <ul class="breadcrumbs d-flex flex-wrap align-content-center">
            <li class=list-item><a class=link href="{{route('home')}}">Home</a></li>
            <li class=list-item><a class=link href="{{route('Pilihan-Kamar')}}">Pilihan Kamar</a></li>
            <li class=list-item><a class=link href=#>{{$room->category_name}}</a></li>
        </ul>
        <h1 class=page_title>{{$room->category_name}}</h1>
    </div>
</header>
<main>
    <div class="room section">
        <div class=container>
            <div class="room_main d-lg-flex flex-wrap align-items-start">
                <div class="room_main-slider col-12 d-lg-flex">
                    <div class="room_main-slider_view col-lg-8">
                        <div class=swiper-wrapper>
                            @if(count($room->images) > 0)
                            @foreach($room->images as $image)
                            <div class="swiper-slide">
                                <picture>
                                    <source data-srcset="{{config('app.image_path')}}{{$image->image}}" srcset="{{config('app.image_path')}}{{$image->image}}">
                                    <img class=lazy data-src="{{config('app.image_path')}}{{$image->image}}" src="{{config('app.image_path')}}{{$image->image}}" alt=media>
                                </picture>
                            </div>
                            @endforeach
                            @else
                            <div class="swiper-slide">
                                <picture>
                                    <source data-srcset="{{config('app.image_path')}}default.png" srcset="{{config('app.image_path')}}default.png">
                                    <img class=lazy data-src="{{config('app.image_path')}}default.png" src="{{config('app.image_path')}}default.png" alt=media>
                                </picture>
                            </div>
                            @endif
                        </div>
                        <div class="swiper-controls d-flex align-items-center justify-content-between"><a class="swiper-button-prev d-inline-flex align-items-center justify-content-center" href=#><i class="icon-arrow_left icon"></i> </a><a class="swiper-button-next d-inline-flex align-items-center justify-content-center" href=#><i class="icon-arrow_right icon"></i></a></div>
                    </div>
                    <div class=room_main-slider_thumbs>
                        <div class=swiper-wrapper>
                            @if(count($room->images) > 0)
                            @foreach($room->images as $image)
                            <div class="swiper-slide">
                                <picture>
                                    <source data-srcset="{{config('app.image_path')}}{{$image->image}}" srcset="{{config('app.image_path')}}{{$image->image}}">
                                    <img class=lazy data-src="{{config('app.image_path')}}{{$image->image}}" src="{{config('app.image_path')}}{{$image->image}}" alt=media>
                                </picture>
                            </div>
                            @endforeach
                            @else
                            <div class=swiper-slide>
                                <picture>
                                    <source data-srcset="{{config('app.image_path')}}default.png" srcset="{{config('app.image_path')}}default.png">
                                    <img class=lazy data-src="{{config('app.image_path')}}default.png" src="{{config('app.image_path')}}default.png" alt=media>
                                </picture>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="room_main-info col-lg-8">
                    <div class="amenities d-flex flex-wrap align-items-center"><span class="amenities_item d-inline-flex align-items-center"><i class="icon-user icon"></i> 1 Orang</span><span class="amenities_item d-inline-flex align-items-center"><i class="icon-twin_bed icon"></i> 1 Single Bed </span></div>
                    <div class=description>
                        <p class=description_text>Informasi: {{$room->notes}}</p>
                    </div>
                    <section class=facilities>
                        <h4 class=facilities_header>Fasilitas Kamar</h4>
                        <div class="facilities_list d-sm-flex flex-wrap">
                            <div class=facilities_list-block>
                                <span class="facilities_list-block_item d-flex align-items-center">
                                    <i class="mdi mdi-wifi-arrow-up-down icon"></i> Free High Speed Wifi
                                </span>
                                <span class="facilities_list-block_item d-flex align-items-center">
                                    <i class="mdi mdi-air-conditioner icon"></i> Air Conditioner
                                </span>
                                <span class="facilities_list-block_item d-flex align-items-center">
                                    <i class="mdi mdi-television icon"></i> TV LCD 32"
                                </span>
                            </div>
                            <div class=facilities_list-block>
                                <span class="facilities_list-block_item d-flex align-items-center">
                                    <i class="mdi mdi-shower-head icon"></i> Kamar Mandi Dalam
                                </span>
                                <span class="facilities_list-block_item d-flex align-items-center">
                                    <i class="mdi mdi-water-boiler icon"></i> Water Heater
                                </span>

                            </div>
                        </div>
                    </section>
                    <section class=rules>
                        <h4 class=rules_header>Peraturan</h4>
                        <div class="rules_list d-md-flex flex-lg-wrap">
                            <div class=rules_list-block>
                                <p class="rules_list-block_item d-flex align-items-baseline">
                                    <i class="icon-check icon"></i> 1 Kamar hanya boleh diisi 1 orang saja
                                </p>
                                <p class="rules_list-block_item d-flex align-items-baseline">
                                    <i class="icon-check icon"></i> Tamu lawan jenis tidak diperbolehkan memasuki kamar
                                </p>
                                <p class="rules_list-block_item d-flex align-items-baseline">
                                    <i class="icon-check icon"></i> Batas Maksimum jam kunjung tamu adalah pukul 21:00
                                </p>
                            </div>
                            <!-- <div class=rules_list-block>
                                <p class="rules_list-block_item d-flex align-items-baseline"><i class="icon-check icon"></i> Cum sociis natoque penatibus et. Sed elementum
                                    tempus egestas sed</p>
                                <p class="rules_list-block_item rules_list-block_item--highlight d-flex align-items-start">
                                    <i class="icon-check icon"></i> Volutpat odio facilisis mauris sit amet massa
                                    vitae tortor condimentum. Quam elementum pulvinar etiam non quam lacus
                                    suspendisse. Eget gravida cum sociis natoque
                                </p>
                            </div> -->
                        </div>
                    </section>

                </div>
                <div class="room_main-cards col-lg-4">
                    <div class=room_main-cards_card>
                        @if(count($room->pricelist)>0)
                        @foreach($room->pricelist as $price)
                        <span class=pricing><span class="pricing_price h4"><i class="mdi mdi-circle icon"></i> <?= 'Rp ' . thousandsCurrencyFormat($price->price) ?></span> /{{$price->jangka_waktu.' '.$price->jangka_sewa}} </span>
                        @endforeach
                        @else
                        <span class=pricing><span class="pricing_price h4"><i class="mdi mdi-circle icon"></i> Call Us</span></span>
                        @endif
                    </div>
                    <div class="room_main-cards_card accent">
                        <h3 class=title>Stay Longer, Save More</h3>
                        <p class=text>It's simple: the longer you stay, the more you save!</p>
                        <div class=content>
                            <p class=text>Save up to <b>20%</b> off the monthly rate on stays between 6-12 months
                            <p class=text>Save up to <b>30%</b> on yearly rate for stays longer than 1 Year</p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="rooms section--blockbg section">
        <div class=block></div>
        <div class=container>
            <div class="rooms_header d-sm-flex justify-content-between align-items-center">
                <h2 class=rooms_header-title data-aos=fade-right>Pilihan Kamar Lainnya</h2>
            </div>
            <ul class="rooms_list d-md-flex flex-wrap">
                @foreach($rooms->take(2) as $room)
                <?php
                if (count($room->pricelist) > 0) {
                    $price = 'Rp ' . thousandsCurrencyFormat($room->pricelist[0]->price);
                } else {
                    $price = 'Call Us';
                }
                if (count($room->images) > 0) {
                    $img = $room->images[0]->image;
                } else {
                    $img = 'default.jpg';
                }
                ?>
                <li class="rooms_list-item col-md-6 col-xl-4" data-order=1 data-aos=fade-up>
                    <div class="item-wrapper d-md-flex flex-column">
                        <div class=media>
                            <picture>
                                <source data-srcset="{{config('app.image_path')}}{{$img}}" srcset="{{config('app.image_path')}}{{$img}}">
                                <img class=lazy data-src="{{config('app.image_path')}}{{$img}}" src="{{config('app.image_path')}}{{$img}}" alt=media>
                            </picture>
                            <span class="media_label media_label--pricing">Start From | <span class="price h4">{{$price}}</span></span>
                        </div>
                        <div class="main d-md-flex flex-column justify-content-between flex-grow-1"><a class="main_title h4" href="{{route('view_room',$room->slug)}}" data-shave=true>{{$room->category_name}}</a>
                            <div class=main_amenities>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="icon-user icon"></i> 1 Sleeps
                                </span>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="icon-twin_bed icon"></i> 1 Single bed
                                </span>
                            </div>
                            <a class="link link--arrow d-inline-flex align-items-center" href="{{route('view_room',$room->slug)}}">Selengkapnya <i class="icon-arrow_right icon"></i>
                            </a>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </section>
    <section class="about_stages section">
        <div class="container d-xl-flex align-items-center">
            <div class="about_stages-main col-xl-6">
                <h2 class=about_stages-main_header data-aos=fade-right>Langkah untuk Booking</h2>
                <ul class=about_stages-main_list>
                    <li class="list-item d-flex align-items-sm-center" data-aos=fade-up>
                        <div class=media><span class=theme-element><svg width=40 height=40 viewBox="0 0 40 40" fill=none xmlns=http://www.w3.org/2000/svg>
                                    <path fill-rule=evenodd clip-rule=evenodd d="M36.6667 5.33333H36V2C36 0.897333 35.1027 0 34 0H32.6667C31.564 0 30.6667 0.897333 30.6667 2V5.33333H9.33333V2C9.33333 0.897333 8.436 0 7.33333 0H6C4.89733 0 4 0.897333 4 2V5.33333H3.33333C1.49533 5.33333 0 6.82867 0 8.66667V36.6667C0 38.5047 1.49533 40 3.33333 40H36.6667C38.5047 40 40 38.5047 40 36.6667V8.66667C40 6.82867 38.5047 5.33333 36.6667 5.33333ZM32 6V2C32 1.632 32.2987 1.33333 32.6667 1.33333H34C34.368 1.33333 34.6667 1.632 34.6667 2V6V8.66667C34.6667 9.03467 34.368 9.33333 34 9.33333H32.6667C32.2987 9.33333 32 9.03467 32 8.66667V6ZM5.33333 2V6V8.66667C5.33333 9.03467 5.632 9.33333 6 9.33333H7.33333C7.70133 9.33333 8 9.03467 8 8.66667V6V2C8 1.632 7.70133 1.33333 7.33333 1.33333H6C5.632 1.33333 5.33333 1.632 5.33333 2ZM38.6667 36.6667C38.6667 37.7693 37.7693 38.6667 36.6667 38.6667H3.33333C2.23067 38.6667 1.33333 37.7693 1.33333 36.6667V17.3333H38.6667V36.6667ZM1.33333 16H38.6667V8.66667C38.6667 7.564 37.7693 6.66667 36.6667 6.66667H36V8.66667C36 9.76933 35.1027 10.6667 34 10.6667H32.6667C31.564 10.6667 30.6667 9.76933 30.6667 8.66667V6.66667H9.33333V8.66667C9.33333 9.76933 8.436 10.6667 7.33333 10.6667H6C4.89733 10.6667 4 9.76933 4 8.66667V6.66667H3.33333C2.23067 6.66667 1.33333 7.564 1.33333 8.66667V16Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M13.238 8H27.9046C28.2733 8 28.5713 8.31929 28.5713 8.71429V13C28.5713 13.395 28.2733 13.7143 27.9046 13.7143H13.238C12.8693 13.7143 12.5713 13.395 12.5713 13V8.71429C12.5713 8.31929 12.8693 8 13.238 8ZM13.9046 12.2857H27.238V9.42857H13.9046V12.2857Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M4.143 19.4285H8.42871C8.82371 19.4285 9.143 19.7204 9.143 20.0815V23.3468C9.143 23.708 8.82371 23.9999 8.42871 23.9999H4.143C3.748 23.9999 3.42871 23.708 3.42871 23.3468V20.0815C3.42871 19.7204 3.748 19.4285 4.143 19.4285ZM4.85728 22.6938H7.71443V20.7346H4.85728V22.6938Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M13.2856 19.4285H17.5713C17.9663 19.4285 18.2856 19.7204 18.2856 20.0815V23.3468C18.2856 23.708 17.9663 23.9999 17.5713 23.9999H13.2856C12.8906 23.9999 12.5713 23.708 12.5713 23.3468V20.0815C12.5713 19.7204 12.8906 19.4285 13.2856 19.4285ZM13.9999 22.6938H16.857V20.7346H13.9999V22.6938Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M22.4282 19.4285H26.7139C27.1089 19.4285 27.4282 19.7204 27.4282 20.0815V23.3468C27.4282 23.708 27.1089 23.9999 26.7139 23.9999H22.4282C22.0332 23.9999 21.7139 23.708 21.7139 23.3468V20.0815C21.7139 19.7204 22.0332 19.4285 22.4282 19.4285ZM23.1424 22.6938H25.9996V20.7346H23.1424V22.6938Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M31.5717 19.4285H35.8574C36.2524 19.4285 36.5717 19.7204 36.5717 20.0815V23.3468C36.5717 23.708 36.2524 23.9999 35.8574 23.9999H31.5717C31.1767 23.9999 30.8574 23.708 30.8574 23.3468V20.0815C30.8574 19.7204 31.1767 19.4285 31.5717 19.4285ZM32.286 22.6938H35.1431V20.7346H32.286V22.6938Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M4.143 26.2856H8.42871C8.82371 26.2856 9.143 26.5776 9.143 26.9387V30.204C9.143 30.5652 8.82371 30.8571 8.42871 30.8571H4.143C3.748 30.8571 3.42871 30.5652 3.42871 30.204V26.9387C3.42871 26.5776 3.748 26.2856 4.143 26.2856ZM4.85728 29.551H7.71443V27.5918H4.85728V29.551Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M13.2856 26.2856H17.5713C17.9663 26.2856 18.2856 26.5776 18.2856 26.9387V30.204C18.2856 30.5652 17.9663 30.8571 17.5713 30.8571H13.2856C12.8906 30.8571 12.5713 30.5652 12.5713 30.204V26.9387C12.5713 26.5776 12.8906 26.2856 13.2856 26.2856ZM13.9999 29.551H16.857V27.5918H13.9999V29.551Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M22.4282 26.2856H26.7139C27.1089 26.2856 27.4282 26.5776 27.4282 26.9387V30.204C27.4282 30.5652 27.1089 30.8571 26.7139 30.8571H22.4282C22.0332 30.8571 21.7139 30.5652 21.7139 30.204V26.9387C21.7139 26.5776 22.0332 26.2856 22.4282 26.2856ZM23.1424 29.551H25.9996V27.5918H23.1424V29.551Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M31.5717 26.2856H35.8574C36.2524 26.2856 36.5717 26.5776 36.5717 26.9387V30.204C36.5717 30.5652 36.2524 30.8571 35.8574 30.8571H31.5717C31.1767 30.8571 30.8574 30.5652 30.8574 30.204V26.9387C30.8574 26.5776 31.1767 26.2856 31.5717 26.2856ZM32.286 29.551H35.1431V27.5918H32.286V29.551Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M4.143 33.1428H8.42871C8.82371 33.1428 9.143 33.4347 9.143 33.7959V37.0612C9.143 37.4223 8.82371 37.7143 8.42871 37.7143H4.143C3.748 37.7143 3.42871 37.4223 3.42871 37.0612V33.7959C3.42871 33.4347 3.748 33.1428 4.143 33.1428ZM4.85728 36.4081H7.71443V34.4489H4.85728V36.4081Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M13.2856 33.1428H17.5713C17.9663 33.1428 18.2856 33.4347 18.2856 33.7959V37.0612C18.2856 37.4223 17.9663 37.7143 17.5713 37.7143H13.2856C12.8906 37.7143 12.5713 37.4223 12.5713 37.0612V33.7959C12.5713 33.4347 12.8906 33.1428 13.2856 33.1428ZM13.9999 36.4081H16.857V34.4489H13.9999V36.4081Z" fill=currentColor />
                                    <path d="M27.4588 32L24.3479 35.0869L22.7371 33.755L21.7139 34.601L23.8848 36.3961C24.0201 36.5092 24.2046 36.5714 24.3964 36.5714C24.4072 36.5714 24.4181 36.5714 24.4289 36.5708C24.6323 36.5631 24.8219 36.4853 24.9528 36.3566L28.571 32.7665L27.4588 32Z" fill=currentColor />
                                    <path d="M35.4588 32L32.3479 35.0869L30.7371 33.755L29.7139 34.601L31.8848 36.3961C32.0201 36.5092 32.2046 36.5714 32.3964 36.5714C32.4072 36.5714 32.4181 36.5714 32.4289 36.5708C32.6323 36.5631 32.8219 36.4853 32.9528 36.3566L36.571 32.7665L35.4588 32Z" fill=currentColor />
                                </svg></span></div>
                        <div class=main>
                            <h4 class=main_title>Reservasi kepada Admin</h4>
                            <p class=main_text>Silahkan menghubungi admin untuk ketersediaan kamar dan reservasi</p>
                        </div>
                    </li>
                    <li class="list-item d-flex align-items-sm-center" data-aos=fade-up data-aos-delay=50>
                        <div class=media><span class=theme-element><svg width=40 height=40 viewBox="0 0 40 40" fill=none xmlns=http://www.w3.org/2000/svg>
                                    <path fill-rule=evenodd clip-rule=evenodd d="M39.3333 23.4906C39.702 23.4906 40 23.1947 40 22.8302V14.9057C40 14.5411 39.702 14.2453 39.3333 14.2453H29.0353C28.6387 13.3577 27.8647 12.6716 26.9153 12.4022L26.4793 12.2787C27.0153 11.5265 27.3333 10.6112 27.3333 9.62264C27.3333 7.07359 25.2393 5 22.6667 5C20.094 5 18 7.07359 18 9.62264C18 10.6997 18.3767 11.6896 19.0027 12.4768L18.2607 12.7707C17.838 12.9377 17.462 13.1841 17.1413 13.5017L15.0573 15.566H10.3333C9.04667 15.566 8 16.6028 8 17.8774C8 18.2333 8.08867 18.5668 8.234 18.8679H2C1.63133 18.8679 1.33333 19.1638 1.33333 19.5283V24.8113H0.666667C0.298 24.8113 0 25.1072 0 25.4717V28.1132C0 28.3338 0.111333 28.5398 0.296667 28.6626L2.29667 29.9834C2.406 30.0554 2.53533 30.0943 2.66667 30.0943H3.33333V39.3396C3.33333 39.7042 3.63133 40 4 40H36C36.3687 40 36.6667 39.7042 36.6667 39.3396V30.0943H37.3333C37.4647 30.0943 37.594 30.0554 37.7033 29.9834L39.7033 28.6626C39.8887 28.5398 40 28.3338 40 28.1132V25.4717C40 25.1072 39.702 24.8113 39.3333 24.8113H34.6667V23.4906H39.3333ZM22.6667 6.32075C24.5047 6.32075 26 7.80198 26 9.62264C26 10.6858 25.4813 11.6236 24.6907 12.2278C24.602 12.2952 24.5133 12.3619 24.4193 12.4193C24.382 12.4424 24.3432 12.4623 24.3043 12.4823C24.2842 12.4926 24.264 12.503 24.244 12.5138C23.4507 12.9278 22.5047 13.0124 21.6527 12.7522C21.6457 12.7499 21.6387 12.7478 21.6316 12.7458L21.6191 12.7421L21.619 12.7421L21.619 12.7421L21.619 12.7421C21.6034 12.7376 21.5878 12.7331 21.5727 12.7277C21.4387 12.6835 21.3093 12.6254 21.182 12.564C21.1087 12.5276 21.0367 12.4893 20.9667 12.4477C20.8747 12.3942 20.7847 12.3361 20.698 12.2734C19.8747 11.6705 19.3333 10.7109 19.3333 9.62264C19.3333 7.80198 20.8287 6.32075 22.6667 6.32075ZM15.3333 16.8868H10.3333C9.782 16.8868 9.33333 17.3312 9.33333 17.8774C9.33333 18.4235 9.782 18.8679 10.3333 18.8679H11.3333H16.4447L18.9333 17.0189C19.1353 16.869 19.406 16.8445 19.6313 16.9561C19.8573 17.0684 20 17.2969 20 17.5472V24.8113H28V23.4906H26.6667C26.298 23.4906 26 23.1947 26 22.8302V14.9057C26 14.5411 26.298 14.2453 26.6667 14.2453H27.472C27.2267 13.9752 26.908 13.7738 26.5487 13.6721L25.4187 13.3525C25.4127 13.3567 25.4063 13.3602 25.4 13.3637L25.4 13.3637C25.3937 13.3671 25.3873 13.3706 25.3813 13.3749C24.6153 13.9204 23.6793 14.2453 22.6667 14.2453C21.9713 14.2453 21.314 14.0894 20.7207 13.818C20.7119 13.8141 20.7033 13.8099 20.6949 13.8057L20.678 13.7975C20.4787 13.7038 20.2847 13.5994 20.102 13.4799C20.0992 13.4781 20.0962 13.4766 20.0934 13.4752C20.0901 13.4737 20.0868 13.4721 20.084 13.47L18.756 13.9963C18.5027 14.0974 18.2767 14.2446 18.0853 14.4348L15.8047 16.6933C15.68 16.8175 15.5107 16.8868 15.3333 16.8868ZM18.6667 18.8679V24.8113H12V20.1887H16.6667C16.8113 20.1887 16.9513 20.1425 17.0667 20.0566L18.6667 18.8679ZM10.3333 20.1887H2.66667V24.8113H10.6667V20.1887H10.3333ZM38.6667 26.1321V27.7599L37.1313 28.7736H36C35.6313 28.7736 35.3333 29.0694 35.3333 29.434V38.6792H4.66667V29.434C4.66667 29.0694 4.36867 28.7736 4 28.7736H2.86867L1.33333 27.7599V26.1321H2H11.3333H19.3333H28.6667H31.3333H34H38.6667ZM29.3333 23.4906V24.8113H30.6667V23.4906H29.3333ZM32 24.8113V23.4906H33.3333V24.8113H32ZM31.3333 22.1698H34H38.6667V15.566H28.57H27.3333V22.1698H28.6667H31.3333Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M0 6C0 2.692 2.69133 0 6 0C9.30867 0 12 2.692 12 6C12 9.308 9.30867 12 6 12C2.69133 12 0 9.308 0 6ZM6.66667 9.33333V10.6133C8.706 10.3193 10.3193 8.706 10.6133 6.66667H9.33333V5.33333H10.6133C10.3193 3.294 8.706 1.68067 6.66667 1.38667V2.66667H5.33333V1.38667C3.294 1.68067 1.68067 3.294 1.38667 5.33333H2.66667V6.66667H1.38667C1.68067 8.706 3.294 10.3193 5.33333 10.6133V9.33333H6.66667Z" fill=currentColor />
                                    <path d="M7.01644 3L5.59705 5.19896L4.86922 4.35167L4 5.36185L5.22945 6.79068C5.34501 6.9257 5.50115 7 5.66405 7C5.67819 7 5.69295 6.99929 5.7077 6.99857C5.88535 6.98357 6.04887 6.87998 6.15583 6.71495L8 3.8573L7.01644 3Z" fill=currentColor />
                                </svg></span></div>
                        <div class=main>
                            <h4 class=main_title>Dokumen & Pembayaran</h4>
                            <p class=main_text>Lengkapi dokumen dokumen identitas dan lakukan pembayaran</p>
                        </div>
                    </li>
                    <li class="list-item d-flex align-items-sm-center" data-aos=fade-up data-aos-delay=100>
                        <div class=media><span class=theme-element><svg width=40 height=38 viewBox="0 0 40 38" fill=none xmlns=http://www.w3.org/2000/svg>
                                    <path fill-rule=evenodd clip-rule=evenodd d="M10 20H36.6667C38.5047 20 40 18.5047 40 16.6667V3.33333C40 1.49533 38.5047 0 36.6667 0H10C8.162 0 6.66667 1.49533 6.66667 3.33333V10.226C2.75067 11.912 0 15.8067 0 20.3333C0 24.8647 2.75533 28.7627 6.678 30.446C6.67691 30.4763 6.67481 30.5063 6.67272 30.5362L6.67271 30.5362C6.66969 30.5794 6.66667 30.6226 6.66667 30.6667C6.66667 34.71 9.95667 38 14 38C16.7653 38 19.2827 36.444 20.53 34H36.6667C36.8693 34 37.0607 33.908 37.1873 33.75L39.854 30.4167C39.9667 30.2753 40.0173 30.0953 39.9947 29.916C39.972 29.7367 39.8773 29.5747 39.7333 29.4667L37.0667 27.4667C36.9513 27.38 36.8113 27.3333 36.6667 27.3333H35.3333C35.1107 27.3333 34.9027 27.4447 34.7787 27.63L33.8967 28.9533L32.4713 27.528C32.3467 27.4033 32.1773 27.3333 32 27.3333H30.6667C30.298 27.3333 30 27.6313 30 28V29.3333H28.4807L27.966 27.7893C27.8747 27.5167 27.6207 27.3333 27.3333 27.3333H24.6667C24.444 27.3333 24.236 27.4447 24.112 27.63L23.3333 28.798L22.5547 27.63C22.4307 27.4447 22.2227 27.3333 22 27.3333H20.53C19.2827 24.8893 16.766 23.3333 14 23.3333C10.512 23.3333 7.59 25.7833 6.852 29.0513C3.59467 27.4947 1.33333 24.1773 1.33333 20.3333C1.33333 16.562 3.50933 13.2973 6.66667 11.7047V16.6667C6.66667 18.5047 8.162 20 10 20ZM8 11.1493C8.674 10.9287 9.37933 10.7793 10.1087 10.712C10.422 11.8353 11.444 12.6667 12.6667 12.6667C14.1373 12.6667 15.3333 11.4707 15.3333 10C15.3333 8.52933 14.1373 7.33333 12.6667 7.33333C11.4107 7.33333 10.3613 8.20867 10.08 9.38C9.36467 9.43933 8.67 9.56933 8 9.76V3.33333C8 2.23067 8.89733 1.33333 10 1.33333H36.6667C37.7693 1.33333 38.6667 2.23067 38.6667 3.33333V16.6667C38.6667 17.7693 37.7693 18.6667 36.6667 18.6667H10C8.89733 18.6667 8 17.7693 8 16.6667V11.1493ZM12.6667 8.66667C12.1753 8.66667 11.75 8.93667 11.5187 9.33333H12.6667V10.6667H11.5187C11.75 11.0633 12.1753 11.3333 12.6667 11.3333C13.402 11.3333 14 10.7353 14 10C14 9.26467 13.402 8.66667 12.6667 8.66667ZM11 30C10.9744 30 10.9494 29.9982 10.9243 29.9963C10.9017 29.9946 10.8791 29.993 10.856 29.9927C11.0887 29.6 11.512 29.3333 12 29.3333C12.7353 29.3333 13.3333 29.9313 13.3333 30.6667C13.3333 31.402 12.7353 32 12 32C11.506 32 11.078 31.7267 10.848 31.3253C10.8709 31.3259 10.8933 31.3276 10.9158 31.3292L10.9158 31.3292L10.9159 31.3292C10.9437 31.3313 10.9716 31.3333 11 31.3333H12V30H11ZM14.6667 30.6667C14.6667 32.1373 13.4707 33.3333 12 33.3333C10.7127 33.3333 9.63533 32.4167 9.38733 31.2013C8.91867 31.132 8.45933 31.0367 8.012 30.91C8.14133 34.1053 10.7733 36.6667 14 36.6667C16.3833 36.6667 18.5413 35.2533 19.4973 33.0667C19.6033 32.8233 19.8433 32.6667 20.108 32.6667H36.3467L38.3827 30.1207L36.4447 28.6667H35.69L34.5547 30.37C34.444 30.536 34.2647 30.644 34.066 30.6633C33.8647 30.682 33.67 30.6127 33.5287 30.4713L31.724 28.6667H31.3333V30C31.3333 30.3687 31.0353 30.6667 30.6667 30.6667H28C27.7127 30.6667 27.4587 30.4833 27.3673 30.2107L26.8527 28.6667H25.0233L23.888 30.37C23.6407 30.7413 23.026 30.7413 22.7787 30.37L21.6433 28.6667H20.108C19.8433 28.6667 19.6033 28.5093 19.4973 28.2667C18.5413 26.08 16.3833 24.6667 14 24.6667C11.0713 24.6667 8.62933 26.7773 8.10733 29.5567C8.54733 29.6953 9.00467 29.792 9.46933 29.8667C9.81133 28.7887 10.81 28 12 28C13.4707 28 14.6667 29.196 14.6667 30.6667Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M10 20H36.6667C38.5047 20 40 18.5047 40 16.6667V3.33333C40 1.49533 38.5047 0 36.6667 0H10C8.162 0 6.66667 1.49533 6.66667 3.33333V10.226C2.75067 11.912 0 15.8067 0 20.3333C0 24.8647 2.75533 28.7627 6.678 30.446C6.67691 30.4763 6.67481 30.5063 6.67272 30.5362L6.67271 30.5362C6.66969 30.5794 6.66667 30.6226 6.66667 30.6667C6.66667 34.71 9.95667 38 14 38C16.7653 38 19.2827 36.444 20.53 34H36.6667C36.8693 34 37.0607 33.908 37.1873 33.75L39.854 30.4167C39.9667 30.2753 40.0173 30.0953 39.9947 29.916C39.972 29.7367 39.8773 29.5747 39.7333 29.4667L37.0667 27.4667C36.9513 27.38 36.8113 27.3333 36.6667 27.3333H35.3333C35.1107 27.3333 34.9027 27.4447 34.7787 27.63L33.8967 28.9533L32.4713 27.528C32.3467 27.4033 32.1773 27.3333 32 27.3333H30.6667C30.298 27.3333 30 27.6313 30 28V29.3333H28.4807L27.966 27.7893C27.8747 27.5167 27.6207 27.3333 27.3333 27.3333H24.6667C24.444 27.3333 24.236 27.4447 24.112 27.63L23.3333 28.798L22.5547 27.63C22.4307 27.4447 22.2227 27.3333 22 27.3333H20.53C19.2827 24.8893 16.766 23.3333 14 23.3333C10.512 23.3333 7.59 25.7833 6.852 29.0513C3.59467 27.4947 1.33333 24.1773 1.33333 20.3333C1.33333 16.562 3.50933 13.2973 6.66667 11.7047V16.6667C6.66667 18.5047 8.162 20 10 20ZM8 11.1493C8.674 10.9287 9.37933 10.7793 10.1087 10.712C10.422 11.8353 11.444 12.6667 12.6667 12.6667C14.1373 12.6667 15.3333 11.4707 15.3333 10C15.3333 8.52933 14.1373 7.33333 12.6667 7.33333C11.4107 7.33333 10.3613 8.20867 10.08 9.38C9.36467 9.43933 8.67 9.56933 8 9.76V3.33333C8 2.23067 8.89733 1.33333 10 1.33333H36.6667C37.7693 1.33333 38.6667 2.23067 38.6667 3.33333V16.6667C38.6667 17.7693 37.7693 18.6667 36.6667 18.6667H10C8.89733 18.6667 8 17.7693 8 16.6667V11.1493ZM12.6667 8.66667C12.1753 8.66667 11.75 8.93667 11.5187 9.33333H12.6667V10.6667H11.5187C11.75 11.0633 12.1753 11.3333 12.6667 11.3333C13.402 11.3333 14 10.7353 14 10C14 9.26467 13.402 8.66667 12.6667 8.66667ZM11 30C10.9744 30 10.9494 29.9982 10.9243 29.9963C10.9017 29.9946 10.8791 29.993 10.856 29.9927C11.0887 29.6 11.512 29.3333 12 29.3333C12.7353 29.3333 13.3333 29.9313 13.3333 30.6667C13.3333 31.402 12.7353 32 12 32C11.506 32 11.078 31.7267 10.848 31.3253C10.8709 31.3259 10.8933 31.3276 10.9158 31.3292L10.9158 31.3292L10.9159 31.3292C10.9437 31.3313 10.9716 31.3333 11 31.3333H12V30H11ZM14.6667 30.6667C14.6667 32.1373 13.4707 33.3333 12 33.3333C10.7127 33.3333 9.63533 32.4167 9.38733 31.2013C8.91867 31.132 8.45933 31.0367 8.012 30.91C8.14133 34.1053 10.7733 36.6667 14 36.6667C16.3833 36.6667 18.5413 35.2533 19.4973 33.0667C19.6033 32.8233 19.8433 32.6667 20.108 32.6667H36.3467L38.3827 30.1207L36.4447 28.6667H35.69L34.5547 30.37C34.444 30.536 34.2647 30.644 34.066 30.6633C33.8647 30.682 33.67 30.6127 33.5287 30.4713L31.724 28.6667H31.3333V30C31.3333 30.3687 31.0353 30.6667 30.6667 30.6667H28C27.7127 30.6667 27.4587 30.4833 27.3673 30.2107L26.8527 28.6667H25.0233L23.888 30.37C23.6407 30.7413 23.026 30.7413 22.7787 30.37L21.6433 28.6667H20.108C19.8433 28.6667 19.6033 28.5093 19.4973 28.2667C18.5413 26.08 16.3833 24.6667 14 24.6667C11.0713 24.6667 8.62933 26.7773 8.10733 29.5567C8.54733 29.6953 9.00467 29.792 9.46933 29.8667C9.81133 28.7887 10.81 28 12 28C13.4707 28 14.6667 29.196 14.6667 30.6667Z" fill=currentColor />
                                    <path fill-rule=evenodd clip-rule=evenodd d="M29.7 4H35.3C35.6871 4 36 4.298 36 4.66667V15.3333C36 15.702 35.6871 16 35.3 16H29.7C29.3129 16 29 15.702 29 15.3333V4.66667C29 4.298 29.3129 4 29.7 4ZM30.4 14.6667H34.6V5.33333H30.4V14.6667Z" fill=currentColor />
                                </svg></span></div>
                        <div class=main>
                            <h4 class=main_title>Check in hostel</h4>
                            <p class=main_text>Jika admin kami sudah memverifikasi dokumen dan pembayaran maka selanjutnya adalah serah terima kunci</p>
                        </div>
                    </li>
                </ul>
                <div class=wrapper data-aos=fade-up><a class="about_stages-main_btn btn theme-element theme-element--accent" href=#>Hubungi Admin</a>
                </div>
            </div>
            <div class="about_stages-media col-xl-6" data-aos=fade-in>
                <picture>
                    <source data-srcset="{{asset('img/about/stages.jpg')}}" srcset="{{asset('img/about/stages.jpg')}}"><img class=lazy data-src="{{asset('img/about/stages.jpg')}}" src="{{asset('img/about/stages.jpg')}}" alt=media>
                </picture>
            </div>
        </div>
    </section>
</main>
@endsection