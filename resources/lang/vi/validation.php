<?php

return [
    'required' => ':attribute không được để trống.',
    'email' => ':attribute phải là địa chỉ email hợp lệ.',
    'confirmed' => ':attribute xác nhận không khớp.',
    'min' => [
        'string' => ':attribute phải ít nhất :min ký tự.',
    ],
    'max' => [
        'string' => ':attribute không được dài quá :max ký tự.',
    ],
    'unique' => ':attribute đã tồn tại.',

    'attributes' => [
        'name' => 'Tên',
        'email' => 'Email',
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Xác nhận mật khẩu',
    ],
];
