# 🔐 PHP Strong Password Generator


A simple yet powerful PHP-based password generator that creates secure and customizable passwords based on user-defined criteria.

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue)
![Status](https://img.shields.io/badge/status-stable-success)

![image](/screenshots/home.png)

## Table of Contents  
- [Overview](#overview)
- [Tech Stack](#tech-stack)
- [Features](#features)
- [Project Structure](#project-structure)
- [How It Works](#how-it-works)
- [Security Considerations](#security-considerations)
- [Requirements](#requirements)
- [Installation](#installation)
- [Author](#author)
- [License](#license)
- [Future Improvements](#future-improvements)

<br>

## Overview 🧩 

**PHP Strong Password Generator** allows users to generate secure and fully customizable passwords directly from a web interface.  
Users can define:
- Desired password length  
- Inclusion of uppercase letters  
- Inclusion of numbers  
- Inclusion of special characters 

Passwords are generated using a custom algorithm and displayed on a dedicated results page for a clean user experience.

This project was built as an educational exercise to practice PHP logic separation, session handling, and UI integration.

<br>

## Tech Stack 🧠 
- **Language:** PHP 8.1+
- **Frontend:** HTML5, CSS3
- **Server:** PHP Built-in / Apache
- **Data handling:** PHP Sessions

<br>

## Features ⚙️ 

✅ Generates passwords with customizable options  
✅ Uses a Fisher–Yates shuffle algorithm for extra randomness  
✅ Modular structure (`functions.php`, `index.php`, `result.php`)  
✅ Securely stores data in session  
✅ Lightweight, dependency-free PHP project  

<br>

## Project Structure 🧱 
php-strong-password-generator/ <br>
├── screenshots (README screenshots folder) <br>
├── js (JavaScript files folder) <br>
├── README.md (Project documentation) <br>
├── functions.php (Contains the password generation logic) <br>
├── index.php (Main page with password generation form) <br>
├── result.php (Displays the generated password) <br>
└── style.css (File for styling the webapp) <br>

<br>

## How It Works 🧮 

1. The user selects password length and optional character sets.


![image](/screenshots/example.png)


2. The data is sent via **GET** to the backend.

```php
index.php 

// Stores user's password length request
$userChosenLength = $_GET['pwLength'] ?? null;
        
// Converting the string into a number
if($userChosenLength != null){
    
    $pwLength = intval($userChosenLength);
}

// Storing user preferences
$pwGotUpperCase = $_GET['upper'] ?? '';
$pwGotNumbers = $_GET['num'] ?? '';
$pwGotSpecial = $_GET['special'] ?? '';
```

<br>

3. `passwordGenerator` processes the request and generates the password:
   - Always includes lowercase letters.
   - Optionally includes uppercase letters, numbers, and/or special characters.
   - Randomizes the result using the **Fisher–Yates algorithm**.

4. The generated password is stored in a **PHP session**.

<br>

```php
index.php 

// When the preferences are set
if (isset($userChosenLength) && $pwLength >= 8 && $pwLength <= 24) {
    
    // Stores the generated password after passing the requests
    $pw = passwordGenerator( $pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial );
    
    // Password is sent to the result page
    $_SESSION['pwd'] = $pw;

    // User is redirected
    header('Location: ./result.php');

    exit;
}
```

<br>

5. The user is redirected to `result.php` to view the password.

<br>

![image](/screenshots/result.png)

6. The user can generate a new password, and can copy the generated one for easier use.

<br>

## Security Considerations 🔒 
- The password generation happens entirely on the server, ensuring no client-side exposure.
- Passwords are not logged or stored permanently — only kept in session during runtime.
- For production-grade implementations, consider adding:
  - HTTPS enforcement
  - CSRF protection on form submission
  - Rate limiting for API endpoints

<br>

## Requirements 💻 

PHP 8.1+

Local server (e.g., XAMPP, MAMP, Laragon, or PHP built-in server)

<br>

## Installation 🧰 

1. Clone the repository:

```
git clone https://github.com/coluccifrancesco/php-strong-password-generator.git
```

2. Move into the project folder:

```
cd php-strong-password-generator
```

3. Run a local PHP server:

```
php -S localhost:8000
```

4. Open your browser and visit:

```
http://localhost:8000
```

<br>

## Author 🧑‍💻 

Francesco Colucci <br>
📍 Italy <br>
[💼 GitHub Profile](https://github.com/coluccifrancesco) <br>
[👨🏻‍💼 LinkedIn Profile](https://www.linkedin.com/in/francesco-colucci-589414290/) <br>
🖋️ Student & Web Developer passionate about PHP, security, and clean UI design.

<br>

## License 📄 

This project is released under the MIT License.
You are free to use, modify, and distribute it, provided the original author is credited.

<br>

## Future Improvements 🌟 

- Password strength indicator (frontend) 💪🏻

- Implement API endpoint for external password requests 💻

- Add dark/light theme toggle 🌗
 
- Docker container for local development 🐋