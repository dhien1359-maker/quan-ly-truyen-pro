<?php
// =============================================
// CSS & STYLE CHUNG CHO TOÀN BỘ PLUGIN
// =============================================
function qlbh_enqueue_styles() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">';

    echo '<style>
    :root {
        --primary: #6C3FC7;
        --primary-dark: #5429b3;
        --primary-light: #f0eafb;
        --accent: #FF6B6B;
        --success: #22c55e;
        --danger: #ef4444;
        --text-main: #1e1b2e;
        --text-sub: #6b7280;
        --border: #e5e7eb;
        --bg-page: #f8f7fc;
        --bg-card: #ffffff;
        --radius: 14px;
        --radius-sm: 8px;
        --shadow: 0 4px 20px rgba(108,63,199,0.08);
        --shadow-hover: 0 8px 32px rgba(108,63,199,0.18);
        --font: "Inter", sans-serif;
    }
    .qlbh-wrap * { box-sizing: border-box; font-family: var(--font); }
    .qlbh-wrap { background: var(--bg-page); padding: 30px 0; min-height: 60vh; }

    /* SEARCH BAR */
    .qlbh-search-bar {
        display: flex; gap: 12px; margin-bottom: 36px;
        background: var(--bg-card); padding: 18px 20px;
        border-radius: var(--radius); box-shadow: var(--shadow);
        flex-wrap: wrap; align-items: center; border: 1px solid var(--border);
    }
    .qlbh-search-bar input[type="text"] {
        flex: 2; min-width: 180px; padding: 11px 16px;
        border: 1.5px solid var(--border); border-radius: var(--radius-sm);
        font-size: 14px; color: var(--text-main); outline: none; transition: border-color 0.2s;
    }
    .qlbh-search-bar input[type="text"]:focus { border-color: var(--primary); }
    .qlbh-search-bar select {
        flex: 1; min-width: 140px; padding: 11px 14px;
        border: 1.5px solid var(--border); border-radius: var(--radius-sm);
        font-size: 14px; color: var(--text-main); background: white;
        cursor: pointer; outline: none;
    }
    .qlbh-search-bar select:focus { border-color: var(--primary); }
    .qlbh-btn-search {
        background: var(--primary); color: #fff; border: none;
        padding: 11px 24px; border-radius: var(--radius-sm);
        font-size: 14px; font-weight: 600; cursor: pointer;
        transition: background 0.2s, transform 0.1s; white-space: nowrap;
    }
    .qlbh-btn-search:hover { background: var(--primary-dark); transform: translateY(-1px); }

    /* GENRE BADGE */
    .qlbh-genre-badge {
        display: inline-block; font-size: 10px; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.5px;
        padding: 3px 9px; border-radius: 20px; margin-bottom: 8px;
    }
    .qlbh-genre-manga  { background: #fef3c7; color: #92400e; }
    .qlbh-genre-comic  { background: #dbeafe; color: #1e40af; }
    .qlbh-genre-tieulthuyet { background: #f3e8ff; color: #6b21a8; }
    .qlbh-genre-default { background: #f3f4f6; color: #374151; }

    /* PRODUCT GRID */
    .qlbh-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; }

    /* PRODUCT CARD */
    .qlbh-card {
        background: var(--bg-card); border-radius: var(--radius);
        overflow: hidden; border: 1px solid var(--border);
        box-shadow: var(--shadow); transition: transform 0.22s, box-shadow 0.22s;
        display: flex; flex-direction: column;
    }
    .qlbh-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-hover); }
    .qlbh-card-img-wrap {
        position: relative; overflow: hidden;
        background: #f0eafb; aspect-ratio: 3/4;
    }
    .qlbh-card-img-wrap img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.35s; display: block;
    }
    .qlbh-card:hover .qlbh-card-img-wrap img { transform: scale(1.06); }
    .qlbh-card-body {
        padding: 14px 16px 16px;
        display: flex; flex-direction: column; flex: 1;
    }
    .qlbh-card-title {
        font-size: 14px; font-weight: 700; color: var(--text-main);
        margin: 0 0 4px 0; line-height: 1.4;
        display: -webkit-box; -webkit-line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden; text-decoration: none;
    }
    .qlbh-card-title:hover { color: var(--primary); }
    .qlbh-card-price { font-size: 17px; font-weight: 800; color: var(--accent); margin: 6px 0 14px; }
    .qlbh-btn-buy {
        display: block; width: 100%;
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        color: #fff; border: none; padding: 11px; border-radius: var(--radius-sm);
        font-size: 13px; font-weight: 700; cursor: pointer;
        transition: opacity 0.2s, transform 0.1s; text-align: center; margin-top: auto;
    }
    .qlbh-btn-buy:hover { opacity: 0.9; transform: translateY(-1px); }
    .qlbh-btn-login {
        display: block; background: var(--bg-page); color: var(--text-sub);
        border: 1.5px solid var(--border); padding: 10px; border-radius: var(--radius-sm);
        font-size: 12px; font-weight: 600; text-align: center; text-decoration: none;
        margin-top: auto; transition: background 0.2s;
    }
    .qlbh-btn-login:hover { background: var(--primary-light); color: var(--primary); }

    /* ALERTS */
    .qlbh-alert {
        padding: 14px 18px; border-radius: var(--radius-sm);
        margin-bottom: 22px; font-size: 14px; font-weight: 500;
    }
    .qlbh-alert-success { background: #dcfce7; color: #166534; border-left: 4px solid var(--success); }
    .qlbh-alert-danger  { background: #fee2e2; color: #991b1b; border-left: 4px solid var(--danger); }
    .qlbh-alert-info    { background: var(--primary-light); color: var(--primary-dark); border-left: 4px solid var(--primary); }

    /* DETAIL PAGE */
    .qlbh-detail-back {
        display: inline-flex; align-items: center; gap: 6px;
        color: var(--primary); font-weight: 600; font-size: 14px;
        text-decoration: none; margin-bottom: 24px; padding: 8px 14px;
        background: var(--primary-light); border-radius: 30px; transition: background 0.2s;
    }
    .qlbh-detail-back:hover { background: #e0d4f7; color: var(--primary); }
    .qlbh-detail-wrap {
        display: flex; gap: 40px; flex-wrap: wrap; background: var(--bg-card);
        padding: 32px; border-radius: var(--radius);
        box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .qlbh-detail-img {
        width: 260px; border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.13);
        flex-shrink: 0; object-fit: cover;
    }
    .qlbh-detail-info { flex: 1; min-width: 260px; }
    .qlbh-detail-info h1 {
        font-size: 26px; font-weight: 800; color: var(--text-main);
        margin: 0 0 14px 0; line-height: 1.3;
    }
    .qlbh-detail-price { font-size: 30px; font-weight: 800; color: var(--accent); margin: 12px 0 20px; }
    .qlbh-detail-desc {
        background: var(--bg-page); border-radius: var(--radius-sm);
        padding: 18px 20px; font-size: 14px; line-height: 1.8;
        color: var(--text-sub); border-left: 4px solid var(--primary); margin-top: 16px;
    }

    /* CART */
    .qlbh-cart-table {
        width: 100%; border-collapse: collapse; background: var(--bg-card);
        border-radius: var(--radius); overflow: hidden;
        box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .qlbh-cart-table thead tr { background: linear-gradient(135deg, var(--primary), #8b5cf6); color: #fff; }
    .qlbh-cart-table th, .qlbh-cart-table td { padding: 14px 18px; text-align: left; font-size: 14px; }
    .qlbh-cart-table thead th { font-weight: 700; font-size: 13px; letter-spacing: 0.3px; }
    .qlbh-cart-table tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
    .qlbh-cart-table tbody tr:hover { background: var(--primary-light); }
    .qlbh-cart-table tbody tr:last-child { border-bottom: none; }
    .qlbh-qty-ctrl { display: flex; align-items: center; gap: 6px; justify-content: center; }
    .qlbh-qty-btn {
        width: 30px; height: 30px; border-radius: 50%;
        border: 1.5px solid var(--border); background: white;
        font-size: 16px; font-weight: 700; cursor: pointer; color: var(--primary);
        display: flex; align-items: center; justify-content: center;
        transition: background 0.15s, border-color 0.15s; line-height: 1;
        padding: 0;
    }
    .qlbh-qty-btn:hover { background: var(--primary-light); border-color: var(--primary); }
    .qlbh-qty-num { min-width: 22px; text-align: center; font-weight: 700; font-size: 15px; }
    .qlbh-remove-btn {
        background: none; border: none; cursor: pointer;
        font-size: 18px; color: var(--danger); padding: 4px 8px;
        border-radius: 6px; transition: background 0.15s;
    }
    .qlbh-remove-btn:hover { background: #fee2e2; }
    .qlbh-cart-subtotal { font-weight: 700; color: var(--accent); font-size: 15px; }
    .qlbh-cart-footer {
        margin-top: 24px; background: var(--bg-card); border-radius: var(--radius);
        padding: 24px 28px; border: 1px solid var(--border); box-shadow: var(--shadow);
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 16px;
    }
    .qlbh-cart-total-label { font-size: 15px; color: var(--text-sub); font-weight: 500; }
    .qlbh-cart-total-amount { font-size: 28px; font-weight: 800; color: var(--accent); margin-top: 2px; }
    .qlbh-btn-checkout {
        background: linear-gradient(135deg, var(--success), #16a34a);
        color: #fff; border: none; padding: 14px 32px; font-size: 15px; font-weight: 700;
        border-radius: var(--radius-sm); cursor: pointer;
        transition: opacity 0.2s, transform 0.1s;
        box-shadow: 0 4px 14px rgba(34,197,94,0.25);
    }
    .qlbh-btn-checkout:hover { opacity: 0.9; transform: translateY(-2px); }
    .qlbh-empty-cart {
        text-align: center; padding: 60px 20px; background: var(--bg-card);
        border-radius: var(--radius); box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .qlbh-empty-icon { font-size: 56px; margin-bottom: 16px; }
    .qlbh-empty-cart h3 { font-size: 20px; color: var(--text-main); margin: 0 0 10px; }
    .qlbh-empty-cart p { color: var(--text-sub); margin: 0 0 24px; }
    .qlbh-checkout-success {
        text-align: center; padding: 60px 20px; background: var(--bg-card);
        border-radius: var(--radius); box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .qlbh-checkout-success .qlbh-success-icon { font-size: 64px; margin-bottom: 16px; }
    .qlbh-checkout-success h2 { font-size: 24px; font-weight: 800; color: var(--success); margin: 0 0 10px; }
    .qlbh-btn-back-shop {
        display: inline-block; background: var(--primary); color: #fff;
        padding: 12px 28px; border-radius: var(--radius-sm);
        text-decoration: none; font-weight: 700; font-size: 14px; transition: background 0.2s;
    }
    .qlbh-btn-back-shop:hover { background: var(--primary-dark); color: #fff; }

    /* ACCOUNT */
    .qlbh-account-card {
        max-width: 640px; margin: 0 auto; background: var(--bg-card);
        border-radius: var(--radius); box-shadow: var(--shadow);
        border: 1px solid var(--border); overflow: hidden;
    }
    .qlbh-account-header {
        background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%);
        padding: 28px 28px 22px; color: #fff;
        display: flex; align-items: center; gap: 18px; justify-content: space-between;
    }
    .qlbh-account-header-left { display: flex; align-items: center; gap: 18px; }
    .qlbh-account-header img { border-radius: 50%; border: 3px solid rgba(255,255,255,0.4); }
    .qlbh-account-name { font-size: 19px; font-weight: 800; margin: 0 0 4px; }
    .qlbh-account-email { font-size: 13px; opacity: 0.85; margin: 0; }
    .qlbh-btn-logout {
        background: rgba(255,255,255,0.15); color: #fff; text-decoration: none;
        padding: 8px 16px; border-radius: 30px; font-size: 13px; font-weight: 600;
        border: 1.5px solid rgba(255,255,255,0.3); transition: background 0.2s; white-space: nowrap;
    }
    .qlbh-btn-logout:hover { background: rgba(255,255,255,0.3); color: #fff; }
    .qlbh-account-body { padding: 28px; }
    .qlbh-wallet-box {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border: 1.5px solid #bbf7d0; border-radius: var(--radius);
        padding: 22px 24px; margin-bottom: 22px;
    }
    .qlbh-wallet-label { font-size: 14px; color: #166534; font-weight: 600; margin: 0 0 6px; }
    .qlbh-wallet-amount { font-size: 36px; font-weight: 800; color: #16a34a; margin: 0 0 20px; }
    .qlbh-topup-form {
        display: flex; gap: 10px; background: white;
        border: 1.5px solid #bbf7d0; border-radius: var(--radius-sm);
        padding: 12px 14px; flex-wrap: wrap;
    }
    .qlbh-topup-form input[type="number"] {
        flex: 1; min-width: 140px; padding: 10px 14px;
        border: 1.5px solid var(--border); border-radius: var(--radius-sm);
        font-size: 14px; outline: none;
    }
    .qlbh-topup-form input[type="number"]:focus { border-color: var(--success); }
    .qlbh-btn-topup {
        background: linear-gradient(135deg, var(--success), #16a34a);
        color: #fff; border: none; padding: 10px 20px; border-radius: var(--radius-sm);
        font-size: 14px; font-weight: 700; cursor: pointer; white-space: nowrap; transition: opacity 0.2s;
    }
    .qlbh-btn-topup:hover { opacity: 0.9; }
    .qlbh-login-box {
        max-width: 420px; margin: 0 auto; background: var(--bg-card);
        padding: 36px 32px; border-radius: var(--radius);
        box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .qlbh-login-box h3 { text-align: center; font-size: 20px; font-weight: 800; color: var(--text-main); margin: 0 0 24px; }

    /* ORDERS */
    .qlbh-orders-wrap { max-width: 820px; margin: 0 auto; }
    .qlbh-orders-title { font-size: 20px; font-weight: 800; color: var(--text-main); margin: 0 0 20px; }
    .qlbh-orders-table {
        width: 100%; border-collapse: collapse; background: var(--bg-card);
        border-radius: var(--radius); overflow: hidden;
        box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .qlbh-orders-table thead tr { background: linear-gradient(135deg, var(--primary), #8b5cf6); color: #fff; }
    .qlbh-orders-table th, .qlbh-orders-table td { padding: 13px 16px; text-align: left; font-size: 14px; }
    .qlbh-orders-table thead th { font-weight: 700; font-size: 13px; }
    .qlbh-orders-table tbody tr { border-bottom: 1px solid var(--border); }
    .qlbh-orders-table tbody tr:last-child { border-bottom: none; }
    .qlbh-status-badge {
        display: inline-block; padding: 4px 12px; border-radius: 20px;
        font-size: 11px; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.4px; white-space: nowrap;
    }
    .qlbh-status-dang_giao { background: #fef3c7; color: #92400e; }
    .qlbh-status-da_giao   { background: #dcfce7; color: #166534; }
    .qlbh-status-huy       { background: #fee2e2; color: #991b1b; }
    .qlbh-no-orders { padding: 40px; text-align: center; color: var(--text-sub); }

    /* RESPONSIVE */
    @media (max-width: 900px) {
    .qlbh-grid { grid-template-columns: repeat(3, 1fr); }}
    @media (max-width: 640px) {
        .qlbh-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
        .qlbh-detail-wrap { flex-direction: column; padding: 20px; }
        .qlbh-detail-img { width: 100%; max-width: 240px; margin: 0 auto; }
        .qlbh-cart-footer { flex-direction: column; align-items: stretch; text-align: center; }
        .qlbh-account-header { flex-direction: column; align-items: flex-start; gap: 14px; }
    }
    @media (max-width: 400px) { .qlbh-grid { grid-template-columns: 1fr; } }
    /* PAGINATION */
.qlbh-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    margin-top: 40px;
    flex-wrap: wrap;
}
.qlbh-page-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    height: 38px;
    padding: 0 10px;
    border-radius: 8px;
    border: 1.5px solid var(--border);
    background: var(--bg-card);
    color: var(--text-main);
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.15s;
}
.qlbh-page-btn:hover {
    background: var(--primary-light);
    border-color: var(--primary);
    color: var(--primary);
}
.qlbh-page-active {
    background: var(--primary) !important;
    border-color: var(--primary) !important;
    color: #fff !important;
    cursor: default;
}
.qlbh-page-disabled {
    opacity: 0.35;
    cursor: default;
    pointer-events: none;
}
.qlbh-page-dots {
    color: var(--text-sub);
    font-size: 15px;
    padding: 0 4px;
    line-height: 38px;
}
    </style>';
}
add_action('wp_head', 'qlbh_enqueue_styles');

// Hàm helper badge thể loại
function qlbh_genre_badge($genre) {
    $map = ['Manga' => 'manga', 'Comic' => 'comic', 'Tiểu thuyết' => 'tieulthuyet'];
    $slug = $map[$genre] ?? 'default';
    return '<span class="qlbh-genre-badge qlbh-genre-' . $slug . '">' . esc_html($genre) . '</span>';
}

// =============================================
// SHORTCODE [shop_truyen]
// =============================================
function qlbh_render_shop() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'quan_ly_truyen';

    // Chi tiết truyện
    if (isset($_GET['view_id'])) {
        $id = absint($_GET['view_id']);
        $p  = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
        if ($p) {
            ob_start(); ?>
            <div class="qlbh-wrap">
                <a href="<?php echo get_permalink(); ?>" class="qlbh-detail-back">← Quay lại cửa hàng</a>
                <div class="qlbh-detail-wrap">
                    <img src="<?php echo esc_url($p->hinh_anh); ?>" alt="<?php echo esc_attr($p->ten_truyen); ?>" class="qlbh-detail-img">
                    <div class="qlbh-detail-info">
                        <?php echo qlbh_genre_badge($p->the_loai ?? 'Khác'); ?>
                        <h1><?php echo esc_html($p->ten_truyen); ?></h1>
                        <p style="color:var(--text-sub);font-size:14px;margin:0 0 4px;">Giá bán</p>
                        <div class="qlbh-detail-price"><?php echo number_format($p->gia_ban); ?>đ</div>
                        <p style="font-size:14px;color:var(--text-sub);margin:0 0 4px;">
                            Còn lại: <strong><?php echo intval($p->so_luong); ?> quyển</strong>
                        </p>
                        <div class="qlbh-detail-desc">
                            <strong style="display:block;color:var(--text-main);margin-bottom:8px;">📖 Nội dung truyện</strong>
                            <?php echo nl2br(esc_html(!empty($p->mo_ta) ? $p->mo_ta : 'Đang cập nhật nội dung...')); ?>
                        </div>
                        <div style="margin-top:24px;">
                            <?php if (is_user_logged_in()): ?>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $p->id; ?>">
                                    <input type="hidden" name="p_name" value="<?php echo esc_attr($p->ten_truyen); ?>">
                                    <button type="submit" name="add_to_cart" class="qlbh-btn-buy" style="max-width:240px;">🛒 Thêm vào giỏ hàng</button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo wp_login_url(get_permalink()); ?>" class="qlbh-btn-login" style="max-width:240px;display:inline-block;">🔑 Đăng nhập để mua</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php return ob_get_clean();
        }
    }

    // Thêm vào giỏ
    $cart_msg = '';
    if (isset($_POST['add_to_cart'])) {
        $id = absint($_POST['product_id']);
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        $cart_msg = '<div class="qlbh-alert qlbh-alert-success">✅ Đã thêm <strong>' . esc_html($_POST['p_name']) . '</strong> vào giỏ hàng!</div>';
    }

    // Lọc & tìm kiếm + phân trang
    $s        = isset($_GET['search_key']) ? sanitize_text_field($_GET['search_key']) : '';
    $cat      = isset($_GET['category'])   ? sanitize_text_field($_GET['category'])   : '';
    $per_page = 10;
    $cur_page = isset($_GET['trang']) ? max(1, intval($_GET['trang'])) : 1;
    $offset   = ($cur_page - 1) * $per_page;

    $args  = ['%' . $s . '%'];
    $where = "WHERE ten_truyen LIKE %s";
    if (!empty($cat)) { $where .= " AND the_loai = %s"; $args[] = $cat; }

    $total_items = (int) $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name $where", ...$args));
    $total_pages = max(1, ceil($total_items / $per_page));

    $args_data   = array_merge($args, [$per_page, $offset]);
    $products    = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name $where LIMIT %d OFFSET %d", ...$args_data));

    ob_start(); ?>
    <div class="qlbh-wrap">
        <?php echo $cart_msg; ?>
        <form method="get" class="qlbh-search-bar">
            <input type="text" name="search_key" placeholder="🔍 Tìm tên truyện..." value="<?php echo esc_attr($s); ?>">
            <select name="category">
                <option value="">Tất cả thể loại</option>
                <option value="Manga"       <?php selected($cat, 'Manga'); ?>>📙 Manga</option>
                <option value="Comic"       <?php selected($cat, 'Comic'); ?>>📘 Comic</option>
                <option value="Tiểu thuyết" <?php selected($cat, 'Tiểu thuyết'); ?>>📗 Tiểu thuyết</option>
            </select>
            <button type="submit" class="qlbh-btn-search">Lọc sản phẩm</button>
        </form>

        <?php if (empty($products)): ?>
            <div class="qlbh-alert qlbh-alert-info" style="text-align:center;">Không tìm thấy truyện nào. Hãy thử từ khóa khác!</div>
        <?php else: ?>
        <div class="qlbh-grid">
            <?php foreach ($products as $p): ?>
            <div class="qlbh-card">
                <a href="<?php echo add_query_arg('view_id', $p->id); ?>" class="qlbh-card-img-wrap">
                    <img src="<?php echo esc_url($p->hinh_anh); ?>" alt="<?php echo esc_attr($p->ten_truyen); ?>" loading="lazy">
                </a>
                <div class="qlbh-card-body">
                    <?php echo qlbh_genre_badge($p->the_loai ?? 'Khác'); ?>
                    <a href="<?php echo add_query_arg('view_id', $p->id); ?>" class="qlbh-card-title"><?php echo esc_html($p->ten_truyen); ?></a>
                    <div class="qlbh-card-price"><?php echo number_format($p->gia_ban); ?>đ</div>
                    <?php if (is_user_logged_in()): ?>
                        <form method="post" style="margin-top:auto;">
                            <input type="hidden" name="product_id" value="<?php echo $p->id; ?>">
                            <input type="hidden" name="p_name" value="<?php echo esc_attr($p->ten_truyen); ?>">
                            <button type="submit" name="add_to_cart" class="qlbh-btn-buy">🛒 Mua ngay</button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo wp_login_url(get_permalink()); ?>" class="qlbh-btn-login">🔑 Đăng nhập để mua</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($total_pages > 1):
            $base_args = [];
            if ($s)   $base_args['search_key'] = $s;
            if ($cat) $base_args['category']   = $cat;
        ?>
        <div class="qlbh-pagination">
            <?php
            // Nút Prev
            if ($cur_page > 1) {
                $url = add_query_arg(array_merge($base_args, ['trang' => $cur_page - 1]));
                echo "<a href='$url' class='qlbh-page-btn'>&#8249;</a>";
            } else {
                echo "<span class='qlbh-page-btn qlbh-page-disabled'>&#8249;</span>";
            }

            // Tính dải trang hiển thị
            $pages = [1];
            for ($i = max(2, $cur_page - 2); $i <= min($total_pages - 1, $cur_page + 2); $i++) {
                $pages[] = $i;
            }
            if ($total_pages > 1) $pages[] = $total_pages;
            $pages = array_unique($pages);
            sort($pages);

            $prev = 0;
            foreach ($pages as $p) {
                if ($p - $prev > 1) echo "<span class='qlbh-page-dots'>…</span>";
                $url = add_query_arg(array_merge($base_args, ['trang' => $p]));
                if ($p == $cur_page) {
                    echo "<span class='qlbh-page-btn qlbh-page-active'>$p</span>";
                } else {
                    echo "<a href='$url' class='qlbh-page-btn'>$p</a>";
                }
                $prev = $p;
            }

            // Nút Next
            if ($cur_page < $total_pages) {
                $url = add_query_arg(array_merge($base_args, ['trang' => $cur_page + 1]));
                echo "<a href='$url' class='qlbh-page-btn'>&#8250;</a>";
            } else {
                echo "<span class='qlbh-page-btn qlbh-page-disabled'>&#8250;</span>";
            }
            ?>
        </div>
        <?php endif; ?>

    </div>
    <?php return ob_get_clean();
}

// =============================================
// SHORTCODE [gio_hang]
// =============================================
function qlbh_render_cart() {
    global $wpdb;
    $table_truyen   = $wpdb->prefix . 'quan_ly_truyen';
    $table_don_hang = $wpdb->prefix . 'qlbh_don_hang';
    $user_id        = get_current_user_id();

    // Cập nhật / xóa
    if (isset($_POST['cart_action'])) {
        $id = absint($_POST['item_id']);
        $action = $_POST['cart_action'];
        if ($action === 'increase')      { $_SESSION['cart'][$id]++; }
        elseif ($action === 'decrease')  { $_SESSION['cart'][$id]--; if ($_SESSION['cart'][$id] < 1) unset($_SESSION['cart'][$id]); }
        elseif ($action === 'remove')    { unset($_SESSION['cart'][$id]); }
    }

    // Thanh toán
    if (isset($_POST['checkout']) && !empty($_SESSION['cart'])) {
        if (!$user_id) return '<div class="qlbh-alert qlbh-alert-danger">Vui lòng đăng nhập để thanh toán.</div>';
        $total_final = 0; $details = []; $items_to_update = [];
        foreach ($_SESSION['cart'] as $id => $qty) {
            $p = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_truyen WHERE id = %d", $id));
            if ($p) {
                $total_final += ($p->gia_ban * $qty);
                $details[] = $p->ten_truyen . " (x$qty)";
                $items_to_update[] = ['id' => $id, 'new_qty' => $p->so_luong - $qty];
            }
        }
        $wallet_balance = (float) get_user_meta($user_id, 'wallet_balance', true);
        if ($wallet_balance >= $total_final) {
            $new_balance = $wallet_balance - $total_final;
            update_user_meta($user_id, 'wallet_balance', $new_balance);
            foreach ($items_to_update as $item) {
                $wpdb->update($table_truyen, ['so_luong' => $item['new_qty']], ['id' => $item['id']]);
            }
            $wpdb->insert($table_don_hang, [
                'user_id' => $user_id, 'thong_tin_khach' => implode(', ', $details),
                'tong_tien' => $total_final, 'trang_thai' => 'dang_giao',
                'ngay_dat' => current_time('mysql'),
            ]);
            unset($_SESSION['cart']);
            return '<div class="qlbh-wrap"><div class="qlbh-checkout-success">
                <div class="qlbh-success-icon">🎉</div>
                <h2>Đặt hàng thành công!</h2>
                <p style="color:var(--text-sub);font-size:15px;">Cảm ơn bạn đã mua sắm tại cửa hàng!</p>
                <p style="font-size:14px;">Số dư ví còn lại: <strong style="color:var(--success);">' . number_format($new_balance) . 'đ</strong></p>
                <a href="' . qlbh_get_page_url('shop_truyen', 'shop-truyen') . '" class="qlbh-btn-back-shop" style="margin-top:16px;">Tiếp tục mua sắm</a>
            </div></div>';
        } else {
            echo '<div class="qlbh-alert qlbh-alert-danger">❌ Số dư không đủ! Cần <strong>' . number_format($total_final) . 'đ</strong>, ví còn <strong>' . number_format($wallet_balance) . 'đ</strong>. Vui lòng nạp thêm tiền.</div>';
        }
    }

    if (empty($_SESSION['cart'])) {
        return '<div class="qlbh-wrap"><div class="qlbh-empty-cart">
            <div class="qlbh-empty-icon">🛒</div>
            <h3>Giỏ hàng đang trống</h3>
            <p>Hãy khám phá và chọn những cuốn truyện bạn yêu thích!</p>
            <a href="' . qlbh_get_page_url('shop_truyen', 'shop-truyen') . '" class="qlbh-btn-back-shop">Khám phá cửa hàng</a>
        </div></div>';
    }

    ob_start(); ?>
    <div class="qlbh-wrap">
        <table class="qlbh-cart-table">
            <thead>
                <tr>
                    <th>Tên truyện</th>
                    <th style="text-align:center;width:160px;">Số lượng</th>
                    <th style="width:130px;">Thành tiền</th>
                    <th style="text-align:center;width:60px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $qty):
                $p = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_truyen WHERE id = %d", $id));
                if (!$p) continue;
                $subtotal = $p->gia_ban * $qty;
                $total   += $subtotal;
            ?>
            <tr>
                <td style="font-weight:600;color:var(--text-main);"><?php echo esc_html($p->ten_truyen); ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                        <div class="qlbh-qty-ctrl">
                            <button type="submit" name="cart_action" value="decrease" class="qlbh-qty-btn">−</button>
                            <span class="qlbh-qty-num"><?php echo $qty; ?></span>
                            <button type="submit" name="cart_action" value="increase" class="qlbh-qty-btn">+</button>
                        </div>
                    </form>
                </td>
                <td class="qlbh-cart-subtotal"><?php echo number_format($subtotal); ?>đ</td>
                <td style="text-align:center;">
                    <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                        <button type="submit" name="cart_action" value="remove" class="qlbh-remove-btn">🗑️</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="qlbh-cart-footer">
            <div>
                <div class="qlbh-cart-total-label">Tổng thanh toán</div>
                <div class="qlbh-cart-total-amount"><?php echo number_format($total); ?>đ</div>
            </div>
            <form method="post">
                <button type="submit" name="checkout" class="qlbh-btn-checkout">✅ Xác nhận đặt hàng (Thanh toán bằng ví)</button>
            </form>
        </div>
    </div>
    <?php return ob_get_clean();
}
