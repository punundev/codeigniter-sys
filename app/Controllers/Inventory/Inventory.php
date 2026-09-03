<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;
use App\Models\InventoryModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Inventory extends BaseController
{
    protected $inventory;

    public function __construct()
    {
        $this->inventory = new InventoryModel();
    }

    public function index()
    {
        $builder = $this->inventory;

        $keyword = $this->request->getGet('search');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('device_name', $keyword)
                ->orLike('serial_number', $keyword)
                ->orLike('manufacturer', $keyword)
                ->orLike('assigned_user', $keyword)
                ->groupEnd();
        }

        $ram          = $this->request->getGet('ram');
        $processor    = $this->request->getGet('processor');
        $windows      = $this->request->getGet('windows');
        $section      = $this->request->getGet('section');
        $type         = $this->request->getGet('type');
        $manufacturer = $this->request->getGet('manufacturer');

        if (!empty($ram)) {
            $builder->where('ram', $ram);
        }

        if (!empty($processor)) {
            $builder->where('processor', $processor);
        }

        if (!empty($windows)) {
            $builder->where('operating_system', $windows);
        }

        if (!empty($section)) {
            $builder->where('sections', $section);
        }

        if (!empty($type)) {
            $builder->where('type', $type);
        }

        if (!empty($manufacturer)) {
            $builder->where('manufacturer', $manufacturer);
        }

        $db = \Config\Database::connect();

        $data['rams'] = $db->table('inventory')
            ->select('ram')
            ->distinct()
            ->orderBy('ram')
            ->get()
            ->getResultArray();

        $data['processors'] = $db->table('inventory')
            ->select('processor')
            ->distinct()
            ->orderBy('processor')
            ->get()
            ->getResultArray();

        $data['windowsList'] = $db->table('inventory')
            ->select('operating_system')
            ->distinct()
            ->orderBy('operating_system')
            ->get()
            ->getResultArray();

        $data['sections'] = $db->table('inventory')
            ->select('sections')
            ->distinct()
            ->orderBy('sections')
            ->get()
            ->getResultArray();

        $data['types'] = $db->table('inventory')
            ->select('type')
            ->distinct()
            ->orderBy('type')
            ->get()
            ->getResultArray();

        $data['manufacturers'] = $db->table('inventory')
            ->select('manufacturer')
            ->distinct()
            ->orderBy('manufacturer')
            ->get()
            ->getResultArray();

        $data['inventory'] = $builder->orderBy('id', 'ASC')->paginate(10);
        $data['pager'] = $builder->pager;

        $data['search'] = $keyword;
        $data['ram'] = $ram;
        $data['processor'] = $processor;
        $data['windows'] = $windows;
        $data['section'] = $section;
        $data['type'] = $type;
        $data['manufacturer'] = $manufacturer;

        return view('admin/inventory/index', $data);
    }

    public function ajaxFilter()
    {
        $ram          = $this->request->getGet('ram');
        $processor    = $this->request->getGet('processor');
        $windows      = $this->request->getGet('windows');
        $section      = $this->request->getGet('section');
        $type         = $this->request->getGet('type');
        $manufacturer = $this->request->getGet('manufacturer');
        $search       = $this->request->getGet('search');

        $builder = $this->inventory;

        if (!empty($search)) {
            $builder->groupStart()
                ->like('device_name', $search)
                ->orLike('serial_number', $search)
                ->orLike('manufacturer', $search)
                ->orLike('assigned_user', $search)
                ->groupEnd();
        }

        if (!empty($ram)) {
            $builder->where('ram', $ram);
        }

        if (!empty($processor)) {
            $builder->where('processor', $processor);
        }

        if (!empty($windows)) {
            $builder->where('operating_system', $windows);
        }

        if (!empty($section)) {
            $builder->where('sections', $section);
        }

        if (!empty($type)) {
            $builder->where('type', $type);
        }

        if (!empty($manufacturer)) {
            $builder->where('manufacturer', $manufacturer);
        }

        $inventory = $builder
            ->orderBy('id', 'ASC')
            ->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $inventory,
            'count'  => count($inventory)
        ]);
    }

    public function create()
    {
        return view('admin/inventory/create');
    }

    public function store()
    {
        $this->inventory->save($this->request->getPost());

        return redirect()->to('/admin/inventory')
            ->with('success', 'Inventory Added');
    }

    public function edit($id)
    {
        $data['inventory'] = $this->inventory->find($id);

        return view('admin/inventory/edit', $data);
    }

    public function update($id)
    {
        $this->inventory->update($id, $this->request->getPost());

        return redirect()->to('/admin/inventory')
            ->with('success', 'Inventory Updated');
    }

    public function delete($id)
    {
        $this->inventory->delete($id);

        return redirect()->to('/admin/inventory')
            ->with('success', 'Inventory Deleted');
    }

    public function view($id)
    {
        $item = $this->inventory->find($id);

        if (!$item) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'error' => 'Inventory not found'
                ]);
        }

        return $this->response->setJSON($item);
    }

    public function exportExcel()
    {
        $inventory = $this->inventory->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Device Name');
        $sheet->setCellValue('B1', 'Serial Number');
        $sheet->setCellValue('C1', 'Type');
        $sheet->setCellValue('D1', 'Manufacturer');
        $sheet->setCellValue('E1', 'Model');
        $sheet->setCellValue('F1', 'Processor');
        $sheet->setCellValue('G1', 'Processor Full Name');
        $sheet->setCellValue('H1', 'RAM');
        $sheet->setCellValue('I1', 'Storage');
        $sheet->setCellValue('J1', 'Monitor');
        $sheet->setCellValue('K1', 'Operating System');
        $sheet->setCellValue('L1', 'License Status');
        $sheet->setCellValue('M1', 'MAC Address');
        $sheet->setCellValue('N1', 'Assigned User');
        $sheet->setCellValue('O1', 'Owner');
        $sheet->setCellValue('P1', 'Internet Location');
        $sheet->setCellValue('Q1', 'Sections');
        $sheet->setCellValue('R1', 'Location');
        $sheet->setCellValue('S1', 'Warranty');
        $sheet->setCellValue('T1', 'Manufacture Year');
        $sheet->setCellValue('U1', 'Expired Year');
        $sheet->setCellValue('V1', 'Expired Date');
        $sheet->setCellValue('W1', 'Notes');
        $sheet->setCellValue('X1', 'Photo');
        $sheet->setCellValue('Y1', 'Registered By');
        $sheet->setCellValue('Z1', 'Registered Date');
        $sheet->setCellValue('AA1', 'Checked By');
        $sheet->setCellValue('AB1', 'Checked Date');
        $sheet->setCellValue('AC1', 'Created At');
        $sheet->setCellValue('AD1', 'Updated At');

        $row = 2;

        foreach ($inventory as $data) {
            $sheet->setCellValue('A'.$row, $data['device_name']);
            $sheet->setCellValue('B'.$row, $data['serial_number']);
            $sheet->setCellValue('C'.$row, $data['type']);
            $sheet->setCellValue('D'.$row, $data['manufacturer']);
            $sheet->setCellValue('E'.$row, $data['model']);
            $sheet->setCellValue('F'.$row, $data['processor']);
            $sheet->setCellValue('G'.$row, $data['processor_full_name']);
            $sheet->setCellValue('H'.$row, $data['ram']);
            $sheet->setCellValue('I'.$row, $data['storage']);
            $sheet->setCellValue('J'.$row, $data['monitor']);
            $sheet->setCellValue('K'.$row, $data['operating_system']);
            $sheet->setCellValue('L'.$row, $data['license_status']);
            $sheet->setCellValue('M'.$row, $data['mac_address']);
            $sheet->setCellValue('N'.$row, $data['assigned_user']);
            $sheet->setCellValue('O'.$row, $data['owner']);
            $sheet->setCellValue('P'.$row, $data['internet_location']);
            $sheet->setCellValue('Q'.$row, $data['sections']);
            $sheet->setCellValue('R'.$row, $data['location']);
            $sheet->setCellValue('S'.$row, $data['warranty_information']);
            $sheet->setCellValue('T'.$row, $data['year_of_manufacture']);
            $sheet->setCellValue('U'.$row, $data['expired_year']);
            $sheet->setCellValue('V'.$row, $data['expired_date']);
            $sheet->setCellValue('W'.$row, $data['notes']);
            $sheet->setCellValue('X'.$row, $data['photo']);
            $sheet->setCellValue('Y'.$row, $data['registered_by']);
            $sheet->setCellValue('Z'.$row, $data['registered_date']);
            $sheet->setCellValue('AA'.$row, $data['checked_by']);
            $sheet->setCellValue('AB'.$row, $data['checked_date']);
            $sheet->setCellValue('AC'.$row, $data['created_at']);
            $sheet->setCellValue('AD'.$row, $data['updated_at']);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $filename = 'Inventory_' . date('Ymd_His') . '.xlsx';
        if (ob_get_length()) {
            ob_end_clean();
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
