### Lesson 15

change composer.json for auto discovery purpose :
```
"extra": {
  "laravel": {
    "providers": [
      "pouria\\Press\\PressBaseServiceProvider"
      ]
 }
}
```

<hr>  

add this lines to composer.json of your project that supposed to
use Press Package :

```

"repositories": {
 "dev-package": {
    "type": "path",
    "url": "/path/of/package",
    "options": {
      "symlink": true
    }
  } 
}

 ```
