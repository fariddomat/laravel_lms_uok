<x-site-layout>



    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">المقررات الدراسية</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">المقررات الدراسية</li>
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
                <h6 class="section-title bg-white text-center text-primary px-3">المواد التعليمية</h6>
                <h1 class="mb-5">قائمة المواد التعليمية</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-12 col-md-12">
                    <div class="row g-3" style="margin-bottom: 50px">
                    @foreach ($categories as $category)
                        <a class="btn btn-primary col-md-6" href="{{ route('courses', ['category' => $category->id]) }}">{{ $category->name }}</a>
                    @endforeach
                    </div>
                    <div class="row g-3">

                        @foreach ($courses as $index => $course)
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="{{ 0.3 + $index / 8 }}s">
                                <a class="position-relative d-block overflow-hidden"
                                    href="{{ route('courses.show', $course) }}">
                                    <img class="img-fluid" src="{{ asset($course->image) }}" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                        style="margin: 1px;">
                                        <h5 class="m-0">{{ $course->name }}</h5>
                                        <small class="text-primary">{{ $course->lessons->count() }} درس</small>
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


    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">الدروس</h6>
                <h1 class="mb-5">الدروس المضافة حديثا</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($latestCourses as $index => $course)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + $index / 8 }}s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset($course->image) }}" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4"
                                    style="  direction: ltr;">
                                    <a href="{{ route('courses.show', $course) }}"
                                        class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">قراءة المزيد</a>
                                    @auth
                                        @if (auth()->user()->hasCourse($course->id))
                                            <a href="{{ route('student.unJoinCourse', $course) }}"
                                                class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                                style="border-radius: 0 30px 30px 0;">إلغاء الانضمام</a>
                                        @else
                                            <a href="{{ route('student.joinCourse', $course) }}"
                                                class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                                style="border-radius: 0 30px 30px 0;">الانضمام</a>
                                        @endif
                                    @else
                                        <a href="{{ route('student.joinCourse', $course) }}"
                                            class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;">الانضمام</a>

                                    @endauth
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">

                                <h5 class="mb-4">{{ $course->name }}</h5>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user-tie text-primary me-2"></i>{{ $course->teachers->first()->name ?? '' }}</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-user text-primary me-2"></i>{{ $course->students->count() }}
                                    طالب</small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Courses End -->




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
