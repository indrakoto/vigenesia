## CARA INSTALL Project INI

1. Repo Project ini -> Masukkan Ke Folder ' htdocs ' Masing - Masing
2. Setelah itu bikin satu database baru di phpmyadmin, Bebas mau apa aja .. Jangan lupa pada "database.php" Disetting dlu nama DB kalian yang tadi dibuat Apa
3. kemudian import file dump "vigenesia.sql" yang terdapat di folder DB 




# Contoh API
GET : /api/user  -> Untuk Mengambil List disaat Login <br/>
POST : /api/login -> Untuk Login User yang sudah registrasi<br>

# Contoh Aplikasi akses API
url : http://domain/listuser <br>
listuser akses curl pada function getAll mengarah ke API Get /api/user


