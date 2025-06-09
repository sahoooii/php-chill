# php-chill

## 🛠 Tech Stack

![PHP](https://img.shields.io/badge/PHP@8.0.9-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL@8.0.23-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP@8.0.28--0-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)
<br />
![HTML5](https://img.shields.io/badge/html5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

<p>etc...</p>

## Demo

![Chill](https://github.com/user-attachments/assets/71f7821f-78fa-48a6-a788-2bb8ed9c779c)

<br />

## What is this project?

**(EN)**

This application is my very first original full-stack project that I built from scratch when I started programming. Without using any libraries or frameworks, I developed a Twitter-style social media bulletin board site mainly with PHP and MySQL.

Users can create an account, post text and images, edit or delete their profile, and switch their account visibility between public and private. An admin dashboard is also included for managing users.

Originally created in 2019 through self-study, I performed a major refactoring in 2024 to improve security, data handling, and code readability using knowledge and techniques I didn’t have when I first built it.

Then, in 2025, I redesigned the routing and file structure from the ground up, further enhancing security and maintainability.

This project represents my starting point and how far I’ve come. While preserving the original codebase as much as possible, I’ve refined and improved it with my current skills.

Packed with features—feel free to dive into the code and explore!<br />
<br />

**(JP)**

このアプリは、私がプログラミング人生で初めてゼロから開発したオリジナルのフルスタックプロジェクトです。ライブラリやフレームワークは使用せず、主に PHP と MySQL を使って構築した、Twitter 風のソーシャルメディア掲示板サイトです。

ユーザーはアカウントを作成し、テキストや画像を投稿したり、プロフィールを編集・削除したりできます。また、アカウントの公開・非公開の切り替えも可能で、管理者（admin）用のユーザー管理ページも実装しています。

本プロジェクトは 2019 年に独学で開発しましたが、2024 年に一度目の大規模リファクタリングを行い、セキュリティやコードの可読性、データベース設計などを改善しました。

そして 2025 年には、さらに大規模な再設計を実施。特にルーティングとファイル構成を再構築し、セキュリティとユーザビリティを強化しました。

このプロジェクトは、まさに私の原点であり、スキルの進化を記録する象徴でもあります。初期のコード構成はできる限り維持しながら、成長した自分の技術で改善を重ねました。

たくさんの機能を詰め込んでいますので、ぜひコードをご覧ください！
<br />
<br />

## Features

**(EN)**

Here are some of the main features Chill offers:

✅ **User Registration & Authentication**

- **Email-based** user authentication
- Passwords are **securely hashed** before storing in the database
- **Upload profile photos** during registration
- Option to set the account as **public or private**

✅ **Tweet-Like Posting System**

- Post **text and images**
- Each post shows timestamp, username, and profile picture
- Users can **delete their own posts**
- **Pagination** is implemented for better performance

✅ **Profile Management**

- Edit user information and profile picture
- Account deletion is available for the logged-in user

✅ **Admin Dashboard**

- **Dedicated login page** for admin access
- View and manage all registered users
- Admin can delete account
- Pagination is applied for efficient browsing

✅ **Security Measures**

- Passwords are **securely hashed** for safe authentication
- Input validation and file upload restrictions
- Environment variables managed using `.env`
- Sensitive data removed from Git history using BFG

✅ **Responsive Design**

- Fully responsive layout for mobile, tablet, and desktop

  <br />

**(JP)**

Chill で現在実装されている主な機能は以下の通りです：

✅ **ユーザー登録・ログイン機能**

- email を使ったユーザー認証
- パスワードを**ハッシュ化**し、安全に DB へ保存
- **プロフィール写真のアップロード**対応
- アカウントの**公開 / 非公開**設定が可能

✅ **ツイート機能**

- **テキスト・画像の投稿**が可能
- 投稿には作成日時・ユーザー名・アイコンを表示
- 投稿の**削除が可能**（自分の投稿のみ）
- **ページネーション機能**で表示を最適化

✅ **プロフィール編集**

- ユーザー情報、プロフィール画像の変更
- アカウント削除機能（ユーザー自身による）

✅ **管理者（Admin）機能**

- **Admin 専用**ログインページ
- 全ユーザーの一覧表示・管理
- ページネーション機能でユーザーを効率的に表示
- アカウント削除

✅ **セキュリティ対応**

- **パスワードのハッシュ化**による安全な認証設計
- **バリデーション・ファイルアップロード制限**
- .env による機密情報管理
- BFG による Git 履歴からの機密情報削除

✅ **レスポンシブデザイン**

- 全ページがモバイル・タブレット・PC に対応
  <br />
  <br />

## What's Improved? 🧐 (2024 & 2025)

Originally developed in 2019, this project underwent major refactoring in 2024 and received further improvements in 2025 for better structure, security, and maintainability.

Here's a summary of the updates made in May 2024.

**(EN)**

🔐 **Security Enhancements**

- Replaced insecure plain-text password storage with **secure authentication using `password_hash()` and `password_verify()`**
- Changed login method from **username-based to email-based authentication** for improved safety
- Introduced a **`.env` file** to securely manage sensitive environment variables like DB credentials

🧼 **Git & Version Control Setup**

- The original project was not under version control; **GitHub integration was added in 2024**
- Implemented **`.gitignore`** to exclude `.env` and protect confidential data

🎨 **UI & Code Readability**

- Refactored **global CSS and PHP files** to improve overall code structure and visual consistency
- Restructured error handling to ensure **proper validation messages are displayed** on each page

🧑‍💻 **User Account Features**

- Added the ability for users to **delete their own accounts**

<br />

**(JP)**

このプロジェクトの初回開発は 2019 年ですが、2024 年と 2025 年に大規模なリファクタリングを実施し、2025 年にはさらに構造、セキュリティ、保守性が向上しました。

ここでは、2024 年 5 月の改善点をまとめています。
<br >

🔐 **セキュリティ強化**

- パスワードをプレーンテキストで保存していた仕組みを見直し、**`password_hash()` と `password_verify()` を使用したハッシュ化認証**に変更
- 認証方法を **ユーザーネームから email に変更**し、安全性を向上
- **`.env` ファイルを作成**し、DB 接続情報などの機密情報を安全に管理できるように改善

🧼 **Git・バージョン管理の整備**

- 当初 Git を使用していなかったが、2024 年に GitHub 管理を開始
- セキュリティを考慮し、 `.env` を `.gitignore` に追加してバージョン管理から除外

🎨 **UI & コードの可読性向上**

- **全体的な CSS と PHP ファイルのリファクタリング**を実施し、コードの読みやすさとデザインの統一感を改善
- エラーメッセージ表示ロジックを整理し、**各ページで正確にメッセージが表示されるように修正**

🧑‍💻 **ユーザー機能の拡張**

- **ユーザー自身によるアカウント削除機能**を実装

<br />

## Further enhancements 💪 (2025/05)

Here's a summary of the updates made in May 2025.

**(EN)**

🛠 **Routing & Project Structure Overhaul**

- Legacy Laravel-style structure caused routing errors; refactored to use a **URL-based routing system**
- Introduced a **`public/` folder** to centralize static assets and the main entry point (`index.php`)
- Consolidated all route handling into `index.php`, clearly separating views like home, login, register, and admin panel
- Replaced all **relative internal links with absolute URLs** to improve clarity and maintainability

📁 **File Upload Handling**

- Restructured file uploads to be stored under `public/uploads/`
- Moved file saving logic into a **reusable helper function**
- Added **validation and error handling** for secure file management

🧩 **UI Componentization**

- Extracted repetitive `nav` code into a shared component: `components/navbar.php`
- Enabled dynamic behavior using **injected variables for each page**, such as user info and destination links

🔐 **Admin Authentication Simplification**

- Previously relied on both `DB_ADMIN_EMAIL` and `DB_ADMIN_PASSWORD` in `.env`; now simplified to **email-only authentication**
- **Password field and related logic were removed** from both codebase and environment configuration

🧼 **Sensitive Data Cleanup & Security Improvements**

- Removed old `.env` credentials accidentally committed to Git history using **BFG**
- Cleared all traces of sensitive data from both **local and remote GitHub histories**
- Introduced a **sanitized `example.env`** with required environment variables (admin login now obsolete)
  <br />
  <br />

**(JP)**

🛠 **ルーティング＆構成の再設計**

- Laravel 風の構成が残っておりページが正常に表示されなかったため、**URL ベースのルーティング**に全面変更
- **`public/` フォルダを新設**し、静的ファイルとエントリポイント（`index.php`）を集約
- すべてのルート分岐処理を `index.php` に統一し、トップページ・ログイン・登録・管理画面などの表示制御を整理
- **内部リンクを相対パスから URL ベースに統一**し、移植性と保守性を向上

📁 **ファイルアップロード機能の整備**

- アップロードファイルは `public/uploads/` に保存するよう設計を変更
- ファイル保存処理を **再利用可能なヘルパー関数に分離**
- **バリデーションとエラーハンドリング**も実装し、堅牢性を強化

🧩 **共通 UI のコンポーネント化**

- 各ページで重複していた `nav` 要素を `components/navbar.php` にまとめて共通化
- ページごとの違い（リンク先、ユーザー情報など）は **変数渡しで柔軟に制御**

🔐 **admin ユーザー認証の簡略化とセキュリティ向上**

- `.env` に設定されていた `DB_ADMIN_EMAIL`, `DB_ADMIN_PASSWORD` を使用していたが、**email のみの認証**に変更
- パスワードの設定・保存が不要になり、**コードと環境変数から完全に削除**

🧼 **機密情報の削除 & セキュリティ対策**

- Git 履歴に残っていた `.env` 情報付きの README を、**BFG で履歴ごと完全削除**
- GitHub 含めたすべての履歴から **認証情報を安全に削除**
- **`example.env` を準備**し、必要な環境変数はそこに記載（admin ログイン情報は不要になったため削除済み）

<br />

## 🔧 Future Improvements

**(EN)**

- Implementation of image upload via **Cloudinary integration** (migrating from local storage to cloud).
- Currently, files are stored under `/public/uploads/`. In the future, we plan to utilize cloud storage services like Cloudinary to enhance scalability and security.
- Automating environment setup with **Docker**.
- I am considering Docker-based setup to ensure consistency and reproducibility across development environments.

**(JP)**

- Cloudinary との連携による画像アップロード機能の実装
- 現在は `/public/uploads/` 以下にファイルを保存していますが、将来的には Cloudinary などの外部ストレージサービスを活用し、スケーラビリティとセキュリティを向上させる予定です。
- **Docker 対応による環境構築の自動化**
- 開発環境の統一と再現性向上のため、Docker 環境での構築を視野に入れています。

<br />

## 📁 Project Structure

| Path                              | Description                                                                                   |
| --------------------------------- | --------------------------------------------------------------------------------------------- |
| `chill-control/top_control.php`   | Logic for user registration (acts as Controller)                                              |
| `chill-control/top.php`           | Loads view and styles for the registration page (used when submitting user registration data) |
| `chill-control/login_control.php` | Login form logic (handles authentication)                                                     |
| `chill-control/login.php`         | Loads view and styles for the login page (used when submitting login data)                    |
| `chill-control/`                  | Contains other controller files related to user actions                                       |
| `conf/conf.php`                   | Stores commonly used constants and configuration values                                       |
| `lib/file_upload_helper.php`      | Helper function for file uploads                                                              |
| `lib/mysqli.php`                  | Handles database connection via MySQLi                                                        |
| `model/model.top.php`             | SQL queries related to user registration and login                                            |
| `model/model.user.php`            | SQL queries for actions performed by the user (e.g., posting, updating info)                  |
| `public/`                         | Static assets and public-facing files                                                         |
| `public/css`                      | CSS files for styling pages                                                                   |
| `public/img`                      | Image files used throughout the app                                                           |
| `public/uploads/bbs_fileUpload`   | Stores uploaded files from BBS posts                                                          |
| `public/uploads/file_upload`      | Stores uploaded files from user registration and profile edits                                |
| `index.php`                       | Entry point that handles routing and page dispatching                                         |
| `view/top.php`                    | View file for the user registration page                                                      |
| `view/login.php`                  | View file for the login page                                                                  |
| `view/bbs.php`                    | View file for the BBS (bulletin board system) main page                                       |
| `view/layout.php`                 | Base layout template for rendering pages                                                      |
| `view/components/bbsNavbar.php`   | Navbar component used in BBS-related pages                                                    |
| `view/components/navbar.php`      | Global navbar component used across the application                                           |
| `example.env`                     | Template file for required environment variables                                              |

#### 💡 Note: Difference Between \_control.php and .php Files

このプロジェクトでは、会員登録やログインなど、**1 つの機能に対して 2 つのファイルが存在します**。

| File Names                        | Explanation                                                                                                                                                                                                                              |
| --------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `top_control.php` / `top.php`     | Although the names are similar, `top_control.php` contains the **logic for handling user registration (Controller)**, while `top.php` is the **View entry point** (loads CSS, etc.). Both are used together in the registration process. |
| `login_control.php` / `login.php` | `login_control.php` handles the **login processing logic**, and `login.php` is the **View file for displaying the login page**. Both are part of the login feature but serve different purposes.                                         |

<br />

## Usage 🚀

**(EN)**

#### 💡This application is designed to run on a custom local domain

`http://chill.local` instead of `http://localhost`.
To access it in your browser, please add the following entry to your `hosts` file:

```lua
127.0.0.1 chill.local
```

In addition, make sure to configure your Apache settings (`httpd-vhosts.conf`) in XAMPP to point the correct `DocumentRoot` to your project directory.

Note: For **XAMPP** users, edit `httpd-vhosts.conf`.
For **MAMP** users, edit `/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf` and ensure virtual host support is enabled in `httpd.conf`.

This setup follows a **root-based URL structure** that is commonly used in Laravel and modern PHP applications.

<br />

**(JP)**

#### 💡 このアプリは `http://localhost` ではなく `http://chill.local` というカスタムドメインで動作するように設計されています。

アクセスするには、`hosts` ファイルに以下の設定を追加してください：

```lua
127.0.0.1 chill.local
```

また、XAMPP の Apache 設定（`httpd-vhosts.conf`）で `DocumentRoot` を適切に設定し、`http://chill.local/` にアクセスできるようにする必要があります。

※ **XAMPP**ユーザーは `httpd-vhosts.conf` に、**MAMP**ユーザーは `/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf` にバーチャルホストの設定を追加してください。

この構成は Laravel やモダンな PHP プロジェクトでも一般的な、**ルートベース URL 設計**に対応したものです。

<br />

### Prerequisites

To run this project locally, ensure you have the following installed:

- **PHP** (v8.x recommended)
- **MySQL** (or compatible DB)
- **Composer**
- **XAMPP** or **MAMP**

💡 **XAMPP** または **MAMP** を使用して、ローカル環境に Apache と MySQL を立ち上げることを前提としています。

<br />

### 1. 📌 Required Accounts & Setup

[MySQL](https://www.mysql.com/jp/) : Set up a database via phpMyAdmin or MySQL CLI.

- Database Name: your_db_name
- Username / Password: Use your local MySQL credentials

**Local Domain (Optional):**

For a better development experience, we use a custom local domain like
`http://chill.local/`
<br />

### 🚀 Local Development Environment Setup (XAMPP or MAMP)

This project assumes you are using a **local domain** such as `http://chill.local/` for development.

You can use either **XAMPP** or **MAMP**, regardless of your OS.

💡 While MAMP is often recommended for macOS users, many developers (including myself) use **XAMPP on macOS** due to familiarity or preference.

Recently, **MAMP Pro** has added some limitations to the free version, making **XAMPP a more flexible option** for some developers.
<br />

---

### 🔧 Set Up Your Virtual Host

Please follow the steps below to set up a virtual host (`http://chill.local`) on your local environment.

---

🪟 **[XAMPP](https://www.apachefriends.org/index.html) (macOS / Windows)**

- Edit the virtual host file:

`C:\xampp\apache\conf\extra\httpd-vhosts.conf`
`Applications/XAMPP/xamppfiles/etc/extra/httpd-vhosts.conf`

```apache
<VirtualHost *:80>
    ServerName chill.local
    DocumentRoot "/Applications/XAMPP/htdocs/chill-control"
    <Directory "/Applications/XAMPP/htdocs/chill-control">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

📌 **After saving, don’t forget to:**

1. Add `127.0.0.1 chill.local` to your `/etc/hosts` file (Mac) or `C:\Windows\System32\drivers\etc\hosts` (Windows).

2. Restart Apache.
   <br />

🍏 **[MAMP](https://www.mamp.info/en/mac/) (macOS)**:

If you're using **MAMP**, your project directory is typically located at:
`/Applications/MAMP/htdocs`

```apache
<VirtualHost *:80>
    ServerName chill.local
    DocumentRoot "/Applications/MAMP/htdocs/chill-control"
    <Directory "/Applications/MAMP/htdocs/chill-control">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

📌 Don't forget:

1. Add `127.0.0.1 chill.local` to your /etc/hosts file.
2. Restart Apache via MAMP.
   <br />

### 2. 🔧 Environment Variables

Rename the `example.env` file in the root directory to `.env, and update with your

```
DB_HOST="localhost"
DB_USERNAME="SET YOUR USERNAME"
DB_PASSWD="SET YOUR PASSWORD"
DB_NAME="SET_YOUR_DB_NAME"
DB_ADMIN_EMAIL="SET YOUR ADMIN USER EMAIL"
```

### 3. 🗄️ Database Setup

This app uses a MySQL database.
Please **create the following two tables manually** before running the application.

#### 📌 Tables

`chill_user_table`
| Column | Type | Description |
| ---------- | -------- | ----------------- |
| user_id | int | Primary key |
| user_name | varchar | User name |
| email | varchar | Email address |
| password | varchar | Hashed password |
| img | varchar | Avatar image |
| tel | varchar | Phone number |
| status | int | Active/inactive |
| created_at | datetime | Registration time |
| updated_at | datetime | Last update time |

`chill_bbs_table`
| Column | Type | Description |
| ----------- | -------- | ----------------------------------- |
| comment_id | int | Primary key |
| user_id | int | Foreign key from `chill_user_table` |
| user_name | varchar | Name of commenter |
| comment | varchar | Comment content |
| img | varchar | Attached image |
| date | datetime | Posted time |

<br />

#### 🛠️ Initialize the Database

This project does not use a framework like Laravel, so there are **no built-in migration tools**.

To initialize the database structure, please follow the steps below.

📄 **1. Prepare the init.sql File**

The file `init.sql` contains all the necessary SQL commands to create the required tables for this app:

```sql
-- Create Database
CREATE DATABASE IF NOT EXISTS chill_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE chill_db;

-- Create chill_user_table
CREATE TABLE IF NOT EXISTS chill_user_table (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  img VARCHAR(255),
  tel VARCHAR(20),
  status INT DEFAULT 1,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create chill_bbs_table
CREATE TABLE IF NOT EXISTS chill_bbs_table (
  comment_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  user_name VARCHAR(255) NOT NULL,
  comment VARCHAR(1000) NOT NULL,
  img VARCHAR(255),
  date DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES chill_user_table(user_id) ON DELETE CASCADE
);

```

🗂️ Place the init.sql file in **either** of the following locations:

- The root directory of this project (`/chill/init.sql`)
- Or inside a dedicated folder like `/chill-control/database/init.sql`

✅ You can also copy and paste the above SQL into your own `.sql ` file if needed.

<br />

⚙️ **2. Create and Populate the Database**

1. Open your terminal.
2. Make sure your MySQL server is running.
3. Run the following command (from the directory where `init.sql` exists):

```bash
mysql -u [YOUR_USERNAME] -p chill_db < init.sql
```

- Replace [`YOUR_USERNAME`] with your actual MySQL username.
- If you haven't created the database yet, do it first:

```bash
CREATE DATABASE chill_db;
```

This will:

- Create the two necessary tables: `chill_user_table` and `chill_bbs_table`
- Set up the structure required to run the application

You'll be prompted to enter your MySQL password.

💡 You won’t see any success message in the terminal, but if there’s no error, it worked!

### 4. 🧩 Key Dependencies

- [Google Fonts](https://fonts.google.com/)
- [Font Awesome](https://fontawesome.com/)
- [Bootstrap](https://getbootstrap.com/)

<br />

### 5. ▶️ Run the Application

#### 1. 💻 Clone the Repository

```bash
git clone https://github.com/sahoooii/php-chill.git

cd php-chill
```

📁 Place the folder inside your **XAMPP** or **MAMP** web directory:

- **XAMPP**: `/Applications/XAMPP/htdocs/`
- **MAMP**: `/Applications/MAMP/htdocs/`

#### 2. 🧾 Configure Your Virtual Host

Make sure you followed the steps in **🔧 Set Up Your Virtual** Host.

#### 3. 🔐 Check `.htaccess` (URL Routing)

To support URL-based routing (like `http://chill.local/login`, not `login.php`), ensure your `.htaccess` is working and `mod_rewrite` is enabled.

Example `.htaccess` (already included in the project):

```apache
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteBase /
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>
```

🔍 **Troubleshooting .htaccess**

- Enable `mod_rewrite` in Apache config (`httpd.conf`)
- Check that `AllowOverride` All is set in your virtual host config
- Restart Apache after changes

#### 6. 🚀 Launch the App

Start Apache & MySQL via XAMPP or MAMP, then open:

```arduino
http://chill.local/
```

If all is configured correctly, you’ll see the top page of the app!
<br />

### 5. 🚢 Build & Deploy

This project is built using **vanilla PHP**, so no compilation or bundling is required.

🛠 **To deploy it to a live server**:

1. **Upload all project files** (including .htaccess) to your web server via FTP/SFTP.
2. **Set up your domain** to point to the project’s root directory.
3. **Ensure** `.env` or **config files** contain the correct production database credentials.
4. **Verify permissions** for writable directories, if any (e.g., uploads).
5. Confirm that `.htaccess` is supported and `mod_rewrite` is enabled.

📌 You do **not need** to run npm, composer, or build commands.

🧠 Tip: If using a shared host (like ConoHa, Sakura, etc.), ask support if .htaccess and mod_rewrite are enabled by default.

<br />

### 📘 Development Notes

**(EN)**

The initial development of this project dates back to **2019**, when I had just started learning programming. It was my **very first full-stack application**, built entirely with raw PHP and minimal experience.

In **2024 and 2025**, I gave the project a major overhaul—adding features, improving security, and updating the CSS. However, I intentionally **kept the original design base** to preserve the feel and memories of that time.

Refactoring a project written entirely in plain PHP after so many years was no easy task.<br />
But revisiting the old code and working through it with my current skills made the experience truly meaningful.<br />
This project is where it all began for me—**a reflection of both my roots and my growth as a developer**.

Thank you for reading, and I hope you enjoy exploring the code.
<br />

**(JP)**

このプロジェクトの初期開発は **2019 年** に行いました。

当時はプログラミングを学び始めたばかりで、このアプリは **初めて自力で作ったフルスタックプロジェクト** です。

その後、**2024 年〜2025 年** にかけて、機能追加やセキュリティ強化、CSS の修正などを大きくリファクタリングしましたが、あえて 当時のデザインのベースなどは残しています。初心を忘れずにいたいと思ったからです。

久しぶりに「生の PHP」だけで書いたコードに向き合うのは大変でしたが、当時の自分の記憶と、今の自分の実力を照らし合わせながら取り組むのは、感慨深く、学びの多い時間でした。

このプロジェクトは、私の原点であり、今の成長を感じさせてくれる存在です。
ぜひ、コードを見てみてください。

最後まで読んでいただきありがとうございました。
