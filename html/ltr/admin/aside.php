<?php
include ('dbconnect.php');
$coun = mysqli_query($con,"SELECT * from admin_regester_login where admin_status = 'deactive'");
$row = mysqli_num_rows($coun);
?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header"><span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
      </li>
      <li class=" nav-item"><a href="dashbord.php"><!-- <i class="ft-home"> --></i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge badge-primary badge-pill float-right mr-2"><?php echo "$row"; ?></span></a></li>
      <li class=" nav-item"><a href="subjects.php"></i><span class="menu-title" data-i18n="">Subjects Entry</span></a></li>
      <!-- <li class=" nav-item"><a href=""></i><span class="menu-title" data-i18n="">Semistor</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="">1</a>
          </li>
          <li><a class="menu-item" href="">2</a>
          </li>
          <li><a class="menu-item" href="">3</a>
          </li>
          <li><a class="menu-item" href="">4</a>
          </li>
          <li><a class="menu-item" href="">5</a>
          </li>
          <li><a class="menu-item" href="">6</a>
          </li>
        </ul>
      </li> -->
      <li class=" nav-item"><a href=""></i><span class="menu-title" data-i18n="">Students</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="studentdetails.php">View Students</a>
          </li>
          <li><a class="menu-item" href="studentdetailsedit.php">Edit Students</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href=""></i><span class="menu-title" data-i18n="">Marks entry</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="marksentry.php">Subject Marks</a>
          </li>
          <li><a class="menu-item" href="lab_marksentry.php">Lab Marks</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="marksedit.php"></i><span class="menu-title" data-i18n="">Marks Update</span></a></li>
      <li class=" nav-item"><a href="online_update.php"></i><span class="menu-title" data-i18n="">Oline / Offline</span></a></li>
    </ul>
  </div>
</div>