# Laravel Blog API with Sanctum

## Overview
This is the backend API for a blog application, built with Laravel and integrated with MongoDB for database storage. The API is secured using Laravel Sanctum for authentication and provides endpoints to manage blog posts.

## Approach
The backend uses Laravel's resource controllers to handle CRUD operations for blog posts. Sanctum is used to secure API routes that interact with MongoDB, ensuring authentication is handled properly. The integration between Laravel and MongoDB was achieved using the official MongoDB driver for Laravel.

## Setup Instructions

### Prerequisites
- PHP 8 or higher
- Composer
- MongoDB (For database)
- Node.js and npm


## API Endpoints

- **GET /api/posts**: Retrieve a list of all blog posts.
- **GET /api/posts/{id}**: Retrieve the details of a single blog post.

## Postman Collection
A Postman collection with sample requests is provided. The collection contains examples for each of the API endpoints, making it easier to test the backend.

## Challenges
- **Sanctum Authentication**: Ensuring proper integration between Sanctum and the frontend required setting up CORS and managing CSRF tokens effectively.
- **MongoDB Integration**: Setting up MongoDB as the database required custom configurations and careful management of migrations and models.
- **API Testing**: Ensuring the APIs returned the correct data involved using Postman extensively and handling errors properly in the responses.

## GitHub Repository
https://github.com/sabindhital672/cosc5601stassessment.git
