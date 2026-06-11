<style>
/* ===== ADMIN UI - H SHOP PRO ===== */
#qlbh-admin-wrap { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
#qlbh-admin-wrap .qlbh-admin-header {
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 24px; padding-bottom: 16px;
    border-bottom: 2px solid #f0eafb;
}
#qlbh-admin-wrap .qlbh-admin-header h1 {
    font-size: 22px; font-weight: 800; color: #1e1b2e;
    margin: 0; display: flex; align-items: center; gap: 10px;
}
#qlbh-admin-wrap .qlbh-admin-header h1 span.qlbh-badge {
    background: linear-gradient(135deg, #6C3FC7, #8b5cf6);
    color: white; font-size: 11px; font-weight: 700;
    padding: 3px 10px; border-radius: 20px; letter-spacing: 0.3px;
}

/* FORM CARD */
.qlbh-form-card {
    background: #fff; border: 1px solid #e5e7eb;
    border-radius: 12px; padding: 24px 26px;
    margin-bottom: 28px;
    box-shadow: 0 2px 12px rgba(108,63,199,0.07);
}
.qlbh-form-card h2 {
    font-size: 15px; font-weight: 700; color: #1e1b2e;
    margin: 0 0 20px 0; padding-bottom: 12px;
    border-bottom: 1.5px solid #f0eafb;
    display: flex; align-items: center; gap: 8px;
}
.qlbh-form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 16px;
}
.qlbh-form-group label {
    display: block; font-size: 13px; font-weight: 600;
    color: #374151; margin-bottom: 6px;
}
.qlbh-form-group input[type="text"],
.qlbh-form-group input[type="number"],
.qlbh-form-group select,
.qlbh-form-group textarea {
    width: 100%; padding: 9px 13px;
    border: 1.5px solid #e5e7eb; border-radius: 8px;
    font-size: 14px; color: #1e1b2e; outline: none;
    transition: border-color 0.2s;
    font-family: inherit;
}
.qlbh-form-group input:focus,
.qlbh-form-group select:focus,
.qlbh-form-group textarea:focus { border-color: #6C3FC7; }
.qlbh-form-group textarea { resize: vertical; min-height: 90px; }
.qlbh-img-preview-wrap {
    display: flex; align-items: center; gap: 10px;
    margin-top: 8px;
}
.qlbh-img-preview-wrap img {
    width: 60px; height: 80px; object-fit: cover;
    border-radius: 6px; border: 1.5px solid #e5e7eb;
    display: none;
}
.qlbh-form-actions { display: flex; gap: 10px; align-items: center; margin-top: 20px; }
.qlbh-btn-save {
    background: linear-gradient(135deg, #6C3FC7, #8b5cf6);
    color: white; border: none; padding: 10px 24px;
    border-radius: 8px; font-size: 14px; font-weight: 700;
    cursor: pointer; transition: opacity 0.2s, transform 0.1s;
}
.qlbh-btn-save:hover { opacity: 0.9; transform: translateY(-1px); }
.qlbh-btn-cancel {
    background: #f3f4f6; color: #374151; border: 1.5px solid #e5e7eb;
    padding: 9px 20px; border-radius: 8px; font-size: 14px;
    font-weight: 600; cursor: pointer; text-decoration: none;
    display: inline-block; transition: background 0.2s;
}
.qlbh-btn-cancel:hover { background: #e5e7eb; }

/* TABLE */
.qlbh-table-card {
    background: #fff; border: 1px solid #e5e7eb;
    border-radius: 12px; overflow: hidden;
    box-shadow: 0 2px 12px rgba(108,63,199,0.07);
}
.qlbh-table-card table {
    width: 100%; border-collapse: collapse;
}
.qlbh-table-card thead tr {
    background: linear-gradient(135deg, #6C3FC7, #8b5cf6);
    color: #fff;
}
.qlbh-table-card thead th {
    padding: 13px 16px; text-align: left;
    font-size: 12px; font-weight: 700; letter-spacing: 0.4px;
}
.qlbh-table-card tbody tr { border-bottom: 1px solid #f3f4f6; transition: background 0.15s; }
.qlbh-table-card tbody tr:last-child { border-bottom: none; }
.qlbh-table-card tbody tr:hover { background: #faf7ff; }
.qlbh-table-card tbody td { padding: 12px 16px; font-size: 13px; color: #1e1b2e; }
.qlbh-book-thumb {
    width: 42px; height: 58px; object-fit: cover;
    border-radius: 5px; border: 1px solid #e5e7eb;
    display: block;
}
.qlbh-table-price { font-weight: 700; color: #FF6B6B; }
.qlbh-table-qty   { font-weight: 600; color: #1e1b2e; }
.qlbh-btn-edit {
    display: inline-block; background: #f0eafb; color: #6C3FC7;
    border: 1.5px solid #d8c5f7; padding: 5px 12px;
    border-radius: 6px; font-size: 12px; font-weight: 700;
    cursor: pointer; text-decoration: none; transition: background 0.15s;
}
.qlbh-btn-edit:hover { background: #e0d4f7; }
.qlbh-btn-del {
    display: inline-block; background: #fee2e2; color: #dc2626;
    border: 1.5px solid #fca5a5; padding: 5px 12px;
    border-radius: 6px; font-size: 12px; font-weight: 700;
    cursor: pointer; text-decoration: none; transition: background 0.15s;
    margin-left: 6px;
}
.qlbh-btn-del:hover { background: #fecaca; }
.qlbh-genre-badge-admin {
    display: inline-block; font-size: 10px; font-weight: 700;
    padding: 2px 8px; border-radius: 20px;
}
.qlbh-genre-manga-admin        { background: #fef3c7; color: #92400e; }
.qlbh-genre-comic-admin        { background: #dbeafe; color: #1e40af; }
.qlbh-genre-tieulthuyet-admin  { background: #f3e8ff; color: #6b21a8; }
.qlbh-genre-default-admin      { background: #f3f4f6; color: #374151; }
</style>

<div class="wrap" id="qlbh-admin-wrap">
    <div class="qlbh-admin-header">
        <h1>📚 Quản Lý Kho Hàng <span class="qlbh-badge">H Shop Pro</span></h1>
    </div>

    <!-- FORM THÊM / SỬA -->
    <div class="qlbh-form-card">
        <h2>✏️ Thêm mới / Chỉnh sửa truyện</h2>
        <form method="post">
            <input type="hidden" name="item_id" id="item_id">
            <div class="qlbh-form-grid">
                <div class="qlbh-form-group" style="grid-column: span 2;">
                    <label>Tên truyện <span style="color:red;">*</span></label>
                    <input type="text" name="ten" id="f_ten" required placeholder="Nhập tên truyện...">
                </div>
                <div class="qlbh-form-group">
                    <label>Thể loại</label>
                    <select name="the_loai" id="f_the_loai">
                        <option value="Manga">📙 Manga</option>
                        <option value="Comic">📘 Comic</option>
                        <option value="Tiểu thuyết">📗 Tiểu thuyết</option>
                    </select>
                </div>
                <div class="qlbh-form-group">
                    <label>Giá nhập (đ)</label>
                    <input type="number" name="g_nhap" id="f_nhap" min="0" placeholder="0">
                </div>
                <div class="qlbh-form-group">
                    <label>Giá bán (đ)</label>
                    <input type="number" name="g_ban" id="f_ban" min="0" placeholder="0">
                </div>
                <div class="qlbh-form-group">
                    <label>Số lượng kho</label>
                    <input type="number" name="qty" id="f_qty" min="0" placeholder="0">
                </div>
            </div>

            <div class="qlbh-form-group" style="margin-bottom:16px;">
                <label>Ảnh bìa truyện</label>
                <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
                    <input type="text" name="img" id="f_img" readonly placeholder="URL ảnh (nhấn nút chọn ảnh →)" style="flex:1; min-width:200px;">
                    <button type="button" id="upload_btn" class="qlbh-btn-edit" style="white-space:nowrap;">🖼️ Chọn ảnh</button>
                </div>
                <div class="qlbh-img-preview-wrap" id="preview_img" style="margin-top:10px;">
                    <img id="img_preview_tag" src="" alt="preview">
                    <span id="preview_hint" style="font-size:12px;color:#6b7280;"></span>
                </div>
            </div>

            <div class="qlbh-form-group" style="margin-bottom:20px;">
                <label>Mô tả chi tiết</label>
                <textarea name="mo_ta" id="f_mo_ta" placeholder="Tóm tắt nội dung truyện..."></textarea>
            </div>

            <div class="qlbh-form-actions">
                <button type="submit" name="save_item" class="qlbh-btn-save">💾 Lưu vào kho</button>
                <a href="?page=h-shop-pro-settings" class="qlbh-btn-cancel">✕ Hủy / Làm mới</a>
            </div>
        </form>
    </div>

    <!-- BẢNG DANH SÁCH -->
    <div class="qlbh-table-card">
        <table>
            <thead>
                <tr>
                    <th style="width:50px;">Ảnh</th>
                    <th>Tên Truyện</th>
                    <th style="width:100px;">Thể loại</th>
                    <th style="width:110px;">Giá bán</th>
                    <th style="width:90px;">Kho</th>
                    <th style="width:160px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($items)): ?>
                <tr>
                    <td colspan="6" style="text-align:center; padding:40px; color:#6b7280;">
                        <div style="font-size:36px;margin-bottom:10px;">📭</div>
                        Kho hàng đang trống. Hãy thêm truyện đầu tiên!
                    </td>
                </tr>
                <?php else: foreach ($items as $i):
                    $genre_map = ['Manga' => 'manga', 'Comic' => 'comic', 'Tiểu thuyết' => 'tieulthuyet'];
                    $gs = $genre_map[$i->the_loai] ?? 'default';
                ?>
                <tr>
                    <td>
                        <img src="<?php echo esc_url($i->hinh_anh); ?>"
                             class="qlbh-book-thumb"
                             onerror="this.style.display='none'">
                    </td>
                    <td>
                        <strong><?php echo esc_html($i->ten_truyen); ?></strong>
                        <?php if (!empty($i->mo_ta)): ?>
                        <div style="font-size:11px;color:#9ca3af;margin-top:3px;overflow:hidden;white-space:nowrap;max-width:240px;text-overflow:ellipsis;">
                            <?php echo esc_html(substr($i->mo_ta, 0, 60)) . (strlen($i->mo_ta) > 60 ? '…' : ''); ?>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="qlbh-genre-badge-admin qlbh-genre-<?php echo $gs; ?>-admin">
                            <?php echo esc_html($i->the_loai ?? '—'); ?>
                        </span>
                    </td>
                    <td class="qlbh-table-price"><?php echo number_format($i->gia_ban); ?>đ</td>
                    <td class="qlbh-table-qty">
                        <?php
                        $qty = intval($i->so_luong);
                        $qty_color = $qty <= 5 ? 'color:#dc2626;' : ($qty <= 20 ? 'color:#f59e0b;' : 'color:#16a34a;');
                        echo "<span style='$qty_color font-weight:700;'>$qty</span>";
                        ?>
                    </td>
                    <td>
                        <a href="#" class="qlbh-btn-edit"
                           onclick="qlbhFillEdit('<?php echo $i->id; ?>','<?php echo esc_js($i->ten_truyen); ?>','<?php echo $i->gia_nhap; ?>','<?php echo $i->gia_ban; ?>','<?php echo $i->so_luong; ?>','<?php echo esc_js($i->hinh_anh); ?>','<?php echo esc_js($i->the_loai); ?>','<?php echo esc_js($i->mo_ta); ?>')">
                            ✏️ Sửa
                        </a>
                        <a href="?page=h-shop-pro-settings&del=<?php echo $i->id; ?>"
                           class="qlbh-btn-del"
                           onclick="return confirm('Xóa truyện «<?php echo esc_js($i->ten_truyen); ?>»?')">
                            🗑️ Xóa
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Media uploader
    $('#upload_btn').click(function(e) {
        e.preventDefault();
        var frame = wp.media({ title: 'Chọn ảnh bìa truyện', multiple: false });
        frame.open().on('select', function() {
            var url = frame.state().get('selection').first().toJSON().url;
            $('#f_img').val(url);
            var img = $('#img_preview_tag');
            img.attr('src', url).show();
            $('#preview_hint').text('Ảnh đã chọn');
        });
    });
});

function qlbhFillEdit(id, ten, nhap, ban, qty, img, tloai, mota) {
    document.getElementById('item_id').value   = id;
    document.getElementById('f_ten').value     = ten;
    document.getElementById('f_nhap').value    = nhap;
    document.getElementById('f_ban').value     = ban;
    document.getElementById('f_qty').value     = qty;
    document.getElementById('f_img').value     = img;
    document.getElementById('f_mo_ta').value   = mota || '';
    var sel = document.getElementById('f_the_loai');
    if (tloai) sel.value = tloai;

    var preview = document.getElementById('img_preview_tag');
    if (img) {
        preview.src = img;
        preview.style.display = 'block';
        document.getElementById('preview_hint').textContent = 'Ảnh hiện tại';
    } else {
        preview.style.display = 'none';
    }

    // Scroll lên form
    document.querySelector('.qlbh-form-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>
