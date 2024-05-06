<x-site-layout>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ $blog->title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- blog Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 wow slideInDown" data-wow-delay="0.1s">

                <!-- blog Image -->
                {{-- <img src="img/course-1.jpg" alt="blog Image" class="img-fluid mb-4"> --}}

                <!-- blog Title -->

                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">المقال</h6>
                    <h1 class="mb-5">{{ $blog->title }}</h1>
                </div>



                <!-- blog Content -->
                <div class="lesson-content wow fadeInUp" data-wow-delay="0.3s">
                    {!! $blog->content !!}
                </div>





            </div>
        </div>
    </div>




</x-site-layout>
