<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>'v1'], function(){
    Route::resource('/user', App\Http\Controllers\Users\UserController::class);
    // Route::post('/login', [AuthController::class, 'store']);
    // Route::get('klass', [KlassController::class, 'index']);
    // Route::get('session', [SessionController::class, 'index']);
    // Route::get('session/{session}', [SessionController::class, 'show']);
});


// // Protected routes - Require authentication (sanctum middleware)
// Route::middleware('auth:sanctum')->group(function () {
//     // Klass routes
   
//     Route::resource('klass', KlassController::class)->except('index');
//     Route::get('/klass_subject', [KlassController::class, 'klass_subject']);
//     Route::get('/klass_subject/{id}', [KlassController::class, 'klass_subject_classid']);
//     Route::get('/klass_subject_allocation/{sessionid}', [KlassController::class, 'klass_subject_allocation']);
//     Route::get('/klass_teacher_allocation/{sessionid}', [KlassController::class, 'klass_teacher_allocation']);
//     Route::get('/klass_subject_merge/{sessionid}', [KlassController::class, 'klass_subject_merge']);
//     Route::get('/klass_subject_allocated_teacher/{sessionid}', [KlassController::class, 'klass_subject_allocated_teacher']);
//     Route::get('/all_klass_student/{sessionid}', [KlassController::class, 'all_klass_student']);
//     Route::get('/single_klass_student/{classid}/{sessionid}', [KlassController::class, 'single_klass_student']);
//     // Subject routes
//     Route::resource('subject', SubjectController::class);
//     // Session routes
//     Route::resource('session', SessionController::class)->except(['index','show']);
//     Route::resource('student', StudentController::class);
//     Route::get('session_assessment', [SessionController::class, 'session_assessment']);
//     // Assessment routes
//     Route::resource('assessment', AssessmentController::class);
//     Route::resource('user', UserController::class)->except('store');
//     Route::get('/allteacher',[UserController::class, 'allteacher']);
//     Route::get('/allstudent',[UserController::class, 'allstudent']);
//     Route::resource('subject_allocation', SubjectAllocationController::class);
//     Route::resource('class_teacher_allocation', ClassTeacherAllocationController::class);
//     Route::resource('merge_subject', MergeSubjectController::class);
//     Route::resource('score', ScoreController::class);
//     Route::get('/student_subject_score/{subject_id}/{assessment_id}/{sessionid}', [ScoreController::class, 'student_subject_score']);
//     Route::get('/student_result/{class_id}/{sessionid}', [UserController::class, 'student_result']);
//     Route::resource('affective', AffectiveController::class);
//     Route::resource('psychomotor', PsychomotorController::class);
//     Route::resource('resumption_closing', ResumptionClosingController::class);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
