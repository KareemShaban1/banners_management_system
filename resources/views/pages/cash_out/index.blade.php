@extends('layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">صرف نقدية</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> رقم الإيصال </th>
                            <th>التاريخ </th>
                            <th> أسم المستلم </th>
                            <th> المبلغ </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cashOut as $cash)
                            <tr>
                                <td>{{ $cash->id }}</td>
                                <td>
                                    {{ $cash->receipt_number }}

                                </td>
                                <td>{{ $cash->date }}</td>


                                <td>
                                    {{ $cash->supplier->name }}
                                </td>

                                <td>{{ $cash->paid_amount }}</td>


                                <td> @can('cashOut-edit')
                                        <a href="{{ route('cash_out.edit', $cash->id) }}" class="btn btn-warning">تعديل</a>
                                    @endcan

                                    @can('cashOut-delete')
                                        <form action="{{ route('cash_out.delete', $cash->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">
                                                حذف
                                            </button>
                                        </form>
                                    @endcan
                                    <a href="{{ route('cash_out.pdfReport', $cash->id) }}" class="btn btn-primary">
                                        طباعة
                                    </a>
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
                // sInfo: " _TOTAL_ entries to show (_START_ to _END_)",

                sZeroRecords: 'لا يوجد سجل متتطابق',
                sEmptyTable: 'لا يوجد بيانات في الجدول',
                oPaginate: {
                    sFirst: "الأول",
                    sLast: "الأخير",
                    sNext: "التالى",
                    sPrevious: "السابق"
                },
            },
            sortable: true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    "text": "نسخ",
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    'text': 'أكسيل',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    title: "صرف نقدية"
                },
                {
                    extend: 'print',
                    'text': 'طباعة',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    title: "صرف نقدية"
                },


                {
                    extend: 'colvis',
                    text: 'الأعمدة الظاهرة'
                }
            ]
        });
    </script>
@endpush
