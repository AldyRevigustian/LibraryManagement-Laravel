@extends('layouts.app')

@include('components.user')

@section('content')
    <style>
        .scrolling-wrapper {
            display: flex;
            overflow-x: scroll;
            gap: 1rem;
            margin-bottom: 1rem
        }

        .scrolling-wrapper .card {
            margin-bottom: 10px;

        }
    </style>
    <div class="col">
        @foreach ($kategoris as $kategori)
            <h4>{{ $kategori->nama }}</h4>
            <div class="scrolling-wrapper">
                @foreach ($kategori->bukus as $buku)
                    <div class="card shadow-sm item" style="min-width: 22rem; max-width: 22rem;">
                        <img src="{{ asset($buku->foto) }}" style="height: 200px;object-fit: cover;" alt="..."
                            class="card-img-top">
                        <div class="card-body" style="min-height: 130px; max-height: 200px;">
                            <span class="badge bg-primary">{{ $buku->kategori->nama }}</span>
                            <h4 style="font-size: 24px; font-weight: bold; margin-top: 10px">
                                {{ $buku->judul }}
                            </h4>
                            <p class="mb-0">
                                Pengarang : {{ $buku->pengarang }}
                            </p>
                            <p>
                                Penerbit : {{ $buku->penerbit->nama }}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
