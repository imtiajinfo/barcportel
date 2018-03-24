<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course,$unit)
    {
        $lessons = Unit::find($unit)->lessons;
        return view('admin.lesson.index',compact('course','unit','lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course,$unit)
    {
        return view('admin.lesson.create',compact('course','unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($course,$unit,Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'body' => 'required',
        ]);
        $lesson = new Lesson();
        $lesson->unit_id = $unit;
        $lesson->title = $request->title;
        $lesson->slug = str_slug($request->title);
        $lesson->body = $request->body;
        $lesson->save();
        return redirect(route('lesson.index',['course'=>$course,'unit'=>$unit]))->with('successMsg','Lesson Successfully Added :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($course,$unit,Lesson $lesson)
    {
        $relateds = Unit::find($unit)->lessons->random(5);
        return view('admin.lesson.show',compact('course','unit','lesson','relateds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($course,$unit,Lesson $lesson)
    {
        return view('admin.lesson.edit',compact('course','unit','lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update($course,$unit,Request $request, Lesson $lesson)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'body' => 'required',
        ]);

        $lesson->unit_id = $unit;
        $lesson->title = $request->title;
        $lesson->slug = str_slug($request->title);
        $lesson->body = $request->body;
        $lesson->save();
        return redirect(route('lesson.index',['course'=>$course,'unit'=>$unit]))->with('successMsg','Lesson Successfully Updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($course,$unit,Lesson $lesson)
    {
        $lesson->delete();
        return redirect(back())->with('successMsg','Lesson Successfully Deleted');
    }
}
