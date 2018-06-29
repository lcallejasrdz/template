<?php

$word_title = 'Service';
$word_text = 'service';

return [
    // Title
    'module_title_s'        => $word_title,
    'module_title'          => $word_title.'s',

    // Tabs
    'tabs'              => [
        'general'           => 'General',
        'events'            => 'Event Type',
        'inventory'         => 'Inventory',
        'ubication'         => 'Ubication',
        'gallery'           => 'Gallery',
        'disponibility'     => 'Disponibility',
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
