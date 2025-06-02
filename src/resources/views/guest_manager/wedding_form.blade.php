@extends('layout.'.$layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cô dâu & chú rể
        </h2>
    </div>
    <form action="{{ route('guest_admin.groom_bride.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Input -->
                <div class="intro-y box">
                    <div
                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Thông tin chú rể
                        </h2>
                    </div>
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="input-form">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Tên chú rể
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, có ít nhất 5 ký tự</span>
                                </label>
                                <input id="validation-form-1"
                                       type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên chú rể"
                                       minlength="5"
                                       required>
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Ngày tháng năm sinh
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, không nhập ngày tương lai</span>
                                </label>
                                <div class="relative w-56 mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" class="datepicker form-control pl-12" data-single-mode="true">
                                </div>
                            </div>
                            <div class="input-form mt-6">
                                <label for="bridegroom_avatar"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Ảnh đại diện của chú rể
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, nên chọn ảnh tỉ lệ 1:1</span>
                                </label>
                                <input type="file" class="filepond" name="groom-avatar" data-max-files="1" data-accepted-file-types="image/*">
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Giới thiệu về chú rể
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, tối thiểu 50 ký tự</span>
                                </label>
                                <textarea id="validation-form-6" class="form-control" name="comment"
                                          placeholder="Giới thiệu về chú rể..." minlength="10" required></textarea>
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Thông tin phụ huynh
                                </label>
                                <div class="form-inline"><label for="horizontal-form-1" class="form-label sm:w-20">Tên
                                        bố</label> <input id="horizontal-form-1" type="text" class="form-control"
                                                          placeholder="Nguyễn Văn A"></div>
                                <div class="form-inline mt-4"><label for="horizontal-form-1" class="form-label sm:w-20">Tên
                                        mẹ</label> <input id="horizontal-form-1" type="text" class="form-control"
                                                          placeholder="Phạm Thị B"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Input -->
                <div class="intro-y box">
                    <div
                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Thông tin cô dâu
                        </h2>
                    </div>
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="input-form">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Tên cô dâu
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, có ít nhất 5 ký tự</span>
                                </label>
                                <input id="validation-form-1"
                                       type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên cô dâu"
                                       minlength="5"
                                       required>
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Ngày tháng năm sinh
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, không nhập ngày tương lai</span>
                                </label>
                                <div class="relative w-56 mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" class="datepicker form-control pl-12" data-single-mode="true">
                                </div>
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Ảnh đại diện của cô dâu
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, nên chọn ảnh tỉ lệ 1:1</span>
                                </label>
                                <input type="file" class="filepond" name="bride-avatar" data-max-files="1" data-accepted-file-types="image/*">
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Giới thiệu về cô dâu
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, tối thiểu 50 ký tự</span>
                                </label>
                                <textarea id="validation-form-6" class="form-control" name="comment"
                                          placeholder="Giới thiệu về cô dâu..." minlength="10" required></textarea>
                            </div>
                            <div class="input-form mt-6">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Thông tin phụ huynh
                                </label>
                                <div class="form-inline">
                                    <label for="horizontal-form-1" class="form-label sm:w-20">Tên bố</label>
                                    <input id="horizontal-form-1" type="text" class="form-control"
                                           placeholder="Nguyễn Văn A">
                                </div>
                                <div class="form-inline mt-4">
                                    <label for="horizontal-form-1" class="form-label sm:w-20">Tên mẹ</label>
                                    <input id="horizontal-form-1" type="text" class="form-control"
                                           placeholder="Phạm Thị B">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-6">
            <button class="btn btn-primary mr-2 mb-2"> <i data-lucide="save" class="w-4 h-4 mr-2"></i> Hoàn thành </button>
        </div>
    </form>
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




