A simple number stack with result translation.

PreRequisites:
1. System needs docker compose cli to be set up.


First Time Setup:
1. Run `docker compose up`in the project root, keep it running in a seperate window.
2. Copy '.env.example' as '.env'.
3. You need to enter the 'laravel' container by using the command `docker exec -ti lt-task-laravel-1 bash` ( the name of the container may be slightly different ) while being in project root. While inside run `composer install`.
4. Focus on the open window with the  `docker compose up` running and shut it down with the ctrl + C key combination.
5. Run `./vendor/bin/sail up`in the project root.
6. Once again you need to enter the 'laravel' container as in the 3rd step. While inside run `php artisan migrate`.

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
