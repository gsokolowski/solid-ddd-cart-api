# solid-ddd-cart-api

A small Laravel REST API for practicing SOLID and a light Domain-Driven Design layout. It is a cart and checkout exercise, not a full shop.

Customers register and log in with Laravel Sanctum and receive a Bearer token. With that token they can list products, keep a cart, and check out. Checkout supports two fake payment methods, Stripe and PayPal, behind one payment interface so a new method does not require changes inside the checkout flow.

## What it is for

- Keep business rules in the domain and application layers, not in controllers.
- Depend on interfaces for catalogs, carts, orders, and payments.
- Treat sales as one bounded context: user, product, cart, order, and payment.

## API

JSON routes live under `/api`.

| Area | What a client can do |
| --- | --- |
| Auth | Register, log in, log out, and read the current user. Login returns a Sanctum token. |
| Catalog | List products. |
| Cart | Add a product, list the cart, change a quantity, and remove a line. |
| Checkout | Turn the cart into a paid order with `stripe` or `paypal`, then clear the cart. |

Protected routes expect `Authorization: Bearer {token}`. There is no HTML login page.

## Stack

- Laravel 13
- Laravel Sanctum (API tokens)
- MySQL 8
- PHPUnit feature tests for auth, cart, and checkout

## Shape of the code

```
HTTP (controllers)
   ↓
Application (use cases)
   ↓
Domain (entities, interfaces, domain services)
   ↑
Infrastructure (Eloquent repositories, Sanctum, payment adapters)
```

Controllers validate the request and call a use case. Price and payment rules stay in domain services. Eloquent models and the Stripe and PayPal adapters stay in infrastructure.

## Out of scope

No storefront UI, Google login, real payment SDKs, coupons, wishlists, admin panel, CQRS, or domain events.
