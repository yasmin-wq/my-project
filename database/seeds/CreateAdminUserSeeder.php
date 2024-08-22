<?php
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
   

    $user = User::create([
        'name' => 'Duaa Almadhoun',
        'email' => 'duaamd81@gmail.com',
        'password' => bcrypt('123456'),
        'roles_name' => 'owner',
        'Status' => 'مفعل',
    ]);

    // التأكد من وجود دور الأدمن
    $adminRole = Role::firstOrCreate(['name' => 'admin']);

    // تعيين دور الأدمن للمستخدم
    if ($adminRole && !$user->hasRole('admin')) {
        $user->assignRole($adminRole);
    }

    // تعيين جميع الصلاحيات للدور
    $permissions = Permission::pluck('id', 'id')->all();
    $adminRole->syncPermissions($permissions);

    // تعيين الدور للمستخدم (اختياري إذا لم يتم تعيينه بالفعل)
    if (!$user->hasRole('admin')) {
        $user->assignRole('admin');

}
}
}