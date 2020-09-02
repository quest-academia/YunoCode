<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status_name' => '受講可',
        ]);

        DB::table('statuses')->insert([
            'status_name' => '受講不可',
        ]);

        DB::table('statuses')->insert([
            'status_name' => '予約可',
        ]);
    }
}
