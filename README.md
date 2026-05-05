# Sintrix Backend

## Overview

Sintrix Backend is a Laravel-based admin panel application built with Filament v5 for managing business operations. It provides a comprehensive dashboard for handling client data, financial records, services, and marketing content.

## Key Features

- Client Profit tracking and analytics
- Company statistics dashboard
- Contact management
- Service catalog with descriptions and technical details
- Invoice, Payment, Expense, and Salary management
- Portfolio project showcase
- Report document handling
- Marketing sections including:
    - Hear From Our Happy Customers (testimonials)
    - Empowering Business Through Smart Sintrix
    - Ready To Transform Your Business

## Technology Stack

- **Framework**: Laravel 12
- **Admin Panel**: Filament 5
- **Database**: MySQL/PostgreSQL (via Laravel migrations)
- **API**: Laravel Sanctum for authentication
- **Media Handling**: Cloudinary integration
- **Other**: Vite for assets, PHPUnit for testing

## Project Structure

```
app/
├── Console/Commands/          # Artisan commands (e.g., GeneratePolicies)
├── Filament/Resources/        # Filament resources for each model
├── Http/Controllers/Api/      # API controllers
├── Models/                    # Eloquent models
├── Policies/                  # Authorization policies
└── Providers/Filament/       # Filament service providers

database/
├── factories/                 # Model factories
├── migrations/                # Database migrations
└── seeders/                   # Database seeders

resources/
├── css/                      # Stylesheets
├── js/                       # JavaScript (Filament, Vite)
└── views/                    # Blade templates

public/                       # Static assets
routes/                       # Route definitions (web, api, console)
tests/                        # PHPUnit tests
```

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env` and configure database/mail settings
3. Run `composer install`
4. Run `npm install && npm run build`
5. Generate application key: `php artisan key:generate`
6. Run migrations: `php artisan migrate`
7. Seed database: `php artisan db:seed`
8. Start server: `php artisan serve`

## Usage

Access the admin panel at `/admin` after login. Filament provides CRUD interfaces for all resources with custom forms, tables, and policies.

## Models and Resources

| Model                                    | Description                                         |
| ---------------------------------------- | --------------------------------------------------- |
| User                                     | Admin users with roles                              |
| Contact                                  | Customer inquiries with PDF attachments             |
| Service                                  | Service offerings with steps, benefits, how-we-work |
| ClientProfit                             | Client revenue/profit tracking                      |
| CompanyStats                             | Business metrics                                    |
| Expense                                  | Operational expenses                                |
| Invoice                                  | Billing invoices                                    |
| Payment                                  | Payment records                                     |
| Salary                                   | Employee salaries                                   |
| PortfolioProject                         | Project showcase                                    |
| ReportDocument                           | Reports and documents                               |
| HearFromOurHappyCustomer                 | Testimonials                                        |
| EmpoweringBusinessThroughSmartVertexWave | Marketing content                                   |
| ReadyToTransformYourBusiness             | Call-to-action content                              |

## Conclusion

Sintrix Backend provides a scalable, secure, and efficient admin solution for managing business operations with a modern Laravel and Filament-based architecture.
