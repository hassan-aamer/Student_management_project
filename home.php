<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المدير</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700;800&display=swap" rel="stylesheet">
</head>
<body dir='rtl'>
    <?php
    $host='localhost';
    $user='root';
    $pass='';
    $db='student15';
    $con=mysqli_connect($host,$user,$pass,$db);
    $res= mysqli_query($con, 'SELECT * FROM student');
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls = "insert into student value ($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("Location: home.php");
    }
    if(isset($_POST['del'])){
            $sqls = "delete from student where name='$name'";
            mysqli_query($con,$sqls);
            header("Location: home.php");
        }
    ?>
    <div id='mother'>
        <form method='POST'>
            <!-- لوحة التحكم -->
            <aside>
                <div id='div'>
                    <img src="images/aim.png" alt="logo site" width='200px'>
                    <h3>لوحة المدير</h3>
                    <label>رقم الطالب</label><br>
                    <input type="text" name='id' id='id'><br>
                    <label>اسم الطالب</label><br>
                    <input type="text" name='name' id='name'><br>
                    <label>عنوان الطالب</label><br>
                    <input type="text" name='address' id='address'><br><br>
                    <button name='add'> اضافة طالب </button>
                    <button name='del'> حذف طالب </button>
                </div>
            </aside>
            <!--الطلاب عرض البيانات -->
            <main>
                <table id='tbl'>
                    <tr>
                        <th>الرقم التسلسلى</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>