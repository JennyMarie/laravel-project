<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Position;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','email','contact','position_id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
