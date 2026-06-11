# 📚 Hệ Thống Quản Lý & Bán Truyện Pro (Version 2.0)

**Hệ Thống Quản Lý Truyện Pro** là một Plugin tùy biến (Custom Plugin) độc lập, toàn diện dành cho nền tảng WordPress. Dự án được phát triển hoàn toàn bằng ngôn ngữ **PHP** và cơ sở dữ liệu **MySQL** (Custom Tables), xây dựng một mô hình thương mại điện tử khép kín chuyên phục vụ kinh doanh truyện tranh (Manga, Comic) hoặc tiểu thuyết trực tuyến. Hệ thống tích hợp **Ví tiền thành viên nội bộ (Wallet Balance)**, tự động trừ tiền khi mua sản phẩm mà không cần phụ thuộc vào bất kỳ bên thứ ba hay plugin cồng kềnh nào khác (như WooCommerce).

---

## 🚀 Tính Năng Cốt Lõi

### 1. Phân hệ Khách hàng (Frontend)
* **Trang Cửa Hàng (`[shop_truyen]`):** Giao diện hiển thị danh sách truyện trực quan dạng lưới (Grid layout) chuẩn hiện đại. Hỗ trợ thanh tìm kiếm thông minh theo từ khóa và bộ lọc phân loại theo thể loại truyện (Manga, Comic, Tiểu thuyết).
* **Giỏ Hàng Độc Lập (`[gio_hang]`):** Hệ thống quản lý giỏ hàng tối ưu, cho phép thêm, bớt, tăng/giảm số lượng và xóa sản phẩm khỏi giỏ hàng theo thời gian thực. Trạng thái giỏ hàng được duy trì ổn định bằng **PHP Session**.
* **Trang Cá Nhân & Ví Điện Tử:** * Tự động kiểm tra trạng thái đăng nhập. Nếu chưa đăng nhập, hệ thống sẽ hiển thị Form đăng nhập tiêu chuẩn bảo mật của WordPress.
  * Hiển thị thông tin số dư ví tiền cá nhân (`wallet_balance`). Tích hợp chức năng cho phép thành viên tự nhập số tiền để gửi yêu cầu nạp tiền vào ví.
  * Bảng tra cứu lịch sử mua hàng cá nhân chi tiết: hiển thị mã đơn hàng, thông tin khách nhận, tổng tiền, ngày đặt và trạng thái đơn hàng.
* **Các trang chức năng mở rộng khác:** Hiển thị và xử lý các luồng dữ liệu tương tác từ các Shortcode bổ sung trong hệ thống.

### 2. Phân hệ Quản trị (Admin Backend - "H Shop Pro")
* **Quản Lý Kho Truyện:** Giao diện điều hướng CRUD chuyên nghiệp. Admin dễ dàng Thêm/Sửa/Xóa đầu truyện, cấu hình giá nhập, giá bán, thể loại, mô tả và số lượng tồn kho. Tích hợp thư viện **WordPress Media Uploader** cùng jQuery giúp chọn ảnh bìa trực tiếp từ thư viện hệ thống.
* **Quản Lý Đơn Hàng:** Danh sách lưu trữ toàn bộ đơn hàng trên hệ thống. Admin có quyền cập nhật trạng thái đơn hàng (*Đang giao*, *Đã giao*, *Hủy đơn*) trực tiếp qua biểu mẫu dropdown và lưu thay đổi tức thời.
* **Quản Lý Thành Viên & Ví Tiền:** Liệt kê toàn bộ người dùng đã đăng ký trên Website. Admin có thể tra cứu thông tin cá nhân, vai trò (Role), kiểm tra số dư hiện tại và trực tiếp can thiệp điều chỉnh/nạp thêm tiền vào ví của từng tài khoản.

### 3. Kiến Trúc Hệ Thống & Bảo Mật
* **Cơ sở dữ liệu tùy biến (Custom Tables):** Sử dụng cơ chế Hook `register_activation_hook` kết hợp lớp đối tượng `$wpdb` để tự động hóa hoàn toàn quy trình khởi tạo, kiểm tra và nâng cấp cấu trúc bảng dữ liệu (`quan_ly_truyen`, `qlbh_don_hang`) trong MySQL ngay khi kích hoạt plugin.
* **Cơ chế phòng thủ & Bảo mật đa lớp:**
  * **Phân quyền nghiêm ngặt:** Sử dụng hàm `current_user_can('manage_options')` để chặn đứng mọi hành vi truy cập hoặc can thiệp trái phép vào các cổng dữ liệu điều hướng của Admin.
  * **Chống tấn công CSRF:** Tích hợp chuỗi xác thực bảo mật **Nonce** của WordPress (`wp_nonce_field` và `check_admin_referer`) cho tất cả các biểu mẫu cập nhật dữ liệu quan trọng (như thay đổi số dư ví, cập nhật đơn hàng).
  * **Làm sạch dữ liệu (Sanitization & Escaping):** Bảo mật tuyệt đối dữ liệu đầu ra trước khi in ra trình duyệt bằng các hàm lọc chuẩn của WordPress như `esc_html()`, `esc_attr()` nhằm ngăn chặn triệt để các lỗ hổng XSS.

---

## 📂 Cấu Trúc Thư Mục Dự Án

```text
quan-ly-truyen-pro/
│
├── LICENSE                     # Giấy phép mã nguồn mở công khai của dự án (MIT License)
├── README.md                   # Tài liệu hướng dẫn sử dụng và giới thiệu hệ thống này
├── quan-ly-truyen-pro.php      # File kích hoạt chính của Plugin, khai báo thông tin & nhúng thư viện
│
└── includes/
    ├── db-setup.php            # Tự động tạo và cấu trúc lại các bảng MySQL (Custom Tables)
    ├── admin-logic.php         # Quản lý điều hướng Menu Admin, script Media Uploader & xử lý đơn hàng
    ├── admin-ui-template.php   # Form CRUD Thêm/Sửa truyện và bảng danh sách kho dành cho Admin
    ├── admin-users.php         # Logic kiểm tra quyền, Nonce bảo mật và cập nhật ví tiền User cho Admin
    ├── frontend-logic.php      # Đăng ký CSS/Style chung, giao diện danh mục cửa hàng và xử lý giỏ hàng
    └── user-portal.php         # Shortcode trang cá nhân, form nạp tiền và lịch sử hóa đơn thành viên
