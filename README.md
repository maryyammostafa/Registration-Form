# PHP Registration & Profile Management

A simple PHP project built while learning the fundamentals of PHP. The application allows users to register, upload a profile image, and manage their profile information through a clean interface with server-side validation.

---

## ✨ Features

### 📝 Registration

- User registration form
- Server-side form validation
- Error handling using PHP Sessions
- Preserving old input values after validation
- Profile image upload
- Automatic image renaming using timestamps
- Password hashing using `password_hash()`
- Email validation using `filter_var()`

### 👤 Profile Management

- View user profile
- Edit profile information (Name, Email, Language)
- Change password
- Change profile image
- Automatically delete the old profile image after uploading a new one
- Success notifications using SweetAlert2
- Bootstrap Modals for editing without leaving the profile page

### ✅ Validation

- Name validation using Regular Expressions
- Password strength validation
- Email validation
- Image extension validation (`jpg`, `jpeg`, `png`, `webp`)
- File upload validation

---

## 🛠️ Technologies Used

- PHP
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- SweetAlert2
- Font Awesome
- PHP Sessions
- File Uploads

---

## 📂 Project Structure

```text
.
├── index.php              # Registration page
├── profile.php            # User profile
├── PHP/
│   ├── process.php        # Registration processing
│   ├── update.php         # Profile update processing
│   └── functions.php      # Validation & helper functions
├── uploads/               # Uploaded profile images
├── CSS/
├── JS/
└── README.md
```

---

## 🚀 How to Run

1. Clone the repository.

```bash
git clone https://github.com/YourUsername/YourRepository.git
```

2. Place the project inside your XAMPP `htdocs` folder (or create a symbolic link).

3. Start **Apache** from XAMPP.

4. Open your browser and visit:

```text
http://localhost/ProjectFolderName
```

---

## 📚 Learning Objectives

This project was built to practice:

- Handling HTTP GET & POST requests
- Working with PHP Superglobals (`$_GET`, `$_POST`, `$_FILES`, `$_SESSION`)
- Server-side validation
- Sessions
- File uploads
- Password hashing & verification
- Writing reusable PHP functions
- Form processing
- Redirects & Flash Messages
- Bootstrap Modals
- Basic CRUD operations (Update)

---

## 🌐 Live Demo

Coming Soon...

---

## 👩‍💻 Author

**Maryam Mostafa**
