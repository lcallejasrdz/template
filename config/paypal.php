<?php

// Facilitator: facilitator-test@fabricadesoluciones.com abcd1234
// Buyer: buyer-test@fabricadesoluciones.com abcd1234

$client_id = env('PAYPAL_MODE') == 'live' ? env('PAYPAL_CLIENT_ID') : env('PAYPAL_SANDBOX_CLIENT_ID');
$secret = env('PAYPAL_MODE') == 'live' ? env('PAYPAL_SECRET') : env('PAYPAL_SANDBOX_SECRET');

return [
	'client_id'		=> $client_id,
	'secret' 		=> $secret,
	'settings' => [
		'mode' 						=> env('PAYPAL_MODE'),
		'http.ConnectionTimeOut' 	=> env('PAYPAL_TIMEOUT'),
		'log.LogEnabled' 			=> env('PAYPAL_LOG_ENABLED'),
		'log.FileName' 				=> storage_path() . '/logs/paypal.log',
		'log.LogLevel' 				=> env('PAYPAL_LOG_LEVEL')
	]
];
