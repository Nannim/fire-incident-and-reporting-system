<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

class ReportController extends Controller
{
    public function index()
    {
        return view('livewire.crud-report');
    }

    public function getReport(Request $request)
    {
        $data = Reports::where('description', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
}
