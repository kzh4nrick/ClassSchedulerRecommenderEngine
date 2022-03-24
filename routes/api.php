<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Classroom;
use App\Models\College;
use App\Models\Schedule;
use App\Models\ClassSchedule;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/subjects/create', function () {

//     request()->validate([
//         'Subject_Code' => 'required',
//         'Subject_Name' => 'required',
//         'Subject_Type' => 'required',
//         'Units' => 'required',
//     ]);  //For validation Daa

//     return Subject::create([
//         'Subject_Code' => request('Subject_Code'),
//         'Subject_Name' => request('Subject_Name'),
//         'Subject_Type' => request('Subject_Type'),
//         'Units' => request('Units'),
//     ]);
// });

// Route::put('/subjects/{id}', function (Subject $id) {
//     // $subject = Subject::findOrFail($id); 

//     request()->validate([
//         'Subject_Code' => 'required',
//         'Subject_Name' => 'required',
//         'Subject_Type' => 'required',
//         'Units' => 'required',
//     ]); //For validation Daa

//     $success = $id->update([
//         'Subject_Code' => request('Subject_Code'),
//         'Subject_Name' => request('Subject_Name'),
//         'Subject_Type' => request('Subject_Type'),
//         'Units' => request('Units'),
//     ]);

//     return [
//         'success' => $success
//     ];
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// GET ALL SUBJECTS
Route::get("/subjects/all", function () {
    $subjects = Subject::all();

    if (empty($subjects)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No records of Subjects found."
            ]
        ];
    } 

    return [
        "success" => true,
        "response" => [
            "subjects" => $subjects
        ]
    ];
});

//CREATE RECORD FOR SUBJECTS
Route::post('/subjects/create', function (Request $request) {
    $data = $request->all();

    if(!Subject::where('Subject_Code','=', $data['Subject_Code'])->exists()) {

        $subject = Subject::create([
            "Subject_Code" => $data["Subject_Code"],
            "Subject_Name" => $data["Subject_Name"],
            "Subject_Type" => $data["Subject_Type"],
            "course_id" => $data["course_id"],
            "Units" => $data["Units"]
        ]);

        if (empty($subject->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured."
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "subject" => $subject
                ]
            ];
        }
        
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "The Subject already exists."
            ]
        ];
    }

});

//GET A SINGLE SUBJECT
Route::get("/subjects/{id}", function (Request $request, $id) {
    $subject = Subject::find($id);

    if (empty($subject)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Subject found."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "subject" => $subject
        ]
    ];
});

//DELETE SUBJECT
Route::delete('/subjects/delete/{id}', function (Request $request, $id) {
    $subject = Subject::find($id);

    if (empty($subject)) {
        $success = false;
        $response = ["error" => "Subject could not be deleted."];
    } else {
        $success = $subject->delete();
        $response = ["message" => "Subject deleted!"];
    }

    return ["success" => $success, "response" => $response];
});

//UPDATE RECORD FOR SUBJECT
Route::put('/subjects/update/{id}', function (Request $request, $id) {
    $data = $request->all();

    $subject = Subject::find($id);

    foreach ($data as $key => $value) {
        $subject->{$key} = $value;
    }

    $result = $subject->save();

    return ["success" => $result, "response" => ["subject" => $subject]];
});

// GET ALL COLLEGES
Route::get("/colleges/all", function () {
    $colleges = College::all();

    if (empty($colleges)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No records of Colleges found."
            ]
        ];
    } 

    return [
        "success" => true,
        "response" => [
            "colleges" => $colleges
        ]
    ];
});

// GET ALL COURSES
Route::get("/courses/all", function () {
    $courses = Course::all();

    if (empty($courses)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No records of Courses found."
            ]
        ];
    } 

    return [
        "success" => true,
        "response" => [
            "courses" => $courses
        ]
    ];
});

//CREATE RECORD FOR COURSE
Route::post('/courses/create', function (Request $request) {
    $data = $request->all();

    if(!Course::where('Course_Code','=', $data['Course_Code'])->exists()) {

        $course = Course::create([
            "Course_Code" => $data["Course_Code"],
            "Course_Name" => $data["Course_Name"],
            "college_id" => $data["college_id"]
        ]);

        if (empty($course->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured."
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "course" => $course
                ]
            ];
        }
        
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "The Course already exists."
            ]
        ];
    }

});

