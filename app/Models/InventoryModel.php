<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory';

    protected $primaryKey = 'id';


    protected $allowedFields = [

        'device_name',
	'device_name',
        'serial_number',
        'type',
        'manufacturer',
        'model',

        'processor',
        'processor_full_name',

        'ram',
        'storage',
        'monitor',

        'operating_system',
        'license_status',

        'mac_address',

        'assigned_user',
        'owner',

        'internet_location',
        'sections',
        'location',

        'warranty_information',

        'year_of_manufacture',
        'expired_year',
        'expired_date',

        'notes',
        'photo',

        'registered_by',
        'registered_date',

        'checked_by',
        'checked_date',

        'created_at',
        'updated_at'

    ];
}
