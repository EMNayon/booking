# QR Code Generator Application
This project related to DGHS of Bangladesh

#Installation Process
Run following command step by step
1. At first open your terminal (If you install on local machine) or search terminal in cpanel and open the terminal from corresponding folder which is you bind with you domain. then flow the below steps:
2. `git clone https://github.com/mh-shuvo/qr-code.git`
3. `cp .env.example .env`
4. `composer update`
5. `php artisan key:generate`
6. create a new database as a `qrcode` using phpmyadmin or others mysql client.
7. update .env file with database name
8. run `php artisan migrate`
9. run `php artisan db:seed`
10. `php artisan serve`
11. visit `localhost:8000/`
12. login with `username: admin@gmail.com and password=12345678`

NoteBook: Must be ensure you have install git,composer and local server

#Contributor
1. **Mehedi Hasan**  `Senior Programmer & Team Lead`
2. **Noman Chowdhury**   `FrontEnd Designer and Associate Programmer`
3. **Sirajul Islam**   `Junior Programmer`
