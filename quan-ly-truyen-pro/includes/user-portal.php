<?php
// =============================================
// HÀM TIỆN ÍCH: TỰ ĐỘNG TÌM URL TRANG THEO SHORTCODE
// =============================================
function qlbh_get_page_url($shortcode, $fallback_slug = '') {
    global $wpdb;
    $page = $wpdb->get_row($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts}
         WHERE post_status = 'publish'
         AND post_type = 'page'
         AND post_content LIKE %s
         LIMIT 1",
        '%[' . $shortcode . '%'
    ));
    if ($page) return get_permalink($page->ID);
    return home_url('/' . trim(get_option('qlbh_slug_' . $shortcode, $fallback_slug), '/'));
}

// =============================================
// SHORTCODE [my_account] - TRANG TÀI KHOẢN
// =============================================
add_shortcode('my_account', function() {

    // Chưa đăng nhập -> hiện form login đẹp
    if (!is_user_logged_in()) {
        $login_form = wp_login_form(['echo' => false]);
        return '<div class="qlbh-wrap">
            <div class="qlbh-login-box">
                <h3>🔑 Đăng nhập tài khoản</h3>
                ' . $login_form . '
            </div>
        </div>';
    }

    $user       = wp_get_current_user();
    $meta_key   = 'wallet_balance';
    $balance    = get_user_meta($user->ID, $meta_key, true);
    if ($balance === '') { $balance = 0; update_user_meta($user->ID, $meta_key, 0); }

    // Xử lý nạp tiền
    $thong_bao = '';
    if (isset($_POST['nap_tien_submit'], $_POST['so_tien_nap'])) {
        $so_tien = floatval($_POST['so_tien_nap']);
        if ($so_tien >= 10000) {
            $balance += $so_tien;
            update_user_meta($user->ID, $meta_key, $balance);
            $thong_bao = '<div class="qlbh-alert qlbh-alert-success">✅ Đã nạp thành công <strong>' . number_format($so_tien) . 'đ</strong>!</div>';
        } else {
            $thong_bao = '<div class="qlbh-alert qlbh-alert-danger">❌ Số tiền nạp phải từ 10,000đ trở lên!</div>';
        }
    }

    $logout_url = wp_logout_url(home_url());

    ob_start(); ?>
    <div class="qlbh-wrap">
        <?php echo $thong_bao; ?>
        <div class="qlbh-account-card">
            <!-- Header gradient với avatar & tên -->
            <div class="qlbh-account-header">
                <div class="qlbh-account-header-left">
                    <?php echo get_avatar($user->ID, 72); ?>
                    <div>
                        <p class="qlbh-account-name">Xin chào, <?php echo esc_html($user->display_name); ?>!</p>
                        <p class="qlbh-account-email">📧 <?php echo esc_html($user->user_email); ?></p>
                    </div>
                </div>
                <a href="<?php echo esc_url($logout_url); ?>" class="qlbh-btn-logout">🚪 Đăng xuất</a>
            </div>

            <!-- Body: Ví tiền -->
            <div class="qlbh-account-body">
                <div class="qlbh-wallet-box">
                    <p class="qlbh-wallet-label">💰 Số dư ví hiện tại</p>
                    <div class="qlbh-wallet-amount"><?php echo number_format($balance); ?>đ</div>

                    <form method="post" class="qlbh-topup-form">
                        <input
                            type="number"
                            name="so_tien_nap"
                            min="10000"
                            step="10000"
                            placeholder="Nhập số tiền (VD: 50000)"
                            required
                        >
                        <button type="submit" name="nap_tien_submit" class="qlbh-btn-topup">+ Nạp tiền</button>
                    </form>
                </div>

                <!-- Shortcut links -->
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <a href="<?php echo qlbh_get_page_url('shop_truyen', 'shop-truyen'); ?>"
                       style="flex:1; min-width:140px; text-align:center; padding:14px; background:var(--primary-light); color:var(--primary); border-radius:var(--radius-sm); text-decoration:none; font-weight:700; font-size:14px; border:1.5px solid #d8c5f7; transition:background 0.2s;"
                       onmouseover="this.style.background='#e0d4f7'" onmouseout="this.style.background='var(--primary-light)'">
                        📚 Cửa hàng truyện
                    </a>
                    <a href="<?php echo qlbh_get_page_url('gio_hang', 'gio-hang'); ?>"
                       style="flex:1; min-width:140px; text-align:center; padding:14px; background:#f0fdf4; color:#16a34a; border-radius:var(--radius-sm); text-decoration:none; font-weight:700; font-size:14px; border:1.5px solid #bbf7d0; transition:background 0.2s;"
                       onmouseover="this.style.background='#dcfce7'" onmouseout="this.style.background='#f0fdf4'">
                        🛒 Giỏ hàng
                    </a>
                    <a href="<?php echo qlbh_get_page_url('my_orders', 'lich-su-don-hang'); ?>"
                       style="flex:1; min-width:140px; text-align:center; padding:14px; background:#fff7ed; color:#c2410c; border-radius:var(--radius-sm); text-decoration:none; font-weight:700; font-size:14px; border:1.5px solid #fed7aa; transition:background 0.2s;"
                       onmouseover="this.style.background='#ffedd5'" onmouseout="this.style.background='#fff7ed'">
                        📋 Lịch sử đơn hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php return ob_get_clean();
});


