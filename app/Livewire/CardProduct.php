<?php

namespace App\Livewire;

use Livewire\Component;

class CardProduct extends Component
{
    public $products = [
        [
            'productName' => 'Pouch Natural Batik',
            'productPrice' => 75000,
            'productImage' => 'images/barang/pouch1.png',
        ],
        [
            'productName' => 'Lorem Ipsum 2',
            'productPrice' => 85000,
            'productImage' => 'images/barang/pouch2.png',
        ],
        [
            'productName' => 'Lorem Ipsum 3',
            'productPrice' => 95000,
            'productImage' => 'images/barang/pouch3.png',
        ],
        [
            'productName' => 'Lorem Ipsum 4',
            'productPrice' => 105000,
            'productImage' => 'images/barang/pouch4.png',
        ],
        [
            'productName' => 'Lorem Ipsum 5',
            'productPrice' => 115000,
            'productImage' => 'images/barang/pouch5.jpg',
        ],
    ];

    public function render()
    {
        return view('livewire.card-product', [
            'products' => $this->products,
        ]);
    }
}
