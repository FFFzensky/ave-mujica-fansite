# Ave Mujica Fan Website

A fan website about the band **Ave Mujica**, built as the final project for the **Web Programming** course
(Informatics Engineering Education, Universitas Negeri Yogyakarta).

## Features

- **Account registration and login** (passwords stored with `password_hash`, session-based access)
- **Band and member profile pages**: Sakiko, Uika, Mutsumi, Nyamu and Umiri
- **Comment section on every page**: logged-in users can post comments and delete their own
- Responsive layout with custom CSS and small JavaScript interactions (e.g. show/hide comments)

## Tech stack

PHP (mysqli, prepared statements) · MySQL · HTML · CSS · JavaScript

## Run locally (XAMPP)

1. Copy this folder to `C:\xampp\htdocs\ave-mujica-fansite`
2. Start Apache and MySQL in XAMPP
3. In phpMyAdmin, import `database/avem.sql` (it creates the `avem` database)
4. Open `http://localhost/ave-mujica-fansite/login.php`, create an account, then log in

> The music video files used on the original pages are **not included** in this repository
> (copyrighted and too large for GitHub), so the video sections will be empty.

## Disclaimer

This is a non-commercial student project made for learning purposes. Ave Mujica, its members' names,
logos and images belong to their respective owners (BanG Dream! / Bushiroad). No copyright infringement is
intended.
