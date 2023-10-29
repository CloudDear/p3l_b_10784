@extends('layouts.dashboard')

@section('contents')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('season') }}" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p> Season</p>
                </a>
                <a href="{{ url('tarif') }}" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p> Tarif</p>
                </a>
                <a href="{{ url('layanan_kamar') }}" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p> Layanan Kamar</p>
                </a>
            </li>
        </ul>
    </nav>
@endsection
