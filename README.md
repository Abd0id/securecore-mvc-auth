# SecureCore – MVC Multi-Role Authentication System

This project is a custom-built authentication system developed in PHP using a homemade MVC architecture (without any framework). It supports multiple user roles with protected routes, secure session handling, and a scalable structure.

---

## Project Objectives

* Implement a clean MVC architecture
* Build a centralized routing system
* Separate business logic, controllers, and views
* Manage multi-role authentication
* Protect routes based on authentication and role
* Apply modern security practices
* Demonstrate why OOP is more maintainable than procedural code

---

## User Roles

* **Admin**
* **Candidate**
* **Company**

Each role has:

* Its own routes
* Its own controllers
* Its own protected views
* Its own dashboard

---

## Features

### Authentication

* User registration
* User login
* User logout
* Secure password hashing
* PHP session management

### Role Management

* Role assignment on registration
* Role-based redirection
* Role-based route protection

### Security

* Password hashing
* CSRF protection
* XSS prevention
* SQL Injection prevention (PDO prepared statements)
* Input validation & output escaping

---

## Architecture

This project follows a strict MVC pattern:

```
Request → index.php → Router → Controller → Model → View
```

### Key Rules:

* Single entry point
* No business logic in views
* No SQL in controllers
* No direct access to views
* Centralized routing

---

## Project Structure

```
/app
  /Controllers
  /Models
  /Views
  /Core
/public
  index.php
/config
```

---

## UML Diagrams

* Use Case Diagram
* Class Diagram

Both diagrams are provided in the `/documents` folder.

---

## Technologies Used

* PHP (OOP)
* MySQL
* PDO
* HTML5
* CSS3
* JavaScript (Vanilla)
* MVC (custom)
* Git & GitHub

---

## Installation

1. Clone the repository
2. Import the SQL script into your database
3. Configure database credentials
4. Start a local server
5. Access via `public/index.php`

---

## Deliverables

* GitHub repository
* Jira task planning
* UML diagrams
* SQL script
* Final report

---

## Author

Project developed as part of a learning assignment to demonstrate MVC architecture, OOP principles, and secure authentication systems.
