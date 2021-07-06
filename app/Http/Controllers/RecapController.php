<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Recap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecapController extends Controller
{
    public function index(Recap $recap)
    {
        $recaps = $recap::all();
        return view('recaps.index', ['recaps' => $recaps]);
    }

    public function show($id, Recap $recap)
    {
        $detail = $recap::find($id);
        return view('recaps.detail', ['detail' => $detail]);
    }

    public function create()
    {
        $employees = Employee::all();
        return view('recaps.add', [
            'detail' => new Recap(),
            'employees' => $employees
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required|integer',
            'presence' => 'required|integer',
            'overtime' => 'required|integer',
            'allowance_id' => 'required'
        ]);

        $recap = new Recap;
        $recap->employee_id = $request->employee_id;
        $recap->month = $request->month;
        $recap->presence = $request->presence;
        $recap->overtime = $request->overtime;
        $recap->allowance_id = $request->allowance_id;
        $recap->save();
        session()->flash('success', 'Data rekap baru berhasil ditambahkan.');
        return back();
    }

    public function edit($id)
    {
        $employees = Employee::all();
        $recap = Recap::findOrFail($id);
        return view('recaps.edit', [
            'detail' => $recap,
            'employees' => $employees
        ]);
    }

    public function update(Request $request, $id)
    {
        $recap = Recap::find($id);
        $recap->employee_id = $request->employee_id;
        $recap->month = $request->month;
        $recap->presence = $request->presence;
        $recap->overtime = $request->overtime;
        $recap->allowance_id = $request->allowance_id;
        $recap->update();
        session()->flash('success', 'Data rekap berhasil diubah.');
        return back();
    }

    public function destroy($id)
    {
        $recap = Recap::find($id);
        $recap->delete();
        session()->flash('success', 'Data rekap berhasil dihapus');
        return redirect()->to('recaps');
    }
}
