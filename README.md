
## About Distributor Project
App agent and distributor management 

# project-distributor

# Requirement
1. php : 7.3>
2. mysql


# How to Setup
  1. CLone using https
  2. run composer install and npm install
  3. run npm run dev/prod/watch anything you want (i prefer using watch)
  4. run php artisan serve

# How to Import Data Wilayah
  1. open db_daerah.sql
  2. change this
    CREATE DATABASE IF NOT EXISTS {your_database_name};
    USE {your_database_name}; 

# How To migrate data
  1. if you have data on your db
    run this -> php artisan migrate:fresh --seed 
    carefull it will delete your old data

  2. no old data on db
    run this -> php artisan migrate --seed 

# User
  1. admin user
    account id : secretadmin
    username   : secretadmin@gmail.com
    password   : secretadmin
  2. Agent User
    - on progress
  3. Distributor User
    - on progress


# Happy Code GUYS
