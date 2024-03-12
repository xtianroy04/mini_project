<?php

namespace App\Models;

use App\Models\Membership;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use CrudTrait;


    protected $fillable = ['first_name', 'last_name', 'email', 'contact_number', 'status'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($member) {
            $latestMember = static::latest()->first();
            $latestId = $latestMember ? $latestMember->id : 0;
            $member->code = now()->format('md') . '-' . str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function latestCheckin()
    {
        return $this->hasOne(Checkin::class)->latest(); // Assuming Checkin model has a created_at column
    }
    
    use HasFactory;
}
