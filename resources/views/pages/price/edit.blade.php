@extends('layouts.master')

@section('title')
    تعديل سعر
@endsection
@push('css')
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">تعديل سعر</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('prices.update', $price->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="class_id"> تصنيف العميل</label>
                        <select class="custom-select mr-sm-2" id="class_id" name="class_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" @selected($class->id == $price->class_id)>{{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="material_id"></label>
                        <select class="custom-select mr-sm-2" id="material_id" name="material_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}" @selected($material->id == $price->material_id)>{{ $material->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('material_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="price">السعر</label>
                        <input type="text" class="form-control" name="price" id="price"
                            value="{{ $price->price }}">
                        @error('price')
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
