<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'costumer_id',
        'worker_id',
        'description',
        'type',
        'status',
        'coordinate'
    ];

    public function costumer() 
    {
        return $this->hasMany(Costumer::class);
    }

    public function worker() 
    {
        return $this->hasMany(Worker::class);
    }

}
