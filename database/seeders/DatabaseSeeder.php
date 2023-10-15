<?php

namespace Database\Seeders;

use App\Models\Pengiriman;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'agent@admin',
            'password' => bcrypt('qwerty123'),
            'last_seen' => Carbon::now(),
            'no_wa' => '081958971344',
        ]);

        $pengiriman = Pengiriman::create([
            'no_resi' => '1203012049219',
            'nama_customer' => 'Mark Zuckberg',
            'nohp_customer' => '085156018507',
            'alamat_customer' => 'BTP BLOK G 134',
            'nama_barang' => 'Laptop Asus ROG',
            'berat' => 3.5,
            'ongkir' => 100000,
        ]);

        $user2 = \App\Models\User::create([
            'name' => 'Admin JNT',
            'email' => 'jnt@admin',
            'password' => bcrypt('qwerty123'),
            'last_seen' => Carbon::now(),
            'no_wa' => '081958971344',
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'admin jnt']);
        $user2->assignRole('admin jnt');
        $user->assignRole('admin');
    }
}
