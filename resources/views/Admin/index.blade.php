<!DOCTYPE html>
<html lang="en">
 

<!--begin::Head-->
@include('panel.layouts.header')
 <!--end::Head-->  

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">  
    <div class="app-wrapper">
        
        <!--begin::Header-->
        @include('panel.layouts.navbar')
         <!--end::Header--> 
        <div class="container">
            @yield('content')  
        </div>


    <!--begin::Sidebar-->
    @include('panel.layouts.sidebar')
     <!--end::Sidebar-->  
    
                             
                      
       
    </div>  
    
    
    <!--begin::Script--> 
    @include('panel.layouts.script')
   <!--end::Script-->
</body><!--end::Body-->

</html>