<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceReport;
use App\Models\Service;

class AdminController extends Controller
{
    public function index()
    {
//        $service = Service::find($id);
        $reports = ServiceReport::join('services', 'services.id', '=', 'service_reports.service_id')
            ->select(
                'service_reports.*',
                'services.id as service_id',
                'services.user_id as user_id',
            )
            ->get();

//        dd($id);
        return view('admin', compact('reports'));
    }
}
