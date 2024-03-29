@extends('layouts.master')

@section('title')
    العملاء
@endsection

@push('css')
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">العملاء</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th>أسم العميل</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>المديونية</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            @php
                                $receiveCashRemainingAmount = App\Models\ReceiveCash::where('client_id', $client->id)->sum('remaining_amount');

                            @endphp
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td><a href="{{ route('clients.clientInfo', $client->id) }}"> {{ $client->name }}</a></td>
                                <td>{{ $client->phone_number }}</td>
                                <td>{{ $client->address }}</td>
                                <td>
                                    <p class="text-danger m-0">{{ $receiveCashRemainingAmount }} جنية
                                    </p>
                                </td>
                                <td>
                                    <a href="{{ route('clients.clientInfo', $client->id) }}" class="btn btn-primary">عرض
                                        سجلات الدفع
                                    </a>
                                    @if ($receiveCashRemainingAmount !== 0)
                                        <a href="{{ route('clients.payShow', $client->id) }}" class="btn btn-info">دفع
                                            كلى</a>
                                    @endif


                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('clients.delete', $client->id) }}" method="post"
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
                    'text': 'نسخ',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    'text': 'أكسيل',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: "العملاء"
                },

                {
                    extend: 'colvis',
                    text: 'الأعمدة الظاهرة'
                }
            ]
        });
    </script>
@endpush
