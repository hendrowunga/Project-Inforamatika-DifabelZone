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

    // Inisialisasi data
    public function mount()
    {
        foreach ($this->products as $index => $product) {
            $this->quantities[$index] = 1;
            $this->selected[$index] = false;
        }
    }

    //Toggle checkbox produk individu.
    public function toggleSelection($index)
    {
        $this->selected[$index] = !$this->selected[$index];
    }
    
    //  * Menghitung total produk yang diceklis.
    public function getSelectedProductCount()
    {
        return collect($this->selected)->filter()->count();
    }

    //Menghitung total harga produk yang diceklis.
    public function getTotalSelectedPrice()
    {
        $total = 0;

        foreach ($this->products as $index => $product) {
            // Hanya hitung produk yang tercentang
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

    protected $listeners = ['refreshComponent'];


    // fungsi ini, hanya untuk memicu render ulang
    public function refreshComponent()
    {
        $this->emit('refreshTotalPrice');
    }


    public function render()
    {
        // Perbarui total harga jika ada perubahan pada produk yang terpilih
        return view('livewire.product-cart', [
            'products' => $this->products,
            'totalPrice' => $this->getTotalSelectedPrice(),
        ]);
    }

}
