A simple number stack with result translation.

PreRequisites:
1. System needs docker compose cli to be set up.


First Time Setup:
1. Run `/vendor/bin/sail up`in the project root.
2. After containers are built and mounted, you might need to run `php artisan migrate` inside 'lt-task-laravel-1' container ( the name may be slightly different ). You can enter the container by using the command `docker exec -ti lt-task-laravel-1 bash` while being in project root.


Routes:
1. Route http://localhost/api/numberStack/push
	Use: For inserting numbers into the stack
	Method: POST
	Parameters: 'number'

2. Route http://localhost/api/numberStack/pop
	Use: For number retrieving which will be translated in english
	Method: GET
	Parameters: None

All responses come with valid http status codes and bodies are in json format.

Built on laravel 9.45
Package 'kwn/number-to-words' is used to translate numbers to their english representations.
