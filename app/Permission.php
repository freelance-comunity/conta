<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    public static function defaultPermissions()
    {
        return [
            'ver_usuarios',
            'agregar_usuarios',
            'editar_usuarios',
            'eliminar_usuarios',

            'ver_roles',
            'agregar_roles',
            'editar_roles',
            'eliminar_roles',

            'ver_casos',
            'agregar_casos',
            'editar_casos',
            'eliminar_casos',
        ];
    }
}
