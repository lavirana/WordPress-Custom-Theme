<?php
/**
 * Template Name: Contact Page
 * Description: A premium 2-column contact layout featuring a form and Google Map.
 * Author: Ashish Rana
 * Author URI: https://thetechinfo.net/
 * Version: 1.0
 */
get_header(); ?>

<section class="contact-hero">
    <h1>Get In Touch</h1>
    <p>Have questions? We love to hear from you. Reach out to us today.</p>
</section>

<div class="contact-wrapper">
    
    <div class="contact-form-column">
        
        <div class="info-grid">
            <div class="info-card">
                <h4>Our Address</h4>
                <p>IYA International Campus,<br>Near Main Technical Hub, India</p>
            </div>
            <div class="info-card">
                <h4>Contact Details</h4>
                <p><strong>Email:</strong> info@iyainternational.com</p>
                <p><strong>Phone:</strong> +91 98765 43210</p>
            </div>
        </div>

        <form action="#" method="POST" class="custom-contact-form" onsubmit="event.preventDefault(); alert('Learning Mode: Form submitted successfully!');">
            <h3>Send a Message</h3>
            
            <div class="form-group">
                <label for="user_name">Full Name</label>
                <input type="text" id="user_name" name="name" placeholder="John Doe" required>
            </div>

            <div class="form-group">
                <label for="user_email">Email Address</label>
                <input type="email" id="user_email" name="email" placeholder="john@example.com" required>
            </div>

            <div class="form-group">
                <label for="user_msg">Your Message</label>
                <textarea id="user_msg" name="message" rows="5" placeholder="How can we help you?" required></textarea>
            </div>

            <button type="submit" class="submit-form-btn">Send Message</button>
        </form>
    </div>

    <div class="contact-map-column">
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3395.776100236402!2d75.6416174!3d31.6604646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDM5JzM3LjciTiA3NcKwMzgnMjkuOCJF!5e0!3m2!1sen!2sin!4v1710000000000!5m2!1sen!2sin" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

</div>

<?php get_footer(); ?>