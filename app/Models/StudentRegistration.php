<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $table = 'registrations';

    protected $fillable = [
        'user_id',
        'full_name',
        'nik',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'address',
        'village',
        'district',
        'city',
        'province',
        'phone',
        'email',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'parent_income',
        'previous_school',
        'school_address',
        'school_npsn',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
