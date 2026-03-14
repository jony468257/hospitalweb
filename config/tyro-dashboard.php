<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the dashboard routes prefix and middleware.
    |
    */
    'routes' => [
        // URL prefix for all dashboard routes
        'prefix' => env('TYRO_DASHBOARD_PREFIX', 'dashboard'),

        // Middleware applied to all dashboard routes
        'middleware' => ['web', 'auth'],

        // Route name prefix
        'name_prefix' => 'tyro-dashboard.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Resources Configuration
    |--------------------------------------------------------------------------
    |
    | Define resources to automatically generate CRUD interfaces.
    | You can configure searchable fields, field types, readonly access, etc.
    |
    */
    'resources' => [

        // Users Resource
        'users' => [
            'model' => App\Models\User::class,
            'title' => 'Users',
            'search' => ['name', 'email'], // searchable fields in list view
            'readonly' => false, // make true to prevent editing/deleting
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Name',
                    'required' => true,
                    'searchable' => true,
                    'placeholder' => 'Enter full name'
                ],
                'email' => [
                    'type' => 'text',
                    'label' => 'Email',
                    'required' => true,
                    'searchable' => true,
                    'placeholder' => 'user@example.com'
                ],
                'status' => [
                    'type' => 'select',
                    'options' => ['active', 'inactive'],
                    'label' => 'Account Status',
                    'required' => true
                ],
                'is_admin' => [
                    'type' => 'toggle',
                    'label' => 'Administrator Access'
                ],
                'bio' => [
                    'type' => 'richtext',
                    'label' => 'Biography'
                ],
                'password' => [
                    'type' => 'password',
                    'label' => 'Password',
                    'required' => true
                ]
            ]
        ],

        // Portfolio Profile (Home/About)
        'portfolio_profiles' => [
            'model' => App\Models\PortfolioProfile::class,
            'title' => 'Profile (Home/About)',
            'search' => ['name', 'email'],
            'readonly' => false,
            'fields' => [
                'name' => ['type' => 'text', 'label' => 'Name (English)', 'required' => true],
                'name_bn' => ['type' => 'text', 'label' => 'Name (Bangla)', 'required' => false, 'hide_in_index' => true],
                'role' => ['type' => 'text', 'label' => 'Role (English)'],
                'role_bn' => ['type' => 'text', 'label' => 'Role (Bangla)', 'hide_in_index' => true],
                'bio' => ['type' => 'richtext', 'label' => 'Biography (English)', 'hide_in_index' => true],
                'bio_bn' => ['type' => 'richtext', 'label' => 'Biography (Bangla)', 'hide_in_index' => true],
                'about_subtitle' => ['type' => 'text', 'label' => 'About Subtitle (English)', 'hide_in_index' => true],
                'about_subtitle_bn' => ['type' => 'text', 'label' => 'About Subtitle (Bangla)', 'hide_in_index' => true],
                'about_details' => ['type' => 'richtext', 'label' => 'About Details Paragraph (English)', 'hide_in_index' => true],
                'about_details_bn' => ['type' => 'richtext', 'label' => 'About Details Paragraph (Bangla)', 'hide_in_index' => true],
                'skills_subtitle' => ['type' => 'text', 'label' => 'Skills Subtitle (English)', 'hide_in_index' => true],
                'skills_subtitle_bn' => ['type' => 'text', 'label' => 'Skills Subtitle (Bangla)', 'hide_in_index' => true],
                'facts_subtitle' => ['type' => 'text', 'label' => 'Facts Subtitle (English)', 'hide_in_index' => true],
                'facts_subtitle_bn' => ['type' => 'text', 'label' => 'Facts Subtitle (Bangla)', 'hide_in_index' => true],
                'avatar' => ['type' => 'file', 'label' => 'Avatar Image', 'required' => false, 'hide_in_index' => true],
                'banner_image' => ['type' => 'file', 'label' => 'Home Banner Image', 'required' => false, 'hide_in_index' => true],
                'banner_subtitle' => ['type' => 'text', 'label' => 'Home Banner Subtitle (English)', 'hide_in_index' => true],
                'banner_subtitle_bn' => ['type' => 'text', 'label' => 'Home Banner Subtitle (Bangla)', 'hide_in_index' => true],
                'birthday' => ['type' => 'text', 'label' => 'Birthday', 'hide_in_index' => true],
                'website' => ['type' => 'text', 'label' => 'Website', 'hide_in_index' => true],
                'phone' => ['type' => 'text', 'label' => 'Phone'],
                'city' => ['type' => 'text', 'label' => 'City (English)', 'hide_in_index' => true],
                'city_bn' => ['type' => 'text', 'label' => 'City (Bangla)', 'hide_in_index' => true],
                'age' => ['type' => 'number', 'label' => 'Age', 'hide_in_index' => true],
                'degree' => ['type' => 'text', 'label' => 'Degree (English)', 'hide_in_index' => true],
                'degree_bn' => ['type' => 'text', 'label' => 'Degree (Bangla)', 'hide_in_index' => true],
                'email' => ['type' => 'text', 'label' => 'Email'],
                'freelance' => ['type' => 'text', 'label' => 'Freelance Status (English)', 'hide_in_index' => true],
                'freelance_bn' => ['type' => 'text', 'label' => 'Freelance Status (Bangla)', 'hide_in_index' => true],
            ]
        ],

        // Skills
        'skills' => [
            'model' => App\Models\Skill::class,
            'title' => 'Skills',
            'search' => ['name'],
            'fields' => [
                'name' => ['type' => 'text', 'label' => 'Skill Name (English)', 'required' => true],
                'name_bn' => ['type' => 'text', 'label' => 'Skill Name (Bangla)', 'required' => false, 'hide_in_index' => true],
                'val' => ['type' => 'number', 'label' => 'Percentage (0-100)', 'required' => true, 'min' => 0, 'max' => 100],
            ]
        ],

        // Facts
        'facts' => [
            'model' => App\Models\Fact::class,
            'title' => 'Facts',
            'search' => ['label'],
            'fields' => [
                'label' => ['type' => 'text', 'label' => 'Fact Label (English)', 'required' => true],
                'label_bn' => ['type' => 'text', 'label' => 'Fact Label (Bangla)', 'required' => false, 'hide_in_index' => true],
                'count' => ['type' => 'number', 'label' => 'Count', 'required' => true],
            ]
        ],

        // Education
        'education' => [
            'model' => App\Models\Education::class,
            'title' => 'Education',
            'search' => ['institution', 'degree'],
            'fields' => [
                'degree' => ['type' => 'text', 'label' => 'Degree (English)', 'required' => true],
                'degree_bn' => ['type' => 'text', 'label' => 'Degree (Bangla)', 'required' => false, 'hide_in_index' => true],
                'institution' => ['type' => 'text', 'label' => 'Institution (English)', 'required' => true],
                'institution_bn' => ['type' => 'text', 'label' => 'Institution (Bangla)', 'required' => false, 'hide_in_index' => true],
                'year' => ['type' => 'text', 'label' => 'Year (e.g. 2015-2016)', 'required' => true],
                'desc' => ['type' => 'richtext', 'label' => 'Description (English)', 'hide_in_index' => true],
                'desc_bn' => ['type' => 'richtext', 'label' => 'Description (Bangla)', 'hide_in_index' => true],
            ]
        ],

        // Experiences
        'experiences' => [
            'model' => App\Models\Experience::class,
            'title' => 'Experience',
            'search' => ['company', 'role'],
            'fields' => [
                'role' => ['type' => 'text', 'label' => 'Role (English)', 'required' => true],
                'role_bn' => ['type' => 'text', 'label' => 'Role (Bangla)', 'required' => false, 'hide_in_index' => true],
                'company' => ['type' => 'text', 'label' => 'Company (English)', 'required' => true],
                'company_bn' => ['type' => 'text', 'label' => 'Company (Bangla)', 'required' => false, 'hide_in_index' => true],
                'year' => ['type' => 'text', 'label' => 'Year (e.g. 2019-Present)', 'required' => true],
                'bullets' => ['type' => 'richtext', 'label' => 'Description (Bullets - English)', 'hide_in_index' => true],
                'bullets_bn' => ['type' => 'richtext', 'label' => 'Description (Bullets - Bangla)', 'hide_in_index' => true],
            ]
        ],

        // Services
        'services' => [
            'model' => App\Models\Service::class,
            'title' => 'Services',
            'search' => ['title'],
            'fields' => [
                'title' => ['type' => 'text', 'label' => 'Title (English)', 'required' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Title (Bangla)', 'required' => false, 'hide_in_index' => true],
                'description' => ['type' => 'richtext', 'label' => 'Description (English)', 'required' => true, 'hide_in_index' => true],
                'description_bn' => ['type' => 'richtext', 'label' => 'Description (Bangla)', 'required' => false, 'hide_in_index' => true],
                'icon' => ['type' => 'text', 'label' => 'Bootstrap Icon Class (e.g. bi bi-code)', 'required' => true],
            ]
        ],

        // Projects
        'projects' => [
            'model' => App\Models\Project::class,
            'title' => 'Portfolio Projects',
            'search' => ['title', 'category'],
            'fields' => [
                'title' => ['type' => 'text', 'label' => 'Title (English)', 'required' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Title (Bangla)', 'required' => false, 'hide_in_index' => true],
                'category' => ['type' => 'text', 'label' => 'Category (English)', 'required' => true],
                'category_bn' => ['type' => 'text', 'label' => 'Category (Bangla)', 'required' => false, 'hide_in_index' => true],
                'image' => ['type' => 'file', 'label' => 'Project Image 1', 'required' => true],
                'image_2' => ['type' => 'file', 'label' => 'Project Image 2', 'required' => false, 'hide_in_index' => true],
                'image_3' => ['type' => 'file', 'label' => 'Project Image 3', 'required' => false, 'hide_in_index' => true],
                'image_4' => ['type' => 'file', 'label' => 'Project Image 4', 'required' => false, 'hide_in_index' => true],
                'image_5' => ['type' => 'file', 'label' => 'Project Image 5', 'required' => false, 'hide_in_index' => true],
                'link' => ['type' => 'text', 'label' => 'Web Site Link', 'required' => false],
            ]
        ],

        // Certifications
        'certifications' => [
            'model' => App\Models\Certification::class,
            'title' => 'Certifications',
            'search' => ['title'],
            'fields' => [
                'title' => ['type' => 'text', 'label' => 'Title (English)', 'required' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Title (Bangla)', 'required' => false, 'hide_in_index' => true],
                'year' => ['type' => 'text', 'label' => 'Year', 'required' => true],
                'desc' => ['type' => 'textarea', 'label' => 'Description (English)', 'hide_in_index' => true],
                'desc_bn' => ['type' => 'textarea', 'label' => 'Description (Bangla)', 'hide_in_index' => true],
            ]
        ],

        // Contact Messages
        'contact_messages' => [
            'model' => App\Models\ContactMessage::class,
            'title' => 'Contact Messages',
            'readonly' => ['admin', 'super-admin'],
            'search' => ['name', 'email', 'subject'],
            'fields' => [
                'name' => ['type' => 'text', 'label' => 'Name'],
                'email' => ['type' => 'text', 'label' => 'Email'],
                'subject' => ['type' => 'text', 'label' => 'Subject'],
                'message' => ['type' => 'textarea', 'label' => 'Message'],
            ]
        ],

/*
        // Example Posts Resource
        'posts' => [
            'model' => App\Models\Post::class,
            'search' => ['title', 'content'],
            'readonly' => false,
            'fields' => [
                'title' => ['type' => 'text', 'label' => 'Title', 'required' => true],
                'content' => ['type' => 'richtext', 'label' => 'Content'],
                'category_id' => [
                    'type' => 'select',
                    'label' => 'Category',
                    'relationship' => 'category', // Post model method
                    'option_label' => 'name'
                ],
                'is_published' => ['type' => 'toggle', 'label' => 'Published']
            ]
        ],
*/

    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Roles
    |--------------------------------------------------------------------------
    |
    | Users with these roles will have full access to admin features
    | (user management, role management, privilege management, settings).
    |
    */
    'admin_roles' => ['admin', 'super-admin'],

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | The user model to use throughout the dashboard.
    |
    */
    'user_model' => env('TYRO_DASHBOARD_USER_MODEL', 'App\\Models\\User'),

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | Default pagination settings for lists.
    |
    */
    'pagination' => [
        'users' => 15,
        'roles' => 15,
        'privileges' => 15,
    ],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | Customize the dashboard appearance.
    |
    */
    'branding' => [
        // Application name shown in dashboard
        'app_name' => env('TYRO_DASHBOARD_APP_NAME', env('APP_NAME', 'Laravel')),

        // URL to your logo (null for text-based logo)
        'logo' => env('TYRO_DASHBOARD_LOGO', null),
    ],

    /*
    |--------------------------------------------------------------------------
    | Sidebar Menus
    |--------------------------------------------------------------------------
    |
    | Define dashboard sidebar menus with icons and permission control.
    |
    */
    'menus' => [
        [
            'label' => 'Users',
            'icon'  => 'users',
            'route' => 'users.index',
        ],
        [
            'label' => 'Profile (Home)',
            'icon'  => 'user',
            'route' => 'portfolio_profiles.index',
        ],
        [
            'label' => 'About',
            'icon'  => 'info',
            'submenu' => [
                [
                    'label' => 'Skills',
                    'route' => 'skills.index',
                ],
                [
                    'label' => 'Facts',
                    'route' => 'facts.index',
                ],
            ]
        ],
        [
            'label' => 'Resume',
            'icon'  => 'file-text',
            'submenu' => [
                [
                    'label' => 'Education',
                    'route' => 'education.index',
                ],
                [
                    'label' => 'Experience',
                    'route' => 'experiences.index',
                ],
                [
                    'label' => 'Certifications',
                    'route' => 'certifications.index',
                ],
            ]
        ],
        [
            'label' => 'Services',
            'icon'  => 'briefcase',
            'route' => 'services.index',
        ],
        [
            'label' => 'Portfolio',
            'icon'  => 'image',
            'route' => 'projects.index',
        ],
        [
            'label' => 'Contact',
            'icon'  => 'mail',
            'route' => 'contact_messages.index',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Enable or disable specific dashboard features.
    |
    */
    'features' => [
        'user_management' => true,
        'role_management' => true,
        'privilege_management' => true,
        'settings_management' => true,
        'profile_management' => true,
        'activity_log' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Protected Resources
    |--------------------------------------------------------------------------
    |
    | Resources that cannot be deleted through the dashboard.
    |
    */
    'protected' => [
        'roles' => ['admin', 'super-admin', 'user'],
        'users' => [], // Add user IDs that cannot be deleted
    ],

    /*
    |--------------------------------------------------------------------------
    | Dashboard Widgets
    |--------------------------------------------------------------------------
    |
    | Configure which widgets appear on the dashboard home.
    |
    */
    'widgets' => [
        'stats' => true,
        'recent_users' => true,
        'role_distribution' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | Configure dashboard notifications behavior.
    |
    */
    'notifications' => [
        'show_flash_messages' => true,
        'auto_dismiss_seconds' => 5,
    ],

    /*
    |--------------------------------------------------------------------------
    | Resource UI Settings
    |--------------------------------------------------------------------------
    |
    | Configure the appearance and behavior of resource forms and lists.
    |
    */
    'resource_ui' => [
        'show_global_errors' => env('TYRO_SHOW_GLOBAL_ERRORS', true),
        'show_field_errors' => env('TYRO_SHOW_FIELD_ERRORS', true),
    ],

];
