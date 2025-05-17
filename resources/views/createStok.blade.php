<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - Pempek Mak Nobel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Tambah Produk</h2>

        <form action="{{ route('stok.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-6">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Tambah Produk
            </button>
        </form>
    </div>

</body>
</html>
