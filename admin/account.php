<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
           FROM users us
           JOIN work_station ws
           ON ws.user_id = us.user_id
           JOIN warehouse wh
           ON wh.ware_id = ws.ware_id
           WHERE us.type = 'admin'";
$result = mysqli_query($con, $query);

if(isset($_POST['addadmin']))
{        
	$user_id = $_SESSION['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $station = $_POST['station'];
    $type = 'admin';
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
	
	$result3 = mysqli_query($con, "INSERT INTO users SET fname='$fname', lname='$lname', email='$email', contact='$contact', password='$password', type='$type', verify = 'yes', statuss = 'active'") or die(mysqli_error($con));
    $resultadmin = mysqli_query($con, "INSERT INTO log SET action='created $email', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    
    $query20 = "SELECT * 
              FROM users
              WHERE email = '$email'";
    $result20 = mysqli_query($con, $query20);
    $results20 = mysqli_fetch_assoc($result20);
    
    $user_ids = $results20['user_id'];
    
    $result4 = mysqli_query($con, "INSERT INTO work_station SET user_id='$user_ids', ware_id='$station'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Create');
    window.location.href='main.php#adaccount';
    </script>
    <?php
}

$query5 = "SELECT * FROM warehouse";
$result5 = mysqli_query($con, $query5);

if (isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
    
    $query22 = "SELECT * 
              FROM users
              WHERE user_id = '$user_id'";
    $result22 = mysqli_query($con, $query22);
    $results22 = mysqli_fetch_assoc($result22);
    
    $email = $results22['email'];

    $result6 = mysqli_query($con, "DELETE FROM users WHERE user_id=$user_id") or die(mysqli_error($con));
    $result7 = mysqli_query($con, "DELETE FROM work_station WHERE user_id=$user_id") or die(mysqli_error($con));
    $resultdel = mysqli_query($con, "INSERT INTO log SET action='delete $email', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    window.location.href='main.php#adaccount';
    </script>
    <?php

}

if (isset($_GET['active_id']))
{
    $active_id = $_GET['active_id'];	
    $resultu = mysqli_query($con, "UPDATE users SET statuss='active' WHERE user_id='$active_id'") or die(mysqli_error($con));
    ?>
    <script>
	window.location.href='main.php#adaccount';
    </script>
    <?php
}
if (isset($_GET['ban_id']))
{
	
    $ban_id = $_GET['ban_id'];	
    $resultu = mysqli_query($con, "UPDATE users SET statuss='deactive' WHERE user_id='$ban_id'") or die(mysqli_error($con));
    ?>
    <script>
	window.location.href='main.php#adaccount';
    </script>
    <?php
}



$query7 = "SELECT * FROM warehouse";
$result7 = mysqli_query($con, $query7);

if(isset($_POST['edituser']))
{    
	
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $station = $_POST['station'];
	
    $result8 = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', email='$email', contact='$contact' WHERE user_id='$user_id'") or die(mysqli_error($con));
    $resultedit = mysqli_query($con, "INSERT INTO log SET action='edit $email', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    $result9 = mysqli_query($con, "UPDATE work_station SET ware_id='$station' WHERE user_id='$user_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Save');
    window.location.href='main.php#adaccount';
    </script>
    <?php
}

$query10 = "SELECT *
           FROM users us
           JOIN work_station ws
           ON ws.user_id = us.user_id
           JOIN warehouse wh
           ON wh.ware_id = ws.ware_id
           WHERE type='staff'";
$result10 = mysqli_query($con, $query10);

$query11 = "SELECT * FROM warehouse";
$result11 = mysqli_query($con, $query11);

$query12 = "SELECT * FROM warehouse";
$result12 = mysqli_query($con, $query12);

if(isset($_POST['addstaff']))
{    
	$user_id = $_SESSION['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $station = $_POST['station'];
    $type = 'staff';
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
	
	$result13 = mysqli_query($con, "INSERT INTO users SET fname='$fname', lname='$lname', email='$email', contact='$contact', password='$password', type='$type', verify = 'yes', statuss = 'active'") or die(mysqli_error($con));
    $resultstaff = mysqli_query($con, "INSERT INTO log SET action='created $email', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    
    $query21 = "SELECT * 
              FROM users
              WHERE email = '$email'";
    $result21 = mysqli_query($con, $query21);
    $results21 = mysqli_fetch_assoc($result21);
    
    $user_ids = $results21['user_id'];
    
    $result14 = mysqli_query($con, "INSERT INTO work_station SET user_id='$user_ids', ware_id='$station'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Create');
    window.location.href='main.php#adaccount';
    </script>
    <?php
}

$query15 = "SELECT *
           FROM users
           WHERE type='customer'";
$result15 = mysqli_query($con, $query15);

?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Accounts</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Accounts</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblATab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnaadmin" onclick="funcAAdmin()">Admins</button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnastaff" onclick="funcAStaff()">Staffs</button></td>
                    <td><button class="btn-link btntab" id="btnacustomer" onclick="funcACustomer()">Customers</button></td>
                </tr>
            </table>
        </div>
    
        <div id="aadmin">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Work Station</th>
                        <th></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['station_name'] ?></td>

                                    <td>                                        
                                        <a data-toggle="modal" data-id="<?php echo $row['user_id']; ?>" data-fname="<?php echo $row['fname']; ?>" data-lname="<?php echo $row['lname']; ?>" data-email="<?php echo $row['email']; ?>" data-contact="<?php echo $row['contact']; ?>" class="btn btn-default btn-xs btnDelete editAdmin" href="#editAdmin" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>

                                        <a href="account.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="6">No admin accounts.</td>
                                </tr>
                            <?php
                        }
                    ?>
                    <tr>
                        <td colspan="6">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addAdmin">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdminTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAdminTitle">Add Admin</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect" name="station" >
                                        <option class="formoption" selected required>Station</option>
                                        <?php 
                                            if(mysqli_num_rows($result5) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result5))
                                                {
                                                    ?>
                                                        <option class="formoption" value="<?php echo $row['ware_id']; ?>">
                                                            <?php echo $row['station_name']; ?>
                                                        </option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </p> 
                                
                                <p>
                                    <input class="formfield" name="password" type="password" placeholder="Password" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="addadmin" value="Create" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="editAdminTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAdminTitle">Edit Admin</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <input class="formfield" name="user_id" id="user_id" type="hidden" value="" />
                                <p>
                                    <input class="formfield" name="fname" id="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" id="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" id="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" id="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect" name="station" >
                                        <option class="formoption" selected required>Station</option>
                                        <?php 
                                            if(mysqli_num_rows($result7) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result7))
                                                {
                                                    ?>
                                                        <option class="formoption" value="<?php echo $row['ware_id']; ?>">
                                                            <?php echo $row['station_name']; ?>
                                                        </option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="edituser" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

        <div id="astaff">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Work Station</th>
                        <th></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result10) > 0)
                        {
                            while($row = mysqli_fetch_array($result10))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['station_name'] ?></td>

                                    <td>                                        
                                        <a data-toggle="modal" data-id="<?php echo $row['user_id']; ?>" data-fname="<?php echo $row['fname']; ?>" data-lname="<?php echo $row['lname']; ?>" data-email="<?php echo $row['email']; ?>" data-contact="<?php echo $row['contact']; ?>" class="btn btn-default btn-xs btnDelete editStaff" href="#editStaff" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>

                                        <a href="account.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="6">No staff accounts.</td>
                                </tr>
                            <?php
                        }
                    ?>
                    <tr>
                        <td colspan="6">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addStaff">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="addStaffTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStaffTitle">Add Staff</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect" name="station" >
                                        <option class="formoption" selected required>Station</option>
                                        <?php 
                                            if(mysqli_num_rows($result12) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result12))
                                                {
                                                    ?>
                                                        <option class="formoption" value="<?php echo $row['ware_id']; ?>">
                                                            <?php echo $row['station_name']; ?>
                                                        </option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </p> 
                                
                                <p>
                                    <input class="formfield" name="password" type="password" placeholder="Password" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="addstaff" value="Create" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="editStaffTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStaffTitle">Edit Staff</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <input class="formfield" name="user_id" id="user_id" type="hidden" value="" />
                                <p>
                                    <input class="formfield" name="fname" id="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" id="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" id="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" id="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect" name="station" >
                                        <option class="formoption" selected required>Station</option>
                                        <?php 
                                            if(mysqli_num_rows($result11) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result11))
                                                {
                                                    ?>
                                                        <option class="formoption" value="<?php echo $row['ware_id']; ?>">
                                                            <?php echo $row['station_name']; ?>
                                                        </option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="edituser" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="acustomer">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
						<th>Status</th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result15) > 0)
                        {
                            while($row = mysqli_fetch_array($result15))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
									 <td>
										<?php
											if($row['statuss'] != 'active'){
												?>
											<a href="account.php?active_id=<?php echo $row['user_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="activate"><span class="glyphicon glyphicon-ok-circle"></span></a>
											<?php
											}else{
												?>
												<a href="account.php?ban_id=<?php echo $row['user_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="deactivate"><span class="glyphicon glyphicon-remove-circle"></span></a>
											<?php
											}
										?>

										 
									 </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="6">No customer accounts.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>    
</div>
<script>
$(document).on("click", ".editAdmin", function () {
    var userId = $(this).data('id');
    var userFname = $(this).data('fname');
    var userLname = $(this).data('lname');
    var userEmail = $(this).data('email');
    var userContact = $(this).data('contact');
    $(".modal-body #user_id").val( userId );
    $(".modal-body #fname").val( userFname );
    $(".modal-body #lname").val( userLname );
    $(".modal-body #email").val( userEmail );
    $(".modal-body #contact").val( userContact );
    $('#editAdmin').modal('show');
});
</script>
<script>
$(document).on("click", ".editStaff", function () {
    var userId = $(this).data('id');
    var userFname = $(this).data('fname');
    var userLname = $(this).data('lname');
    var userEmail = $(this).data('email');
    var userContact = $(this).data('contact');
    $(".modal-body #user_id").val( userId );
    $(".modal-body #fname").val( userFname );
    $(".modal-body #lname").val( userLname );
    $(".modal-body #email").val( userEmail );
    $(".modal-body #contact").val( userContact );
    $('#editStaff').modal('show');
});
</script>