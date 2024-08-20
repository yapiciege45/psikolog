@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')

    <div class="create-area">
        <a class="create-button" data-bs-toggle="modal" data-bs-target="#createModal">+ Asistan Oluştur</a>
    </div>

    <form action="{{ route('dashboard.assistant.store') }}" method="POST" enctype="multipart/form-data" class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
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
                <div class="input-container">
                    <label for="office_branch" class="input-label">Şubeler</label>
                    <select name="office_branch_id[]" id="office_branch_id" multiple></select>
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
            @foreach ($assistants as $assistant)
                <tr>
                    <td>{{ $assistant->id }}</td>
                    <td>{{ $assistant->name }}</td>
                    <td>{{ $assistant->email }}</td>
                    <td>{{ $assistant->phone }}</td>
                    <td>{{ $assistant->office->name }}</td>
                    <td>
                        <div class="table-actions">
                            <a class="edit-action" data-bs-toggle="modal" data-bs-target="#editModal-{{ $assistant->id }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            <a href="{{ route('dashboard.assistant.destroy', ['id' => $assistant->id]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($assistants as $assistant)
        <form action="{{ route('dashboard.assistant.update', ['id' => $assistant->id]) }}" enctype="multipart/form-data" method="POST" class="modal fade" id="editModal-{{ $assistant->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $assistant->id }}Label" aria-hidden="true">
            @csrf
            @method('PUT')

            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal-{{ $assistant->id }}Label">Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal">
                    <div class="input-container">
                        <label for="name" class="input-label">İsim</label>
                        <input name="name" type="text" value="{{ $assistant->name }}" />
                    </div>
                    <div class="input-container">
                        <label for="name" class="input-label">E-posta</label>
                        <input name="email" type="email" value="{{ $assistant->email }}" />
                    </div>
                    <div class="input-container">
                        <label for="tel" class="input-label">Telefon</label>
                        <input name="phone" type="text" value="{{ $assistant->phone }}" />
                    </div>
                    <div class="input-container">
                        <label for="password" class="input-label">Şifre</label>
                        <input name="password" type="password" placeholder="Güncellemek istemiyorsanız boş bırakınız." />
                    </div>
                    <div class="input-container">
                        <label for="office_id" class="input-label">Ofis</label>
                        <select name="office_id" id="office_id" class="office_update_id" data-id="{{ $assistant->id }}" >
                            <option value="0">Seçiniz</option>
                            @foreach ($offices as $office)
                                <option value="{{ $office->id }}" @selected($office->id == $assistant->office->id)>{{ $office->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="office_branch_id" class="input-label">Şubeler</label>
                        <select 
                            name="office_branch_id[]" 
                            class="office_office_branch_update_id" 
                            data-selected-branch-ids='[@foreach ($assistant->office->officeBranches as $branch) "{{$branch->id}}" @if(!$loop->last),@endif @endforeach]' 
                            data-selected-office-id="{{ $assistant->office->id }}" 
                            data-id="{{ $assistant->id }}" 
                            id="office_branch_update_id_{{ $assistant->id }}" 
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
        <script>
            const office_branch_id_select = new TomSelect("#office_branch_id");

            const offices = [
                @foreach ($offices as $office)
                    {
                        id: {{ $office->id }},
                        name: "{{ $office->name }}",
                        email: "{{ $office->email }}",
                        image: "{{ asset($office->image) }}",
                        location: "{{ $office->location }}",
                        branches: [
                            @foreach ($office->officeBranches as $branch)
                                {
                                    id: {{ $branch->id }},
                                    office_id: {{ $office->id }},
                                    name: "{{ $branch->name }}"
                                },
                            @endforeach
                        ]
                    },
                @endforeach
            ]

            $('#office_id').on('change', function() {
                const selected_office = offices.find(x => x.id == $(this).val())

                office_branch_id_select.clear()
                office_branch_id_select.clearOptions()

                console.log(selected_office.branches)

                office_branch_id_select.addOption(selected_office.branches.map(x => ({
                    value: x.id,
                    text: x.name,
                })));

                office_branch_id_select.refreshOptions();
            })

            let toms = []

            $('.office_office_branch_update_id').each(function() {
                const branch_update_select = new TomSelect('#office_branch_update_id_' + $(this).data('id'))

                toms.push(branch_update_select)

                const selected_office = offices.find(x => x.id == $(this).data('selected-office-id'))

                branch_update_select.clear()
                branch_update_select.clearOptions()

                branch_update_select.addOption(selected_office.branches.map(x => ({
                    value: x.id,
                    text: x.name,
                })));

                branch_update_select.refreshOptions();

                console.log($(this).data('selected-branch-ids'))

                branch_update_select.setValue($(this).data('selected-branch-ids'))
            })

            $('.office_update_id').on('change', function() {
                const tom = toms.find(x => x.input.dataset.id == $(this).data('id'))

                console.log(tom)

                tom.clear()
                tom.clearOptions()

                const selected_office = offices.find(x => x.id == $(this).val())

                tom.addOption(selected_office.branches.map(x => ({
                    value: x.id,
                    text: x.name,
                })));

                tom.refreshOptions();
            })

        </script>
@endsection