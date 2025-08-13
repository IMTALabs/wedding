<!-- Success/Error Notifications -->
@if (session('success'))
    <div class="alert alert-success-soft show flex items-center my-2" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24">
            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                <path d="m9 11l3 3L22 4" />
            </g>
        </svg>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger-soft show flex items-center my-2" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24">
            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 8v4m0 4h.01" />
            </g>
        </svg>
        {{ session('error') }}
    </div>
@endif