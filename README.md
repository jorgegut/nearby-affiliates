# Neraby Affiliates Invitation project
## Overview
This is a Laravel-based application developed as part of the interview process. This application reads the full list of affiliates from a txt file and output the name and IDs of matching affiliates within 100km, sorted by Affiliate ID (ascending).

---

## Requirements
- PHP >= 8.1
- Composer
- Laravel [12]

---

## Installation

1. Install dependencies: 
        composer install
2. Environment Configuration
        cp .env.example .env
3. Generate application key:
        php artisan key:generate
4. Run application
        php artisan serve
        - Visit http://localhost:8000 in your browser.


## Run Tests

        php artisan test
