<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'email' => 'admin@admin.com',
                'password' => bcrypt('asdasdasd'),
                'fullname' => 'Admin',
                'role' => 'Admin'
            ],
            [ 
                'email' => 'member@member.com',
                'password' => bcrypt('asdasdasd'),
                'fullname' => 'Member',
                'role' => 'Member'
            ],
        ]);

        DB::table('genres')->insert([
            ['name' => 'Sci-Fi'],
            ['name' => 'Action'],
            ['name' => 'Romance'],
            ['name' => 'Mystery'],
            ['name' => 'Sport'],
            ['name' => 'Mecha'],
        ]);

        DB::table('books')->insert([
            [
                'title'=>'Scifix',
                'genre_id'=>'1',
                'author'=> 'Ficsci',
                'synopsis'=>'fffff',
                'cover'=>'1642402202.jpg',
                'price'=>'10000'
            ],
            [
                'title'=>'Actionzi',
                'genre_id'=>'2',
                'author'=> 'Tionac',
                'synopsis'=>'aaaaaaaaa',
                'cover'=>'1642402202.jpg',
                'price'=>'20000'
            ],
            [
                'title'=>'Romansu',
                'genre_id'=>'3',
                'author'=> 'Sobi',
                'synopsis'=>'ssssssssssss',
                'cover'=>'1642402202.jpg',
                'price'=>'36000'
            ],
            [
                'title'=>'Mister',
                'genre_id'=>'4',
                'author'=> 'Mista',
                'synopsis'=>'mmmmmmm',
                'cover'=>'1642402202.jpg',
                'price'=>'1540000'
            ],
            [
                'title'=>'Spot',
                'genre_id'=>'5',
                'author'=> 'Spoto',
                'synopsis'=>'sssss',
                'cover'=>'1642402202.jpg',
                'price'=>'321000'
            ],
            [
                'title'=>'Mecha Kucha',
                'genre_id'=>'6',
                'author'=> 'Mechz',
                'synopsis'=>'mmmmmmmmmm',
                'cover'=>'1642402202.jpg',
                'price'=>'1230000'
            ],
        ]);

    }
}
