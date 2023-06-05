<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','address','phone'
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }




}
