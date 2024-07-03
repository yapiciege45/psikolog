<?php

namespace App\Http\Controllers\Psychologist;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Office;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $office = Office::where('id', $request->user()->office_id)->first();

        $todayAppointments = Appointment::where('user_id', $request->user()->id)->where('date', Carbon::today()->toDateString())->get();

        $totalPrice = $todayAppointments->sum('price');

        $todayAppointmentsCash = Appointment::where('user_id', $request->user()->id)->where('date', Carbon::today()->toDateString())->where('payment_type_id', 1)->get();

        $totalPriceCash = $todayAppointmentsCash->sum('price');

        $todayAppointmentsCard = Appointment::where('user_id', $request->user()->id)->where('date', Carbon::today()->toDateString())->where('payment_type_id', 2)->get();

        $totalPriceCard = $todayAppointmentsCard->sum('price');


        return view('office.psychologist.index', compact('todayAppointments', 'totalPrice', 'office', 'totalPriceCard', 'totalPriceCash', 'todayAppointmentsCard', 'todayAppointmentsCash'));
    }
}
