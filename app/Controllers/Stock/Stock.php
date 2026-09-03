<?php

namespace App\Controllers\Stock;

use App\Controllers\BaseController;
use App\Models\StockItemModel;
use App\Models\StockTransactionModel;
use App\Models\StockSerialModel;

class Stock extends BaseController
{
    protected $stock;
    protected $transaction;
    protected $serial;

    public function __construct()
    {
        $this->stock = new StockItemModel();
        $this->transaction = new StockTransactionModel();
        $this->serial = new StockSerialModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $manufacturer = $this->request->getGet('manufacturer');
        $location = $this->request->getGet('location');

        $builder = $this->stock;

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('stock_code', $keyword)
                ->orLike('item_name', $keyword)
                ->orLike('manufacturer', $keyword)
                ->orLike('model', $keyword)
                ->orLike('part_number', $keyword)
                ->groupEnd();
        }

        if (!empty($category)) {
            $builder->where('category', $category);
        }

        if (!empty($manufacturer)) {
            $builder->where('manufacturer', $manufacturer);
        }

        if (!empty($location)) {
            $builder->where('location', $location);
        }

        $data['stock'] = $builder
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $data['pager'] = $builder->pager;

        $data['search'] = $keyword;
        $data['category'] = $category;
        $data['manufacturer'] = $manufacturer;
        $data['location'] = $location;

        $db = \Config\Database::connect();

        $data['categories'] = $db->table('stock_items')
            ->select('category')
            ->distinct()
            ->where('category IS NOT NULL')
            ->orderBy('category')
            ->get()
            ->getResultArray();

        $data['manufacturers'] = $db->table('stock_items')
            ->select('manufacturer')
            ->distinct()
            ->where('manufacturer IS NOT NULL')
            ->orderBy('manufacturer')
            ->get()
            ->getResultArray();

        $data['locations'] = $db->table('stock_items')
            ->select('location')
            ->distinct()
            ->where('location IS NOT NULL')
            ->orderBy('location')
            ->get()
            ->getResultArray();

