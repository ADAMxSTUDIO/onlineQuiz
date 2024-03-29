<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\User;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'user_id', 'score', 'completion_time'];
    protected $primaryKey = ['user_id', 'quiz_id'];
    public $incrementing = false; // Here were the problem :(

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

