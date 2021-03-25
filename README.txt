Welcome to my super cool job application!

This project consist in two parts, the backend made as an API Rest using Laravel Lumen and the frontend made using Angular

:::Requirements:::

For the backend

1.- PHP >= 7.1.3
2.- OpenSSL PHP Extension
3.- PDO PHP Extension
4.- Mbstring PHP Extension

For the frontend

1.- Node.js
3.- npm package manager

For more information on installing Node.js, see http://www.nodejs.org

:::Installation:::

For the backend

1.-Lumen utilizes Composer to manage its dependencies. So, before using Lumen, make sure you have Composer installed on your machine.
You can get composer here https://getcomposer.org

2.-Enter the backend project by running the following command:

```cd civitatis-api```

3.- Install the dependencies running the following command:

```composer install```

4.- Create a new database for our project.

5.- Now we copy the file  ".env.example" and rename it as ".env" and change the database information for the one in your local machine 

6.- Run the migrations and seeds to populate your DB running the following command

```php artisan migrate --seed```

7.-To serve your project locally, you may use the built-in PHP development server:

```php -S localhost:8000 -t public```

For the frontEnd

We need to use the Angular CLI to start the application.

To install the Angular CLI, open a terminal window and run the following command:

```npm install -g @angular/cli```

The Angular CLI includes a server, so that you can build and serve this app locally.

Navigate to the workspace folder, in this case civitatis-frontend.

Run the following command:

``
    cd civitatis-frontend
    npm install
``

This command will install all the dependencies our project has, once finished, we can launch our app by running the following command.

```ng serve --open```

The ng serve command launches the server, watches your files, and rebuilds the app as you make changes to those files.

The --open (or just -o) option automatically opens your browser to http://localhost:4200/.

:::Features:::

1.-This project is a SPA with Angular. 
2.-By filling the main form with the attendance date and the amount of people you wanna bring (attendance number) you can filter all activities available in that date ordered by popularity 
3.-Clicking in the "Book in" button you can buy an entrance to that activity, if successful, there will be a success message, if something is invalid, it will display an error message.  
4.-Clicking on an activity name will show a detail view with extra information.
5.-When booking in an activity, it's popularity will increase by the attendance number provided and the list will be automatically updated to consider the change in popularity.
6.-The activities table in the database is filled with random data by using factories, so every time you run the seed, 5 random activities will be created.
7.-Activities has a many to many relationship with iself in order to add related activities.
8.-Backend project contains basic functional testing.
9.-The API documentation can be seen in the following link https://documenter.getpostman.com/view/2414022/TzCHBqfj#intro 