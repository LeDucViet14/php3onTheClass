<?php
namespace Database\Seeders;
use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Query builder
        // DB::table('users')->insert([
        //     'name' => 'viet',
        //     'email' => 'viet@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        User::factory()->count(10)->create();
    }
}
