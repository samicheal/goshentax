<nav class="navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
       </button>
   <h1> <a class="navbar-brand" href="{{ route('dashboard') }}">GoshenTax</a></h1>         
      </div>
    <div class=" border-bottom">

  <!-- Brand and toggle get grouped for better mobile display -->
  <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="drop-men" >
       <ul class=" nav_1">
          
           <li class="dropdown at-drop">
             <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe"></i> <span class="number">3</span></a>
             <ul class="dropdown-menu menu1 " role="menu">
               <li><a href="#">
              
                   <div class="user-new">
                   <p>New user registered</p>
                   <span>40 seconds ago</span>
                   </div>
                   <div class="user-new-left">
               
                   <i class="fa fa-user-plus"></i>
                   </div>
                   <div class="clearfix"> </div>
                   </a></li>
               <li><a href="#">
                   <div class="user-new">
                   <p>New Advert from LIRS added</p>
                   <span>3 minutes ago</span>
                   </div>
                   <div class="user-new-left">
               
                   <i class="fa fa-heart"></i>
                   </div>
                   <div class="clearfix"> </div>
               </a></li>
               <li><a href="#">
                   <div class="user-new">
                   <p>Oludare subscribed to 3 months</p>
                   <span>40 minutes ago</span>
                   </div>
                   <div class="user-new-left">
               
                   <i class="fa fa-times"></i>
                   </div>
                   <div class="clearfix"> </div>
               </a></li>
             </ul>
           </li>

           <!-- drop-down-for-userprofile-->
           <li class="dropdown">
               <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">{{ Auth::user()->email }}<i class="caret"></i></span><img src="{{ asset('images/in8.jpg') }}"></a>
               <ul class="dropdown-menu " role="menu">
                   <li><a href="#"><i class="fa fa-user"></i>edit profile.</a></li>
                   <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i>logout</a></li>
               </ul>
           </li>
           <!--// drop-down-for-userprofile-->
          
       </ul>
    </div><!-- /.navbar-collapse -->
   <div class="clearfix">

</div>

   <div class="navbar-default sidebar" role="navigation">
       <div class="sidebar-nav navbar-collapse">
       <ul class="nav" id="side-menu">
       
           <li>
               <a href="{{ route('dashboard') }}" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
           </li>
           
           <li>
               <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">News</span><span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                   <li><a href="{{ route('news.index') }}" class=" hvr-bounce-to-right"> <i class="fa fa-adjust nav_icon"></i>Create new News</a></li>
                   <li><a href="{{ route('news.manage') }}" class=" hvr-bounce-to-right"><i class="fa fa-calendar nav_icon"></i>Manage news posts</a></li>
   
              </ul>
           </li>
           
           <li>
               <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Adverts</span><span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                   <li><a href="{{ route('advert.create') }}" class=" hvr-bounce-to-right"> <i class="fa fa-music nav_icon"></i>Create new adverts</a></li>
                   <li><a href="{{ route('advert.manage') }}" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>Manage Adverts</a></li>

              </ul>
           </li>

           <li>
               <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Legislation</span><span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                   <li><a href="{{ route('legislation.create') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Create New Legislation</a></li>
                   <li><a href="{{ route('legislation.index') }}" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Manage Legislation</a></li>
              </ul>
           </li>

           <li>
               <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Notification</span><span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                   <li><a href="{{ route('notification.create') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>New Notification</a></li>
                   <li><a href="{{ route('notification.index') }}" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Manage Notifications</a></li>
              </ul>
           </li>

           @if(Auth::user()->role != "USER")
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Subscriber</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="newuser.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>New User</a></li>
                        <li><a href="manageusers.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Manage Users</a></li>
                    </ul>
                </li>
            
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Financial</a></li>
                        <li><a href="advertsfinancial.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Adverts</a></li>
                        <li><a href="usersfinancial.html" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Users</a></li>
                    </ul>
                </li>
            @endif

       </ul>
   </div>
   </div>
</nav>
<!--//endofnav-->