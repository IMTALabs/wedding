@extends('layout.'.$layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ $title }}
        </h2>
    </div>

    <livewire:setting/>
@endsection
@push('scripts')
    <script>
        // Listen for Livewire events
        document.addEventListener('livewire:initialized', () => {
            // Show success notification
            Livewire.on('show-success-notification', () => {
                // You can add custom notification logic here if needed
            });

            // Show error notification
            Livewire.on('show-error-notification', () => {
                // You can add custom notification logic here if needed
            });
        });
    </script>
    @filepondScripts
@endpush
