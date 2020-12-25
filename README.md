## Lareact-Api
An Open source E-commerce API for testing and working with Frontend frameworks

## About Lareact-Api

Lareact-Api is an open source ecommerce API built with the most popular PHP framework(Laravel), it is meant to help developers who do not want to spend time working with dummy data while designing the frontend of their.

## Built with Laravel.

Feel free to fork the repository and modify it according to your choice do not forget to star the **repo**.

## Found it useful
 If you find this repo helpful feel free to let me know on all or any of my social media handle
- [Daniel Okoronkwo On Twitter](https://twitter.com/@iamtheLucho)
- [Daniel Okoronkwo On LinkedIn](https://www.linkedin.com/in/daniel-okoronkwo-a0a0821b2)
- [Daniel Okoronkwo on Facebook](https://www.facebook.com/daniel.okoronkwo.52)
- [Daniel Okoronkwo on GitHub](https://github.com/danielokoronkwo-coder)

## How it works
Lareact is an E-commerce API that allows the user to access both Products and its associated reviews
#### Authentication

As with every public API in the world there are certain parts of the `Lareact-API` that are unaccessible to you unless you are a registered user in light of this let's see how you can become a user

#### Register
To register send a `POST` request to `http://localhost:8000/api/v1/auth/register` with `name`, `email`, `password` field all sent via form. it will return a success message that you have been successfully register

#### Login
Sending a `POST` request to `http://localhost:8000/api/v1/auth/login` with `email`, `password` field all sent via form  will return a sample data like this:
```bash
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MDg4NTU2ODIsImV4cCI6MTYwODk0MjA4MiwibmJmIjoxNjA4ODU1NjgyLCJqdGkiOiJ4UzQzYll4UjJlR3QwVmgwIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.xPXhauAB5m5kw9KovNKFYmlmjFUiaggG3JZoC9i7jOc",
    "token_type": "bearer",
    "expires_in": 86400
}
```
##### Few things to note about the data returned
- The `data` returned above shows that you have successfully logged in
- The `access_token` value should be used to make subsequent request to Lareact-API endpoints that requires authentication
- Google how to make API request using `access_tokens`
- The `access_token` expires in `24-hours` which is equivalent to the value of the `expires_in` 
  
#### Refresh
If you feel that your `access_token` is about to expire and you need to generate a nes one, just seen a `POST` request to `http://localhost:8000/api/v1/auth/refresh` alongside the about to expire `access_token`. A sample data will be returned to you

```bash
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MDg4NTU2ODIsImV4cCI6MTYwODk0MjA4MiwibmJmIjoxNjA4ODU1NjgyLCJqdGkiOiJ4UzQzYll4UjJlR3QwVmgwIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.xPXhauAB5m5kw9KovNKFYmlmjFUiaggG3JZoC9i7jOc",
    "token_type": "bearer",
    "expires_in": 86400
}
```
- The `access_token` returned this time will be a new one

#### Me
If for some reason you are unable to access the API endpoints made available, you would need to check if you are logged in.

To check if logged in or to see your details send a `POST` request to `http://localhost:8000/api/v1/auth/me` it will return all your details stored in our database

#### Logout

To logout a `POST` request to `http://localhost:8000/api/v1/auth/logout` will do the trick

#### Products API
The products API allows you to access all data related to the products

**NB:** Apart from the `Get all Products` and `Get a single product` all other route requires that the request be sent together with the `access-token` returned when you are logged in 

##### Get all Products
To get all the **products** and it related data you have to send a `GET` request to this endpoint

`http://localhost:8000/api/v1/products`

Once you hit this endpoint not only will it return all products, it will also return all related meta information that you would need in your development process

##### Get a single Product
To get a single **product** utilizing it's Id send a `GET` request this endpoint

`http://localhost:8000/api/v1/products/{id}`

where {id} could be any number between 1 and 100

##### Storing a new Product
Sending a `POST` request to `http://localhost:8000/api/v1/products` with the `name`, `price`, `stock`, `discount`, `description` and all it's value **specified** would create a new Product according to all specified data provided.
**Exxample**
A `POST` request sent to `http://localhost:8000/api/v1/products` with **Sample data**
```bash
{
    "name": "Iphone 11 pro max",
    "price": 500,
    "stock": 20,
    "discount": 50,
    "description": "A short description about Iphone"
}
```
would create a new Product with all the data specified above
##### Updating a specific Product
Sending a `PUT` request to `http://localhost:8000/api/v1/products/{id}` with the `name`, `price`, `stock`, `discount`, `description` and all it's value **specified** where the `id` must be an integer number would update the specified product with that `id`.

##### Deleting a specific Product

Sending a `DELETE` request to `http://localhost:8000/api/v1/products/{id}` where the `id` must be specified and must also be an integer number would `Delete` the Product with the specified `id`

**Example**
A `DELETE` request sent to `http://localhost:8000/api/v1/products/5` would delete the product with `id` of **5**

#### Reviews API

Unlike Products API Reviews API can not work without the Products API because of the relationship it shares with the Products.

The Products and Reviews API have a **one-to-many** relationship. This means that a particular **product** would have one or more **reviews** and a particular **review** must belong to a particular **product** with no exception.

**NB:** Apart from the `Getting all reviews related to a specific Product(10)` and `Getting a specific review related to a specific Product(10)` all other route requires that the request be sent together with the `access-token` returned when you are logged in 

**NB:** Also necessary to note. One of the data returned alongside other fields when a `GET` request is sent to the Products API is the `href` field. 

**Example**
```bash
 "data": {
        "id": 10,
        "name": "vel",
        "price": 364,
        "stock": "Out of Stock",
        "discount": 40,
        "totalPrice": 218,
        "description": "Qui in et voluptatem voluptatem omnis quae esse. Nostrum officiis cumque nam. Quia illo voluptas qui necessitatibus libero odit. Minima vel dolor vel et.",
        "rating": 3.5,
        "href": {
            "reviews": "http://localhost:8000/api/v1/products/10/reviews"
        }
    }
```
The `href` field contains link to all reviews related to a specific product. In light of this let us see how we can access reviews of a particular product separately.

For the purpose of this documentation the `id` of the product we would be referring to is `10`

##### Getting all reviews related to a specific Product(10)

A `GET` request sent to `http://localhost:8000/api/v1/products/10/reviews` will return all reviews that are related to Product with `id` 10

##### Getting a specific review related to a specific Product(10)
A `GET` request sent to `http://localhost:8000/api/v1/products/10/reviews/14` will return a review with `id` 14 that is related to Product with `id` 10

##### Storing a review
A review cannot be stored without specifying the product to which the review is for.
A `POST` request sent to `http://localhost:8000/api/v1/products/10/reviews` with **sample data** 
```bash
{
    "customer": "Daniel",
    "review": "Daniel's reviews",
    "rating": 4
}
```
will create a new review for product with `id` 10

##### Updating a specific review
A `PUT` request sent to `http://localhost:8000/api/v1/products/10/reviews/14` with **sample data** 
```bash
{
    "id": 302,
    "customer": "My girlfriend",
    "review": "My girlfriend's reviews updated to chinedu",
    "rating": 3
}
```
will update a review with `id` 14 that is related to Product with `id` 10

##### Deleting a specific review
A `DELETE` request sent to `http://localhost:8000/v1/api/products/10/reviews/14`
will delete a review with `id` 14 that is related to Product with `id` 10 with the product remaining untouched
