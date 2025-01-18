<?php
   session_start();
   include 'connection.php';
      if (isset($_SESSION['success'])) {
       echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
       unset($_SESSION['success']);
   }         
   $sql = "SELECT * FROM user";
   $result = $conn->query($sql);
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Management</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container mt-5">
         <div class="row d-flex justify-content-center mb-4 shadow p-1">
            <div class="col-lg-4 text-center"> 
            </div>
            <div class="col-lg-4 text-center">
               <h4>User Management</h4>
            </div>
            <div class="col-lg-4 text-end">
               <a href="create.php" class="btn btn-success">Add User</a>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12 mx-auto shadow p-1">
               <div class="card border-0">
                  <div class="card-body">
                     <table class="table table-bordered">
                        <thead>
                           <tr class="text-center">
                              <th scope="col">id</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      echo '<tr class="text-center">';
                                      echo '<td class="border">' . htmlspecialchars($row['id']) . '</td>';
                                      echo '<td class="border">' . htmlspecialchars($row['name']) . '</td>';
                                      echo '<td class="border">' . htmlspecialchars($row['username']) . '</td>';
                                      echo '<td class="border">' . htmlspecialchars($row['email']) . '</td>';
                                      echo '<td>';
                                      echo '<a href="edit.php?id=' . $row['id'] . '" class="btn gap-2 mx-2 btn-sm btn-primary">Edit</a>';
                                      echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-sm mx-2 gap-2 btn-danger">Delete</a>';
                                      echo '</td>';
                                      echo '</tr>';
                                  }
                              } else {
                                  echo '<tr><td colspan="5" class="text-center">No users found</td></tr>';
                              }
                              ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>