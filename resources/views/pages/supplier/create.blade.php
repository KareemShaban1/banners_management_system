@extends('layouts.master')

@section('title')
    أضافة مزود خدمة
@endsection
@push('css')
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">أضافة مزود خدمة</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('suppliers.store') }}" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">أسم مزود الخدمة</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">البريد الألكترونى</label>
                        <input type="email" class="form-control" name="email" id="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address">العنوان </label>
                        <input type="text" class="form-control" name="address" id="address">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="phone"> رقم الهاتف</label>
                        <input type="phone" class="form-control" id="phone_number" name="phone_number">
                        @error('phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="another_phone_number"> رقم هاتف أخر</label>
                        <input type="phone" class="form-control" id="another_phone_number" name="another_phone_number">
                        @error('another_phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
@push('js')
@endpush
