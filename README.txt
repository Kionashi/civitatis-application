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

This project is a SPA so no reload is needed. 
By filling the main form with the attendance date and the amount of people you wanna bring (attendance number) you can filter all activities available in that date ordered by popilarity 
Clicking in the "Book in" button you can buy an entrance to that activity, if successful, there will be a success message, if something is invalid, it will display an error message.  
Clicking on an activity name will show a detail view with extra information.
When booking in an activity, it's popularity will increase by the attendance number provided and the list will be automatically updated to consider the change in popularity.
The activities table in the Database is filled with random data by using factories, so every time you run the seed, 5 random activities will be created.
