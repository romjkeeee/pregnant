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

#Articles


APIs for
<!-- START_bbe043bf98e129f47023af9f0473869c -->
## List category
Список категорий статей

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/articles/category", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "title": "Еда",
            "created_at": "15.05.2020 23:59",
            "updated_at": "15.05.2020 23:59"
        },
        {
            "id": 2,
            "title": "Роды",
            "created_at": "15.05.2020 23:59",
            "updated_at": "26.05.2020 13:00"
        },
        {
            "id": 3,
            "title": "Спорт",
            "created_at": "16.05.2020 00:02",
            "updated_at": "25.05.2020 18:10"
        },
        {
            "id": 4,
            "title": "Привычки",
            "created_at": "25.05.2020 18:09",
            "updated_at": "25.05.2020 18:10"
        }
    ],
    "links": {
        "self": "link-value"
    }
}
```

### HTTP Request
`GET api/articles/category`


<!-- END_bbe043bf98e129f47023af9f0473869c -->

<!-- START_0d4cb2104f73e3ee9cf74a52a015de76 -->
## List
Список статей по категориям

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/articles", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 6,
            "title": "Статья 1",
            "text": "Статья 11",
            "image": "http:\/\/localhost\/images\/articles\/images\/Qc53ukXwMJGTLpIlhsrwggGRdq7iOZ1eSDkGdNzx.png",
            "preview": "http:\/\/localhost\/images\/articles\/previews\/GAHQbc8DaOflcyNRoAexiKfVjDqWrVLfTAazqrJ6.png",
            "created_at": "28.05.2020 18:29",
            "updated_at": "28.05.2020 18:29",
            "category": {
                "id": 1,
                "title": "Еда",
                "created_at": "15.05.2020 23:59",
                "updated_at": "15.05.2020 23:59"
            }
        },
        {
            "id": 7,
            "title": "Статья 2",
            "text": "Статья 22",
            "image": "http:\/\/localhost\/images\/articles\/images\/asw4M6MFlswZNpGy0ytFZs80fQNUo20PjKqp1Qkv.png",
            "preview": "http:\/\/localhost\/images\/articles\/previews\/RgpM3CSFUQpOt261dZ0V7dz7BBnrEaqGsxo5zXSJ.png",
            "created_at": "28.05.2020 18:30",
            "updated_at": "28.05.2020 18:30",
            "category": {
                "id": 1,
                "title": "Еда",
                "created_at": "15.05.2020 23:59",
                "updated_at": "15.05.2020 23:59"
            }
        },
        {
            "id": 8,
            "title": "Статья 3",
            "text": "Статья 33",
            "image": "http:\/\/localhost\/images\/articles\/images\/J9pWVrAj1rSfIPXzwiwM8A5mNbdsVfqxINQQyHNU.jpeg",
            "preview": "http:\/\/localhost\/images\/articles\/previews\/yjzfc63bEfm5FB7LPTizMFxL7znnnz1yipJ3xkPv.jpeg",
            "created_at": "28.05.2020 18:31",
            "updated_at": "28.05.2020 18:31",
            "category": {
                "id": 2,
                "title": "Роды",
                "created_at": "15.05.2020 23:59",
                "updated_at": "26.05.2020 13:00"
            }
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http:\/\/localhost\/api\/articles?page=1",
        "last": "http:\/\/localhost\/api\/articles?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/articles",
        "per_page": 10,
        "to": 3,
        "total": 3
    }
}
```

### HTTP Request
`GET api/articles`


<!-- END_0d4cb2104f73e3ee9cf74a52a015de76 -->

<!-- START_13dae03ae321714e68f43c671e0436ad -->
## Show
Показать конкретную статью

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/articles/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/articles/{id}`


<!-- END_13dae03ae321714e68f43c671e0436ad -->

#Auth


APIs for
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/login", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/logout", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register

> Example request:

```bash
curl -X POST "http://localhost/api/register" \
    -H "Content-Type: application/json" \
    -d '{"name":"qui","last_name":"magni","second_name":"est","phone":"+74957556981","role":"doctor or patient","email":"ratione","region_id":20,"city_id":14,"street":"quam","building":"ipsum","apartment":"est","password":"deleniti","password_confirmation":"nihil","lang_id":5}'

```

```javascript
const url = new URL("http://localhost/api/register");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "qui",
    "last_name": "magni",
    "second_name": "est",
    "phone": "+74957556981",
    "role": "doctor or patient",
    "email": "ratione",
    "region_id": 20,
    "city_id": 14,
    "street": "quam",
    "building": "ipsum",
    "apartment": "est",
    "password": "deleniti",
    "password_confirmation": "nihil",
    "lang_id": 5
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/register", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "name" => "qui",
            "last_name" => "magni",
            "second_name" => "est",
            "phone" => "+74957556981",
            "role" => "doctor or patient",
            "email" => "ratione",
            "region_id" => "20",
            "city_id" => "14",
            "street" => "quam",
            "building" => "ipsum",
            "apartment" => "est",
            "password" => "deleniti",
            "password_confirmation" => "nihil",
            "lang_id" => "5",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/register`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Имя пользователя
    last_name | string |  required  | Фамилия пользователя
    second_name | string |  required  | Отчество
    phone | string |  required  | Номер телефона
    role | string |  required  | Роль
    email | string |  required  | Емейл
    region_id | integer |  required  | Регион
    city_id | integer |  required  | Город
    street | string |  required  | Улица
    building | string |  required  | Дом
    apartment | string |  required  | Квартира
    password | string |  required  | пароль
    password_confirmation | string |  required  | повторите пароль
    lang_id | integer |  required  | Язык

<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_9fb3f0e1a557b5316ae9600fbf6583ed -->
## Verify

> Example request:

```bash
curl -X POST "http://localhost/api/verify" \
    -H "Content-Type: application/json" \
    -d '{"code":"nam"}'

