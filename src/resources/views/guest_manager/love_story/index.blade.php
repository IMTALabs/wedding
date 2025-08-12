@extends('layout.' . $layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ $title }}
        </h2>
    </div>

    <livewire:love-story />
@endsection

@push('scripts')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageExifOrientation);
        FilePond.registerPlugin(FilePondPluginFileValidateType);

        const imageInput = document.querySelector('input[name="image"]');
        FilePond.create(imageInput, {
            storeAsFile: true,
            labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
        });
    </script>
    @filepondScripts
@endpush