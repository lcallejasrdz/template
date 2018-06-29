<?php

return [

    'title'                  		=> 'Carrito',

    'subtotal'						=> 'Subtotal',
    'product'						=> 'producto',
    'products'						=> 'productos',
    'cart-policies'                 => 'El precio y la disponibilidad de los productos de '.env('APP_NAME').' están sujetos a cambio. En el carrito de compras puedes dejar temporalmente los productos que quieras. Aparecerá el precio más reciente de cada producto.',
    'cart-code'                     => '¿Tienes una tarjeta de regalo o código promocional? Te pediremos que introduzcas el código de canjeo al momento de realizar el pago.',

	'setproduct'                  	=> [
        'success'      	                    => 'Producto agregado al carrito con éxito',
        'error'                             => 'Error al agregar el producto al carrito',
    ],

    'deleteproduct'                	=> [
        'success'                           => 'Producto eliminado del carrito con éxito',
        'error'                             => 'Error al eliminar el producto del carrito',
    ],

];
