<?php

namespace App\Livewire;

use Livewire\Component;

class ProductCart extends Component
{
    public $products = [
        [
            'productName' => 'Pouch Elegan Handmade Batik',
            'productPrice' => 75000,
            'productImage' => 'images/barang/pouch1.png',
        ],
        [
            'productName' => 'Pouch Motif Kreatif Batik',
            'productPrice' => 85000,
            'productImage' => 'images/barang/pouch2.png',
        ],
    ];

    public $quantities = [];
    public $selected = [];


    // Menyimpan jumlah untuk per produk
    public function mount()
    {
        foreach ($this->products as $index => $product) {
            $this->quantities[$index] = 1;
            $this->selected[$index] = false; // Default produk tidak dipilih
        }
    }

    // Menghitung harga total per produk
    public function getTotalPrice($index)
    {
        $quantity = $this->quantities[$index] ?? 1;
        $productPrice = $this->products[$index]['productPrice'];
        return $quantity * $productPrice;
    }

    // Mengurangi jumlah produk
    public function increaseQuantity($index)
    {
        $this->quantities[$index]++;
    }

    // Menambah jumlah produk
    public function decreaseQuantity($index)
    {
        if ($this->quantities[$index] > 1) {
            $this->quantities[$index]--;
        }
    }

    // Menceklist produk
    public function toggleSelection($index)
    {
        $this->selected[$index] = !$this->selected[$index];
    }

    // Menghitung jumlah produk yang diceklist
    public function getSelectedProductCount()
    {
        return collect($this->selected)->filter(fn($isSelected) => $isSelected)->count();
    }

    // Menghitung harga total produk yang diceklist
    public function getTotalSelectedPrice()
    {
        $total = 0;
        foreach ($this->products as $index => $product) {
            if ($this->selected[$index]) {
                $total += $this->getTotalPrice($index);
            }
        }
        return $total;
    }

    // Koneksi ke view product-cart.blade.php
    public function render()
    {
        return view('livewire.product-cart', [
            'products' => $this->products,
            'totalPrice' => $this->getTotalSelectedPrice(),
        ]);
    }
}