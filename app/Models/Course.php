<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function teachers()
    {
        return $this->belongsToMany(User::class,'lessons', 'user_id');
    }

    public function students(){
        return $this->belongsToMany(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function online_classes()
    {
        return $this->hasMany(OnlineClasse::class);
    }
}
