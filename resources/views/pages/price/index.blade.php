@extends('layouts.master')

@section('title')
    الأسعار
@endsection

@push('css')
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">الأسعار</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th>أسم تصنيف العميل</th>
                            <th>أسم الخامة</th>
                            <th>السعر</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prices as $price)
                            <tr>
                                <td>{{ $price->id }}</td>
                                <td>{{ $price->class->name }}</td>
                                <td>{{ $price->material->name }}</td>
                                <td>{{ $price->price }}</td>
                                <td>
                                    <a href="{{ route('prices.edit', $price->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('prices.delete', $price->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('clients.clientReceiveCash', $client->id) }}"
                                    class="btn btn-primary">تقارير العميل</a> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var datatable = $('#custom_table').DataTable({
            stateSave: true,
            responsive: true,
            oLanguage: {
                sSearch: 'البحث',
                sInfo: "Got a total of _TOTAL_ entries to show (_START_ to _END_)",
                sZeroRecords: 'لا يوجد سجل متتطابق',
                sEmptyTable: 'لا يوجد بيانات في الجدول',
                oPaginate: {
                    sFirst: "First",
                    sLast: "الأخير",
                    sNext: "التالى",
                    sPrevious: "السابق"
                },
            },
            sortable: true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: "الأسعار"
                },

                'colvis'
            ]
        });
    </script>
@endpush
