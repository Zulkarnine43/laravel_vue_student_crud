<?php

namespace App\Http\Controllers\APi\v1;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $student = Student::all(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->country = $request->country;

        // here is the image part okay

        // if ($request->hasFile('image')) {
            
        //     $file =  $request->file('image');
        //     $file->move(public_path(). '/images/students', $file->getClientOriginalName());

        //     $student->image = $file->getClientOriginalName();
        // }

        $student->save();

        return $student;

        // now let's try and see okay 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        // return view('welcome', ['student' => $student]);
        return $student;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $student =  Student::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->country = $request->country;


        // if ($request->image) {
             
        //     if (empty($student->image)) {
        //         $image_path = public_path(). '/images/students/' .$student->image;
        //         unlink($image_path);

        //         // here we check if the studet image is not null unlick the image 
        //         // from the folder else skip and update new image
        //     }
        // }
        // // here is the image part okay

        // if ($request->hasFile('image')) {
            
        //     $file =  $request->file('image');
        //     $file->move(public_path(). '/images/students', $file->getClientOriginalName());

        //     $student->image = $file->getClientOriginalName();
        // }

        $student->save();
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $student = Student::Find($id);

       if ($student->delete()) {
           
        return $student;
       }
    }
}
