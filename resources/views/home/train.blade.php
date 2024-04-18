<x-site-layout>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('home') }}/img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Trains</h2>
                        <div class="breadcrumb-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Trains</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ $train->title }}</h2>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Category: {{ $train->category->name }} ||
                <span style="color: gold;">Trainer: {{ $train->category->user->name }} </span> ||
                <span>Muscle: {{ $train->muscle->name }}</span></h3>
                <h3 style="color: green; padding: 2rem 0">Level: {{ $train->level }}</h3>
                <p>Description: {{ $train->description }}</p>
                <span>Goal: {{ $train->goal }}</span>
            </div>
        </div>
        </div>
        @if ($train->media->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>media</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                @foreach ($train->media as $media)
                    <div class="col-lg-4">
                        <a>
                            <div class="single-class-item set-bg" data-setbg="{{ asset($media->media_path) }}">
                                <div class="si-text">
                                    <h4>{{ $train->title }}</h4>
                                    <span>Level {{ $train->level }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        @endif
    </section>
    <!-- Classes Section End -->

</x-site-layout>
