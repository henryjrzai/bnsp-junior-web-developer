<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        // $employee = Employee::select('position')->get();
        // dd($employee);
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        $employee = Employee::all();
        $manager = $employee->where('position', 'Manager')->count();
        $lead = $employee->where('position', 'Lead')->count();
        $staff = $employee->where('position', 'Staff')->count();
        $intern = $employee->where('position', 'Intern')->count();
        return response()->json([
            'position' => [
                'manager' => $manager,
                'lead' => $lead,
                'staff' => $staff,
                'intern' => $intern,
            ],
        ]);
    }
    
   public function getEmployee()
    {
        $employee = Employee::all();
        
        return DataTables::of($employee)->make(true);
    }
}