//GET A SINGLE COURSE
Route::get("/courses/{id}", function (Request $request, $id) {
    $course = Course::find($id);

    if (empty($course)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Course found."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "course" => $course
        ]
    ];
});

//DELETE COURSE
Route::delete('/courses/delete/{id}', function (Request $request, $id) {
    $course = Course::find($id);

    if (empty($course)) {
        $success = false;
        $response = ["error" => "Course could not be deleted."];
    } else {
        $success = $course->delete();
        $response = ["message" => "Course deleted!"];
    }

    return ["success" => $success, "response" => $response];
});

//UPDATE RECORD FOR COURSE
Route::put('/courses/update/{id}', function (Request $request, $id) {
    $data = $request->all();

    $course = Course::find($id);

    foreach ($data as $key => $value) {
        $course->{$key} = $value;
    }

    $result = $course->save();

    return ["success" => $result, "response" => ["course" => $course]];
});

// GET ALL FACULTIES
Route::get("/faculties/all", function () {
    $faculties = Faculty::all();

    if (empty($faculties)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No records of Faculties found."
            ]
        ];
    } 

    return [
        "success" => true,
        "response" => [
            "faculties" => $faculties
        ]
    ];
});

//CREATE RECORD FOR FACULTY
Route::post('/faculties/create', function (Request $request) {
    $data = $request->all();

    if(!Faculty::where('Faculty_ID','=', $data['Faculty_ID'])->exists()) {

        $faculty = Faculty::create([
            "Faculty_ID" => $data["Faculty_ID"],
            "Faculty_Name" => $data["Faculty_Name"],
            "college_id" => $data["college_id"]
        ]);

        if (empty($faculty->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured."
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "faculty" => $faculty
                ]
            ];
        }
        
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "The Faculty already exists."
            ]
        ];
    }

});

//GET A SINGLE FACULTY
Route::get("/faculties/{id}", function (Request $request, $id) {
    $faculty = Faculty::find($id);

    if (empty($faculty)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Faculty found."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "faculty" => $faculty
        ]
    ];
});

//DELETE FACULTY
Route::delete('/faculties/delete/{id}', function (Request $request, $id) {
    $faculty = Faculty::find($id);

    if (empty($faculty)) {
        $success = false;
        $response = ["error" => "Faculty could not be deleted."];
    } else {
        $success = $faculty->delete();
        $response = ["message" => "Faculty deleted!"];
    }

    return ["success" => $success, "response" => $response];
});

//UPDATE RECORD FOR FACULTY
Route::put('/faculties/update/{id}', function (Request $request, $id) {
    $data = $request->all();

    $faculty = Faculty::find($id);

    foreach ($data as $key => $value) {
        $faculty->{$key} = $value;
    }

    $result = $faculty->save();

    return ["success" => $result, "response" => ["faculty" => $faculty]];
});

// GET ALL CLASSROOMS
Route::get("/classrooms/all", function () {
    $classrooms = Classroom::all();

    if (empty($classrooms)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No records of Classrooms found."
            ]
        ];
    } 

    return [
        "success" => true,
        "response" => [
            "classrooms" => $classrooms
        ]
    ];
});

//CREATE RECORD FOR CLASSROOM
Route::post('/classrooms/create', function (Request $request) {
    $data = $request->all();

        $classroom = Classroom::create([
            "Building_No" => $data["Building_No"],
            "Classroom_No" => $data["Classroom_No"],
            "Classroom_Type" => $data["Classroom_Type"],
            "college_id" => $data["college_id"]
        ]);

        if (empty($classroom->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured."
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "classroom" => $classroom
                ]
            ];
        }

});

//GET A SINGLE CLASSROOM
Route::get("/classrooms/{id}", function (Request $request, $id) {
    $classroom = Classroom::find($id);

    if (empty($classroom)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Classroom found."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "classroom" => $classroom
        ]
    ];
});

//DELETE CLASSROOM
Route::delete('/classrooms/delete/{id}', function (Request $request, $id) {
    $classroom = Classroom::find($id);

    if (empty($classroom)) {
        $success = false;
        $response = ["error" => "Classroom could not be deleted."];
    } else {
        $success = $classroom->delete();
        $response = ["message" => "Classroom deleted!"];
    }

    return ["success" => $success, "response" => $response];
});

