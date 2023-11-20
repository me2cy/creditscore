<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();
        // $approvedApplicatonsList = Application::where(['status' => 'approved']) -> get();

        return view('admin.applications',[
            'applications' => $applications
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            $id = $request -> id;

            $updated = DB::table('applications') -> where(['app_id' => $id]) -> update(['status' => 'confirmed']);

            if($updated){
                return response()->json([
                    'status' => 200,
                    'message' => "Your loan request has been confirmed"
                ], 200);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reject(Request $request)
    {
        try{
            $id = $request -> id;

            $updated = DB::table('applications') -> where(['app_id' => $id]) -> update(['status' => 'rejected']);

            if($updated){
                return response()->json([
                    'status' => 200,
                    'message' => "Your loan application has been rejected"
                ], 200);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 200);
        }
    }
}
