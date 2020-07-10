<nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>
                       <div class="mobile-search">
                           <div class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="Enter Keyword" size="20">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a href="index.html">
                           <img class="img-fluid" src="../assets/images/applied-logo.png" alt="Theme-Logo" />
                       </a>
                       <a class="mobile-options">
                           <i class="ti-more"></i>
                       </a>
                   </div>

                   <div class="navbar-container container-fluid">
                       <ul class="nav-left">
                           <li>
                               <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                           </li>
                           <li>
							<p align ="center"><h5 align="center">
							<font color="#CCCCFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //echo $compname;?></font></h5></p>
                           </li>
                       </ul>
                       <ul class="nav-right">
                           
                           
                           <li class="user-profile header-notification">
                               <a href="#!">
                                   <img src="../assets/images/pic.jpg" class="img-radius" alt="User-Profile-Image">
                                   <span><?php //echo $staffname;?></span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li class=" ">
                                            <a href="javascript:void(0);" onclick ="addForms('<?php echo 'User Profile';?>')">
                                                <span class="pcoded-micon"><i class="ti-user"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">User Profile</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                   <input type="hidden" class="form-control" id ="id" name ="id" value ="<?php //echo $id;?>">
                                   <li>
                                       <a href="auth-lock-screen">
                                           <i class="ti-lock"></i> Lock Screen
                                       </a>
                                   </li>
                                   <li>
                                       <a href="../controller/logout.php">
                                       <i class="ti-layout-sidebar-left"></i> Logout
                                   </a>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>