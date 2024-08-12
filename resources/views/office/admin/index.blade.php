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

    <div id="calendar" style="margin-top: 50px;"></div>

@endsection


@section('js')
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var isMobile = window.innerWidth < 800;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: "tr",
            initialView: isMobile ? 'timeGridDay' : 'timeGridDay', // Günlük görünüm
            headerToolbar: {
                left: 'prev,next today', // Önceki ve sonraki günlere gitmek için düğmeler
                center: 'title',
                right: isMobile ? 'timeGridDay' : 'timeGridDay' // Görünüm türü
            },
            height: isMobile ? '500px' : 'auto',
          events: [
                @foreach ($todayAppointments as $appointment)
                <?php
                  $endHour = \Carbon\Carbon::createFromFormat('H:i', $appointment->hour)->addMinutes(30)->format('H:i');
                ?>
                    {
                        id: {{ $appointment->id }},
                        title: "{{ $appointment->user->name }}",
                        start: "{{ $appointment->date }}T{{ $appointment->hour }}:00",
                        end: "{{ $appointment->date }}T{{ $endHour }}:00",
                        location: "{{ $appointment->room->name }}",
                        backgroundColor: "{{ $appointment->room->color }}",
                        borderColor: '#3788d8',
                        textColor: '#ffffff',
                        client_name: "{{ $appointment->client_name }}",
                        client_number: "{{ $appointment->client_number }}",
                        note: "{{ $appointment->note }}",
                        room_name: "{{ $appointment->room->name }}",
                    },
                @endforeach
            ],
        eventDidMount: function(info) {
            // Tooltip içeriğini oluştur
            var tooltipContent = `
                <div>
                    <strong>İsim:</strong> ${info.event.extendedProps.client_name}<br>
                    <strong>Numara:</strong> ${info.event.extendedProps.client_number}<br>
                    <strong>Not:</strong> ${info.event.extendedProps.note}<br>
                    <strong>Oda:</strong> ${info.event.extendedProps.room_name}
                </div>
            `;

            // Tooltip'i oluştur
            var tooltip = new bootstrap.Tooltip(info.el, {
                title: tooltipContent,
                html: true,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        }
        });
        calendar.render();
      });

      const events = [
                @foreach ($todayAppointments as $appointment)
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
@endsection