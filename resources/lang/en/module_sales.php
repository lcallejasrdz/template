<?php

$word_title = 'Sale';
$word_text = 'sale';

return [
    // Title
    'module_title_s'        => $word_title,
    'module_title'          => $word_title.'s',

	// Tabs
	'tabs'              => [
        'general'      	    => 'General',
        'shipping_address'  => 'Shipping Address',
        'products'          => 'Products',
    ],

    // CRUD
    'crud'              => [
        'create'            => [
            'success'           => $word_title.' successfully registered',
            'error'             => 'Error registering the '.$word_text,
        ],
        'update'            => [
            'success'           => $word_title.' successfully updated',
            'error'             => 'Error updating the '.$word_text,
        ],
        'update-status'            => [
            'success'           => 'Status successfully updated',
            'error'             => 'Error updating the status',
        ],
        'delete'            => [
            'success'           => $word_title.' successfully deleted',
            'error'             => 'Error deleting the '.$word_text,
        ],
        'restore'           => [
            'success'           => $word_title.' successfully restored',
            'error'             => 'Error restoring '.$word_text,
        ]
    ],
];
