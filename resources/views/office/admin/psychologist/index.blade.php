@extends('layouts.office_admin.master')

@section('css')

@endsection


@section('content')

    <div class="create-area">
        <a class="create-button" data-bs-toggle="modal" data-bs-target="#createModal">+ Psikolog Oluştur</a>
    </div>

    <form action="{{ route('office.dashboard.psychologist.store', ['slug' => $office->slug]) }}" method="POST" enctype="multipart/form-data" class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
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
                    <label for="office_branch" class="input-label">Şubeler</label>
                    <select name="office_branch_id[]" id="office_branch_id" multiple>
                        @foreach ($office_branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="off_days" class="input-label">Tatil Günleri</label>
                    <select name="off_days[]" id="off_days" multiple>
                        @foreach ($days as $day)
                            <option value="{{ $day->id }}">{{ $day->name }}</option>
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
            @foreach ($psychologists as $psychologist)
                <tr>
                    <td>{{ $psychologist->id }}</td>
                    <td>{{ $psychologist->name }}</td>
                    <td>{{ $psychologist->email }}</td>
                    <td>{{ $psychologist->phone }}</td>
                    <td>{{ $psychologist->office->name }}</td>
                    <td>
                        <div class="table-actions">
                            <a class="edit-action" data-bs-toggle="modal" data-bs-target="#editModal-{{ $psychologist->id }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            <a href="{{ route('office.dashboard.psychologist.destroy', ['id' => $psychologist->id, 'slug' => $office->slug]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($psychologists as $psychologist)
        <form action="{{ route('office.dashboard.psychologist.update', ['id' => $psychologist->id, 'slug' => $office->slug]) }}" enctype="multipart/form-data" method="POST" class="modal fade" id="editModal-{{ $psychologist->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $psychologist->id }}Label" aria-hidden="true">
            @csrf
            @method('PUT')

            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal-{{ $psychologist->id }}Label">Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal">
                    <div class="input-container">
                        <label for="name" class="input-label">İsim</label>
                        <input name="name" type="text" value="{{ $psychologist->name }}" />
                    </div>
                    <div class="input-container">
                        <label for="name" class="input-label">E-posta</label>
                        <input name="email" type="email" value="{{ $psychologist->email }}" />
                    </div>
                    <div class="input-container">
                        <label for="tel" class="input-label">Telefon</label>
                        <input name="phone" type="text" value="{{ $psychologist->phone }}" />
                    </div>
                    <div class="input-container">
                        <label for="password" class="input-label">Şifre</label>
                        <input name="password" type="password" placeholder="Güncellemek istemiyorsanız boş bırakınız." />
                    </div>
                    <div class="input-container">
                        <label for="office_branch_id" class="input-label">Şubeler</label>
                        <select 
                            name="office_branch_id[]" 
                            class="office_office_branch_update_id"
                            id="office_select_{{$psychologist->id}}"
                            multiple
                        >
                            @foreach ($office_branches as $branch)
                                <option value="{{ $branch->id }}" @selected($office_branch_ids->contains($branch->id))>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="office_branch_id" class="input-label">Tatil Günleri</label>
                        <select 
                            name="days[]" 
                            class="days_ids"
                            id="days_id_{{$psychologist->id}}"
                            multiple
                        >
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}" @selected($psychologist->days->pluck('id')->contains($day->id))>{{ $day->name }}</option>
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
        <script>
            const office_branch_id_select = new TomSelect("#office_branch_id");
            new TomSelect("#off_days");

            $('.office_office_branch_update_id').each(function() {
                new TomSelect('#' + $(this).attr('id'));
            })

            $('.days_ids').each(function() {
                new TomSelect('#' + $(this).attr('id'));
            })
        </script>
@endsection