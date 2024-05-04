<x-site-layout>
    @section('styles')
        <style>
            .tm-accordion .card:first-child {
                /* border-radius: 15px 15px 0 0; */
            }

            .tm-accordion .card {

                margin-bottom: 15px;
            }

            .tm-accordion .card .card-header {
                background-color: #fff;
                border-top: none;
            }

            .tm-accordion .card .card-header .title {
                padding: 1rem 2rem;
                margin: 0;
                position: relative;
            }

            .tm-accordion .card .card-header .title .accordion-controls-icon {
                opacity: 0.4;
                position: absolute;
                left: 20px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                transition: all 0.4s ease-in-out;
            }
        </style>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#accordion100').on('shown.bs.collapse', function(e) {
                    $(e.target).prev().find('.open-icon').hide();
                    $(e.target).prev().find('.close-icon').show();
                }).on('hidden.bs.collapse', function(e) {
                    $(e.target).prev().find('.open-icon').show();
                    $(e.target).prev().find('.close-icon').hide();
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#accordion100').on('shown.bs.collapse', function(e) {
                    var target = $(e.target); // Get the target section
                    var offset = target.prev().height(); // Calculate offset based on previous section's height
                    $('html, body').animate({
                        scrollTop: target.offset().top - offset - 90
                    }, 500); // Animate scrolling with duration (adjust as needed)
                });
            });
        </script>
    @endsection
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ $course->name }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $course->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">الدروس</h6>
                <h1 class="mb-5">قائمة الدروس</h1>
            </div>

            <div class="row g-4 justify-content-center">
                <h2  class="col-md-8 offset-md-2"> @auth
                        @if (auth()->user()->hasCourse($course->id))
                            <a href="{{ route('student.unJoinCourse', $course) }}"
                                class="flex-shrink-0 btn btn-lg btn-danger px-3">إلغاء الانضمام</a>
                        @else
                            <a href="{{ route('student.joinCourse', $course) }}"
                                class="flex-shrink-0 btn btn-lg btn-success px-3">الانضمام</a>
                        @endif
                    @else
                        <a href="{{ route('student.joinCourse', $course) }}"
                            class="flex-shrink-0 btn btn-lg btn-success px-3">الانضمام</a>

                    @endauth
                </h2>
                <div class="col-md-8 offset-md-2">
                    <div id="accordion100" class="tm-accordion">
                        @foreach ($course->lessons as $index => $lesson)
                            <div class="card" {{-- data-animate="fadeInUp" data-delay="{{ 0.1 + $index / 8 }}" --}}>
                                <div class="card-header p-0" id="heading10{{ $index + 1 }}">
                                    <h5 class="title" data-toggle="collapse"
                                        data-target="#collapse10{{ $index + 1 }}"
                                        aria-expanded="@if ($index == 0) true
                                        @else
                                        false @endif"
                                        aria-controls="collapse10{{ $index + 1 }}">
                                        {{ $index + 1 }} - {{ $lesson->title }}
                                        <i class="fas fa-chevron-down accordion-controls-icon open-icon"
                                            @if ($index == 0) style="display: none" @endif></i>
                                        <i class="fas fa-chevron-up accordion-controls-icon close-icon"
                                            @if ($index != 0) style="display: none" @endif
                                            aria-hidden="true"></i>

                                    </h5>
                                </div>
                                <div id="collapse10{{ $index + 1 }}"
                                    class="collapse @if ($index == 0) show @endif"
                                    aria-labelledby="heading10{{ $index + 1 }}" data-parent="#accordion100">
                                    <div class="card-body">
                                        {!! $lesson->content !!}

                                        <br><br>
                                        @auth
                        @if (auth()->user()->hasCourse($course->id))
                                        <a href="{{ route('lessons.show', $lesson) }}"
                                            class="btn btn-lg btn-primary">تصفح الدرس الآن</a>
                                        <a href="{{ route('lessons.quiz', $lesson) }}"
                                            class="btn btn-lg btn-secondary">الاختبارات</a>
                                        @endif
                                        @endauth
                                        </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

</x-site-layout>
