<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['position', 'city'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create', [
            'positions' => Position::all(),
            'cities' => City::all()
        ]);
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'positions' => Position::all(),
            'cities' => City::all()
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
