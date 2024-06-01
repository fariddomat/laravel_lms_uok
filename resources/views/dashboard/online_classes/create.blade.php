@section('styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.css" rel="stylesheet">
    <style>
        div.dt-container div.dt-search input {
            border: 1px solid #dee2e6 !important;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js" defer></script>
    <script>
        $(document).ready(function() {
            var servicesTable = $("#Table").DataTable({
                searching: true,
                paging: true,
                info: false,

            });
        });
    </script>
    <script></script>
@endsection

<x-app-layout>

    <div class="container-fluid py-4 my-6">

        <div class="card card-body  my-4 mx-md-4 mt-n6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('dashboard.online_classes.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Grade_id">الخدمة : <span class="text-danger">*</span></label>
                            <select class="form-control  border border-2 p-2" name="course_id">
                                <option selected>اختر...</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Classroom_id">الشخص : <span class="text-danger">*</span></label>
                            <select class="form-control  border border-2 p-2" name="user_id">
                                <option selected>اختر...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div><br>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>عنوان الحصة : <span class="text-danger">*</span></label>
                            <input class="form-control  border border-2 p-2" name="topic" type="text">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>تاريخ ووقت الحصة : <span class="text-danger">*</span></label>
                            <input class="form-control  border border-2 p-2" type="datetime-local" name="start_at">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>مدة الحصة بالدقائق : <span class="text-danger">*</span></label>
                            <input class="form-control  border border-2 p-2" name="duration" type="text">
                        </div>
                    </div>

                </div>
                <button class="btn bg-gradient-dark mt-3" type="submit">حفظ</button>
            </form>
        </div>
    </div>

</x-app-layout>
