## CARA INSTALL Project INI

1. Repo Project ini -> Masukkan Ke Folder ' htdocs ' Masing - Masing
2. Setelah itu bikin satu database baru di phpmyadmin, Bebas mau apa aja .. Jangan lupa pada "database.php" Disetting dlu nama DB kalian yang tadi dibuat Apa
3. kemudian import file dump "vigenesia.sql" yang terdapat di folder DB 




# Contoh API
GET : /api/user  -> menampilkan output json API RESTful <br/>
URL : http://domain/api/user <br>
<br>
POST : /api/login -> untuk login user<br>
dll

# Contoh Aplikasi akses API
URL : http://domain/listuser <br>
listuser akses curl pada function getAll mengarah ke API Get /api/user


