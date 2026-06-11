<?php
// Đảm bảo file được bảo mật, không truy cập trực tiếp
if (!defined('ABSPATH')) exit;

function qlbh_install_database() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table_truyen = $wpdb->prefix . 'quan_ly_truyen';
    $table_don_hang = $wpdb->prefix . 'qlbh_don_hang';

    // --- BƯỚC 1: ÉP BUỘC CẬP NHẬT CỘT CHO BẢNG ĐÃ TỒN TẠI ---
    // dbDelta đôi khi không tự thêm cột mới nếu bảng đã có sẵn. 
    // Các lệnh này đảm bảo các cột quan trọng luôn hiện diện.
    $wpdb->query("ALTER TABLE $table_don_hang ADD COLUMN IF NOT EXISTS user_id bigint(20) NOT NULL AFTER id;");
    $wpdb->query("ALTER TABLE $table_don_hang ADD COLUMN IF NOT EXISTS trang_thai varchar(50) DEFAULT 'dang_giao' AFTER tong_tien;");

    // --- BƯỚC 2: ĐỊNH NGHĨA CẤU TRÚC BẢNG (Dùng cho dbDelta) ---
    // 1. Bảng quản lý truyện
    $sql1 = "CREATE TABLE $table_truyen (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        ten_truyen varchar(255) NOT NULL,
        gia_nhap decimal(10,2) NOT NULL DEFAULT 0,
        gia_ban decimal(10,2) NOT NULL DEFAULT 0,
        so_luong int(11) NOT NULL DEFAULT 0,
        hinh_anh varchar(255) DEFAULT '',
        the_loai varchar(100) DEFAULT 'Manga',
        mo_ta text DEFAULT '',
        PRIMARY KEY  (id)
    ) $charset_collate;";

    // 2. Bảng đơn hàng
    $sql2 = "CREATE TABLE $table_don_hang (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        thong_tin_khach text NOT NULL,
        tong_tien decimal(10,2) NOT NULL,
        trang_thai varchar(50) DEFAULT 'dang_giao',
        ngay_dat datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    // Gọi thư viện nâng cấp của WordPress
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql1);
    dbDelta($sql2);
}