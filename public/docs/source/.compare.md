---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST "http://localhost/api/login" 
```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Log the user out (Invalidate the token).

> Example request:

```bash
curl -X POST "http://localhost/api/logout" 
```

```javascript
const url = new URL("http://localhost/api/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register
> Example request:

```bash
curl -X POST "http://localhost/api/register" 
```

```javascript
const url = new URL("http://localhost/api/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_9fb3f0e1a557b5316ae9600fbf6583ed -->
## api/verify
> Example request:

```bash
curl -X POST "http://localhost/api/verify" 
```

```javascript
const url = new URL("http://localhost/api/verify");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/verify`


<!-- END_9fb3f0e1a557b5316ae9600fbf6583ed -->

<!-- START_3fba263a38f92fde0e4e12f76067a611 -->
## Refresh a token.

> Example request:

```bash
curl -X POST "http://localhost/api/refresh" 
```

```javascript
const url = new URL("http://localhost/api/refresh");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/refresh`


<!-- END_3fba263a38f92fde0e4e12f76067a611 -->

<!-- START_d131f717df7db546af1657d1e7ce10f6 -->
## Get the authenticated User.

> Example request:

```bash
curl -X POST "http://localhost/api/me" 
```

```javascript
const url = new URL("http://localhost/api/me");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/me`


<!-- END_d131f717df7db546af1657d1e7ce10f6 -->

<!-- START_bbe043bf98e129f47023af9f0473869c -->
## api/articles/category
> Example request:

```bash
curl -X GET -G "http://localhost/api/articles/category" 
```

```javascript
const url = new URL("http://localhost/api/articles/category");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [],
    "status": "success"
}
```

### HTTP Request
`GET api/articles/category`


<!-- END_bbe043bf98e129f47023af9f0473869c -->

<!-- START_0d4cb2104f73e3ee9cf74a52a015de76 -->
## api/articles
> Example request:

```bash
curl -X GET -G "http://localhost/api/articles" 
```

```javascript
const url = new URL("http://localhost/api/articles");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [],
    "status": "success"
}
```

### HTTP Request
`GET api/articles`


<!-- END_0d4cb2104f73e3ee9cf74a52a015de76 -->

<!-- START_13dae03ae321714e68f43c671e0436ad -->
## api/articles/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/api/articles/1" 
```

```javascript
const url = new URL("http://localhost/api/articles/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [],
    "status": "success"
}
```

### HTTP Request
`GET api/articles/{id}`


<!-- END_13dae03ae321714e68f43c671e0436ad -->

