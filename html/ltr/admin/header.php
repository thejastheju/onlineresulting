<?php
session_start();
include('dbconnect.php');
$number = $_SESSION['name'];
$sql = mysqli_query($con,"SELECT * from admin_regester_login where admin_mobile = '$number'");
foreach ($sql as $sql) 
{
  $_SESSION['name'] = $sql['admin_name'];
}
?>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto"><a class="navbar-brand" href=""><img class="brand-logo" alt="stack admin logo" src="../../../app-assets/images/logo/stack-logo-light.png">
                <h2 class="brand-text">VVET</h2></a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <!-- <div class="navbar-container content"> -->
          <!-- <div class="collapse navbar-collapse" id="navbar-mobile"> -->
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><i class="<!-- ft-user -->ft-menu font-large-1"></i></span><span class="user-name"><strong style="text-transform: capitalize;"><?php echo $_SESSION['name']; ?></strong></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a><!-- <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a> -->
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                </div>
              </li>&nbsp&nbsp&nbsp&nbsp
            </ul>
          <!-- </div> -->
        <!-- </div> -->
      </div>
    </nav>
