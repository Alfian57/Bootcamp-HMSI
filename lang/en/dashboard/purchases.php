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
    'delete' => [
        'title' => 'Delete Purchase',
        'success-message' => 'Purchase successfully deleted',
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
            'attribute' => 'purchase status',
        ],
        'user' => [
            'label' => 'Buyer Name',
            'attribute' => 'buyer name',
        ],
        'product' => [
            'label' => 'Product Name',
            'attribute' => 'product name',
        ],
        'quantity' => [
            'label' => 'Quantity',
            'placeholder' => 'Enter the quantity',
            'attribute' => 'quantity',
        ],
        'note' => [
            'label' => 'Note',
            'attribute' => 'note',
        ],
        'add-item-button' => '+ Add Item',
    ],
];
