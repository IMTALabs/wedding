@extends('layout.'.$layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ $title }}
        </h2>
    </div>
    <form action="{{ route('guest_admin.groom_bride.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box">
                    <div id="input" class="p-5">
                        <div class="preview grid grid-cols-12 gap-6">
                            <div class="input-form col-span-12 lg:col-span-12">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Banner
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, là ảnh</span>
                                </label>
                                <input type="file" class="filepond" name="banner" data-max-files="1"
                                       data-accepted-file-types="image/*">

                            </div>
                            <div class="input-form col-span-12 lg:col-span-6 mt-4">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Đếm ngược ngày cưới
                                </label>
                                <div class="relative w-56 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" class="datepicker form-control pl-12" data-single-mode="true">
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-6 mt-4">
                            </div>
                            <div class="input-form col-span-12 lg:col-span-6 mt-4">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Đường dẫn trang web
                                </label>
                                <div class="input-group"><input type="text" class="form-control" placeholder="tienvan"
                                                                aria-describedby="subdomain">
                                    <div id="subdomain" class="input-group-text">.weddingonline.com</div>
                                </div>
                            </div>

                            <div class="input-form col-span-12 lg:col-span-6 mt-4">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Template
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="Select your favorite actors"
                                                          class="tom-select w-full">
                                        <option value="1">Leonardo DiCaprio</option>
                                        <option value="2">Johnny Deep</option>
                                        <option value="3">Robert Downey, Jr</option>
                                        <option value="4">Samuel L. Jackson</option>
                                        <option value="5">Morgan Freeman</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-12 mt-4">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Nhạc nền
                                </label>
                                <div class="grid grid-cols-12 gap-6 items-center">
                                    <div class="col-span-12 lg:col-span-3">
                                        <select data-placeholder="Select your favorite actors"
                                                class="tom-select w-full">
                                            <option value="1">Con đường tình yêu</option>
                                            <option value="2">Cơn mưa ngang qua</option>
                                            <option value="3">Thuyền quyên</option>
                                            <option value="4">Ánh nắng của anh</option>
                                            <option value="5">Marri me</option>
                                        </select>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <audio controls class="w-full h-1.5">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-12 mt-4">
                                <label for="validation-form-1"
                                       class="form-label w-full flex flex-col sm:flex-row">
                                    Animation icon rơi
                                </label>
                                <div class="grid grid-cols-12 gap-6 items-center">
                                    <div class="col-span-12 lg:col-span-3">
                                        <select data-placeholder="Select your favorite actors"
                                                class="tom-select w-full">
                                            <option value="1">Trái tim</option>
                                            <option value="2">Cánh hoa</option>
                                            <option value="3">Bông tuyết</option>
                                        </select>
                                    </div>
                                    <div class="col-span-3 lg:col-span-2">
                                        <div class="input-group"><input type="number" class="form-control" placeholder="15"
                                                                        aria-describedby="pxheight">
                                            <div id="pxheight" class="input-group-text">px(height)</div>
                                        </div>
                                    </div>
                                    <div class="col-span-3 lg:col-span-2">
                                        <div class="input-group"><input type="number" class="form-control" placeholder="15"
                                                                        aria-describedby="pxwidth">
                                            <div id="pxwidth" class="input-group-text">px(width)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-12 mt-4">
                                <label>Ẩn/hiện cơ bản</label>
                                <div class="form-check mt-2"> <input id="checkbox-switch-1" class="form-check-input" type="checkbox" value=""> <label class="form-check-label" for="checkbox-switch-1">Hiển thị tên và lời chúc</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-2" class="form-check-input" type="checkbox" value=""> <label class="form-check-label" for="checkbox-switch-2">Hiển thị hộp mừng cưới</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value=""> <label class="form-check-label" for="checkbox-switch-3">Phát nhạc nền</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value=""> <label class="form-check-label" for="checkbox-switch-3">Animation động icon rơi</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value=""> <label class="form-check-label" for="checkbox-switch-3">Hiển thị tên phụ huynh</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value=""> <label class="form-check-label" for="checkbox-switch-3">Hiển thị tên phụ huynh</label> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>

        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageExifOrientation);
        FilePond.registerPlugin(FilePondPluginFileValidateType);

        const bannerInput = document.querySelector('input[name="banner"]');
        FilePond.create(bannerInput, {
            storeAsFile: true,
            labelIdle: `Kéo và thả file của bạn hoặc <span class="filepond--label-action">Từ thư mục</span>`,
        });
    </script>
@endpush
