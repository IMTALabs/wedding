@extends('layout.'.$layout)

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mới ảnh
        </h2>

    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box">
                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                            <livewire:create-gallery-photo/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">

            <div class="intro-y box px-2">

                <livewire:create-album/>
            </div>
        </div>
    </div>
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
