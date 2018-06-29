<?php

return [
	// Forgot Password
	'forgot_password'                  => [
        'subject'      	                    => 'Password Recovery '.env('APP_NAME'),
    ],

    // Contact User
    'contact_user'                     => [
        'subject'                           => 'Contact '.env('APP_NAME'),
        'thanks'                            => 'Thank you for contact us.',
        'contact_you'                       => 'Shortly we will contact you.'
    ],

    // Contact Admin
    'contact_admin'                    => [
        'subject'                           => 'Contact '.env('APP_NAME'),
        'new_contact'                       => 'We have a new contact',
    ],

    // Sale User
    'sale_user'                     => [
        'subject'                           => 'Purchase '.env('APP_NAME'),
        'note'                              => 'Thanks for your purchase at '.env('APP_NAME'),
        'details'                           => 'Details of your purchase',
    ],
    'item_canceled_user'                     => [
        'subject'                           => 'Product Canceled '.env('APP_NAME'),
        'note'                              => 'Thanks for your purchase at '.env('APP_NAME'),
        'details'                           => 'Details of your purchase',
    ],
    'sale_user_update'                     => [
        'subject'                           => 'Purchase '.env('APP_NAME'),
        'note'                              => 'Thanks for your purchase at '.env('APP_NAME'),
        'details'                           => 'Status update',
    ],

    // Sale Admin
    'sale_admin'                    => [
        'subject'                           => 'Purchase '.env('APP_NAME'),
        'sale_details'                      => 'Details of the Purchase',
    ],
    'item_canceled_admin'                    => [
        'subject'                           => 'Product Canceled '.env('APP_NAME'),
        'sale_details'                      => 'Details of the Purchase',
    ],

    // Titles Table
    'title'                            => [
        'id'                                => 'ID',
        'first_name'                        => 'First Name',
        'last_name'                         => 'Last Name',
        'recovery_link'                     => 'Recovery Link',
        'phone'                             => 'Phone',
        'email'                             => 'E-mail',
        'message'                           => 'Message',
        'total'                             => 'Total',
        'quantity'                          => 'Quantity',
        'price'                             => 'Price',
        'subtotal'                          => 'Subtotal',
        'products'                          => 'Products',
        'date'                              => 'Date',
        'created_at'                        => 'Created at',
        'updated_at'                        => 'Updated at',
        'deleted_at'                        => 'Deleted at',
    ],
];
