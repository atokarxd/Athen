<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costumer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'costumers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'coordinate'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
