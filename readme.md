### Test Task 

A PHP CLI service for booking rooms in office. Test Task For Alif Tech vacancy.
MVC pattern inspired.

How To Test Commands: php index.php %command-name% ...%args%

List Of All Commands:

1. room:all

Description: get list of rooms. 5 rooms are seeded by default
    
    Example: php index.php room:all

2. booking:check %startTime% %endTime% %roomId%.
    
Description: check if room is already booked
    
    Example: php index.php booking:check 15:00 16:00 1
   
3. booking:store %name% %surname% %email% %startTime% %endTime% %roomId%. 

Description: Book a room for specific time by room id (as last arg)

    Example: php index.php booking:store Bekzod Bobokhonov itprogressuz@gmail.com 15:00 16:00 1


Project is dockerized. 

### How to install:
1. make .env file from .env.example - all credentials in .env.example are valid(it's not secure but convenient way, just for testing purposes)
2. docker compose build
3. docker compose up -d
4. Enter to php container with command "docker compose exec php sh". Run migrations inside container with command "php migrations.php"