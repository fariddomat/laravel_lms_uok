<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('dashboard.lessons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Title</label>
                            <input name="title" type="text" class="form-control border border-2 p-2"
                                value="{{ old('title') }}">
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
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Teacher</label>
                            <select name="user_id" class="form-control  border border-2 p-2">
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>



                    <div class="mb-3 col-md-12">

                        <label for="floatingTextarea2">Content</label>
                        <textarea name="content" class="form-control border border-2 p-2" placeholder=" Say something about"
                            id="floatingTextarea2" rows="4" cols="50">{{ old('content') }}</textarea>
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
