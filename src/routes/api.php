<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//upload
Route::post('/upload/bridegroom/avatar', function (Request $request) {
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/avatars', $filename, 'public'); // Lưu trữ trong thư mục storage/app/public/uploads/avatars

        // Trả về đường dẫn hoặc thông tin khác nếu cần
        return response()->json(['path' => Storage::url($path)]);
    }

    return response()->json(['error' => 'Không có tệp nào được tải lên.'], 400);
})->name('upload.bridegroom.avatar');
