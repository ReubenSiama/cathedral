<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_baptism","view_any_baptism","create_baptism","update_baptism","delete_baptism","delete_any_baptism","view_bishop","view_any_bishop","create_bishop","update_bishop","delete_bishop","delete_any_bishop","view_confirmation","view_any_confirmation","create_confirmation","update_confirmation","delete_confirmation","delete_any_confirmation","view_first::communion","view_any_first::communion","create_first::communion","update_first::communion","delete_first::communion","delete_any_first::communion","view_funeral","view_any_funeral","create_funeral","update_funeral","delete_funeral","delete_any_funeral","view_institution","view_any_institution","create_institution","update_institution","delete_institution","delete_any_institution","view_marriage","view_any_marriage","create_marriage","update_marriage","delete_marriage","delete_any_marriage","view_mass::timing","view_any_mass::timing","create_mass::timing","update_mass::timing","delete_mass::timing","delete_any_mass::timing","view_nationality","view_any_nationality","create_nationality","update_nationality","delete_nationality","delete_any_nationality","view_parish","view_any_parish","create_parish","update_parish","delete_parish","delete_any_parish","view_priest","view_any_priest","create_priest","update_priest","delete_priest","delete_any_priest","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_user","view_any_user","create_user","update_user","delete_user","delete_any_user","widget_StatsOverview"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
