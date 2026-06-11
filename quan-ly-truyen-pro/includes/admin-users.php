<?php
// File: includes/admin-users.php

function qlbh_render_admin_users() {
    // 1. Kiểm tra quyền Admin
    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền truy cập trang này.');
    }

    // 2. XỬ LÝ CẬP NHẬT SỐ DƯ (Logic mới thêm)
    $thong_bao = '';
    if (isset($_POST['qlbh_save_balance'])) {
        // Kiểm tra Nonce để đảm bảo bảo mật (chống tấn công giả mạo)
        check_admin_referer('qlbh_user_balance_update', 'qlbh_security');

        $user_id = intval($_POST['user_id']);
        $new_amount = floatval($_POST['new_wallet_balance']);

        if ($user_id > 0) {
            // Cập nhật số dư vào User Meta
            update_user_meta($user_id, 'wallet_balance', $new_amount);
            $thong_bao = '<div class="updated notice is-dismissible"><p>✅ Đã cập nhật số dư cho thành viên ID #' . $user_id . ' thành <strong>' . number_format($new_amount) . 'đ</strong> thành công!</p></div>';
        }
    }

    // 3. Lấy danh sách tất cả người dùng
    $users = get_users();
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Quản lý Thành viên & Ví tiền</h1>
        <hr class="wp-header-end">
        
        <?php echo $thong_bao; ?>
        
        <table class="wp-list-table widefat fixed striped table-view-list" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Quyền hạn</th>
                    <th>Số dư hiện tại</th>
                    <th style="width: 250px;">Thao tác chỉnh sửa tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : 
                    // Lấy số dư ví (Dùng key wallet_balance đã thống nhất)
                    $balance = get_user_meta($user->ID, 'wallet_balance', true);
                    if ($balance === '') $balance = 0;
                    
                    // Phân biệt Admin và Khách hàng
                    $roles = $user->roles;
                    $role_name = in_array('administrator', $roles) ? '<span style="color:#0073aa; font-weight:bold;">Admin</span>' : 'Khách hàng';
                ?>
                <tr>
                    <td><?php echo esc_html($user->ID); ?></td>
                    <td><strong><?php echo esc_html($user->display_name); ?></strong></td>
                    <td><?php echo esc_html($user->user_email); ?></td>
                    <td><?php echo $role_name; ?></td>
                    <td style="color:#28a745; font-weight:bold; font-size: 15px;">
                        <?php echo number_format($balance); ?>đ
                    </td>
                    <td>
                        <form method="post" style="display:flex; align-items:center; gap:8px;">
                            <?php wp_nonce_field('qlbh_user_balance_update', 'qlbh_security'); ?>
                            <input type="hidden" name="user_id" value="<?php echo $user->ID; ?>">
                            
                            <input type="number" name="new_wallet_balance" value="<?php echo (int)$balance; ?>" 
                                   min="0" step="1000" 
                                   style="width: 130px; height: 30px; padding: 0 8px;">
                            
                            <button type="submit" name="qlbh_save_balance" class="button button-primary button-small">Lưu số dư</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}