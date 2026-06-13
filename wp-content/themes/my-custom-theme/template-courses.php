<?php
/**
 * Template Name: Courses Page
 * Description: A premium 3-column academy layout displaying courses with duration badges.
 * Author: Ashish Rana
 * Author URI: https://thetechinfo.net/
 * Version: 1.0
 */
get_header(); ?>

<!-- 1. Hero Banner Section -->
<section class="course-hero">
    <h1>Our Professional Courses</h1>
    <p>Upgrade your technical skill set with industry-recognized training programs.</p>
</section>

<!-- 2. Fast Stats Bar Element -->
<div class="stats-bar-container">
    <div class="stat-item"><strong>15+</strong> Professional Modules</div>
    <div class="stat-item"><strong>5,000+</strong> Trained Students</div>
    <div class="stat-item"><strong>100%</strong> Practical Lab Training</div>
</div>

<!-- 3. Dynamic Course Grid Section -->
<div class="course-grid-container">
    
    <!-- Card 1: Web Development -->
    <div class="course-card">
        <div class="course-card-header">
            <span class="duration-badge">6 Months</span>
        </div>
        <div class="course-card-body">
            <h3>Advanced Web Development</h3>
            <p>Master full-stack programming tools including PHP, Laravel architectures, and complex relational databases from scratch.</p>
            <div class="course-meta">
                <span><strong>Eligibility:</strong> 10th / 12th / Grad</span>
            </div>
            <a href="<?php echo home_url('/enquiry'); ?>" class="enroll-btn">Enquire Now</a>
        </div>
    </div>

    <!-- Card 2: Frontend Frameworks -->
    <div class="course-card">
        <div class="course-card-header framework-bg">
            <span class="duration-badge">3 Months</span>
        </div>
        <div class="course-card-body">
            <h3>Frontend Technologies</h3>
            <p>Build modern single-page web programs using pure JavaScript scripting fundamentals, asynchronous APIs, and interactive UI frameworks.</p>
            <div class="course-meta">
                <span><strong>Eligibility:</strong> Basic IT Knowledge</span>
            </div>
            <a href="<?php echo home_url('/enquiry'); ?>" class="enroll-btn">Enquire Now</a>
        </div>
    </div>

    <!-- Card 3: Basic Digital Literacy -->
    <div class="course-card">
        <div class="course-card-header basic-bg">
            <span class="duration-badge">2 Months</span>
        </div>
        <div class="course-card-body">
            <h3>Computer Applications (DCA)</h3>
            <p>Gain absolute command over structural documentation, automated spreadsheets, professional emails, and day-to-day computing logic.</p>
            <div class="course-meta">
                <span><strong>Eligibility:</strong> Anyone Interested</span>
            </div>
            <a href="<?php echo home_url('/enquiry'); ?>" class="enroll-btn">Enquire Now</a>
        </div>
    </div>

</div>

<?php get_footer(); ?>