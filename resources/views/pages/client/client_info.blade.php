@extends('layouts.master')

@section('title')
    معلومات الدفع للعميل
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h5 class="card-title"> أسم العميل : {{ $client->name }} </h5>
                    <p>رقم الهاتف : {{ $client->phone_number }}</p><br>
                    <p class="text-danger" style="font-size: 20px">المديونية : {{ $receiveCashRemainingAmount }} جنية</p><br>
                    {{-- receiveCashRemainingAmount --}}
                    <div class="tab tab-border nav-right">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="tab-1-tab" data-toggle="tab" href="#tab-1"
                                    role="tab" aria-controls="tab-1" aria-selected="true">
                                    كل استلامات النقدية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-2-tab" data-toggle="tab" href="#tab-2" role="tab"
                                    aria-controls="tab-2" aria-selected="false">
                                    استلامات
                                    النقدية المدفوعة بالكامل </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-3-tab" data-toggle="tab" href="#tab-3" role="tab"
                                    aria-controls="tab-3" aria-selected="false"> استلامات النقدية
                                    المدفوعة جزئياً </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-4-tab" data-toggle="tab" href="#tab-4" role="tab"
                                    aria-controls="tab-4" aria-selected="false"> استلامات النقدية
                                    الغير مدفوعة بالكامل </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-1" role="tabpanel"
                                aria-labelledby="tab-1-tab">
                                <div class="row">
                                    @foreach ($client->receiveCashes as $receiveCash)
                                        <div class="col-md-6" style="padding: 20px; border:1px solid black">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>رقم الفاتورة : </p>

                                                </div>
                                                <div class="col-md-6">
                                                    {{ $receiveCash->receipt_number }}

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ الفاتورة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->receive_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ التسليم : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->finish_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> سعر الخدمة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->service_price }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المدفوع : </p>
                                                </div>
                                                <div class="col-md-6 text-success">{{ $receiveCash->paid_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المتبقى : </p>
                                                </div>
                                                <div class="col-md-6 text-danger">{{ $receiveCash->remaining_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> نوع الدفع : </p>
                                                </div>
                                                <div class="col-md-6 text-info">{{ $receiveCash->type }}</div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">
                                <div class="row">
                                    @foreach ($client->receiveCashes->where('remaining_amount', 0) as $receiveCash)
                                        <div class="col-md-6" style="padding: 20px; border:1px solid black">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>رقم الفاتورة : </p>

                                                </div>
                                                <div class="col-md-6">
                                                    {{ $receiveCash->receipt_number }}

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ الفاتورة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->receive_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ التسليم : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->finish_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> سعر الخدمة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->service_price }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المدفوع : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->paid_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المتبقى : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->remaining_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> نوع الدفع : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->type }}</div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3-tab">
                                <div class="row">
                                    @foreach ($client->receiveCashes->where('remaining_amount', '>', 0) as $receiveCash)
                                        <div class="col-md-6" style="padding: 20px; border:1px solid black">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>رقم الفاتورة : </p>

                                                </div>
                                                <div class="col-md-6">
                                                    {{ $receiveCash->receipt_number }}

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ الفاتورة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->receive_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ التسليم : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->finish_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> سعر الخدمة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->service_price }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المدفوع : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->paid_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المتبقى : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->remaining_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> نوع الدفع : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->type }}</div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4-tab">
                                <div class="row">
                                    @foreach ($client->receiveCashes->where('paid_amount', 0) as $receiveCash)
                                        <div class="col-md-6" style="padding: 20px; border:1px solid black">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>رقم الفاتورة : </p>

                                                </div>
                                                <div class="col-md-6">
                                                    {{ $receiveCash->receipt_number }}

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ الفاتورة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->receive_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>تاريخ التسليم : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->finish_date }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> سعر الخدمة : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->service_price }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المدفوع : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->paid_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> المبلغ المتبقى : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->remaining_amount }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> نوع الدفع : </p>
                                                </div>
                                                <div class="col-md-6">{{ $receiveCash->type }}</div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
