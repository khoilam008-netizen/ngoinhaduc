<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Slider;
use App\Models\SliderItem;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Category;
use App\Models\Post;
use App\Models\CourseSchedule;
use App\Models\ExamSchedule;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Settings
        $settings = [
            ['group' => 'general', 'key' => 'site_name', 'value' => 'Ngôi nhà Đức - Trung tâm Đức ngữ tại Đà Nẵng', 'label' => 'Tên Website'],
            ['group' => 'general', 'key' => 'site_logo', 'value' => 'https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/logo.png', 'label' => 'Logo Website'],
            ['group' => 'contact', 'key' => 'address', 'value' => 'K31/2 Lê Hồng Phong, phường Hải Châu, Đà Nẵng', 'label' => 'Địa chỉ'],
            ['group' => 'contact', 'key' => 'phone', 'value' => '+84 (0236) 3565 783', 'label' => 'Số điện thoại'],
            ['group' => 'contact', 'key' => 'phone_link', 'value' => '+842363565783', 'label' => 'Số điện thoại gọi (Tel)'],
            ['group' => 'contact', 'key' => 'email_hoc', 'value' => 'ngoinhaducindanang@gmail.com', 'label' => 'Email đăng ký học'],
            ['group' => 'contact', 'key' => 'email_thi', 'value' => 'dangkythidanang@gmail.com', 'label' => 'Email đăng ký thi'],
            ['group' => 'social', 'key' => 'facebook_url', 'value' => 'https://www.facebook.com/ngoinhaducindanang.com.vn/', 'label' => 'Link Facebook'],
            ['group' => 'general', 'key' => 'sidebar_image', 'value' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg', 'label' => 'Ảnh tiêu biểu Sidebar'],
            ['group' => 'general', 'key' => 'warning_notice', 'value' => '<p><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">CẢNH BÁO LỪA ĐẢO:</mark> Chúng tôi chỉ có một trụ sở duy nhất tại K31/2 Lê Hồng Phong, phường Hải Châu, Đà Nẵng. Fanpage của chúng tôi không tồn tại từ tháng 12/2024. <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">Các fanpage hiện đang mạo danh chúng tôi và tuyển sinh qua fanpage LÀ GIẢ MẠO.</mark></strong></p>', 'label' => 'Cảnh báo lừa đảo trang đăng ký'],
        ];
        foreach ($settings as $s) {
            Setting::firstOrCreate(['key' => $s['key']], $s);
        }

        // 2. Menus
        $menu = Menu::firstOrCreate(['location' => 'primary'], ['name' => 'Menu Chính']);
        
        // Menu Items
        $m_gioithieu = MenuItem::firstOrCreate(['menu_id' => $menu->id, 'title' => 'Giới thiệu'], ['url' => '#', 'order' => 1]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Ngôi nhà Đức'], ['url' => route('gioi-thieu.ngoi-nha-duc'), 'order' => 1]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Giới thiệu Đà Nẵng'], ['url' => '#', 'order' => 2]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Phương pháp giảng dạy'], ['url' => '#', 'order' => 3]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Cơ sở vật chất'], ['url' => '#', 'order' => 4]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Sự kiện'], ['url' => '#', 'order' => 5]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Các đối tác của chúng tôi'], ['url' => '#', 'order' => 6]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_gioithieu->id, 'title' => 'Chứng chỉ Goethe-Zertifikat'], ['url' => '#', 'order' => 7]);

        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'title' => 'Lịch học'], ['url' => route('lich-hoc'), 'order' => 2]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'title' => 'Lịch thi'], ['url' => route('lich-thi'), 'order' => 3]);

        $m_thuvien = MenuItem::firstOrCreate(['menu_id' => $menu->id, 'title' => 'Thư viện'], ['url' => '#', 'order' => 4]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_thuvien->id, 'title' => 'Thư viện ảnh'], ['url' => route('thu-vien.anh'), 'order' => 1]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_thuvien->id, 'title' => 'Tài liệu tham khảo'], ['url' => '#', 'order' => 2]);

        $m_dangky = MenuItem::firstOrCreate(['menu_id' => $menu->id, 'title' => 'Đăng ký'], ['url' => '#', 'order' => 5]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_dangky->id, 'title' => 'Đăng ký nhập học'], ['url' => route('dang-ky.nhap-hoc'), 'order' => 1]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_dangky->id, 'title' => 'Đăng ký dự thi'], ['url' => route('dang-ky.du-thi'), 'order' => 2]);

        $m_lienhe = MenuItem::firstOrCreate(['menu_id' => $menu->id, 'title' => 'Liên hệ'], ['url' => route('lien-he'), 'order' => 6]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_lienhe->id, 'title' => 'Thông tin liên hệ'], ['url' => route('lien-he'), 'order' => 1]);
        MenuItem::firstOrCreate(['menu_id' => $menu->id, 'parent_id' => $m_lienhe->id, 'title' => 'Tuyển dụng'], ['url' => '#', 'order' => 2]);

        // 3. Sliders
        $s_desktop = Slider::firstOrCreate(['slug' => 'home-desktop'], ['name' => 'Slider Trang Chủ Desktop']);
        $s_desktop_imgs = [
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/desktop-slider.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_02c-1170x305.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_03c-1170x305.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_04c-1170x305.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_05c-1170x305.jpg'
        ];
        foreach ($s_desktop_imgs as $idx => $img) {
            SliderItem::firstOrCreate(['slider_id' => $s_desktop->id, 'image_path' => $img], ['display_order' => $idx + 1]);
        }

        $s_mobile = Slider::firstOrCreate(['slug' => 'home-mobile'], ['name' => 'Slider Trang Chủ Mobile']);
        $s_mobile_imgs = [
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/mobile-slider.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_02c-748x305.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_03c-748x305.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_04c-748x305.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_05c-748x305.jpg'
        ];
        foreach ($s_mobile_imgs as $idx => $img) {
            SliderItem::firstOrCreate(['slider_id' => $s_mobile->id, 'image_path' => $img], ['display_order' => $idx + 1]);
        }

        $s_sidebar = Slider::firstOrCreate(['slug' => 'sidebar'], ['name' => 'Slider Sidebar']);
        $s_sidebar_imgs = [
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/03/sicher.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/03/menschen.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/03/schritte.jpg',
            'https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/04/dutch-flag1-400x533.jpg'
        ];
        foreach ($s_sidebar_imgs as $idx => $img) {
            SliderItem::firstOrCreate(['slider_id' => $s_sidebar->id, 'image_path' => $img], ['display_order' => $idx + 1]);
        }

        // 4. Galleries
        $galleriesData = [
            [
                'slug' => 'tham-quan-lop-hoc-1',
                'title' => 'Tham quan lớp học 1',
                'description' => 'Chủ đề: Lớp học vui',
                'cover_image' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353-370x242.jpg',
                'display_order' => 1,
                'images' => [
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0355.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0357.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0366.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0370.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0382.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0389.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0393.jpg',
                ]
            ],
            [
                'slug' => 'tham-quan-lop-hoc-2',
                'title' => 'Tham quan lớp học 2',
                'description' => 'Chủ đề: Lớp học vui',
                'cover_image' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483-370x242.jpg',
                'display_order' => 2,
                'images' => [
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0416.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0429.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0432.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0440.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0441.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0453.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0477.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0485.jpg',
                ]
            ],
            [
                'slug' => 'tham-quan-lop-hoc-3',
                'title' => 'Tham quan lớp học 3',
                'description' => 'Chủ đề: Lớp học vui',
                'cover_image' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505-370x242.jpg',
                'display_order' => 3,
                'images' => [
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0489.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0510.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0546.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0571.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse2.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse3.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse4.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse5.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse6.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse7.jpg',
                ]
            ],
            [
                'slug' => 'tham-quan-lop-hoc-4',
                'title' => 'Tham quan lớp học 4',
                'description' => 'Chủ đề: Lớp học vui',
                'cover_image' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse13-370x242.jpg',
                'display_order' => 4,
                'images' => [
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse13.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse9.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse10.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse11.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross1.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross2.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross5.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/P1020383.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/P1020397.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/P1020399.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/TEAM1.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Thay-Johannes.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Thay-Paul.jpg',
                    'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/ThayPaul2.jpg',
                ]
            ]
        ];

        foreach ($galleriesData as $g) {
            $gal = Gallery::firstOrCreate(['slug' => $g['slug']], [
                'title' => $g['title'],
                'description' => $g['description'],
                'cover_image' => $g['cover_image'],
                'display_order' => $g['display_order']
            ]);
            foreach ($g['images'] as $idx => $img) {
                GalleryImage::firstOrCreate(['gallery_id' => $gal->id, 'image_path' => $img], ['display_order' => $idx + 1]);
            }
        }

        // 5. Course Schedules
        $courses = [
            ['session_type' => 'Sáng', 'level' => 'A1', 'schedule_time' => "Thứ 2,3,4,5,6\n8.00 giờ -11.30 giờ", 'duration' => '8 tuần', 'order' => 1],
            ['session_type' => 'Sáng', 'level' => 'A2', 'schedule_time' => "Thứ 2,3,4,5,6\n8.00 giờ -11.30 giờ", 'duration' => '8 tuần', 'order' => 2],
            ['session_type' => 'Sáng', 'level' => 'B1', 'schedule_time' => "Thứ 2,3,4,5,6\n8.00 giờ -11.30 giờ", 'duration' => '8 tuần', 'order' => 3],
            ['session_type' => 'Sáng', 'level' => 'B2.1/B2.2/B2.3', 'schedule_time' => "Thứ 2,3,4,5,6\n8.00 giờ -11.30 giờ", 'duration' => '4 tuần', 'order' => 4],
            ['session_type' => 'Tối', 'level' => 'A1.1', 'schedule_time' => "Thứ 2/4/6\n18.00 giờ -20.45 giờ", 'duration' => '8 tuần', 'order' => 5],
            ['session_type' => 'Tối', 'level' => 'A1.2', 'schedule_time' => "Thứ 2/4/6\n18.00 giờ -20.45 giờ", 'duration' => '8 tuần', 'order' => 6],
            ['session_type' => 'Tối', 'level' => 'A2.1', 'schedule_time' => "Thứ 2/4/6\n18.00 giờ -20.45 giờ", 'duration' => '8 tuần', 'order' => 7],
            ['session_type' => 'Tối', 'level' => 'A2.2', 'schedule_time' => "Thứ 2/4/6\n18.00 giờ -20.45 giờ", 'duration' => '8 tuần', 'order' => 8],
            ['session_type' => 'Tối', 'level' => 'B1.1/B1.2', 'schedule_time' => "Thứ 2/4/6\n18.00 giờ -20.45 giờ", 'duration' => '8 tuần', 'order' => 9],
            ['session_type' => 'Tối', 'level' => 'B2.1/B2.2/B2.3', 'schedule_time' => "Thứ 2/4/6\n18.00 giờ -20.45 giờ", 'duration' => '8 tuần', 'order' => 10],
            ['session_type' => 'Luyện thi', 'level' => 'A1', 'schedule_time' => 'Lớp luyện thi được tổ chức 3 tuần trước lịch thi hàng tháng.', 'duration' => '25 tiết', 'order' => 11],
            ['session_type' => 'Luyện thi', 'level' => 'A2', 'schedule_time' => 'Lớp luyện thi được tổ chức 3 tuần trước lịch thi hàng tháng.', 'duration' => '30 tiết', 'order' => 12],
            ['session_type' => 'Luyện thi', 'level' => 'B1', 'schedule_time' => 'Lớp luyện thi được tổ chức 3 tuần trước lịch thi hàng tháng.', 'duration' => '48 tiết', 'order' => 13],
            ['session_type' => 'Luyện thi', 'level' => 'B2', 'schedule_time' => 'Lớp luyện thi được tổ chức 3 tuần trước lịch thi hàng tháng.', 'duration' => '48 tiết', 'order' => 14],
        ];
        foreach ($courses as $c) {
            CourseSchedule::firstOrCreate(['session_type' => $c['session_type'], 'level' => $c['level']], $c);
        }

        // 6. Exam Schedules
        $exams = [
            ['month' => 'T1', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 1],
            ['month' => 'T2', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 2],
            ['month' => 'T3', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 3],
            ['month' => 'T4', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 4],
            ['month' => 'T5', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 5],
            ['month' => 'T6', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 6],
            ['month' => 'T7', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 7],
            ['month' => 'T8', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 8],
            ['month' => 'T9', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 9],
            ['month' => 'T10', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 10],
            ['month' => 'T11', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 11],
            ['month' => 'T12', 'registration_date_info' => '–', 'exam_date_info' => '–', 'display_order' => 12],
        ];
        foreach ($exams as $e) {
            ExamSchedule::firstOrCreate(['month' => $e['month']], $e);
        }

        // 7. Categories and Posts
        $cat_gt = Category::firstOrCreate(['slug' => 'gioi-thieu'], ['name' => 'Giới thiệu', 'description' => 'Các bài viết giới thiệu về trung tâm']);
        Post::firstOrCreate(['slug' => 'ngoi-nha-duc'], [
            'category_id' => $cat_gt->id,
            'title' => 'Ngôi nhà Đức',
            'excerpt' => 'Giới thiệu tổng quan về Ngôi nhà Đức tại Đà Nẵng',
            'content' => '<p>Ngôi nhà Đức tại Đà Nẵng là trung tâm đào tạo tiếng Đức uy tín chất lượng hàng đầu. Chúng tôi cung cấp các khóa học tiếng Đức từ trình độ A1 đến B2, đồng thời là đối tác chính thức tổ chức các kỳ thi chứng chỉ Goethe-Zertifikat quốc tế.</p><p>Với cơ sở vật chất hiện đại, đội ngũ giáo viên giàu kinh nghiệm và phương pháp giảng dạy theo chuẩn khung tham chiếu Châu Âu GER, học viên sẽ luôn có được trải nghiệm học tập tốt nhất.</p>',
            'thumbnail' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg',
            'is_featured' => true,
        ]);
    }
}
