@extends('layouts.admin_layout.html')

@section('html')

@section('link')
    @yield('link2')
@endsection

    @include('layouts.admin_layout.admin_header')
        @yield('nav')
    
    <div class="row  pt-2 no-gutters">
        @include('layouts.admin_layout.admin_sidebar')
        @yield('content')
    </div>

    
@endsection
@section('script')

@yield('script2');
@endsection