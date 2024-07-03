@extends('layouts.auth.master')

@section('action')
{{ route('login') }}
@endsection

@section('form-title', 'Giriş Yap')

@section('submit-title', 'Giriş Yap')

@section('css')
@endsection


@section('content')
    <div class="input-container">
        <label class="input-label" for="email">E-posta</label>
        <input name="email" type="email" />
    </div>
    <div class="input-container">
        <label class="input-label" for="password">Şifre</label>
        <input name="password" type="password" />
    </div>
    <div class="checkbox-container">
        <input name="remember_me" type="checkbox" />
        <label for="remember_me">Beni Hatırla</label>
    </div>
@endsection


@section('js')

@endsection
