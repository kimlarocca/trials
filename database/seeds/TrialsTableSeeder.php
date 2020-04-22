<?php

use Illuminate\Database\Seeder;
use App\Trial;

class TrialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trial::truncate();
        $count = 50;
        factory(Trial::class, $count)->create();
    }
}
