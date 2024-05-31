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
    <div class="">
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="col-6 text-white text-capitalize ps-3">Quizzes table</h6>

                            </div>

                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="Table" class="table align-items-center mb-0">

                                        <thead>
                                            <tr>
                                                <th>الدرس</th>
                                                <th>الطالب</th>
                                                <th>الاختبار</th>
                                                <th>الإجابة المختارة</th>
                                                <th>صحيح</th>
                                                <th>تاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userQuizzes as $userQuiz)
                                                <tr>
                                                    <td>{{ $userQuiz->quiz->lesson->title }}</td>
                                                    <td>{{ $userQuiz->user->name }}</td>
                                                    <td>{{ $userQuiz->quiz->question }}</td>
                                                    <td>{{ $userQuiz->selected_option }}</td>
                                                    <td>{{ $userQuiz->is_correct ? 'نعم' : 'لا' }}</td>
                                                    <td>{{ $userQuiz->created_at->format('Y-m-d H:i') }}</td>
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
    </div>
</x-app-layout>