```

```javascript
const url = new URL("http://localhost/api/verify");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": "nam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/verify", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "code" => "nam",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/verify`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | string |  required  | смс код

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/refresh", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/me", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/me`


<!-- END_d131f717df7db546af1657d1e7ce10f6 -->

<!-- START_f8887be7004f3206fae041b87c817441 -->
## Set lang

> Example request:

```bash
curl -X POST "http://localhost/api/me/lang" 
```

```javascript
const url = new URL("http://localhost/api/me/lang");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/me/lang", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/me/lang`


<!-- END_f8887be7004f3206fae041b87c817441 -->

<!-- START_2c9eb36c41712a95797b463b554966eb -->
## Update phone

> Example request:

```bash
curl -X POST "http://localhost/api/me/phone" \
    -H "Content-Type: application/json" \
    -d '{"phone":"explicabo"}'

```

```javascript
const url = new URL("http://localhost/api/me/phone");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "phone": "explicabo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/me/phone", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "phone" => "explicabo",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/me/phone`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    phone | string |  required  | 

<!-- END_2c9eb36c41712a95797b463b554966eb -->

<!-- START_5acc6c4e3d64b2d9636e647ace767328 -->
## Update location

> Example request:

```bash
curl -X POST "http://localhost/api/me/location" \
    -H "Content-Type: application/json" \
    -d '{"region_id":"deleniti","city_id":"quaerat","street":"quas","building":"aut","apartment":"mollitia"}'

```

```javascript
const url = new URL("http://localhost/api/me/location");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "region_id": "deleniti",
    "city_id": "quaerat",
    "street": "quas",
    "building": "aut",
    "apartment": "mollitia"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/me/location", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "region_id" => "deleniti",
            "city_id" => "quaerat",
            "street" => "quas",
            "building" => "aut",
            "apartment" => "mollitia",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/me/location`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    region_id | string |  required  | 
    city_id | string |  required  | 
    street | string |  required  | 
    building | string |  required  | 
    apartment | string |  optional  | 

<!-- END_5acc6c4e3d64b2d9636e647ace767328 -->

<!-- START_b456f2ee7ce6de76eabc3ac087d397e1 -->
## Set notification

> Example request:

```bash
curl -X POST "http://localhost/api/me/notification" 
```

```javascript
const url = new URL("http://localhost/api/me/notification");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/me/notification", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/me/notification`


<!-- END_b456f2ee7ce6de76eabc3ac087d397e1 -->

<!-- START_f74dac7b78b1b110f3d8bd765f54cbf4 -->
## Update name

> Example request:

```bash
curl -X POST "http://localhost/api/me/name" \
    -H "Content-Type: application/json" \
    -d '{"name":"harum","last_name":"autem","second_name":"dolorum"}'

```

```javascript
const url = new URL("http://localhost/api/me/name");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "harum",
    "last_name": "autem",
    "second_name": "dolorum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/me/name", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "name" => "harum",
            "last_name" => "autem",
            "second_name" => "dolorum",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/me/name`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | 
    last_name | string |  optional  | 
    second_name | string |  required  | 

<!-- END_f74dac7b78b1b110f3d8bd765f54cbf4 -->

#Chat


APIs for
<!-- START_d9a7f14ac04a2a4180db2014d1b1eea7 -->
## api/chat/send
> Example request:

```bash
curl -X POST "http://localhost/api/chat/send" 
```

```javascript
const url = new URL("http://localhost/api/chat/send");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/chat/send", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/chat/send`


<!-- END_d9a7f14ac04a2a4180db2014d1b1eea7 -->

<!-- START_e68fb882eee1a84b388c1b17671cb0b5 -->
## api/chat/start
> Example request:

```bash
curl -X POST "http://localhost/api/chat/start" 
```

```javascript
const url = new URL("http://localhost/api/chat/start");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/chat/start", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/chat/start`


<!-- END_e68fb882eee1a84b388c1b17671cb0b5 -->

<!-- START_6d342bbf7c4103bec385380a092a5ce6 -->
## api/chat/list
> Example request:

```bash
curl -X GET -G "http://localhost/api/chat/list" 
```

```javascript
const url = new URL("http://localhost/api/chat/list");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/chat/list", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/chat/list`


<!-- END_6d342bbf7c4103bec385380a092a5ce6 -->

<!-- START_ac265984ad6c19fa50938064c2fd1f40 -->
## api/chat/messages
> Example request:

```bash
curl -X GET -G "http://localhost/api/chat/messages" 
```

```javascript
const url = new URL("http://localhost/api/chat/messages");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/chat/messages", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/chat/messages`


<!-- END_ac265984ad6c19fa50938064c2fd1f40 -->

#Check List


