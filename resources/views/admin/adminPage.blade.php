{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Seller Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-8 bg-gray-100 font-mono text-gray-900">
  <h1 class="text-2xl font-bold mb-4">Admin Seller Dashboard</h1>

  <div class="tabs w-max border-b p-1 bg-gray-300 rounded">
    <button onclick="showTab('orders')" class="px-4 py-1 text-center rounded" id="ordersTab">Pesanan</button>
    <button onclick="showTab('products')" class="px-4 py-1 text-center rounded" id="productsTab">Produk</button>
  </div>

  <!-- Orders Tab Content -->
  <div id="ordersContent" class="hidden">
    <h2 class="text-xl font-bold mb-4">Pesanan</h2>
    <table class="w-full table-auto mb-8 bg-white text-left">
      <thead class="bg-gray-200">
        <tr>
          <th class="p-2">ID</th>
          <th class="p-2">Produk</th>
          <th class="p-2">Pelanggan</th>
          <th class="p-2">Status</th>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody id="ordersTable">
      </tbody>
    </table>
  </div>

  <!-- Products Tab Content -->
  <div id="productsContent" class="hidden">
    <h2 class="text-xl font-bold mb-4">Produk</h2>
    <button onclick="openProductForm()" class="flex items-center mb-4 px-3 py-1 bg-black text-white rounded">
      Tambah Produk
    </button>
    <table class="w-full table-auto bg-white text-left">
      <thead class="bg-gray-200">
        <tr>
          <th class="p-2">ID</th>
          <th class="p-2">Nama</th>
          <th class="p-2">Harga</th>
          <th class="p-2">Stok</th>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody id="productsTable">
      </tbody>
    </table>
  </div>

  <!-- Product Form Modal -->
  <div id="productModal" class="fixed inset-0 items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white p-4 rounded-lg shadow-lg w-96 w-full max-w-md mx-auto">
      <h3 id="modalTitle" class="text-lg font-semibold mb-4">Tambah Produk</h3>
      <form id="productForm" onsubmit="submitProductForm(event)">
        <input type="hidden" id="productId">
        <div class="space-y-4">
          <div>
            <label for="productName" class="block">Nama Produk</label>
            <input id="productName" required class="w-full px-3 py-1 border rounded">
          </div>
          <div>
            <label for="productPrice" class="block">Harga</label>
            <input id="productPrice" type="number" required class="w-full px-3 py-1 border rounded">
          </div>
          <div>
            <label for="productStock" class="block">Stok</label>
            <input id="productStock" type="number" required class="w-full px-3 py-1 border rounded">
          </div>
        </div>
        <button type="submit" class="w-full mt-4 px-4 py-1 bg-black text-white rounded">Simpan Produk</button>
      </form>
      <button onclick="closeProductForm()" class="w-full mt-4 px-4 py-1 bg-gray-500 text-white rounded">Tutup</button>
    </div>
  </div>

  <script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let orders = [
      { id: 1, product: 'Laptop', customer: 'John Doe', status: 'Pending' },
      { id: 2, product: 'Smartphone', customer: 'Jane Smith', status: 'Confirmed' },
    ];

    let products = @json($products);

    document.addEventListener("DOMContentLoaded", function () {
      loadTables();
    });

    function showTab(tab) {
      document.getElementById('ordersContent').classList.toggle('hidden', tab !== 'orders');
      document.getElementById('productsContent').classList.toggle('hidden', tab !== 'products');
      document.getElementById('ordersTab').classList.toggle('bg-white', tab === 'orders');
      document.getElementById('productsTab').classList.toggle('bg-white', tab === 'products');
    }

    function loadTables() {
      const ordersTable = document.getElementById('ordersTable');
      ordersTable.innerHTML = '';
      orders.forEach(order => {
        ordersTable.innerHTML += `
          <tr class="border-b">
            <td class="p-2">${order.id}</td>
            <td class="p-2">${order.product}</td>
            <td class="p-2">${order.customer}</td>
            <td class="p-2">${order.status}</td>
            <td class="p-2 h-12 w-28">
              ${order.status === 'Pending' ? `<button onclick="confirmOrder(${order.id})" class="px-3 py-1 bg-black text-white rounded">Konfirmasi</button>` : ''}
            </td>
          </tr>
        `;
      });

      fetch('/admin/products/reload')
        .then(response => response.json())
        .then(data => {
          const productsTable = document.getElementById('productsTable');
          productsTable.innerHTML = ''; // Kosongkan tabel sebelum mengisi ulang

          data.products.forEach(product => {
            productsTable.innerHTML += `
          <tr class="border-b">
            <td class="p-2">${product.id}</td>
            <td class="p-2">${product.name}</td>
            <td class="p-2">Rp${product.price}</td>
            <td class="p-2">${product.stock}</td>
            <td class="p-2">
              <button onclick="editProduct(${product.id})" class="px-3 py-1 border rounded">Edit</button>
              <button onclick="deleteProduct(${product.id})" class="px-3 py-1 bg-red-500 text-white rounded">Hapus</button>
            </td>
          </tr>
        `;
          });
        })
        .catch(error => console.error('Error:', error));
    }


    function confirmOrder(id) {
      orders = orders.map(order => order.id === id ? { ...order, status: 'Confirmed' } : order);
      loadTables();
    }

    function openProductForm(product = {}) {
      document.getElementById('productId').value = product.id || '';
      document.getElementById('productName').value = product.name || '';
      document.getElementById('productPrice').value = product.price || '';
      document.getElementById('productStock').value = product.stock || '';
      document.getElementById('modalTitle').textContent = product.id ? 'Edit Produk' : 'Tambah Produk';
      document.getElementById('productModal').classList.remove('hidden');
    }


    function closeProductForm() {
      document.getElementById('productModal').classList.add('hidden');
    }

    function submitProductForm(event) {
      event.preventDefault();
      const id = document.getElementById('productId').value;
      const name = document.getElementById('productName').value;
      const price = parseFloat(document.getElementById('productPrice').value);
      const stock = parseInt(document.getElementById('productStock').value);

      const url = id ? `/admin/product/${id}` : '/admin/product';
      const method = id ? 'PUT' : 'POST';

      fetch(url, {
        method: method,
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ id, name, price, stock })
      })
        .then(response => response.json())
        .then(data => {
          closeProductForm();
          loadTables(); // reload table to reflect changes
        })
        .catch(error => console.error('Error:', error));
      closeProductForm();
      loadTables();
    }

    // function editProduct(id) {
    //   const product = products.find(p => p.id === id);
    //   openProductForm(product);
    // }
    function editProduct(id) {
      fetch(`/admin/product/${id}/edit`)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(product => {
          openProductForm(product);
        })
        .catch(error => console.error('Error:', error));
    }

    // Fungsi untuk menghapus produk
    function deleteProduct(id) {
      if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        fetch(`/admin/product/${id}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': csrfToken,
          }
        })
          .then(response => {
            if (response.ok) {
              loadTables(); // Memuat ulang tabel setelah menghapus produk
            } else {
              alert('Gagal menghapus produk.');
            }
          })
          .catch(error => console.error('Error:', error));
      }
      loadTables();
    }

    showTab('orders');
    loadTables();
  </script>
</body>

</html> --}}
