<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
    }

}
//php artisan db:seed
class sanphamTableSeeder extends seeder
{
    public function run()
    {
        DB::table('sanpham')->insert([
            ['id_san_pham' => str_random(5), 'ten san pham' => str_random(10)],
            ['id_san_pham' => str_random(5), 'ten san pham' => str_random(10)],
            ['id_san_pham' => str_random(5), 'ten san pham' => str_random(10)],
        ]);
    }
}
