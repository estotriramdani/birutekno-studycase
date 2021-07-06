<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Recap;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Employee $employee)
    {
        $employees = $employee->all();
        return view('employees.index', ['employees' => $employees]);
    }
    public function create()
    {
        return view('employees.add', ['detail' => new Employee()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'salary' => 'required'
        ]);
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->salary = $request->salary;
        $employee->save();
        session()->flash('success', 'Data pegawai berhasil ditambahkan.');
        return back();
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', ['detail' => $employee]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->salary = $request->salary;
        $employee->update();
        session()->flash('success', 'Data pegawai berhasil diubah.');
        return back();
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        session()->flash('success', 'Data pegawai berhasil dihapus');
        return redirect()->to('employees');
    }
}