APIs for
<!-- START_8f80620b1b19c9d55405a474b5694c0d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/check-lists" 
```

```javascript
const url = new URL("http://localhost/api/check-lists");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/check-lists", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/check-lists`


<!-- END_8f80620b1b19c9d55405a474b5694c0d -->

<!-- START_a17bcf05d81ee6a923f2ec67bb6597a6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/check-lists" 
```

```javascript
const url = new URL("http://localhost/api/check-lists");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/check-lists", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/check-lists`


<!-- END_a17bcf05d81ee6a923f2ec67bb6597a6 -->

<!-- START_fea21f34c8bff578d65a59d05bd1d484 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/check-lists/1" 
```

```javascript
const url = new URL("http://localhost/api/check-lists/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("http://localhost/api/check-lists/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/check-lists/{check_list}`


<!-- END_fea21f34c8bff578d65a59d05bd1d484 -->

#Clinic


APIs for
<!-- START_4c2238d8d83ab06374d74d433004b5db -->
## List
Список клиник

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/clinics", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```
> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/clinics`


<!-- END_4c2238d8d83ab06374d74d433004b5db -->

<!-- START_85e4896a157cade2b6477384aa6591ac -->
## Show
Показать клинику

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/clinics/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```
> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/clinics/{clinic}`


<!-- END_85e4896a157cade2b6477384aa6591ac -->

#Clinic review


APIs for
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/clinics/reviews", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/clinics/reviews", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/clinics/reviews/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/clinics/reviews/{review}`


<!-- END_aebb1e8390e705fd8920115e6c210b47 -->

#Contraction


APIs for
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/contractions", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/contractions", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/contractions/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

<!-- START_70c77c79ab8da8f8284ca7a0f7bd5acf -->
## api/contractions/{contraction}
> Example request:

```bash
curl -X DELETE "http://localhost/api/contractions/1" 
```

```javascript
const url = new URL("http://localhost/api/contractions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("http://localhost/api/contractions/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/contractions/{contraction}`


<!-- END_70c77c79ab8da8f8284ca7a0f7bd5acf -->

#Doctor


APIs for
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/specializations/doctors", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/doctors/reviews", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/doctors/reviews", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/doctors/reviews/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/doctors/reviews/{review}`


<!-- END_6256d08430acf84bdbd90f3485b42814 -->

<!-- START_286d9ac41ec7b34302d6608bb26afa29 -->
## api/doctors/educations
> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors/educations" 
```

```javascript
const url = new URL("http://localhost/api/doctors/educations");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/doctors/educations", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/doctors/educations`


<!-- END_286d9ac41ec7b34302d6608bb26afa29 -->

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/doctors", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/doctors/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/doctors/{doctor}`


<!-- END_d2e6f599a5874844f4a0830deeeaef34 -->

#Duration


APIs for
<!-- START_5ca86d0f5dd1688d27e33eaaef98f7f3 -->
## List Duration Articles
Список статей по категориям по 20шт

> Example request:

```bash
curl -X GET -G "http://localhost/api/duration-articles" 
```

```javascript
const url = new URL("http://localhost/api/duration-articles");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/duration-articles", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/duration-articles`


<!-- END_5ca86d0f5dd1688d27e33eaaef98f7f3 -->

<!-- START_624ca5c4db55ccb79bf2ef783c17882e -->
## Show Duration Article
просмотр статьи

> Example request:

```bash
curl -X GET -G "http://localhost/api/duration-articles/1" 
```

```javascript
const url = new URL("http://localhost/api/duration-articles/1");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/duration-articles/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/duration-articles/{id}`


<!-- END_624ca5c4db55ccb79bf2ef783c17882e -->

<!-- START_813f6cfa3f753d159c0595fde52e1332 -->
## Get duration
Получения недели беременности с статьей для нее

> Example request:

```bash
curl -X GET -G "http://localhost/api/my-duration" \
    -H "Content-Type: application/json" \
    -d '{"phone":"ea"}'

```

```javascript
const url = new URL("http://localhost/api/my-duration");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "phone": "ea"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/my-duration", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "phone" => "ea",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/my-duration`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    phone | string |  required  | 

<!-- END_813f6cfa3f753d159c0595fde52e1332 -->

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/durations", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/durations/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/durations/{duration}`


<!-- END_027089caf0b385aaf688bb21c9acb26a -->

#Emergency Contacts


APIs for
<!-- START_a5ca6ccf2ba7bf3a34749a84bfe5869a -->
## api/emergency_contacts
> Example request:

```bash
curl -X GET -G "http://localhost/api/emergency_contacts" 
```

```javascript
const url = new URL("http://localhost/api/emergency_contacts");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/emergency_contacts", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/emergency_contacts`


<!-- END_a5ca6ccf2ba7bf3a34749a84bfe5869a -->

<!-- START_962df80d0dc2785598301976b39182f6 -->
## api/emergency_contacts
> Example request:

```bash
curl -X POST "http://localhost/api/emergency_contacts" 
```

```javascript
const url = new URL("http://localhost/api/emergency_contacts");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/emergency_contacts", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/emergency_contacts`


<!-- END_962df80d0dc2785598301976b39182f6 -->

#Lang


APIs for
<!-- START_1e840f313a78a482aa10e5da4bfe9428 -->
## List lang
Список языков

> Example request:

```bash
curl -X GET -G "http://localhost/api/langs" 
```

```javascript
const url = new URL("http://localhost/api/langs");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/langs", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "code": "ru",
        "name": "Русский",
        "file": null
    },
    {
        "id": 2,
        "code": "en",
        "name": "English",
        "file": null
    }
]
```

### HTTP Request
`GET api/langs`


<!-- END_1e840f313a78a482aa10e5da4bfe9428 -->

#Location


APIs for
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/location/regions", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Московский 1"
        },
        {
            "id": 2,
            "name": "Московский 2"
        },
        {
            "id": 3,
            "name": "Московский 3"
        },
        {
            "id": 4,
            "name": "Московский 4"
        },
        {
            "id": 5,
            "name": "Московский 5"
        },
        {
            "id": 6,
            "name": "Московский 6"
        },
        {
            "id": 7,
            "name": "Московский 7"
        },
        {
            "id": 8,
            "name": "Московский 8"
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http:\/\/localhost\/api\/location\/regions?page=1",
        "last": "http:\/\/localhost\/api\/location\/regions?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/location\/regions",
        "per_page": 50,
        "to": 8,
        "total": 8
    }
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/location/cities", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Москва",
            "region": {
                "id": 1,
                "name": "Московский 1"
            }
        },
        {
            "id": 2,
            "name": "Москва 2",
            "region": {
                "id": 2,
                "name": "Московский 2"
            }
        },
        {
            "id": 3,
            "name": "Москва 3",
            "region": {
                "id": 3,
                "name": "Московский 3"
            }
        },
        {
            "id": 4,
            "name": "Москва 4",
            "region": {
                "id": 4,
                "name": "Московский 4"
            }
        },
        {
            "id": 5,
            "name": "Москва 5",
            "region": {
                "id": 5,
                "name": "Московский 5"
            }
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http:\/\/localhost\/api\/location\/cities?page=1",
        "last": "http:\/\/localhost\/api\/location\/cities?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/location\/cities",
        "per_page": 50,
        "to": 5,
        "total": 5
    }
}
```

### HTTP Request
`GET api/location/cities`


<!-- END_373b99d5481a580b466f97ada8cfceb2 -->

#Patient


APIs for
<!-- START_45f6d0cf8fb43fb74bd8c1fa5d357cfb -->
## List of weight patient

> Example request:

```bash
curl -X GET -G "http://localhost/api/patient/weight" 
```

```javascript
const url = new URL("http://localhost/api/patient/weight");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/patient/weight", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/patient/weight`


