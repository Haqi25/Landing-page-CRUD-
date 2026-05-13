
@include('layouts.header')
<body>
    <div class="min-h-screen bg-[#0C0B12] flex">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-[#16151D] border-r border-white/5 flex flex-col">
        <div class="p-8 text-2xl font-bold text-white tracking-widest">
            Kelola Produk<span class="text-[#38C0AB]">.</span>
        </div>
        
        <nav class="flex-1 px-4 space-y-2">
            <a href="#" class="flex items-center p-3 text-white bg-[#534581] rounded-xl font-bold transition">
                <i class="fas fa-th-large mr-3"></i> Dashboard
            </a>
            {{-- <a href="#" class="flex items-center p-3 text-[#B6B6B6] hover:bg-white/5 hover:text-white rounded-xl transition">
                <i class="fas fa-box mr-3"></i> Kelola Produk
            </a>
            <a href="#" class="flex items-center p-3 text-[#B6B6B6] hover:bg-white/5 hover:text-white rounded-xl transition">
                <i class="fas fa-users mr-3"></i> Customers
            </a> --}}
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <!-- Header -->
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-white uppercase tracking-tight">Kelola Produk</h1>
                <p class="text-[#B6B6B6]">Welcome back, Admin.</p>
            </div>
            
            <!-- Button Primary -->
            <a href="{{ route('dashboard.create') }}" class="bg-[#534581] hover:bg-[#43376b] text-white font-bold py-3 px-6 rounded-xl transition-all shadow-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Produk
            </a>
        </header>
        @if(session('success'))
        <div id="close-alert" class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4 mb-4" role="alert">
            <button id="closeButton" class="float-right text-green-600 hover:text-green-800 font-bold py-1 px-2 rounded" aria-label="Close">&times;</button>
            <p class="font-bold">
                Success
            </p>
            <p>
               {{ session('success')}}
            </p>
        </div>
        @endif
        
        <!-- Table Card (Glassmorphism) -->
        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-white font-bold uppercase text-sm">
                        <th class="p-5">No</th>
                        <th class="p-5">Gambar Produk</th>
                        <th class="p-5">Nama Produk</th>
                        <th class="p-5">Harga</th>
                        <th class="p-5">Deskripsi</th>
                        <th class="p-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-white/80">
                    <!-- Row 1 -->
                     @foreach($produks as $produk)
                    <tr class="border-b border-white/5 hover:bg-white/5 transition">
                       
                        <td class="p-5 font-bold">{{$loop->iteration}}</td>
                        <td class="p-5 font-bold">
                            <img src="{{ asset('storage/' . $produk->gambar) }}" width="60"
                                            class="img-fluid rounded-top" alt=""
                                            onerror="this.onerror=null;this.src='{{ $produk->gambar }}';">
                        </td>
                        <td class="p-5">{{$produk->nama_produk}}</td>
                        <td class="p-5">
                            Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>
                        <td class="p-5">
                            {{$produk->deskripsi}}
                        </td>
                        <td class="p-5 text-right space-x-2">
                            
                            <a href="{{route('dashboard.edit', $produk->id)}}" class="text-blue-400 hover:underline">edit</a>
                            <form action="{{ route('dashboard.destroy', $produk->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini ?')">Delete</button>
                            </form>
                        </td>
                      
                    </tr>
                      @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
   document.getElementById('closeButton').onclick = function() {
       document.getElementById('close-alert').remove(); 
   };
</script>
</body>
</html>
