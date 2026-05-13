@include('layouts.header')

<body>

    {{-- pages/packages/create.blade.php --}}
    <div class="min-h-screen bg-[#0C0B12] p-8">
        <div class="max-w-3xl mx-auto">
            <!-- Breadcrumb / Kembali -->
            <div class="mb-8">
                <a href="{{ route('dashboard.index') }}"
                    class="text-[#B6B6B6] hover:text-white transition flex items-center font-bold">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                </a>
            </div>

            <!-- Card Form (Glassmorphism) -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[2rem] p-10 shadow-2xl">
                <h2 class="text-3xl font-bold text-white mb-2">Edit Produk</h2>
                @if ($errors->any())
                    <div role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Error
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                @endif

                <p class="text-[#B6B6B6] mb-10">Silahkan isi detail produk perjalanan baru di bawah ini.</p>

                <form action="{{ route('dashboard.update', $produk->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Produk -->
                    <div>
                        <label class="block text-white font-bold mb-2 ml-1">Nama Produk</label>
                        <input type="text" name="nama_produk" value="{{$produk->nama_produk}}" placeholder="Contoh: Pasta gigi "
                            class="w-full bg-[#16151D] border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-[#534581] focus:ring-1 focus:ring-[#534581] transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Harga -->
                        <div>
                            <label class="block text-white font-bold mb-2 ml-1">Harga (Rp)</label>
                            <input type="number" value="{{$produk->harga}}" name="harga" placeholder="25000000"
                                class="w-full bg-[#16151D] border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-[#534581] transition">
                        </div>

                        <!-- Upload Gambar -->
                        <div>
                            <label class="block text-white font-bold mb-2 ml-1">Gambar Produk</label>
                            <div class="relative">
                                
                                <input type="file" name="gambar" value="{{$produk->gambar}}" accept="image/*"
                                    class="w-full bg-[#16151D] border border-white/10 rounded-xl px-5 py-[13px] text-[#B6B6B6] file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#534581] file:text-white hover:file:bg-[#43376b] cursor-pointer">

                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-white font-bold mb-2 ml-1">Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="5" placeholder="Jelaskan detail Produk"
                        class="w-full bg-[#16151D] border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-[#534581] transition">{{$produk->deskripsi}}</textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6">
                        <button type="reset" class="text-[#B6B6B6] font-bold hover:text-white transition">
                            Reset
                        </button>
                        <button type="submit"
                            class="bg-[#534581] hover:bg-[#43376b] text-white font-bold py-4 px-10 rounded-2xl shadow-[0_0_20px_rgba(83,69,129,0.3)] transition-all transform hover:-translate-y-1">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
