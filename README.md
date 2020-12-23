### Cara Install
Jalankan Perintah berikut untuk mendownload data dari repository github

```sh
$ git clone https://github.com/onekill0503/responsi3.git
$ cd responsi3
```

### Cara Menjalankan
Jalankan perintah berikut untuk menjalankan `container `

```sh
$ docker-compose up -d
```
lalu buka browser dengan url `http://locahost:8080` untuk melihat hasil nya.
<br />
*Notes : Jika masih terdapat error , mohon tunggu beberapa menit lalu buka kembali browsernya. karena butuh waktu untuk menjalankan beberapa servis*
<br />
### Informasi Image Dockerhub
Karna pada docker-compose menggunakan lebih dari 2 image . berikut adalah tautan 2 image yang saya upload ke dockerhub<br />
image db-data : https://hub.docker.com/r/onekill0503/db-data<br />
image web-data : https://hub.docker.com/r/onekill0503/web-data