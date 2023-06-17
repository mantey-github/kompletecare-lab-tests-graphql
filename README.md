# KompleteCare Lab Tests GraphqlAPIGateway
A laravel-based backend app (API) that fetches and submits laboratory tests using [graphql](https://graphql.org/)


### Project setup
Create a ```.env``` file with your database details.

Run ```composer install``` to install app's dependencies.

### Database
Setup database by running the command below. 
This will also seed in fake user and lab tests data.
```
php artisan migrate:fresh --seed
```

Sample credentials
```
email: daniel.mantey@example.com
password: patient123
```

### Run
Run the command and access the API endpoint at `/graphql`. 
To execute queries and mutations with the graphql playground use `/graphiql`.
```
php artisan serve
```

### Accessing the Endpoints 
#### Local server 
On your local machine access the app with the endpoints below;
```
The API Endpoint:
http://localhost:8000/graphql or http://127.0.0.1:8000/graphql

The Playground
http://localhost:8000/graphiql or http://127.0.0.1:8000/graphiql
```

#### Remote server
```
The API Endpoint:
http://localhost:8000/graphql or http://127.0.0.1:8000/graphql
```

### Making requests
From the graphql playground. You can make requests with the following queries and mutations below;

Remember to set the Authorization Header Token. (Get the token after logging in)
```
{
  "Authorization": "Bearer ${token}"
}
```

Log in user to get auth token
```
mutation {
  login(input: { email: "patient123@kompletecare.com", password: "patient123" }) {
    token
  }
}
```

Get logged in patient information
```
{
  patient {
    id
    name
    email
    medicalRecord {
      id
      labs {
        ctScan
        mriScan
      }
    }
  }
}
```

List all laboratory tests by type
```
{
  labTestGroups {
    type
    tests {
      id
      name
    }
  }
}
```

Update logged in patient medical record
```
mutation {
  updateMedicalRecord(
    input: {
    	labs: {
            xRayScan: ["Chest", "Cervical Vertebrae", "Wrist Joint"], 
            ultrasoundScan: ["Obstetric", "Prostrate"], 
            ctScan: "Coronary",  
            mriScan: "Pelvic MRI"
    	}
    }
  ) {
    id
    labs {
      xRayScan
      ultrasoundScan
      ctScan
      mriScan
    }
    patient {
      id
      name
      email
    }
  }
}
```