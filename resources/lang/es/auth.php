<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Estas credenciales no coinciden con nuestros registros.',
    'throttle' => 'Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.',

    // Titles Table
    'title'             => [
        'users'                                 => 'Usuarios',
        'register'                              => 'Registrarse',
        'as'                                    => 'como',
        'my_account'                            => 'Mi Cuenta',
        'login'                                 => 'Iniciar Sesión',
        'logout'                                => 'Cerrar Sesión',
        'password_recovery'                     => 'Recuperar Contraseña',
        'password_change'                       => 'Cambiar Contraseña',
        'password_recovery_text'                => '¿Has olvidado tu contraseña?',
        'email_deleted'                         => 'La cuenta ha sido eliminada, contacta a los administradores para saber el motivo',
        'email_banned'                          => 'La cuenta ha sido desactivada, contacta a los administradores para saber el motivo',
    ],

    'forgot-password'   => [
        'error'                                 => 'Hubo un problema al recuperar su código de reseteo de contraseña, intente nuevamente',
    ],

    'forgot-password-confirm' => [
        'error'                                 => 'Hubo un problema al resetear su contraseña, intente nuevamente',
        'success'                               => 'Su contraseña se ha reseteado correctamente',
    ],

    // CRUD
    'crud'              => [
        'login'             => [
            'success'           => 'Usuario logeado exitosamente',
            'error'             => 'Usuario y/o contraseña incorrectos',
        ],
        'logout'            => [
            'success'           => 'Sesión cerrada exitosamente',
            'error'             => 'Error al cerrar tu sesión',
        ],
        'guest'             => '¡Debes de iniciar sesión!',
    ],

    // FormValidation
    'formvalidation'              => [
        'the'               => 'El campo',
        'they'              => 'Los campos',
        'and'               => 'y',

        'notEmpty'          => 'es requerido',
        'stringLength'      => 'debe tener entre %s y %s caracteres',
        'identical'         => 'deben ser identicos',
        'emailAddress'      => 'El valor no es un correo electrónico válido'
    ],

];
