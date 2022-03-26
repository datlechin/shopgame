# Shop game

Mã nguồn shop bán tài khoản game PHP & MySQL. Đang trong quá trình phát triển.

![](https://i.imgur.com/0Nh4qP7.png)

### Công nghệ sử dụng
- PHP, MySQL, [Database Medoo](https://medoo.in/)
- Giao diện người dùng: [MDBootstrap](https://mdbootstrap.com/)
- Giao diện admin: [AdminLTE](https://adminlte.io/)

Link nhóm zalo dev và hỗ trợ: https://zalo.me/g/ohmsbz685

### Live demo: http://34.85.99.226 (admin/admin)

## Ủng hộ mã nguồn
Sẽ rất tốt nếu bạn ủng hộ tôi để có thể duy trì và đẩy nhanh quá trình dev, bằng cách donate tiền qua qua các cổng sau:
- Momo: **0372124043** (NGO QUOC DAT)
- Vietcombank: **1017595600** (NGO QUOC DAT)

Nếu bạn không thể donate được, bạn có thể ủng hộ bằng cách thả sao cho repo này.

## Yêu cầu hệ thống

- Phiên bản PHP >= 7.4
- `pdo_mysql`, `php_curl`, `php_pdo` ext

## Hướng dẫn cài đặt:
Nếu bạn muốn tải source code bằng **Composer** thì chạy lệnh sau:
```shell
# Tải source code
composer create-project datlechin/shopgame --stability=dev

# Cài đặt
cd shopgame
composer install
```

Hoặc cài đặt bằng cách thủ công:
1. Tải source code về máy (Code -> Download zip).
2. Chạy tệp `database.sql` trong trình quản lý MySQL.
3. Cấu hình thông tin database trong tệp `app/config.php`

## Báo cáo lỗi & góp ý

Nếu bạn có báo cáo lỗi hoặc góp ý, vui lòng liên hệ với tác giả bằng cách gửi email về địa chỉ: [datlechin@gmail.com](mailto:datlechin@gmail.com) hoặc gửi tin nhắn qua zalo [datlechin](https://zalo.me/datlechin).