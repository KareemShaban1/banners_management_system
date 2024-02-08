@extends('layouts.master')

@section('title')
    مزودى الخدمة
@endsection

@push('css')
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">مزودى الخدمة</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th>أسم مزود الخدمة</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->phone_number }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('suppliers.delete', $supplier->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('suppliers.supplierReceiveCash', $supplier->id) }}"
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
                    text: "نسخ",
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: "أكسيل",
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: "مزودى الخدمة"
                },

                {
                    extend: 'colvis',
                    text: 'الأعمدة الظاهرة'
                }
            ]
        });
    </script>
@endpush
