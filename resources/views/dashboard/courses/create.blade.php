<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('dashboard.courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" class="form-control border border-2 p-2"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control border border-2 p-2">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Image</label>
                            <input name="image" type="file" class="form-control border border-2 p-2">
                            @error('image')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">Description</label>
                            <textarea name="description" class="form-control border border-2 p-2" placeholder=" Say something about"
                                id="floatingTextarea2" rows="4" cols="50">{{ old('description') }}</textarea>
                            @error('description')
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
