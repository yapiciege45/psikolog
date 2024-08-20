@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')

    <div class="create-area">
        <a class="create-button" data-bs-toggle="modal" data-bs-target="#createModal">+ Ofis Admin Oluştur</a>
    </div>

    <form action="{{ route('dashboard.office_admin.store') }}" method="POST" enctype="multipart/form-data" class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
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
                    <label for="email" class="input-label">Email</label>
                    <input name="email" type="email" />
                </div>
                <div class="input-container">
                    <label for="tel" class="input-label">Telefon</label>
                    <input name="phone" type="text" />
                </div>
                <div class="input-container">
                    <label for="password" class="input-label">Şifre</label>
                    <input name="password" type="password" />
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
                <td>Email</td>
                <td>Telefon</td>
                <td>Ofis</td>
                <td>İşlemler</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($office_admins as $office_admin)
                <tr>
                    <td>{{ $office_admin->id }}</td>
                    <td>{{ $office_admin->name }}</td>
                    <td>{{ $office_admin->email }}</td>
                    <td>{{ $office_admin->phone }}</td>
                    <td>{{ $office_admin->office->name }}</td>
                    <td>
                        <div class="table-actions">
                            <a class="edit-action" data-bs-toggle="modal" data-bs-target="#editModal-{{ $office_admin->id }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            <a href="{{ route('dashboard.office_admin.destroy', ['id' => $office_admin->id]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($office_admins as $office_admin)
        <form action="{{ route('dashboard.office_admin.update', ['id' => $office_admin->id]) }}" enctype="multipart/form-data" method="POST" class="modal fade" id="editModal-{{ $office_admin->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $office_admin->id }}Label" aria-hidden="true">
            @csrf
            @method('PUT')

            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal-{{ $office_admin->id }}Label">Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal">
                    <div class="input-container">
                        <label for="name" class="input-label">İsim</label>
                        <input name="name" type="text" value="{{ $office_admin->name }}" />
                    </div>
                    <div class="input-container">
                        <label for="name" class="input-label">E-posta</label>
                        <input name="email" type="email" value="{{ $office_admin->email }}" />
                    </div>
                    <div class="input-container">
                        <label for="tel" class="input-label">Telefon</label>
                        <input name="phone" type="text" value="{{ $office_admin->phone }}" />
                    </div>
                    <div class="input-container">
                        <label for="password" class="input-label">Şifre</label>
                        <input name="password" type="password" placeholder="Güncellemek istemiyorsanız boş bırakınız." />
                    </div>
                    <div class="input-container">
                        <label for="office_id" class="input-label">Ofis</label>
                        <select name="office_id" id="office_id" class="office_update_id" data-id="{{ $office_admin->id }}" >
                            <option value="0">Seçiniz</option>
                            @foreach ($offices as $office)
                                <option value="{{ $office->id }}" @selected($office->id == $office_admin->office->id)>{{ $office->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="office_branch_id" class="input-label">Şubeler</label>
                        <select 
                            name="office_branch_id[]" 
                            class="office_office_branch_update_id" 
                            data-selected-branch-ids='[@foreach ($office_admin->office->officeBranches as $branch) "{{$branch->id}}" @if(!$loop->last),@endif @endforeach]' 
                            data-selected-office-id="{{ $office_admin->office->id }}" 
                            data-id="{{ $office_admin->id }}" 
                            id="office_branch_update_id_{{ $office_admin->id }}" 
                            multiple
                        >

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