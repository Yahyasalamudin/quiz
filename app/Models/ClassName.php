<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function SkillCompetency()
    {
        return $this->belongsTo(SkillCompetency::class);
    }
}
