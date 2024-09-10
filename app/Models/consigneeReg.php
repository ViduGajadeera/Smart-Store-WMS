<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consigneeReg extends Model
{
    use HasFactory;

    protected $table = 'consignee';

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'address',
        'tinNumber',
        'contact',
        'BRnumber',
        'password',
    ];
}
