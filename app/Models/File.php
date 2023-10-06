<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    protected $fillable = [
        'nama',
        'file',
        'id_kategori',
        'uploader',
        'hapus',
    ];

    public function getFileNameAttribute()
    {
        return basename($this->file);
    }
}
