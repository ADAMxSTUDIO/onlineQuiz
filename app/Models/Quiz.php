<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Record;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'duration_seconds', 'professor_name', 'module_name'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
