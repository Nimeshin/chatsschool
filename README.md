# Sathya Sai School Website

This is the official website for Sathya Sai School, featuring a contact form system with email notifications.

## Features

- Modern, responsive design
- Contact form with email notifications
- Auto-reply system for form submissions
- SMTP email integration with cPanel
- Secure form processing with CSRF protection

## Requirements

- PHP 8.1 or higher
- Composer for dependency management
- MySQL/MariaDB database
- Web server (Apache/Nginx)
- SSL certificate for secure email transmission

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/saischoolchats
cd saischoolchats
```

2. Install dependencies:
```bash
composer install
```

3. Configure email settings:
```bash
cp includes/mail_config.php.example includes/mail_config.php
```
Then edit `includes/mail_config.php` with your email server settings.

4. Set up your web server:
- Point your web server's document root to the project's root directory
- Ensure PHP has the required extensions enabled (openssl, mbstring)
- Configure SSL if not already set up

## Configuration

### Email Settings

The email configuration file (`includes/mail_config.php`) needs to be set up with your cPanel email credentials:

```php
define('MAIL_HOST', 'mail.yourdomain.com');
define('MAIL_PORT', 465);
define('MAIL_USERNAME', 'your-email@yourdomain.com');
define('MAIL_PASSWORD', 'your-password');
define('MAIL_ENCRYPTION', 'ssl');
```

### Testing Email Configuration

Use the included test script to verify your email setup:

```bash
php test_mail.php
```

## Security

- All form submissions are protected with CSRF tokens
- Passwords and sensitive data are excluded from version control
- Input validation and sanitization implemented
- SSL encryption for email transmission

## Development

To set up a development environment:

1. Clone the repository
2. Install dependencies with Composer
3. Copy and configure mail_config.php
4. Set MAIL_DEBUG = 2 for testing
5. Use test_mail.php to verify configuration

## Production Deployment

Before deploying to production:

1. Set MAIL_DEBUG = 0 in mail_config.php
2. Ensure all passwords and sensitive data are properly secured
3. Enable SSL/TLS for secure email transmission
4. Set up proper error logging
5. Configure backup systems

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please email contact@saischoolchats.co.za or call 031 402 1740.
