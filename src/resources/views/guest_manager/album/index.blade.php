@extends('layout.'.$layout)

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Album
        </h2>
    </div>


    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('guest_admin.album.create') }}" class="btn btn-primary shadow-md mr-2">Thêm mới ảnh</a>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center mt-2"><i data-lucide="layers" class="w-4 h-4 mr-2"></i> Album: Ảnh cưới
                        </div>
                        <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Ngày tạo: 15/10/2025
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal" href="#"> <i data-lucide="eye"
                                                                                              class="w-4 h-4 mr-1"></i>
                        Preview </a>
                    <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete </a>
                </div>
            </div>
        </div>
                <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
<!--        Modal Delete Confirmation         -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bạn có chắc chắn xóa?</div>
                            <div class="text-slate-500 mt-2">
                                Bạn có thực sự muốn xóa ảnh này không?
                                <br>
                                Hành động này sẽ không thể hoàn tác.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="button" class="btn btn-danger w-24">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--        Modal Show Image         -->
        <div id="show-image-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{asset('assets/enigma-template/dist/images/preview-11.jpg')}}">
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
