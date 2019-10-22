<?php

namespace App;

use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use ResponseTrait;
    protected $guarded = [];

    public function buyer(){
        return $this->belongsTo(User::class);
    }

    public function diffInDays($startDate, $endDate){
        $firstDay = Carbon::parse($startDate);
        $lastDay = Carbon::parse($endDate);
        $days = $firstDay->diffInDays($lastDay);
        if($days > 90){
            return $this->getJsonError('The limit is more than tourist\'s limit');
        }

        return $days;
    }
}
