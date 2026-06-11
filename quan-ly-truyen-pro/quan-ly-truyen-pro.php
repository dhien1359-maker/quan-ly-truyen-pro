<?php
/**
 * Plugin Name: Hệ Thống Quản Lý Truyện Pro
 * Description: Đồ án xây dựng website bán truyện bằng PHP và WordPress.
 * Version: 2.0
 */

if (!defined('ABSPATH')) exit;

// Định nghĩa đường dẫn thư mục plugin
define('QLBH_PATH', plugin_dir_path(__FILE__));

// 1. Tự động khởi tạo Database khi kích hoạt plugin
require_once QLBH_PATH . 'includes/db-setup.php';
register_activation_hook(__FILE__, 'qlbh_install_database');

// 2. Khởi động Session cho giỏ hàng
add_action('init', function() {
    if (!session_id()) { session_start(); }
});

// 3. Nhúng các file xử lý logic
require_once QLBH_PATH . 'includes/admin-logic.php';
require_once QLBH_PATH . 'includes/frontend-logic.php';
require_once QLBH_PATH . 'includes/user-portal.php'; // Đã gộp vào phần require cho đồng bộ
require_once QLBH_PATH . 'includes/admin-users.php';  // File quản lý người dùng

// 4. ĐĂNG KÝ SHORTCODE
add_shortcode('shop_truyen', 'qlbh_render_shop');
add_shortcode('gio_hang', 'qlbh_render_cart');
// Thêm dòng này vào file plugin chính của bạn
include_once plugin_dir_path(__FILE__) . 'includes/user-portal.php';
// 5. ĐĂNG KÝ MENU ADMIN
// ĐĂNG KÝ MENU ADMIN TẬP TRUNG