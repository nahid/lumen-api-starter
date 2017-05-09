# Lumen API Starter

A starter project to develop API with Lumen 5.4.

### Included Packages
- tymon/jwt-auth
- barryvdh/laravel-cors
- dingo/api
- prettus/l5-repository
- flipbox/lumen-generator
- filp/whoops
- widnyana/lumen-dingo-routes-list

### Installation
- Clone the Repo:
    - `git clone git@github.com:munza/lumen-api-starter.git`
    - `git clone https://github.com/munza/lumen-api-starter.git`
- `cd lumen-api-starter`
- `composer create-project`
- `php artisan key:generate`
- `php artisan jwt:secret`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan serve`

### Configuration
- Edit `.env` file for database connection configuration.
- Edit `config/provider.php` for registering service providers.
- Edit `config/middleware.php` for registering middlewares.
- Edit `config/bindings.php` for registering repository contract to concrete classes.
- Edit `config/cors.php` for CORS configuration.
- Edit `config/exception.php` for registering exception handlers.

### Usage

#### Adding a new resource endpoint
- Add endpoint in `routes/api.php`.
    ```php
        $api->group(['middleware' => 'api.auth'], function() use ($api) {
            $api->resource('posts', 'PostController', [ 'only' => ['index', 'store', 'show', 'update', 'destroy']]);
        });
    ```
- Add controller at `app/Http/Controllers/Api/V1/PostController.php`
    ```php
        <?php
        
        namespace App\Http\Controllers\Api\V1;
        
        use Illuminate\Http\Request;
        use App\Http\Controllers\Api\ApiController;
        
        class PostController extends ApiController
        {
            /**
             * Model repository.
             *
             * @var \Prettus\Repository\Eloquent\BaseRepository
             */
            protected $repository = \App\Repositories\PostRepository::class;
        }
    ```
- Add repository at 'app/Http/Repositories/PostRepository.php'
    ```php
        <?php
        
        namespace App\Repositories;
        
        class PostRepository extends Repository
        {
            /**
             * Specify model class.
             *
             * @return string
             */
            public function model()
            {
                return \App\Models\Post::class;
            }
        }
    ```
- Add model at 'app/Models/Post.php' with `php artisan make:model Models/Post`
- Checkout [l5-repository](https://github.com/andersao/l5-repository) package to understand how to use Transformer, Presenter and Validator.

### Issues
Please create an issue if you find any bug or error.

### Contribution
Feel free to make a pull request if you want to add anything.

### License
MIT
