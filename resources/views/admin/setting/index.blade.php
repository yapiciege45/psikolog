@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')
    <form action="{{ route('dashboard.setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="input-container">
            <label for="email" class="input-label">E-posta</label>
            <input name="email" type="email" value="{{ $settings->email }}" />
        </div>
        <div class="input-container mt-3">
            <label for="phone" class="input-label">Telefon</label>
            <input name="phone" type="text" value="{{ $settings->phone }}" />
        </div>
        <div class="input-container mt-3">
            <label for="logo" class="input-label">Logo</label>
            <div class="image-container">
                <input class="image-input" name="logo" type="file" />
                <img class="image-preview" src="{{ asset($settings->logo) }}" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
      </form>
@endsection


@section('js')

@endsection