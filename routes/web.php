<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
use App\Models\CourseSchedule;
use App\Models\ExamSchedule;
use App\Models\Gallery;
use App\Models\EnrollmentRegistration;
use App\Models\ExamRegistration;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $desktopSlider = Slider::with('items')->where('slug', 'home-desktop')->first();
    $mobileSlider = Slider::with('items')->where('slug', 'home-mobile')->first();
    $featuredPost = Post::where('is_featured', true)->first();
    return view('home', compact('desktopSlider', 'mobileSlider', 'featuredPost'));
})->name('home');

Route::get('/lich-hoc', function () {
    $coursesSang = CourseSchedule::where('session_type', 'Sáng')->orderBy('order')->get();
    $coursesToi = CourseSchedule::where('session_type', 'Tối')->orderBy('order')->get();
    $coursesLuyenThi = CourseSchedule::where('session_type', 'Luyện thi')->orderBy('order')->get();
    $galleries = Gallery::with('images')->where('is_active', true)->orderBy('display_order')->get();
    return view('lichhoc', compact('coursesSang', 'coursesToi', 'coursesLuyenThi', 'galleries'));
})->name('lich-hoc');

Route::get('/lich-thi', function () {
    $examSchedules = ExamSchedule::orderBy('display_order')->get();
    $galleries = Gallery::with('images')->where('is_active', true)->orderBy('display_order')->get();
    return view('lichthi', compact('examSchedules', 'galleries'));
})->name('lich-thi');

Route::group(['prefix' => 'gioi-thieu'], function () {
    Route::get('/ngoi-nha-duc', function () {
        $post = Post::where('slug', 'ngoi-nha-duc')->first();
        return view('gioithieu.ngoinhaduc', compact('post'));
    })->name('gioi-thieu.ngoi-nha-duc');
});

Route::group(['prefix' => 'thu-vien'], function () {
    Route::get('/anh', function () {
        $galleries = Gallery::with('images')->where('is_active', true)->orderBy('display_order')->get();
        return view('thuvien.anh', compact('galleries'));
    })->name('thu-vien.anh');
});

Route::group(['prefix' => 'dang-ky'], function () {
    Route::get('/dang-ky-nhap-hoc', function () {
        return view('dangky.nhaphoc');
    })->name('dang-ky.nhap-hoc');

    Route::post('/dang-ky-nhap-hoc', function (Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'course_name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);
        EnrollmentRegistration::create($validated);
        return back()->with('success', 'Đăng ký nhập học thành công! Chúng tôi sẽ liên hệ lại với bạn sớm nhất.');
    })->name('dang-ky.nhap-hoc.store');

    Route::get('/dang-ky-du-thi', function () {
        return view('dangky.duthi');
    })->name('dang-ky.du-thi');

    Route::post('/dang-ky-du-thi', function (Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'exam_level' => 'required|string|max:255',
            'exam_month' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);
        ExamRegistration::create($validated);
        return back()->with('success', 'Đăng ký dự thi thành công! Chúng tôi sẽ liên hệ lại với bạn sớm nhất.');
    })->name('dang-ky.du-thi.store');
});

Route::get('/lien-he', function () {
    return view('lienhe');
})->name('lien-he');

/*
|--------------------------------------------------------------------------
| Admin Management Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/enrollments', [AdminController::class, 'enrollments'])->name('admin.enrollments');
    Route::delete('/enrollments/{id}', [AdminController::class, 'destroyEnrollment'])->name('admin.enrollments.destroy');

    Route::get('/exam-registrations', [AdminController::class, 'examRegistrations'])->name('admin.exam_regs');
    Route::delete('/exam-registrations/{id}', [AdminController::class, 'destroyExamReg'])->name('admin.exam_regs.destroy');

    Route::get('/schedules', [AdminController::class, 'schedules'])->name('admin.schedules');
    Route::post('/courses', [AdminController::class, 'storeCourseSchedule'])->name('admin.courses.store');
    Route::put('/courses/{id}', [AdminController::class, 'updateCourseSchedule'])->name('admin.courses.update');
    Route::delete('/courses/{id}', [AdminController::class, 'destroyCourseSchedule'])->name('admin.courses.destroy');
    Route::post('/exams', [AdminController::class, 'storeExamSchedule'])->name('admin.exams.store');
    Route::put('/exams/{id}', [AdminController::class, 'updateExamSchedule'])->name('admin.exams.update');
    Route::delete('/exams/{id}', [AdminController::class, 'destroyExamSchedule'])->name('admin.exams.destroy');

    Route::get('/galleries', [AdminController::class, 'galleries'])->name('admin.galleries');
    Route::post('/galleries', [AdminController::class, 'storeGallery'])->name('admin.galleries.store');
    Route::put('/galleries/{id}', [AdminController::class, 'updateGallery'])->name('admin.galleries.update');
    Route::delete('/galleries/{id}', [AdminController::class, 'destroyGallery'])->name('admin.galleries.destroy');
    Route::post('/galleries/{gallery_id}/images', [AdminController::class, 'storeGalleryImage'])->name('admin.gallery_images.store');
    Route::put('/gallery-images/{id}', [AdminController::class, 'updateGalleryImage'])->name('admin.gallery_images.update');
    Route::delete('/gallery-images/{id}', [AdminController::class, 'destroyGalleryImage'])->name('admin.gallery_images.destroy');
    
    Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');
    
    Route::get('/menus', [AdminController::class, 'menus'])->name('admin.menus');
    Route::post('/menus/{menu_id}/items', [AdminController::class, 'storeMenuItem'])->name('admin.menu_items.store');
    Route::put('/menu-items/{id}', [AdminController::class, 'updateMenuItem'])->name('admin.menu_items.update');
    Route::delete('/menu-items/{id}', [AdminController::class, 'destroyMenuItem'])->name('admin.menu_items.destroy');
    
    Route::get('/sliders', [AdminController::class, 'sliders'])->name('admin.sliders');
    Route::post('/sliders/{slider_id}/items', [AdminController::class, 'storeSliderItem'])->name('admin.slider_items.store');
    Route::put('/slider-items/{id}', [AdminController::class, 'updateSliderItem'])->name('admin.slider_items.update');
    Route::delete('/slider-items/{id}', [AdminController::class, 'destroySliderItem'])->name('admin.slider_items.destroy');
    
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
});
