@extends('layouts.master')

@section('title')
    دفع للعميل
@endsection

@push('css')
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">دفع كلى </h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('clients.payStore') }}" autocomplete="off">
                @csrf
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="paid_amount">المبلغ </label>
                        <input type="number" class="form-control" name="paid_amount" id="paid_amount">
                        @error('paid_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">
                        <label for="receive_date">تاريخ أستلام النقدية</label>
                        <input type="date" class="form-control" id="receive_date" name="receive_date">
                        @error('receive_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection


@push('css')
@endpush
