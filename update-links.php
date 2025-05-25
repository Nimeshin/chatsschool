<?php
declare(strict_types=1);

/**
 * Link Update Script
 * 
 * This script updates all internal page links to use SEO-friendly URLs without .php extensions
 * Run this script once to update your site links, then you can remove it.
 */

require_once 'includes/config.php';

// Define the directory to scan
$directory = __DIR__;

// File types to process
$fileTypes = ['php', 'html'];

// Get all files recursively
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($directory)
);

// Regular expression patterns for links
$patterns = [
    // href="file.php" pattern
    '/<a\s+[^>]*href\s*=\s*["\']([^"\']*\.php[^"\']*)["\'][^>]*>/i',
    
    // Form action="file.php" pattern
    '/<form\s+[^>]*action\s*=\s*["\']([^"\']*\.php[^"\']*)["\'][^>]*>/i'
];

// Track files updated
$updatedFiles = 0;
$failures = 0;
$skippedFiles = 0;

echo "Starting to update internal links...\n";

foreach ($files as $file) {
    // Skip if not a file or not a target file type
    if (!$file->isFile()) {
        continue;
    }
    
    $extension = pathinfo($file->getPathname(), PATHINFO_EXTENSION);
    if (!in_array(strtolower($extension), $fileTypes)) {
        continue;
    }
    
    // Skip certain system files
    if (strpos($file->getPathname(), 'vendor') !== false || 
        strpos($file->getPathname(), 'node_modules') !== false ||
        basename($file->getPathname()) === 'update-links.php') {
        $skippedFiles++;
        continue;
    }
    
    // Read file content
    $content = file_get_contents($file->getPathname());
    $originalContent = $content;
    
    // Process each pattern
    foreach ($patterns as $pattern) {
        $content = preg_replace_callback($pattern, function($matches) {
            $url = $matches[1];
            
            // Skip external links or links with variables
            if (strpos($url, 'http') === 0 || strpos($url, '<?') !== false) {
                return $matches[0];
            }
            
            // Extract the base filename
            $path = parse_url($url, PHP_URL_PATH);
            if (empty($path)) {
                return $matches[0];
            }
            
            // Check if it's a .php file
            if (substr($path, -4) === '.php') {
                $newPath = substr($path, 0, -4);
                // Handle index.php specially
                if ($newPath === 'index') {
                    $newPath = './';
                }
                
                // Replace in original match
                return str_replace($url, $newPath, $matches[0]);
            }
            
            return $matches[0];
        }, $content);
    }
    
    // Write back if changed
    if ($content !== $originalContent) {
        try {
            file_put_contents($file->getPathname(), $content);
            echo "Updated: " . $file->getPathname() . "\n";
            $updatedFiles++;
        } catch (Exception $e) {
            echo "Failed to update: " . $file->getPathname() . " - " . $e->getMessage() . "\n";
            $failures++;
        }
    }
}

echo "----------------------\n";
echo "Summary:\n";
echo "Files updated: $updatedFiles\n";
echo "Files skipped: $skippedFiles\n";
echo "Failures: $failures\n";
echo "----------------------\n";
echo "Done! Your site now uses SEO-friendly URLs.\n";
echo "You should now update links in your content management system if applicable.\n";
echo "Remember to remove this script after use for security.\n"; 