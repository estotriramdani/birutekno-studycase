<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Recap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Employee $employee, Recap $recap)
    {
        $salaries = DB::table('employees')
            ->join('recaps', 'employees.id', '=', 'recaps.employee_id')
            ->where('recaps.employee_id', request('employee_id'))
            ->select(
                'employees.salary', 
                'employees.id', 
                'employees.name', 
                'recaps.month',
                'recaps.overtime',
                'recaps.presence',
                'recaps.allowance_id',
            )
            ->get();
        $salariesData = [];
        foreach ($salaries as $salary) {
            if ($salary->allowance_id == 1) {
                $jenis_tunjangan = 'BPJS TK';
            } else {
                $jenis_tunjangan = 'BPJS TK + Kesehatan';
            }
            array_push($salariesData, [
                    'nama_karyawan' => $salary->name,
                    'id_karyawan' => $salary->id,
                    'gaji_pokok' => 'Rp'.number_format($salary->salary, 2),
                    'bulan_ke' => $salary->month,
                    'kehadiran' => $salary->presence,
                    'lembur' => $salary->overtime,
                    'tunjangan' => $jenis_tunjangan,
                    'uang_lembur' => 'Rp'.number_format(hitungUangLembur($salary->salary, $salary->overtime), 2),
                    'take_home_pay' => 'Rp'.number_format(hitungTakeHomePay($salary->salary, $salary->overtime, $salary->presence, $salary->allowance_id), 2)
                ]
            );
        }
        return [
            'message' => 'OK',
            'data' => $salariesData
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return ['request' => request('employee_id')];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recap $recap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recap $recap)
    {
        //
    }
}
