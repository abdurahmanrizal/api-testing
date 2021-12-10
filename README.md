# Step for install this project

1. git clone based remote origin url for github
2. composer install (if error check your php version, this project use php version >= 7.3)
3. create your file .env
   change this property below

-   DB_DATABASE = YOUR_DATABASE_NAME
-   DB_USERNAME = YOUR_USERNAME_FOR_ACCESS_DB
-   DB_PASSWORD = YOUR_PASSWORD_FOR_ACCESS_DB

3. import SQL file
4. Happy Coding :)

# Rules Code

1. Create your controller with PascalCaseController and meaning name
    - ex: UserController - meaning controller for handle user
2. Create your route with meaning name
    - ex: user - meaning route for handle user
3. if your route have any same path name, recommendation use group for handle route
    - ex: user/profile => GET, user/data/{id} => GET, user/add => POST
    - use:
    ```
    $router->group(['prefix' => 'user'], function() use ($router) {
         $router->get('profile', 'YOUR_CONTROLLER');
         $router->get('data/{id}', 'YOUR_CONTROLLER');
         $router->post('add', 'YOUR_CONTROLLER');
    });
    ```

# Rules Return API

Status Code

1. 1×× Informational
2. 2×× Success
3. 3×× Redirection
4. 4×× Client Error
5. 5×× Server Error

```
return response()->json([
    'code' => status_code
    'success' => boolean (true/false),
    'message' => YOUR_MESSAGE,
    'data'    => YOUR_DATA (if not success fill with the empty array)
], status_code);
```
