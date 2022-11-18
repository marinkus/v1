<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
        $time = Carbon::now();

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'role' => 1,
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'dev',
            'email' => 'dev@dev.dev',
            'role' => 10,
            'password' => Hash::make('dev'),
        ]);

        foreach ([
            'Drama',
            'Comedy',
            'Action',
            'Documentary',
            'Horror',
            'Sci-fi'
        ] as $cat) {
            DB::table('categories')->insert([
                'title' => $cat,
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time
            ]);
        }
    }
}
