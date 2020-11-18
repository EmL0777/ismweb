<?php

use Illuminate\Database\Seeder;
use App\Entities\News;
use App\Entities\News_i18n;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');  // 禁用外键约束
        DB::table('news_i18n')->truncate();
        DB::table('news')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');  // 启用外键约束

        factory(News::class, 10)->create()->each(function ($news) {
            $news->News_i18ns()->save(factory(News_i18n::class)->make(['languages' => 'en']));
            $news->News_i18ns()->save(factory(News_i18n::class)->make(['languages' => 'ja']));
            $news->News_i18ns()->save(factory(News_i18n::class)->make(['languages' => 'zh-CN']));
            $news->News_i18ns()->save(factory(News_i18n::class)->make(['languages' => 'zh-TW']));
        });
    }
}
