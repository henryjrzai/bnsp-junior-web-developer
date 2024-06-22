<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    function createEmployee()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required',
            'phone' => 'required|max:13',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if(!$validated){
            return redirect('/admin/employee/create')->with('error', 'Gagal menambahkan karyawan');
        } else {
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->position = $request->position;
            $employee->phone = $request->phone;
            $employee->address = $request->address;

            // Store the image
            $imageUrl =  time(). '-'. $request->name.'.'.$request->image->extension();
            $request->image->move(public_path('assets/employee'), $imageUrl);
            $employee->image = $imageUrl;

            $employee->save();
            return redirect('/admin');
        }
    }

    public function showEmployee($id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.show', compact('employee'));
    }
}
