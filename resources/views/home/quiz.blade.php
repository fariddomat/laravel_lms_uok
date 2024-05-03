<x-site-layout>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">اختبارات {{ $lesson->title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $lesson->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Lesson Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="quiz-section">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title bg-white text-center text-primary px-3">الاختبار</h6>
                        <h1 class="mb-5">قائمة الاختبارات</h1>
                    </div>

                    <form id="quiz-form">
                        @foreach ($quizzes as $index => $quiz)
                            <div class="question wow fadeInUp" data-wow-delay="0.2s">
                                <h4>{{ $quiz->question }}</h4>
                                <ul>
                                    <li>
                                        <input type="radio" id="option1-1" name="option_1"
                                            value="{{ $quiz->option_1 }}">
                                        <label for="option1-1">{{ $quiz->option_1 }}</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="option1-1" name="option_2"
                                            value="{{ $quiz->option_2 }}">
                                        <label for="option1-1">{{ $quiz->option_2 }}</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="option1-1" name="option_3"
                                            value="{{ $quiz->option_3 }}">
                                        <label for="option1-1">{{ $quiz->option_3 }}</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="option1-1" name="option_4"
                                            value="{{ $quiz->option_4 }}">
                                        <label for="option1-1">{{ $quiz->option_4 }}</label>
                                    </li>
                                </ul>
                            </div>
                        @endforeach

                        <!-- Add more questions here -->

                        <button type="submit" class="submit-button wow fadeInUp btn btn-primary rounded" data-wow-delay="0.5s">إرسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>







</x-site-layout>
