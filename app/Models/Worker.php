<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'workers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'coordinate'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
