@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/rooms.min.css')}}">
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
            <li class=list-item><a class=link href="#">pilihan-kamar</a></li>
        </ul>
        <h1 class=page_title>Pilihan Kamar</h1>
    </div>
</header>
<main class="rooms section">
    <div class=container>
        <ul class=rooms_list>
            @foreach($rooms as $room)
            <?php
            if (count($room->pricelist) > 0) {
                $price = 'Rp ' . thousandsCurrencyFormat($room->pricelist[0]->price);
                $period = '/ ' . $room->pricelist[0]->jangka_waktu . ' ' . $room->pricelist[0]->jangka_sewa;
            } else {
                $price = 'Call Us';
                $period = '';
            }
            if (count($room->images) > 0) {
                $img = $room->images[0]->image;
            } else {
                $img = 'default.jpg';
            }
            ?>
            <li class="rooms_list-item" data-order="1" data-aos="fade-up">
                <div class="item-wrapper d-md-flex">
                    <div class="media">
                        <picture>
                            <source data-srcset="{{config('app.image_path')}}{{$img}}" srcset="{{config('app.image_path')}}{{$img}}"><img class=lazy data-src="{{config('app.image_path')}}{{$img}}" src="{{config('app.image_path')}}{{$img}}" alt=media>
                        </picture>
                    </div>
                    <div class="main d-md-flex justify-content-between">
                        <div class="main_info d-md-flex flex-column justify-content-between"><a class="main_title h4" href="{{route('view_room',$room->slug)}}">{{$room->category_name}}</a>
                            <p class=main_description>Informasi: {{$room->notes}}</p>
                            <div class=main_amenities>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="icon-twin_bed icon"></i> 1 Single bed
                                </span>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="mdi mdi-wifi-arrow-up-down icon"></i> Free Wifi
                                </span>
                            </div>
                            <div class=main_amenities>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="mdi mdi-air-conditioner icon"></i> Air Cond
                                </span>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="mdi mdi-television icon"></i> TV LCD 32"
                                </span>
                            </div>

                            <div class=main_amenities>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="mdi mdi-water-boiler icon"></i> Water Heater
                                </span>
                                <span class="main_amenities-item d-inline-flex align-items-center">
                                    <i class="mdi mdi-shower-head icon"></i> Kamar Mandi Dalam
                                </span>

                            </div>
                        </div>
                        <div class="main_pricing d-flex flex-column align-items-md-end justify-content-md-between">
                            <div class="wrapper d-flex flex-column"><span class=main_pricing-item>
                                    Start From <span class=h3>{{$price}}</span> {{$period}} </span>
                                <!-- <span class=main_pricing-item><span class=h4>$100</span> / 7 nights</span> -->
                            </div><a class="theme-element theme-element--accent btn" href="{{route('view_room',$room->slug)}}">Detail Kamar</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
        <!-- <ul class="pagination d-flex align-items-center">
            <li class=pagination-page><a class="pagination-page_link d-flex align-items-center justify-content-center" href=# data-current=true>1</a></li>
            <li class=pagination-page><a class="pagination-page_link d-flex align-items-center justify-content-center" href=#>2</a></li>
            <li class=pagination-page><a class="pagination-page_link d-flex align-items-center justify-content-center" href=#>3</a></li>
        </ul> -->
    </div>
</main>
@endsection