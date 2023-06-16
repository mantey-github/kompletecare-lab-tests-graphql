# KompleteCare Lab Tests GraphqlAPIGateway
A laravel-based backend app (API) that fetches and submits laboratory tests using [graphql](https://graphql.org/)


### Project setup
create a ```.env``` file with your database details

#### Database
Setup database by running the command below
```
php artisan migrate
```

Seed the database with some users and lab tests data:
```
php artisan migrate:fresh --seed
```

#### Run
Run the command below and access with `/graphiql` and try the queries.
```
php artisan serve
```

#### Accessing the Endpoints Locally 
[http://localhost:8000/graphiql](http://localhost:8000/graphiql) or [http://127.0.0.1:8000/graphiql](http://127.0.0.1:8000/graphiql)
