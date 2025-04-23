<?php

namespace Ophim\Ripple;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class RippleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setupDefaultThemeCustomizer();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'themes');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('themes/ripple')
        ], 'ripple-assets');
    }

    protected function setupDefaultThemeCustomizer()
    {
        config(['themes' => array_merge(config('themes', []), [
            'ripple' => [
                'name' => 'Ripple',
                'author' => 'hacoi.dev@gmail.com',
                'package_name' => 'namhuunam/ophim-ripple',
                'publishes' => ['ripple-assets'],
                'preview_image' => '',
                'options' => [
                    [
                        'name' => 'recommendations_limit',
                        'label' => 'Recommended movies limit',
                        'type' => 'number',
                        'value' => 10,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'per_page_limit',
                        'label' => 'Pages limit',
                        'type' => 'number',
                        'value' => 20,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'movie_related_limit',
                        'label' => 'Movies related limit',
                        'type' => 'number',
                        'value' => 10,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'latest',
                        'label' => 'Danh sách mới cập nhật',
                        'type' => 'code',
                        'hint' => 'display_label|relation|find_by_field|value|limit|show_more_url',
                        'value' => "Phim chiếu rạp||is_shown_in_theater|1|10|/danh-sach/phim-chieu-rap\r\nPhim bộ mới||type|series|10|/danh-sach/phim-bo\r\nPhim lẻ mới||type|single|10|/danh-sach/phim-le",
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'hotest',
                        'label' => 'Danh sách hot',
                        'type' => 'code',
                        'hint' => 'Label|relation|find_by_field|value|sort_by_field|sort_algo|limit',
                        'value' => "Top sắp chiếu||status|trailer|publish_year|desc|4\r\nTop phim bộ||type|series|view_total|desc|4\r\nTop phim lẻ||type|single|view_total|desc|4",
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'additional_css',
                        'label' => 'Additional CSS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'body_attributes',
                        'label' => 'Body attributes',
                        'type' => 'text',
                        'value' => "class='bg-[#1a1a1a] font-sans leading-normal tracking-normal'",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'additional_header_js',
                        'label' => 'Header JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_body_js',
                        'label' => 'Body JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_footer_js',
                        'label' => 'Footer JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'footer',
                        'label' => 'Footer',
                        'type' => 'code',
                        'value' => <<<EOT
                        <div class="w-full mx-auto flex flex-wrap">
                            <div class="flex w-full">
                                <div class="px-2"><span class="font-bold text-gray-100">Giới Thiệu...</span>
                                    <p class="text-gray-300 text-sm">Xem phim online chất lượng cao miễn phí với phụ đề tiếng
                                        việt - thuyết minh - lồng tiếng, có nhiều thể loại phim phong phú, đặc sắc,
                                        nhiều bộ phim hay nhất - mới nhất.</p>
                                    <p class="text-gray-300 text-sm">Website với giao diện trực quan, thuận tiện,
                                        tốc độ tải nhanh, ít quảng cáo hứa hẹn sẽ đem lại những trải nghiệm tốt cho người dùng.
                                    </p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-2 space-x-2">
                                    <a class="text-[#44e2ff] hover:text-yellow-300" href="#">Liên Hệ</a>
                                    <a class="text-[#44e2ff] hover:text-yellow-300" href="/ban-quyen">Khiếu nại bản quyền</a>
                                </div>
                            </div>
                        </div>
                        EOT,
                        'tab' => 'Custom HTML'
                    ],
                    [
                        'name' => 'ads_header',
                        'label' => 'Ads header',
                        'type' => 'code',
                        'value' => <<<EOT
                        <img src="" alt="">
                        EOT,
                        'tab' => 'Ads'
                    ],
                    [
                        'name' => 'ads_catfish',
                        'label' => 'Ads catfish',
                        'type' => 'code',
                        'value' => <<<EOT
                        <img src="" alt="">
                        EOT,
                        'tab' => 'Ads'
                    ]
                ],
            ]
        ])]);
    }
}
