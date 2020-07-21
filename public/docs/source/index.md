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
curl -X POST "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -d '{"phone":"cum","password":"dolorum"}'

```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "phone": "cum",
    "password": "dolorum"
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
$response = $client->post("http://localhost/api/login", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "phone" => "cum",
            "password" => "dolorum",
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
`POST api/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    phone | string |  required  | 
    password | string |  required  | 

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
    -d '{"name":"maxime","last_name":"non","second_name":"necessitatibus","phone":"+74957556981","role":"doctor or patient","email":"nostrum","region_id":18,"city_id":9,"street":"inventore","building":"suscipit","apartment":"debitis","password":"magni","password_confirmation":"quas","lang_id":6}'

```

```javascript
const url = new URL("http://localhost/api/register");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "maxime",
    "last_name": "non",
    "second_name": "necessitatibus",
    "phone": "+74957556981",
    "role": "doctor or patient",
    "email": "nostrum",
    "region_id": 18,
    "city_id": 9,
    "street": "inventore",
    "building": "suscipit",
    "apartment": "debitis",
    "password": "magni",
    "password_confirmation": "quas",
    "lang_id": 6
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
            "name" => "maxime",
            "last_name" => "non",
            "second_name" => "necessitatibus",
            "phone" => "+74957556981",
            "role" => "doctor or patient",
            "email" => "nostrum",
            "region_id" => "18",
            "city_id" => "9",
            "street" => "inventore",
            "building" => "suscipit",
            "apartment" => "debitis",
            "password" => "magni",
            "password_confirmation" => "quas",
            "lang_id" => "6",
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
    -d '{"code":"similique"}'

```

```javascript
const url = new URL("http://localhost/api/verify");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "code": "similique"
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
            "code" => "similique",
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

<!-- START_a3b5fa7b79d359f56ac9da5a3ec851a1 -->
## Re send sms

> Example request:

```bash
curl -X GET -G "http://localhost/api/send_sms" \
    -H "Content-Type: application/json" \
    -d '{"phone":"minus"}'

```

```javascript
const url = new URL("http://localhost/api/send_sms");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "phone": "minus"
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
$response = $client->get("http://localhost/api/send_sms", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "phone" => "minus",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/send_sms`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    phone | required |  optional  | string

<!-- END_a3b5fa7b79d359f56ac9da5a3ec851a1 -->

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
    -d '{"phone":"et"}'

```

```javascript
const url = new URL("http://localhost/api/me/phone");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "phone": "et"
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
            "phone" => "et",
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
    -d '{"region_id":"eos","city_id":"adipisci","street":"culpa","building":"omnis","apartment":"quis"}'

```

```javascript
const url = new URL("http://localhost/api/me/location");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "region_id": "eos",
    "city_id": "adipisci",
    "street": "culpa",
    "building": "omnis",
    "apartment": "quis"
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
            "region_id" => "eos",
            "city_id" => "adipisci",
            "street" => "culpa",
            "building" => "omnis",
            "apartment" => "quis",
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
    -d '{"name":"quo","last_name":"repellendus","second_name":"inventore"}'

```

```javascript
const url = new URL("http://localhost/api/me/name");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "quo",
    "last_name": "repellendus",
    "second_name": "inventore"
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
            "name" => "quo",
            "last_name" => "repellendus",
            "second_name" => "inventore",
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

<!-- START_b05833c7a4a5a2028d1b3794e0fa7f32 -->
## Update photo

> Example request:

```bash
curl -X POST "http://localhost/api/me/update_photo" \
    -H "Content-Type: application/json" \
    -d '{"image":"ipsum"}'

```

```javascript
const url = new URL("http://localhost/api/me/update_photo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "image": "ipsum"
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
$response = $client->post("http://localhost/api/me/update_photo", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "image" => "ipsum",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/me/update_photo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    image | image |  optional  | 

<!-- END_b05833c7a4a5a2028d1b3794e0fa7f32 -->

#Chat


APIs for
<!-- START_d9a7f14ac04a2a4180db2014d1b1eea7 -->
## Send message

> Example request:

```bash
curl -X POST "http://localhost/api/chat/send" \
    -H "Content-Type: application/json" \
    -d '{"text":"corporis","attaches":"excepturi"}'

