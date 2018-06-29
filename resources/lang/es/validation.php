<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser un dirección IPv4 válida',
    'ipv6'                 => ':attribute debe ser un dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'            => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => 'El formato :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'password' => [
            'min' => 'La :attribute debe contener más de :min caracteres',
        ],
        'email' => [
            'unique' => 'El :attribute ya ha sido registrado.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation to FormValidation
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'formvalidation'        => [
        'description' => [
            'stringLength' => 'Por favor introduce un valor con una longitud entre 3 y 1000 caracteres',
        ],
        'notEmpty' => 'El campo es requerido',
        'disponibility' => [
            'hour_init' => 'La hora de inicio debe ser menor a la hora de fin',
            'hour_finish' => 'La hora de fin debe ser mayor a la hora de inicio',
            'hour_all' => 'Al menos un horario debe estar lleno',
            'date_init' => 'La fecha de inicio debe ser menor a la fecha de fin',
            'date_finish' => 'La fecha de fin debe ser mayor a la fecha de inicio',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                                  => 'Nombre',
        'first_name'                            => 'Nombre',
        'last_name'                             => 'Apellido',
        'username'                              => 'Usuario',
        'email'                                 => 'Correo Electrónico',
        'password'                              => 'Contraseña',
        'password_confirmation'                 => 'Confirmación de la Contraseña',
        'password_confirm'                      => 'Confirmación de la Contraseña',
        'city'                                  => 'Ciudad',
        'country'                               => 'País',
        'address'                               => 'Dirección',
        'phone'                                 => 'Teléfono',
        'mobile'                                => 'Móvil',
        'age'                                   => 'Edad',
        'sex'                                   => 'Sexo',
        'gender'                                => 'Género',
        'year'                                  => 'Año',
        'month'                                 => 'Mes',
        'day'                                   => 'Día',
        'hour'                                  => 'Hora',
        'minute'                                => 'Minuto',
        'second'                                => 'Segundo',
        'title'                                 => 'Título',
        'content'                               => 'Contenido',
        'body'                                  => 'Contenido',
        'description'                           => 'Descripción',
        'excerpt'                               => 'Extracto',
        'date'                                  => 'Fecha',
        'time'                                  => 'Hora',
        'subject'                               => 'Asunto',
        'message'                               => 'Mensaje',

        // States
        'country_id'                            => 'País',
        // Cities
        'state_id'                              => 'Estado',
        // Subcategories
        'category_id'                           => 'Categoría',
        // Membreships
        'quantity'                              => 'Cantidad',
        'monthly_cost'                          => 'Costo Mensual',
        'annual_cost'                           => 'Costo Anual',
        // Users
        'role_id'                               => 'Permisos',
        // Suppliers
        'gender_id'                             => 'Género',
        'birthdate'                             => 'Fecha de Nacimiento',
        'cellphone'                             => 'Móvil',
        'city_id'                               => 'Ciudad',
        'municipality'                          => 'Municipio',
        'colony'                                => 'Colonia',
        'street'                                => 'Calle',
        'no_ext'                                => 'No. Exterior',
        'no_int'                                => 'No. Interior',
        'postal_code'                           => 'Código Postal',
        'rfc'                                   => 'RFC',
        'social_reason'                         => 'Razón Social',
        'commercial_name'                       => 'Nombre Comercial',
        'person_type_id'                        => 'Tipo',
        'web_site'                              => 'Sitio Web',
        'logo'                                  => 'Logo',
        'email_paypal'                          => 'Cuenta Paypal',
        'legal_representant'                    => 'Representantes Legales',
        'date_public_writing'                   => 'Fecha de la Escritura Pública',
        'no_public_notary'                      => 'Número de Notario Público',
        'entity_public_notary'                  => 'Entidad del Notario Público',
        'inscription_folio'                     => 'Folio de Inscripción',
        'constitutive_act'                      => 'Acta Constitutiva',
        'hacienda_register'                     => 'Alta de Hacienda',
        'legal_representative_identification'   => 'Identificación Representante Legal',
        'address_proof'                         => 'Comprobante de Domicilio',
        'policies'                              => 'Políticas de sus Servicios',
        'membership_id'                         => 'Membresía',
        'status_id'                             => 'Estatus',

        'contact_first_name'                    => 'Nombre',
        'contact_last_name'                     => 'Apellido',
        'contact_job'                           => 'Puesto',
        'contact_email'                         => 'Correo Electrónico',
        'contact_phone'                         => 'Teléfono',
        'contact_cellphone'                     => 'Móvil',
        'add_contact'                           => 'Agregar Contacto',
        // Customers
        // Products
        'user_id'                               => 'Proveedor',
        'subcategory_id'                        => 'Subcategoría',
        'description'                           => 'Descripción',
        'price'                                 => 'Precio',
        'percent_buy_id'                        => 'Porcentaje para Compra',
        'product_unity_id'                      => 'Unidad',
        'event_type_id'                         => 'Tipo de Evento',
        'check_events'                          => 'Marcar Todos los Eventos',
        'uncheck_events'                        => 'Desmarcar Todos los Eventos',
        'img_1'                                 => 'Imágen 1',
        'img_2'                                 => 'Imágen 2',
        'img_3'                                 => 'Imágen 3',
        'img_4'                                 => 'Imágen 4',
        'img_5'                                 => 'Imágen 5',
        'ubication'                             => 'Ubicación',
        'searchmap'                             => 'Buscar Dirección',
        'address'                               => 'Dirección',
        'lat'                                   => 'Latitud',
        'lng'                                   => 'Longitud',
        'product_type_id'                       => 'Tipo de Producto',
        'inventory'                             => 'Inventario',
        'min_buy'                               => 'Mínimo para Compra',
        'max_buy'                               => 'Máximo para Compra',
        'capacity'                              => 'Capacidad de Servicios',
        'preparation_time_id'                   => 'Tiempo de Preparación',
        'restocked_time_id'                     => 'Tiempor de Resurtido',
        'duration'                              => 'Duración de Servicio (Hrs)',
        'schedules'                             => 'Horarios',
        'days_without_service'                  => 'Días sin Servicio',
        'monday'                                => 'Lunes',
        'tuesday'                               => 'Martes',
        'wednesday'                             => 'Miércoles',
        'thursday'                              => 'Jueves',
        'friday'                                => 'Viernes',
        'saturday'                              => 'Sábado',
        'sunday'                                => 'Domingo',
        'init'                                  => 'Inicio',
        'finish'                                => 'Final',
        'from'                                  => 'De',
        'to'                                    => 'A',
        'to_m'                                  => 'a',
        'hrs'                                   => 'Hrs.',
        'add_date_without_service'              => 'Agregar Fecha',
        // Sales
        'customer'                              => 'Cliente',
        'payment_type_id'                       => 'Tipo de Pago',
        'subtotal'                              => 'Subtotal',
        'total'                                 => 'Total',

        'id'                                    => 'ID',
        'created_at'                            => 'Creado',
        'updated_at'                            => 'Actualizado',
        'deleted_at'                            => 'Eliminado',
        'actions'                               => 'Acciones',
    ],

];
