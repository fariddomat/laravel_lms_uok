<x-app-layout>
    @section('scripts')

    <script src="{{ asset('dashboard/js/libs/jquery.min.js') }}"></script>
    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>

        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
            $(function() {
                CKEDITOR.replace("content", {
                    filebrowserBrowseUrl: imageGalleryBrowseUrl,
                    filebrowserUploadUrl: imageGalleryUploadUrl +
                        "?_token=" +
                        $("meta[name=csrf-token]").attr("content"),
                    removeButtons: "About",
                    contentsLangDirection: 'rtl'
                });

            });
        </script>
@endsection

    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('dashboard.lessons.update', $lesson ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Title</label>
                            <input name="title" type="text" class="form-control border border-2 p-2"
                                value="{{ old('title', $lesson->title) }}">
                            @error('title')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Course</label>
                            <select name="course_id" class="form-control  border border-2 p-2">
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @if ($lesson->course_id == $course->id)
                                    selected
                                @endif>{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Teacher</label>
                            <select name="user_id" class="form-control  border border-2 p-2">
                                @if (auth()->user()->hasRole('teacher'))
                                <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>

                                @else
                                @foreach ($teachers as $teacher)

                                <option value="{{ $teacher->id }}"  @if ($lesson->user_id == $teacher->id)
                                    selected
                                @endif>{{ $teacher->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('user_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>



                    <div class="mb-3 col-md-12">

                        <label for="floatingTextarea2">Content</label>
                        <textarea name="content" class="form-control border border-2 p-2" placeholder=" Say something about"
                            id="floatingTextarea2" rows="4" cols="50">{{ old('content', $lesson->content) }}</textarea>
                        @error('content')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
            </div>
            <button type="submit" class="btn bg-gradient-dark">Submit</button>
            </form>

        </div>
    </div>
    </div>

    </div>
</x-app-layout>