```

```javascript
const url = new URL("http://localhost/api/chat/send");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "text": "corporis",
    "attaches": "excepturi"
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
$response = $client->post("http://localhost/api/chat/send", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "text" => "corporis",
            "attaches" => "excepturi",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/chat/send`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    text | text |  optional  | Укажите либо текст либо изображение
    attaches | text |  optional  | Укажите либо текст либо изображение

<!-- END_d9a7f14ac04a2a4180db2014d1b1eea7 -->

<!-- START_e68fb882eee1a84b388c1b17671cb0b5 -->
## Start chat

> Example request:

```bash
curl -X POST "http://localhost/api/chat/start" \
    -H "Content-Type: application/json" \
    -d '{"recipient_id":16}'

```

```javascript
const url = new URL("http://localhost/api/chat/start");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "recipient_id": 16
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
$response = $client->post("http://localhost/api/chat/start", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "recipient_id" => "16",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/chat/start`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    recipient_id | integer |  optional  | 

<!-- END_e68fb882eee1a84b388c1b17671cb0b5 -->

<!-- START_6d342bbf7c4103bec385380a092a5ce6 -->
## List message

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


> Example response (200):

```json
{}
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
## Send message

> Example request:

```bash
curl -X GET -G "http://localhost/api/chat/messages" \
    -H "Content-Type: application/json" \
    -d '{"chat_id":14}'

```

```javascript
const url = new URL("http://localhost/api/chat/messages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "chat_id": 14
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
$response = $client->get("http://localhost/api/chat/messages", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "chat_id" => "14",
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
`GET api/chat/messages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    chat_id | integer |  optional  | 

<!-- END_ac265984ad6c19fa50938064c2fd1f40 -->

#Check List


APIs for
<!-- START_8f80620b1b19c9d55405a474b5694c0d -->
## List checklist

> Example request:

```bash
curl -X GET -G "http://localhost/api/check-lists" \
    -H "Content-Type: application/json" \
    -d '{"chat_id":20}'

```

```javascript
const url = new URL("http://localhost/api/check-lists");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "chat_id": 20
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
$response = $client->get("http://localhost/api/check-lists", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "chat_id" => "20",
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
`GET api/check-lists`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    chat_id | integer |  optional  | 

<!-- END_8f80620b1b19c9d55405a474b5694c0d -->

<!-- START_a17bcf05d81ee6a923f2ec67bb6597a6 -->
## Store checklist

> Example request:

```bash
curl -X POST "http://localhost/api/check-lists" \
    -H "Content-Type: application/json" \
    -d '{"task_id":15}'

```

```javascript
const url = new URL("http://localhost/api/check-lists");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "task_id": 15
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
$response = $client->post("http://localhost/api/check-lists", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "task_id" => "15",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/check-lists`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    task_id | integer |  optional  | 

<!-- END_a17bcf05d81ee6a923f2ec67bb6597a6 -->

<!-- START_fea21f34c8bff578d65a59d05bd1d484 -->
## Destroy checklist

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
{
    "data": [
        {
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
            "updated_at": null,
            "city": {
                "id": 1,
                "name": "Москва",
                "region": {
                    "id": 1,
                    "name": "Московский 1"
                }
            },
            "region": {
                "id": 1,
                "name": "Московский 1"
            },
            "departments": [
                {
                    "id": 2,
                    "clinic_id": 1,
                    "created_at": "2020-05-28 14:28:50",
                    "updated_at": "2020-05-28 14:28:50",
                    "name": null,
                    "street": null,
                    "building": null
                },
                {
                    "id": 3,
                    "clinic_id": 1,
                    "created_at": "2020-05-28 14:44:46",
                    "updated_at": "2020-05-28 14:44:46",
                    "name": null,
                    "street": null,
                    "building": null
                }
            ],
            "schedules": [
                {
                    "clinic_id": 1,
                    "day": 0,
                    "start": "09:00",
                    "end": "18:00",
                    "dayName": "Понедельник"
                },
                {
                    "clinic_id": 1,
                    "day": 1,
                    "start": "08:00",
                    "end": "14:13",
                    "dayName": "Вторник"
                },
                {
                    "clinic_id": 1,
                    "day": 2,
                    "start": "17:19",
                    "end": "19:21",
                    "dayName": "Среда"
                },
                {
                    "clinic_id": 1,
                    "day": 3,
                    "start": "18:20",
                    "end": "23:20",
                    "dayName": "Четвер"
                },
                {
                    "clinic_id": 1,
                    "day": 4,
                    "start": "17:16",
                    "end": "20:19",
                    "dayName": "Пятница"
                },
                {
                    "clinic_id": 1,
                    "day": 5,
                    "start": "07:27",
                    "end": "16:26",
                    "dayName": "Суббота"
                },
                {
                    "clinic_id": 1,
                    "day": 6,
                    "start": "14:21",
                    "end": "20:26",
                    "dayName": "Воскресенье"
                }
            ],
            "prices": [],
            "name": null,
            "text": null,
            "address": null
        },
        {
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
            "updated_at": null,
            "city": {
                "id": 1,
                "name": "Москва",
                "region": {
                    "id": 1,
                    "name": "Московский 1"
                }
            },
            "region": {
                "id": 1,
                "name": "Московский 1"
            },
            "departments": [
                {
                    "id": 1,
                    "clinic_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "name": null,
                    "street": null,
                    "building": null
                }
            ],
            "schedules": [
                {
                    "clinic_id": 2,
                    "day": 1,
                    "start": "08:31",
                    "end": "18:31",
                    "dayName": "Вторник"
                },
                {
                    "clinic_id": 2,
                    "day": 2,
                    "start": "08:31",
                    "end": "18:31",
                    "dayName": "Среда"
                },
                {
                    "clinic_id": 2,
                    "day": 3,
                    "start": "08:31",
                    "end": "18:31",
                    "dayName": "Четвер"
                },
                {
                    "clinic_id": 2,
                    "day": 4,
                    "start": "08:31",
                    "end": "18:31",
                    "dayName": "Пятница"
                },
                {
                    "clinic_id": 2,
                    "day": 5,
                    "start": "08:31",
                    "end": "18:31",
                    "dayName": "Суббота"
                }
            ],
            "prices": [
                {
                    "id": 1,
                    "clinic_id": 2,
                    "price": 100000,
                    "created_at": null,
                    "updated_at": null,
                    "name": null
                },
                {
                    "id": 2,
                    "clinic_id": 2,
                    "price": 50000,
                    "created_at": null,
                    "updated_at": null,
                    "name": null
                }
            ],
            "name": null,
            "text": null,
            "address": null
        },
        {
            "id": 3,
            "region_id": 1,
            "city_id": 1,
            "rate": 0,
            "type": "private",
            "phone": null,
            "lng": null,
            "lat": null,
            "image": null,
            "paid": 0,
            "created_at": null,
            "updated_at": null,
            "city": {
                "id": 1,
                "name": "Москва",
                "region": {
                    "id": 1,
                    "name": "Московский 1"
                }
            },
            "region": {
                "id": 1,
                "name": "Московский 1"
            },
            "departments": [],
            "schedules": [],
            "prices": [],
            "name": null,
            "text": null,
            "address": null
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http:\/\/localhost\/api\/clinics?page=1",
        "last": "http:\/\/localhost\/api\/clinics?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/clinics",
        "per_page": 20,
        "to": 3,
        "total": 3
    }
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
{
    "data": {
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
        "updated_at": null,
        "city": {
            "id": 1,
            "name": "Москва",
            "region": {
                "id": 1,
                "name": "Московский 1"
            }
        },
        "region": {
            "id": 1,
            "name": "Московский 1"
        },
        "departments": [
            {
                "id": 2,
                "clinic_id": 1,
                "created_at": "2020-05-28 14:28:50",
                "updated_at": "2020-05-28 14:28:50",
                "name": null,
                "street": null,
                "building": null
            },
            {
                "id": 3,
                "clinic_id": 1,
                "created_at": "2020-05-28 14:44:46",
                "updated_at": "2020-05-28 14:44:46",
                "name": null,
                "street": null,
                "building": null
            }
        ],
        "schedules": [
            {
                "clinic_id": 1,
                "day": 0,
                "start": "09:00",
                "end": "18:00",
                "dayName": "Понедельник"
            },
            {
                "clinic_id": 1,
                "day": 1,
                "start": "08:00",
                "end": "14:13",
                "dayName": "Вторник"
            },
            {
                "clinic_id": 1,
                "day": 2,
                "start": "17:19",
                "end": "19:21",
                "dayName": "Среда"
            },
            {
                "clinic_id": 1,
                "day": 3,
                "start": "18:20",
                "end": "23:20",
                "dayName": "Четвер"
            },
            {
                "clinic_id": 1,
                "day": 4,
                "start": "17:16",
                "end": "20:19",
                "dayName": "Пятница"
            },
            {
                "clinic_id": 1,
                "day": 5,
                "start": "07:27",
                "end": "16:26",
                "dayName": "Суббота"
            },
            {
                "clinic_id": 1,
                "day": 6,
                "start": "14:21",
                "end": "20:26",
                "dayName": "Воскресенье"
            }
        ],
        "prices": [],
        "name": null,
        "text": null,
        "address": null
    }
}
```

### HTTP Request
`GET api/clinics/{clinic}`


<!-- END_85e4896a157cade2b6477384aa6591ac -->

#Clinic review


APIs for
<!-- START_1abd9daec7dc72e8dfa2b8dddcc96c1a -->
## List
Список отзывов клиник

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/clinics/reviews" \
    -H "Content-Type: application/json" \
    -d '{"clinic_id":14}'

```

```javascript
const url = new URL("http://localhost/api/clinics/reviews");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "clinic_id": 14
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
$response = $client->get("http://localhost/api/clinics/reviews", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "clinic_id" => "14",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/clinics/reviews`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    clinic_id | integer |  optional  | 

<!-- END_1abd9daec7dc72e8dfa2b8dddcc96c1a -->

<!-- START_6acc9bfda8e1dad237eee8852d08ba1b -->
## Create
Создать отзыв клиники

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/clinics/reviews" \
    -H "Content-Type: application/json" \
    -d '{"clinic_id":18,"rate":19,"text":20}'

```

```javascript
const url = new URL("http://localhost/api/clinics/reviews");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "clinic_id": 18,
    "rate": 19,
    "text": 20
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
$response = $client->post("http://localhost/api/clinics/reviews", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "clinic_id" => "18",
            "rate" => "19",
            "text" => "20",
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
`POST api/clinics/reviews`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    clinic_id | integer |  optional  | 
    rate | integer |  optional  | 1-5
    text | integer |  optional  | 1-5

<!-- END_6acc9bfda8e1dad237eee8852d08ba1b -->

<!-- START_aebb1e8390e705fd8920115e6c210b47 -->
## Show
Показать отзыв отзывов клиник

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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


> Example response (200):

```json
{}
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

#Contraction


APIs for
<!-- START_3f5fb4637d0ff3fe2a234f6bac0fca98 -->
## List cotraction for user

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
## Create cantraction

> Example request:

```bash
curl -X POST "http://localhost/api/contractions" \
    -H "Content-Type: application/json" \
    -d '{"start":"vel","duration":"velit","interval":"et"}'

```

```javascript
const url = new URL("http://localhost/api/contractions");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "start": "vel",
    "duration": "velit",
    "interval": "et"
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
$response = $client->post("http://localhost/api/contractions", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "start" => "vel",
            "duration" => "velit",
            "interval" => "et",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/contractions`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    start | date_format:Y-m-d |  optional  | H:i:s
    duration | date_format:H:i:s |  optional  | 
    interval | date_format:H:i:s |  optional  | 

<!-- END_88f5999187fa6c3806be929b8342bfb8 -->

<!-- START_2ffa12a490e136c29b139610598ca4fc -->
## SHow by id

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
## Destroy by id

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
## Doctor by clinik

> Example request:

```bash
curl -X GET -G "http://localhost/api/specializations/doctors" \
    -H "Content-Type: application/json" \
    -d '{"clinic_id":14}'

```

```javascript
const url = new URL("http://localhost/api/specializations/doctors");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "clinic_id": 14
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
$response = $client->get("http://localhost/api/specializations/doctors", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "clinic_id" => "14",
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
`GET api/specializations/doctors`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    clinic_id | integer |  optional  | 

<!-- END_0d837076a1183451b8487d4b381d7c25 -->

<!-- START_3996aae3ed91064d2f80d0c8b5e81c73 -->
## List doctor

> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors/reviews" \
    -H "Content-Type: application/json" \
    -d '{"doctor_id":9}'

```

```javascript
const url = new URL("http://localhost/api/doctors/reviews");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "doctor_id": 9
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
$response = $client->get("http://localhost/api/doctors/reviews", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "doctor_id" => "9",
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
`GET api/doctors/reviews`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    doctor_id | integer |  optional  | 

<!-- END_3996aae3ed91064d2f80d0c8b5e81c73 -->

<!-- START_70ad9ef21cd58690d1b277bc0ccac5e9 -->
## Create review

> Example request:

```bash
curl -X POST "http://localhost/api/doctors/reviews" \
    -H "Content-Type: application/json" \
    -d '{"doctor_id":14,"rate":13,"text":"doloribus"}'

```

```javascript
const url = new URL("http://localhost/api/doctors/reviews");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "doctor_id": 14,
    "rate": 13,
    "text": "doloribus"
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
$response = $client->post("http://localhost/api/doctors/reviews", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "doctor_id" => "14",
            "rate" => "13",
            "text" => "doloribus",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/doctors/reviews`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    doctor_id | integer |  optional  | 
    rate | integer |  optional  | 1-5
    text | text |  optional  | 1-5

<!-- END_70ad9ef21cd58690d1b277bc0ccac5e9 -->

<!-- START_6256d08430acf84bdbd90f3485b42814 -->
## Show doctor

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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/doctors/reviews/{review}`


<!-- END_6256d08430acf84bdbd90f3485b42814 -->

<!-- START_286d9ac41ec7b34302d6608bb26afa29 -->
## List
Doctor education

> Example request:

```bash
curl -X GET -G "http://localhost/api/doctors/educations" \
    -H "Content-Type: application/json" \
    -d '{"doctor_id":19}'

```

```javascript
const url = new URL("http://localhost/api/doctors/educations");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "doctor_id": 19
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
$response = $client->get("http://localhost/api/doctors/educations", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "doctor_id" => "19",
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
`GET api/doctors/educations`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    doctor_id | integer |  optional  | 

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


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "rate": 4,
            "created_at": "2020-05-13 11:43:10",
            "updated_at": "2020-05-28 14:10:22",
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
                "updated_at": "2020-05-29 17:00:40"
            },
            "clinics": [
                {
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
                    "photo": null,
                    "pivot": {
                        "doctor_id": 1,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 2,
            "user_id": 4,
            "rate": null,
            "created_at": "2020-05-14 17:13:28",
            "updated_at": "2020-05-14 17:13:28",
            "user": {
                "id": 4,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556900",
                "image": null,
                "created_at": "2020-05-14 17:13:28",
                "updated_at": "2020-05-14 17:13:28"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 2,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 2,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 3,
            "user_id": 5,
            "rate": null,
            "created_at": "2020-05-14 17:13:34",
            "updated_at": "2020-05-14 17:13:34",
            "user": {
                "id": 5,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test1@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556901",
                "image": null,
                "created_at": "2020-05-14 17:13:34",
                "updated_at": "2020-05-14 17:13:34"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 3,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 3,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 4,
            "user_id": 6,
            "rate": null,
            "created_at": "2020-05-14 17:13:38",
            "updated_at": "2020-05-14 17:13:38",
            "user": {
                "id": 6,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test2@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556902",
                "image": null,
                "created_at": "2020-05-14 17:13:38",
                "updated_at": "2020-05-14 17:13:38"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 4,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 4,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 5,
            "user_id": 7,
            "rate": null,
            "created_at": "2020-05-14 17:13:42",
            "updated_at": "2020-05-14 17:13:42",
            "user": {
                "id": 7,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test3@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556903",
                "image": null,
                "created_at": "2020-05-14 17:13:42",
                "updated_at": "2020-05-14 17:13:42"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 5,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 5,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 6,
            "user_id": 8,
            "rate": null,
            "created_at": "2020-05-14 17:13:47",
            "updated_at": "2020-05-14 17:13:47",
            "user": {
                "id": 8,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test4@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556904",
                "image": null,
                "created_at": "2020-05-14 17:13:47",
                "updated_at": "2020-05-14 17:13:47"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 6,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 6,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 7,
            "user_id": 9,
            "rate": null,
            "created_at": "2020-05-14 17:13:53",
            "updated_at": "2020-05-14 17:13:53",
            "user": {
                "id": 9,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test5@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556905",
                "image": null,
                "created_at": "2020-05-14 17:13:53",
                "updated_at": "2020-05-14 17:13:53"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 7,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 7,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 8,
            "user_id": 10,
            "rate": null,
            "created_at": "2020-05-14 17:13:59",
            "updated_at": "2020-05-14 17:13:59",
            "user": {
                "id": 10,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test6@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556906",
                "image": null,
                "created_at": "2020-05-14 17:13:59",
                "updated_at": "2020-05-14 17:13:59"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 8,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 8,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 9,
            "user_id": 11,
            "rate": null,
            "created_at": "2020-05-14 17:14:04",
            "updated_at": "2020-05-14 17:14:04",
            "user": {
                "id": 11,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test7@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556907",
                "image": null,
                "created_at": "2020-05-14 17:14:04",
                "updated_at": "2020-05-14 17:14:04"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 9,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 9,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 10,
            "user_id": 12,
            "rate": null,
            "created_at": "2020-05-14 17:14:09",
            "updated_at": "2020-05-14 17:14:09",
            "user": {
                "id": 12,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test8@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556908",
                "image": null,
                "created_at": "2020-05-14 17:14:09",
                "updated_at": "2020-05-14 17:14:09"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 10,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 10,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 11,
            "user_id": 22,
            "rate": null,
            "created_at": "2020-06-22 18:30:24",
            "updated_at": "2020-06-22 18:30:24",
            "user": {
                "id": 22,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "street",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "test9@email.com",
                "name": "name",
                "last_name": "last_name",
                "second_name": "second_name",
                "phone": "+74957556910",
                "image": null,
                "created_at": "2020-06-22 18:30:24",
                "updated_at": "2020-06-22 18:30:24"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 11,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 11,
                        "specialization_id": 1
                    }
                }
            ]
        },
        {
            "id": 12,
            "user_id": 23,
            "rate": null,
            "created_at": "2020-06-25 12:12:03",
            "updated_at": "2020-06-25 12:12:03",
            "user": {
                "id": 23,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "Main",
                "building": "1",
                "apartment": "1",
                "role": "doctor",
                "verified": 0,
                "notification": 1,
                "email": "doctor1@users.com",
                "name": "Нина",
                "last_name": "Иванова",
                "second_name": "Амировна",
                "phone": "+79998012661",
                "image": null,
                "created_at": "2020-06-25 12:12:03",
                "updated_at": "2020-06-25 12:12:03"
            },
            "clinics": [
                {
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
                    "updated_at": null,
                    "pivot": {
                        "doctor_id": 12,
                        "clinic_id": 1
                    }
                }
            ],
            "specialisations": [
                {
                    "id": 1,
                    "photo": null,
                    "pivot": {
                        "doctor_id": 12,
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
    "to": 12,
    "total": 12
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


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "user_id": 1,
        "rate": 4,
        "created_at": "2020-05-13 11:43:10",
        "updated_at": "2020-05-28 14:10:22",
        "specialisations": [
            {
                "id": 1,
                "photo": null,
                "pivot": {
                    "doctor_id": 1,
                    "specialization_id": 1
                }
            }
        ],
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
            "created_at": "2020-05-13 11:43:10",
            "updated_at": "2020-05-29 17:00:40",
            "image": "http:\/\/localhost\/images\/User\/image\/EOsBWWQttqNHW0bnSXa4MyZh1DZE5sMo2667g5Lc.png"
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
            "updated_at": null,
            "pivot": {
                "doctor_id": 1,
                "clinic_id": 1
            },
            "schedules": [
                {
                    "clinic_id": 1,
                    "day": 0,
                    "start": "09:00",
                    "end": "18:00",
                    "dayName": "Понедельник"
                },
                {
                    "clinic_id": 1,
                    "day": 1,
                    "start": "08:00",
                    "end": "14:13",
                    "dayName": "Вторник"
                },
                {
                    "clinic_id": 1,
                    "day": 2,
                    "start": "17:19",
                    "end": "19:21",
                    "dayName": "Среда"
                },
                {
                    "clinic_id": 1,
                    "day": 3,
                    "start": "18:20",
                    "end": "23:20",
                    "dayName": "Четвер"
                },
                {
                    "clinic_id": 1,
                    "day": 4,
                    "start": "17:16",
                    "end": "20:19",
                    "dayName": "Пятница"
                },
                {
                    "clinic_id": 1,
                    "day": 5,
                    "start": "07:27",
                    "end": "16:26",
                    "dayName": "Суббота"
                },
                {
                    "clinic_id": 1,
                    "day": 6,
                    "start": "14:21",
                    "end": "20:26",
                    "dayName": "Воскресенье"
                }
            ]
        },
        "educations": {
            "data": [
                {
                    "id": 2,
                    "doctor_id": 1,
                    "title": "Одинатура",
                    "description": "Кафедра акушерства и гинекологии организована в 1995 году в составе заведующего кафедрой В.И. Радько и кандидата медицинских наук Темуряна М.К., ассистентов Ширгалиевой Е.С., Калдыбековой Н.И. В связи с увелечением штатов, кафедра с годами пополнялась новыми работниками: кандидатом медицинских наук Данияровой А.Ж, ассистентами Исмаиловой У.И., Нартаевой М.М., Абдукасымовой Э.А., Тажибаевой М.С., Мамырбековой С.У., Джунусовой Р.К.",
                    "created_at": "29.05.2020 12:42",
                    "updated_at": "29.05.2020 12:42"
                },
                {
                    "id": 3,
                    "doctor_id": 1,
                    "title": "Повышение квалификации",
                    "description": "Под руководством к.м.н. Тлеужан Р.Т. в 2013г. успешно защищены магистрские диссертации магистрантов: Байжуматовой Б. на тему «Особенности ведения родов у многорожавших женщин по ЮКО», Ермановой А на тему«Медико-социальные аспекты материнской смертности в г.Шымкент», Саркуловой И. на тему «Оценка исходов при наружном профилактическом повороте плода», в 2015г. защищены диссертации магистрантов: Болатбаевой А.С.",
                    "created_at": "29.05.2020 12:43",
                    "updated_at": "29.05.2020 12:43"
                }
            ],
            "links": {
                "self": "link-value"
            }
        }
    }
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
    -d '{"phone":"est"}'

```

```javascript
const url = new URL("http://localhost/api/my-duration");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "phone": "est"
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
            "phone" => "est",
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


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "pos": 1,
            "name": "первая",
            "text": null,
            "photo": null
        },
        {
            "id": 2,
            "pos": 2,
            "name": "вторвая",
            "text": null,
            "photo": null
        },
        {
            "id": 3,
            "pos": 3,
            "name": "третья",
            "text": null,
            "photo": null
        },
        {
            "id": 4,
            "pos": 4,
            "name": "4",
            "text": null,
            "photo": null
        },
        {
            "id": 5,
            "pos": 5,
            "name": "5",
            "text": null,
            "photo": null
        },
        {
            "id": 6,
            "pos": 6,
            "name": "6",
            "text": null,
            "photo": null
        },
        {
            "id": 7,
            "pos": 7,
            "name": "7",
            "text": null,
            "photo": null
        },
        {
            "id": 8,
            "pos": 8,
            "name": "8",
            "text": null,
            "photo": null
        },
        {
            "id": 9,
            "pos": 9,
            "name": "9",
            "text": null,
            "photo": null
        },
        {
            "id": 10,
            "pos": 10,
            "name": "10",
            "text": null,
            "photo": null
        },
        {
            "id": 11,
            "pos": 11,
            "name": "11",
            "text": null,
            "photo": null
        },
        {
            "id": 12,
            "pos": 12,
            "name": "12",
            "text": null,
            "photo": null
        },
        {
            "id": 13,
            "pos": 13,
            "name": "13",
            "text": "",
            "photo": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/durations?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/durations?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/durations",
    "per_page": 20,
    "prev_page_url": null,
    "to": 13,
    "total": 13
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


> Example response (200):

```json
{
    "id": 1,
    "pos": 1,
    "name": "первая",
    "text": null,
    "photo": null
}
```

### HTTP Request
`GET api/durations/{duration}`


<!-- END_027089caf0b385aaf688bb21c9acb26a -->

#Emergency Contacts


APIs for
<!-- START_a5ca6ccf2ba7bf3a34749a84bfe5869a -->
## List emergency contacts

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
## Create emergency contact

> Example request:

```bash
curl -X POST "http://localhost/api/emergency_contacts" \
    -H "Content-Type: application/json" \
    -d '{"name":"asperiores","phone":"voluptatem"}'

```

```javascript
const url = new URL("http://localhost/api/emergency_contacts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "asperiores",
    "phone": "voluptatem"
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
$response = $client->post("http://localhost/api/emergency_contacts", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "name" => "asperiores",
            "phone" => "voluptatem",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/emergency_contacts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | 
    phone | string |  optional  | 

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
    -d '{"weights":"quisquam","date":"totam"}'

```

```javascript
const url = new URL("http://localhost/api/patient/weight");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "weights": "quisquam",
    "date": "totam"
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
            "weights" => "quisquam",
            "date" => "totam",
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
                "image": "http:\/\/med.weedoo.ru\/storage\/app\/avatar\/24\/aMF9BDzIdFxSqixvvTWTCigkimutClRXo1P6rXPl.jpeg",
                "created_at": "2020-07-02 19:05:20",
                "updated_at": "2020-07-21 11:21:01",
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
        },
        {
            "id": 14,
            "user_id": 28,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 22:23:30",
            "updated_at": "2020-07-08 22:23:30",
            "user": {
                "id": 28,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma@roma.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554715",
                "image": null,
                "created_at": "2020-07-08 22:23:30",
                "updated_at": "2020-07-08 22:23:30",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        },
        {
            "id": 15,
            "user_id": 29,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 22:24:26",
            "updated_at": "2020-07-08 22:24:26",
            "user": {
                "id": 29,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma@roma1.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554716",
                "image": null,
                "created_at": "2020-07-08 22:24:26",
                "updated_at": "2020-07-08 22:24:26",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        },
        {
            "id": 16,
            "user_id": 30,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 22:25:28",
            "updated_at": "2020-07-08 22:25:28",
            "user": {
                "id": 30,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma@roma12.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554717",
                "image": null,
                "created_at": "2020-07-08 22:25:28",
                "updated_at": "2020-07-08 22:25:28",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        },
        {
            "id": 17,
            "user_id": 31,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 22:27:59",
            "updated_at": "2020-07-08 22:27:59",
            "user": {
                "id": 31,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma@roma122.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554718",
                "image": null,
                "created_at": "2020-07-08 22:27:59",
                "updated_at": "2020-07-08 22:27:59",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        },
        {
            "id": 19,
            "user_id": 33,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 22:30:51",
            "updated_at": "2020-07-08 22:30:51",
            "user": {
                "id": 33,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma1@roma1222.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554720",
                "image": null,
                "created_at": "2020-07-08 22:30:51",
                "updated_at": "2020-07-08 22:30:51",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        },
        {
            "id": 20,
            "user_id": 34,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 22:39:04",
            "updated_at": "2020-07-08 22:39:04",
            "user": {
                "id": 34,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma1@roma12222.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554721",
                "image": null,
                "created_at": "2020-07-08 22:39:04",
                "updated_at": "2020-07-08 22:39:04",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        },
        {
            "id": 21,
            "user_id": 35,
            "clinic_id": null,
            "doctor_id": null,
            "date_of_birth": "2020-01-11 00:00:00",
            "conception_date": null,
            "conception_type": null,
            "pregnant": 1,
            "created_at": "2020-07-08 23:01:08",
            "updated_at": "2020-07-08 23:01:08",
            "user": {
                "id": 35,
                "lang_id": 1,
                "region_id": 1,
                "city_id": 1,
                "street": "iusto",
                "building": "quae",
                "apartment": "incidunt",
                "role": "patient",
                "verified": 0,
                "notification": 1,
                "email": "roma1@rom1a12222.net",
                "name": "eum",
                "last_name": "esse",
                "second_name": "nemo",
                "phone": "+380938554722",
                "image": null,
                "created_at": "2020-07-08 23:01:08",
                "updated_at": "2020-07-08 23:01:08",
                "region": {
                    "id": 1
                },
                "city": {
                    "id": 1,
                    "region_id": 1
                }
            },
            "clinic": null,
            "doctor": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/patients?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "http:\/\/localhost\/api\/patients?page=2",
    "next_page_url": "http:\/\/localhost\/api\/patients?page=2",
    "path": "http:\/\/localhost\/api\/patients",
    "per_page": 20,
    "prev_page_url": null,
    "to": 20,
    "total": 32
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
    -d '{"conception_type":"omnis","conception_date":"facere"}'

```

```javascript
const url = new URL("http://localhost/api/conception-date");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "conception_type": "omnis",
    "conception_date": "facere"
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
            "conception_type" => "omnis",
            "conception_date" => "facere",
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
## Last

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
## Create belly

> Example request:

```bash
curl -X POST "http://localhost/api/bellies" \
    -H "Content-Type: application/json" \
    -d '{"uterine_fundus_height":"ratione","girth_abdomen":"non","date":"voluptatum"}'

```

```javascript
const url = new URL("http://localhost/api/bellies");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "uterine_fundus_height": "ratione",
    "girth_abdomen": "non",
    "date": "voluptatum"
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
$response = $client->post("http://localhost/api/bellies", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "uterine_fundus_height" => "ratione",
            "girth_abdomen" => "non",
            "date" => "voluptatum",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/bellies`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    uterine_fundus_height | numeric |  optional  | 
    girth_abdomen | numeric |  optional  | 
    date | date |  optional  | 

<!-- END_10d7fe99da6529ea61db5250f8cc9b26 -->

<!-- START_46199db951bfe10deee82f6f6bdd40e8 -->
## Show by id

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


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": null,
            "photo": null
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http:\/\/localhost\/api\/specializations?page=1",
        "last": "http:\/\/localhost\/api\/specializations?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/specializations",
        "per_page": 20,
        "to": 1,
        "total": 1
    }
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


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": null,
        "photo": null
    }
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


