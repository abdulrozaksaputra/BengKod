@echo off
title BengKod - Start Laravel Dev Server
echo Starting Laravel development server...
start "" cmd /k "php artisan serve --host=127.0.0.1 --port=8000"
timeout /t 1 >nul
start "" "http://127.0.0.1:8000"
exit
