<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','start_date','end_date', 'is_active','admin_id'
    ];

    public function admin(){

        return $this->belongsTo(User::class, 'admin_id');

    }

    public function positions(){
        return $this->hasMany(Position::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    // public function votes()
    // {
    //     return $this->hasMany(Vote::class);
    // }
}
