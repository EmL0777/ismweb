<?php

use Illuminate\Database\Seeder;
use App\Entities\ServiceCenter;
use Illuminate\Support\Facades\DB;

class ServiceCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_centers')->truncate();
        factory(ServiceCenter::class, 30)->create();
    }
}
