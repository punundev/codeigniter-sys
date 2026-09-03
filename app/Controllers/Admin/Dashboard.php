<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $totalItems = $db->table('stock_items')
            ->countAllResults();

        $stockInRow = $db->table('stock_transactions')
            ->selectSum('quantity')
            ->where('transaction_type', 'IN')
            ->get()
            ->getRow();

        $stockIn = $stockInRow->quantity ?? 0;

        $stockOutRow = $db->table('stock_transactions')
            ->selectSum('quantity')
            ->where('transaction_type', 'OUT')
            ->get()
            ->getRow();

        $stockOut = $stockOutRow->quantity ?? 0;

        $balance = $stockIn - $stockOut;

        $data = [
            'totalItems' => $totalItems,
            'stockIn'    => $stockIn,
            'stockOut'   => $stockOut,
            'balance'    => $balance
        ];

        $manufacturerData = $db->table('inventory')
            ->select('manufacturer, COUNT(*) AS total')
            ->where('manufacturer IS NOT NULL')
            ->where('manufacturer !=', '')
            ->groupBy('manufacturer')
            ->orderBy('total', 'DESC')
            ->get()
            ->getResultArray();

        $data['manufacturerData'] = $manufacturerData;

        return view('admin/dashboard', $data);
    }
}
