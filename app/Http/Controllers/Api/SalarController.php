<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Salary;
use Illuminate\Http\Request;

class SalarController extends Controller
{
    public function pay(Request $request, $id) 
    {
        $request->validate([
            'salar_month' => 'required'
        ]);
        $data = $request->only(['salar_month', 'salar_year', 'salar_date', 'amount', 'employee_id']);

        $month = $request->salar_month;
        $amount = $request->sallery;
        $check = Salary::where('employee_id', $id)->where('salar_month', $month)->first();
        if($check) {
            return response()->json('Salar Alrady paid');
        } else {

            $data['employee_id'] = $id;
            $data['salar_date'] = date('d/m/y');
            $data['salar_month'] = $month;
            $data['salar_year'] = date('Y');
            $data['amount'] = $amount;
            Salary::create($data);
        }
    }

    public function index() {
        $salaries = Salary::select('salar_month')->groupBy('salar_month')->get();

             return response()->json($salaries);
    }

    public function view($id) 
    {
         $month = $id;
         $salar = Salary::join('employees', 'salaries.employee_id', 'employees.id')
                   ->select('employees.name', 'salaries.*')
                   ->where('salaries.salar_month', $month)
                   ->get();

                   return response()->json($salar);
    }
    public function  edit($id) 
    {
        $salar = Salary::join('employees', 'salaries.employee_id', 'employees.id')
                    ->select('employees.name', 'employees.email', 'salaries.*')
                    ->where('salaries.id', $id)
                    ->first();

                    return response()->json($salar);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['employee_id', 'salar_month', 'amount']);

        Salary::where('id', $id)->update($data);
    }
}
