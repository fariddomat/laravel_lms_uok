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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">الجلسات Online</h3>
            </div>
            <div class="card-block">
                <a href="{{ route('dashboard.online_classes.create') }}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">اضافة جلسة جديدة</a><br><br>
                <div class="table-responsive">
                    <table id="Table" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>المقرر</th>
                                <th>المدرس</th>
                                <th>عنوان الحصة</th>
                                <th>تاريخ البداية</th>
                                <th>وقت الحصة</th>
                                <th>رابط الحصة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($online_classes as $online_classe)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $online_classe->course->name }}</td>
                                    <td>{{ $online_classe->user->name }}</td>
                                    <td>{{ $online_classe->topic }}</td>
                                    <td>{{ $online_classe->start_at }}</td>
                                    <td>{{ $online_classe->duration }}</td>
                                    <td class="text-danger"><a href="{{ $online_classe->join_url }}"
                                            target="_blank">انضم الان</a></td>
                                    <td>
                                        {{-- <a href="{{ route('dashboard.online_classes.notify', $online_classe->id) }}"
                                            class="btn btn-sm btn-primary">إرسال إشعار</a> --}}
                                        <form
                                            action="{{ route('dashboard.online_classes.destroy', $online_classe->id) }}"
                                            method="post" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                        {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $online_classe->meeting_id }}"><i
                                                            class="fa fa-trash"></i></button> --}}
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