<!-- END_45f6d0cf8fb43fb74bd8c1fa5d357cfb -->

<!-- START_a9180e0c2ac77a08d56c50b846a1e7f8 -->
## Add weight patient

> Example request:

```bash
curl -X POST "http://localhost/api/patient/weight" \
    -H "Content-Type: application/json" \
    -d '{"weights":"eligendi","date":"et"}'

```

```javascript
const url = new URL("http://localhost/api/patient/weight");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "weights": "eligendi",
    "date": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/patient/weight", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "weights" => "eligendi",
            "date" => "et",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/patient/weight`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    weights | string |  required  | 
    date | string |  required  | 

<!-- END_a9180e0c2ac77a08d56c50b846a1e7f8 -->

<!-- START_b92326b5888ef4fbf281f8be1a02ee16 -->
## Destroy weight patient

> Example request:

```bash
curl -X DELETE "http://localhost/api/patient/weight/1" 
```

```javascript
const url = new URL("http://localhost/api/patient/weight/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("http://localhost/api/patient/weight/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/patient/weight/{weight}`


<!-- END_b92326b5888ef4fbf281f8be1a02ee16 -->

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/patients", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 3,
            "clinic_id": 1,
            "doctor_id": 1,
            "date_of_birth": "2010-10-10 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 0,
            "created_at": "2020-05-14 16:47:29",
            "updated_at": "2020-05-14 16:47:29",
            "user": {
                "id": 3,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "Street",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "user@users.com",
                "name": "Raf",
                "last_name": "Fat",
                "second_name": "Sar",
                "phone": "+79969755365",
                "image": null,
                "created_at": "2020-05-14 16:47:29",
                "updated_at": "2020-05-14 16:47:29",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 1,
                "user_id": 1,
                "rate": 4,
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-28 14:10:22"
            }
        },
        {
            "id": 2,
            "user_id": 1,
            "clinic_id": 1,
            "doctor_id": 1,
            "date_of_birth": "2010-10-10 00:00:00",
            "conception_date": "2020-01-13",
            "conception_type": "menstruation",
            "pregnant": 0,
            "created_at": "2020-05-14 16:47:29",
            "updated_at": "2020-05-15 11:22:11",
            "user": {
                "id": 1,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 3,
                "street": "33",
                "building": "44",
                "apartment": "5578",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "email@email.com",
                "name": "Аннар",
                "last_name": "Болатбаева",
                "second_name": "Сергеевна",
                "phone": "+74957556981",
                "image": "images\/User\/image\/EOsBWWQttqNHW0bnSXa4MyZh1DZE5sMo2667g5Lc.png",
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-29 17:00:40",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 3,
                    "region_id": 3
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 1,
                "user_id": 1,
                "rate": 4,
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-28 14:10:22"
            }
        },
        {
            "id": 3,
            "user_id": 15,
            "clinic_id": 1,
            "doctor_id": 8,
            "date_of_birth": "2015-05-14 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-05-15 12:28:59",
            "updated_at": "2020-05-15 12:28:59",
            "user": {
                "id": 15,
                "lang_id": 1,
                "region_id": 4,
                "city_id": 2,
                "street": "street",
                "building": "23",
                "apartment": "11",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "email@mail.ru",
                "name": "name",
                "last_name": "lastname",
                "second_name": "surname",
                "phone": "8777777777",
                "image": null,
                "created_at": "2020-05-15 12:28:59",
                "updated_at": "2020-05-15 12:28:59",
                "region": {
                    "id": 4
                },
                "city": {
                    "id": 2,
                    "region_id": 2
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 8,
                "user_id": 10,
                "rate": null,
                "created_at": "2020-05-14 17:13:59",
                "updated_at": "2020-05-14 17:13:59"
            }
        },
        {
            "id": 4,
            "user_id": 16,
            "clinic_id": 1,
            "doctor_id": 9,
            "date_of_birth": "2006-05-15 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-05-15 12:31:59",
            "updated_at": "2020-05-15 12:31:59",
            "user": {
                "id": 16,
                "lang_id": 1,
                "region_id": 6,
                "city_id": 2,
                "street": "street",
                "building": "name",
                "apartment": "123",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "mail@mail.ru",
                "name": "aSDasd",
                "last_name": "asdlajsd",
                "second_name": "as,dasd",
                "phone": "+74957556983",
                "image": null,
                "created_at": "2020-05-15 12:31:59",
                "updated_at": "2020-05-15 12:31:59",
                "region": {
                    "id": 6
                },
                "city": {
                    "id": 2,
                    "region_id": 2
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 9,
                "user_id": 11,
                "rate": null,
                "created_at": "2020-05-14 17:14:04",
                "updated_at": "2020-05-14 17:14:04"
            }
        },
        {
            "id": 5,
            "user_id": 17,
            "clinic_id": 1,
            "doctor_id": 1,
            "date_of_birth": "1989-05-27 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-05-27 12:21:17",
            "updated_at": "2020-05-27 12:21:17",
            "user": {
                "id": 17,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "главная",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "user2@users.com",
                "name": "Раф",
                "last_name": "Рафсарович",
                "second_name": "Сар",
                "phone": "+79828361623",
                "image": null,
                "created_at": "2020-05-27 12:21:17",
                "updated_at": "2020-05-27 12:21:17",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 1,
                "user_id": 1,
                "rate": 4,
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-28 14:10:22"
            }
        },
        {
            "id": 6,
            "user_id": 18,
            "clinic_id": 1,
            "doctor_id": 1,
            "date_of_birth": "1988-05-25 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-05-27 12:45:59",
            "updated_at": "2020-05-27 12:45:59",
            "user": {
                "id": 18,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "Главная",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "test@users.com",
                "name": "Раф",
                "last_name": "Рафсаровна",
                "second_name": "Сар",
                "phone": "+79828361625",
                "image": null,
                "created_at": "2020-05-27 12:45:59",
                "updated_at": "2020-05-27 12:45:59",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 1,
                "user_id": 1,
                "rate": 4,
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-28 14:10:22"
            }
        },
        {
            "id": 7,
            "user_id": 19,
            "clinic_id": 1,
            "doctor_id": 1,
            "date_of_birth": "1992-05-27 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-05-27 12:49:54",
            "updated_at": "2020-05-27 12:49:54",
            "user": {
                "id": 19,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "Главная",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "usertest@users.com",
                "name": "Раф",
                "last_name": "Отч",
                "second_name": "Сар",
                "phone": "+79686557438",
                "image": null,
                "created_at": "2020-05-27 12:49:54",
                "updated_at": "2020-05-27 12:49:54",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 1,
                "user_id": 1,
                "rate": 4,
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-28 14:10:22"
            }
        },
        {
            "id": 8,
            "user_id": 20,
            "clinic_id": 2,
            "doctor_id": 4,
            "date_of_birth": "2019-05-27 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 0,
            "created_at": "2020-05-27 20:26:01",
            "updated_at": "2020-05-27 20:26:01",
            "user": {
                "id": 20,
                "lang_id": 1,
                "region_id": 4,
                "city_id": 2,
                "street": "11",
                "building": "22",
                "apartment": "11",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "serjgoodman@yandex.ru",
                "name": "тест",
                "last_name": "1111",
                "second_name": "тестович",
                "phone": "89261502795",
                "image": null,
                "created_at": "2020-05-27 20:26:01",
                "updated_at": "2020-05-27 20:26:01",
                "region": {
                    "id": 4
                },
                "city": {
                    "id": 2,
                    "region_id": 2
                }
            },
            "clinic": {
                "id": 2,
                "region_id": 1,
                "city_id": 1,
                "rate": 0,
                "type": "state",
                "phone": null,
                "lng": null,
                "lat": null,
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 4,
                "user_id": 6,
                "rate": null,
                "created_at": "2020-05-14 17:13:38",
                "updated_at": "2020-05-14 17:13:38"
            }
        },
        {
            "id": 9,
            "user_id": 21,
            "clinic_id": 1,
            "doctor_id": 1,
            "date_of_birth": "1988-05-25 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-06-03 18:12:12",
            "updated_at": "2020-06-03 18:12:12",
            "user": {
                "id": 21,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "Main",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "testauth@users.com",
                "name": "Auth",
                "last_name": "Auth",
                "second_name": "Auth",
                "phone": "+79879878998",
                "image": null,
                "created_at": "2020-06-03 18:12:12",
                "updated_at": "2020-06-03 18:12:12",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 1,
                "user_id": 1,
                "rate": 4,
                "created_at": "2020-05-13 11:43:10",
                "updated_at": "2020-05-28 14:10:22"
            }
        },
        {
            "id": 10,
            "user_id": 24,
            "clinic_id": 1,
            "doctor_id": 2,
            "date_of_birth": "2010-10-10 00:00:00",
            "conception_date": "2020-06-25",
            "conception_type": "menstruation",
            "pregnant": 1,
            "created_at": "2020-07-02 19:05:20",
            "updated_at": "2020-07-02 19:05:20",
            "user": {
                "id": 24,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "ул. Тест",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "email224@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556986",
                "image": null,
                "created_at": "2020-07-02 19:05:20",
                "updated_at": "2020-07-02 19:05:20",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 2,
                "user_id": 4,
                "rate": null,
                "created_at": "2020-05-14 17:13:28",
                "updated_at": "2020-05-14 17:13:28"
            }
        },
        {
            "id": 11,
            "user_id": 25,
            "clinic_id": 1,
            "doctor_id": 2,
            "date_of_birth": "2010-10-10 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 0,
            "created_at": "2020-07-02 19:08:55",
            "updated_at": "2020-07-02 19:08:55",
            "user": {
                "id": 25,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "ул. Тест",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "email225@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556999",
                "image": null,
                "created_at": "2020-07-02 19:08:55",
                "updated_at": "2020-07-02 19:08:55",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 2,
                "user_id": 4,
                "rate": null,
                "created_at": "2020-05-14 17:13:28",
                "updated_at": "2020-05-14 17:13:28"
            }
        },
        {
            "id": 12,
            "user_id": 26,
            "clinic_id": 1,
            "doctor_id": 2,
            "date_of_birth": "2010-10-10 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 0,
            "created_at": "2020-07-02 23:44:50",
            "updated_at": "2020-07-02 23:44:50",
            "user": {
                "id": 26,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "ул. Тест",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "email226@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556998",
                "image": null,
                "created_at": "2020-07-02 23:44:50",
                "updated_at": "2020-07-02 23:44:50",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 2,
                "user_id": 4,
                "rate": null,
                "created_at": "2020-05-14 17:13:28",
                "updated_at": "2020-05-14 17:13:28"
            }
        },
        {
            "id": 13,
            "user_id": 27,
            "clinic_id": 1,
            "doctor_id": 2,
            "date_of_birth": "2010-10-10 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 0,
            "created_at": "2020-07-03 00:17:56",
            "updated_at": "2020-07-03 00:17:56",
            "user": {
                "id": 27,
                "lang_id": 1,
                "region_id": 2,
                "city_id": 3,
                "street": "ул. Тест",
                "building": "1",
                "apartment": "1",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "email227@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "74957556998",
                "image": null,
                "created_at": "2020-07-03 00:17:56",
                "updated_at": "2020-07-03 19:06:24",
                "region": {
                    "id": 2
                },
                "city": {
                    "id": 3,
                    "region_id": 3
                }
            },
            "clinic": {
                "id": 1,
                "region_id": 1,
                "city_id": 1,
                "rate": 3.75,
                "type": "state",
                "phone": "+74957556981",
                "lng": "1111",
                "lat": "2222",
                "image": null,
                "paid": 0,
                "created_at": null,
                "updated_at": null
            },
            "doctor": {
                "id": 2,
                "user_id": 4,
                "rate": null,
                "created_at": "2020-05-14 17:13:28",
                "updated_at": "2020-05-14 17:13:28"
            }
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/patients?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/patients?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/patients",
    "per_page": 20,
    "prev_page_url": null,
    "to": 13,
    "total": 13
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/patients/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "id": 1,
    "user_id": 3,
    "clinic_id": 1,
    "doctor_id": 1,
    "date_of_birth": "2010-10-10 00:00:00",
    "conception_date": null,
    "conception_type": null,
    "pregnant": 0,
    "created_at": "2020-05-14 16:47:29",
    "updated_at": "2020-05-14 16:47:29",
    "user": {
        "id": 3,
        "lang_id": 1,
        "region_id": 1,
        "city_id": 1,
        "street": "Street",
        "building": "1",
        "apartment": "1",
        "role": "patient",
        "verified": 0,
        "notification": 1,
        "email": "user@users.com",
        "name": "Raf",
        "last_name": "Fat",
        "second_name": "Sar",
        "phone": "+79969755365",
        "image": null,
        "created_at": "2020-05-14 16:47:29",
        "updated_at": "2020-05-14 16:47:29",
        "region": {
            "id": 1
        },
        "city": {
            "id": 1,
            "region_id": 1
        }
    },
    "clinic": {
        "id": 1,
        "region_id": 1,
        "city_id": 1,
        "rate": 3.75,
        "type": "state",
        "phone": "+74957556981",
        "lng": "1111",
        "lat": "2222",
        "image": null,
        "paid": 0,
        "created_at": null,
        "updated_at": null
    },
    "doctor": {
        "id": 1,
        "user_id": 1,
        "rate": 4,
        "created_at": "2020-05-13 11:43:10",
        "updated_at": "2020-05-28 14:10:22"
    }
}
```

### HTTP Request
`GET api/patients/{patient}`


<!-- END_e21961238df73c8544f00766ed069000 -->

<!-- START_92ac1b765fda5f3e24b3db66b3e96cb5 -->
## Add conception date

> Example request:

```bash
curl -X POST "http://localhost/api/conception-date" \
    -H "Content-Type: application/json" \
    -d '{"conception_type":"eligendi","conception_date":"doloremque"}'

```

```javascript
const url = new URL("http://localhost/api/conception-date");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "conception_type": "eligendi",
    "conception_date": "doloremque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/conception-date", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "conception_type" => "eligendi",
            "conception_date" => "doloremque",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/conception-date`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    conception_type | string |  required  | menstruation or screening
    conception_date | string |  required  | date of last menstruatiion or screenenig

<!-- END_92ac1b765fda5f3e24b3db66b3e96cb5 -->

#Patient belly


APIs for
<!-- START_75638e9a29ec7d0d150ea20b0b2c07c2 -->
## api/bellies/last
> Example request:

```bash
curl -X GET -G "http://localhost/api/bellies/last" 
```

```javascript
const url = new URL("http://localhost/api/bellies/last");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/bellies/last", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/bellies/last`


<!-- END_75638e9a29ec7d0d150ea20b0b2c07c2 -->

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/bellies", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/bellies", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/bellies`


<!-- END_10d7fe99da6529ea61db5250f8cc9b26 -->

<!-- START_46199db951bfe10deee82f6f6bdd40e8 -->
## api/bellies/{belly}
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/bellies/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
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

#Specialization


APIs for
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/specializations", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/specializations/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/specializations/{specialization}`


<!-- END_fa0ecb8233e59222004cc515e4403bfd -->

#Translate


APIs for
<!-- START_adcc950de2f5b85d8ce657dcefb433a4 -->
## List translate
Список переводов

> Example request:

```bash
curl -X GET -G "http://localhost/api/translates" 
```

```javascript
const url = new URL("http://localhost/api/translates");

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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/translates", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "key": "back",
            "text": "Назад"
        },
        {
            "id": 2,
            "key": "next",
            "text": "Далее"
        },
        {
            "id": 3,
            "key": "phone_number",
            "text": "Номер телефона"
        },
        {
            "id": 4,
            "key": "password",
            "text": "Пароль"
        },
        {
            "id": 5,
            "key": "password.confirm",
            "text": "Подтвердите пароль"
        },
        {
            "id": 6,
            "key": "login",
            "text": "Войти"
        },
        {
            "id": 7,
            "key": "register",
            "text": "Регистрация"
        },
        {
            "id": 8,
            "key": "add.photo",
            "text": "Добавить фото"
        },
        {
            "id": 9,
            "key": "your_name",
            "text": "Ваше имя"
        },
        {
            "id": 10,
            "key": "email",
            "text": "Email"
        },
        {
            "id": 11,
            "key": "select.region",
            "text": "Выберите регион"
        },
        {
            "id": 12,
            "key": "select.city",
            "text": "Выберите город"
        },
        {
            "id": 13,
            "key": "street",
            "text": "Улица"
        },
        {
            "id": 14,
            "key": "house",
            "text": "Дом"
        },
        {
            "id": 15,
            "key": "apartment",
            "text": "Квартира"
        },
        {
            "id": 16,
            "key": "select.lang",
            "text": "Выберите язык"
        },
        {
            "id": 17,
            "key": "pregnant",
            "text": "Беременна"
        },
        {
            "id": 18,
            "key": "not.pregnant",
            "text": "Не беременна"
        },
        {
            "id": 19,
            "key": "terms",
            "text": "Пользовательское соглашение"
        },
        {
            "id": 20,
            "key": "sms.code",
            "text": "Смс-код"
        },
        {
            "id": 21,
            "key": "to.register",
            "text": "Зарегистрироваться"
        },
        {
            "id": 22,
            "key": "resend",
            "text": "Отправить повторно"
        },
        {
            "id": 23,
            "key": "calculate.gestational.age",
            "text": "Рассчитать срок беременности"
        },
        {
            "id": 24,
            "key": "calculate.gestational.age",
            "text": "Рассчитать срок беременности"
        },
        {
            "id": 25,
            "key": "by.screening",
            "text": "По скринигу"
        },
        {
            "id": 26,
            "key": "enter.weight.data",
            "text": "Введите данные о весе"
        },
        {
            "id": 27,
            "key": "before.pregnant",
            "text": "До беременности"
        },
        {
            "id": 28,
            "key": "now",
            "text": "Сейчас"
        },
        {
            "id": 29,
            "key": "emergency.contacts",
            "text": "Контакты для экстренной связи"
        },
        {
            "id": 30,
            "key": "name",
            "text": "Имя"
        },
        {
            "id": 31,
            "key": "add.contact",
            "text": "Добавить контакт"
        },
        {
            "id": 32,
            "key": "start",
            "text": "Начать"
        },
        {
            "id": 33,
            "key": "measuring",
            "text": "Измерения"
        },
        {
            "id": 34,
            "key": "measuring",
            "text": "Измерения"
        },
        {
            "id": 35,
            "key": "my.weight",
            "text": "Мой вес"
        },
        {
            "id": 36,
            "key": "my.baby",
            "text": "Мой малыш"
        },
        {
            "id": 37,
            "key": "my.tummy",
            "text": "Мой животик"
        },
        {
            "id": 38,
            "key": "contractions",
            "text": "Схватки"
        },
        {
            "id": 39,
            "key": "clinic",
            "text": "Клиники"
        },
        {
            "id": 40,
            "key": "recommendations",
            "text": "Рекомендации"
        },
        {
            "id": 41,
            "key": "chat",
            "text": "Чат"
        },
        {
            "id": 42,
            "key": "personal.cabinet",
            "text": "Личный кабинет"
        },
        {
            "id": 43,
            "key": "current.weight",
            "text": "Текущий вес"
        },
        {
            "id": 44,
            "key": "new.weight",
            "text": "Новый вес"
        },
        {
            "id": 45,
            "key": "add.weight",
            "text": "Добавить вес"
        },
        {
            "id": 46,
            "key": "add",
            "text": "Добавить"
        },
        {
            "id": 47,
            "key": "enter.data",
            "text": "Введите данные"
        },
        {
            "id": 48,
            "key": "when.measurements",
            "text": "Когда сделаны замеры"
        },
        {
            "id": 49,
            "key": "girth",
            "text": "Обхват"
        },
        {
            "id": 50,
            "key": "ufh",
            "text": "ВДМ"
        },
        {
            "id": 51,
            "key": "uterine.fundus.height",
            "text": "Высота дна матки"
        },
        {
            "id": 52,
            "key": "add.data",
            "text": "Добавить данные"
        },
        {
            "id": 53,
            "key": "girth.abdomen",
            "text": "Обхват живота"
        },
        {
            "id": 54,
            "key": "contractions.counter",
            "text": "Счетчик схваток"
        },
        {
            "id": 55,
            "key": "duration",
            "text": "Длительность"
        },
        {
            "id": 56,
            "key": "interval",
            "text": "Интервал"
        },
        {
            "id": 57,
            "key": "phone",
            "text": "Телефон"
        },
        {
            "id": 58,
            "key": "support",
            "text": "Помощь и поддержка"
        },
        {
            "id": 59,
            "key": "settings",
            "text": "Настройки"
        },
        {
            "id": 60,
            "key": "exit",
            "text": "Выход"
        },
        {
            "id": 61,
            "key": "forums",
            "text": "Форумы"
        },
        {
            "id": 62,
            "key": "message",
            "text": "Сообщение"
        },
        {
            "id": 63,
            "key": "rate.quality.service",
            "text": "Оцените качество обслуживания"
        },
        {
            "id": 64,
            "key": "check.lists",
            "text": "Чек-листы"
        },
        {
            "id": 65,
            "key": "articles",
            "text": "Статьи"
        },
        {
            "id": 66,
            "key": "state",
            "text": "Государственные"
        },
        {
            "id": 67,
            "key": "private",
            "text": "Частные"
        },
        {
            "id": 68,
            "key": "eще",
            "text": "more"
        },
        {
            "id": 69,
            "key": "schedules",
            "text": "График работы"
        },
        {
            "id": 70,
            "key": "registry",
            "text": "Регистратура"
        },
        {
            "id": 71,
            "key": "our.specialists",
            "text": "Наши спешиалисты"
        },
        {
            "id": 72,
            "key": "reviews",
            "text": "Отзывы"
        },
        {
            "id": 73,
            "key": "all.reviews",
            "text": "Все отзывы"
        },
        {
            "id": 74,
            "key": "price.list",
            "text": "Прайс-лист"
        },
        {
            "id": 75,
            "key": "good",
            "text": "Хорошо"
        },
        {
            "id": 76,
            "key": "great",
            "text": "Отлично"
        },
        {
            "id": 77,
            "key": "bad",
            "text": "Плохо"
        },
        {
            "id": 78,
            "key": "call",
            "text": "Связаться"
        },
        {
            "id": 79,
            "key": "education",
            "text": "Образование"
        },
        {
            "id": 80,
            "key": "account.settings",
            "text": "Настройки аккаунта"
        },
        {
            "id": 81,
            "key": "edit",
            "text": "Изменить"
        },
        {
            "id": 82,
            "key": "location",
            "text": "Местоположение"
        },
        {
            "id": 83,
            "key": "app.settings",
            "text": "Настройки приложения"
        },
        {
            "id": 84,
            "key": "lang",
            "text": "Язык"
        },
        {
            "id": 85,
            "key": "notification",
            "text": "Уведомления"
        },
        {
            "id": 86,
            "key": "feedback",
            "text": "Обратная связь"
        },
        {
            "id": 87,
            "key": "change.phone.number",
            "text": "Изменить номер телефона"
        },
        {
            "id": 88,
            "key": "new.phone.number",
            "text": "Новый номер телефона"
        },
        {
            "id": 89,
            "key": "save",
            "text": "Сохранить"
        },
        {
            "id": 90,
            "key": "close",
            "text": "Закрыть"
        }
    ]
}
```

### HTTP Request
`GET api/translates`


<!-- END_adcc950de2f5b85d8ce657dcefb433a4 -->


