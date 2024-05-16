# php-chill

<img src="https://img.shields.io/badge/-HTML5-E34F26.svg?logo=html5&style=flat&logoColor=fff"> <img src="https://img.shields.io/badge/-CSS3-1572B6.svg?logo=css3&style=flat"> <img src="https://img.shields.io/badge/-php-777BB4.svg?logo=php&style=flat&logoColor=black"> <img src="https://img.shields.io/badge/-MySQL-4479A1.svg?logo=mysql&style=flat&logoColor=orange">
<img src="https://img.shields.io/badge/-Bootstrap-7952B3.svg?logo=bootstrap&style=flat&logoColor=fff"> <img src="https://img.shields.io/badge/-JavaScript-black.svg?logo=javascript&style=flat">

## Demo

![chill](https://github.com/sahoooii/php-chill/assets/75118062/3417924e-222f-49cb-b55c-ddd6ac3355ae)

## Describe

It's my first original full-stack project, not using any libraries and frameworks. I mainly used PHP and MySQL.<br />
It's a social media app like Twitter. You can create your account and post your Tweet and picture, edit your profile, and delete your account. Also created an admin system and page. I created it in 2019, but I did refactoring this year. Design and security are better than the first project. But it's all basically the same as the first project. Because I wanted to prove how improved my skills are.

最初のオリジナルのフルスタックプロジェクト。ライブラリやフレームワークを使用しない、主に PHP、MySQL で開発をしました。 Twitter のようなソーシャルメディアアプリです。アカウントを作成してツイートや写真を投稿したり、プロフィールを編集したり、アカウントを削除したりできます。また Admin システムとページも作成しました。2019 年に作成したものですが、今年にリファクタリングをし、デザインと安全性もより良くなりました。ただし、自分のスキルがどれだけ向上しているかを証明したかったので、基本的にはすべて最初のプロジェクトと同じにしています。

## Features

- CRUD
- Create an account with profile image
- Login and Logout system
- Post your tweet and picture
- Pagination
- Setting private and public
- Edit your account
- Delete your account
- Responsive design
- Admin Page
  - Read users list
  - Delete users's account

## src

- [Google Fonts](https://fonts.google.com/)
- [Font Awesome](https://fontawesome.com/)

## Usage

- Create a MySQL database and obtain your MySQL URI &nbsp; -[MySQL](https://www.mysql.com/jp/)

### Env Variables

Rename the `example.env` file to `.env` and add the following

```
DB_HOST="localhost"
DB_USERNAME="YOUR USERNAME"
DB_PASSWD="YOUR PASSWORD"
DB_NAME="chill_bbs"

- Admin Page Info
DB_ADMIN_EMAIL="thechilladmin@email.com"
DB_ADMIN_PASSWD="thechilladmin"

```

### Database

I made two kinds of databases.

```
chill_user_table
- user_id int
- user_name varchar
- email	varchar
- password varchar
- img varchar
- tel varchar
- status int
- created_at datetime
- updated_at datetime

chill_bbs_table
- comment_id int
- user_id int
- user_name varchar
- comment varchar
- img varchar
- date datetime

```
