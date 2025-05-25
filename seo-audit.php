<?php
declare(strict_types=1);

/**
 * SEO Audit Script
 * 
 * This script checks various SEO factors for the website
 * Remove from production server after audit
 */

// Include configuration
require_once 'includes/config.php';

// Function to check if file exists
function checkFile($file) {
    return file_exists($file) ? '✅ Found' : '❌ Missing';
}

// Function to check URL response
function checkURL($url) {
    $headers = @get_headers($url);
    if ($headers && strpos($headers[0], '200') !== false) {
        return '✅ Accessible';
    }
    return '❌ Not accessible';
}

// Function to check meta tags on a page
function checkMetaTags($file) {
    if (!file_exists($file)) {
        return ['❌ File not found'];
    }
    
    $content = file_get_contents($file);
    $checks = [];
    
    // Check for title tag
    if (preg_match('/<title[^>]*>(.+?)<\/title>/i', $content, $matches)) {
        $title = trim($matches[1]);
        $checks['Title'] = strlen($title) > 0 ? "✅ Present ($title)" : '❌ Empty';
        $checks['Title Length'] = strlen($title) >= 30 && strlen($title) <= 60 ? 
            "✅ Good length (" . strlen($title) . " chars)" : 
            "⚠️ Length issue (" . strlen($title) . " chars)";
    } else {
        $checks['Title'] = '❌ Missing';
    }
    
    // Check for meta description
    if (preg_match('/<meta[^>]*name=["\']description["\'][^>]*content=["\']([^"\']+)["\'][^>]*>/i', $content, $matches)) {
        $desc = trim($matches[1]);
        $checks['Description'] = strlen($desc) > 0 ? "✅ Present" : '❌ Empty';
        $checks['Description Length'] = strlen($desc) >= 120 && strlen($desc) <= 160 ? 
            "✅ Good length (" . strlen($desc) . " chars)" : 
            "⚠️ Length issue (" . strlen($desc) . " chars)";
    } else {
        $checks['Description'] = '❌ Missing';
    }
    
    // Check for canonical URL
    $checks['Canonical URL'] = preg_match('/<link[^>]*rel=["\']canonical["\'][^>]*>/i', $content) ? 
        '✅ Present' : '❌ Missing';
    
    // Check for Open Graph tags
    $checks['Open Graph'] = preg_match('/<meta[^>]*property=["\']og:[^"\']+["\'][^>]*>/i', $content) ? 
        '✅ Present' : '❌ Missing';
    
    // Check for structured data
    $checks['Structured Data'] = preg_match('/<script[^>]*type=["\']application\/ld\+json["\'][^>]*>/i', $content) ? 
        '✅ Present' : '❌ Missing';
    
    return $checks;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Audit - Sathya Sai School Chatsworth</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f5f5f5; font-weight: bold; }
        .success { color: #28a745; }
        .warning { color: #ffc107; }
        .error { color: #dc3545; }
        .section { margin: 30px 0; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .note { background-color: #f8f9fa; padding: 15px; border-left: 4px solid #007bff; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>SEO Audit Report - Sathya Sai School Chatsworth</h1>
    <p><strong>Generated:</strong> <?= date('Y-m-d H:i:s') ?></p>
    
    <div class="note">
        <p><strong>Note:</strong> This audit script should be removed from the production server after review.</p>
    </div>

    <div class="section">
        <h2>1. Essential SEO Files</h2>
        <table>
            <tr><th>File</th><th>Status</th><th>Purpose</th></tr>
            <tr><td>robots.txt</td><td><?= checkFile('robots.txt') ?></td><td>Guide search engine crawlers</td></tr>
            <tr><td>sitemap.xml</td><td><?= checkFile('sitemap.xml') ?></td><td>Help search engines discover pages</td></tr>
            <tr><td>.htaccess</td><td><?= checkFile('.htaccess') ?></td><td>URL rewriting and redirects</td></tr>
            <tr><td>includes/seo.php</td><td><?= checkFile('includes/seo.php') ?></td><td>SEO configuration</td></tr>
        </table>
    </div>

    <div class="section">
        <h2>2. Page-by-Page SEO Analysis</h2>
        <?php
        $pages = [
            'index.php' => 'Homepage',
            'about.php' => 'About Us',
            'academics.php' => 'Academics',
            'admissions.php' => 'Admissions',
            'contact.php' => 'Contact',
            'curriculum.php' => 'Curriculum',
            'vacancy.php' => 'Vacancies',
            'year-planner.php' => 'Year Planner',
            'blog.php' => 'Blog'
        ];
        
        foreach ($pages as $file => $name) {
            echo "<h3>$name ($file)</h3>";
            $checks = checkMetaTags($file);
            echo "<table>";
            echo "<tr><th>SEO Element</th><th>Status</th></tr>";
            foreach ($checks as $element => $status) {
                echo "<tr><td>$element</td><td>$status</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

    <div class="section">
        <h2>3. Technical SEO Checklist</h2>
        <table>
            <tr><th>Check</th><th>Status</th><th>Recommendation</th></tr>
            <tr>
                <td>HTTPS Enabled</td>
                <td><?= isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? '✅ Yes' : '❌ No' ?></td>
                <td>Ensure SSL certificate is installed and force HTTPS redirects</td>
            </tr>
            <tr>
                <td>Clean URLs</td>
                <td><?= file_exists('.htaccess') ? '✅ Configured' : '❌ Not configured' ?></td>
                <td>Remove .php extensions from URLs</td>
            </tr>
            <tr>
                <td>Mobile Responsive</td>
                <td>✅ Bootstrap implemented</td>
                <td>Test on various devices and screen sizes</td>
            </tr>
            <tr>
                <td>Page Speed</td>
                <td>⚠️ Needs testing</td>
                <td>Use Google PageSpeed Insights to test and optimize</td>
            </tr>
            <tr>
                <td>Image Optimization</td>
                <td>⚠️ Needs review</td>
                <td>Compress images and add proper alt tags</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>4. Content SEO Recommendations</h2>
        <ul>
            <li><strong>Keyword Strategy:</strong> Focus on local education keywords like "private school Chatsworth", "value-based education KZN"</li>
            <li><strong>Local SEO:</strong> Add Google My Business listing and local directory submissions</li>
            <li><strong>Content Marketing:</strong> Regular blog posts about school events, educational tips, and achievements</li>
            <li><strong>Internal Linking:</strong> Link between related pages to improve navigation and SEO</li>
            <li><strong>Schema Markup:</strong> Implemented for organization - consider adding more specific schemas</li>
        </ul>
    </div>

    <div class="section">
        <h2>5. Next Steps for Google Indexing</h2>
        <ol>
            <li><strong>Google Search Console:</strong> Add and verify your website</li>
            <li><strong>Submit Sitemap:</strong> Submit sitemap.xml to Google Search Console</li>
            <li><strong>Google My Business:</strong> Create and optimize your business listing</li>
            <li><strong>Social Media:</strong> Ensure consistent NAP (Name, Address, Phone) across platforms</li>
            <li><strong>Monitor:</strong> Set up Google Analytics for traffic monitoring</li>
            <li><strong>Content:</strong> Regularly update content and add new pages</li>
        </ol>
    </div>

    <div class="section">
        <h2>6. Google Search Console Setup</h2>
        <p>To verify your site with Google Search Console, you can:</p>
        <ul>
            <li><strong>HTML File Upload:</strong> Download verification file from Google and upload to root directory</li>
            <li><strong>Meta Tag:</strong> Add verification meta tag to header.php</li>
            <li><strong>DNS Verification:</strong> Add TXT record to your domain's DNS</li>
        </ul>
        <p><strong>Recommended:</strong> Use the HTML file method for simplicity.</p>
    </div>

    <p><em>This audit was generated automatically. For a comprehensive SEO strategy, consider consulting with an SEO professional.</em></p>
</body>
</html> 