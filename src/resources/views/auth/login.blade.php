@extends('layout.guest')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Đăng nhập') }}
    </h2>
    <div class="text-center">
        <a href="{{ route('login.google') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Đăng nhập bằng Google
        </a>
    </div>

@endsection
