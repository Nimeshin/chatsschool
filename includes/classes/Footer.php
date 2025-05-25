<?php
declare(strict_types=1);

namespace SathyaSaiSchool;

class Footer {
    private Menu $quickLinksMenu;
    private array $contactInfo;
    private array $socialLinks;
    private array $schoolHours;

    public function __construct()
    {
        $this->quickLinksMenu = new Menu();
        $this->initializeQuickLinks();
        $this->initializeContactInfo();
        $this->initializeSocialLinks();
        $this->initializeSchoolHours();
    }

    private function initializeQuickLinks(): void
    {
        $this->quickLinksMenu
            ->addItem('about.php', 'About Us')
            ->addItem('curriculum.php', 'Detailed Curriculum')
            ->addItem('vacancy.php', 'Vacancies')
            ->addItem('admissions.php', 'Admissions')
            ->addItem('year-planner.php', 'Year Planner')
            ->addItem('contact.php', 'Contact');
    }

    private function initializeContactInfo(): void
    {
        $this->contactInfo = [
            'address' => [
                'icon' => 'fa-location-dot',
                'lines' => [
                    '98 Powerline Street',
                    'Westcliff, Chatsworth',
                    'Durban, 4030'
                ]
            ],
            'phone' => [
                'icon' => 'fa-phone',
                'number' => '031 402 1740',
                'link' => 'tel:0314021740'
            ],
            'email' => [
                'icon' => 'fa-envelope',
                'address' => 'contact@saischoolchats.co.za',
                'link' => 'mailto:contact@saischoolchats.co.za'
            ]
        ];
    }

    private function initializeSocialLinks(): void
    {
        $this->socialLinks = [
            'facebook' => ['icon' => 'fa-facebook', 'url' => '#'],
            'twitter' => ['icon' => 'fa-twitter', 'url' => '#'],
            'instagram' => ['icon' => 'fa-instagram', 'url' => '#'],
            'youtube' => ['icon' => 'fa-youtube', 'url' => '#']
        ];
    }

    private function initializeSchoolHours(): void
    {
        $this->schoolHours = [
            'days' => 'Monday - Friday',
            'hours' => '7:30 AM - 2:30 PM'
        ];
    }

    public function render(): string
    {
        ob_start();
        ?>
        <footer class="site-footer bg-light py-5 mt-5">
            <div class="container">
                <div class="row">
                    <!-- Contact Information -->
                    <div class="col-lg-4 mb-4">
                        <h5 class="mb-4">Contact Us</h5>
                        <div class="contact-info">
                            <?php foreach ($this->contactInfo as $type => $info): ?>
                                <div class="d-flex mb-3">
                                    <i class="fa-solid <?= $info['icon'] ?> me-3 mt-1 text-primary"></i>
                                    <div>
                                        <?php if ($type === 'address'): ?>
                                            <p class="mb-0">
                                                <?= implode('<br>', array_map('htmlspecialchars', $info['lines'])) ?>
                                            </p>
                                        <?php else: ?>
                                            <a href="<?= htmlspecialchars($info['link']) ?>" class="text-decoration-none">
                                                <?= htmlspecialchars($type === 'phone' ? $info['number'] : $info['address']) ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="col-lg-4 mb-4">
                        <h5 class="mb-4">Quick Links</h5>
                        <?= $this->quickLinksMenu->render() ?>
                    </div>
                    
                    <!-- Connect With Us -->
                    <div class="col-lg-4 mb-4">
                        <h5 class="mb-4">Connect With Us</h5>
                        <div class="social-links mb-4">
                            <?php foreach ($this->socialLinks as $platform => $data): ?>
                                <a href="<?= htmlspecialchars($data['url']) ?>" class="social-link me-3" title="<?= ucfirst($platform) ?>">
                                    <i class="fa-brands <?= $data['icon'] ?> fa-2x"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="school-hours">
                            <h6 class="text-primary mb-3">
                                <i class="fa-regular fa-clock me-2"></i>School Hours
                            </h6>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa-regular fa-calendar-days me-2 text-primary"></i>
                                <span><?= htmlspecialchars($this->schoolHours['days']) ?></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-clock me-2 text-primary"></i>
                                <span><?= htmlspecialchars($this->schoolHours['hours']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="row mt-4 pt-4 border-top">
                    <div class="col-12 text-center">
                        <p class="mb-0">&copy; <?= date('Y') ?> <?= htmlspecialchars(SITE_NAME) ?>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
        <?php
        return ob_get_clean();
    }
} 