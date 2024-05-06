<x-site-layout>



    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">المقالات</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">المقالات</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">المقالات</h6>
                <h1 class="mb-5">قائمة المقالات</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-12 col-md-12">
                    <div class="row g-3">
                        @foreach ($blogs as $index => $blog)
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="{{ 0.3 + $index / 8 }}s">
                                <a class="position-relative d-block overflow-hidden"
                                    href="{{ route('blogs.show', $blog) }}">
                                    <img class="img-fluid" src="{{ asset($blog->image) }}" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                        style="margin: 1px;">
                                        <h5 class="m-0">{{ $blog->title }}</h5>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->




    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">الآراء</h6>
                <h1 class="mb-5">رأي طلابنا!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative" dir="ltr">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('/home') }}/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">الطالب 1</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">جميل ومناسب.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('/home') }}/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">الطالب 2</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">لقد استفدت كثيرا.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('/home') }}/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">الطالب 3</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">من الممتع التعلم من المنزل.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('/home') }}/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">الطالب 4</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">الاساتذة مميزون للغاية.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->



</x-site-layout>
