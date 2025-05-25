<?php
declare(strict_types=1);

/**
 * SEO Configuration
 * 
 * @package SathyaSaiSchool
 */

// Get current page name
$current_page = basename($_SERVER['PHP_SELF'], '.php');

// Default SEO values
$seo_defaults = [
    'title' => 'Sathya Sai School Chatsworth - Value-Based Education Excellence',
    'description' => 'Sathya Sai School Chatsworth offers holistic education integrating academic excellence with human values. Nurturing character, inspiring excellence, transforming lives through Sri Sathya Sai Educare.',
    'keywords' => 'Sathya Sai School, Chatsworth, Education, Values, Academic Excellence, Character Development, Holistic Education, Sri Sathya Sai Educare, Private School, South Africa',
    'og_type' => 'website',
    'og_image' => 'assets/images/logo.png'
];

// Page-specific SEO configurations
$seo_config = [
    'index' => [
        'title' => 'Sathya Sai School Chatsworth - Cultivating Character, Inspiring Excellence',
        'description' => 'Welcome to Sathya Sai School Chatsworth, where academic excellence meets holistic development through Sri Sathya Sai Educare. Nurturing responsible, compassionate, and enlightened individuals.',
        'keywords' => 'Sathya Sai School Chatsworth, value-based education, holistic development, character education, academic excellence, Sri Sathya Sai Educare, private school Chatsworth',
        'og_type' => 'website'
    ],
    'about' => [
        'title' => 'About Us - Sathya Sai School Chatsworth | Our Mission & Values',
        'description' => 'Learn about Sathya Sai School Chatsworth\'s mission to provide value-integrated education. Founded on Sri Sathya Sai Baba\'s teachings, we develop character alongside academic achievement.',
        'keywords' => 'about Sathya Sai School, school mission, values education, Sri Sathya Sai Baba, character development, educational philosophy, Chatsworth school',
        'og_type' => 'article'
    ],
    'academics' => [
        'title' => 'Academic Programs - Sathya Sai School Chatsworth | Foundation to Senior Phase',
        'description' => 'Explore our comprehensive academic programs from Foundation Phase to Senior Phase. Quality education integrated with human values for holistic student development.',
        'keywords' => 'academic programs, Foundation Phase, Intermediate Phase, Senior Phase, curriculum, quality education, holistic learning, Sathya Sai School academics',
        'og_type' => 'article'
    ],
    'admissions' => [
        'title' => 'Admissions - Sathya Sai School Chatsworth | Apply Now for Quality Education',
        'description' => 'Apply for admission to Sathya Sai School Chatsworth. Join our community of learners committed to academic excellence and character development through value-based education.',
        'keywords' => 'school admissions, apply now, enrollment, Sathya Sai School application, private school admission, Chatsworth school enrollment',
        'og_type' => 'article'
    ],
    'contact' => [
        'title' => 'Contact Us - Sathya Sai School Chatsworth | Get in Touch',
        'description' => 'Contact Sathya Sai School Chatsworth for inquiries about admissions, programs, or general information. We\'re here to help you join our educational community.',
        'keywords' => 'contact school, Sathya Sai School contact, school address, phone number, email, Chatsworth school contact information',
        'og_type' => 'article'
    ],
    'curriculum' => [
        'title' => 'Curriculum - Sathya Sai School Chatsworth | Comprehensive Learning Programs',
        'description' => 'Discover our comprehensive curriculum that balances academic rigor with character development. Integrated learning approach based on Sri Sathya Sai educational principles.',
        'keywords' => 'school curriculum, educational programs, integrated learning, character education, academic subjects, Sri Sathya Sai curriculum',
        'og_type' => 'article'
    ],
    'vacancy' => [
        'title' => 'Career Opportunities - Sathya Sai School Chatsworth | Teaching Positions',
        'description' => 'Join our dedicated team of educators at Sathya Sai School Chatsworth. Current teaching vacancies and career opportunities in value-based education.',
        'keywords' => 'teaching jobs, school vacancies, educator positions, career opportunities, Sathya Sai School jobs, teaching careers Chatsworth',
        'og_type' => 'article'
    ],
    'year-planner' => [
        'title' => 'Academic Calendar - Sathya Sai School Chatsworth | Year Planner',
        'description' => 'View our academic calendar and year planner for important dates, events, and school activities at Sathya Sai School Chatsworth.',
        'keywords' => 'academic calendar, school calendar, year planner, school events, important dates, academic year, school schedule',
        'og_type' => 'article'
    ],
    'blog' => [
        'title' => 'News & Updates - Sathya Sai School Chatsworth | School Blog',
        'description' => 'Stay updated with the latest news, events, and achievements from Sathya Sai School Chatsworth. Read about our educational journey and community activities.',
        'keywords' => 'school news, school blog, educational updates, school events, student achievements, community activities, Sathya Sai School news',
        'og_type' => 'blog'
    ]
];

// Get SEO data for current page
function get_seo_data(string $page): array {
    global $seo_config, $seo_defaults;
    
    return array_merge($seo_defaults, $seo_config[$page] ?? []);
}

// Generate canonical URL
function get_canonical_url(): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    
    // Remove query parameters for canonical URL
    $uri = strtok($uri, '?');
    
    return $protocol . $host . $uri;
}

// Generate structured data for organization
function get_organization_schema(): string {
    return json_encode([
        "@context" => "https://schema.org",
        "@type" => "EducationalOrganization",
        "name" => "Sathya Sai School Chatsworth",
        "alternateName" => "Sathya Sai School",
        "url" => "https://www.saischoolchats.co.za",
        "logo" => "https://www.saischoolchats.co.za/assets/images/logo.png",
        "description" => "A value-based educational institution offering holistic development through Sri Sathya Sai Educare principles.",
        "address" => [
            "@type" => "PostalAddress",
            "addressLocality" => "Chatsworth",
            "addressRegion" => "KwaZulu-Natal",
            "addressCountry" => "South Africa"
        ],
        "contactPoint" => [
            "@type" => "ContactPoint",
            "telephone" => "+27-31-xxx-xxxx",
            "contactType" => "customer service",
            "email" => "contact@saischoolchats.co.za"
        ],
        "sameAs" => [
            "https://www.facebook.com/SathyaSaiSchoolChatsworth",
            "https://www.instagram.com/saischoolchats"
        ]
    ], JSON_UNESCAPED_SLASHES);
} 