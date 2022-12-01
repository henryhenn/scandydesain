<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(RoleSeeder::class);

        $this->call(ProductScenarioSeeder::class);

        $this->call(ProductCategorySeeder::class);

        $admin = User::create([
            'name' => 'Admin Scandy Desain',
            'email' => 'scandydesain@gmail.com',
            'password' => bcrypt('scandydesain123'),
            'no_telp' => '085730586692',
            'alamat' => 'Indonesia',
        ]);

        $admin->assignRole('Admin');
    }
}