// =============================================
// SHORTCODE [my_orders] - LỊCH SỬ ĐƠN HÀNG
// =============================================
add_shortcode('my_orders', function() {
    if (!is_user_logged_in()) {
        return '<div class="qlbh-wrap"><div class="qlbh-alert qlbh-alert-danger">Vui lòng <a href="' . wp_login_url(get_permalink()) . '">đăng nhập</a> để xem đơn hàng.</div></div>';
    }

    global $wpdb;
    $user_id    = get_current_user_id();
    $table_name = $wpdb->prefix . 'qlbh_don_hang';

    $orders = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $table_name WHERE user_id = %d ORDER BY ngay_dat DESC",
        $user_id
    ));

    $status_map = [
        'dang_giao' => ['label' => '⏳ Đang xử lý', 'class' => 'dang_giao'],
        'da_giao'   => ['label' => '✅ Đã hoàn thành', 'class' => 'da_giao'],
        'huy'       => ['label' => '❌ Đã hủy',       'class' => 'huy'],
    ];

    ob_start(); ?>
    <div class="qlbh-wrap">
        <div class="qlbh-orders-wrap">
            <h3 class="qlbh-orders-title">📋 Lịch sử mua hàng của bạn</h3>
            <table class="qlbh-orders-table">
                <thead>
                    <tr>
                        <th style="width:80px;">Mã Đơn</th>
                        <th>Sản phẩm</th>
                        <th style="width:130px;">Tổng tiền</th>
                        <th style="width:80px;">Ngày đặt</th>
                        <th style="width:140px;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="5" class="qlbh-no-orders">
                            <div style="font-size:40px;margin-bottom:10px;">📭</div>
                            Bạn chưa có đơn hàng nào.
                            <br><a href="<?php echo qlbh_get_page_url('shop_truyen', 'shop-truyen'); ?>" style="color:var(--primary);font-weight:600;text-decoration:none;">Mua sắm ngay →</a>
                        </td>
                    </tr>
                <?php else: foreach ($orders as $o):
                    $st = $status_map[$o->trang_thai] ?? ['label' => $o->trang_thai, 'class' => 'dang_giao'];
                ?>
                    <tr>
                        <td style="font-weight:700;color:var(--primary);">#<?php echo $o->id; ?></td>
                        <td style="font-size:13px;color:var(--text-sub);"><?php echo esc_html($o->thong_tin_khach); ?></td>
                        <td style="font-weight:700;color:var(--accent);"><?php echo number_format($o->tong_tien); ?>đ</td>
                        <td style="font-size:12px;color:var(--text-sub);"><?php echo date('d/m/Y', strtotime($o->ngay_dat)); ?></td>
                        <td>
                            <span class="qlbh-status-badge qlbh-status-<?php echo $st['class']; ?>">
                                <?php echo $st['label']; ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php return ob_get_clean();
});
