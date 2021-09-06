## Setup

1. Import file `database.sql` menggunakan PhpMyAdmin
2. Buka file `/web/app/Http/Controllers/NewsController.php`
3. Edit variabel `$host` sesuai dengan domain tempat Anda menghosting, misal
```sh
private $host = 'http://example.com';
```
4. Sesuaikan pengaturan database Anda di file `/web/.env`
3. Hosting file-file Laravel yang ada di folder **Web**
4. Buka file `/rn/src/values.js`
5. Sesuaikan host dengan domain anda, misal
```sh
const values = {
    routes: {
        host: "http://example.com",
        news: "/api/news",
        ...
    }
}
```
6. Build source code React Native yang ada di folder **rn**
7. Gunakan akun berikut untuk masuk ke aplikasi web

| Email | Password |
| ------ | ------ |
| admin@jdih.com | katasandi123 |
