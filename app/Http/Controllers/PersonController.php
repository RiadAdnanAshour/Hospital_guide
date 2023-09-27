<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Person;
use App\Models\Depts;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $persons = Person::all();
        $depts = Depts::all();

        return view('home2', compact('cities', 'persons', 'depts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $person = Person::all();
        $cities = City::all();
        $depts = Depts::all();


        return view('person.create_employee', [
            'person' => $person,
            'cities' => $cities,
            'depts' => $depts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxId = Person::max('id'); // الحصول على القيمة القصوى لعمود 'id' في جدول 'person'
        $newId = $maxId + 1; // إضافة واحد للحصول على القيمة الجديدة
        $person = new Person();
        $person->id = $newId; // تعيين القيمة الجديدة لعمود 'id'
        $person->P_Name = $request->input('personName');
        $person->Position = $request->input('Position');
        $person->Jawwal1 = $request->input('mobile');
        $person->dept_id = $request->input('Section');
        $person->city_id = $request->input('city_id');
        $person->Phone1 = $request->input('telephone');
        $person->save();

        return redirect()->route('home2')->with('success', 'تمت إضافة الموظف بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $cities = City::all();
        $depts = Depts::all();

        return view('person.edit_employee', [
            'person' => $person,
            'cities' => $cities,
            'depts' => $depts,
        ]);
    }


    public function update(Request $request, Person $person)
    {
        $person->P_Name = $request->input('personName');
        $person->Position = $request->input('Position');
        $person->Jawwal1 = $request->input('mobile');
        $person->dept_id = $request->input('Section');
        $person->city_id = $request->input('city_id');
        $person->Phone1 = $request->input('telephone');
        $person->save();

        return redirect()->route('home2')->with('success', 'تم تحديث بيانات الموظف بنجاح.');
    }


    public function destroy(Person $person)
    {
        $person= Person::findOrFail($person->id);
        $person->delete();
        return redirect()->route('home2')->with('success', 'تمت حذف الموظف بنجاح.');

    }


    public function search(Request $request)
    {


        $name = $request->input('name');
        $mobile = $request->input('mobile');
        $phone = $request->input('phone');
        $dept_id = $request->input('dept_id');
        $cityId = $request->input('city_id');
        $query = Person ::query();

        if ($name) {
            $query->where('P_Name', 'LIKE', '%' . $name . '%')->orWhereRaw("P_Name  LIKE '%" . $name . "%'");
        }



        if ($mobile) {
            $query->where('Jawwal1', 'LIKE', '%' . $mobile . '%')->orWhereRaw("Jawwal1  LIKE '%" . $mobile . "%'");

        }

        if ($phone) {
            $query->where('Phone1', 'LIKE', '%' . $phone . '%')->orWhereRaw("Phone1  LIKE '%" . $phone . "%'");

        }



        if ($dept_id) {
            $query->orWhere('dept_id', $dept_id);

        }

        if ($cityId) {
            $query->orWhere('city_id', $cityId);
        }



        $cities = City::all();
        $persons = $query->get();
        $depts = Depts::all();
        //  dd($employees);

        return view('home2', compact('persons', 'cities', 'depts'));

    }
}
