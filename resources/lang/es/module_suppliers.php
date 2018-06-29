<?php

$word_title = 'Proveedor';
$word_text = 'proveedor';

return [
    // Title
    'module_title_s'        => $word_title,
    'module_title'          => $word_title.'es',

	// Tabs
	'tabs'              => [
        'general'      	    => 'General',
        'contacts'          => 'Contactos',
        'fiscal_address'    => 'Domicilio Fiscal',
        'constitutive_act'  => 'Acta Constitutiva',
        'documents'         => 'Documentos',
        'policies'          => 'Políticas y Condiciones',
    ],

    // CRUD
    'crud'              => [
        'create'            => [
            'success'           => $word_title.' registrado con éxito',
            'error'             => 'Error al registrar al '.$word_text,
        ],
        'update'            => [
            'success'           => $word_title.' actualizado con éxito',
            'error'             => 'Error al actualizar al '.$word_text,
        ],
        'delete'            => [
            'success'           => $word_title.' eliminado con éxito',
            'error'             => 'Error al eliminar al '.$word_text,
        ],
        'restore'           => [
            'success'           => $word_title.' restaurado con éxito',
            'error'             => 'Error al restaurar al '.$word_text,
        ]
    ],
];
