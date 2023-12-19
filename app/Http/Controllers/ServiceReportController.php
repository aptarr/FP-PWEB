<?php

namespace App\Http\Controllers;

use App\Models\ServiceReport;
use App\Http\Requests\StoreServiceReportRequest;
use App\Http\Requests\UpdateServiceReportRequest;
use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->id;
        return view('report', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        $serviceReport = new ServiceReport([
            'report_type' => $request->input('report_type'),
            'description' => $request->input('report_description'),
            'service_id' => $id, // Assuming you pass the service_id as a route parameter
        ]);

        $serviceReport->save();

        $successMessage = "Report successfully send";
        return redirect()->route('dashboard')->with('success', $successMessage);
    }
    /**
     * Display the specified resource.
     */
    public function show(ServiceReport $serviceReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceReport $serviceReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceReportRequest $request, ServiceReport $serviceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceReport $serviceReport)
    {
        //
    }
}
