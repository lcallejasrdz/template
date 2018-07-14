<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str as Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->truncate(); // Using truncate function so all info will be cleared when re-seeding.
		DB::table('roles')->truncate();
		DB::table('role_users')->truncate();
		DB::table('activations')->truncate();

		$admin_1 = Sentinel::registerAndActivate(array(
		    'slug' 									=> Str::slug('Eduardo Callejas 1'),
			'first_name' 							=> 'Eduardo',
            'last_name' 							=> 'Callejas',
            'email' 								=> 'lcallejasrdz@gmail.com',
            'password' 								=> 'asdasd',
            'role_id' 								=> 1,
            'status_id' 							=> 1,
		));

		$customer_1 = Sentinel::registerAndActivate(array(
		    'slug' 									=> Str::slug('Jorge Hernández 3'),
			'first_name'							=> 'Jorge',
	        'last_name'								=> 'Hernández',
	        'email'									=> 'jhernandez@algo.com',
	        'password'								=> 'asdasd',
	        'gender_id'								=> 1,
	        'birthdate'								=> '1991-08-21',
	        'phone'									=> '50161705',
	        'cellphone'								=> '5550161705',
	        'role_id'								=> 5,
	        'status_id'								=> 1,
		));

		$supplier_1 = Sentinel::registerAndActivate(array(
		    'slug' 									=> Str::slug('Programación Ramírez'),
			'first_name'							=> 'Iván',
	        'last_name'								=> 'Ramirez',
	        'email'									=> 'iramirez@gmail.com',
	        'password'								=> 'asdasd',
	        'phone'									=> '50161705',
	        'cellphone'								=> '5550161705',
	        'country_id'							=> 1,
	        'state_id'								=> 1,
	        'city_id'								=> 1,
	        'municipality'							=> 'Cuautitlán Izcalli',
	        'colony'								=> 'Bosques del Lago',
	        'street'								=> 'Calle Bosques de Viena',
	        'no_ext'								=> '252',
	        'no_int'								=> '',
	        'postal_code'							=> '54766',
	        'rfc'									=> 'SANE9108217G3',
	        'social_reason'							=> 'Programación Ramírez S.A. de C.V.',
	        'commercial_name'						=> 'Programación Ramírez',
	        'person_type_id'						=> 1,
	        'web_site'								=> 'http://iramirez.com/',
	        'logo'									=> 'ivan.jpg',
	        'email_paypal'							=> 'iramirez@gmail.com',
	        'legal_representant'					=> 'Iván Ramírez',
	        'date_public_writing'					=> '2010-01-01',
	        'no_public_notary'						=> '13',
	        'entity_public_notary'					=> 'Tampico, Tamaulipas',
	        'inscription_folio'						=> '13434',
	        'constitutive_act'						=> 'ivanacta.pdf',
	        'hacienda_register'						=> 'ivanregistro.pdf',
	        'legal_representative_identification'	=> 'ivanine.pdf',
	        'address_proof'							=> 'ivancomprobante.pdf',
	        'policies'								=> 'ivanpoliticas.pdf',
	        'membership_id'							=> 1,
	        'role_id'								=> 4,
	        'status_id'								=> 1,
		));

		$adminRole = Sentinel::getRoleRepository()->createModel()->create([
			'slug' => 'administador',
			'name' => 'Administador',
			'permissions' => array('admin' => 1),
		]);

		$operationsRole = Sentinel::getRoleRepository()->createModel()->create([
			'slug' => 'operations',
			'name' => 'Operaciones',
			'permissions' => array('opera' => 2),
		]);

		$callcenterRole = Sentinel::getRoleRepository()->createModel()->create([
			'slug' => 'callcenter',
			'name' => 'Call Center',
			'permissions' => array('callc' => 3),
		]);

		$supplierRole = Sentinel::getRoleRepository()->createModel()->create([
			'slug' => 'supplier',
			'name' => 'Proveedor',
			'permissions' => array('suppl' => 4),
		]);

		$customerRole = Sentinel::getRoleRepository()->createModel()->create([
			'slug' => 'customer',
			'name' => 'Cliente',
			'permissions' => array('custo' => 5),
		]);

		$admin_1->roles()->attach($adminRole);
		$customer_1->roles()->attach($customerRole);
		$supplier_1->roles()->attach($supplierRole);

		$this->command->info('Admin User created with username lcallejasrdz@gmail.com and password asdasd');
    }
}
