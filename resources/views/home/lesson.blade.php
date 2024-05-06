<x-site-layout>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ $lesson->title }}</h1>
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
            <div class="col-md-8 offset-md-2 wow slideInDown" data-wow-delay="0.1s">

                <!-- Lesson Image -->
                {{-- <img src="img/course-1.jpg" alt="Lesson Image" class="img-fluid mb-4"> --}}

                <!-- Lesson Title -->

                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">الدرس </h6>
                    <h1 class="mb-5">محتوى الدرس</h1>
                </div>


                <!-- Lesson Description -->
                <h3 class="mb-4 wow fadeInUp" data-wow-delay="0.2s">محتوى الدرس</h3>

                <!-- Lesson Content -->
                <div class="lesson-content wow fadeInUp" data-wow-delay="0.3s">
                    {!! $lesson->content !!}
                </div>

                <!-- Files List -->
                <div class="files-list mt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="mb-2">الملفات</h3>
                    <ul>
                        <li><a href="file1.pdf">الملف الأول</a></li>
                        <li><a href="file2.docx">الملف الثاني</a></li>
                    </ul>
                </div>

                <!-- FAQ Section -->
                <div class="faq-section mt-5 wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="mb-3">الأسئلة الشائعة</h3>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    السؤال الأول
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    إجابة السؤال الأول.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                    السؤال الثاني
                                </button>
                            </h2>
                            <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    إجابة السؤال الثاني.
                                </div>
                            </div>
                        </div>
                        <!-- ... more FAQ items -->
                    </div>
                </div>

            </div>
        </div>
    </div>




</x-site-layout>
