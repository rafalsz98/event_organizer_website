docker run --name=mysql -p 3306:3306 --rm --env MYSQL_ROOT_PASSWORD=root123 --env MYSQL_DATABASE=event_web --env MYSQL_USER=admin --env MYSQL_PASSWORD=123 -d mysql/mysql-server:8.0
