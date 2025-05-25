# Manual Composer Installation for Live Server

This guide helps you install Composer on your live server without SSH access.

## Prerequisites

- FTP/cPanel file manager access to your server
- PHP 7.4+ with either `allow_url_fopen` enabled OR `curl` extension
- Your `composer.json` file already uploaded to the server

## Installation Steps

### 1. Upload Files
Upload these files to your server's root directory (same location as your `composer.json`):
- `install-composer.php` (the installation script)
- `composer.json` (your project's dependency file)

### 2. Run the Installation Script
1. Open your web browser
2. Navigate to: `https://yourdomain.com/install-composer.php`
3. Follow the on-screen instructions

### 3. Installation Process
The script will guide you through:

#### Step 1: System Check
- Verifies PHP version and required extensions
- Checks for existing Composer installation
- Shows current server configuration

#### Step 2: Download Composer
- Downloads the official Composer installer
- Runs the installer to create `composer.phar`
- Verifies the download was successful

#### Step 3: Install Dependencies
- Runs `composer install --no-dev --optimize-autoloader`
- Downloads PHPMailer and other dependencies
- Creates the `vendor/` directory and autoloader

#### Step 4: Verification
- Tests that all files were created correctly
- Verifies PHPMailer is available
- Confirms the autoloader works

### 4. Cleanup
**IMPORTANT**: Delete the `install-composer.php` file after installation for security!

## Expected Results

After successful installation, you should have:
```
your-site/
├── composer.json
├── composer.phar
├── vendor/
│   ├── autoload.php
│   ├── phpmailer/
│   └── other dependencies...
└── your other files...
```

## Troubleshooting

### Common Issues

**"allow_url_fopen is disabled"**
- Contact your hosting provider to enable it, OR
- Ensure cURL extension is available

**"Permission denied" errors**
- Check file permissions (755 for directories, 644 for files)
- Some hosts require 777 permissions temporarily

**"Composer.phar not found after installation"**
- Check if `shell_exec()` is disabled by your host
- Try the alternative download method in the script

**"Dependencies not installing"**
- Verify `composer.json` is in the same directory
- Check that PHP has enough memory (increase if needed)
- Look for specific error messages in the output

### Memory Issues
If you get memory errors, add this to your `.htaccess`:
```apache
php_value memory_limit 256M
php_value max_execution_time 300
```

### Alternative Method
If the script doesn't work, you can:
1. Download `composer.phar` manually from https://getcomposer.org/composer.phar
2. Upload it to your server
3. Run the "Install Dependencies" step from the script

## Security Notes

- **Always delete `install-composer.php` after use**
- The script includes safety checks and cleanup options
- Never leave installation scripts on production servers

## Testing

After installation, test your contact form to ensure PHPMailer is working:
1. Visit your contact page
2. Submit a test message
3. Check if emails are sent/received properly

## Support

If you encounter issues:
1. Check the error messages in the script output
2. Review your hosting provider's PHP configuration
3. Ensure all required PHP extensions are available
4. Contact your hosting provider if needed

---

**Remember**: This is a one-time setup. Once Composer and dependencies are installed, your contact form should work with PHPMailer on the live server. 