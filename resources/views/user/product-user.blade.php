<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yuni Bag</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-50">

@livewire('header')

  <div class="container mx-auto py-12 px-4">
    <div class="flex flex-col lg:flex-row items-start bg-white shadow-lg rounded-lg overflow-hidden">
      <!-- Image Section -->
      <div class="lg:w-1/2">
  <img src="{{ asset('images\categories\1730892104_bag-batic.png')}}" 
       alt="Yuni Bag" 
       class="w-45 h-45  max-w-full h-auto object-cover">
</div>

      <!-- Product Details -->
      <div class="lg:w-1/2 p-8">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Yuni Bag</h1>
        <p class="text-3xl font-bold text-yellow-600 mb-4">Rp50.000</p>
        <div class="flex items-center mb-4">
          <!-- Ratings -->
          <div class="flex items-center text-yellow-500">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <span class="text-gray-700 ml-2">(4.6) 287 Reviews</span>
          </div>
        </div>
        <!-- Quantity Selector -->
        <div class="flex items-center mb-6">
          <span class="text-gray-500 mr-4">Quantity</span>
          <div class="flex items-center border rounded-lg">
            <button class="px-4 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 focus:outline-none">-</button>
            <input type="text" class="w-12 text-center border-l border-r bg-gray-50 py-2 focus:outline-none" value="1">
            <button class="px-4 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 focus:outline-none">+</button>
          </div>
        </div>
        <!-- Buttons -->
        <div class="flex space-x-4">
          <button class="bg-yellow-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-yellow-600 flex-1">Buy Now</button>
          <button class="bg-gray-100 text-gray-700 font-bold py-3 px-6 rounded-lg border hover:bg-gray-200 flex-1">Add to Cart</button>
        </div>
      </div>
    </div>
    <!-- Description Section -->
    <div class="mt-12 bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Description</h2>
      <p class="text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui consequat, sem commodo diam aliquet purus nunc metus velit. Ac turpis orci cursus posuere. Proin phasellus viverra nulla aliquam amet, sapien id. Malesuada gravida nullam sem sollicitudin vestibulum. Molestie rhoncus, at non pharetra tristique iaculis faucibus. Ligula tincidunt ultrices vel tempus eget. Fringilla eget lectus tempor dolor volutpat sed platea sit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui consequat, sem commodo diam aliquet purus nunc metus velit. Ac turpis orci cursus posuere. Proin phasellus viverra nulla aliquam amet, sapien id.</p>
    </div>
  </div>

@livewire('footer')

</body>
</html>
