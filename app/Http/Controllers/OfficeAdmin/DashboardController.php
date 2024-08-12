<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Office;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        
        $office = Office::where('id', $request->user()->office->id)->first();

        $psychologists = User::where('is_psychologist', 1)->get();
        $assistants = User::where('is_psychologist', 1)->get();

        $todayAppointments = Appointment::where('date', Carbon::today()->toDateString())->get();
        $appointments = Appointment::all();

        dd($todayAppointments);

        $totalPrice = $todayAppointments->sum('price');

        $todayAppointmentsCash = Appointment::where('date', Carbon::today()->toDateString())->where('payment_type_id', 1)->get();

        $totalPriceCash = $todayAppointmentsCash->sum('price');

        $todayAppointmentsCard = Appointment::where('date', Carbon::today()->toDateString())->where('payment_type_id', 2)->get();

        $totalPriceCard = $todayAppointmentsCard->sum('price');

        return view('office.admin.index', compact('office', 'appointments', 'totalPrice', 'todayAppointments', 'assistants', 'psychologists', 'todayAppointmentsCard', 'todayAppointmentsCash', 'totalPriceCard', 'totalPriceCash'));
    }
}
