<?php

//route
Route::get('/courses/share/{hash}', 'CoursesController@shareView')->name('courses.share_view');

//controller
public function shareView($hash)
{
    $course = Courses::where('hash', '=', $hash)->first() ?? abort(404);
    return view('course', [
        'name' => $course->name,
        'description' => $course->description,
        'hash' => $course->hash,
        'code_name' => $course->code_name
    ]);
}