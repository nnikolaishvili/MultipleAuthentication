<?php

namespace App\Http\Controllers\API;

use App\Flight;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    use ResponseTrait;

    public function addFlight(Request $request, Flight $flight){
        $data = $request->all();
        $rules = [
            'company' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            return $this->getJsonError($validator->errors()->first());
        }

        $data['buyer_id'] = Auth::id();
        $data['days'] = $flight->diffInDays($data['start_date'], $data['end_date']);

        $flight = Flight::create($data);

        return $this->getJsonSuccess($flight, 'success');
    }

}
