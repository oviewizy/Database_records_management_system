<?php include 'includes/header.php'; ?>

<div class="jumbotron bg-light p-4 rounded shadow-sm">
  <h1 class="display-4">Welcome to Your Data Management System!</h1>
  <p class="lead">Efficiently manage your structured data with ease and security.</p>
  <hr class="my-4">
  <p>Use the navigation on the left to access different data entities like Users, Products, or Customers.</p>
  <a class="btn btn-primary btn-lg" href="products.php" role="button">
    Start Managing Data <i class="fas fa-arrow-right"></i>
  </a>
</div>

<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card text-white bg-info shadow">
      <div class="card-header">Total Users</div>
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-users"></i> 150</h5>
        <p class="card-text">Currently registered users in the system.</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card text-white bg-success shadow">
      <div class="card-header">Total Products</div>
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-box-open"></i> 780</h5>
        <p class="card-text">Number of unique products managed.</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card text-white bg-warning shadow">
      <div class="card-header">New Customers This Month</div>
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-tie"></i> 45</h5>
        <p class="card-text">Recently added customer records.</p>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
