@extends('layouts.user_layout.html')

@section('html')

@section('link')
    @yield('link2')
@endsection

    @include('layouts.user_layout.user_header')
        @yield('nav2')
    
    <div class="row  pt-2 no-gutters">
        @yield('content')
    </div>
    @include('layouts.user_layout.user_footer')

    
@endsection
@section('script')

@yield('script2');
@endsection

