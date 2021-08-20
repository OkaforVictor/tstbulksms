<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link">
      <img src="{{ asset('images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TSTech</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" id="usernames">
        
        <div class="info">
          <a href="">
            <h3>{{$user->last_name}} {{$user->first_name}}</h3> 
            {{-- <h3> Okafor Victor</h3> --}}
          </a>
        </div>
      </div>

      

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="compose_sms" class="nav-link">
              <i class="nav-icon fas fa-pencil-alt"></i>
              <p>
              Compose SMS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="upload_contacts" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
              Upload Contact
              </p>
            </a>
          </li>
          <li class="">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p style="font-weight: bolder">
                Sent Messages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
               Delivery Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
               Download Reports
              </p>
            </a>
          </li>
        </ul>
        <a href="login"><button type="button" class="btn btn-block btn-danger">Logout</button></a>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>