<?php

namespace App\Models;

use CodeIgniter\Model;

class StockItemModel extends Model
{
    protected $table = 'stock_items';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'stock_code',
        'item_name',
        'category',
        'manufacturer',
        'model',
        'part_number',
        'unit',
        'minimum_stock',
        'location',
        'shelf',
        'notes',
        'created_by'
    ];

    protected $useTimestamps = true;
}
