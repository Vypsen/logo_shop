## Requirements
You need to have PHP version **8.0** or above and composer and docker.

## Installation

#### Backend
1. Clone the project (https://github.com/Vypsen/logo_shop.git)
2. Go to the project root directory
3. Copy `.env.example` into `.env` file and adjust parameters
4. Run `composer install` 
5. Run `./vendor/bin/sail up` or `./vendor/bin/sail up -d` to start the project at http://localhost:80
6. Create database
7. Run `./vendor/bin/sail php artisan storage:link`
8. Run `./vendor/bin/sail php artisan migrate --seed`


#### Frontend
1. Delete file package-lock.json
2. Install Node.js (https://nodejs.org/en/) [LTS version recommended]
3. Run command 'npx install' from front-end root derictory 
4. Run command 'npm start'

