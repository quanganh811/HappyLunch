# Happy Lunch
 Các nhân viên trong tòa nhà thường đặt món theo group tầm 5-10 người, cá biệt có những nhóm đặt đồ ăn cho 15-20 người. Khi ăn thì vui đấy nhưng có một vấn đề nan giải là sharing menu, và chia tiền sau những giờ ăn trưa, mọi người thường dùng giải pháp excel, hoặc note lại trên điện thoại, tuy nhiên cũng có nhiều bất cập.  Web app Happy Lunch sẽ giải quyết vấn đề trên.
 Happy Luunch cho phép các thành viên hay đặt cơm trong tòa nhà có thể lấy menu từ now, chia sẻ với những người cùng đặt, và quên đi nỗi lo về chia tiền, miss đơn, quên thu tiền...

# Requirements:
Docker
Docker-compose

# How to start develop?
? [config port]: ./.env
Build app: php artisan ser
Manager:
app: docker exec -it ${DOCKER_APP_CONTAINER} sh
mysql: docker exec -it ${DOCKER_MYSQL_CONTAINER} mysql -u${MYSQL_USER} -p{MYSQL_PASS}

