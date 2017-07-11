<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
//        $this->call(RolesTableSeeder::class);
//        $this->call(PermissionsTableSeeder::class);
//        $this->call(RoleUsersTableSeeder::class);
//        $this->call(PermissionUsersTableSeeder::class);
//        $this->call(PermissionRolesTableSeeder::class);
//        $this->call(QuestionsTableSeeder::class);
//        $this->call(ClassesTableSeeder::class);
//        $this->call(OptionsTableSeeder::class);
//        $this->call(AnswersTableSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
//        $this->call(WeightsTableSeeder::class);
    }
}
