<?php
declare(strict_types=1);

require_once 'includes/config.php';
require_once 'includes/header.php';

/**
 * Calculate days remaining until an event
 * 
 * @param string|null $eventDate Event date in Y-m-d format
 * @return int|null Days remaining or null if event has passed
 */
function getDaysRemaining(?string $eventDate): ?int {
    if (!$eventDate) {
        return null;
    }
    
    try {
        $today = new DateTime();
        $today->setTime(0, 0, 0); // Reset time part
        $event = new DateTime($eventDate);
        $event->setTime(0, 0, 0); // Reset time part
        
        if ($event < $today) {
            return null; // Event has passed
        }
        
        return $today->diff($event)->days;
    } catch (Exception $e) {
        error_log('Days remaining calculation error: ' . $e->getMessage());
        return null;
    }
}

/**
 * Check if date is in current month
 * 
 * @param string|null $date Date in Y-m-d format
 * @return bool
 */
function isCurrentMonth(?string $date): bool {
    if (!$date) {
        return false;
    }
    try {
        $eventDate = new DateTime($date);
        $currentDate = new DateTime();
        return $eventDate->format('Y-m') === $currentDate->format('Y-m');
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Format date range for display
 * 
 * @param string $dateStr Date string that might contain a range
 * @return array Start date and end date in Y-m-d format
 */
function parseDateRange(string $dateStr): array {
    try {
        // Remove any spaces around hyphens
        $dateStr = preg_replace('/\s*-\s*/', '-', $dateStr);
        
        // Split on hyphen if it exists
        $dates = explode('-', $dateStr);
        
        $year = '2025'; // Default year from the planner
        
        if (count($dates) === 2) {
            // Handle date range
            $start = DateTime::createFromFormat('d/m/Y', trim($dates[0]) . '/' . $year);
            $end = DateTime::createFromFormat('d/m/Y', trim($dates[1]) . '/' . $year);
            
            if ($start === false || $end === false) {
                return [null, null];
            }
            
            return [
                $start->format('Y-m-d'),
                $end->format('Y-m-d')
            ];
        } else {
            // Single date
            $date = DateTime::createFromFormat('d/m/Y', trim($dateStr) . '/' . $year);
            
            if ($date === false) {
                return [null, null];
            }
            
            return [
                $date->format('Y-m-d'),
                null
            ];
        }
    } catch (Exception $e) {
        error_log('Date parsing error: ' . $e->getMessage());
        return [null, null];
    }
}

/**
 * Check if date has passed
 * 
 * @param string|null $date Date in Y-m-d format
 * @return bool
 */
function hasDatePassed(?string $date): bool {
    if (!$date) {
        return false;
    }
    try {
        $eventDate = new DateTime($date);
        $today = new DateTime();
        $eventDate->setTime(0, 0, 0);
        $today->setTime(0, 0, 0);
        return $eventDate < $today;
    } catch (Exception $e) {
        return false;
    }
}

?>

<main class="year-planner-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Year Planner 2025</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= SITE_URL ?>">Home</a></li>
                            <li class="breadcrumb-item active">Year Planner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- First Term -->
    <section class="term-section py-5">
        <div class="container">
            <div class="term-header mb-4">
                <h2 class="term-title">First Term</h2>
                <div class="term-details text-muted">
                    <p>Duration: 13 (15) January – 28 March 2025</p>
                    <p>Number of Weeks: 11 | Public Holidays: 1 | School Days: 52 (54)</p>
                </div>
            </div>

            <!-- January -->
            <div class="month-section mb-4">
                <h3 class="month-title">January</h3>
                <div class="row">
                    <?php
                    $januaryEvents = [
                        [
                            'date' => '13/01/2025',
                            'title' => 'School Re-opens',
                            'description' => 'School re-opens for educators/ Admission of learners & staff Development meeting'
                        ],
                        [
                            'date' => '20-24/01/2025',
                            'title' => 'Baseline Test',
                            'description' => ''
                        ],
                        [
                            'date' => '27-31/01/2025',
                            'title' => 'DOE Workshops',
                            'description' => 'Social Science, Mathematics & Afrikaans'
                        ]
                    ];

                    foreach ($januaryEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">JAN</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- February -->
            <div class="month-section mb-4">
                <h3 class="month-title">February</h3>
                <div class="row">
                    <?php
                    $februaryEvents = [
                        [
                            'date' => '01/02/2025',
                            'title' => 'Parent Meeting',
                            'description' => ''
                        ],
                        [
                            'date' => '14/02/2025',
                            'title' => 'Prefect Induction',
                            'description' => ''
                        ],
                        [
                            'date' => '26/02/2025',
                            'title' => 'Maha Shivaratri',
                            'description' => ''
                        ]
                    ];

                    foreach ($februaryEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">FEB</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- March -->
            <div class="month-section">
                <h3 class="month-title">March</h3>
                <div class="row">
                    <?php
                    $marchEvents = [
                        [
                            'date' => '17-20/03/2025',
                            'title' => 'School-based Assessment',
                            'description' => 'Continuous assessment period'
                        ],
                        [
                            'date' => '21/03/2025',
                            'title' => 'Human Rights Day',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '28/03/2025',
                            'title' => 'Term End',
                            'description' => 'School closes for the first term'
                        ]
                    ];

                    foreach ($marchEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">MAR</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Second Term -->
    <section class="term-section py-5">
        <div class="container">
            <div class="term-header mb-4">
                <h2 class="term-title">Second Term</h2>
                <div class="term-details text-muted">
                    <p>Duration: 08 April – 27 June 2025</p>
                    <p>Number of Weeks: 12 | Public Holidays: 5+3 | School Days: 51</p>
                </div>
            </div>

            <!-- April -->
            <div class="month-section mb-4">
                <h3 class="month-title">April</h3>
                <div class="row">
                    <?php
                    $aprilEvents = [
                        [
                            'date' => '08/04/2025',
                            'title' => 'School Re-opens',
                            'description' => 'Learners & Educators report to school'
                        ],
                        [
                            'date' => '12/04/2025',
                            'title' => 'Hanuman Jayanti',
                            'description' => ''
                        ],
                        [
                            'date' => '16/04/2025',
                            'title' => 'Parent Meeting',
                            'description' => 'School Parent Meeting'
                        ],
                        [
                            'date' => '18/04/2025',
                            'title' => 'Good Friday',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '21/04/2025',
                            'title' => 'Family Day',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '24/04/2025',
                            'title' => 'Aradhana Mothash',
                            'description' => "Swami's Remembrance Day"
                        ],
                        [
                            'date' => '27/04/2025',
                            'title' => 'Freedom Day',
                            'description' => 'Public Holiday'
                        ]
                    ];

                    foreach ($aprilEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">APR</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- May -->
            <div class="month-section mb-4">
                <h3 class="month-title">May</h3>
                <div class="row">
                    <?php
                    $mayEvents = [
                        [
                            'date' => '01/05/2025',
                            'title' => 'Workers Day',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '06/05/2025',
                            'title' => 'Easwaramma Day',
                            'description' => ''
                        ],
                        [
                            'date' => '31/05/2025',
                            'title' => 'Annual Athletic Meeting',
                            'description' => ''
                        ]
                    ];

                    foreach ($mayEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">MAY</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- June -->
            <div class="month-section">
                <h3 class="month-title">June</h3>
                <div class="row">
                    <?php
                    $juneEvents = [
                        [
                            'date' => '02/06/2025',
                            'title' => 'Paper Due',
                            'description' => ''
                        ],
                        [
                            'date' => '15/06/2025',
                            'title' => 'Talk on Youth Day',
                            'description' => ''
                        ],
                        [
                            'date' => '16/06/2025',
                            'title' => 'Youth Day',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '17-23/06/2025',
                            'title' => 'June Examinations',
                            'description' => ''
                        ],
                        [
                            'date' => '26/06/2025',
                            'title' => 'Learner Reports',
                            'description' => ''
                        ],
                        [
                            'date' => '27/06/2025',
                            'title' => 'Term End',
                            'description' => 'School closes for Term 2'
                        ]
                    ];

                    foreach ($juneEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">JUN</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Third Term -->
    <section class="term-section py-5">
        <div class="container">
            <div class="term-header mb-4">
                <h2 class="term-title">Third Term</h2>
                <div class="term-details text-muted">
                    <p>Duration: 22 July – 27 September 2025</p>
                    <p>Number of Weeks: 10 | Public Holidays: 2 | School Days: 48</p>
                </div>
            </div>

            <!-- July -->
            <div class="month-section mb-4">
                <h3 class="month-title">July</h3>
                <div class="row">
                    <?php
                    $julyEvents = [
                        [
                            'date' => '22/07/2025',
                            'title' => 'School Re-opens',
                            'description' => 'School re-opens for Term 3'
                        ],
                        [
                            'date' => '24/07/2025',
                            'title' => 'Guru Purnima',
                            'description' => ''
                        ]
                    ];

                    foreach ($julyEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">JUL</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- August -->
            <div class="month-section mb-4">
                <h3 class="month-title">August</h3>
                <div class="row">
                    <?php
                    $augustEvents = [
                        [
                            'date' => '09/08/2025',
                            'title' => 'National Women\'s Day',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '15/08/2025',
                            'title' => 'Krishna Janmashtami',
                            'description' => ''
                        ],
                        [
                            'date' => '23/08/2025',
                            'title' => 'Ganesh Chaturthi',
                            'description' => ''
                        ],
                        [
                            'date' => '31/08/2025',
                            'title' => 'Parent Meeting',
                            'description' => ''
                        ]
                    ];

                    foreach ($augustEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">AUG</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- September -->
            <div class="month-section">
                <h3 class="month-title">September</h3>
                <div class="row">
                    <?php
                    $septemberEvents = [
                        [
                            'date' => '16-20/09/2025',
                            'title' => 'School-based Assessment',
                            'description' => 'Continuous assessment period'
                        ],
                        [
                            'date' => '24/09/2025',
                            'title' => 'Heritage Day',
                            'description' => 'Public Holiday'
                        ],
                        [
                            'date' => '26/09/2025',
                            'title' => 'Learner Reports',
                            'description' => ''
                        ],
                        [
                            'date' => '27/09/2025',
                            'title' => 'Term End',
                            'description' => 'School closes for Term 3'
                        ]
                    ];

                    foreach ($septemberEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">SEP</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Fourth Term -->
    <section class="term-section py-5">
        <div class="container">
            <div class="term-header mb-4">
                <h2 class="term-title">Fourth Term</h2>
                <div class="term-details text-muted">
                    <p>Duration: 08 October – 11 December 2025</p>
                    <p>Number of Weeks: 10 | Public Holidays: 0 | School Days: 47</p>
                </div>
            </div>

            <!-- October -->
            <div class="month-section mb-4">
                <h3 class="month-title">October</h3>
                <div class="row">
                    <?php
                    $octoberEvents = [
                        [
                            'date' => '08/10/2025',
                            'title' => 'School Re-opens',
                            'description' => 'School re-opens for Term 4'
                        ],
                        [
                            'date' => '20/10/2025',
                            'title' => 'Diwali',
                            'description' => ''
                        ]
                    ];

                    foreach ($octoberEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">OCT</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- November -->
            <div class="month-section mb-4">
                <h3 class="month-title">November</h3>
                <div class="row">
                    <?php
                    $novemberEvents = [
                        [
                            'date' => '11/11/2025',
                            'title' => 'Ladies Day',
                            'description' => ''
                        ],
                        [
                            'date' => '18-22/11/2025',
                            'title' => 'Final Examinations',
                            'description' => ''
                        ],
                        [
                            'date' => '23/11/2025',
                            'title' => 'Birthday Celebrations',
                            'description' => "Sri Sathya Sai Baba's Birthday"
                        ]
                    ];

                    foreach ($novemberEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">NOV</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- December -->
            <div class="month-section">
                <h3 class="month-title">December</h3>
                <div class="row">
                    <?php
                    $decemberEvents = [
                        [
                            'date' => '09/12/2025',
                            'title' => 'Learner Reports',
                            'description' => ''
                        ],
                        [
                            'date' => '10/12/2025',
                            'title' => 'Prize Giving',
                            'description' => 'Annual Prize Giving Ceremony'
                        ],
                        [
                            'date' => '11/12/2025',
                            'title' => 'Term End',
                            'description' => 'School closes for Term 4'
                        ]
                    ];

                    foreach ($decemberEvents as $event) {
                        [$startDate, $endDate] = parseDateRange($event['date']);
                        $isPassed = hasDatePassed($startDate);
                        $dates = explode('-', explode('/', $event['date'])[0]);
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="event-card <?= $isPassed ? 'event-passed' : '' ?>">
                                <div class="date-box">
                                    <div class="date-number"><?= $dates[0] ?></div>
                                    <div class="date-month">DEC</div>
                                    <?php
                                    if (isCurrentMonth($startDate)) {
                                        $daysRemaining = getDaysRemaining($startDate);
                                        if ($daysRemaining !== null) {
                                            echo '<span class="countdown">' . $daysRemaining . ' days left</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="event-content">
                                    <h4><?= htmlspecialchars($event['title']) ?></h4>
                                    <?php if ($event['description']): ?>
                                        <p><?= htmlspecialchars($event['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.year-planner-page {
    background-color: #fff;
}

.term-section {
    background-color: #fff;
}

.term-header {
    margin-bottom: 2rem;
}

.term-title {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.month-title {
    background-color: #0d6efd;
    color: white;
    padding: 0.75rem 1.5rem;
    margin-bottom: 1.5rem;
    font-size: 1.25rem;
    border-radius: 0;
}

.event-card {
    display: flex;
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 4px;
    overflow: hidden;
    height: 100%;
}

.date-box {
    background-color: #1e3c72;
    color: white;
    padding: 1.5rem;
    min-width: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.date-number {
    font-size: 2rem;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 0.25rem;
}

.date-month {
    font-size: 0.875rem;
    text-transform: uppercase;
}

.event-content {
    padding: 1.5rem;
    flex: 1;
}

.event-content h4 {
    color: #1e3c72;
    margin: 0 0 0.5rem 0;
    font-size: 1.1rem;
    font-weight: 600;
}

.event-content p {
    color: #666;
    margin: 0;
    font-size: 0.9rem;
    line-height: 1.5;
}

.countdown {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.8rem;
    margin-top: 0.5rem;
}

.event-passed {
    opacity: 0.6;
}

.event-passed .date-box {
    background-color: #6c757d;
}

.event-passed h4 {
    color: #6c757d;
}

@media (max-width: 768px) {
    .event-card {
        flex-direction: row;
    }
    
    .date-box {
        padding: 1rem;
        min-width: 100px;
    }
    
    .date-number {
        font-size: 1.75rem;
    }
    
    .event-content {
        padding: 1rem;
    }
}
</style>

<?php
require_once 'includes/footer.php';
?> 