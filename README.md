# Legal Checksheet Application

**Legal Checksheet Application** is designed to facilitate legal documentation and checksheet processes. It provides a secure platform for the legal division to store data checksheets, automate PDF generation, and manage notifications for marketing, legal divisions, and heads.

## Table of Contents
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Security](#security)
- [Deployment](#deployment)
- [Contact](#contact)

## Features
- **Data Checksheet Storage**: Securely store and manage legal checksheets and related documentation.
- **Automated PDF Generation**: Automatically generate PDFs for checksheets and legal documents.
- **Notifications**: Notify marketing and legal divisions, as well as department heads, about important events and updates.
- **User Access Control**: Manage who has access to different types of data and functionality within the application.
- **Audit Logs**: Track changes and access to checksheets and documents for compliance and auditing purposes.

## Technology Stack
- **Frontend**: 
  - **HTML5** for structuring the web pages.
  - **CSS3** and **Bootstrap** for responsive and modern UI design.
  - **JavaScript** for interactive features and dynamic content.
- **Backend**: [Laravel](https://laravel.com/) - A robust PHP framework for handling server-side logic, data management, and security.
- **Database**: [MSSQL](https://www.microsoft.com/en-us/sql-server/sql-server-downloads) - A reliable relational database management system used to securely store application data.
- **PDF Generation**: Laravel packages for creating and managing PDFs.
- **Notifications**: Built-in notification system for sending alerts and updates.

## Installation

### Prerequisites
- [PHP](https://www.php.net/) >= 7.4
- [Composer](https://getcomposer.org/) for dependency management
- [MSSQL](https://www.microsoft.com/en-us/sql-server/sql-server-downloads) for the database

### Steps
1. **Clone the repository**:
   ```bash
   git clone https://github.com/Antonius1712/LEGAL.git
   cd legal-checksheet
   ```
2. **Install backend dependencies**:
   ```bash
   composer install
   ```
3. **Environment setup**:
   Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
   Configure the .env file with your MSSQL database credentials and other environment-specific variables.

4. **Database migration: Run the migrations to set up the required tables in your MSSQL database**:
   ```bash
   php artisan migrate
   ```
5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```
6. **Start the development server**:
   ```bash
   php artisan serve
   ```
7. **Access the application: Open your browser and navigate to http://localhost:8000**:

## Configuration

Edit the .env file to configure your database connection, mail server, and other environment-specific settings. Ensure that the MSSQL database credentials are correctly set up to connect to your database.

## Usage

- **Login**: Use your credentials to log in and access the dashboard.
- **Data Checksheet Management**: Add, view, and manage legal checksheets and related documents.
- **Automated PDFs**: Generate and download PDFs for legal documents and checksheets.
- **Notifications**: Configure and manage notifications for various divisions and heads.
- **Access Control**: Admins can manage user roles and permissions.

## Security

- **Access Control**: Utilize role-based access control to manage permissions.
- **Encryption**: All sensitive data, including files, are encrypted using a proprietary method to ensure confidentiality.
- **Audit Logs**: Detailed logs of user actions are stored for audit purposes.


## Deployment

To deploy Legal Checksheet to a production environment, follow these steps:
1. Set up your production environment (web server, database, etc.).
2. Deploy the application using your preferred deployment method (e.g., traditional server setup).
3. Configure environment variables in the .env file on the production server.
4. Run migrations on the production database:
   ```bash
   php artisan migrate --force
   ```

## Contact

For any questions or support, please reach out to:

- **Name**: Antonius Christian
- **Email**: antonius1712@gmail.com
- **Phone**: +6281297275563
- **LinkedIn**: [Antonius Christian](https://www.linkedin.com/in/antonius-christian/)

Feel free to connect with me via email or LinkedIn for any inquiries or further information.