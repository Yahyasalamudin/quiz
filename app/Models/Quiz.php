<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['Teacher'];

    public function Teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}
