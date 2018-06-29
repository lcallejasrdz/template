<?php

$word_title = 'Subcategory';
$word_text = 'subcategory';

return [
    // Title
    'module_title_s'        => $word_title,
    'module_title'          => 'Subcategories',

	// Tabs
	'tabs'              => [
        'general'      	    => 'General',
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
