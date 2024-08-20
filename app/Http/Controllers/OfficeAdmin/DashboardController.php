<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Appointment;
use App\Models\Office;
use App\Models\OfficeSetting;
use App\Models\PaymentType;
use App\Models\Room;
use App\Models\Sms;
use App\Models\Type;
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

        $totalPrice = $todayAppointments->sum('price');

        $todayAppointmentsCash = Appointment::where('date', Carbon::today()->toDateString())->where('payment_type_id', 1)->get();

        $totalPriceCash = $todayAppointmentsCash->sum('price');

        $todayAppointmentsCard = Appointment::where('date', Carbon::today()->toDateString())->where('payment_type_id', 2)->get();

        $totalPriceCard = $todayAppointmentsCard->sum('price');

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
            $start->addHour();
        }

        $smses = Sms::where('date', Carbon::today()->toDateString())->where('is_sended', 0)->get();

        return view('office.admin.index', compact('office_settings', 'hours', 'smses', 'types', 'rooms', 'applications' , 'payment_types', 'office', 'appointments', 'totalPrice', 'todayAppointments', 'assistants', 'psychologists', 'todayAppointmentsCard', 'todayAppointmentsCash', 'totalPriceCard', 'totalPriceCash'));
    }
}
