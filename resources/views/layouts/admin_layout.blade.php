<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Custom styles */
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f8f8;
    }

    .top-bar {
      background-color: #343a40;
      color: #fff;
      padding: 0.5rem;
    }

    .top-bar i {
      color: #fff;
    }

    .top-bar .navbar-nav {
      margin-left: auto;
      margin-right: auto;
    }

    .top-bar .nav-link {
      margin-left: 1.5rem;
      margin-right: 1.5rem;
    }

    .sidebar {
      background-color: #343a40;
      color: #fff;
      height: calc(100vh - 56px);
      position: fixed;
      top: 56px;
      bottom: 0;
    }

    .sidebar-heading {
      font-size: 1.2rem;
      font-weight: bold;
      padding: 1rem;
    }

    .nav-link {
      color: #fff;
      font-size: 1rem;
      transition: color 0.3s ease;
    }

    .nav-link:hover {
      background-color: #4f555d;
    }

    .btn-custom {
      background-color: #6c757d;
      border-color: #6c757d;
    }

    .btn-custom:hover {
      background-color: #5a6268;
      border-color: #545b62;
    }

    .card {
      background-color: #fff;
      border: none;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .footer {
      background-color: #343a40;
      color: #fff;
      padding: 1rem;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .dropdown-menu {
      display: none; /* Hide dropdown menu by default */
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 999;
      min-width: 200px;
      padding: 0.5rem 0;
      margin: 0;
      font-size: 0.875rem;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 0.25rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu.show {
      display: block; /* Show dropdown menu when it has 'show' class */
    }

    .dropdown-item {
      display: block;
      padding: 0.25rem 1rem;
      clear: both;
      font-weight: normal;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
      color: #16181b;
      background-color: #f8f9fa;
    }
  </style> 
  <title>Admin Panel</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark top-bar">
    <a class="navbar-brand" href="{{route('admin_dashboard')}}">Admin Panel</a>
    <div class="navbar-nav mx-auto">
      <a class="nav-link" href="{{route('admin_dashboard')}}"><i class="fas fa-chart-bar"></i> Dashboard</a>
      <a class="nav-link" href="#"><i class="fas fa-users"></i> Users</a>
      <a class="nav-link" href="#"><i class="fas fa-cogs"></i> Settings</a>
      <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
      <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Messages</a>
    </div>
    <div>
      <a href="#"><i class="fas fa-cog"></i></a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky">
          <h6 class="sidebar-heading">Main Menu</h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin_dashboard')}}">
                <i class="fas fa-chart-bar mr-2"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-users mr-2"></i>
                Users
              </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-poll mr-2"></i>
                  Polls
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{route('polls.create')}}">Create Poll</a>
                  <a class="dropdown-item" href="{{route('polls.index')}}">View Polls</a>
                  <a class="dropdown-item" href="#">Other</a>
                </div>
              </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs mr-2"></i>
                Settings
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Preferences</a>
                <a class="dropdown-item" href="#">Security</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        {{-- <h1 class="mt-4">Welcome to the Admin Panel</h1> --}}

        @yield('content')

      </main>
    </div>
  </div>

  <footer class="footer">
    <div class="container text-center">
      &copy; 2023 Admin Panel. All rights reserved.
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('.nav-link.dropdown-toggle').click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      var $dropdownMenu = $(this).next('.dropdown-menu');
      $dropdownMenu.toggleClass('show');

      $(document).click(function(event) {
        if (!$(event.target).closest('.dropdown-menu').length) {
          $dropdownMenu.removeClass('show');
        }
      });
    });
  });
</script>
{{--
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 --}}



</body>
</html>
