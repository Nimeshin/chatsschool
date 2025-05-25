<?php
declare(strict_types=1);

/**
 * Composer Manual Installation Script
 * 
 * This script downloads and installs Composer on servers without SSH access.
 * Upload this file to your server and run it through your web browser.
 * 
 * IMPORTANT: Delete this file after installation for security reasons!
 */

// Set time limit for the installation process
set_time_limit(300); // 5 minutes

// Output buffering for better display
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composer Manual Installation</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            max-width: 1000px; 
            margin: 0 auto; 
            padding: 20px; 
            background-color: #f8f9fa;
        }
        .container { 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1, h2 { color: #333; }
        .success { color: #28a745; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .warning { color: #856404; background: #fff3cd; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .info { color: #0c5460; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .step { margin: 20px 0; padding: 15px; border-left: 4px solid #007bff; background: #f8f9fa; }
        pre { 
            background-color: #f8f9fa; 
            padding: 15px; 
            border-radius: 4px; 
            overflow-x: auto; 
            border: 1px solid #e9ecef;
        }
        .button { 
            display: inline-block;
            background-color: #007bff; 
            color: white; 
            padding: 10px 20px; 
            text-decoration: none;
            border-radius: 4px; 
            margin: 10px 5px 10px 0;
        }
        .button:hover { background-color: #0056b3; }
        .button.danger { background-color: #dc3545; }
        .button.danger:hover { background-color: #c82333; }
        .progress { margin: 20px 0; }
        .progress-bar { 
            width: 100%; 
            height: 20px; 
            background: #e9ecef; 
            border-radius: 10px; 
            overflow: hidden;
        }
        .progress-fill { 
            height: 100%; 
            background: #007bff; 
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎼 Composer Manual Installation</h1>
        
        <div class="warning">
            <strong>⚠️ Security Notice:</strong> Delete this file immediately after installation!
        </div>

        <?php
        $action = $_GET['action'] ?? 'info';
        $currentDir = __DIR__;
        $composerPhar = $currentDir . '/composer.phar';
        $vendorDir = $currentDir . '/vendor';

        // Check if already installed
        $composerExists = file_exists($composerPhar);
        $vendorExists = is_dir($vendorDir);

        if ($action === 'info'): ?>
            <div class="step">
                <h2>📋 Installation Information</h2>
                <p><strong>Current Directory:</strong> <?= htmlspecialchars($currentDir) ?></p>
                <p><strong>PHP Version:</strong> <?= phpversion() ?></p>
                <p><strong>Server:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' ?></p>
                
                <h3>Current Status:</h3>
                <ul>
                    <li>Composer.phar: <?= $composerExists ? '✅ Found' : '❌ Not found' ?></li>
                    <li>Vendor directory: <?= $vendorExists ? '✅ Found' : '❌ Not found' ?></li>
                    <li>allow_url_fopen: <?= ini_get('allow_url_fopen') ? '✅ Enabled' : '❌ Disabled' ?></li>
                    <li>curl extension: <?= extension_loaded('curl') ? '✅ Available' : '❌ Not available' ?></li>
                    <li>openssl extension: <?= extension_loaded('openssl') ? '✅ Available' : '❌ Not available' ?></li>
                    <li>zip extension: <?= extension_loaded('zip') ? '✅ Available' : '❌ Not available' ?></li>
                </ul>
            </div>

            <?php if (!ini_get('allow_url_fopen') && !extension_loaded('curl')): ?>
                <div class="error">
                    <strong>❌ Error:</strong> Neither allow_url_fopen nor cURL is available. Cannot download Composer.
                </div>
            <?php else: ?>
                <div class="step">
                    <h2>🚀 Installation Options</h2>
                    
                    <?php if (!$composerExists): ?>
                        <a href="?action=download" class="button">📥 Download Composer</a>
                    <?php else: ?>
                        <div class="success">✅ Composer.phar already exists</div>
                    <?php endif; ?>
                    
                    <?php if ($composerExists && !$vendorExists): ?>
                        <a href="?action=install" class="button">📦 Install Dependencies</a>
                    <?php elseif ($vendorExists): ?>
                        <div class="success">✅ Dependencies already installed</div>
                        <a href="?action=update" class="button">🔄 Update Dependencies</a>
                    <?php endif; ?>
                    
                    <a href="?action=verify" class="button">🔍 Verify Installation</a>
                    <a href="?action=cleanup" class="button danger">🗑️ Delete This Script</a>
                </div>
            <?php endif; ?>

        <?php elseif ($action === 'download'): ?>
            <div class="step">
                <h2>📥 Downloading Composer</h2>
                
                <?php
                $progress = 0;
                echo '<div class="progress"><div class="progress-bar"><div class="progress-fill" style="width: ' . $progress . '%"></div></div></div>';
                
                try {
                    // Download Composer installer
                    echo '<p>Step 1: Downloading Composer installer...</p>';
                    flush();
                    
                    $installerUrl = 'https://getcomposer.org/installer';
                    $installer = '';
                    
                    if (extension_loaded('curl')) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $installerUrl);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Composer Installer)');
                        $installer = curl_exec($ch);
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                        
                        if ($httpCode !== 200 || $installer === false) {
                            throw new Exception('Failed to download installer via cURL');
                        }
                    } else {
                        $context = stream_context_create([
                            'http' => [
                                'method' => 'GET',
                                'header' => 'User-Agent: Mozilla/5.0 (compatible; Composer Installer)',
                                'timeout' => 60
                            ]
                        ]);
                        $installer = file_get_contents($installerUrl, false, $context);
                        
                        if ($installer === false) {
                            throw new Exception('Failed to download installer via file_get_contents');
                        }
                    }
                    
                    $progress = 33;
                    echo '<script>document.querySelector(".progress-fill").style.width = "' . $progress . '%";</script>';
                    echo '<div class="success">✅ Installer downloaded successfully</div>';
                    flush();
                    
                    // Save installer temporarily
                    echo '<p>Step 2: Running Composer installer...</p>';
                    $tempInstaller = $currentDir . '/composer-setup.php';
                    file_put_contents($tempInstaller, $installer);
                    
                    $progress = 66;
                    echo '<script>document.querySelector(".progress-fill").style.width = "' . $progress . '%";</script>';
                    flush();
                    
                    // Run installer with proper environment
                    ob_start();
                    
                    // Set up environment variables for Composer installer
                    $_SERVER['argv'] = ['composer-setup.php'];
                    $_SERVER['argc'] = 1;
                    $GLOBALS['argv'] = $_SERVER['argv'];
                    $GLOBALS['argc'] = $_SERVER['argc'];
                    
                    // Suppress warnings during installation
                    $oldErrorReporting = error_reporting(E_ERROR | E_PARSE);
                    
                    try {
                        include $tempInstaller;
                    } catch (Exception $e) {
                        // Continue even if there are warnings
                    }
                    
                    // Restore error reporting
                    error_reporting($oldErrorReporting);
                    
                    $installerOutput = ob_get_clean();
                    
                    // Clean up installer
                    unlink($tempInstaller);
                    
                    $progress = 100;
                    echo '<script>document.querySelector(".progress-fill").style.width = "' . $progress . '%";</script>';
                    
                    if (file_exists($composerPhar)) {
                        echo '<div class="success">✅ Composer downloaded successfully!</div>';
                        echo '<p><strong>File location:</strong> ' . htmlspecialchars($composerPhar) . '</p>';
                        echo '<p><strong>File size:</strong> ' . number_format(filesize($composerPhar)) . ' bytes</p>';
                        echo '<a href="?action=install" class="button">📦 Install Dependencies</a>';
                    } else {
                        echo '<div class="warning">⚠️ Installer completed with warnings. Trying direct download...</div>';
                        if ($installerOutput) {
                            echo '<pre>' . htmlspecialchars($installerOutput) . '</pre>';
                        }
                        
                        // Try direct download as fallback
                        try {
                            echo '<p>Attempting direct download of composer.phar...</p>';
                            $composerUrl = 'https://getcomposer.org/composer.phar';
                            
                            if (extension_loaded('curl')) {
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $composerUrl);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Composer Installer)');
                                $composerData = curl_exec($ch);
                                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                curl_close($ch);
                                
                                if ($httpCode === 200 && $composerData !== false) {
                                    file_put_contents($composerPhar, $composerData);
                                }
                            } else {
                                $context = stream_context_create([
                                    'http' => [
                                        'method' => 'GET',
                                        'header' => 'User-Agent: Mozilla/5.0 (compatible; Composer Installer)',
                                        'timeout' => 60
                                    ]
                                ]);
                                $composerData = file_get_contents($composerUrl, false, $context);
                                if ($composerData !== false) {
                                    file_put_contents($composerPhar, $composerData);
                                }
                            }
                            
                            if (file_exists($composerPhar) && filesize($composerPhar) > 1000000) {
                                echo '<div class="success">✅ Composer downloaded successfully via direct method!</div>';
                                echo '<p><strong>File location:</strong> ' . htmlspecialchars($composerPhar) . '</p>';
                                echo '<p><strong>File size:</strong> ' . number_format(filesize($composerPhar)) . ' bytes</p>';
                                echo '<a href="?action=install" class="button">📦 Install Dependencies</a>';
                            } else {
                                echo '<div class="error">❌ Direct download also failed. Please try manual installation.</div>';
                            }
                            
                        } catch (Exception $e) {
                            echo '<div class="error">❌ Direct download error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                        }
                    }
                    
                } catch (Exception $e) {
                    echo '<div class="error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                }
                ?>
            </div>

        <?php elseif ($action === 'install'): ?>
            <div class="step">
                <h2>📦 Installing Dependencies</h2>
                
                <?php
                if (!$composerExists) {
                    echo '<div class="error">❌ Composer.phar not found. Please download it first.</div>';
                } else {
                    try {
                        echo '<p>Running: php composer.phar install --no-dev --optimize-autoloader</p>';
                        
                        // Change to the directory containing composer.json
                        chdir($currentDir);
                        
                        // Run composer install
                        $command = PHP_BINARY . ' composer.phar install --no-dev --optimize-autoloader 2>&1';
                        $output = shell_exec($command);
                        
                        if ($output === null) {
                            // Try alternative method
                            ob_start();
                            system($command, $returnCode);
                            $output = ob_get_clean();
                        }
                        
                        echo '<pre>' . htmlspecialchars($output) . '</pre>';
                        
                        if (is_dir($vendorDir)) {
                            echo '<div class="success">✅ Dependencies installed successfully!</div>';
                            echo '<p><strong>Vendor directory:</strong> ' . htmlspecialchars($vendorDir) . '</p>';
                            
                            // Check for autoloader
                            $autoloader = $vendorDir . '/autoload.php';
                            if (file_exists($autoloader)) {
                                echo '<div class="success">✅ Autoloader created: ' . htmlspecialchars($autoloader) . '</div>';
                            }
                            
                            echo '<a href="?action=verify" class="button">🔍 Verify Installation</a>';
                        } else {
                            echo '<div class="error">❌ Vendor directory not created. Check the output above for errors.</div>';
                        }
                        
                    } catch (Exception $e) {
                        echo '<div class="error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                    }
                }
                ?>
            </div>

        <?php elseif ($action === 'update'): ?>
            <div class="step">
                <h2>🔄 Updating Dependencies</h2>
                
                <?php
                if (!$composerExists) {
                    echo '<div class="error">❌ Composer.phar not found. Please download it first.</div>';
                } else {
                    try {
                        echo '<p>Running: php composer.phar update --no-dev --optimize-autoloader</p>';
                        
                        chdir($currentDir);
                        $command = PHP_BINARY . ' composer.phar update --no-dev --optimize-autoloader 2>&1';
                        $output = shell_exec($command);
                        
                        if ($output === null) {
                            ob_start();
                            system($command, $returnCode);
                            $output = ob_get_clean();
                        }
                        
                        echo '<pre>' . htmlspecialchars($output) . '</pre>';
                        echo '<div class="success">✅ Update completed!</div>';
                        echo '<a href="?action=verify" class="button">🔍 Verify Installation</a>';
                        
                    } catch (Exception $e) {
                        echo '<div class="error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                    }
                }
                ?>
            </div>

        <?php elseif ($action === 'verify'): ?>
            <div class="step">
                <h2>🔍 Verifying Installation</h2>
                
                <?php
                echo '<h3>File Check:</h3>';
                echo '<ul>';
                echo '<li>composer.phar: ' . ($composerExists ? '✅ Found' : '❌ Missing') . '</li>';
                echo '<li>vendor/: ' . ($vendorExists ? '✅ Found' : '❌ Missing') . '</li>';
                
                $autoloader = $vendorDir . '/autoload.php';
                echo '<li>vendor/autoload.php: ' . (file_exists($autoloader) ? '✅ Found' : '❌ Missing') . '</li>';
                
                $phpmailerDir = $vendorDir . '/phpmailer/phpmailer';
                echo '<li>PHPMailer: ' . (is_dir($phpmailerDir) ? '✅ Installed' : '❌ Missing') . '</li>';
                echo '</ul>';
                
                if ($composerExists) {
                    echo '<h3>Composer Version:</h3>';
                    chdir($currentDir);
                    $versionOutput = shell_exec(PHP_BINARY . ' composer.phar --version 2>&1');
                    echo '<pre>' . htmlspecialchars($versionOutput) . '</pre>';
                }
                
                if (file_exists($autoloader)) {
                    echo '<h3>Testing Autoloader:</h3>';
                    try {
                        require_once $autoloader;
                        echo '<div class="success">✅ Autoloader works correctly</div>';
                        
                        // Test PHPMailer
                        if (class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
                            echo '<div class="success">✅ PHPMailer class available</div>';
                        } else {
                            echo '<div class="error">❌ PHPMailer class not found</div>';
                        }
                        
                    } catch (Exception $e) {
                        echo '<div class="error">❌ Autoloader error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                    }
                }
                
                if ($composerExists && $vendorExists) {
                    echo '<div class="success">🎉 Installation appears to be successful!</div>';
                    echo '<p>You can now use Composer and PHPMailer in your application.</p>';
                    echo '<a href="?action=cleanup" class="button danger">🗑️ Delete This Script</a>';
                }
                ?>
            </div>

        <?php elseif ($action === 'cleanup'): ?>
            <div class="step">
                <h2>🗑️ Cleanup</h2>
                
                <?php
                $scriptFile = __FILE__;
                echo '<p>This will delete the installation script: ' . htmlspecialchars(basename($scriptFile)) . '</p>';
                echo '<div class="warning">⚠️ Make sure the installation is complete before proceeding!</div>';
                ?>
                
                <form method="post" onsubmit="return confirm('Are you sure you want to delete this script?');">
                    <input type="hidden" name="confirm_delete" value="1">
                    <button type="submit" class="button danger">🗑️ Confirm Delete</button>
                    <a href="?action=info" class="button">↩️ Go Back</a>
                </form>
                
                <?php
                if ($_POST['confirm_delete'] ?? false) {
                    if (unlink($scriptFile)) {
                        echo '<div class="success">✅ Script deleted successfully!</div>';
                        echo '<script>setTimeout(function(){ window.location.href = "./"; }, 3000);</script>';
                    } else {
                        echo '<div class="error">❌ Failed to delete script. Please delete manually.</div>';
                    }
                }
                ?>
            </div>

        <?php endif; ?>

        <div class="step">
            <h2>📚 Next Steps</h2>
            <ol>
                <li>Verify that your <code>composer.json</code> file exists in the same directory</li>
                <li>Run the installation to download PHPMailer and other dependencies</li>
                <li>Test your contact form to ensure PHPMailer is working</li>
                <li><strong>Delete this script for security reasons!</strong></li>
            </ol>
        </div>

        <div class="step">
            <h2>🔧 Manual Installation (If Automatic Fails)</h2>
            <p>If the automatic installation doesn't work, you can install manually:</p>
            <ol>
                <li>Download <code>composer.phar</code> from <a href="https://getcomposer.org/composer.phar" target="_blank">https://getcomposer.org/composer.phar</a></li>
                <li>Upload it to the same directory as this script</li>
                <li>Return to this page and click "Install Dependencies"</li>
            </ol>
            
            <h3>Alternative: Manual PHPMailer Installation</h3>
            <p>If Composer continues to have issues:</p>
            <ol>
                <li>Download PHPMailer from <a href="https://github.com/PHPMailer/PHPMailer/archive/v6.8.0.zip" target="_blank">GitHub</a></li>
                <li>Extract and upload to <code>vendor/phpmailer/phpmailer/</code></li>
                <li>Create a simple autoloader or include files directly</li>
            </ol>
        </div>

        <div class="info">
            <strong>💡 Tip:</strong> If you encounter issues, check your hosting provider's documentation for PHP configuration and file permissions.
        </div>
    </div>
</body>
</html>

<?php
// Flush output buffer
ob_end_flush();
?> 