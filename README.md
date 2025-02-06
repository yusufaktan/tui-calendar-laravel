<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Calendar Application

This is a Laravel-based web application that includes a calendar feature powered by the TOAST UI Calendar library. The application allows users to create, edit, and delete events dynamically without refreshing the page. It also provides the ability to export the current month's events as a PDF file. The application is designed to be user-friendly and efficient, making it ideal for managing schedules and events.

## Features

- **Dynamic Event Management**: Add, update, and delete events directly on the calendar.
- **Real-Time Updates**: Changes to events are reflected on the calendar without requiring a page refresh.
- **Responsive Design**: The calendar is fully responsive and works seamlessly on different devices.
- **PDF Export**: Export current month's events as a PDF file.
- **TOAST UI Calendar Integration**: Leverages the powerful TOAST UI Calendar library for a rich user experience.

---

## Getting Started

Follow these steps to set up and run the project on your local machine.

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js and npm
- MySQL or any other supported database
- Laravel 10.x

---

### Installation

1. git clone https://github.com/your-username/laravel-calendar-app.gitcd laravel-calendar-app
1. composer installRun the following command to install the required PHP dependencies:
1. npm installUse npm to install the required JavaScript dependencies:
1. cp .env.example .envDB_CONNECTION=mysqlDB_HOST=127.0.0.1DB_PORT=3306DB_DATABASE=your_database_nameDB_USERNAME=your_database_userDB_PASSWORD=your_database_passwordCopy the `.env.example` file to create a new `.env` file:Update the `.env` file with your database credentials and other environment-specific settings:
1. php artisan key:generateLaravel uses an application key for encryption and security purposes. Run the following command to generate the key:This step is essential for the application to function properly. The generated key will be stored in the `.env` file under the `APP_KEY` variable.
1. php artisan migrateSet up the database tables by running the migrations:
1. npm run devCompile the frontend assets using Laravel Mix:

---

### Running the Application

Start the development server:

```
php artisan serve
```

The application will be accessible at `http://127.0.0.1:8000`.

---

## Usage

1. Navigate to the dashboard to view the calendar.
1. Use the "Add Event" button to create a new event.
1. Click on an existing event to edit or delete it.
1. All changes will be reflected on the calendar in real-time.
1. Click the "Export to PDF" button to download the current month's events as a PDF file.

---

## PDF Export Feature

The application includes a feature to export the current month's events as a PDF file. This feature allows users to easily share or print their events.

### How It Works

1. Click the **"Export to PDF"** button on the dashboard.
1. The application retrieves the current month's events and generates a PDF file.
1. The PDF file is automatically downloaded.

The PDF file includes the event title, description, start date, and end date.

---

## TOAST UI Calendar Integration

This project uses the [TOAST UI Calendar](https://ui.toast.com/tui-calendar) library for the calendar functionality. The library provides a rich set of features and a customizable interface.

---

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.

---

## License

This project is open-source and available under the [MIT License](LICENSE).

---

## Contact

For any questions or support, please contact [yusufaktn@outlook.com].
