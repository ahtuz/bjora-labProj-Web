To Add the project to your PC:

1. Open terminal
2. type "git clone https://github.com/Ahtuz/bjora-labProj-Web.git" (without quotes)
3. Don't forget to cd to your desired folder
4. Wait.
5. Open the project folder in your favorite text editor.
6. Open terminal again, be sure to navigate to the project folder.
7. type "composer update --verbose --prefer-dist" (without quotes)
8. Wait.
9. Wait.
10. You can open your XAMPP while waiting, turn on Apache and MySQL.
11. On browser, type "localhost/phpmyadmin" (without quotes) and enter.
12. Create new database "bjora" (without quotes).
13. After the update finished, try to "php artisan migrate" in the text editor terminal.
14. Finally, "php artisan serve"

To overwrite all data on pull:

1. git fetch --all
2. git reset --hard origin/master
