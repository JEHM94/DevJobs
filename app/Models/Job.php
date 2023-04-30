<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    protected $casts = ['expiration_date' => 'date'];

    protected $fillable = [
        'name',
        'salary_id',
        'category_id',
        'company',
        'expiration_date',
        'description',
        'image',
        'user_id'
    ];

    public function salary()
    {
        return $this->belongsTo(Salary::class)->select([
            'id',
            'salary'
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select([
            'id',
            'category'
        ]);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
