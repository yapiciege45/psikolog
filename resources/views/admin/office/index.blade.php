@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')

    <div class="create-area">
        <a class="create-button" data-bs-toggle="modal" data-bs-target="#createModal">+ Ofis Oluştur</a>
    </div>

    <form action="{{ route('dashboard.office.store') }}" method="POST" enctype="multipart/form-data" class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        @csrf
        
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createModalLabel">Oluştur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body edit-modal">
                <div class="input-container">
                    <label for="name" class="input-label">İsim</label>
                    <input name="name" type="text" />
                </div>
                <div class="input-container">
                    <label for="email" class="input-label">E-posta</label>
                    <input name="email" type="email" />
                </div>
                <div class="input-container">
                    <label for="slug" class="input-label">Slug</label>
                    <input name="slug" type="text" />
                </div>
                <div class="input-container">
                    <label for="location" class="input-label">Konum</label>
                    <input name="location" type="text" />
                </div>
                <div class="input-container">
                    <label for="image" class="input-label">Logo</label>
                    <div class="image-container">
                        <input class="image-input" name="image" type="file" />
                        <img class="image-preview" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
          </div>
        </div>
      </form>

    <table id="table" class="stripe" style="width:100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Logo</td>
                <td>İsim</td>
                <td>E-posta</td>
                <td>Slug</td>
                <td>Konum</td>
                <td>İşlemler</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($offices as $office)
                <tr>
                    <td>{{ $office->id }}</td>
                    <td>
                        <img width="40" src="{{ asset($office->image) }}" />
                    </td>
                    <td>{{ $office->name }}</td>
                    <td>{{ $office->email }}</td>
                    <td>{{ $office->slug }}</td>
                    <td>
                        <a href="{{ $office->location }}" target="_blank">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                        </a>
                    </td>
                    <td>
                        <div class="table-actions">
                            <a class="edit-action" data-bs-toggle="modal" data-bs-target="#editModal-{{ $office->id }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            <a href="{{ route('dashboard.office.destroy', ['id' => $office->id]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($offices as $office)
        <form action="{{ route('dashboard.office.update', ['id' => $office->id]) }}" enctype="multipart/form-data" method="POST" class="modal fade" id="editModal-{{ $office->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $office->id }}Label" aria-hidden="true">
            @csrf
            @method('PUT')

            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal-{{ $office->id }}Label">Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal">
                    <div class="input-container">
                        <label for="name" class="input-label">İsim</label>
                        <input name="name" type="text" value="{{ $office->name }}" />
                    </div>
                    <div class="input-container">
                        <label for="email" class="input-label">E-posta</label>
                        <input name="email" type="email" value="{{ $office->email }}" />
                    </div>
                    <div class="input-container">
                        <label for="slug" class="input-label">Slug</label>
                        <input name="slug" type="text" value="{{ $office->slug }}" />
                    </div>
                    <div class="input-container">
                        <label for="location" class="input-label">Konum</label>
                        <input name="location" type="text" value="{{ $office->location }}" />
                    </div>
                    <div class="input-container">
                        <label for="image" class="input-label">Logo</label>
                        <div class="image-container">
                            <input class="image-input" name="image" type="file" />
                            <img class="image-preview" src="{{ asset($office->image) }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
            </div>
        </form>
    @endforeach
@endsection


@section('js')

@endsection