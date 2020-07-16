<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;
use App\Http\Requests\EmployeeRequest as EmployeeRequest;

class EmployeeController extends Controller
{
    public function index(){

        return view('employees.index');
    }

    public function create(){
        $positions = Position::pluck('name', 'id');

        return view('employees.create',compact('positions'));
    }

    public function store(EmployeeRequest $request){

        $employee = new Employee();
        $employee->name = $request->get('name');
        $employee->email = $request->get('email');
        $employee->contact = $request->get('contact');
        $employee->position_id = $request->get('position_id');
        $employee->save();

        return redirect()->route('employee.index')->with('message', 'Succesfully Saved!');
    }

    public function edit(Employee $employee){
        $positions = Position::pluck('name', 'id');

        return view('employees.edit',compact('positions','employee'));
    }
    
    public function update(EmployeeRequest $request,Employee $employee){

        $employee->name = $request->get('name');
        $employee->email = $request->get('email');
        $employee->contact = $request->get('contact');
        $employee->position_id = $request->get('position_id');
        $employee->save();

        return redirect()->route('employee.index')->with('message', 'Succesfully Updated!');
    }

    public function getEmployees(){
        $employees = Employee::with('position')->get();

        $employees->map(function ($employee) {
            $employee['position_name'] = $employee->position->name;
            $employee['edit_url'] = route('employee.edit', $employee->id);
            return $employee;
        });

        return response()->json($employees);

    }

    public function deleteEmployee(Request $request){

        $data = $request->request->all();
        Employee::whereIn('id',$request->get('ids'))->delete();

        return response()->json("success", 200);

    }
}
