<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'old_name',
        'file_path',
        'size'
    ];
    public function users(){
        return $this->belongsToMany(File::class, 'users_files', 'fileId', 'userId');
    }
}
