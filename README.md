# IIM_A2_GIT

# WORK

Guillaume
------
* Login
* Tags
* API
* Composer

Ali
------
* Register
* Password Hashing

# API

The API root URL is located at http://localhost:8089/api/

### Method "music"
> Get the metadata for a music using the music id.

##### ENDPOINT DEFINITION
GET `http://localhost/api/music.php?id=MUSICID`

##### RESPONSE HEADER 

```
Cache-Control: no-store, no-cache, must-revalidate
Connection: close
Content-Type: application/json
Date: Fri, 20 Apr 2018 11:39:35 +0000
Expires: Thu, 19 Nov 1981 08:52:00 GMT
Host: localhost
Pragma: no-cache
X-Powered-By: PHP/7.2.4
```

##### RESPONSE BODY
```json
{
"id": "1",
"user_id": "1",
"title": "UN*DEUX - Shopping Day",
"file": "musics/d0dbde0148d66ddf8ae815e014e2a668.1.mp3",
"created_at": "2015-10-01 15:35:05"
}
```

### Method "tags"
> Get the tags for a music using the artist name.

##### ENDPOINT DEFINITION
GET `http://localhost/api/tags.php?artist=ARTISTNAME`

##### RESPONSE HEADER 

```
Cache-Control: no-store, no-cache, must-revalidate
Connection: close
Content-Type: application/json
Date: Fri, 20 Apr 2018 11:39:35 +0000
Expires: Fri, 20 Apr 2018 12:28:49 +0000
Host: localhost
Pragma: no-cache
X-Powered-By: PHP/7.2.4
```

##### RESPONSE BODY
```json
{
"tags": [
"Hip-Hop",
"electro"
]
}
```

### Method "comments"
> Get the comments for a music using the music id.

##### ENDPOINT DEFINITION
GET `http://localhost/api/comments.php?musicid=MUSICID`

##### RESPONSE HEADER 

```
Coming soon
```

##### RESPONSE BODY
```
Coming soon
```

### Method "comments"
> Get the likes for a music using the music id.

##### ENDPOINT DEFINITION
GET `http://localhost/api/likes.php?musicid=MUSICID`

##### RESPONSE HEADER 

```
Coming soon
```

##### RESPONSE BODY
```
Coming soon
```




