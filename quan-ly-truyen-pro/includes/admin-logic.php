<?php
// File: includes/admin-logic.php

// 1. ĐĂNG KÝ MENU ADMIN (Cấu trúc lại cho gọn)
// CHỈ GIỮ LẠI DUY NHẤT ĐOẠN NÀY ĐỂ QUẢN LÝ MENU
// Load script cần thiết cho Media Uploader
add_action('admin_enqueue_scripts', function($hook) {
    // Chỉ load trên trang của plugin
        wp_enqueue_media(); // Bắt buộc phải có dòng này
        wp_enqueue_script('jquery');
    
});
add_action('admin_menu', function() {
    
    $parent_slug = 'h-shop-pro-settings'; // Đặt một slug duy nhất và mới để tránh xung đột

    // 1. Tạo Menu chính (Cái hiện ở thanh sidebar)
    add_menu_page(
        'H Shop Pro',           // Tiêu đề trang
        'H Shop Pro',           // Tên hiển thị menu
        'manage_options',       // Quyền truy cập
        $parent_slug,           // Slug cha
        'qlbh_admin_page',      // Hàm hiển thị mặc định (Quản lý kho)
        'dashicons-book',       // Icon
        6                       // Vị trí hiển thị
    );

    // 2. Menu con 1: Quản Lý Kho (Ghi đè mục mặc định để không bị lặp tên H Shop Pro)
    add_submenu_page(
        $parent_slug,
        'Quản Lý Kho', 
        'Quản Lý Kho', 
        'manage_options', 
        $parent_slug,           // Trùng với slug cha để ghi đè
        'qlbh_admin_page'
    );

    // 3. Menu con 2: Đơn Hàng
    add_submenu_page(
        $parent_slug,
        'Danh sách đơn hàng', 
        'Đơn Hàng', 
        'manage_options', 
        'qlbh-don-hang',        // Slug riêng cho đơn hàng
        'qlbh_render_admin_orders'
    );

    // 4. Menu con 3: Người dùng
    add_submenu_page(
        $parent_slug,
        'Quản lý người dùng', 
        'Người dùng', 
        'manage_options', 
        'qlbh-users',
        'qlbh_render_admin_users'
    );

    // 5. Menu con 4: Cài đặt liên kết trang
    add_submenu_page(
        $parent_slug,
        'Cài đặt liên kết trang',
        '⚙️ Cài đặt',
        'manage_options',
        'qlbh-settings',
        'qlbh_render_admin_settings'
    );
});

