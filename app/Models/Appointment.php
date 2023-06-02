<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($appointment) {
            $appointment->confirmation_token = Str::random(40);
        });
    }

    public function getFormattedTimeAttribute()
    {
        return date("g:i A", strtotime($this->time));
    }

    public function getFormattedStatusAttribute()
    {
        return ucwords($this->status);
    }

    public function getFormattedTypeAttribute()
    {
        return ucwords($this->type);
    }
}
