<?php

return [
    'index' => [
        'title' => 'Users',
        'page-title' => 'User List',
        'create-button' => 'Create User',
    ],
    'create' => [
        'title' => 'Create User',
        'page-title' => 'Create User',
        'success-message' => 'User successfully added',
        'form-info' => 'User credentials will be sent to the email. If you do not fill in the password, it will be generated automatically. The password can be changed in the "Change Password" feature after successful login.',
    ],
    'edit' => [
        'title' => 'Edit User',
        'page-title' => 'Edit User',
        'success-message' => 'User successfully updated',
        'form-info' => "Enter the image if you want to change it and leave it blank if you don't want to change",
    ],
    'delete' => [
        'title' => 'Delete User',
        'success-message' => 'User successfully deleted',
    ],
    'datatable' => [
        'column' => [
            'name' => 'Name',
            'email' => 'Email',
            'gender' => 'Gender',
            'photo-profile' => 'Photo Profile',
            'admin' => 'Admin',
            'action' => 'Action',
            'date-of-birth' => 'Date of Birth',
            'phone-number' => 'Phone Number',
            'last-login' => 'Last Login Date',
        ],
        'filter' => [
            'user-name' => [
                'label' => 'User Name',
                'placeholder' => 'Search by User name',
            ],
            'user-email' => [
                'label' => 'User Email',
                'placeholder' => 'Search by User email',
            ],
            'user-gender' => [
                'label' => 'Gender',
                'items' => [
                    'all' => 'All',
                    'male' => 'Male',
                    'female' => 'Female',
                ],
            ],
            'user-is-admin' => [
                'label' => 'Is Admin',
                'items' => [
                    'all' => 'All',
                    'admin' => 'Yes',
                    'buyer' => 'No',
                ],
            ],
        ],
    ],
    'form' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Enter the email',
            'attribute' => 'Email address',
        ],
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter the name',
            'attribute' => 'Name',
        ],
        'gender' => [
            'label' => 'Gender',
            'placeholder' => 'Select the gender',
            'attribute' => 'Gender',
        ],
        'is-admin' => [
            'label' => 'Role',
            'placeholder' => 'Select the role',
            'items' => [
                'admin' => 'Admin',
                'buyer' => 'Buyer',
            ],
            'attribute' => 'Role',
        ],
        'is-active' => [
            'label' => 'Account Status',
            'placeholder' => 'Select the account status',
            'items' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
            ],
            'attribute' => 'Account status',
        ],
        'date-of-birth' => [
            'label' => 'Date of Birth',
            'placeholder' => 'Enter the date of birth',
            'attribute' => 'Date of birth',
        ],
        'phone-number' => [
            'label' => 'Phone Number',
            'placeholder' => 'Enter the phone number',
            'attribute' => 'Phone number',
        ],
        'photo-profile' => [
            'label' => 'Profile Photo',
            'placeholder' => 'Choose the profile photo',
            'attribute' => 'Profile photo',
        ],
        'show-password' => [
            'label' => 'Show Password',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Enter the password',
            'attribute' => 'Password',
        ],
        'password-confirmation' => [
            'label' => 'Password Confirmation',
            'placeholder' => 'Enter the password confirmation',
            'attribute' => 'Password confirmation',
        ],
    ],
];
