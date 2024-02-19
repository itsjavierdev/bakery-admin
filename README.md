<p>   
    <img src="https://github.com/itsjavierdev/bakery-admin/assets/156542069/07c18365-f44e-48f7-8c9a-8ed801165ed2" alt="logo" align="left" width="80" height="auto" ></img>
</p>



# Admin Dashboard Bakery San Xavier

This project, an Online Bakery Shop, provides a robust platform for bakeries to streamline their operations and enable customers to conveniently place orders online. It features a user-friendly interface for product browsing, a secure shopping cart system, and a seamless checkout process. The application is designed to enhance the efficiency of bakery businesses by digitizing the ordering process and providing a smooth online experience for customers. Developers can explore the codebase to understand the implementation details and contribute to the project's growth.

## 💻 Technologies:

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)  ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)  ![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) 

---

>[!IMPORTANT]
>This project complements with the bakery shop: https://github.com/itsjavierdev/bakery-client

---

## 👩🏻‍💻 Installation:

First you have to install: <a href="https://laragon.org/download/index.html"><img src="https://cdn.worldvectorlogo.com/logos/laragon.svg" width="20"/> Laragon </a> 
Then clone this repository in: 
> c:\laragon\www

with
```
git clone git@github.com:itsjavierdev/bakery-admin.git
```
### Run all this command lines in the laragon terminal
Install composer and node module

```
composer install
npm i
```

Create .env and generate encryption key
```
cp .env.example .env
php artisan key:generate
```

Clean cache in framework
```
composer dump-autoload 
```

Create symbolic link from public folder to storage folder
```
php artisan storage:link
```

Run the migrations, to set the database and seeders
```
php artisan migrate --database=admin_connection --seed
```

## 🏃🏻‍♂️ Run the aplication:

####  Run these two command line in laragon different terminal
For run the styles
```
npm run dev
```

For run the server
```
php artisan serve
```

## 🔑 First Authenticate:

####  Email
`admin@gmail.com`

####  Password
`password`


## 📁 File Structure

#### Controllers
I use livewire so, the controllers just was used for static routes controller with and without params
```
└─  app
   └─  Http
      └─ Controllers
         ├─ Controller.php
         └─ RegisteredUserController.php   //controller for create user
```

#### Models
This side of the bakery system connect with two database, so the customer folder have the user model (customer)
and the files in model without folder have all the other models including the user model (admin and employees)
```
└─  app
    ├─ Models
       ├─ Customer
       │  └─ User.php
       ├─ Order.php
       ├─ User.php
       └─ ...
```

#### Livewire components
Components where separate in folders for each view with them show (table) and form (modal)

And dashboard have component for each chart it have

Form folder have all the crud form (for separate Create and Edit rule logic, and have a cleanest code)
```
└─ app
   └─ Livewire
      ├─ Categories
      │  ├─ FormCategories.php
      │  └─ ShowCategories.php
      ├─ Dashboard
      │  ├─ Products
      │  │  ├─ ProductsLessPopular.php
      │  │  └─ ...
      │  ├─ Sales
      │  │  ├─ SalesLastWeek.php
      │  │  └─ ...
      │  ├─ ShowCharts.php
      │  └─ ShowDashboard.php
      ├─ Forms
      │  ├─ Categories
      │  │  ├─ CreateFormCategories.php
      │  │  └─ EditFormCategories.php
      │  ├─ Products
      │  │  └─ ...
      │  └─ Roles
      │     └─ ...
      ├─ Orders
      │  └─ ...
      ├─ Products
      │  └─ ...
      ├─ Roles
      │  └─ ..
      ├─ Sales
      │  └─ ...
      └─ Users
         └─ ...   
```

#### Views

```
└─ resources
   └─ views
      ├─ api
      ├─ auth            //auth have all views for login, register and similar auth components
      ├─ components      //all components blade (jestream and custom)
      ├─ dashboard.blade.php
      ├─ layouts         //layout for all app
      ├─ livewire        //dinamic livewire components /used by static views)
      ├─ navigation-menu.blade.php
      ├─ policy.blade.php
      ├─ profile        //All profile user views functions
      └─ statics         //all static views
```

#### Components

In folders are the own custom components
And the others are the jetstream components, used in auth views

```
├─ components
  ├─ button
  │  ├─ blue.blade.php
  │  └─ ...
  ├─ admin
  │  └─ ...
  ├─ input
  │  └─ ...
  ├─ input-error.blade.php
  ├─ switchable-team.blade.php
  └─ ...
```

#### Statics and dinamics views

Livewire folder have a folder for each crud with them show (table) and form (modal)

And Static folder have a single file for each crud

dashboard folder have a component for each chart

```
├─ static
|  ├─ sales.blade.php
|  └─ ...
├─ livewire
│  ├─ categories
│  │  ├─ form-categories.blade.php
│  │  └─ ...
│  ├─ dashboard
│  │  ├─ products
│  │  │  ├─ products-less-popular.blade.php
|  │  │  └─ ...
│  │  ├─ sales
|  │  │  └─ ...
│  │  ├─ show-charts.blade.php
│  │  └─ show-dashboard.blade.php
│  ├─ orders
│  │  └─ ...
│  ├─ products
│  │  └─ ...
│  ├─ roles
│  │  └─ ...
│  ├─ sales
│  │  └─ ...
│  └─ users
│     └─ ...
```
## 💻 Demo ScreenShoots
### Login View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/0beba894-027a-43de-b08f-f2b66e4b8faa)

---
### Dashboard View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/8ac98834-7cec-46d4-8c2f-eb37644f0f4a)

---
### Categories CRUD View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/31e9f782-986d-4236-943b-d058d1f8beb4)

---
### Categories Create-Edit Modal
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/07bd37f3-2682-4f0c-be38-4943fe0412f8)

---
### Product CRUD View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/a24c438d-3176-4098-94d7-fdfe5a4f638d)

---
### Product Create-Edit Modal
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/d8d5cb89-be0c-4ed5-854e-f4f0d554e697)

---
### Ordes View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/730b4d58-b0ba-40fe-a9ac-040d5ff5ddd2)

---
### Order Detail
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/b5d47beb-3982-445e-9d73-adddb18010f4)

---
### Sales View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/783e4efb-db80-4364-9910-47d3e660a585)

---
### Sale Detail View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/83a7ade5-b234-4f44-b2fe-6595315543ad)

---
### User or Employees CRUD view
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/ea7f881d-d3ce-4986-8d35-db872114ac27)

---
### Create User or Employees View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/f677a56b-6083-40f9-b785-a38b14adcab0)

---
### Update User or Employees Modal
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/63018673-db2e-4504-b01d-c9057ef5fe9a)

---
### Rol CRUD View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/bc8ea154-5f86-4dbc-97ae-399f3000ab1f)

---
### Rol Create or Update View (with permissions)
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/a51a46d7-928f-413b-b4b1-e1d6ae3465fe)

---
### User profile View
![image](https://github.com/itsjavierdev/bakery-admin/assets/156542069/ef4b856f-c459-4f7b-8b7a-0dcd9258a21a)


