# Exercise 5: Readme.md

***Welcome to the task README!***

- You are required to create ´Readme.md´ in your project directory to document your activities throughout the project's lifecycle. 
- You will regularly update it to monitor the ongoing development of the project. 

- You will start by outlining the planned features, task assignments to team members and document the evolving progress of your work. 

- Below, you will find an example to help you get started. Feel free to customize it to match your specific requirements and needs.

# LANKAN MATKA TRAVEL BOOKING WEB PROJECT - Team 23

We have developed a travel destination management agency website. This site was developed especially to promote Sri Lanka as a travel destination among the Finnish travel enthusiasts.

## Table of Contents
- [Features](#features)
- [Database Tables](#database-tables)
- [Created Forms](#created-forms)
- [Created Tables](#created-tables)

---
## Public URL
 http://shell.hamk.fi/~bbcap23_23/PHPWebev/index.php
 http://shell.hamk.fi/~bbcap23_23/PHPWebev/Admin/index.php

## Features

In this section, list and describe the features or functionality that you are working on. You can use checkboxes to track the progress of each feature.

- [ ] Manage Tour Package (Molagoda Dissanayakage Kasun Chathuranga Dissanayaka): Tour Packge Maintenance. 
- [ ] Feature 2 (Dulshan Pramuditha Welengoda): Customer Login Page Creation | User permissions assignment.
- [ ] Feature 3 (Govinnage Asitha Sandaruwan): Manage User Registration | Manage Staff Registration.
- [ ] Feature 4 (Nawarathna Mudiyanselage Mujitha Manorathna): Admin Panel | Package Booking Management
- [ ] Feature 5 (Nawarathna Mudiyanselage Mujitha Manorathna): Manage Staff user

> Add features as required. 

### Feature 1

As a Admin an User of the website I should be able to create/ Update/ Delete  Tour Pakages so that every visitor can see the latest tour packages in the website.

 (Include more detailed information about Feature 1 here. Provide links to related code files (github) & link to the feature (shell.hamk.fi) ).
 
 http://shell.hamk.fi/~kasun23000/PHPFinalProject/PHPWebev/travelPkgs.php

 https://github.com/kcdissanayaka/PHPWebev/blob/main/travelPkgs.php
 https://github.com/kcdissanayaka/PHPWebev/blob/main/processTurpkg.php


### Feature 2

The login page will be created in order to authenticate customers into the web portal after successful validation.
GitHub Link  : https://github.com/kcdissanayaka/PHPWebev/blob/main/header.php

The role-read page will create user roles and manage the user roles with delete function.
GitHub Links : https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/role-read.php
               https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/create-role.php   

### Feature 3

My role in Team 23 is managing user registration and staff registration. In this feature I will develop user registration and staff registration on this application, so they can book travel packages by registering to the site and can access other features as well offered by Lankan Matka travel agency. I make sure the registration process will be smooth and easy for users.

GitHub Link : https://github.com/kcdissanayaka/PHPWebev/blob/main/header.php 
              https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/staff_reg_process.php

GitHub Link : https://github.com/kcdissanayaka/PHPWebev/blob/main/header.php
              https://github.com/kcdissanayaka/PHPWebev/blob/main/cus_add_process.php

### Feature 4

Package booking: User package booking management, save the booking details in database, add the card to select multiple packages and finally do the payment and store all the data into the db.   
GitHub Link : https://github.com/kcdissanayaka/PHPWebev/blob/main/readTrvPkgs.php

Admin panel: this admin dashboard for the all the backend tasks like employee profile creation, managing, other website managing task like adding new content package, services. 

GitHub Link : https://github.com/kcdissanayaka/PHPWebev/tree/main/Admin
login details: 
admin/93Srilanka@

### Feature 5

Manage system user: including user profile update, delete user and see all the system users. 
https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/read.php
https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/edituser.php
https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/deleteuser.php

---

## Database Tables

List the database tables that are part of your project. 

- Table 1 (Created By : KASUN CHATHURANGA DISSANAYAKA): TOUR_PLAN_CARDS
- Table 2 (Created By): MUJITHA MANORATHNA: STAFFROLE 
- Table 3 (Created By): MUJITHA MANORATHNA: CUSTOMER_BOOKING
- Table 4 (Created By): ASITHA SANDARUWAN : staffreg
- Table 5 (Created By): ASITHA SANDARUWAN : customer_reg
- Table 6 (Created By): DULSHAN WELENGODA: SERVICES_INFO 


> Include the ER Diagram of the database. 
![ERD-DIAGRAM LANKAN MATKA](assets/images/PROJECT_ERD/LankanMatkaERD.png)

---

## Created Forms

List and describe any forms that have been created as part of your project. Include details about the purpose of each form and any validation logic.

- Form 1 (Created By KASUN CHATHURANGA DISSANAYAKA): travelPkgs.php: Link to the related code file (github) https://github.com/kcdissanayaka/PHPWebev/blob/main/travelPkgs.php | Link to the form (shell.hamk.fi). http://shell.hamk.fi/~kasun23000/PHPFinalProject/PHPWebev/travelPkgs.php| Validations Applied
Validation 1 . Filed Mandetory Validation - HTML valiation
Validation 2 . Validate Invalid Charater "'" exist when saving the record.

- Form 2: (Created By): Form Name: Link to the related code file (github) | Link to the form (shell.hamk.fi).  | Validations Applied

- Form 3: (Created By): DULSHAN WELENGODA  

(github) 
https://github.com/kcdissanayaka/PHPWebev/blob/main/header.php 
https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/role-read.php
https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/create-role.php
            
(shell.hamk.fi)
http://shell.hamk.fi/~dulshan23000/PHPWebev/header.php
http://shell.hamk.fi/~dulshan23000/PHPWebev/Admin/role-read.php
http://shell.hamk.fi/~dulshan23000/PHPWebev/Admin/create-role.php   
Validations 1. Whether an existing user
            2. Whether an existing role

- Form 4: (Created By): DULSHAN WELENGODA Form Name: role-read.php Link to the related code file (github)  | Link to the form (shell.hamk.fi). | Validations Applied

- Form 5: (Created By): (Created By ASITHA SANDARUWAN ): staff_reg_process.php: Link to the related code file

(github)
https://github.com/kcdissanayaka/PHPWebev/blob/main/header.php 
https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/staff_reg_process.php

(shell.hamk.fi)
http://shell.hamk.fi/~asitha22000/PHPWebev/header.php
http://shell.hamk.fi/~asitha22000/PHPWebev/staff_reg_process.php

Validations Applied (Password Special Characters, User already exsits, Email already exists, Firstname should be 5 letters, etc...)

- Form 6: (Created By): (Created By ASITHA SANDARUWAN ): cus_add_process.php: Link to the related code file 

(github)
https://github.com/kcdissanayaka/PHPWebev/blob/main/header.php
https://github.com/kcdissanayaka/PHPWebev/blob/main/cus_add_process.php

(shell.hamk.fi)
http://shell.hamk.fi/~asitha22000/PHPWebev/header.php
http://shell.hamk.fi/~asitha22000/PHPWebev/cus_add_process.php

Validations Applied (Password Special Characters, User already exsits, Email already exists, Firstname should be 5 letters, etc...)

- Form 7: (Created By): (Created By MUJITHA MANORATHNA ): edituser.php : Link to the related code file (github) https://github.com/kcdissanayaka/PHPWebev/blob/main/Admin/edituser.php | Link to the form (http://shell.hamk.fi/~mujitha22000/NMM_Manorathna/PHPWebev/Admin/edituser.php?emp_id=1). | PHP & JS Validations Applied.



---

## Created Tables

List any tables that you have created in the project work

- Table 1 (Created By KASUN CHATHURANGA DISSANAYAKA): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
- Table 2 (Created By ASITHA SANDARUWAN): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
- Table 3 (Created By ASITHA SANDARUWAN): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).

---



> Feel free to customize this README template to suit your project's specific needs. Providing clear and organized documentation will help your team members understand the project's progress and tasks effectively. This document will have a significant impact on the grading. 
