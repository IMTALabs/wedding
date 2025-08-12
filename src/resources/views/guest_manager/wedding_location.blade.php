@extends('layout.' . $layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ $title }}
        </h2>
    </div>

    <livewire:wedding-location />
@endsection