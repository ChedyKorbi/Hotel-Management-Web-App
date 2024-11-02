Here’s an updated README file without the code sample.

---

# Hôtel Management Web Application

This project is a hotel management web application designed to streamline room booking and reservation management for both administrators and clients. Built with PHP, MySQL, and Bootstrap, this application automates bookings, reduces errors, and enhances the overall efficiency of hotel operations. 

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [User Guide](#user-guide)
  - [Client Guide](#client-guide)
  - [Admin Guide](#admin-guide)
- [Database Structure](#database-structure)

---

## Overview

The Hôtel Management Web Application provides an interface for hotel clients and administrators. Clients can log in to book rooms, check room availability, and manage their reservations. Administrators have full access to manage rooms, clients, reservations, and all associated data through a CRUD (Create, Read, Update, Delete) functionality.

## Features

### Client-Side
- **Room Reservation**: Clients can view available rooms and make reservations.
- **Account Management**: Sign-up and login functionalities for clients.
- **Reservation Management**: Clients can view, modify, or cancel their reservations.

### Admin-Side
- **Client Management**: View, add, edit, or delete client details.
- **Room Management**: View, add, edit, or delete rooms; ensures that rooms with reservations cannot be deleted.
- **Reservation Management**: Manage reservations, check availability, and oversee client bookings.

## Technologies Used
- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP, Object-Oriented Programming (OOP)
- **Database**: MySQL (managed with phpMyAdmin)

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/yourusername/hotel-management-app.git
   ```
2. Set up a local server (e.g., XAMPP, WAMP) and place the project in the `htdocs` directory.
3. Create a MySQL database named `hotel_management` and import the provided SQL file (`database.sql`) from the project folder.
4. Update the database credentials in `connexion.php` to match your server's configuration.

## Project Structure

- **connexion.php**: Database connection file.
- **index.php**: Landing page for the application.
- **client/**: Directory containing client-specific pages (e.g., login, signup).
- **admin/**: Directory for admin-specific pages (e.g., dashboard, manage rooms, manage clients).
- **models/**: Contains PHP classes for database entities.
    - `Client.php`
    - `Chambre.php`
    - `Reservation.php`
- **css/**: CSS files for styling.
- **js/**: JavaScript files for interactivity.

## User Guide

### Client Guide

1. **Sign Up**: New users can create an account using the signup page.
2. **Login**: Existing users can log in to access their dashboard.
3. **Check Room Availability**: Clients can view available rooms and their details.
4. **Make a Reservation**: After selecting an available room, clients can book it by specifying their check-in and check-out dates.
5. **View Reservations**: Clients can see their current reservations, including dates and status.
6. **Cancel Reservation**: Clients can cancel their reservation if plans change.

### Admin Guide

1. **Login**: Admins log in using a separate admin login page.
2. **Manage Rooms**: Admins can add, edit, or delete rooms from the database.
3. **Manage Clients**: View client details, add new clients, or update existing client information.
4. **Handle Reservations**: View all reservations, modify them as necessary, and manage client bookings.

## Database Structure

The database consists of three main tables:
1. **Clients**: Stores client data including their credentials and personal details.
2. **Chambres (Rooms)**: Contains room information like room number, type, and price.
3. **Reservations**: Links clients to room bookings and stores reservation details.

## Notes

- **Security**: This project has basic security measures. Additional precautions like password hashing and input validation are recommended for production.
- **Dependencies**: Ensure you have PHP and MySQL set up, and configure `connexion.php` correctly for database connections.

This README provides users with a structured guide to install, use, and understand the application, along with key information on its features and structure.

---
