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

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    // Titles Table
    'title'             => [
        'users'                                 => 'Users',
        'register'                              => 'Register',
        'my_account'                            => 'My Account',
        'as'                                    => 'as',
        'login'                                 => 'Login',
        'logout'                                => 'Logout',
        'password_recovery'                     => 'Recover Password',
        'password_change'                       => 'Change Password',
        'password_recovery_text'                => 'Have you forgotten your password?',
        'email_deleted'                         => 'The account has been deleted, contact the administrators to know the reason',
        'email_banned'                          => 'The account has been deactivated, contact the administrators to know the reason',
    ],

    'forgot-password'   => [
        'error'                                 => 'There was a problem recovering your password reset code, try again',
    ],

    'forgot-password-confirm' => [
        'error'                                 => 'There was a problem resetting your password, try again',
        'success'                               => 'Your password has been reset correctly',
    ],

    // CRUD
    'crud'              => [
        'login'             => [
            'success'           => 'User logged in successfully',
            'error'             => 'Incorrect username and/or password',
        ],
        'logout'            => [
            'success'           => 'Session closed successfully',
            'error'             => 'Error closing your session',
        ],
        'guest'             => 'You must login!',
    ],

    // FormValidation
    'formvalidation'              => [
        'the'               => 'The field',
        'they'              => 'The fields',
        'and'               => 'and',

        'notEmpty'          => 'is required',
        'stringLength'      => 'must have between %s and %s characters',
        'identical'         => 'must be identical',
        'emailAddress'      => 'The value is not a valid email'
    ],

];
