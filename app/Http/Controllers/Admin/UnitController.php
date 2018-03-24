<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
        $units = Course::find($course)->units;

        return view('admin.unit.index',compact('units','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course)
    {
        return view('admin.unit.create',compact('course'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($course,Request $request)
    {
        $this->validate($request,[
            'name' => "required|min:2"
        ]);

        $unit = new Unit();
        $unit->course_id = $course;
        $unit->name = $request->name;
        $unit->slug = str_slug($request->name);
        $unit->description = $request->description;
        $unit->save();
        return redirect(route('unit.index',$course))->with('successMsg','Unit Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($course,Unit $unit)
    {
        return view('admin.unit.edit',compact('course','unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update($course,Request $request, Unit $unit)
    {
        $this->validate($request,[
            'name' => "required|min:2"
        ]);

        $unit = Unit::find($unit->id);
        $unit->course_id = $course;
        $unit->name = $request->name;
        $unit->slug = str_slug($request->name);
        $unit->description = $request->description;
        $unit->save();
        return redirect(route('unit.index',$course))->with('successMsg','Unit Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($course,Unit $unit)
    {
        $unit->delete();
        return redirect()->back()->with('successMsg','Unit Successfully Deleted :)');
    }
}
