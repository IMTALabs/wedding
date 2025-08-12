@extends('layout.' . $layout)

@section('content')
    <div class="mt-5 grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3">
            Chào mừng quay trở lại, {{ Auth::user()->name }}!
        </div>
    </div>
@endsection