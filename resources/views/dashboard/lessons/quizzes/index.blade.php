
<x-app-layout>
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
            var lessonQuizzesTable = $("#lessonQuizzesTable").DataTable({
                searching: true,
                paging: true,
                info: false,
                columnDefs: [{
                    orderable: false,
                    targets: [3] // Assuming the last column (actions) is not orderable
                }],
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Lesson Quizzes for: {{ $lesson->title }}</h6>
                            <div class="text-end">
                                <a href="{{ route('dashboard.lessons.quizzes.create', $lesson) }}" class="btn bg-gradient-dark mb-0">
                                    <i class="material-icons text-sm">add</i> Add Quiz
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="lessonQuizzesTable" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Quistion</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizzes as $index => $quiz)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $quiz->question }}</td>
                                            <td>{{ $quiz->created_at }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.lessons.quizzes.destroy', [$lesson, $quiz]) }}"
                                                    class="btn btn-danger btn-link"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $quiz->id }}').submit();">
                                                    <i class="material-icons">close</i>
                                                </a>
                                                <form id="delete-form-{{ $quiz->id }}" action="{{ route('dashboard.lessons.quizzes.destroy', [$lesson, $quiz]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
