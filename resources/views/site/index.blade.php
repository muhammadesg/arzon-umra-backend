@extends('site.layouts.site')

@section('content')

<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <h5 class="mb-5">Xush kelibsiz 🎉 <br> {{ auth()->user()->name }}!</h5>
                    <a href="{{ route('profile.update') }}">
                        <button type="button" class="btn btn-primary">Profilga o'tish</button></a>
                    <img src="{{ asset('front/app-assets/images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic" />
                </div>
            </div>
        </div>
        <!--/ Medal Card -->

        <!-- Statistics Card -->
        <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Statistika</h4>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <a href="{{route('packages.index')}}">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{$package_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">To'plamlar</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <a href="{{route('comments.index')}}">
                                <div class="media">
                                    <div class="avatar bg-light-info mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{$comments_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">Izohlar</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <a href="{{route('companies.index')}}">
                                <div class="media">
                                    <div class="avatar bg-light-danger mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{$avia_companies_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">Avia</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <a href="{{route('companies.index')}}">
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{$tour_companies_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">Kompaniya</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>


</section>
<!-- Dashboard Ecommerce ends -->

@endsection
