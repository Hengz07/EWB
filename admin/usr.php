<?php

session_start();
include '../private/connection.php';
include 'function.php';

$admin_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../organization/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: rgba(38, 194, 129,1);">

    <nav>
        <div class="logo">
            <h6>E-Woodball Admin</h6>
        </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li><a href="org.php">Organization</a></li>
            <li><a href="marsh.php">Marshal</a></li>
            <li><a class="active" href="usr.php">User</a></li>
            <li><a href="field.php">Field</a></li>
            <li><a href="admin.php">Home</a></li>
            <li><a href="profile.php">Update Profile</a></li>
            <li><a href="alogout.php">Logout</a></li>
        </ul>
    </nav>
    <style>
        .container table {
            border-collapse: collapse;
            border: 2px solid black;
        }

        .container th {
            background-color: lightgray;
        }

        .container tr:nth-child(odd) {
            background-color: white;
        }

        .container a {
            background-color: rgba(16, 15, 15, 0.7);
            color: white;
            width: 90%;
            margin: 4px;
        }
    </style>
    <div style="width:90%; border:2px solid black; box-shadow: 10px 10px rgba(0,0,0,0.3); padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px;">

        <h2>List User</h2>

        <div class="container">
            <center>
                <table border="1" width="90%">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Update</th>
                    </tr>
                    <style type="text/css">
                        input[type="submit"] {
                            display: inline-block;
                            border-radius: 10px;
                            background: yellow;
                            border: 1px solid;
                            color: black;
                            padding: 5px;
                            width: 90%;
                            margin-top: 5px;
                            font-size: 1em;
                            text-align: center;
                            text-decoration: none;
                        }

                        input[type="submit"]:hover {
                            background: black;
                            border: 1px solid rgba(222, 224, 121);
                            color: white;
                        }

                        input {
                            border-radius: 10px;
                            width: 80%;
                            text-align: center;
                            border: 2px solid rgba(224, 211, 121);
                            padding: 5px;
                            font-size: 1em;
                        }
                    </style>
                    <?php
                    $query = "select * from users order by id ASC";
                    $result = mysqli_query($con, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no++; ?></td>
                            <td style="text-align:center;"><?php echo $row['user_name']; ?></td>
                            <td style="text-align:center;"><?php echo $row['user_email']; ?></td>
                            <td style="text-align:center;"><?php echo $row['user_pass']; ?></td>
                            <td style="text-align:center;">
                                <form action="usr.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                    <center><a href="usrupdate.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Confirm Update?')">Update</a></center>
                                    <center><a href="usrdelete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Confirm Delete?')">Delete</a></center>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </center>
        </div>
    </div>

    <script>
        function confirmSubmit() {
            var agree = confirm("Are you sure you wish to continue?");
            if (agree)
                return true;
            else
                return false;
        }
    </script>

</body>

</html>