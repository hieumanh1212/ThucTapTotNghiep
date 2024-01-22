<?php 
    return [
        [
            'lableId' => 1,
            'Lable' => 'Quản lý hóa đơn',
            'Icon' => 'bi-clipboard-data',
            'Items' =>[
                [
                    'Lable' => 'Hóa đơn nhập',
                    'Route' => 'Admin.HoaDonNhap.index',
                ],

                [
                    'Lable' => 'Hóa đơn Bán',
                    'Route' => 'Admin.HoaDonBan.index',
                ]
            ]
        ],

        [
            'lableId' => 2,
            'Lable' => 'Quản lý sản phẩm',
            'Icon' => 'bi-cart-fill',
            'Items' =>[
                [
                    'Lable' => 'Sản phẩm',
                    'Route' => 'Admin.SanPham.index',
                ],

                [
                    'Lable' => 'Thế loại',
                    'Route' => 'Admin.TheLoai.index',
                ],

                [
                    'Lable' => 'Size',
                    'Route' => 'Admin.Size.index',
                ],

                [
                    'Lable' => 'Màu sắc',
                    'Route' => 'Admin.MauSac.index',
                ]

            ]
        ],

        [
            'lableId' => 3,
            'Lable' => 'Quản lý nhân viên',
            'Icon' => 'bi-people-fill',
            'Items' =>[
                [
                    'Lable' => 'Nhân viên',
                    'Route' => 'Admin.NhanVien.index',
                ],

                [
                    'Lable' => 'Chức vụ',
                    'Route' => 'Admin.ChucVu.index',
                ]
            ]
        ],


        [
            'Lable' => 'Nhà cung cấp',
            'Route' => 'Admin.NhaCungCap.index',
            'Icon' => 'bi-cart-plus-fill'
        ],


        [
            'Lable' => 'Khách hàng',
            'Route' => 'Admin.KhachHang.index',
            'Icon' => 'bi-person-plus-fill'
        ],

        [
            'Lable' => 'Tin tức',
            'Route' => 'Admin.TinTuc.index',
            'Icon' => 'bi-file-richtext-fill'
        ],

        [
            'Lable' => 'FeedBack',
            'Route' => 'Admin.Feedback.index',
            'Icon' => 'bi-chat-right-dots-fill'
        ],

        [
            'Lable' => 'Voucher',
            'Route' => 'Admin.Voucher.index',
            'Icon' => 'bi-square-fill'
        ],
    
    ];

?>