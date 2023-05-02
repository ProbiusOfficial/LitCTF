docker build -t sql .
docker run -id --name sql_1 -p 外部端口:80 -e FALG=flag{test_flag} sql
