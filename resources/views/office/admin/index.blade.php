@extends('layouts.office_admin.master')

@section('css')

@endsection


@section('content')
    <div class="dashboard-items">
        <div class="dashboard-item red">
            <div class="dashboard-item-logo">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h.5" /><path d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z" /></svg>
            </div>
            <div class="dashboard-item-right">
                <p>Psikolog Sayısı</p>
                <p>{{ $psychologists ? count($psychologists) : 0 }}</p>
            </div>
        </div>
        <div class="dashboard-item blue">
            <div class="dashboard-item-logo">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-cog"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" /><path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19.001 15.5v1.5" /><path d="M19.001 21v1.5" /><path d="M22.032 17.25l-1.299 .75" /><path d="M17.27 20l-1.3 .75" /><path d="M15.97 17.25l1.3 .75" /><path d="M20.733 20l1.3 .75" /></svg>
            </div>
            <div class="dashboard-item-right">
                <p>Asistan Sayısı</p>
                <p>{{ $assistants ? count($assistants) : 0 }}</p>
            </div>
        </div>
        <div class="dashboard-item orange">
            <div class="dashboard-item-logo">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6l0 13" /><path d="M12 6l0 13" /><path d="M21 6l0 13" /></svg>
            </div>
            <div class="dashboard-item-right">
                <p>Bugünkü Randevu Sayısı</p>
                <p>{{ $todayAppointments ? count($todayAppointments) : 0 }}</p>
            </div>
        </div>
        <div class="dashboard-item green">
            <div class="dashboard-item-logo">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
            </div>
            <div class="dashboard-item-right">
                <p>Bugünkü Toplam Kazanılan</p>
                <p>{{ $todayAppointments ? $totalPrice : 0 }} TL</p>
            </div>
        </div>

        <div class="dashboard-item green">
            <div class="dashboard-item-logo">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
            </div>
            <div class="dashboard-item-right">
                <p>Nakit Ödenilen</p>
                <p>{{ $todayAppointmentsCash ? $totalPriceCash : 0 }} TL</p>
            </div>
        </div>
    
        <div class="dashboard-item purple">
            <div class="dashboard-item-logo">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" /><path d="M3 10h18" /><path d="M16 19h6" /><path d="M19 16l3 3l-3 3" /><path d="M7.005 15h.005" /><path d="M11 15h2" /></svg>
            </div>
            <div class="dashboard-item-right">
                <p>Kartla Ödenilen</p>
                <p>{{ $todayAppointmentsCard ? $totalPriceCard : 0 }} TL</p>
            </div>
        </div>
    </div>

    <select id="view-selector" class="form-select mt-5">
        <option value="timeGridDay">Günlük Görünüm</option>
        <option value="timeGridWeek">Haftalık Görünüm</option>
        <option value="dayGridMonth">Aylık Görünüm</option>
    </select>

    <div id="calendar" style="margin-top: 50px;"></div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="appointmentModalLabel">Yeni Randevu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body edit-modal" id="appointmentModalBody">
            <!-- Modal Body Content -->
          </div>
        </div>
      </div>
    </div>

@endsection