// TRANG CÀI ĐẶT SLUG
function qlbh_render_admin_settings() {
    if (isset($_POST['qlbh_save_slugs'])) {
        update_option('qlbh_slug_shop_truyen',  sanitize_text_field($_POST['slug_shop']));
        update_option('qlbh_slug_gio_hang',     sanitize_text_field($_POST['slug_cart']));
        update_option('qlbh_slug_my_orders',    sanitize_text_field($_POST['slug_orders']));
        update_option('qlbh_slug_my_account',   sanitize_text_field($_POST['slug_account']));
        echo '<div class="notice notice-success"><p>✅ Đã lưu cài đặt!</p></div>';
    }
    $s1 = get_option('qlbh_slug_shop_truyen',  'shop-truyen');
    $s2 = get_option('qlbh_slug_gio_hang',     'gio-hang');
    $s3 = get_option('qlbh_slug_my_orders',    'lich-su-don-hang');
    $s4 = get_option('qlbh_slug_my_account',   'my-account');
    ?>
    <div class="wrap">
        <h1>⚙️ Cài đặt liên kết trang — H Shop Pro</h1>
        <p style="color:#555;max-width:600px;">Plugin tự động tìm trang theo shortcode. Nếu không tìm được, sẽ dùng slug bên dưới làm dự phòng. <strong>Slug là phần sau dấu / trong URL trang</strong>, ví dụ: <code>shop-truyen</code>.</p>

        <form method="post" style="max-width:520px;background:#fff;padding:24px;border-radius:10px;border:1px solid #e5e7eb;margin-top:16px;">
            <?php wp_nonce_field('qlbh_settings'); ?>
            <table class="form-table">
                <tr>
                    <th style="width:200px;">Trang Shop <code>[shop_truyen]</code></th>
                    <td><input type="text" name="slug_shop" value="<?php echo esc_attr($s1); ?>" class="regular-text" placeholder="shop-truyen"></td>
                </tr>
                <tr>
                    <th>Trang Giỏ hàng <code>[gio_hang]</code></th>
                    <td><input type="text" name="slug_cart" value="<?php echo esc_attr($s2); ?>" class="regular-text" placeholder="gio-hang"></td>
                </tr>
                <tr>
                    <th>Lịch sử đơn hàng <code>[my_orders]</code></th>
                    <td><input type="text" name="slug_orders" value="<?php echo esc_attr($s3); ?>" class="regular-text" placeholder="lich-su-don-hang"></td>
                </tr>
                <tr>
                    <th>Tài khoản <code>[my_account]</code></th>
                    <td><input type="text" name="slug_account" value="<?php echo esc_attr($s4); ?>" class="regular-text" placeholder="my-account"></td>
                </tr>
            </table>
            <p class="submit"><input type="submit" name="qlbh_save_slugs" class="button button-primary" value="💾 Lưu cài đặt"></p>
        </form>

        <div style="margin-top:24px;background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:16px;max-width:520px;">
            <strong>💡 Hướng dẫn nhanh:</strong><br>
            Nếu link vẫn ra trang 404, vào <strong>WordPress Admin → Pages</strong>,<br>
            mở từng trang và kiểm tra <strong>Permalink slug</strong> khớp với ô bên trên.
        </div>
    </div>
    <?php
}

// 2. HÀM QUẢN LÝ KHO (Sửa bảo mật Nonce)
function qlbh_admin_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'quan_ly_truyen';

    // Xử lý Xóa sản phẩm
    if (isset($_GET['del'])) {
        $wpdb->delete($table, ['id' => absint($_GET['del'])]);
        echo "<div class='updated'><p>🗑️ Đã xóa sản phẩm thành công.</p></div>";
    }

    // Xử lý Lưu sản phẩm
    if (isset($_POST['save_item'])) {
        $data = [
            'ten_truyen' => sanitize_text_field($_POST['ten'] ?? ''),
            'the_loai'   => sanitize_text_field($_POST['the_loai'] ?? 'Manga'), 
            'mo_ta'      => wp_kses_post($_POST['mo_ta'] ?? ''),
            'gia_nhap'   => floatval($_POST['g_nhap'] ?? 0),
            'gia_ban'    => floatval($_POST['g_ban'] ?? 0),
            'so_luong'   => intval($_POST['qty'] ?? 0),
            'hinh_anh'   => esc_url_raw($_POST['img'] ?? '')
        ];
        
        if (!empty($_POST['item_id'])) {
            $wpdb->update($table, $data, ['id' => absint($_POST['item_id'])]);
        } else {
            $wpdb->insert($table, $data);
        }
        echo "<div class='updated'><p>💾 Đã lưu thay đổi kho hàng.</p></div>";
    }

    $items = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC");
    
    // Kiểm tra xem file template có tồn tại không trước khi include
    if (file_exists(QLBH_PATH . 'includes/admin-ui-template.php')) {
        include QLBH_PATH . 'includes/admin-ui-template.php';
    } else {
        echo "Lỗi: Không tìm thấy file admin-ui-template.php";
    }
}

