@extends('layout.'.$layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cô dâu & chú rể
        </h2>
    </div>
    <livewire:groom-form />
    <!-- END: Validation Form -->
    <!-- BEGIN: Success Notification Content -->
    <div id="success-notification-content" class="toastify-content hidden flex" >
        <i class="text-success" data-lucide="check-circle"></i>
        <div class="ml-4 mr-4">
            <div class="font-medium">Registration success!</div>
            <div class="text-slate-500 mt-1"> Please check your e-mail for further info! </div>
        </div>
    </div>
    <!-- END: Success Notification Content -->
    <!-- BEGIN: Failed Notification Content -->
    <div id="failed-notification-content" class="toastify-content hidden flex" >
        <i class="text-danger" data-lucide="x-circle"></i>
        <div class="ml-4 mr-4">
            <div class="font-medium">Chưa hoàn thành!</div>
            <div class="text-slate-500 mt-1"> Vui lòng kiểm tra lại. </div>
        </div>
    </div>
    <!-- END: Failed Notification Content -->
@endsection

@push('scripts')
    <script>

        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageExifOrientation);
        FilePond.registerPlugin(FilePondPluginFileValidateType);

        const groomAvatarInput = document.querySelector('input[name="groom-avatar"]');
        FilePond.create(groomAvatarInput,{
            storeAsFile: true,
            labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
        });

        const brideAvatarInput = document.querySelector('input[name="bride-avatar"]');
        FilePond.create(brideAvatarInput, {
            storeAsFile: true,
            labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
        });
    </script>
@endpush




