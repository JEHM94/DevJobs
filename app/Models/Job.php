<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

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
            'salary'
        ]);
    }
}