//UPDATE RECORD FOR CLASSROOM
Route::put('/classrooms/update/{id}', function (Request $request, $id) {
    $data = $request->all();

    $classroom = Classroom::find($id);

    foreach ($data as $key => $value) {
        $classroom->{$key} = $value;
    }

    $result = $classroom->save();

    return ["success" => $result, "response" => ["classroom" => $classroom]];
});

//GET THE LISTS OF COURSES BY SELECTED COLLEGE
Route::get('/courses/college/{id}', function (Request $request, $id) {
    $courses = Course::where('college_id', $id)->get();

    if (empty($courses)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Courses on this College."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "courses" => $courses
        ]
    ];
});

//CREATE RECORD FOR SCHEDULE
Route::post('/schedules/create', function (Request $request) {
    $data = $request->all();

    if(!Schedule::where('course_id','=', $data['course_id'])->where('yearLevel','=', $data['yearLevel'])->where('block','=', $data['block'])->exists()) {

        $schedule = Schedule::create([
            "course_id" => $data["course_id"],
            "yearLevel" => $data["yearLevel"],
            "block" => $data["block"]
        ]);

        if (empty($schedule->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured."
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "schedule" => $schedule
                ]
            ];
        }
    } else {
            return [
                "success" => false,
                "response" => [
                    "error" => "The Schedule already exists."
                ]
            ];
        }
});

//GET A SCHEDULE
Route::get("/schedules/{id}/{yL}/{b}", function (Request $request, $id, $yL, $b) {
    $schedule = Schedule::where('course_id', $id)->where('yearLevel', $yL)->where('block', $b)->get();

    if (empty($schedule)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Schedule found."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "schedule" => $schedule
        ]
    ];
});

//GET THE LISTS OF MAJOR SUBJECTS BY COURSE
Route::get('/subjects/major/{m}/{id}', function (Request $request, $m, $id) {
    $subjects = Subject::where('Subject_Type', $m)->where('course_id', $id)->get();

    if (empty($subjects)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Major Subjects."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "subjects" => $subjects
        ]
    ];
});

//GET THE LISTS OF NOT MAJOR SUBJECTS BY COURSE
Route::get('/subjects/notmajor/{id}', function (Request $request, $id) {
    $subject = Subject::whereNull('course_id');
    $subjects = Subject::where('course_id', '<>', $id)->union($subject)->get();

    if (empty($subjects)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Major Subjects."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "subjects" => $subjects
        ]
    ];
});

//GET THE LISTS OF MAJOR FACULTIES BY COLLEGE
Route::get('/faculties/major/{id}', function (Request $request, $id) {
    $faculties = Faculty::where('college_id', $id)->get();

    if (empty($faculties)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Major Faculties."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "faculties" => $faculties
        ]
    ];
});

//GET THE LISTS OF MAJOR CLASSROOMS BY COLLEGE
Route::get('/classrooms/major/{id}', function (Request $request, $id) {
    $classrooms = Classroom::where('college_id', $id)->get();

    if (empty($classrooms)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No record for Major Classrooms."
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "classrooms" => $classrooms
        ]
    ];
});

//CREATE RECORD FOR CLASS SCHEDULE
Route::post('/classschedules/create', function (Request $request) {
    $data = $request->all();
    $start = ClassSchedule::where('startTime','>=', $data['startTime']);
    $end = ClassSchedule::where('endTime','<=', $data['endTime'])->union($start)->exists();

    if(!ClassSchedule::where($end)
                ->where('subject_id', '=', $data['subject_id'])
                ->where('faculty_id', '=', $data['faculty_id'])
                ->where('classroom_id', '=', $data['classroom_id'])
                ->exists())
    {
        $classschedule = ClassSchedule::create([
            "schedule_id" => $data["schedule_id"],
            "day" => $data["day"],
            "startTime" => $data["startTime"],
            "endTime" => $data["endTime"],
            "subject_id" => $data["subject_id"],
            "faculty_id" => $data["faculty_id"],
            "classroom_id" => $data["classroom_id"]
        ]);
                if (empty($classschedule->id)) {
                    return [
                        "success" => false,
                        "response" => [
                            "error" => "An unexpected error has occured."
                        ]
                    ];
                } else {
                    return [
                        "success" => true,
                        "response" => [
                            "schedule" => $classschedule
                        ]
                    ];
                }
        
    } else {
            return [
                "success" => false,
                "response" => [
                    "error" => "The Class Schedule already exists."
                ]
            ];
        }
});