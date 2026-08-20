# UTAR Library Portal

## Files

| File | What it is for |
|---|---|
| `index.html` | Task 1 - Home page (logo, header text, 3 images + links) |
| `register.php` | Task 2 + Task 4(c)(d) - Registration form, saves to database |
| `js/validate.js` | Task 3 - Client side validation |
| `db.sql` | Task 4(a)(b) - CREATE DATABASE + CREATE TABLE |
| `connect.php` | Database connection used by all the PHP pages |
| `edit_profile.php` | Task 5(a) - Request Profile Edit (search by email) |
| `update_profile.php` | Task 5(a)(b)(c) - Edit Profile form + UPDATE |
| `details.html` | Task 6 - Library details page |
| `css/style.css` | Styling for every page |

## How to run

1. Open **XAMPP Control Panel** and press **Start** for **Apache** and **MySQL**.
2. Open <http://localhost/phpmyadmin>, click the **Import** tab, choose
   `db.sql`, then press **Go**. This creates the `utar_db` database and the
   `utar_table` table.
3. Open <http://localhost/vscfile/practical/index.html> in the browser.

Default connection settings in `connect.php` are the XAMPP defaults
(user `root`, no password). Change them there if your MySQL is different.

## How to test

1. Home page -> click **Register** -> submit the empty form. Red error
   messages should appear under every field.
2. Fill it in correctly and press **Register**. A green
   "Registration successful. Return back to Home Page." message appears.
3. Home page -> click **Edit Registration** -> type the email you just
   registered -> **Search Profile**. The Edit Profile form appears with the
   saved information already filled in.
4. Change something and press **Update Profile**. You are sent back to the
   Home Page and the change is saved in the database.
5. Search a email that does not exist -> a red "Profile not found" message
   is shown and you stay on the page.

## Two things to double check with your lecturer

1. **Table name.** Task 4(b) says to create a table called `utar_table`, but
   Task 4(c) says to store the data in `utar_library`. This project uses
   `utar_table` everywhere. If your lecturer wants `utar_library`, rename it
   in `db.sql`, `register.php`, `edit_profile.php` and `update_profile.php`.
2. **Search field on the Request Profile Edit page.** Task 5(a) says to
   capture the **ID** of the user, but Figure 4 shows an **Email** field.
   This project follows Figure 4 and searches by email.

## Note on Task 6

The question says the details text is given in the exam question folder.
That text file was not in this folder, so `details.html` contains example
library information. Replace the paragraphs inside `<div class="details-box">`
with the real text when you get it.

## Note on the password

The password is saved as plain text because the exam table says the
`Password` column is `Text`, and the Edit Profile page needs to show it
again. In a real website you would use `password_hash()` instead.
