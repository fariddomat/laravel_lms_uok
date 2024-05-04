<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Student
    public function studentCourses()
    {
        return $this->belongsToMany(Course::class);
    }

       /**
     * Check if a course belongs to this user as a student.
     *
     * @param int $courseId
     * @return bool
     */
    public function hasCourse($courseId)
    {
        return $this->studentCourses()->where('course_id', $courseId)->exists();
    }

    // teacher
    public function courses()
    {
        return $this->belongsToMany(Course::class,'lessons');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
