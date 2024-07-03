@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')


    <table id="table" class="stripe" style="width:100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Konu</td>
                <td>E-posta</td>
                <td>Mesaj</td>
                <td>İşlemler</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('dashboard.contact.destroy', ['id' => $contact->id]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection


@section('js')

@endsection