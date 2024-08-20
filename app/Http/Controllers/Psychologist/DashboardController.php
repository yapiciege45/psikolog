<?php

namespace App\Http\Controllers\Psychologist;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Appointment;
use App\Models\OfficeSetting;
use App\Models\PaymentType;
use App\Models\Room;
use App\Models\Office;
use App\Models\Sms;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $office = Office::where('id', $request->user()->office_id)->first();

        $todayAppointments = Appointment::where('user_id', $request->user()->id)->where('date', Carbon::today()->toDateString())->get();
        $assistants = User::where('is_psychologist', 1)->get();

        $totalPrice = $todayAppointments->sum('price');

        $todayAppointmentsCash = Appointment::where('user_id', $request->user()->id)->where('date', Carbon::today()->toDateString())->where('payment_type_id', 1)->get();

        $totalPriceCash = $todayAppointmentsCash->sum('price');

        $todayAppointmentsCard = Appointment::where('user_id', $request->user()->id)->where('date', Carbon::today()->toDateString())->where('payment_type_id', 2)->get();

        $totalPriceCard = $todayAppointmentsCard->sum('price');

        $appointments = Appointment::where('user_id', $request->user()->id)->get();

        $types = Type::all();

        $rooms = Room::all();

        $applications = Application::all();

        $payment_types = PaymentType::all();

        $office_settings = OfficeSetting::where('office_id', $office->id)->first();

        $start = Carbon::parse($office_settings->opening_hour);
        $end = Carbon::parse($office_settings->closing_hour);

        $hours = [];

        while ($start->lt($end)) {
            $hours[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        $smses = Sms::where('date', Carbon::today()->toDateString())->where('is_sended', 0)->get();


        return view('office.psychologist.index', compact('assistants', 'office_settings', 'hours', 'smses', 'types', 'rooms', 'applications' , 'payment_types', 'todayAppointments', 'appointments', 'totalPrice', 'office', 'totalPriceCard', 'totalPriceCash', 'todayAppointmentsCard', 'todayAppointmentsCash'));
    }
}
