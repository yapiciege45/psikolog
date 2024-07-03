@extends('layouts.office_admin.master')

@section('css')

@endsection


@section('content')
    <form action="{{ route('office.dashboard.setting.update', ['slug' => $office->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="input-container">
            <label for="opening_hour" class="input-label">Açılış Saati</label>
            <input name="opening_hour" type="time" value="{{ $settings->opening_hour }}" />
        </div>
        <div class="input-container mt-3">
            <label for="closing_hour" class="input-label">Kapanış Saati</label>
            <input name="closing_hour" type="time" value="{{ $settings->closing_hour }}" />
        </div>
        <div class="input-container mt-3">
            <label for="tax" class="input-label">Kesinti (%)</label>
            <input name="tax" type="number" value="{{ $settings->tax }}" />
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
      </form>
@endsection


@section('js')

@endsection