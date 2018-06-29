<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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

    'custom' => [
        'password' => [
            'min' => 'The :attribute must contain more than :min caracters',
        ],
        'email' => [
            'unique' => 'The :attribute has already been registered.',
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
            'stringLength' => 'Please enter value between 3 and 1000 characters long',
        ],
        'notEmpty' => 'The field is required',
        'disponibility' => [
            'hour_init' => 'The start time must be less than the end time',
            'hour_finish' => 'The end time must be greater than the start time',
            'hour_all' => 'At least one schedule must be full',
            'date_init' => 'The start date must be less than the end date',
            'date_finish' => 'The end date must be greater than the start date',
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

    'attributes' => [
        'name'                                  => 'Name',
        'first_name'                            => 'First Name',
        'last_name'                             => 'Last Name',
        'username'                              => 'User',
        'email'                                 => 'Email',
        'password'                              => 'Password',
        'password_confirmation'                 => 'Password Confirm',
        'password_confirm'                      => 'Password Confirm',
        'city'                                  => 'City',
        'country'                               => 'Country',
        'address'                               => 'Address',
        'phone'                                 => 'Phone',
        'mobile'                                => 'Mobile',
        'age'                                   => 'Age',
        'sex'                                   => 'Sex',
        'gender'                                => 'Gender',
        'year'                                  => 'Year',
        'month'                                 => 'Month',
        'day'                                   => 'Day',
        'hour'                                  => 'Hour',
        'minute'                                => 'Minute',
        'second'                                => 'Second',
        'title'                                 => 'Title',
        'content'                               => 'Content',
        'body'                                  => 'Body',
        'description'                           => 'Description',
        'excerpt'                               => 'Excerpt',
        'date'                                  => 'Date',
        'time'                                  => 'Time',
        'subject'                               => 'Subject',
        'message'                               => 'Message',

        // States
        'country_id'                            => 'Country',
        // Cities
        'state_id'                              => 'State',
        // Subcategories
        'category_id'                           => 'Category',
        // Membreships
        'quantity'                              => 'Quantity',
        'monthly_cost'                          => 'Monthly Cost',
        'annual_cost'                           => 'Annual Cost',
        // Users
        'role_id'                               => 'Permissions',
        // Suppliers
        'gender_id'                             => 'Gender',
        'birthdate'                             => 'Birthdate',
        'cellphone'                             => 'Mobile',
        'city_id'                               => 'City',
        'municipality'                          => 'Municipality',
        'colony'                                => 'Colony',
        'street'                                => 'Street',
        'no_ext'                                => 'Outdoor Num.',
        'no_int'                                => 'Interior Num.',
        'postal_code'                           => 'Postal Code',
        'rfc'                                   => 'FTR',
        'social_reason'                         => 'Social Reason',
        'commercial_name'                       => 'Commercial Name',
        'person_type_id'                        => 'Type',
        'web_site'                              => 'Website',
        'logo'                                  => 'Logo',
        'email_paypal'                          => 'Paypal Account',
        'legal_representant'                    => 'Legal Representants',
        'date_public_writing'                   => 'Date of Public Writing',
        'no_public_notary'                      => 'Number of Public Notary',
        'entity_public_notary'                  => 'Entity of Public Notary',
        'inscription_folio'                     => 'Registration Folio',
        'constitutive_act'                      => 'Constitutive Act',
        'hacienda_register'                     => 'Hacienda Register',
        'legal_representative_identification'   => 'Legal Representative Identification',
        'address_proof'                         => 'Proof of Address',
        'policies'                              => 'Policies of its Services',
        'membership_id'                         => 'Membership',
        'status_id'                             => 'Status',

        'contact_first_name'                    => 'First Name',
        'contact_last_name'                     => 'Last Name',
        'contact_job'                           => 'Post',
        'contact_email'                         => 'E-mail',
        'contact_phone'                         => 'Phone',
        'contact_cellphone'                     => 'Mobile',
        'add_contact'                           => 'Add Contact',
        // Customers
        // Products
        'user_id'                               => 'Supplier',
        'subcategory_id'                        => 'Subcategory',
        'description'                           => 'Description',
        'price'                                 => 'Price',
        'percent_buy_id'                        => 'Percentage for Purchase',
        'product_unity_id'                      => 'Unity',
        'event_type_id'                         => 'Event Type',
        'check_events'                          => 'Check All Events',
        'uncheck_events'                        => 'Uncheck All Events',
        'img_1'                                 => 'Image 1',
        'img_2'                                 => 'Image 2',
        'img_3'                                 => 'Image 3',
        'img_4'                                 => 'Image 4',
        'img_5'                                 => 'Image 5',
        'ubication'                             => 'Unication',
        'searchmap'                             => 'Search Address',
        'address'                               => 'Address',
        'lat'                                   => 'Latitude',
        'lng'                                   => 'Length',
        'product_type_id'                       => 'Product Type',
        'inventory'                             => 'Inventory',
        'min_buy'                               => 'Minimum for Purchase',
        'max_buy'                               => 'Maximum for Purchase',
        'capacity'                              => 'Service Capacity',
        'preparation_time_id'                   => 'Preparation Time',
        'restocked_time_id'                     => 'Restocked Time',
        'duration'                              => 'Service Duration (Hrs)',
        'schedules'                             => 'Schedules',
        'days_without_service'                  => 'Days without Service',
        'monday'                                => 'Monday',
        'tuesday'                               => 'Tuesday',
        'wednesday'                             => 'Wednesday',
        'thursday'                              => 'Thursday',
        'friday'                                => 'Friday',
        'saturday'                              => 'Saturday',
        'sunday'                                => 'Sunay',
        'init'                                  => 'Start',
        'finish'                                => 'Final',
        'from'                                  => 'From',
        'to'                                    => 'To',
        'to_m'                                  => 'to',
        'hrs'                                   => 'Hrs.',
        'add_date_without_service'              => 'Add Date',
        // Sales
        'customer'                              => 'Customer',
        'payment_type_id'                       => 'Payment Type',
        'subtotal'                              => 'Subtotal',
        'total'                                 => 'Total',

        'id'                                    => 'ID',
        'created_at'                            => 'Created at',
        'updated_at'                            => 'Updated at',
        'deleted_at'                            => 'Deleted at',
        'actions'                               => 'Actions',
    ],

];
