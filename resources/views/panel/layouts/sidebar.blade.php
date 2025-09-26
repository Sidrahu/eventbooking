<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">  
    <div class="sidebar-brand">  
         <a href="./index.html" class="brand-link">   <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> 
          <span class="brand-text fw-light">AdminLTE 4</span> 
          </a>  
        </div> 
    <div class="sidebar-wrapper">
        <nav class="mt-2">  
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('frontend.events') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Events
                          
                        </p>
                    </a>
                    
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('bookings.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-bookmark-fill"></i>
                        <p>
                            Bookings
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item">
                    <a href="{{ route('venues.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-house-fill"></i>
                        <p>
                            Venues
                        
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link active">
                        <i class="fas fa-phone"></i>
                        <p>
                            Contact Us 
                        
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-person-fill"></i>
                        <p>
                            Users
                          
                        </p>
                    </a>
                   
                </li>
                
                
                <li class="nav-item">
                    <a href="{{ route('reports.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-graph-up-arrow"></i>
                        <p>
                            Reports
                         
                        </p>
                    </a>
                    
                </li>
                
            </ul>  
        </nav>
    </div> 
</aside>