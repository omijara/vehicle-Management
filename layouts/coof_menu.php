
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="index.php" class="brand-link">

     <!-- <img src="https://www.jotform.com/uploads/usmania0015/form_files/COvid%20Logo.5fb085f7efb458.17758393.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->

      <span class="brand-text font-weight-bold">Vehicle Maintenance</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

<!--         <div class="image">

          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

        </div> -->

        <div class="info">

          <a class="d-block">
            Welcome
            <?php 

             echo $_SESSION['username']; 

            ?>

            </a>

        </div>

      </div>



    <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->



         <!-- <li class="nav-header">EXAMPLES</li> -->



           <a href="index.php" class="nav-link active">

              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>

              Dashboard

            <!--    <i class="right fas fa-angle-left"></i> -->

              </p>

            </a>


          <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-th"></i>

              <p>

                Reports

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

               <li class="nav-item">

                <a href="maintenance_report.php?project=CoOf" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Maintenance</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="fuel_report.php?project=CoOf" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Fuel</p>

                </a>

              </li>

            </ul>

          </li>
      

          <!--Category End Here -->

          <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-cog"></i>

              <p>

                Settings

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

             <li class="nav-item">

                <a href="reset-password.php" class="nav-link">

                  <i class="fas fa-key"></i>

                  <p>Change Password</p>

                </a>

              </li>

               <li class="nav-item">

                <a href="logout.php" class="nav-link">

                  <i class="fas fa-sign-out-alt"></i>

                  <p>Logout</p>

                </a>

              </li>



              </li>

            </ul>

          </li>

       

        </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>



    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

