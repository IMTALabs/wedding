@extends('layout.'.$layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thông tin cơ bản
        </h2>
    </div>
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
                                Ngày thánh năm sinh
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
                                Ảnh đại diện của chú rể
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, nên chọn ảnh tỉ lệ 1:1</span>
                            </label>
                            <div data-single="true" action="/file-upload" class="dropzone">
                                <div class="fallback"> <input name="file" type="file" />    </div>
                                <div class="dz-message" data-dz-message>
                                    <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                    <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-form mt-6">
                            <label for="validation-form-1"
                                   class="form-label w-full flex flex-col sm:flex-row">
                                Giới thiệu về chú rể
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, tối thiểu 50 ký tự</span>
                            </label>
                            <textarea id="validation-form-6" class="form-control" name="comment" placeholder="Type your comments" minlength="10" required></textarea>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin chú rể
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="regular-form-1" class="form-label">Input Text</label>
                            <input id="regular-form-1" type="text" class="form-control" placeholder="Input text">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Rounded</label>
                            <input id="regular-form-2" type="text" class="form-control form-control-rounded"
                                   placeholder="Rounded">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">With Help</label>
                            <input id="regular-form-3" type="text" class="form-control" placeholder="With help">
                            <div class="form-help">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-4" class="form-label">Password</label>
                            <input id="regular-form-4" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-5" class="form-label">Disabled</label>
                            <input id="regular-form-5" type="text" class="form-control" placeholder="Disabled"
                                   disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
