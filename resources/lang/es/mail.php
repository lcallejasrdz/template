<?php

return [
	// Forgot Password
	'forgot_password'                  => [
        'subject'      	                    => 'Recuperación de Contraseña '.env('APP_NAME'),
    ],

    // Contact User
    'contact_user'                     => [
        'subject'                           => 'Contacto '.env('APP_NAME'),
        'thanks'                            => 'Gracias por contactarnos.',
        'contact_you'                       => 'En breve nos pondremos en contacto contigo.'
    ],

    // Contact Admin
    'contact_admin'                    => [
        'subject'                           => 'Contacto '.env('APP_NAME'),
        'new_contact'                       => 'Tenémos un nuevo contacto',
    ],

    // Sale User
    'sale_user'                     => [
        'subject'                           => 'Compra '.env('APP_NAME'),
        'note'                              => 'Gracias por tu compra en '.env('APP_NAME'),
        'details'                           => 'Detalles de tu compra',
    ],
    'item_canceled_user'                     => [
        'subject'                           => 'Producto Cancelado '.env('APP_NAME'),
        'note'                              => 'Gracias por tu compra en '.env('APP_NAME'),
        'details'                           => 'Detalles de tu compra',
    ],
    'sale_user_update'                     => [
        'subject'                           => 'Compra '.env('APP_NAME'),
        'note'                              => 'Gracias por tu compra en '.env('APP_NAME'),
        'details'                           => 'Actualización de estatus',
    ],

    // Sale Admin
    'sale_admin'                    => [
        'subject'                           => 'Compra '.env('APP_NAME'),
        'sale_details'                      => 'Detalles de la Compra',
    ],
    'item_canceled_admin'                    => [
        'subject'                           => 'Producto Cancelado '.env('APP_NAME'),
        'sale_details'                      => 'Detalles de la Compra',
    ],

    // Titles Table
    'title'                            => [
        'id'                                => 'ID',
        'first_name'                        => 'Nombre',
        'last_name'                         => 'Apellido',
        'recovery_link'                     => 'Link de Recuperación',
        'phone'                             => 'Teléfono',
        'email'                             => 'Correo Electrónico',
        'message'                           => 'Mensaje',
        'total'                             => 'Total',
        'quantity'                          => 'Cantidad',
        'price'                             => 'Precio',
        'subtotal'                          => 'Subtotal',
        'products'                          => 'Productos',
        'date'                              => 'Fecha',
        'created_at'                        => 'Creado',
        'updated_at'                        => 'Actualizado',
        'deleted_at'                        => 'Eliminado',
    ],
];
