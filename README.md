# SecureCore – MVC Multi-Role Authentication System

This project is a custom-built authentication system developed in PHP using a homemade MVC architecture (without any framework).
It follows a layered architecture using **Entities, Repositories, and Services** to ensure clean separation of concerns, scalability, and maintainability.

---

## Project Objectives

- Implement a clean MVC architecture
- Build a centralized routing system
- Apply a layered architecture (Entity, Repository, Service)
- Separate business logic from controllers and views
- Manage multi-role authentication
- Protect routes based on authentication and role
- Apply modern security practices
- Demonstrate why OOP is more maintainable than procedural code

---

## Architecture Overview

This project follows a strict layered MVC structure:

```
Request → index.php → Router → Controller → Service → Repository → Database
                                             ↓
                                            Entity
                                             ↓
                                            View
```

### Layer Responsibilities

- **Entity**: Represents domain objects (User, Role, Candidate, Company)
- **Repository**: Handles all database operations
- **Service**: Contains business logic
- **Controller**: Handles HTTP requests and responses
- **View**: Displays data (no logic)
- **Router**: Centralized route management
- **Middleware**: Access control & security

---

## User Roles

- **Admin**
- **Candidate**
- **Company**

Each role has:

- Its own routes
- Its own controllers
- Its own protected views
- Its own dashboard
- Its own access rules

---

## Features

### Authentication

- User registration
- User login
- User logout
- Secure password hashing
- PHP session management

### Role Management

- Role assignment on registration
- Role-based redirection
- Role-based route protection

### Security

- Password hashing
- CSRF protection
- XSS prevention
- SQL Injection prevention (PDO prepared statements)
- Input validation & output escaping

---

## Project Rules

- Single entry point (`public/index.php`)
- No direct access to views
- No SQL in controllers
- No business logic in views
- No procedural code in controllers
- All database access via repositories

---

## Project Structure

```
/app
  /Controllers
  /Entities
  /Repositories
  /Services
  /Views
  /Core
/public
  index.php
/config

```

---

## UML Diagrams

- Use Case Diagram
- Class Diagram

Both diagrams are provided in the `/documents` folder.

---

## Technologies Used

- PHP (OOP)
- MySQL
- PDO
- HTML5
- CSS3
- JavaScript (Vanilla)
- MVC (custom)
- Git & GitHub

---

## Installation

1. Clone the repository
2. Import the SQL script into your database
3. Configure database credentials
4. Start a local server
5. Access via `public/index.php`

---

## Deliverables

- GitHub repository
- Jira task planning
- UML diagrams
- SQL script
- Final report

---

## Author

Project developed as part of a learning assignment to demonstrate MVC architecture, layered design, OOP principles, and secure authentication systems.
