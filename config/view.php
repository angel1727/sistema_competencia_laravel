<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Aquí es donde Laravel buscará tus vistas. Puedes agregar más rutas si
    | tienes múltiples carpetas de vistas. Por defecto, usa resources/views.
    |
    */

    'paths' => [
        resource_path('views'),
        resource_path('views/viewsP'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Esta es la carpeta donde Laravel guarda las vistas compiladas (blade).
    | Normalmente no necesitas cambiar esto.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
