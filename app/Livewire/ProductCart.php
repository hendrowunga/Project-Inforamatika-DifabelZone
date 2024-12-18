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

    public $quantities = [];  // Jumlah produk
    public $selected = [];    // Status checkbox produk
    public $selectAll = false; // Status "Pilih Semua"

    // Inisialisasi data
    public function mount()
    {
        foreach ($this->products as $index => $product) {
            $this->quantities[$index] = 1;
            $this->selected[$index] = false;
        }
    }

    /**
     * Toggle checkbox produk individu.
     * Jika semua produk dicentang, "Pilih Semua" akan aktif.
     */
    public function toggleSelection($index)
    {
        // Toggle checkbox individu
        $this->selected[$index] = !$this->selected[$index];

        // Perbarui status "Pilih Semua"
        $this->selectAll = collect($this->selected)->every(fn($isSelected) => $isSelected);
    }

    /**
     * Toggle "Pilih Semua".
     * Semua checkbox produk akan mengikuti status "Pilih Semua".
     */
    public function toggleSelectAll()
    {
        $this->selectAll = !$this->selectAll;

        // Atur semua checkbox sesuai status "Pilih Semua"
        foreach ($this->products as $index => $product) {
            $this->selected[$index] = $this->selectAll;
        }
    }

    /**
     * Menghitung total produk yang diceklis.
     */
    public function getSelectedProductCount()
    {
        return collect($this->selected)->filter()->count();
    }

    /**
     * Menghitung total harga produk yang diceklis.
     */
    public function getTotalSelectedPrice()
    {
        $total = 0;

        foreach ($this->products as $index => $product) {
            if ($this->selected[$index]) {
                $total += $product['productPrice'] * $this->quantities[$index];
            }
        }

        return $total;
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

    public function render()
    {
        return view('livewire.product-cart', [
            'products' => $this->products,
            'totalPrice' => $this->getTotalSelectedPrice(),
        ]);
    }
}
