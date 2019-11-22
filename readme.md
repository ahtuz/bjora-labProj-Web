# To Add the project to your PC:
1. Open terminal, cd to your desired folder
2. type `git clone https://github.com/Ahtuz/bjora-labProj-Web.git`.
3. Wait.
4. Open the project folder in your favorite text editor.
5. Open terminal again, be sure to navigate to the project folder.
6. type `composer update --verbose --prefer-dist`.
7. Wait.
8. Wait.
9. You can open your XAMPP while waiting, turn on Apache and MySQL.
10. On browser, type `localhost/phpmyadmin`. and enter.
11. Create new database "bjora" (without quotes).
12. After the update finished, try to `php artisan migrate` in the text editor terminal.
13. Finally, `php artisan serve`.

# To overwrite all data on pull:
> (I suppose you already in the project folder)
1. `git fetch --all`
2. `git reset --hard origin/master`

# To push what you did:
> (I suppose you already in the project folder)
1. `git add .`
2. `git commit -m "write what you update here"`
3. `git push origin master`
