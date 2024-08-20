@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')

    <div class="create-area">
        <a class="create-button" data-bs-toggle="modal" data-bs-target="#createModal">+ Şube Oluştur</a>
    </div>

    <form action="{{ route('dashboard.branch.store') }}" method="POST" enctype="multipart/form-data" class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
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
                    <label for="office_id" class="input-label">Ofis</label>
                    <select name="office_id" id="office_id">
                        <option value="0">Seçiniz</option>
                        @foreach ($offices as $office)
                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                    </select>
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
                <td>İsim</td>
                <td>Ofis</td>
                <td>İşlemler</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($office_branches as $office_branch)
                <tr>
                    <td>{{ $office_branch->id }}</td>
                    <td>{{ $office_branch->name }}</td>
                    <td>{{ $office_branch->office->name }}</td>
                    <td>
                        <div class="table-actions">
                            <a class="edit-action" data-bs-toggle="modal" data-bs-target="#editModal-{{ $office_branch->id }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            <a href="{{ route('dashboard.branch.destroy', ['id' => $office_branch->id]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($office_branches as $office_branch)
        <form action="{{ route('dashboard.branch.update', ['id' => $office_branch->id]) }}" enctype="multipart/form-data" method="POST" class="modal fade" id="editModal-{{ $office_branch->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $office_branch->id }}Label" aria-hidden="true">
            @csrf
            @method('PUT')

            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal-{{ $office_branch->id }}Label">Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal">
                    <div class="input-container">
                        <label for="name" class="input-label">İsim</label>
                        <input name="name" type="text" value="{{ $office_branch->name }}" />
                    </div>
                    <div class="input-container">
                        <label for="office_id" class="input-label">Ofis</label>
                        <select name="office_id" id="office_id">
                            <option value="0">Seçiniz</option>
                            @foreach ($offices as $office)
                                <option value="{{ $office->id }}" @selected($office->id == $office_branch->office->id)>{{ $office->name }}</option>
                            @endforeach
                        </select>
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