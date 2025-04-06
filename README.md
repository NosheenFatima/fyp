# JobFinder

JobFinder is a full-stack website built using Laravel 12, providing a platform for employers to post job openings and for job seekers to find their next career opportunity.

## Project Overview
JobFinder aims to streamline the job search process by connecting employers with qualified candidates across various industries and locations. The platform offers features for browsing job listings, viewing detailed job information, and potentially applying for positions.

## Installation
To install JobFinder, follow these steps:

1. Clone the repository from GitHub.
2. Run `composer install` to install all project dependencies.
3. Copy the `.env.example` file to `.env` and configure your database and other environment settings.
4. Run `php artisan key:generate` to generate the application key.
5. Run `php artisan migrate --seed` to create the database tables and seed them with initial data (if available).
6. Optionally, run `php artisan storage:link` to create a symbolic link from `public/storage` to `storage/app/public` if you are using local storage for uploads.

## Roles and Permissions
JobFinder implements a role-based access control system with the following roles:

1. **Admin**: Has full control over the platform, including managing job categories,view the applicants, adding a new job, view, update and delete .
2. **Employer**: Can register their company, post new job listings, manage their active postings (edit, delete), and potentially view applications .
3. **Job Seeker**: view  job categories,view job listings.

## Packages Used
JobFinder utilizes the following Laravel packages:

1. **Breeze**: Provides a minimal and secure starting point for authentication, including login, registration, and password reset functionality.
2. **Spatie Permission**: Implements a flexible and powerful system for managing user roles and permissions, controlling access to different features of the platform.
## Database
JobFinder uses MySQL as its relational database management system to store all application data, including user accounts, employer profiles, job listings, job categories, and any application information.

## Credentials
Here are the default credentials for testing purposes (these might be seeded during installation):

* **Admin**:
    + Email: admin@example.com
    + Password:'password'
* **Employer**:
    + Email:Employee@example.com
   + Password:'password'
* **Job Seeker**:
    + Email: jobseeker@example.com
    + Password:'password'


## Contributing
To contribute to JobFinder, please follow these guidelines:

1. Fork the repository on GitHub.
2. Create a new branch with a descriptive name for your feature or bug fix.
3. Implement your changes and ensure they are well-tested.
4. Commit your changes with clear and concise commit messages.
5. Push your branch to your forked repository.
6. Submit a pull request to the main repository, detailing the changes you've made and the problem they solve.

## Screenshots
![Admin Dashboard](file:///C:/Users/LENOVO/Downloads/Screenshot%202025-04-06%20122410.jpg)
![Job Detail Page](file:///C:/Users/LENOVO/Downloads/Screenshot%202025-04-06%20122134.jpg)
![Employer Dashboard](C:/Users/LENOVO/Downloads/Screenshot%202025-04-06%20121642.png)