        return view('admin/stock/index', $data);
    }

    public function ajaxFilter()
    {
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $manufacturer = $this->request->getGet('manufacturer');
        $location = $this->request->getGet('location');

        $builder = $this->stock;

        if (!empty($search)) {
            $builder->groupStart()
                ->like('stock_code', $search)
                ->orLike('item_name', $search)
                ->orLike('manufacturer', $search)
                ->orLike('model', $search)
                ->orLike('part_number', $search)
                ->groupEnd();
        }

        if (!empty($category)) {
            $builder->where('category', $category);
        }

        if (!empty($manufacturer)) {
            $builder->where('manufacturer', $manufacturer);
        }

        if (!empty($location)) {
            $builder->where('location', $location);
        }

        $stock = $builder
            ->orderBy('id', 'DESC')
            ->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $stock,
            'count' => count($stock)
        ]);
    }

    public function create()
    {
        return view('admin/stock/create');
    }

    public function store()
    {
        $stockCode = 'STK-' . date('YmdHis');

        $data = [
            'stock_code'    => $stockCode,
            'item_name'     => $this->request->getPost('item_name'),
            'category'      => $this->request->getPost('category'),
            'manufacturer'  => $this->request->getPost('manufacturer'),
            'model'         => $this->request->getPost('model'),
            'part_number'   => $this->request->getPost('part_number'),
            'unit'          => $this->request->getPost('unit'),
            'minimum_stock' => $this->request->getPost('minimum_stock'),
            'location'      => $this->request->getPost('location'),
            'shelf'         => $this->request->getPost('shelf'),
            'notes'         => $this->request->getPost('notes'),
            'created_by'    => session()->get('username'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];

        $result = $this->stock->insert($data);

        if ($result) {
            return redirect()
                ->to('/admin/stock')
                ->with('success', 'Stock inserted successfully!');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Stock insert failed!');
    }

    public function edit($id)
    {
        $data['stock'] = $this->stock->find($id);

        return view('admin/stock/edit', $data);
    }

    public function update($id)
    {
        $this->stock->update($id, [
            'stock_code' => $this->request->getPost('stock_code'),
            'item_name' => $this->request->getPost('item_name'),
            'category' => $this->request->getPost('category'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'model' => $this->request->getPost('model'),
            'part_number' => $this->request->getPost('part_number'),
            'unit' => $this->request->getPost('unit'),
            'minimum_stock' => $this->request->getPost('minimum_stock'),
            'location' => $this->request->getPost('location'),
            'shelf' => $this->request->getPost('shelf'),
            'notes' => $this->request->getPost('notes')
        ]);

        return redirect()
            ->to('/admin/stock')
            ->with('success', 'Stock updated successfully');
    }

    public function delete($id)
    {
        $this->stock->delete($id);

        return redirect()
            ->to('/admin/stock')
            ->with('success', 'Stock deleted successfully');
    }

    public function stockIn()
    {
        $data['stockItems'] = $this->stock
            ->orderBy('item_name', 'ASC')
            ->findAll();

        return view('admin/stock/stock_in', $data);
    }

    public function saveStockIn()
    {
        $stockItemId = $this->request->getPost('stock_item_id');
        $quantity    = $this->request->getPost('quantity');

        if (empty($stockItemId)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please select a stock item.');
        }

        if (empty($quantity) || $quantity <= 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Quantity must be greater than 0.');
        }

        $db = \Config\Database::connect();

        $data = [
            'stock_item_id'    => $stockItemId,
            'transaction_type' => 'IN',
            'quantity'         => $quantity,
            'supplier'         => $this->request->getPost('supplier'),
            'reference_no'     => $this->request->getPost('reference_no'),
            'transaction_date' => date('Y-m-d'),
            'notes'            => $this->request->getPost('notes'),
            'created_by'       => session()->get('username')
        ];

        $result = $db->table('stock_transactions')->insert($data);

        if ($result) {
            return redirect()
                ->to('/admin/stock/stock-in')
                ->with('success', 'Stock IN recorded successfully!');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Stock IN failed!');
    }

    public function stockOut()
    {
        $db = \Config\Database::connect();

        $items = $db->table('stock_items')
            ->select('
                stock_items.id,
                stock_items.stock_code,
                stock_items.item_name,
                stock_items.category,
                COUNT(stock_serials.id) AS quantity
            ')
            ->join(
                'stock_serials',
                "stock_serials.stock_item_id = stock_items.id
                 AND stock_serials.status = 'Available'",
                'left'
            )
            ->groupBy([
                'stock_items.id',
                'stock_items.stock_code',
                'stock_items.item_name',
                'stock_items.category'
            ])
            ->orderBy('stock_items.item_name', 'ASC')
            ->get()
            ->getResultArray();

        return view('admin/stock/stock_out', [
            'items' => $items
        ]);
    }

    public function saveStockOut()
    {
        $this->transaction->insert([
            'stock_item_id'    => $this->request->getPost('stock_item_id'),
            'transaction_type' => 'OUT',
            'quantity'         => $this->request->getPost('quantity'),
            'receiver'         => $this->request->getPost('receiver'),
            'reference_no'     => $this->request->getPost('reference_no'),
            'transaction_date' => date('Y-m-d'),
            'notes'            => $this->request->getPost('notes'),
            'created_by'       => session()->get('username')
        ]);

        return redirect()
            ->to('/admin/stock/stock-out')
            ->with('success', 'Stock OUT recorded');
    }

    public function history()
    {
        $db = \Config\Database::connect();

        $data['history'] = $db->table('stock_transactions t')
            ->select('
                t.*,
                s.stock_code,
                s.item_name,
                s.manufacturer,
                s.model
            ')
            ->join('stock_items s', 's.id = t.stock_item_id')
            ->orderBy('t.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/stock/history', $data);
    }

    public function lowStock()
    {
        $db = \Config\Database::connect();

        $data['stock'] = $db->query("
            SELECT
                s.id,
                s.stock_code,
                s.item_name,
                s.category,
                s.manufacturer,
                s.minimum_stock,
                COALESCE(SUM(
                    CASE
                        WHEN t.transaction_type = 'IN'
                        THEN t.quantity
                        ELSE -t.quantity
                    END
                ), 0) AS current_stock
            FROM stock_items s
            LEFT JOIN stock_transactions t
                ON t.stock_item_id = s.id
            GROUP BY
                s.id,
                s.stock_code,
                s.item_name,
                s.category,
                s.manufacturer,
                s.minimum_stock
            HAVING current_stock <= s.minimum_stock
            ORDER BY current_stock ASC
        ")->getResultArray();

        return view('admin/stock/low_stock', $data);
    }

    public function serialNumbers()
    {
        $db = \Config\Database::connect();

        $data['serials'] = $db->table('stock_serials ss')
            ->select('
                ss.*,
                s.stock_code,
                s.item_name,
                s.manufacturer,
                s.model
            ')
            ->join('stock_items s', 's.id = ss.stock_item_id')
            ->orderBy('ss.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/stock/serial_numbers', $data);
    }

    public function reportsAjax()
    {
        $month = $this->request->getGet('month');
        $year  = $this->request->getGet('year');

        return $this->response->setJSON([
            'data' => [],
            'totalItems' => 0,
            'totalIn' => 0,
            'totalOut' => 0,
            'balance' => 0
        ]);
    }

    public function dashboard()
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

        return view('admin/stock/dashboard', $data);
    }

    public function reports()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('stock_items');

        $builder->select('
            stock_items.id,
            stock_items.stock_code,
            stock_items.item_name,
            stock_items.category,
            stock_items.manufacturer,
            stock_items.model,
            stock_items.unit,
            stock_items.minimum_stock,
            COALESCE(SUM(
                CASE
                    WHEN stock_transactions.transaction_type = "IN"
                    THEN stock_transactions.quantity
                    ELSE 0
                END
            ), 0) AS stock_in,
            COALESCE(SUM(
                CASE
                    WHEN stock_transactions.transaction_type = "OUT"
                    THEN stock_transactions.quantity
                    ELSE 0
                END
            ), 0) AS stock_out
        ');

        $builder->join(
            'stock_transactions',
            'stock_transactions.stock_item_id = stock_items.id',
            'left'
        );

        $builder->groupBy('stock_items.id');

        $builder->orderBy('stock_items.id', 'ASC');

        $data['reports'] = $builder->get()->getResultArray();

        return view('admin/stock/reports', $data);
    }
}
