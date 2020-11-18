<?php

use App\Entities\About;
use App\Entities\About_i18n;
use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');  // 禁用外键约束
        DB::table('abouts_i18n')->truncate();
        DB::table('abouts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');  // 启用外键约束

        factory(About::class, 20)->create()->each(function ($news) {
            $news->Abouts_i18ns()->save(factory(About_i18n::class)->make(['languages' => 'en']));
            $news->Abouts_i18ns()->save(factory(About_i18n::class)->make(['languages' => 'ja']));
            $news->Abouts_i18ns()->save(factory(About_i18n::class)->make(['languages' => 'zh-CN']));
            $news->Abouts_i18ns()->save(factory(About_i18n::class)->make(['languages' => 'zh-TW']));
        });
    }
}
