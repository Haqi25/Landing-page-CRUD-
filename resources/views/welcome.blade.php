@include('layouts.header')



<body class="bg-[#0C0B12] ">
    {{-- make navbar --}}
    @include('layouts.navbar')
    {{-- Hero section --}}

   @include('layouts.hero')

    {{-- Features section --}}

   @include('layouts.features')

    {{-- footer section --}}

   @include('layouts.footer')

    <script src="{{ asset('js/animasi.js') }}"></script>

</body>

</html>
