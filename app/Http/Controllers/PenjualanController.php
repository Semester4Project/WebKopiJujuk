<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;


class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Laporan::query();

        if ($startDate && $endDate) {
            $query->whereBetween('sale_date', [$startDate, $endDate]);
        }

        $sales = $query->get();

        return view('sales_report', compact('sales', 'startDate', 'endDate'));
    }
}

