<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manifestData extends Model
{
    use HasFactory;

    protected $table = 'manifest_data';
    protected $fillable = [
       'manifestId', 'BLnumber', 'containerNo', 'Number_of_packages', 'type_of_container', 'package_type', 'gross_mass', 'description', 'CBM', 'vesselName',
        'exporterName','exporterAddress','consigneeName','consigneeAddress','discharging_port','loading_port','status','permission'
    ];
}
