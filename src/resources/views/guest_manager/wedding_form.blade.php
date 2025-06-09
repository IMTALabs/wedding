@extends('layout.' . $layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cô dâu & chú rể
        </h2>
    </div>
    <livewire:groom-form />
    <!-- END: Validation Form -->
    <!-- BEGIN: Success Notification Content -->
    <div id="success-notification-content" class="toastify-content hidden">
        <div class="flex">
            <i class="text-success" data-lucide="check-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">Cập nhật thành công!</div>
                <div class="text-slate-500 mt-1">Thông tin cô dâu và chú rể đã được lưu.</div>
            </div>
        </div>
    </div>
    <!-- END: Success Notification Content -->
    <!-- BEGIN: Failed Notification Content -->
    <div id="failed-notification-content" class="toastify-content hidden">
        <div class="flex">
            <i class="text-danger" data-lucide="x-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">Cập nhật thất bại!</div>
                <div class="text-slate-500 mt-1">Vui lòng kiểm tra lại thông tin.</div>
            </div>
        </div>
    </div>
    <!-- END: Failed Notification Content -->
@endsection

@push('scripts')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageExifOrientation);
        FilePond.registerPlugin(FilePondPluginFileValidateType);

        // const groomAvatarInput = document.querySelector('input[name="groom-avatar"]');
        // FilePond.create(groomAvatarInput,{
        //     storeAsFile: true,
        //     labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
        // });

        const brideAvatarInput = document.querySelector('input[name="bride-avatar"]');
        FilePond.create(brideAvatarInput, {
            storeAsFile: true,
            labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
        });

        document.addEventListener('livewire:load', () => {
            const groomAvatarInput = document.querySelector('input[name="groom-avatar"]');
            FilePond.create(groomAvatarInput,{
                storeAsFile: true,
                labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
            });

            FilePond.setOptions({
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort) => {
                        @this.upload('file', file, load, error, progress);
                    },
                    revert: (uniqueFileId, load) => {
                        @this.removeUpload('file', uniqueFileId, load);
                    },
                },
            });
        });

        // Listen for Livewire notifications
        document.addEventListener('livewire:init', function () {
            Livewire.on('show-success-notification', function() {
                Toastify({
                    node: $("#success-notification-content")
                        .clone()
                        .removeClass("hidden")[0],
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                }).showToast();
            });

            Livewire.on('show-error-notification', function() {
                Toastify({
                    node: $("#failed-notification-content")
                        .clone()
                        .removeClass("hidden")[0],
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                }).showToast();
            });
        });
    </script>
@endpush
