<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::truncate();
        $count = 50;
        factory(Patient::class, $count)->create();
    }
}
