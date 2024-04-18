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
                        <h2>UNLIMITED Trains</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                @foreach ($trains as $train)
                    <div class="col-lg-4">
                        <a href="{{ route('trains.show', $train) }}">
                            <div class="single-class-item set-bg" data-setbg="{{ asset('home/img/ico.png') }}">
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
    </section>
    <!-- Classes Section End -->

</x-site-layout>