@section('js')
<script>

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var isMobile = window.innerWidth < 800;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: "tr",
        initialView: isMobile ? 'timeGridDay' : 'timeGridWeek', 
        headerToolbar: {
            left: 'prev,next today', 
            center: 'title',
            right: isMobile ? 'timeGridDay' : 'timeGridWeek' 
        },
        height: isMobile ? '500px' : 'auto',
        events: [
            @foreach ($appointments as $appointment)
            <?php
              $endHour = null;

              if($appointment->hour) {
                $endHour = \Carbon\Carbon::createFromFormat('H:i', $appointment->hour)->addHour()->format('H:i');
              }
            ?>
            {
                id: {{ $appointment->id }},
                title: "{{ $appointment->user->name . ' - ' . $appointment->client_name ?? 'Bilinmiyor' }}",
                start: "{{ $appointment->date ?? '' }}T{{ $appointment->hour ?? '00:00' }}:00",
                end: "{{ $appointment->date ?? '' }}T{{ $endHour ?? $appointment->hour }}:00",
                location: "{{ $appointment->room->name ?? 'Oda yok' }}",
                backgroundColor: "{{ $appointment->room->color ?? '#000080' }}",
                borderColor: '#3788d8',
                textColor: '#ffffff',
                user_name: "{{ $appointment->user->name ?? '' }}",
                client_name: "{{ $appointment->client_name ?? '' }}",
                client_number: "{{ $appointment->client_number ?? '' }}",
                client_email: "{{ $appointment->client_email ?? '' }}",
                partners_name: "{{ $appointment->partners_name ?? '' }}",
                type_id: "{{ $appointment->type_id ?? '' }}",
                room_id: "{{ $appointment->room_id ?? '' }}",
                appointment_date: "{{ $appointment->date ?? '' }}",
                appointment_hour: "{{ $appointment->hour ?? '' }}",
                payment_type_id: "{{ $appointment->payment_type_id ?? '' }}",
                price: "{{ $appointment->price ?? '' }}",
                sms_type_id: "{{ $appointment->sms_type_id ?? '' }}",
                repeat_id: "{{ $appointment->repeat_id ?? '' }}",
                appointment_id: "{{ $appointment->id ?? '' }}",
                note: "{{ $appointment->note ?? '' }}",
                room_name: "{{ $appointment->room->name ?? '' }}",
            },
            @endforeach
        ],
        eventDidMount: function(info) {
            var tooltipContent = `
                <div>
                    <strong>Psikolog İsim:</strong> ${info.event.extendedProps.user_name}<br>
                    <strong>Danışan İsim:</strong> ${info.event.extendedProps.client_name}<br>
                    <strong>Numara:</strong> ${info.event.extendedProps.client_number}<br>
                    <strong>Not:</strong> ${info.event.extendedProps.note}<br>
                    <strong>Oda:</strong> ${info.event.extendedProps.room_name}
                </div>
            `;

            var tooltip = new bootstrap.Tooltip(info.el, {
                title: tooltipContent,
                html: true,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        },
        eventClick: function(info) {
            var modalTitle = `Randevu Güncelle`;
            var modalBody = `
                <form id="modal-form" class="edit-modal" action="{{ route('office.dashboard.appointment.update', ['id' => 0, 'slug' => $office->slug]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="input-container">
                    <label for="user_id" class="input-label">Psikolog</label>
                    <select name="user_id" id="user_id">
                        <option value="">Seçiniz</option>
                        @foreach ($assistants as $assistant)
                            <option value="{{ $assistant->id }}" ${info.event.extendedProps.user_name == "{{ $assistant->name }}" && 'selected'}>{{ $assistant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="client_name" class="input-label">Danışan İsim</label>
                    <input name="client_name" type="text" value="${info.event.extendedProps.client_name}" />
                </div>
                <div class="input-container">
                    <label for="client_number" class="input-label">Telefon</label>
                    <input name="client_number" type="text" value="${info.event.extendedProps.client_number}" />
                </div>
                <div class="input-container">
                    <label for="client_email" class="input-label">Email</label>
                    <input name="client_email" type="email" value="${info.event.extendedProps.client_email}" />
                </div>
                <div class="input-container">
                    <label for="partners_name" class="input-label">Eşinin Adı</label>
                    <input name="partners_name" type="text" value="${info.event.extendedProps.partners_name}" />
                </div>
                <div class="input-container">
                    <label for="type_id" class="input-label">Seans Türü</label>
                    <select name="type_id" id="type_id">
                        <option value="">Seçiniz</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" ${info.event.extendedProps.type_id == "{{ $type->id }}" && "selected"}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="room_id" class="input-label">Oda Türü</label>
                    <select name="room_id" id="room_id" class="appointment-room" data-id="0">
                        <option value="">Seçiniz</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" ${info.event.extendedProps.room_id == "{{ $room->id }}" && "selected"}>{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="date" class="input-label">Tarih</label>
                    <input name="date" type="date" class="appointment-date" data-id="0" value="${info.event.extendedProps.appointment_date}" />
                </div>
                <div class="input-container">
                    <label for="hour" class="input-label">Saat</label>
                    <select name="hour" id="hour" class="appointment-hour" data-id="0">
                        <option select="0">Seçiniz</option>
                        <option value="${info.event.extendedProps.appointment_hour}" selected>
                          ${info.event.extendedProps.appointment_hour}
                        </option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="payment_type_id" class="input-label">Ödeme Tipi</label>
                    <select name="payment_type_id" id="payment_type_id" >
                        @foreach ($payment_types as $payment_type)
                            <option value="{{ $payment_type->id }}" ${info.event.extendedProps.payment_type_id == "{{ $payment_type->id }}" && "selected"}>{{ $payment_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="price" class="input-label">Ücret</label>
                    <input name="price" type="text" value="${info.event.extendedProps.price}" />
                </div>
                <div class="input-container">
                    <label for="sms_type_id" class="input-label">SMS Gönderimi</label>
                    <select name="sms_type_id" id="sms_type_id">
                        <option value="0" ${info.event.extendedProps.sms_type_id == "0" && "selected"}>Gönderme</option>
                        <option value="1" ${info.event.extendedProps.sms_type_id == "1" && "selected"}>Hemen</option>
                        <option value="2" ${info.event.extendedProps.sms_type_id == "2" && "selected"}>Yarın</option>
                        <option value="3" ${info.event.extendedProps.sms_type_id == "3" && "selected"}>1 Gün Önce</option>
                        <option value="4" ${info.event.extendedProps.sms_type_id == "4" && "selected"}>3 Gün Önce</option>
                        <option value="5" ${info.event.extendedProps.sms_type_id == "5" && "selected"}>1 Hafta Önce</option>
                        <option value="6" ${info.event.extendedProps.sms_type_id == "6" && "selected"}>Randevu Günü</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="repeat_id" class="input-label">Tekrarlama</label>
                    <select name="repeat_id" id="repeat_id" >
                        <option value="0" ${info.event.extendedProps.repeat_id == "0" && "selected"}>Tek Seferlik</option>
                        <option value="1" ${info.event.extendedProps.repeat_id == "1" && "selected"}>Her Haftada Bir</option>
                        <option value="2" ${info.event.extendedProps.repeat_id == "2" && "selected"}>İki Haftada Bir</option>
                    </select>
                </div>
                <div style="width:100%;display:flex;align-items:center;justify-content:end;padding: 20px;gap:20px;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                  <a class="btn btn-danger" id="delete-button" href="{{ route('office.dashboard.appointment.destroy', ['id' => 0, 'slug' => $office->slug]) }}">Sil</a>
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
                </form>
            `;
            $('#appointmentModalLabel').text(modalTitle);
            $('#appointmentModalBody').html(modalBody);
            $('#createModal').modal('show');

            let action = '{{ route('office.dashboard.appointment.update', ['id' => 0, 'slug' => $office->slug]) }}'

            action = action.replace('/0', '/' + info.event.extendedProps.appointment_id)

            let href = "{{ route('office.dashboard.appointment.destroy', ['id' => 0, 'slug' => $office->slug]) }}"

            href = href.replace('/0', '/' + info.event.extendedProps.appointment_id)

            $('#modal-form').attr('action', action)
             $('#delete-button').attr('href', href)

            restartEvents()
        },
        dateClick: function(info) {
            var modalTitle = `Yeni Randevu`;
            var modalBody = `
                <form class="edit-modal" action="{{ route('office.dashboard.appointment.store', ['slug' => $office->slug]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="input-container">
                    <label for="user_id" class="input-label">Psikolog</label>
                    <select name="user_id" id="user_id">
                        <option value="">Seçiniz</option>
                        @foreach ($assistants as $assistant)
                            <option value="{{ $assistant->id }}">{{ $assistant->name }}</option>
                        @endforeach
                    </select>
                </div>
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
                        <option value="">Seçiniz</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="room_id" class="input-label">Oda Türü</label>
                    <select name="room_id" id="room_id" class="appointment-room" data-id="0">
                        <option value="">Seçiniz</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-container">
                    <label for="date" class="input-label">Tarih</label>
                    <input name="date" type="date" class="appointment-date" data-id="0" value="${info.dateStr.split('T')[0]}" />
                </div>
                <div class="input-container">
                    <label for="hour" class="input-label">Saat</label>
                    <select name="hour" id="hour" class="appointment-hour" data-id="0">
                        <option select="0">Seçiniz</option>
                        <option value="${info.dateStr.split('T')[1].split(':')[0]}:${info.dateStr.split('T')[1].split(':')[1]}" selected>
                          ${info.dateStr.split('T')[1].split(':')[0]}:${info.dateStr.split('T')[1].split(':')[1]}
                        </option>
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
                <div style="width:100%;display:flex;align-items:center;justify-content:end;padding: 20px;gap: 20px;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
                </form>
            `;
            $('#appointmentModalLabel').text(modalTitle);
            $('#appointmentModalBody').html(modalBody);
            $('#createModal').modal('show');

            restartEvents()
        }
    });
    calendar.render();

    $('#view-selector').val(isMobile ? 'timeGridDay' : 'timeGridWeek')

    // Update the calendar view based on the select dropdown value
    document.getElementById('view-selector').addEventListener('change', function() {
        var selectedView = this.value;
        calendar.changeView(selectedView);
    });
});


      const events = [
                @foreach ($appointments as $appointment)
                    {
                        title: "{{ $appointment->client_name }}",
                        start: "{{ $appointment->date }}",
                        location: "{{ $appointment->room->name }}",
                        backgroundColor: '#3788d8',
                        borderColor: '#3788d8',
                        textColor: '#ffffff'
                    },
                @endforeach
            ]
</script>

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

                    const val = $(`.appointment-hour[data-id="${id}"]`).val();

                    $(`.appointment-hour[data-id="${id}"]`).html('')

                    $(`.appointment-hour[data-id="${id}"]`).append(`
                        <option value="">Seçiniz</option>
                    `)

                    applyingHours.forEach(x => {
                        $(`.appointment-hour[data-id="${id}"]`).append(`
                            <option value="${x}" ${val == x && 'selected'}>${x}</option>
                        `)
                    })
                }
            }

            function restartEvents() {
              $('.appointment-date').on('change', function() {
                  checkHour($(this).data('id'))
              })

              $('.appointment-room').on('change', function() {
                  checkHour($(this).data('id'))
              })
            }

            
        </script>

        <script>
            const sms = [
                @foreach ($smses as $sms)
                    "{{ $sms->number }}"
                @endforeach
            ]

            $(document).ready(function() {
                console.log(sms)
            })
        </script>
@endsection