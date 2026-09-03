<?php

namespace App\Models;

use CodeIgniter\Model;

class StockSerialModel extends Model
{
    protected $table = 'stock_serials';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'stock_item_id',
        'serial_number',
        'status',
        'purchase_date',
        'warranty_expired',
        'notes'
    ];

    protected $useTimestamps = false;
}
