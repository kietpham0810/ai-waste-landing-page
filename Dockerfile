# Sử dụng image PHP 8.2 có tích hợp sẵn web server Apache
FROM php:8.2-apache

# Copy toàn bộ mã nguồn hiện tại vào thư mục mặc định của Apache
COPY . /var/www/html/

# Render sẽ cung cấp cổng qua biến môi trường PORT. 
# Cấu hình Apache lắng nghe trên cổng này thay vì cổng 80 mặc định.
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Cấp quyền đọc file cho server
RUN chown -R www-data:www-data /var/www/html/