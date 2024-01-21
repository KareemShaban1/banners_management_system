@extends('layouts.master')
@section('title')
    تعديل الخامة
@endsection
@push('css')
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">تعديل الخامة</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('materials.update', $material->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">أسم الخامة</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $material->name }}">
                        @error('name')
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
