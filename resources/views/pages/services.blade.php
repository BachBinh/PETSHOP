@extends('layout')
@section('content')

<style>
    @media (max-width: 992px) {
    .body {
        width: unset;
        margin: 0 auto;
    }
}
</style>

<div class="post-slider">
    <div class="post-wrapper">
        <div class="post">
            <h1 style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);" class="text-white mb-5">
                Pet care service at Pet Store
                <div class="row mt-5">
                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-paw"></i>
                            <div class="mainServices__content">
                                <h3>Take care</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-cutlery"></i>
                            <div class="mainServices__content">
                                <h3>Diet</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-gavel"></i>
                            <div class="mainServices__content">
                                <h3>Toys & Accessories</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </h1>
            <img src="{{ asset('frontend/img/banner_ser_6.jpeg')}}" alt="">
        </div>
    </div>

</div>

<div class="modal">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">

        <div class="modal-header">
            <button class="modal-close modal-toggle btn fa fa-times" style="outline: none;"></button>
            <h2 class="modal-heading">Xem thêm</h2>
        </div>

        <style>
            .form-horizontal .control-label {
                text-align: unset !important;
            }
        </style>

    </div>
</div>

<div class="body">
    <div class="container-fluid" style="padding: 0!important;">
        <div style="background-image: url('frontend/img/banner_ser_7.jpeg')" class="service-banner">
            <div class="boxservice">
                <h3 class="h1-title">
                PET STORE: Your One-Stop Shop for Premium Pet Products and Services!
                </h3>
                <p>"With the aspiration of becoming a second home for pets, Petstore offers a comprehensive range of essential services and products tailored to meet the needs of every beloved furry friend."</p>

                <button class="btn btn-danger mt-5 modal-toggle">See more!</button>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4" style="padding: 15px!important;">
            <div style="background-color: #2885BA" class="service-list__content-box">
                <img src="{{ asset('frontend/img/banner_ser_1.jpeg')}}" alt="">
                <h3 class="h1-title">
                    1. PET STORE - A PLACE FOR QUALITY PET CARE!
                </h3>
                <p>
                    Long trips or business trips make you feel worried about having to leave your baby with someone to take care of?
                     Modern pet hotels will help owners feel completely secure when "booking a room" for their babies!
                </p>

            </div>
        </div>
        <div class="col-lg-4" style="padding: 15px!important;">
            <div style="background-color: #B56256" class="service-list__content-box">
                <img src="{{ asset('frontend/img/banner_ser_2.jpeg')}}" alt="">
                <h3 class="h1-title">
                    2. PET STORE - WHERE TO SUPPLY THE BEST QUALITY FOOD, CLEANING SAND,...!
                </h3>

                <p>
                    At Pet Store, we provide everything your pet needs at reasonable prices and top quality!
                </p>
                <p>
                    A variety of attractive dishes from major domestic and foreign brands with attractive flavors.
                </p>
            </div>
        </div>
        <div class="col-lg-4" style="padding: 15px!important;">
            <div style="background-color: #5C9CCA" class="service-list__content-box">
                <img src="{{ asset('frontend/img/banner_ser_3.jpeg')}}" alt="">
                <h3 class="h1-title">
                    3. PROVIDING THE BEST QUALITY SPA, BATHING,... SERVICES!
                </h3>

                <p>
                    Long trips or business trips make you feel worried about having to leave your baby with someone to take care of?
                    Modern pet hotels will help owners feel completely secure when "booking a room" for their babies!
                </p>
            </div>
        </div>

    </div>

    <div class="service-text mb30">
        <div class="service-text__content">
            <h2 class="h2-title">
            </h2><h2 class="h2-title">Comprehensive care, dedication and love for pets is the principle of every service that is always ready to welcome you!</h2>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <img class="banner-service" src="{{ asset('frontend/img/svbg.jpg')}}" alt="">

        </div>
    </div>
</div>
@endsection
