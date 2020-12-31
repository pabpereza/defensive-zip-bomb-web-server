# Defensive zipbomb web server
A defensive use of zips bomb in web servers to make a DoS (Deny of Service) of pentestings tools.

This server is written in python using Flask framework.

# Instalation 

Using pip for install the flask dependency:
```
pip install flask
```

## Generate your own zip boom
Using dd tool for write zero bytes. Increase bs (blocksize) or count (number of block) for generate a bigger gzip file.
```
dd if=/dev/zero bs=102400 count=102400 | gzip > 10GB.gzip
```

# Use
Execute with python3:
``` 
python flask_bomb.py  
```
