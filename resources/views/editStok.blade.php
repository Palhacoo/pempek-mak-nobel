<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Pempek Mak Nobel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Edit Produk</h2>

        <form action="{{ route('stok.update', $stok->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ $stok->nama_produk }}" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-6">
                <label for="jumlah_stok" class="block text-sm font-medium text-gray-700">Jumlah Stok</label>
                <input type="number" id="" name="harga" value="{{ $stok->harga }}" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Update Produk
            </button>
        </form>
    </div>

</body>
</html>