// 3. HÀM QUẢN LÝ ĐƠN HÀNG (Tích hợp Tìm kiếm & Hiển thị thông minh)
function qlbh_render_admin_orders() {
    global $wpdb;
    $table_don_hang = $wpdb->prefix . 'qlbh_don_hang';

    // Xử lý cập nhật trạng thái đơn hàng
    if (isset($_POST['update_status'])) {
        $order_id = intval($_POST['order_id']);
        $new_status = sanitize_text_field($_POST['status']);
        $wpdb->update($table_don_hang, ['trang_thai' => $new_status], ['id' => $order_id]);
        echo "<div class='updated'><p>✅ Cập nhật đơn #$order_id thành công!</p></div>";
    }

    // --- LOGIC TÌM KIẾM ---
    $s_order_id = isset($_GET['s_order_id']) ? intval($_GET['s_order_id']) : '';
    $s_user_id  = isset($_GET['s_user_id']) ? intval($_GET['s_user_id']) : '';

    $query = "SELECT * FROM $table_don_hang WHERE 1=1";
    $params = array();

    if ($s_order_id) {
        $query .= " AND id = %d";
        $params[] = $s_order_id;
    }
    if ($s_user_id) {
        $query .= " AND user_id = %d";
        $params[] = $s_user_id;
    }

    $query .= " ORDER BY ngay_dat DESC";
    
    if (!empty($params)) {
        $orders = $wpdb->get_results($wpdb->prepare($query, $params));
    } else {
        $orders = $wpdb->get_results($query);
    }

    ?>
    <div class="wrap">
        <h1>📦 Quản lý đơn hàng hệ thống</h1>

        <div style="background: #fff; padding: 15px; border: 1px solid #ccd0d4; border-radius: 4px; margin: 20px 0;">
            <form method="get" style="display: flex; gap: 15px; align-items: flex-end;">
                <input type="hidden" name="page" value="qlbh-don-hang">
                
                <div>
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">Mã đơn hàng:</label>
                    <input type="number" name="s_order_id" value="<?php echo $s_order_id; ?>" placeholder="VD: 10">
                </div>

                <div>
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">ID Khách hàng:</label>
                    <input type="number" name="s_user_id" value="<?php echo $s_user_id; ?>" placeholder="VD: 2">
                </div>

                <button type="submit" class="button button-primary">Lọc đơn hàng</button>
                <a href="admin.php?page=qlbh-don-hang" class="button">Làm mới</a>
            </form>
        </div>

        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th style="width:70px;">Mã Đơn</th>
                    <th>Khách hàng</th>
                    <th>Nội dung đơn</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orders) : foreach ($orders as $o) : 
                    // Xử lý khách hàng
                    $customer = 'Khách vãng lai';
                    if ($o->user_id > 0) {
                        $udata = get_userdata($o->user_id);
                        $customer = $udata ? "<strong>{$udata->display_name}</strong><br><small>ID: {$o->user_id}</small>" : "User #{$o->user_id} (Đã xóa)";
                    }

                    // Màu sắc trạng thái
                    $colors = ['dang_giao' => '#ffc107', 'da_giao' => '#28a745', 'huy' => '#dc3545'];
                    $color = $colors[$o->trang_thai] ?? '#666';
                ?>
                <tr>
                    <td><b>#<?php echo $o->id; ?></b></td>
                    <td><?php echo $customer; ?></td>
                    <td><small><?php echo esc_html($o->thong_tin_khach); ?></small></td>
                    <td><b style="color:#e44d26;"><?php echo number_format($o->tong_tien); ?>đ</b></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($o->ngay_dat)); ?></td>
                    <td><span style="background:<?php echo $color; ?>; color:#fff; padding:3px 8px; border-radius:10px; font-size:11px;"><?php echo $o->trang_thai; ?></span></td>
                    <td>
                        <form method="post" style="display:flex; gap:5px;">
                            <input type="hidden" name="order_id" value="<?php echo $o->id; ?>">
                            <select name="status" style="height:28px; font-size:12px; width:100px;">
                                <option value="dang_giao" <?php selected($o->trang_thai, 'dang_giao'); ?>>Đang giao</option>
                                <option value="da_giao" <?php selected($o->trang_thai, 'da_giao'); ?>>Đã giao</option>
                                <option value="huy" <?php selected($o->trang_thai, 'huy'); ?>>Hủy đơn</option>
                            </select>
                            <button type="submit" name="update_status" class="button button-small">Lưu</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; else : ?>
                <tr><td colspan="7" align="center">Không tìm thấy đơn hàng nào.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}