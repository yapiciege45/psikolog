<?php

namespace App\Http\Controllers\Psychologist;

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
use Exception;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $office = Office::find($request->user()->office_id);

        $appointments = Appointment::with(['room', 'type', 'applications', 'user'])->get();

        $types = Type::all();

        $rooms = Room::all();

        $users = User::where('is_psychologist', 1)->get();

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

        $today = Carbon::today()->toDateString();

        $settings = OfficeSetting::where('office_id', $office->id)->first();

        return view('office.psychologist.appointment.index', compact('settings', 'today', 'hours', 'payment_types', 'users', 'office', 'appointments', 'types', 'rooms', 'applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $appointment = new Appointment();

            $appointment->user_id = auth()->user()->getAuthIdentifier();
            $appointment->client_name = $request->client_name;
            $appointment->client_number = $request->client_number;
            $appointment->client_email = $request->client_email;
            $appointment->partners_name = $request->partners_name;
            $appointment->type_id = $request->type_id;
            $appointment->room_id = $request->room_id;
            $appointment->date = $request->date;
            $appointment->hour = $request->hour;
            $appointment->price = $request->price;
            $appointment->payment_type_id = $request->payment_type_id;

            $appointment->save();

            if($request->sms_type_id != '0') {
                $sms = new Sms();

                $sms->number = $request->client_number;

                switch ($request->sms_type_id) {
                    case '1':
                        $sms->date = Carbon::today()->toDateString();
                        
                        break;
                        
                    case '2':
                        $sms->date = Carbon::tomorrow()->toDateString();
                        break;
    
                    case '3':
                        $sms->date = Carbon::parse($request->date)->subDay()->toDateString();
                        break;
    
                    case '4':
                        $sms->date = Carbon::parse($request->date)->subDay(3)->toDateString();
                        break;
    
                    case '5':
                        $sms->date = Carbon::parse($request->date)->subDay(7)->toDateString();
                        break;
    
                    case '6':
                        $sms->date = $request->date;
                        break;
    
                    default:
                        # code...
                        break;
                }

                $sms->save();
            }

            if ($request->repeat_id != '0') {
                $startDate = Carbon::parse($request->date);
                $endDate = $startDate->copy()->addMonths(6);
                $interval = ($request->repeat_id == '1') ? 1 : 2;
            
                while ($startDate->lessThanOrEqualTo($endDate)) {
                    $newAppointment = new Appointment();
            
                    $newAppointment->user_id = $request->user_id;
                    $newAppointment->client_name = $request->client_name;
                    $newAppointment->client_number = $request->client_number;
                    $newAppointment->client_email = $request->client_email;
                    $newAppointment->partners_name = $request->partners_name;
                    $newAppointment->type_id = $request->type_id;
                    $newAppointment->room_id = $request->room_id;
                    $newAppointment->date = $startDate->toDateString();
                    $newAppointment->hour = $request->hour;
                    $newAppointment->price = $request->price;
                    $newAppointment->payment_type_id = $request->payment_type_id;
            
                    $newAppointment->save();
            
                    $startDate->addWeeks($interval);
                }
            }
    
            return to_route('office.psychologist.appointment.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Randevu başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('office.psychologist.appointment.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Randevu oluşturma başarısız.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Office $office)
    {
        try {
            $appointment = Appointment::where('id', $request->id)->first();

            $appointment->client_name = $request->client_name;
            $appointment->client_number = $request->client_number;
            $appointment->client_email = $request->client_email;
            $appointment->partners_name = $request->partners_name;
            $appointment->type_id = $request->type_id;
            $appointment->room_id = $request->room_id;
            $appointment->date = $request->date;
            $appointment->hour = $request->hour;
            $appointment->price = $request->price;
            $appointment->payment_type_id = $request->payment_type_id;

            $appointment->save();


    
            return to_route('office.psychologist.appointment.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Randevu başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('office.psychologist.appointment.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Randevu güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $appointment = Appointment::find($request->id);

            $appointment->delete();
    
            return to_route('office.psychologist.appointment.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Randevu başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('office.psychologist.appointment.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Randevu silinemedi.']);
        }
    }
}
