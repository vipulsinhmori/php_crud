<?php
   session_start();
    include 'connection.php';
     $validation = isset($_SESSION['validation']) ? $_SESSION['validation'] : [];
   $id = $_GET['id']; 
   $sql = "SELECT * FROM user WHERE id = $id";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   } else {
    exit;
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit User</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container mt-5">
         <div class="row d-flex justify-content-center mb-4 shadow p-1">
            <div class="col-lg-4 text-center"> 
            </div>
            <div class="col-lg-4 text-center ">
               <h4>User Update</h4>
            </div>
            <div class="col-lg-4 text-end">
               <a href="index.php" class="btn btn-success">Back </a>
            </div>
         </div>
         <div class="row ">
            <div class="card border-0 shadow-lg">
               <div class="card-body">
                  <div class="p-2">
                     <form action="update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>">
                              <span class="text-danger"><?php echo isset($validation['name']) ? $validation['name'] : ''; ?></span>
                           </div>
                           <div class="col-lg-6">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($row['username']); ?>">
                              <span class="text-danger"><?php echo isset($validation['username']) ? $validation['username'] : ''; ?></span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>">
                              <span class="text-danger"><?php echo isset($validation['email']) ? $validation['email'] : ''; ?></span>
                           </div>
                        </div>
                        <div class="d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php
         if (isset($_SESSION['validation'])) {
             unset($_SESSION['validation']);
         }
         ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>