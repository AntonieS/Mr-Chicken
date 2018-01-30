<?php  
 $connect = mysqli_connect("localhost", "root", "", "phppot_examples");  
 $query ="SELECT * FROM registered_users ORDER BY ID DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Admin Control</h3><a href="admin/home.php"> back</a>
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>User No.</td>  
                                    <td>User Name</td>  
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                    <td>ID number</td>
                                    <td>Email</td> 
                                    <td>Phone</td> 
                                    <td>Ethnicity</td>
                                    <td>Gender</td>
                                    <td>Start Date</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["user_name"].'</td>  
                                    <td>'.$row["first_name"].'</td>  
                                    <td>'.$row["last_name"].'</td>  
                                    <td>'.$row["id_num"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["phone"].'</td>  
                                    <td>'.$row["race"].'</td>  
                                    <td>'.$row["gender"].'</td>  
                                    <td>'.$row["start_date"].'</td> 
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  