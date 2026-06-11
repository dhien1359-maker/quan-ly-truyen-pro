# Hệ Thống Quản Lý & Bán Truyện Pro (Version 2.0)

**Hệ Thống Quản Lý Truyện Pro** là một Plugin tùy biến (Custom Plugin) độc lập dành cho nền tảng WordPress, được xây dựng hoàn toàn bằng ngôn ngữ **PHP** và cơ sở dữ liệu **MySQL**. Dự án triển khai một mô hình thương mại điện tử khép kín chuyên phục vụ kinh doanh truyện tranh (Manga, Comic) hoặc tiểu thuyết trực tuyến thông qua hệ thống **Ví tiền thành viên nội bộ (Wallet Balance)** mà không phụ thuộc vào các giải pháp có sẵn như WooCommerce.

---

## 🚀 Tính Năng Cốt Lõi

### 1. Phân hệ Khách hàng (Frontend)
* **Trang Cửa Hàng (`[shop_truyen]`):** Hiển thị danh sách truyện trực quan với thiết kế dạng lưới (Grid layout) hiện đại. Tích hợp thanh tìm kiếm thông minh theo từ khóa và bộ lọc phân loại theo thể loại truyện (Manga, Comic, Tiểu thuyết).
* **Giỏ Hàng Công Nghệ Lõi (`[gio_hang]`):** Quản lý luồng xử lý thêm/bớt/tăng/giảm số lượng và xóa sản phẩm khỏi giỏ hàng nhanh chóng. Trạng thái giỏ hàng được duy trì ổn định bằng **PHP Session**.
* **Trang Cá Nhân & Ví Điện Tử (`[my_account]`):** * Tự động kiểm tra trạng thái và hiển thị Form đăng nhập tiêu chuẩn bảo mật của WordPress nếu người dùng chưa đăng nhập.
    * Hiển thị thông tin số dư ví tiền (`wallet_balance`) của thành viên, tích hợp chức năng cho phép user tự nhập số tiền để nạp tiền vào ví.
    * Bảng tra cứu lịch sử mua hàng cá nhân tiện lợi, hiển thị đầy đủ mã đơn, thông tin nhận hàng, tổng tiền và trạng thái xử lý đơn.

### 2. Phân hệ Quản trị (Admin Backend - "H Shop Pro")
* **Quản Lý Kho Truyện:** Giao diện CRUD chuyên nghiệp cho phép Admin Thêm/Sửa/Xóa đầu truyện, cấu hình giá nhập, giá bán và số lượng trong kho. Tích hợp thư viện **WordPress Media Uploader** cùng jQuery giúp chọn ảnh bìa trực tiếp từ thư viện hệ thống.
* **Quản Lý Đơn Hàng:** Liệt kê toàn bộ danh sách đơn hàng trên hệ thống, cho phép Admin cập nhật trạng thái đơn hàng (Đang giao, Đã giao, Hủy đơn) thông qua biểu mẫu dropdown trực quan.
* **Quản Lý Số Dư Thành Viên:** Giao diện quản lý danh sách toàn bộ người dùng đăng ký trên Website. Cho phép Admin tra cứu thông tin vai trò (Role) và trực tiếp can thiệp điều chỉnh/nạp thêm tiền vào ví của từng tài khoản.

### 3. Kiến Trúc Hệ Thống & Bảo Mật
* **Cơ sở dữ liệu tùy biến (Custom Tables):** Tự động hóa hoàn toàn quy trình khởi tạo và nâng cấp cấu trúc bảng dữ liệu (`quan_ly_truyen`, `qlbh_don_hang`) trong MySQL ngay khi kích hoạt plugin bằng cơ chế Hook `register_activation_hook` kết hợp lớp đối tượng `$wpdb`.
* **Cơ chế phòng thủ đa lớp:**
    * Kiểm tra phân quyền nghiêm ngặt với `current_user_can('manage_options')` chặn đứng mọi hành vi can thiệp trái phép vào các cổng dữ liệu Backend.
    * Sử dụng chuỗi xác thực bảo mật **Nonce** (`wp_nonce_field`, `check_admin_referer`) để chống tấn công giả mạo yêu cầu từ bên thứ ba (CSRF).
    * Làm sạch và bảo mật dữ liệu đầu ra trước khi in ra trình duyệt bằng các hàm lọc chuẩn của WordPress như `esc_html()` và `esc_attr()`.

---

## 📂 Cấu Trúc Thư Mục Dự Án

```text
quan-ly-truyen-pro/
│
├── quan-ly-truyen-pro.php      # File chạy chính của Plugin, khai báo thông tin & nhúng thư viện
│
└── includes/
    ├── db-setup.php            # Tự động tạo và cấu trúc lại các bảng MySQL (Custom Tables)
    ├── admin-logic.php         # Quản lý điều hướng Menu Admin, script Media Uploader & xử lý đơn hàng
    ├── admin-ui-template.php   # Form CRUD Thêm/Sửa truyện và bảng danh sách kho dành cho Admin
    ├── admin-users.php         # Logic kiểm tra quyền, Nonce bảo mật và cập nhật ví tiền User cho Admin
    ├── frontend-logic.php      # Đăng ký CSS/Style chung, giao diện danh mục cửa hàng và xử lý giỏ hàng
    └── user-portal.php         # Shortcode trang cá nhân, form nạp tiền và lịch sử hóa đơn thành viên
