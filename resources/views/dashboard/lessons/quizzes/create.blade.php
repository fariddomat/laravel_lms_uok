<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('dashboard.lessons.quizzes.store', $lesson) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Question</label>
                            <input name="question" type="text" class="form-control border border-2 p-2"
                                value="{{ old('question') }}">
                            @error('question')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Correct option</label>

                            <select name="correct_option" class="form-control border border-2 p-2">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            @error('correct_option')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Option1</label>
                            <input name="option_1" type="text" class="form-control border border-2 p-2"
                                value="{{ old('option_1') }}">
                            @error('option_1')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Option2</label>
                            <input name="option_2" type="text" class="form-control border border-2 p-2"
                                value="{{ old('option_2') }}">
                            @error('option_2')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Option3</label>
                            <input name="option_3" type="text" class="form-control border border-2 p-2"
                                value="{{ old('option_3') }}">
                            @error('option_3')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Option4</label>
                            <input name="option_4" type="text" class="form-control border border-2 p-2"
                                value="{{ old('option_4') }}">
                            @error('option_4')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>



            </div>
            <button type="submit" class="btn bg-gradient-dark">Submit</button>
            </form>

        </div>
    </div>
    </div>

    </div>
</x-app-layout>
