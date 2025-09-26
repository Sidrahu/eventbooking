<section class="hero-section">
    <div class="container">
        <h1 class="display-4">Best Event Planner</h1>
        <p class="lead">Manage and explore upcoming events with ease.</p>
        <div class="button-group">
            <a href="#contact" class="btn btn-primary">Contact Us</a>
            <a href="#about" class="btn btn-secondary">About Us</a>
        </div>
    </div>
</section>


<!-- Upcoming Events Section -->
<section id="events" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Upcoming Events</h2>
        <div class="row">
            @if($events->count() > 0)
                @foreach($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card event-card shadow-sm">
                        <img src="{{ $event->image_url }}" class="card-img-top" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <a href="{{ route('events.show', $event->id) }}" class="btn small-btn mt-3">Learn More</a>

             </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>No upcoming events available at the moment.</p>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $events->links() }}
        </div>
    </div>
</section>

<section id="booking-section" class="py-0">
    <div class="container text-end">
        <a href="#" class="btn btn-success" id="book-now-btn">Book Now</a>
    </div>
</section>

<!-- Booking Form -->
<div id="booking-form" style="display: none;">
    <form method="POST" action="{{ route('bookings.store') }}" class="bg-light p-4 rounded shadow">
        @csrf
        <h3 class="text-center mb-4">Booking Form</h3>
        
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your full name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
        </div>

        <div class="mb-3">
            <label for="event_id" class="form-label">Select Event</label>
            <select class="form-select" id="event_id" name="event_id" required>
                <option value="" selected disabled>Select an event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>

        

        <div class="mb-3">
            <label for="message" class="form-label">Message (Optional)</label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Any special requests or comments"></textarea>
        </div>

        <button type="submit" class="btn btn-success w-100">Confirm Booking</button>
    </form>
</div>


 
<script>
    document.getElementById('book-now-btn').addEventListener('click', function(event) {
        event.preventDefault(); 
        document.getElementById('booking-form').style.display = 'block'; 
        this.style.display = 'none'; 
    });
</script>

<section class="blog section" id="blog-section">
<div class="container py-5">
 
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
        <h4 class="text-primary">Our Blog</h4>
        <h1 class="display-4 mb-4">Electricity News & Updates</h1>
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, deserunt provident ab voluptates rerum eaque eum magni autem atque in minus laboriosam corrupti deleniti voluptatibus rem reiciendis modi veniam animi?</p>
    </div>

    <!-- Blog Posts -->
    <div class="row g-4 w-100">
        @foreach($posts as $post)  
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="single-news">
                <div class="news-head">
                    <img src="{{ asset('dist/assets/img/post10.jpg') }}" alt="Post Image" 
                         style="width: 330%; height: 300px; object-fit: cover; transition: transform 0.5s ease, opacity 0.5s ease;" 
                         onmouseover="this.style.transform='scale(1.1)'; this.style.opacity='0.8';"
                         onmouseout="this.style.transform='scale(1)'; this.style.opacity='1';">
                </div>
    
                <div class="news-body bg-light" style="padding: 20px; width: 330%; margin-bottom: 0;">
                    <div class="news-content">
                        <div class="date"><i class="fa fa-calendar me-2"></i> {{ $post->created_at->format('F j, Y') }}</div>
                        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                        <p class="text" style="font-size: 18px;">{{ Str::limit($post->body, 100) }}</p>
                        <a class="btn btn-primary py-2 px-4" href="{{ route('posts.show', $post->id) }}">View Post</a>
                    </div>
                </div>
                
            </div>
        </div>
    @endforeach
    
    </div>
</div>
</section> 


<!-- About Section -->
<section id="about" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; font-weight: bold;">About Us</h2>
        <p class="text-center mb-5" style="font-family: 'Arial', sans-serif; font-size: 1.2rem; line-height: 1.6;">
            At Event Manager, we believe in the power of connections. Our platform serves as a comprehensive hub for discovering, organizing, and managing events that create meaningful experiences.
        </p>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-3 border rounded shadow-sm">
                    <h3 class="mb-3" style="font-family: 'Helvetica Neue', sans-serif; font-weight: bold; font-size: 1.5rem;">Our Mission</h3>
                    <p style="font-family: 'Arial', sans-serif; font-size: 1rem; line-height: 1.5;">
                        To empower individuals and organizations by providing a seamless platform to manage events, fostering connections that enhance community engagement.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-3 border rounded shadow-sm">
                    <h3 class="mb-3" style="font-family: 'Helvetica Neue', sans-serif; font-weight: bold; font-size: 1.5rem;">Our Vision</h3>
                    <p style="font-family: 'Arial', sans-serif; font-size: 1rem; line-height: 1.5;">
                        To be the leading event management platform, known for innovation, user satisfaction, and creating unforgettable experiences for our clients.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-3 border rounded shadow-sm">
                    <h3 class="mb-3" style="font-family: 'Helvetica Neue', sans-serif; font-weight: bold; font-size: 1.5rem;">Our Values</h3>
                    <p style="font-family: 'Arial', sans-serif; font-size: 1rem; line-height: 1.5;">
                        Integrity, Excellence, Innovation, and Community. We are committed to upholding these values in every event we manage.
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#contact" class="btn btn-primary btn-lg">Get in Touch</a>
        </div>
    </div>
</section>
<!-- Map Section -->
<section id="map" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Location</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="p-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-image: url('{{ asset('dist/assets/img/sam.webp') }}'); background-size: cover; border-radius: 10px; height: 100%; text-align: center;">
                    <h3 style="color: white;">Visit Us</h3>
                    <p style="color: white;">123 Event Street, Event City, Country</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px; height: 100%;">
                    <div class="map-container" style="height: 400px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345096316!2d144.95373631590492!3d-37.81627974202143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5770c1d0fbbd3f9!2sMelbourne%20CBD!5e0!3m2!1sen!2sau!4v1607897045677!5m2!1sen!2sau" 
                            width="100%" 
                            height="100%" 
                            frameborder="0" 
                            style="border:0;" 
                            allowfullscreen="" 
                            aria-hidden="false" 
                            tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Contact Us</h2>
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

   
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Phone Number</h5>
                        <p class="card-text">+123 456 7890</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Company Address</h5>
                        <p class="card-text">123 Business St, City, Country</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">info@eventmanager.com</h6>
                        <p class="card-text">Event Management System</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          
            <div class="col-md-6">
                <img src="dist/assets/img/author3.jpg" alt="Contact Us Image" class="img-fluid">
            </div>

         
            <div class="col-md-6">
                <!-- Contact Form -->
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
 
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelector('.hero-section').addEventListener('click', function(e) {
    
        if (e.target.tagName !== 'A') {
          
            const contactSection = document.getElementById('contact');
            const aboutSection = document.getElementById('about');
       
            if (window.innerHeight < contactSection.getBoundingClientRect().top) {
                contactSection.scrollIntoView({ behavior: 'smooth' });
            } else {
                aboutSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>

