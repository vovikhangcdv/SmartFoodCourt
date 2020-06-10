## Build Server

- `sudo apt-get install docker`
- Cd vào thư mục src
- `docker run -t -d --name SmartFoodCourt --mount type=bind,source="$PWD",target=/app -p 8080:80 mattrayner/lamp:latest-1804`
- `docker start SmartFoodCourt`
- `docker exec -it SmartFoodCourt bash`
- `cd /app`
- `apt install phpmyadmin php-mbstring php-gettext`
- `service mysql start`
- Tạo mật khẩu cho root server: `mysql_secure_installation utility`
- Đăng nhập mysql: `mysql -u root -p` -> Nhập pass
- `CREATE USER 'smartfoodcourt'@'localhost' IDENTIFIED BY 'bksmartfoodcourt!';`
- `create database SmartFoodCourt_DB;`
- `GRANT ALL PRIVILEGES ON SmartFoodCourt_DB.* TO 'smartfoodcourt'@'localhost';`
- `FLUSH PRIVILEGES;`
- `exit`
- `mysql -u smartfoodcourt -p SmartFoodCourt_DB < SmartFoodCourt_DB.sql`
- `service apache2 start`