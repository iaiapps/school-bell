<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
