<?php

return [
    'index' => [
        'title' => 'Purchases',
        'page-title' => 'Purchase List',
        'create-button' => 'Create Purchase',
    ],
    'create' => [
        'title' => 'Create Purchase',
        'page-title' => 'Create Purchase',
        'success-message' => 'Purchase successfully added',
    ],
    'edit' => [
        'title' => 'Edit Purchase',
        'page-title' => 'Edit Purchase',
        'success-message' => 'Purchase successfully updated',
    ],
    'datatable' => [
        'column' => [
            'customer-name' => 'Customer Name',
            'total-price' => 'Total Price',
            'total-weight' => 'Total Weight',
            'status' => 'Status',
            'created-at' => 'Purchase Datetime',
            'action' => 'Action',
        ],
        'filter' => [
            'customer-name' => [
                'label' => 'Customer Name',
                'placeholder' => 'Search by customer name',
            ],
            'purchase-status' => [
                'label' => 'Category',
                'items' => [
                    'all' => 'All',
                    'unpaid' => 'Unpaid',
                    'paid' => 'Paid',
                    'being-shipped' => 'Being Shipped',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ],
            ],
            'purchase-time' => [
                'label' => 'Purchase Time',
                'placeholder' => 'Search by purchase time',
            ],
        ],
    ],
    'form' => [
        'status' => [
            'label' => 'Purchase Status',
            'attribute' => 'Purchase Status',
        ],
        'product' => [
            'label' => 'Product Name',
            'attribute' => 'Product Name',
        ],
        'quantity' => [
            'label' => 'Quantity',
            'placeholder' => 'Enter the quantity',
            'attribute' => 'Quantity',
        ],
        'note' => [
            'label' => 'Note',
            'attribute' => 'Note',
        ],
        'add-item-button' => '+ Add Item',
    ],
];
