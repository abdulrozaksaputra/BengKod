@echo off
title BengKod - Setup DB and Start
echo Ensure MySQL (XAMPP) is running. If not, start XAMPP Control Panel and enable MySQL, then come back and press any key.
pause
echo Running migrations (may modify your database)...
php artisan migrate --force
echo Seeding users (UserSeeder)...
php artisan db:seed --class=UserSeeder
echo Starting dev server...
start "" cmd /k "php artisan serve --host=127.0.0.1 --port=8000"
timeout /t 1 >nul
start "" "http://127.0.0.1:8000"
exit
