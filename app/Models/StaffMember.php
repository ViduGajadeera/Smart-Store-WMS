<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;

    protected $table = 'staff_member';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address', 'contact', 'NIC', 'Role', 'available'
    ];
}
