<?php

return [
    'index' => [
        'title' => 'Purchases',
        'page-title' => 'Purchase List',
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
];
