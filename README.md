## Overview

This project is a financial management platform that allows users to manage various assets, including stocks, gold, cash, coins, and accounts. Users can also add their transactions and analyze their financial data.

## Features

1. Authentication APIs
- Sign Up: Register a new user.
- Login: Authenticate a user and return an access token.
- Logout: Log out the currently authenticated user.

2. Asset Management APIs

- Other Assets
- Gold
- Cash
- Accounts
- Coins
- Stocks
- Transactions

3. Financial Analysis
Analysis


3. Database Structure

The database structure can be seen in the issue #2:

![Lantern](https://github.com/user-attachments/assets/40908879-1080-4431-bd75-894b562543b8)


## How to Run the project

After Cloning the repository run:

1. ``` docker-compse build ```
2. ``` docker-compose up -d ```
3. ``` cd src ```
4. ``` docker-compose exec app php composer install ```
5. ``` cp .env.example .env ```
6. ``` docker-compose exec app php artisan key:generate ```
7. ``` docker compose exec app php artisan passport:keys ```
8. ``` docker-compose exec app php artisan migrate ```
9. ``` docker compose exec app php artisan passport:client --personal ```
10. ``` sudo chown -R $USER:$USER ./src/storage ```

