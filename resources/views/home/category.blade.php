<x-site-layout>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('home') }}/img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{ $category->name }}</h2>
                        <div class="breadcrumb-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>category</span>
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
            <div class="row" style="margin-bottom: 50px">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Training for this category</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                @foreach ($category->trains as $train)
                    <div class="col-lg-4">
                        <a href="{{ route('trains.show', $train) }}">
                            <div class="single-class-item set-bg" data-setbg="{{ asset('home/img/ico.png') }}">
                                <div class="si-text">
                                    <h4>{{ $train->title }}</h4>
                                    <span>Level: {{ $train->level }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Classes Section End -->


    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row" style="margin-bottom: 50px">
                <h3>Description : {{ $category->description }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Muscles for this category</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                @foreach ($category->muscles as $muscle)
                    <div class="col-lg-4">
                        <a href="">
                            <div class="single-class-item set-bg" data-setbg="{{ asset($muscle->image) }}">
                                <div class="si-text">
                                    <h4>{{ $muscle->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Classes Section End -->


</x-site-layout>
