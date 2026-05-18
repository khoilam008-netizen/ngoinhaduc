<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnrollmentRegistration;
use App\Models\ExamRegistration;
use App\Models\CourseSchedule;
use App\Models\ExamSchedule;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\SliderItem;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'enrollments' => EnrollmentRegistration::count(),
            'exam_registrations' => ExamRegistration::count(),
            'courses' => CourseSchedule::count(),
            'galleries' => Gallery::count(),
            'posts' => Post::count(),
        ];

        $recentEnrollments = EnrollmentRegistration::latest()->take(5)->get();
        $recentExamRegs = ExamRegistration::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentEnrollments', 'recentExamRegs'));
    }

    // --- ENROLLMENTS ---
    public function enrollments()
    {
        $enrollments = EnrollmentRegistration::latest()->paginate(15);
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function destroyEnrollment($id)
    {
        EnrollmentRegistration::findOrFail($id)->delete();
        return back()->with('success', 'Đã xóa đơn đăng ký học thành công.');
    }

    // --- EXAM REGISTRATIONS ---
    public function examRegistrations()
    {
        $registrations = ExamRegistration::latest()->paginate(15);
        return view('admin.exam_regs.index', compact('registrations'));
    }

    public function destroyExamReg($id)
    {
        ExamRegistration::findOrFail($id)->delete();
        return back()->with('success', 'Đã xóa đơn đăng ký thi thành công.');
    }

    // --- COURSE & EXAM SCHEDULES ---
    public function schedules()
    {
        $courseSchedules = CourseSchedule::orderBy('order')->get();
        $examSchedules = ExamSchedule::orderBy('display_order')->get();
        return view('admin.schedules.index', compact('courseSchedules', 'examSchedules'));
    }

    public function storeCourseSchedule(Request $request)
    {
        $validated = $request->validate([
            'session_type' => 'required|string',
            'level' => 'required|string',
            'schedule_time' => 'required|string',
            'duration' => 'required|string',
            'order' => 'required|integer',
        ]);
        CourseSchedule::create($validated);
        return back()->with('success', 'Thêm khóa học vào lịch thành công.');
    }

    public function updateCourseSchedule(Request $request, $id)
    {
        $course = CourseSchedule::findOrFail($id);
        $validated = $request->validate([
            'session_type' => 'required|string',
            'level' => 'required|string',
            'schedule_time' => 'required|string',
            'duration' => 'required|string',
            'order' => 'required|integer',
        ]);
        $course->update($validated);
        return back()->with('success', 'Cập nhật khóa học thành công.');
    }

    public function destroyCourseSchedule($id)
    {
        CourseSchedule::findOrFail($id)->delete();
        return back()->with('success', 'Xóa khóa học thành công.');
    }

    public function storeExamSchedule(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required|string',
            'registration_date_info' => 'required|string',
            'exam_date_info' => 'required|string',
            'display_order' => 'required|integer',
        ]);
        ExamSchedule::create($validated);
        return back()->with('success', 'Thêm lịch thi thành công.');
    }

    public function updateExamSchedule(Request $request, $id)
    {
        $exam = ExamSchedule::findOrFail($id);
        $validated = $request->validate([
            'month' => 'required|string',
            'registration_date_info' => 'required|string',
            'exam_date_info' => 'required|string',
            'display_order' => 'required|integer',
        ]);
        $exam->update($validated);
        return back()->with('success', 'Cập nhật lịch thi thành công.');
    }

    public function destroyExamSchedule($id)
    {
        ExamSchedule::findOrFail($id)->delete();
        return back()->with('success', 'Xóa lịch thi thành công.');
    }

    // --- GALLERIES ---
    public function galleries()
    {
        $galleries = Gallery::with('images')->orderBy('display_order')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function storeGallery(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:galleries,slug',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
            'cover_image_file' => 'nullable|image|max:10240',
            'display_order' => 'required|integer',
        ]);
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('galleries', 'public');
            $validated['cover_image'] = asset('storage/' . $path);
        }
        unset($validated['cover_image_file']);
        $validated['is_active'] = $request->has('is_active');
        Gallery::create($validated);
        return back()->with('success', 'Tạo album ảnh mới thành công.');
    }

    public function updateGallery(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:galleries,slug,' . $id,
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
            'cover_image_file' => 'nullable|image|max:10240',
            'display_order' => 'required|integer',
        ]);
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('galleries', 'public');
            $validated['cover_image'] = asset('storage/' . $path);
        }
        unset($validated['cover_image_file']);
        $validated['is_active'] = $request->has('is_active');
        $gallery->update($validated);
        return back()->with('success', 'Cập nhật album ảnh thành công.');
    }

    public function destroyGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->images()->delete();
        $gallery->delete();
        return back()->with('success', 'Đã xóa album và các hình ảnh trong album.');
    }

    public function storeGalleryImage(Request $request, $gallery_id)
    {
        $validated = $request->validate([
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'caption' => 'nullable|string',
            'display_order' => 'required|integer',
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('galleries', 'public');
            $validated['image_path'] = asset('storage/' . $path);
        } elseif (empty($validated['image_path'])) {
            return back()->withErrors(['Vui lòng chọn file ảnh tải lên hoặc điền đường dẫn ảnh.'])->with('open_gallery_id', $gallery_id);
        }
        unset($validated['image_file']);
        $validated['gallery_id'] = $gallery_id;
        GalleryImage::create($validated);
        return back()->with('success', 'Thêm hình ảnh vào album thành công.')->with('open_gallery_id', $gallery_id);
    }

    public function updateGalleryImage(Request $request, $id)
    {
        $image = GalleryImage::findOrFail($id);
        $validated = $request->validate([
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'caption' => 'nullable|string',
            'display_order' => 'required|integer',
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('galleries', 'public');
            $validated['image_path'] = asset('storage/' . $path);
        }
        unset($validated['image_file']);
        $image->update($validated);
        return back()->with('success', 'Cập nhật thông tin hình ảnh thành công.')->with('open_gallery_id', $image->gallery_id);
    }

    public function destroyGalleryImage($image_id)
    {
        $image = GalleryImage::findOrFail($image_id);
        $gallery_id = $image->gallery_id;
        $image->delete();
        return back()->with('success', 'Xóa hình ảnh thành công.')->with('open_gallery_id', $gallery_id);
    }

    // --- POSTS ---
    public function posts()
    {
        $posts = Post::with('category')->whereHas('category', function($q) {
            $q->where('slug', '!=', 'gioi-thieu');
        })->latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function createPost()
    {
        $categories = Category::where('slug', '!=', 'gioi-thieu')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function storePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail_file' => 'nullable|image|max:10240',
            'thumbnail' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('posts', 'public');
            $validated['thumbnail'] = asset('storage/' . $path);
        }
        unset($validated['thumbnail_file']);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');
        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        Post::create($validated);
        return redirect()->route('admin.posts')->with('success', 'Thêm bài viết mới thành công.');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::where('slug', '!=', 'gioi-thieu')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail_file' => 'nullable|image|max:10240',
            'thumbnail' => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('posts', 'public');
            $validated['thumbnail'] = asset('storage/' . $path);
        }
        unset($validated['thumbnail_file']);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');
        if ($validated['is_published'] && !$post->is_published) {
            $validated['published_at'] = now();
        }

        $post->update($validated);
        return redirect()->route('admin.posts')->with('success', 'Cập nhật bài viết thành công.');
    }

    public function destroyPost($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('admin.posts')->with('success', 'Xóa bài viết thành công.');
    }

    // --- CATEGORIES (DANH MỤC BÀI VIẾT) ---
    public function categories()
    {
        $categories = Category::where('slug', '!=', 'gioi-thieu')->withCount('posts')->latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        Category::create($validated);
        return redirect()->route('admin.categories')->with('success', 'Thêm danh mục thành công.');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('slug', '!=', 'gioi-thieu')->withCount('posts')->latest()->get();
        return view('admin.categories.index', compact('categories', 'category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);
        return redirect()->route('admin.categories')->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        if ($category->slug === 'gioi-thieu') {
            return back()->with('error', 'Không thể xóa danh mục hệ thống Giới thiệu.');
        }
        if ($category->posts()->count() > 0) {
            return back()->with('error', 'Không thể xóa danh mục đang có bài viết. Vui lòng chuyển hoặc xóa bài viết trước.');
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Xóa danh mục thành công.');
    }

    // --- PAGES (GIỚI THIỆU - NỘI DUNG CỐ ĐỊNH) ---
    public function pages()
    {
        $cat = Category::firstOrCreate(['slug' => 'gioi-thieu'], ['name' => 'Giới thiệu', 'description' => 'Các bài viết giới thiệu về trung tâm']);
        $pages = Post::where('category_id', $cat->id)->orderBy('id')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function editPage($id)
    {
        $page = Post::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function updatePage(Request $request, $id)
    {
        $page = Post::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail_file' => 'nullable|image|max:10240',
            'thumbnail' => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('posts', 'public');
            $validated['thumbnail'] = asset('storage/' . $path);
        }
        unset($validated['thumbnail_file']);

        $validated['is_published'] = $request->has('is_published');
        if ($validated['is_published'] && !$page->is_published) {
            $validated['published_at'] = now();
        }

        $page->update($validated);
        return redirect()->route('admin.pages')->with('success', 'Cập nhật nội dung trang cố định thành công.');
    }

    // --- MENUS & MENU ITEMS ---
    public function menus(Request $request)
    {
        $menus = Menu::all();
        $currentMenuId = $request->get('menu_id', $menus->first()->id ?? null);
        $currentMenu = $currentMenuId ? Menu::with(['items.children'])->findOrFail($currentMenuId) : null;
        $parentCandidates = $currentMenu ? MenuItem::where('menu_id', $currentMenu->id)->whereNull('parent_id')->orderBy('order')->get() : collect();

        return view('admin.menus.index', compact('menus', 'currentMenu', 'parentCandidates'));
    }

    public function storeMenuItem(Request $request, $menu_id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'required|integer',
        ]);
        $validated['menu_id'] = $menu_id;
        $validated['is_active'] = $request->has('is_active');
        MenuItem::create($validated);
        return back()->with('success', 'Thêm mục menu mới thành công.');
    }

    public function updateMenuItem(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'required|integer',
        ]);
        $validated['is_active'] = $request->has('is_active');
        $menuItem->update($validated);
        return back()->with('success', 'Cập nhật mục menu thành công.');
    }

    public function destroyMenuItem($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();
        return back()->with('success', 'Xóa mục menu thành công.');
    }

    // --- SLIDERS ---
    public function sliders(Request $request)
    {
        $sliders = Slider::with('items')->get();
        $currentSliderId = $request->get('slider_id', $sliders->first()->id ?? null);
        $currentSlider = $currentSliderId ? Slider::with('items')->findOrFail($currentSliderId) : null;
        return view('admin.sliders.index', compact('sliders', 'currentSlider'));
    }

    public function storeSliderItem(Request $request, $slider_id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:10240',
            'image_path' => 'nullable|string',
            'display_order' => 'required|integer',
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('sliders', 'public');
            $validated['image_path'] = asset('storage/' . $path);
        } elseif (empty($validated['image_path'])) {
            return back()->withErrors(['Vui lòng chọn file ảnh tải lên hoặc nhập đường dẫn ảnh.']);
        }
        unset($validated['image_file']);
        $validated['slider_id'] = $slider_id;
        $validated['is_active'] = $request->has('is_active');
        SliderItem::create($validated);
        return back()->with('success', 'Thêm ảnh vào banner/slider thành công.');
    }

    public function updateSliderItem(Request $request, $id)
    {
        $item = SliderItem::findOrFail($id);
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:10240',
            'image_path' => 'nullable|string',
            'display_order' => 'required|integer',
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('sliders', 'public');
            $validated['image_path'] = asset('storage/' . $path);
        }
        unset($validated['image_file']);
        $validated['is_active'] = $request->has('is_active');
        $item->update($validated);
        return back()->with('success', 'Cập nhật ảnh banner/slider thành công.');
    }

    public function destroySliderItem($id)
    {
        SliderItem::findOrFail($id)->delete();
        return back()->with('success', 'Xóa ảnh banner/slider thành công.');
    }

    // --- SETTINGS ---
    public function settings()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except(['_token', '_method', 'sidebar_image_file', 'site_logo_file']);
        if ($request->hasFile('sidebar_image_file')) {
            $path = $request->file('sidebar_image_file')->store('settings', 'public');
            $data['sidebar_image'] = asset('storage/' . $path);
        }
        if ($request->hasFile('site_logo_file')) {
            $path = $request->file('site_logo_file')->store('settings', 'public');
            $data['site_logo'] = asset('storage/' . $path);
        }
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Cập nhật cài đặt thành công.');
    }
}
