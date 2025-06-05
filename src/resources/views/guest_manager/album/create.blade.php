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
                            <div>
                                <label for="post-form-7" class="form-label">Album</label>
                                <select data-placeholder="Chọn album" class="tom-select w-full" id="post-form-7">
                                    <option value="1">Album 1</option>
                                    <option value="2">Album 2</option>
                                    <option value="3">Album 3</option>
                                    <option value="4">Album 4</option>
                                    <option value="5">Album 5</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Ảnh</label>
                                <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <!-- Khi lựa chọn album nào thì sẽ hiển thị các ảnh của album đó ở đây -->
                                    <div class="flex flex-wrap px-4">
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-5.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-9.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-15.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-6.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-6.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-6.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-6.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('assets/enigma-template/dist/images/preview-6.jpg')}}">
                                            <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                                                 class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nếu không có ảnh nào trong album -->
                                    @if(!isset($dataImage))
                                        <div class="flex flex-wrap p-5 justify-center">
                                            <p>Hiện album đang chưa có ảnh nào.</p>
                                        </div>
                                    @endif
                                    <div class="px-4">
                                        <input type="file" class="filepond" multiple name="image"
                                               data-allow-reorder="true" data-accepted-file-types="image/*"
                                               data-max-files="20">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary ">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">

            <div class="intro-y box px-2">
                <div class="flex items-center px-2 py-2 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Tạo mới tên album
                    </h2>
                </div>
                <div class="px-2 py-2">
                    <!-- Lưu thông tin form này vào bảng gallery_albums -->
                    <div class="text-slate-600 dark:text-slate-500 text-xs mt-3">
                        <div>
                            <label for="post-form-1" class="form-label">Tên album</label>
                            <input id="post-form-1" type="text"
                                   class="form-control w-full @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}"
                                   placeholder="Nhập tên album">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="post-form-2" class="form-label">Mô tả</label>
                            <textarea id="post-form-2"
                                      class="form-control w-full @error('description') is-invalid @enderror"
                                      rows="3"
                                      name="description"
                                      placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{--                        submit--}}
                        <div class="mt-3 flex justify-center">
                            <button type="submit" class="btn btn-primary ">Tạo mới</button>
                        </div>
                    </div>
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
    @endpush
