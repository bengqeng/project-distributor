
## About Distributor Project
App agent and distributor management

# project-distributor

# Requirement
1. php : 7.3>
2. mysql


# How to Setup
  1. CLone using https
  2. run composer install and npm install
  3. run npm run dev anything you want (i prefer using watch)
  4. run php artisan serve

# How To migrate data
  1. if you have data on your db
    run this -> php artisan migrate:fresh --seed
    carefull it will delete your old data

  2. no old data on db
    run this -> php artisan migrate --seed

# User
  1. admin user (Can Ban User)
    account id : secretadmin
    username   : secretadmin@gmail.com
    password   : secretadmin
  2. admin user (Cannot Ban User)
    account id : secretadmin2
    username   : secretadmin2@gmail.com
    password   : secretadmin2
  3. Agent User
    - on progress
  4. Distributor User
    - on progress


# Happy Code GUYS
