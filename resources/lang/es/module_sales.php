<?php

$word_title = 'Venta';
$word_text = 'venta';

return [
    // Title
    'module_title_s'        => $word_title,
    'module_title'          => $word_title.'s',

	// Tabs
	'tabs'              => [
        'general'      	    => 'General',
        'shipping_address'  => 'Dirección de Envío',
        'products'          => 'Productos',
    ],

    // CRUD
    'crud'              => [
        'create'            => [
            'success'           => $word_title.' registrado con éxito',
            'error'             => 'Error al registrar al '.$word_text,
        ],
        'update'            => [
            'success'           => $word_title.' actualizada con éxito',
            'error'             => 'Error al actualizar la '.$word_text,
        ],
        'update-status'            => [
            'success'           => 'Estatus actualizado con éxito',
            'error'             => 'Error al actualizar el estatus',
        ],
        'delete'            => [
            'success'           => $word_title.' eliminada con éxito',
            'error'             => 'Error al eliminar la '.$word_text,
        ],
        'restore'           => [
            'success'           => $word_title.' restaurada con éxito',
            'error'             => 'Error al restaurar la '.$word_text,
        ]
    ],
];
