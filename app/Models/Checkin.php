<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use CrudTrait;
    protected $fillable = ['member_id', 'checkin_date'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    use HasFactory;
}