<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

    $adminRole = Role::firstOrCreate(['name' => 'admin']);
     $managerRole = Role::firstOrCreate(['name' => 'manager']);
     $leaderRole = Role::firstOrCreate(['name' => 'leader']);
    $memberRole = Role::firstOrCreate(['name' => 'member']);

        // إنشاء الصلاحيات
    $manageRoles = Permission::firstOrCreate(['name' => 'manage roles']);
    $assignLeaderAndMember = Permission::firstOrCreate(['name' => 'assign leader and member']);

        // إعطاء الصلاحيات للأدوار
    $adminRole->givePermissionTo($manageRoles);
    $managerRole->givePermissionTo($assignLeaderAndMember);

$permissions = [
'المستخدمين',
'قائمة المستخدمين',
'صلاحيات المستخدمين',
'اضافة مستخدم',
'تعديل مستخدم',
'حذف مستخدم',

'عرض صلاحية',
'اضافة صلاحية',
'تعديل صلاحية',
'حذف صلاحية',
];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}