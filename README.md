# Synfony Feed project

##### Requirements for the project. Install them for your OS.
* PHP 7.2.5 or higher
* Composer
* Node.js
* Yarn

##### Run the following commands to install required modules. 
`composer install`,
`yarn install`

##### Running Symfony Application:
In the project directory run the commands:

* build frontend: `yarn encore production`
* start server: `symfony server:start`
* start websocket: `php bin/console run:websocket-server`

Open the browser to url is provided when you run the server.(http://localhost:8000/)

Navigate to home ('~/') and see the solution without websocket.

Navigate to websocket solution ('~/websocket'). 