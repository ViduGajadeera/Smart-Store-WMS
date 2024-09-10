<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadManifest extends Model
{
    use HasFactory;
    protected $table = 'upload_manifests';
    protected $fillable = [
        'name',
        'file',
        'status',
    ];
}

