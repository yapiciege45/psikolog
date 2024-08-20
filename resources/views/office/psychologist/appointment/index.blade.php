@extends('layouts.psychologist.master')

@section('css')

@endsection


@section('content')

    <div class="create-area">
        <a class="create-button" data-bs-toggle="modal" data-bs-target="#createModal">+ Randevu Oluştur</a>
    </div>

    <form action="{{ route('office.psychologist.appointment.store', ['slug' => $office->slug]) }}" method="POST" enctype="multipart/form-data" class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        @csrf
        
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createModalLabel">Oluştur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body edit-modal">
                <div class="input-container">
                    <label for="client_name" class="input-label">Danışan İsim</label>
                    <input name="client_name" type="text" />
                </div>
                <div class="input-container">
                    <label for="client_number" class="input-label">Telefon</label>
                    <input name="client_number" type="text" />
                </div>
                <div class="input-container">
                    <label for="client_email" class="input-label">Email</label>
                    <input name="client_email" type="email" />
                </div>
                <div class="input-container">
                    <label for="partners_name" class="input-label">Eşinin Adı</label>
                    <input name="partners_name" type="text" />
                </div>
                <div class="input-container">
                    <label for="type_id" class="input-label">Seans Türü</label>
                    <select name="type_id" id="type_id">
                        <option value="0">Seçiniz</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="room_id" class="input-label">Oda Türü</label>
                    <select name="room_id" id="room_id" class="appointment-room" data-id="0">
                        <option value="0">Seçiniz</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="date" class="input-label">Tarih</label>
                    <input name="date" type="date" class="appointment-date" data-id="0" />
                </div>
                <div class="input-container">
                    <label for="hour" class="input-label">Saat</label>
                    <select name="hour" id="hour" class="appointment-hour" data-id="0">
                        
                    </select>
                </div>
                <div class="input-container">
                    <label for="payment_type_id" class="input-label">Ödeme Tipi</label>
                    <select name="payment_type_id" id="payment_type_id" >
                        @foreach ($payment_types as $payment_type)
                            <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="price" class="input-label">Ücret</label>
                    <input name="price" type="text" />
                </div>
                <div class="input-container">
                    <label for="sms_type_id" class="input-label">SMS Gönderimi</label>
                    <select name="sms_type_id" id="sms_type_id" >
                        <option value="0">Gönderme</option>
                        <option value="1">Hemen</option>
                        <option value="2">Yarın</option>
                        <option value="3">1 Gün Önce</option>
                        <option value="4">3 Gün Önce</option>
                        <option value="5">1 Hafta Önce</option>
                        <option value="6">Randevu Günü</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="repeat_id" class="input-label">Tekrarlama</label>
                    <select name="repeat_id" id="repeat_id" >
                        <option value="0">Tek Seferlik</option>
                        <option value="1">Her Haftada Bir</option>
                        <option value="2">İki Haftada Bir</option>
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

    <table id="table-appointments" class="stripe" style="width:100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Danışan İsim</td>
                <td>Telefon</td>
                <td>Email</td>
                <td>Eşinin Adı</td>
                <td>Seans Türü</td>
                <td>Oda</td>
                {{-- <td>Uygulamalar</td> --}}
                <td>Tarih</td>
                <td>Saat</td>
                <td>Ödeme Tipi</td>
                <td>Ücret</td>
                <td>İşlemler</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->client_name }}</td>
                    <td>{{ $appointment->client_number }}</td>
                    <td>{{ $appointment->client_email }}</td>
                    <td>{{ $appointment->partners_name }}</td>
                    <td>{{ $appointment->type->name }}</td>
                    <td>{{ $appointment->room->name }}</td>
                    {{-- <td>{{ implode(', ', $appointment->applications->pluck('name')->toArray()) }}</td> --}}
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->hour }}</td>
                    <td>{{ $appointment->paymentType ? $appointment->paymentType->name : 'Belirsiz' }}</td>
                    <td>{{ $appointment->price }} ({{ $appointment->price - (($appointment->price / 100) * $settings->tax) }})</td>
                    <td>
                        <div class="table-actions">
                            <a class="edit-action" data-bs-toggle="modal" data-bs-target="#editModal-{{ $appointment->id }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            <a href="{{ route('office.psychologist.appointment.destroy', ['id' => $appointment->id, 'slug' => $office->slug]) }}"  class="delete-action">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($appointments as $appointment)
        <form action="{{ route('office.psychologist.appointment.update', ['id' => $appointment->id, 'slug' => $office->slug]) }}" enctype="multipart/form-data" method="POST" class="modal fade" id="editModal-{{ $appointment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $appointment->id }}Label" aria-hidden="true">
            @csrf
            @method('PUT')

            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal-{{ $appointment->id }}Label">Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal">
                    <div class="input-container">
                        <label for="client_name" class="input-label">Danışan İsim</label>
                        <input name="client_name" type="text" value="{{ $appointment->client_name }}" />
                    </div>
                    <div class="input-container">
                        <label for="client_number" class="input-label">Telefon</label>
                        <input name="client_number" type="text" value="{{ $appointment->client_number }}" />
                    </div>
                    <div class="input-container">
                        <label for="client_email" class="input-label">Email</label>
                        <input name="client_email" type="email" value="{{ $appointment->client_email }}" />
                    </div>
                    <div class="input-container">
                        <label for="partners_name" class="input-label">Eşinin Adı</label>
                        <input name="partners_name" type="text" value="{{ $appointment->partners_name }}" />
                    </div>
                    <div class="input-container">
                        <label for="type_id" class="input-label">Seans Türü</label>
                        <select name="type_id" id="type_id">
                            <option value="0">Seçiniz</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected($type->id == $appointment->type_id)>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="room_id" class="input-label">Oda Türü</label>
                        <select name="room_id" id="room_id" class="appointment-room" data-id="{{ $appointment->id }}">
                            <option value="0">Seçiniz</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" @selected($room->id == $appointment->room_id)>{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="date" class="input-label">Tarih</label>
                        <input name="date" type="date" class="appointment-date" value="{{ $appointment->date }}" data-id="{{ $appointment->id }}" />
                    </div>
                    <div class="input-container">
                        <label for="hour" class="input-label">Saat</label>
                        <select name="hour" id="hour" class="appointment-hour" data-id="{{ $appointment->id }}">
                            <option value="0">Seçiniz</option>
                            @foreach ($hours as $hour)
                                <option value="{{ $hour }}" @selected($hour == $appointment->hour)>{{ $hour }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="payment_type_id" class="input-label">Ödeme Tipi</label>
                        <select name="payment_type_id" id="payment_type_id" >
                            @foreach ($payment_types as $payment_type)
                                <option value="{{ $payment_type->id }}" @selected($appointment->payment_type_id == $payment_type->id)>{{ $payment_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="price" class="input-label">Ücret</label>
                        <input name="price" type="text" value="{{ $appointment->price }}" />
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
            const hours = [
                @foreach ($hours as $hour)
                    "{{ $hour }}",
                @endforeach
            ]

            const appointments = [
                @foreach ($appointments as $appointment)
                    {
                        id: {{ $appointment->id }},
                        hour: "{{ $appointment->hour }}",
                        date: "{{ $appointment->date }}",
                        room: {{ $appointment->room_id }}
                    },
                @endforeach
            ]

            console.log(appointments)

            function checkHour(id) {
                console.log('data id: ', id)

                const date = $(`.appointment-date[data-id="${id}"]`).val();
                const room = $(`.appointment-room[data-id="${id}"]`).val();

                console.log('date: ', date)
                console.log('room: ', room)

                if(date && room) {
                    const findedAppointments = appointments.filter(x => (x.room == room && x.date == date))

                    const findedHours = findedAppointments.map(x => x.hour)

                    const applyingHours = hours.filter(x => !findedHours.includes(x))

                    console.log($(`.appointment-hour[data-id="${id}"]`))

                    $(`.appointment-hour[data-id="${id}"]`).html('')

                    $(`.appointment-hour[data-id="${id}"]`).append(`
                        <option value="0">Seçiniz</option>
                    `)

                    applyingHours.forEach(x => {
                        $(`.appointment-hour[data-id="${id}"]`).append(`
                            <option value="${x}">${x}</option>
                        `)
                    })
                }
            }

            $('.appointment-date').on('change', function() {
                checkHour($(this).data('id'))
            })

            $('.appointment-room').on('change', function() {
                checkHour($(this).data('id'))
            })
        </script>

<script>
    $(document).ready(function() {
        // Bugünün tarihini YYYY-MM-DD formatında al
        var today = new Date().toISOString().split('T')[0];

        // DataTable'ı başlat
        var table = $('#table-appointments').DataTable({
            initComplete: function(settings, json) {
                // Bugün ile eşleşen satırları filtrele
                this.api().search(today).draw();
            }
        });

        // Kullanıcı arama yaparsa filtreyi kaldır
        $('#table_filter input').on('input', function() {
            if ($(this).val() === '') {
                table.search('').draw(); // Tüm verileri göster
            }
        });
    });
</script>

@endsection