<!-- START_eb781d716b9ea9a12530becf41d29af7 -->
## Get regions 50 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/location/regions" 
```

```javascript
const url = new URL("http://localhost/api/location/regions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Московский"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/location\/regions?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/location\/regions?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/location\/regions",
    "per_page": 50,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/location/regions`


<!-- END_eb781d716b9ea9a12530becf41d29af7 -->

<!-- START_373b99d5481a580b466f97ada8cfceb2 -->
## Get cities 50 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/location/cities" 
```

```javascript
const url = new URL("http://localhost/api/location/cities");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "region_id": 1,
            "name": "Москва"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/location\/cities?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/location\/cities?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/location\/cities",
    "per_page": 50,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/location/cities`


<!-- END_373b99d5481a580b466f97ada8cfceb2 -->

<!-- START_596474d9d4775c55875992e4392b94a7 -->
## get PatientBelly paginate list 20 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/bellies" 
```

```javascript
const url = new URL("http://localhost/api/bellies");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/bellies`


<!-- END_596474d9d4775c55875992e4392b94a7 -->

<!-- START_10d7fe99da6529ea61db5250f8cc9b26 -->
## api/bellies
> Example request:

```bash
curl -X POST "http://localhost/api/bellies" 
```

```javascript
const url = new URL("http://localhost/api/bellies");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/bellies`


<!-- END_10d7fe99da6529ea61db5250f8cc9b26 -->

<!-- START_46199db951bfe10deee82f6f6bdd40e8 -->
## find Duration by id

> Example request:

```bash
curl -X GET -G "http://localhost/api/bellies/1" 
```

```javascript
const url = new URL("http://localhost/api/bellies/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/bellies/{belly}`


<!-- END_46199db951bfe10deee82f6f6bdd40e8 -->

<!-- START_cdf5e02e9b913556f9304546d59e6c56 -->
## get patient paginate list 20 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/patients" 
```

```javascript
const url = new URL("http://localhost/api/patients");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [],
    "first_page_url": "http:\/\/localhost\/api\/patients?page=1",
    "from": null,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/patients?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/patients",
    "per_page": 20,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

### HTTP Request
`GET api/patients`


<!-- END_cdf5e02e9b913556f9304546d59e6c56 -->

<!-- START_e21961238df73c8544f00766ed069000 -->
## find patient by id

> Example request:

```bash
curl -X GET -G "http://localhost/api/patients/1" 
```

```javascript
const url = new URL("http://localhost/api/patients/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Patient] 1"
}
```

### HTTP Request
`GET api/patients/{patient}`


<!-- END_e21961238df73c8544f00766ed069000 -->

<!-- START_3f5fb4637d0ff3fe2a234f6bac0fca98 -->
## api/contractions
> Example request:

```bash
curl -X GET -G "http://localhost/api/contractions" 
```

```javascript
const url = new URL("http://localhost/api/contractions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/contractions`


<!-- END_3f5fb4637d0ff3fe2a234f6bac0fca98 -->

<!-- START_88f5999187fa6c3806be929b8342bfb8 -->
## api/contractions
> Example request:

```bash
curl -X POST "http://localhost/api/contractions" 
```

```javascript
const url = new URL("http://localhost/api/contractions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/contractions`


<!-- END_88f5999187fa6c3806be929b8342bfb8 -->

<!-- START_2ffa12a490e136c29b139610598ca4fc -->
## api/contractions/{contraction}
> Example request:

```bash
curl -X GET -G "http://localhost/api/contractions/1" 
```

```javascript
const url = new URL("http://localhost/api/contractions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/contractions/{contraction}`


<!-- END_2ffa12a490e136c29b139610598ca4fc -->

<!-- START_0d837076a1183451b8487d4b381d7c25 -->
## api/specializations/doctors
> Example request:

```bash
curl -X GET -G "http://localhost/api/specializations/doctors" 
```

```javascript
const url = new URL("http://localhost/api/specializations/doctors");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/specializations/doctors`


<!-- END_0d837076a1183451b8487d4b381d7c25 -->

<!-- START_3996aae3ed91064d2f80d0c8b5e81c73 -->
## api/doctors/reviews
> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors/reviews" 
```

```javascript
const url = new URL("http://localhost/api/doctors/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/doctors/reviews`


<!-- END_3996aae3ed91064d2f80d0c8b5e81c73 -->

<!-- START_70ad9ef21cd58690d1b277bc0ccac5e9 -->
## api/doctors/reviews
> Example request:

```bash
curl -X POST "http://localhost/api/doctors/reviews" 
```

```javascript
const url = new URL("http://localhost/api/doctors/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/doctors/reviews`


<!-- END_70ad9ef21cd58690d1b277bc0ccac5e9 -->

<!-- START_6256d08430acf84bdbd90f3485b42814 -->
## api/doctors/reviews/{review}
> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors/reviews/1" 
```

```javascript
const url = new URL("http://localhost/api/doctors/reviews/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/doctors/reviews/{review}`


<!-- END_6256d08430acf84bdbd90f3485b42814 -->

<!-- START_774744abc65e28e4368f69ef4798a8f7 -->
## get doctor paginate list 20 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors" 
```

```javascript
const url = new URL("http://localhost/api/doctors");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "rate": null,
            "created_at": "2020-05-13 11:43:10",
            "updated_at": "2020-05-13 11:43:10",
            "user": {
                "id": 1,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "email": "email@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556981",
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-13 11:43:10"
            },
            "clinics": [
                {
                    "id": 1,
                    "region_id": 1,
                    "city_id": 1,
                    "rate": null,
                    "type": "state",
                    "phone": null,
                    "name": "Центральная",
                    "text": null,
                    "address": null,
                    "lng": null,
                    "lat": null,
                    "paid": 0,
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 1,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "name": "Терапевт",
                    "photo": null,
                    "pivot": {
                        "doctor_id": 1,
                        "specialization_id": 1
                    }
                }
            ]
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/doctors?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/doctors?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/doctors",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/doctors`


<!-- END_774744abc65e28e4368f69ef4798a8f7 -->

<!-- START_d2e6f599a5874844f4a0830deeeaef34 -->
## find doctor by id

> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors/1" 
```

```javascript
const url = new URL("http://localhost/api/doctors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "user_id": 1,
    "rate": null,
    "created_at": "2020-05-13 11:43:10",
    "updated_at": "2020-05-13 11:43:10",
    "user": {
        "id": 1,
        "lang_id": 1,
        "region_id": 1,
        "city_id": 1,
        "street": "street",
        "building": "1",
        "apartment": "1",
        "role": "doctor",
        "verified": 0,
        "email": "email@email.com",
        "name": "name",
        "last_name": "last_name",
        "second_name": "second_name",
        "phone": "+74957556981",
        "created_at": "2020-05-13 11:43:10",
        "updated_at": "2020-05-13 11:43:10"
    },
    "clinics": [
        {
            "id": 1,
            "region_id": 1,
            "city_id": 1,
            "rate": null,
            "type": "state",
            "phone": null,
            "name": "Центральная",
            "text": null,
            "address": null,
            "lng": null,
            "lat": null,
            "paid": 0,
            "created_at": null,
            "updated_at": null,
            "pivot": {
                "doctor_id": 1,
                "clinic_id": 1
            }
        }
    ],
    "specialisations": [
        {
            "id": 1,
            "name": "Терапевт",
            "photo": null,
            "pivot": {
                "doctor_id": 1,
                "specialization_id": 1
            }
        }
    ]
}
```

### HTTP Request
`GET api/doctors/{doctor}`


<!-- END_d2e6f599a5874844f4a0830deeeaef34 -->

<!-- START_1abd9daec7dc72e8dfa2b8dddcc96c1a -->
## api/clinics/reviews
> Example request:

```bash
curl -X GET -G "http://localhost/api/clinics/reviews" 
```

```javascript
const url = new URL("http://localhost/api/clinics/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/clinics/reviews`


<!-- END_1abd9daec7dc72e8dfa2b8dddcc96c1a -->

<!-- START_6acc9bfda8e1dad237eee8852d08ba1b -->
## api/clinics/reviews
> Example request:

```bash
curl -X POST "http://localhost/api/clinics/reviews" 
```

```javascript
const url = new URL("http://localhost/api/clinics/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/clinics/reviews`


<!-- END_6acc9bfda8e1dad237eee8852d08ba1b -->

<!-- START_aebb1e8390e705fd8920115e6c210b47 -->
## api/clinics/reviews/{review}
> Example request:

```bash
curl -X GET -G "http://localhost/api/clinics/reviews/1" 
```

```javascript
const url = new URL("http://localhost/api/clinics/reviews/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/clinics/reviews/{review}`


<!-- END_aebb1e8390e705fd8920115e6c210b47 -->

<!-- START_4c2238d8d83ab06374d74d433004b5db -->
## api/clinics
> Example request:

```bash
curl -X GET -G "http://localhost/api/clinics" 
```

```javascript
const url = new URL("http://localhost/api/clinics");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "region_id": 1,
            "city_id": 1,
            "rate": null,
            "type": "state",
            "phone": null,
            "name": "Центральная",
            "text": null,
            "address": null,
            "lng": null,
            "lat": null,
            "paid": 0,
            "created_at": null,
            "updated_at": null,
            "city": {
                "id": 1,
                "region_id": 1,
                "name": "Москва"
            },
            "region": {
                "id": 1,
                "name": "Московский"
            },
            "departments": []
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/clinics?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/clinics?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/clinics",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/clinics`


<!-- END_4c2238d8d83ab06374d74d433004b5db -->

<!-- START_85e4896a157cade2b6477384aa6591ac -->
## api/clinics/{clinic}
> Example request:

```bash
curl -X GET -G "http://localhost/api/clinics/1" 
```

```javascript
const url = new URL("http://localhost/api/clinics/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "region_id": 1,
    "city_id": 1,
    "rate": null,
    "type": "state",
    "phone": null,
    "name": "Центральная",
    "text": null,
    "address": null,
    "lng": null,
    "lat": null,
    "paid": 0,
    "created_at": null,
    "updated_at": null,
    "city": {
        "id": 1,
        "region_id": 1,
        "name": "Москва"
    },
    "region": {
        "id": 1,
        "name": "Московский"
    },
    "departments": [],
    "schedules": [],
    "prices": []
}
```

### HTTP Request
`GET api/clinics/{clinic}`


<!-- END_85e4896a157cade2b6477384aa6591ac -->

<!-- START_5e8c51142dcb4765e5c38baa45104022 -->
## get specializations paginate list 20 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/specializations" 
```

```javascript
const url = new URL("http://localhost/api/specializations");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Терапевт",
            "photo": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/specializations?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/specializations?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/specializations",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/specializations`


<!-- END_5e8c51142dcb4765e5c38baa45104022 -->

<!-- START_fa0ecb8233e59222004cc515e4403bfd -->
## find specialization by id

> Example request:

```bash
curl -X GET -G "http://localhost/api/specializations/1" 
```

```javascript
const url = new URL("http://localhost/api/specializations/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Терапевт",
    "photo": null
}
```

### HTTP Request
`GET api/specializations/{specialization}`


<!-- END_fa0ecb8233e59222004cc515e4403bfd -->

<!-- START_c41fd5415f94a9148254be0236bd292a -->
## get Duration paginate list 20 per page

> Example request:

```bash
curl -X GET -G "http://localhost/api/durations" 
```

```javascript
const url = new URL("http://localhost/api/durations");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [],
    "first_page_url": "http:\/\/localhost\/api\/durations?page=1",
    "from": null,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/durations?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/durations",
    "per_page": 20,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

### HTTP Request
`GET api/durations`


<!-- END_c41fd5415f94a9148254be0236bd292a -->

<!-- START_027089caf0b385aaf688bb21c9acb26a -->
## find Duration by id

> Example request:

```bash
curl -X GET -G "http://localhost/api/durations/1" 
```

```javascript
const url = new URL("http://localhost/api/durations/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Duration] 1"
}
```

### HTTP Request
`GET api/durations/{duration}`


<!-- END_027089caf0b385aaf688bb21c9acb26a -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://localhost/logout" 
```

```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```

```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/1" 
```

```javascript
const url = new URL("http://localhost/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_4b47597c361f234064ee0873af8b8c5f -->
## admin/delete_record/{table}/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/delete_record/1/1" 
```

```javascript
const url = new URL("http://localhost/admin/delete_record/1/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delete_record/{table}/{id}`


<!-- END_4b47597c361f234064ee0873af8b8c5f -->

<!-- START_e40bc60a458a9740730202aaec04f818 -->
## admin
> Example request:

```bash
curl -X GET -G "http://localhost/admin" 
```

```javascript
const url = new URL("http://localhost/admin");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin`


<!-- END_e40bc60a458a9740730202aaec04f818 -->

<!-- START_dd52086f63a113c3eab51bdc3236fed9 -->
## admin/med
> Example request:

```bash
curl -X GET -G "http://localhost/admin/med" 
```

```javascript
const url = new URL("http://localhost/admin/med");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/med`


<!-- END_dd52086f63a113c3eab51bdc3236fed9 -->

<!-- START_9cf02dfbe4c53db4be73b5e9c23200af -->
## admin/med/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/med/add" 
```

```javascript
const url = new URL("http://localhost/admin/med/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/med/add`


<!-- END_9cf02dfbe4c53db4be73b5e9c23200af -->

<!-- START_6825261645e5c928009ab482fee131ff -->
## admin/med/add
> Example request:

```bash
curl -X POST "http://localhost/admin/med/add" 
```

```javascript
const url = new URL("http://localhost/admin/med/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/med/add`


<!-- END_6825261645e5c928009ab482fee131ff -->

<!-- START_4543f20d8dab8a4a04103a488a507add -->
## admin/med/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/med/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/med/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/med/edit/{id}`


<!-- END_4543f20d8dab8a4a04103a488a507add -->

<!-- START_139931ba0a39c99ac3e84da38ffe4bf5 -->
## admin/med/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/med/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/med/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/med/edit/{id}`


<!-- END_139931ba0a39c99ac3e84da38ffe4bf5 -->

<!-- START_cee839b9b599509a09ea61212b0cc5cc -->
## admin/med/info/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/med/info/1" 
```

```javascript
const url = new URL("http://localhost/admin/med/info/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/med/info/{id}`


<!-- END_cee839b9b599509a09ea61212b0cc5cc -->

<!-- START_43d0890930b672d44e5ac2e726255a6f -->
## admin/spec
> Example request:

```bash
curl -X GET -G "http://localhost/admin/spec" 
```

```javascript
const url = new URL("http://localhost/admin/spec");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/spec`


<!-- END_43d0890930b672d44e5ac2e726255a6f -->

<!-- START_1ea7bb1fee00e3fcc6c8f238f32d209a -->
## admin/spec/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/spec/add" 
```

```javascript
const url = new URL("http://localhost/admin/spec/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/spec/add`


<!-- END_1ea7bb1fee00e3fcc6c8f238f32d209a -->

<!-- START_87cfc7e504139ce400a9cc9ff9e27c3f -->
## admin/spec/add
> Example request:

```bash
curl -X POST "http://localhost/admin/spec/add" 
```

```javascript
const url = new URL("http://localhost/admin/spec/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/spec/add`


<!-- END_87cfc7e504139ce400a9cc9ff9e27c3f -->

<!-- START_9b24310dab2383373786bb4910d06ccf -->
## admin/spec/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/spec/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/spec/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/spec/edit/{id}`


<!-- END_9b24310dab2383373786bb4910d06ccf -->

<!-- START_925f1c67528b2536bc2f431938054b7e -->
## admin/spec/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/spec/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/spec/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/spec/edit/{id}`


<!-- END_925f1c67528b2536bc2f431938054b7e -->

<!-- START_eec55049db57262fee7ee722b0ce1244 -->
## admin/clinic
> Example request:

```bash
curl -X GET -G "http://localhost/admin/clinic" 
```

```javascript
const url = new URL("http://localhost/admin/clinic");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/clinic`


<!-- END_eec55049db57262fee7ee722b0ce1244 -->

<!-- START_b2c76c4d767db93440b732cb1c3441ea -->
## admin/clinic/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/clinic/add" 
```

```javascript
const url = new URL("http://localhost/admin/clinic/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/clinic/add`


<!-- END_b2c76c4d767db93440b732cb1c3441ea -->

<!-- START_8385248041413d7064fba19442c70db0 -->
## admin/clinic/add
> Example request:

```bash
curl -X POST "http://localhost/admin/clinic/add" 
```

```javascript
const url = new URL("http://localhost/admin/clinic/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/clinic/add`


<!-- END_8385248041413d7064fba19442c70db0 -->

<!-- START_b388706fe1513c02cfa7309fff226468 -->
## admin/clinic/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/clinic/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/clinic/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/clinic/edit/{id}`


<!-- END_b388706fe1513c02cfa7309fff226468 -->

<!-- START_ff5bc6e7f47e76a71042cd81cf4e8948 -->
## admin/clinic/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/clinic/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/clinic/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/clinic/edit/{id}`


<!-- END_ff5bc6e7f47e76a71042cd81cf4e8948 -->

<!-- START_13da368edb9ae4318a2f134bbefe4b38 -->
## admin/clinic/info/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/clinic/info/1" 
```

```javascript
const url = new URL("http://localhost/admin/clinic/info/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/clinic/info/{id}`


<!-- END_13da368edb9ae4318a2f134bbefe4b38 -->

<!-- START_df7286bc9cd3314bf5f5a9c5c31dbe75 -->
## admin/patient
> Example request:

```bash
curl -X GET -G "http://localhost/admin/patient" 
```

```javascript
const url = new URL("http://localhost/admin/patient");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/patient`


<!-- END_df7286bc9cd3314bf5f5a9c5c31dbe75 -->

<!-- START_29769e49dcd2b689579e76d48c0e5f3c -->
## admin/patient/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/patient/add" 
```

```javascript
const url = new URL("http://localhost/admin/patient/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/patient/add`


<!-- END_29769e49dcd2b689579e76d48c0e5f3c -->

<!-- START_c970c3a16f0ab0d4597d67f17194c23e -->
## admin/patient/add
> Example request:

```bash
curl -X POST "http://localhost/admin/patient/add" 
```

```javascript
const url = new URL("http://localhost/admin/patient/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/patient/add`


<!-- END_c970c3a16f0ab0d4597d67f17194c23e -->

<!-- START_483df2613c25a9ba98a4cfa7dd2d6455 -->
## admin/patient/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/patient/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/patient/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/patient/edit/{id}`


<!-- END_483df2613c25a9ba98a4cfa7dd2d6455 -->

<!-- START_c842a515ecfd92331540d0a971b7c269 -->
## admin/patient/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/patient/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/patient/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/patient/edit/{id}`


<!-- END_c842a515ecfd92331540d0a971b7c269 -->

<!-- START_e8f5e8af9a2f8f0747bab869cfc45746 -->
## admin/patient/info/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/patient/info/1" 
```

```javascript
const url = new URL("http://localhost/admin/patient/info/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/patient/info/{id}`


<!-- END_e8f5e8af9a2f8f0747bab869cfc45746 -->

<!-- START_fc977b3ace8eb97d10699f36a22288eb -->
## admin/reviews
> Example request:

```bash
curl -X GET -G "http://localhost/admin/reviews" 
```

```javascript
const url = new URL("http://localhost/admin/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews`


<!-- END_fc977b3ace8eb97d10699f36a22288eb -->

<!-- START_de59e3cab0e9e4abd01bd0790af81519 -->
## admin/reviews/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/reviews/add" 
```

```javascript
const url = new URL("http://localhost/admin/reviews/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/add`


<!-- END_de59e3cab0e9e4abd01bd0790af81519 -->

<!-- START_288cacbc094658f380ea9644901bfae6 -->
## admin/reviews/add
> Example request:

```bash
curl -X POST "http://localhost/admin/reviews/add" 
```

```javascript
const url = new URL("http://localhost/admin/reviews/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/reviews/add`


<!-- END_288cacbc094658f380ea9644901bfae6 -->

<!-- START_73772cac1a4db22d21e69b964770b636 -->
## admin/reviews/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/reviews/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/reviews/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/edit/{id}`


<!-- END_73772cac1a4db22d21e69b964770b636 -->

<!-- START_89c8d4a41b746e3e0a0120526ac5083c -->
## admin/reviews/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/reviews/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/reviews/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/reviews/edit/{id}`


<!-- END_89c8d4a41b746e3e0a0120526ac5083c -->

<!-- START_f3cdca82eb27ca18d29345a8dd352786 -->
## admin/duration
> Example request:

```bash
curl -X GET -G "http://localhost/admin/duration" 
```

```javascript
const url = new URL("http://localhost/admin/duration");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/duration`


<!-- END_f3cdca82eb27ca18d29345a8dd352786 -->

<!-- START_c4d846cf4c25720e57edd126b21f3f58 -->
## admin/duration/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/duration/add" 
```

```javascript
const url = new URL("http://localhost/admin/duration/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/duration/add`


<!-- END_c4d846cf4c25720e57edd126b21f3f58 -->

<!-- START_d6ed3c1938954bf58982456528172993 -->
## admin/duration/add
> Example request:

```bash
curl -X POST "http://localhost/admin/duration/add" 
```

```javascript
const url = new URL("http://localhost/admin/duration/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/duration/add`


<!-- END_d6ed3c1938954bf58982456528172993 -->

<!-- START_507bad3fcae86258a5ee3bb0e7478f78 -->
## admin/duration/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/duration/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/duration/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/duration/edit/{id}`


<!-- END_507bad3fcae86258a5ee3bb0e7478f78 -->

<!-- START_ade9a6fbcdffc8d7ed84f012968d161d -->
## admin/duration/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/duration/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/duration/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/duration/edit/{id}`


<!-- END_ade9a6fbcdffc8d7ed84f012968d161d -->

<!-- START_a1094207b8c6b7ee9ac6a82258ad3c7a -->
## admin/regions
> Example request:

```bash
curl -X GET -G "http://localhost/admin/regions" 
```

```javascript
const url = new URL("http://localhost/admin/regions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/regions`


<!-- END_a1094207b8c6b7ee9ac6a82258ad3c7a -->

<!-- START_98a7ce55181fb12a0290bbb1831342c9 -->
## admin/regions/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/regions/add" 
```

```javascript
const url = new URL("http://localhost/admin/regions/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/regions/add`


<!-- END_98a7ce55181fb12a0290bbb1831342c9 -->

<!-- START_a3965c00c8641ba3be82892c832aaea6 -->
## admin/regions/add
> Example request:

```bash
curl -X POST "http://localhost/admin/regions/add" 
```

```javascript
const url = new URL("http://localhost/admin/regions/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/regions/add`


<!-- END_a3965c00c8641ba3be82892c832aaea6 -->

<!-- START_2a1aebe3c0468fbe31222d445f877ed5 -->
## admin/regions/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/regions/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/regions/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/regions/edit/{id}`


<!-- END_2a1aebe3c0468fbe31222d445f877ed5 -->

<!-- START_fd42b70a7c1ac33fafe5869d82d750f4 -->
## admin/regions/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/regions/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/regions/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/regions/edit/{id}`


<!-- END_fd42b70a7c1ac33fafe5869d82d750f4 -->

<!-- START_85ecbe8414dce644682b715a532e8cfb -->
## admin/cities
> Example request:

```bash
curl -X GET -G "http://localhost/admin/cities" 
```

```javascript
const url = new URL("http://localhost/admin/cities");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/cities`


<!-- END_85ecbe8414dce644682b715a532e8cfb -->

<!-- START_de8f4f119c95a40b6be2d4d508350b70 -->
## admin/cities/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/cities/add" 
```

```javascript
const url = new URL("http://localhost/admin/cities/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/cities/add`


<!-- END_de8f4f119c95a40b6be2d4d508350b70 -->

<!-- START_a6efaf04a273917367bfbdc1bc414fd3 -->
## admin/cities/add
> Example request:

```bash
curl -X POST "http://localhost/admin/cities/add" 
```

```javascript
const url = new URL("http://localhost/admin/cities/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/cities/add`


<!-- END_a6efaf04a273917367bfbdc1bc414fd3 -->

<!-- START_afbd559a7bdaa22079d387d91958abfc -->
## admin/cities/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/cities/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/cities/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/cities/edit/{id}`


<!-- END_afbd559a7bdaa22079d387d91958abfc -->

<!-- START_c064b8d6d7f088a67675507c0809fae7 -->
## admin/cities/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/cities/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/cities/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/cities/edit/{id}`


<!-- END_c064b8d6d7f088a67675507c0809fae7 -->

<!-- START_044f3f8a4836fd20561e8e0313bdfc03 -->
## admin/news
> Example request:

```bash
curl -X GET -G "http://localhost/admin/news" 
```

```javascript
const url = new URL("http://localhost/admin/news");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/news`


<!-- END_044f3f8a4836fd20561e8e0313bdfc03 -->

<!-- START_61b93be6b719e46c3e42cf5f762d0a37 -->
## admin/news/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/news/add" 
```

```javascript
const url = new URL("http://localhost/admin/news/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/news/add`


<!-- END_61b93be6b719e46c3e42cf5f762d0a37 -->

<!-- START_9f52b82f827d3af991cf7635783a1b6a -->
## admin/news/add
> Example request:

```bash
curl -X POST "http://localhost/admin/news/add" 
```

```javascript
const url = new URL("http://localhost/admin/news/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/news/add`


<!-- END_9f52b82f827d3af991cf7635783a1b6a -->

<!-- START_6e88b569c18368d38cff3b90d2ba0b75 -->
## admin/news/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/news/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/news/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/news/edit/{id}`


<!-- END_6e88b569c18368d38cff3b90d2ba0b75 -->

<!-- START_72522ddc7bcf82937726fe60715e0188 -->
## admin/news/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/news/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/news/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/news/edit/{id}`


<!-- END_72522ddc7bcf82937726fe60715e0188 -->

<!-- START_c66caeb2a43c15ebbb0beffcecbed54a -->
## admin/articles
> Example request:

```bash
curl -X GET -G "http://localhost/admin/articles" 
```

```javascript
const url = new URL("http://localhost/admin/articles");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/articles`


<!-- END_c66caeb2a43c15ebbb0beffcecbed54a -->

<!-- START_3c6933b6784af4df26757ba6ddf44d15 -->
## admin/articles/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/articles/add" 
```

```javascript
const url = new URL("http://localhost/admin/articles/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/articles/add`


<!-- END_3c6933b6784af4df26757ba6ddf44d15 -->

<!-- START_d06971b48755a9a647e607214288e254 -->
## admin/articles/add
> Example request:

```bash
curl -X POST "http://localhost/admin/articles/add" 
```

```javascript
const url = new URL("http://localhost/admin/articles/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/articles/add`


<!-- END_d06971b48755a9a647e607214288e254 -->

<!-- START_292852f4a8431208228ae6db546cd3bd -->
## admin/articles/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/articles/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/articles/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/articles/edit/{id}`


<!-- END_292852f4a8431208228ae6db546cd3bd -->

<!-- START_1b6cd7178674d5a4a2f3b6ddfacc8eee -->
## admin/articles/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/articles/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/articles/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/articles/edit/{id}`


<!-- END_1b6cd7178674d5a4a2f3b6ddfacc8eee -->

<!-- START_40fcb21504fb8607df1204385ec38978 -->
## admin/recs
> Example request:

```bash
curl -X GET -G "http://localhost/admin/recs" 
```

```javascript
const url = new URL("http://localhost/admin/recs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/recs`


<!-- END_40fcb21504fb8607df1204385ec38978 -->

<!-- START_1b457af38b7fd2ac0460471af9d8c8f2 -->
## admin/recs/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/recs/add" 
```

```javascript
const url = new URL("http://localhost/admin/recs/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/recs/add`


<!-- END_1b457af38b7fd2ac0460471af9d8c8f2 -->

<!-- START_7b41165e306f4c8218e9f2a867426038 -->
## admin/recs/add
> Example request:

```bash
curl -X POST "http://localhost/admin/recs/add" 
```

```javascript
const url = new URL("http://localhost/admin/recs/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/recs/add`


<!-- END_7b41165e306f4c8218e9f2a867426038 -->

<!-- START_758ebd68a9b305b346d12520b0d968ff -->
## admin/recs/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/recs/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/recs/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/recs/edit/{id}`


<!-- END_758ebd68a9b305b346d12520b0d968ff -->

<!-- START_d29db6259e203d85fa255383c98b93e1 -->
## admin/recs/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/recs/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/recs/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/recs/edit/{id}`


<!-- END_d29db6259e203d85fa255383c98b93e1 -->

<!-- START_69a7f821a247168944d08b5981561e48 -->
## admin/docs
> Example request:

```bash
curl -X GET -G "http://localhost/admin/docs" 
```

```javascript
const url = new URL("http://localhost/admin/docs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/docs`


<!-- END_69a7f821a247168944d08b5981561e48 -->

<!-- START_2f9408b209c307306953b5997baec294 -->
## admin/docs/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/docs/add" 
```

```javascript
const url = new URL("http://localhost/admin/docs/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/docs/add`


<!-- END_2f9408b209c307306953b5997baec294 -->

<!-- START_742cadb472138568d999c9fb880ab7f3 -->
## admin/docs/add
> Example request:

```bash
curl -X POST "http://localhost/admin/docs/add" 
```

```javascript
const url = new URL("http://localhost/admin/docs/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/docs/add`


<!-- END_742cadb472138568d999c9fb880ab7f3 -->

<!-- START_6e99d9ede840e32e147036a9e649d618 -->
## admin/docs/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/docs/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/docs/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/docs/edit/{id}`


<!-- END_6e99d9ede840e32e147036a9e649d618 -->

<!-- START_95a7036e43143fda4bc3272462d1b5ea -->
## admin/docs/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/docs/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/docs/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/docs/edit/{id}`


<!-- END_95a7036e43143fda4bc3272462d1b5ea -->

<!-- START_9e7eb841fae1b6142ea0f31b5e0e59d2 -->
## admin/msg
> Example request:

```bash
curl -X GET -G "http://localhost/admin/msg" 
```

```javascript
const url = new URL("http://localhost/admin/msg");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/msg`


<!-- END_9e7eb841fae1b6142ea0f31b5e0e59d2 -->

<!-- START_d767753fbd5803987baa06df0c918ed1 -->
## admin/msg/chat/{chat_id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/msg/chat/1" 
```

```javascript
const url = new URL("http://localhost/admin/msg/chat/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/msg/chat/{chat_id}`


<!-- END_d767753fbd5803987baa06df0c918ed1 -->

<!-- START_4177121e5110a7493a43727d6aa55753 -->
## admin/msg/chat/{chat_id}
> Example request:

```bash
curl -X POST "http://localhost/admin/msg/chat/1" 
```

```javascript
const url = new URL("http://localhost/admin/msg/chat/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/msg/chat/{chat_id}`


<!-- END_4177121e5110a7493a43727d6aa55753 -->

<!-- START_4dbd235a7841b6401b7e3995c96da2ce -->
## admin/langs
> Example request:

```bash
curl -X GET -G "http://localhost/admin/langs" 
```

```javascript
const url = new URL("http://localhost/admin/langs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/langs`


<!-- END_4dbd235a7841b6401b7e3995c96da2ce -->

<!-- START_50692a2b397762b5f72e305807a22c21 -->
## admin/langs/add
> Example request:

```bash
curl -X GET -G "http://localhost/admin/langs/add" 
```

```javascript
const url = new URL("http://localhost/admin/langs/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/langs/add`


<!-- END_50692a2b397762b5f72e305807a22c21 -->

<!-- START_9f998014e748de11ad10ef7b039b0ba0 -->
## admin/langs/add
> Example request:

```bash
curl -X POST "http://localhost/admin/langs/add" 
```

```javascript
const url = new URL("http://localhost/admin/langs/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/langs/add`


<!-- END_9f998014e748de11ad10ef7b039b0ba0 -->

<!-- START_d13c424d84b114481b2efd17fe209cb7 -->
## admin/langs/edit/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/admin/langs/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/langs/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/langs/edit/{id}`


<!-- END_d13c424d84b114481b2efd17fe209cb7 -->

<!-- START_dd8e40501ca6d234613ea619e0fff055 -->
## admin/langs/edit/{id}
> Example request:

```bash
curl -X POST "http://localhost/admin/langs/edit/1" 
```

```javascript
const url = new URL("http://localhost/admin/langs/edit/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/langs/edit/{id}`


<!-- END_dd8e40501ca6d234613ea619e0fff055 -->


