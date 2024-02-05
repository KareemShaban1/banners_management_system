@extends('layouts.master')

@section('title')
    أضافة عميل
@endsection

@push('css')
@endpush


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">أضافة عميل</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('clients.store') }}" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">أسم العميل</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">
                        <label for="company">أسم الشركة </label>
                        <input type="text" class="form-control" name="company" id="company">
                        @error('company')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="address">العنوان </label>
                        <input type="text" class="form-control" name="address" id="address">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">
                        <label for="class_id"> تصنيف العميل</label>
                        <select class="custom-select mr-sm-2" id="class_id" name="class_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id')
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
