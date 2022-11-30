<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::truncate();
            DB::table('role_user')->truncate();


        $superadminRole = Role::where('urole','superadmin')->first();
            $adminRole  = Role::where('urole','admin')->first();
            $authorRole = Role::where('urole','author')->first();
            $userRole   = Role::where('urole','user')->first();

            $superadmin = User::create([
                'name'     => 'Shams',
                'b_name'   => 'Heda',
                'urole'    => 'superadmin',
                'email'    => 'superadmin@admin.com',
                'password' => Hash::make('superadmin@admin.com'),
            ]);


            $admin = User::create([
                'name'          => 'Khan',
                'urole'         => 'admin',
                'b_name'        => 'Heda',
                'email'         => 'admin@admin.com',
                'password'      => Hash::make('admin@admin.com'),
            ]);
            $admin2 = User::create([
                'name'          => 'mun',
                'urole'         => 'admin',
                'b_name'        => 'Heda',
                'email'         => 'admin2@admin.com',
                'password'      => Hash::make('admin2@admin.com'),
            ]);

            $author = User::create([
                'name'     => 'Arabi',
                'urole'    => 'author',
                'b_name'   => 'Heda',
                'email'    => 'author@admin.com',
                'password' => Hash::make('author@admin.com'),
            ]);

            $user = User::create([
                'name'     => 'Mollah',
                'phone'         => '0173574515',
                // 'urole'    => 'user',
                'email'    => 'user@admin.com',
                'password' => Hash::make('user@admin.com'),
            ]);

            $superadmin->roles()->attach($superadminRole);
            $admin     ->roles()->attach($superadminRole);
            $admin2    ->roles()->attach($superadminRole);
            $author    ->roles()->attach($superadminRole);
            $user      ->roles()->attach($superadminRole);

    }
}
