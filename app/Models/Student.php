<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'nota',
    ];

    public function course()
    {
        return $this->belongsTo(Role::class, 'course_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
