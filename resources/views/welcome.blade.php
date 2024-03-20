@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section bg-success pt-0">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="hero-title">Pethoc Energy</h1>
                    <p class="hero-subtitle">Your Hero Subtitle</p>
                </div>
                <div class="col-md-6">
                    <div id="heroCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('images/showcase/showcase_image1.png') }}" alt="First slide" width="auto" height="auto">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/showcase/showcase_image2.png') }}" alt="Second slide" width="auto" height="auto">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/showcase/showcase_image3.png') }}" alt="Third slide" width="auto" height="auto">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->
@endsection


@section('scripts')
    @parent <!-- This ensures that the parent scripts are also included -->
    <!-- Initialize Carousel -->
    <script>
        $('#heroCarousel').carousel({
            interval: 5000, // Slide every 5 seconds
            pause: false // Do not pause on hover
        });
    </script>
@endsection
