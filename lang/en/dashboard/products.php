<?php

return [
    'index' => [
        'title' => 'Products',
        'page-title' => 'Product List',
        'create-button' => 'Create Product',
    ],
    'create' => [
        'title' => 'Create Product',
        'success-message' => 'Product successfully added',
    ],
    'edit' => [
        'title' => 'Edit Product',
        'success-message' => 'Product successfully updated',
        'form-info' => "Enter the image if you want to change it and leave it blank if you don't want to change",
    ],
    'delete' => [
        'title' => 'Delete Product',
        'success-message' => 'Product successfully deleted',
    ],
    'datatable' => [
        'column' => [
            'name' => 'Name',
            'price' => 'Price',
            'category' => 'Category',
            'image' => 'Image',
            'stock' => 'Stock',
            'weight' => 'Weight',
            'description' => 'Description',
            'action' => 'Action',
        ],
        'filter' => [
            'product-name' => [
                'label' => 'Product Name',
                'placeholder' => 'Search by product name',
            ],
            'product-category' => [
                'label' => 'Category',
                'placeholder' => 'Search by category name',
            ],
        ],
    ],
    'form' => [
        'name' => [
            'label' => 'Product Name',
            'placeholder' => 'Enter the name',
            'attribute' => 'product name',
        ],
        'description' => [
            'label' => 'Description',
            'placeholder' => 'Enter the description',
            'attribute' => 'description',
        ],
        'price' => [
            'label' => 'Price (Rp)',
            'placeholder' => 'Enter the price (Rp)',
            'attribute' => 'price',
        ],
        'category' => [
            'label' => 'Category',
            'placeholder' => 'Select the category',
            'attribute' => 'category',
        ],
        'weight' => [
            'label' => 'Weight (Kg)',
            'placeholder' => 'Enter the weight (Kg)',
            'attribute' => 'weight',
        ],
        'stock' => [
            'label' => 'Stock',
            'placeholder' => 'Enter the stock',
            'attribute' => 'stock',
        ],
        'image' => [
            'label' => 'Image',
            'placeholder' => 'Choose the image',
            'attribute' => 'image',
        ],
        'empty-image' => [
            'label' => 'Empty Image',
        ],
    ],
];
