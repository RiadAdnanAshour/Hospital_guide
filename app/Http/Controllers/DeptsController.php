<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depts;

class DeptsController extends Controller
{
    public function index()
    {
        $depts = Depts::all();
        return view('Department.index', compact('depts'));
    }

    public function create()
    {
        return view('Department.create');
    }

    public function store(Request $request)
    {
        Depts::create([
            'Dept_Name' => $request->input('Dept_Name'),
        ]);
        return redirect()->route('dept.index');
    }

    public function edit($id)
    {
        $dept = Depts::findOrFail($id);
        return view('Department.edit', compact('dept'));
    }

    public function update(Request $request, $id)
    {
        $dept = Depts::findOrFail($id);

        $dept->Update([
            'Dept_Name' => $request->Dept_Name,

        ]);



        return redirect()->route('dept.index')->with('success', 'Department updated successfully');
    }

    public function destroy(Depts $Dept)
    {

        $Dept= Depts::findOrFail($Dept->id);
        $Dept->delete();
        return redirect()->route('dept.index');
    }
}
