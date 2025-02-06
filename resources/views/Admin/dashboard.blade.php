@extends('layouts.app')

@include('components.admin')

@section('content')
    <div class="col">
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-center">
                                            <div class="stats-icon blue mb-2">
                                                <i class="bi-book-fill"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Jumlah Buku</h6>
                                            <h6 class="font-extrabold mb-0">{{ count($bukus) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-center">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Jumlah Anggota
                                            </h6>
                                            <h6 class="font-extrabold mb-0">{{ count($anggotas) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-center">
                                            <div class="stats-icon red mb-2">
                                                <i class="bi-book-fill"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Stock Buku</h6>
                                            <h6 class="font-extrabold mb-0">{{ count($peminjamans) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-center">
                                            <div class="stats-icon green mb-2">
                                                <i class="bi-arrow-right"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Jumlah Peminjaman</h6>
                                            <h6 class="font-extrabold mb-0">{{ count($peminjamans) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <center style="margin-top: 100px">
    </center>
@endsection
