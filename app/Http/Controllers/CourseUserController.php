<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseUser;

class CourseUserController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $data = $request->validate([
            'fname'     =>  'required',
            'lname'     =>  'required',
            'phone'     =>  'numeric',
            'email'     =>  'required'
        ]);
        
        $user = new User();
        $user->fname = $data['fname'];
        $user->lname = $data['lname'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];

        $user->save();

        $courseUser = new CourseUser();
        $courseUser->user_id = $user->id;
        $courseUser->course_id = $course->id;
        $courseUser->save();

        flash('ثبت نام اولیه با موفقیت انجام شد.', 'success');
        return redirect('courseusers/show/'.$courseUser->id);
    }
    public function show(CourseUser $courseUser)
    {
        return view('courseusers.show', compact('courseUser'));
    }
}
