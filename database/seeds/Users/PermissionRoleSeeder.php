<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_roles')->insert($this->getTableData());
    }

    /**
     * role_id
     * 1 - User
     * 2 - Senior Admin
     * 3 - Super Admin
     *
     * @return array
     */
    private function getTableData(): array
    {
        return [
            ['role_id' => 1, 'permission_id' => 4],
            ['role_id' => 1, 'permission_id' => 5],
            ['role_id' => 2, 'permission_id' => 2],
            ['role_id' => 2, 'permission_id' => 3],
            ['role_id' => 2, 'permission_id' => 4],
            ['role_id' => 2, 'permission_id' => 5],
            ['role_id' => 3, 'permission_id' => 1],
            ['role_id' => 3, 'permission_id' => 2],
            ['role_id' => 3, 'permission_id' => 3],
            ['role_id' => 3, 'permission_id' => 4],
            ['role_id' => 3, 'permission_id' => 5],
        ];
    }
}
