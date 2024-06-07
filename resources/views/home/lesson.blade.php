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

                @if ($lesson->lesson_files->count() >0)
                <!-- Files List -->
                <div class="files-list mt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="mb-2">الملفات</h3>
                    <ul class="list-group">
                        @foreach ($lesson->lesson_files as $file)
                            <li class="list-group-item"><a href="{{ asset( $file->path) }}">{{ $file->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                @endif

                <!-- Favorite Button -->
                <div class="favorite-section mt-4 wow fadeInUp" data-wow-delay="0.3s">
                    @auth
                        @php
                            $isFavorited = \App\Models\Favorite::where('user_id', Auth::id())
                                ->where('lesson_id', $lesson->id)
                                ->exists();
                        @endphp
                        @if ($isFavorited)
                            <form action="{{ route('favorites.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                <button type="submit" class="btn btn-danger">حذف من المفضلة</button>
                            </form>
                        @else
                            <form action="{{ route('favorites.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                <button type="submit" class="btn btn-warning">إضافة إلى المفضلة</button>
                            </form>
                        @endif
                    @else
                        <p>Please <a href="{{ route('login') }}">سجل دخول</a> للإضافة إلى المفضلة.</p>
                    @endauth
                </div>

                <!-- Comments Section -->
                <div class="comments-section mt-5 wow fadeInUp" data-wow-delay="0.3s">
                    <h3 class="mb-3">التعليقات</h3>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- Display Comments -->
                    @foreach ($lesson->comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                <p class="card-text">{{ $comment->comment }}</p>
                                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Add Comment Form -->
                    @auth
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                            <div class="form-group">
                                <label for="comment">تعليق</label>
                                <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                                @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">حفظ</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">سجل الدخول</a> لتتمكن من التعليق.</p>
                    @endauth
                </div>



            </div>
        </div>
    </div>

</x-site-layout>
