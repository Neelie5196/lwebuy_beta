<?php
require_once '../connection/config.php';
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM recipient_names WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

$query1 = "SELECT * FROM recipient_contact WHERE user_id = '$user_id'";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT * FROM address WHERE user_id = '$user_id'";
$result2 = mysqli_query($con, $query2);
?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Others</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Others</h2>
    
    <div class="row rateoutcontainer">
        <div class="col-xs-12 col-md-3 col-lg-3">
            <div class="ratecontainer">
                <h3 class="bigh3 hidden-xs hidden-sm">Recipient Names</h3>
                <h3 class="smh3 hidden-md hidden-lg">Recipient Names</h3>
                
                <table class="recipientdettbl">
                    <form action="other.php" method="post">
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                    
                        <tr>
                            <td class="left"><?php echo $row['recipient_name']; ?></td>
                            <td class="right">
                                <input type="hidden" value="<?php echo $row['recipient_name']; ?>" name="recipname" />
                                <input type="submit" class="btn btn-xs btnDel" value="Delete" name="deletename" />
                            </td>
                        </tr>
                    
                    <?php
                            }
                        }
                        else
                        {
                            ?>
                        
                        <tr>
                            <td colspan="2">No history of recipient names.</td>
                        </tr>
                        
                    <?php
                        }
                    ?>
                    </form>
                </table>
            </div>
        </div>

        <div class="col-xs-12 col-md-3 col-lg-3">
            <div class="ratecontainer">
                <h3 class="bigh3 hidden-xs hidden-sm">Recipient Contacts</h3>
                <h3 class="smh3 hidden-md hidden-lg">Recipient Contacts</h3>

                <table class="recipientdettbl">
                    <form action="other.php" method="post">
                    <?php
                        if(mysqli_num_rows($result1) > 0)
                        {
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                ?>
                    
                        <tr>
                            <td class="left"><?php echo $row1['recipient_contact']; ?></td>
                            <td class="right">
                                <input type="hidden" value="<?php echo $row1['recipient_contact']; ?>" name="recipcontact" />
                                <input type="submit" class="btn btn-xs btnDel" value="Delete" name="deletecontact" />
                            </td>
                        </tr>
                    
                    <?php
                            }
                        }
                        else
                        {
                            ?>
                        
                        <tr>
                            <td colspan="2">No history of recipient contacts.</td>
                        </tr>
                        
                    <?php
                        }
                    ?>
                    </form>
                </table>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="ratecontainer">
                <h3 class="bigh3 hidden-xs hidden-sm">Address</h3>
                <h3 class="smh3 hidden-md hidden-lg">Address</h3>

                <table class="recipientdettbl">
                    <form action="other.php" method="post">
                    <?php
                        if(mysqli_num_rows($result2) > 0)
                        {
                            while($row2 = mysqli_fetch_array($result2))
                            {
                                ?>
                    
                        <tr>
                            <td class="left"><?php echo $row2['address'] . " " . $row2['postcode'] . " " . $row2['city'] . ", " . $row2['state'] . ", " . $row2['country']; ?></td>
                            <td class="right">
                                <input type="hidden" value="<?php echo $row2['address_id']; ?>" name="addid" />
                                <input type="submit" class="btn btn-xs btnDel" value="Delete" name="delete" />
                            </td>
                        </tr>
                    
                    <?php
                            }
                        }
                        else
                        {
                            ?>
                        
                        <tr>
                            <td colspan="2">No history of recipient address.</td>
                        </tr>
                        
                    <?php
                        }
                    ?>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>