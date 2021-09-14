<?php

session_start();
if(isset($_SESSION['username'])){
include 'connect.php';
$do=isset($_GET['do'])?$_GET['do']:'manage';
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Ajax Upload file</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstraprtl.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<style>
  body{
	padding-top: 0; 
	}
	.active{
		background-color: #fff; 
		color: #777 !important; 
	}
	.navbar-inverse .navbar-nav > li > a:hover,
	 .navbar-inverse .navbar-nav > li > a:focus{
	 	background-color: #fff; 
	 	color: #777; 
	 }
	.navbar > .container .navbar-brand, 
	.navbar > .container-fluid .navbar-brand{
		margin-right: 0; 
	}
	.navbar-brand{
	    font-size: 22px;
	    font-weight: bold;
	    color: #000;
    }

    .alert-warning {
	    margin-top: 50px;
	    text-align: center;
	    font-size: 18px;
	    color: #000;
    }

   .search {
	   width: 100%;
	   position: relative
	}

	.searchTerm {
	    float: left;
	    width: 100%;
	    border: 3.2px solid #eee;
	    padding: 15.7px;
	    height: 20px;
	    border-radius: 5px;
		outline: none;
	    color: #9DBFAF;
		text-align: right;
			    
	}

   .searchButton {
     position: absolute;
    left: -70px;
    width: 67px;
    height: 39px;
    border: 3px solid #f5f5f5;
    background: #f5f5f5;
    text-align: center;
    color: #000;
    border-radius: 5px;
    cursor: pointer;
    font-size: 17px;
    bottom: -38px;
    }

	.searchTerm:focus{
		color: #000; 
	}

	.wrap{
	    width: 50%;
		position: absolute;
	    top: 22px;
	    left: 50%;
	    transform: translate(-50%, -50%);	 
	    z-index: 999;        
	}

	.table-responsive{
		margin-top: 60px; 
	}

	tr th{
		text-align: center;
		background-color: #000; 
		color: #fff; 
	}

	.h-edit{
       font-size: 30px;
       margin-top: 60px;
	}

	.alert-success {
	  margin-top: 60px; 
      font-size: 20px;
      color: #000;
      font-weight: bold;
      text-align: center;
   }

   .navbar-inverse .navbar-nav > li > a{
   	color: #fff; 
   }

</style>

	<nav class="navbar navbar-inverse">

  <div class="container">

    <div class="navbar-header">


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">


        <span class="sr-only">Toggle navigation</span>


        <span class="icon-bar"></span>


        <span class="icon-bar"></span>


        <span class="icon-bar"></span>


      </button>

    </div>

    <div class="collapse navbar-collapse" id="app-nav">


      <ul class="nav navbar-nav">


          <li><a class="navbar-brand" href="http://localhost/ajax-data/add-post.php">أضافة البيانات </a></li>
	      <li><a class="navbar-brand active" href="http://localhost/ajax-data/search.php">عرض البيانات </a></li>

		</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="navbar-brand" href="http://localhost/ajax-data/logout.php">تسجيل الخروج</a></li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container">
	<div class="row">
	<div class="col-sm-12">
	<div class="wrap">
	  <form class="search" method="get" action="search.php">
		   <input type="text" name="user_query" class="searchTerm" placeholder="ابحث من هنا" data-text="ابحث من هنا">
			<button type="submit" name="search" class="searchButton">
			  بحث
			</button>
      </form>
   </div>
</div>
</div> 
</div>

<div class="container">

<div class="row">

<?php 

if (isset($_GET['search'])){

	
$user_query = $_GET['user_query']; 

$search = $con->prepare ("select * from posts where (concat(' ',`name`,' ') LIKE '%$user_query%') OR (concat(' ',`id`,' ') LIKE '%$user_query%') OR (concat(' ',`namehusband`,' ') LIKE '%$user_query%') OR (concat(' ',`phone`,' ') LIKE '%$user_query%')"); 

$search->execute(); 



  if($search->rowCount() > 0)

	{ ?>

<div class="container-fluid">


<div class="table-responsive">


<table class="main-table text-center table table-bordered ">

<tr>
        <th>رقم الكارت</th>
		<th>أسم  الزوجة</th>
		<th>رقم الكارت</th>
		<th> أسم الزوج </th>
		<th>رقم التليفون </th>
		<th>العنوان </th>
		<th>التاريخ</th>
		<th> ملاحظات</th>
		<th>التحكم</th>
</tr>
<?php 

while($row=$search->fetch(PDO::FETCH_ASSOC))

{

extract($row);

		
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['number']."</td>";
		echo "<td>".$row['namehusband']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['note']."</td>";
		echo "<td>
		<a href='search.php?do=edit&id=".$row['id']."'class='btn btn-success'><i class='fa fa-edit'></i>تعديل</a>
		</td>";
		echo "</tr>";
		}
		echo "</table>";
		echo "</div>"; 

		}

	
	else

	{

		?>

        <div class="col-xs-12">

        	<div class="alert alert-warning search-p">

        		لا توجد بيانات حاول مرة أخرى 

            </div>

        </div>

        <?php

	}

}


?> 

</div>	
</div> 


<?php
if($do == 'edit'){

$id=isset($_GET['id'])&& is_numeric($_GET['id'])? intval($_GET['id']):0;

$stmt=$con->prepare("select * from posts where id=? limit 1");

$stmt->execute(array($id));

$row=$stmt->fetch();


$count=$stmt->rowCount();


if($stmt->rowCount()>0){


?>
<h1 class="text-center h-edit">تعديل البيانات</h1>

	<div class="container-fluid admin-gcontainer">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">تعديل   البيانات</h3>
		</div>
		<div class="panel-body">	
		  	
          <form class="form-horizontal" action="?do=update" method="POST">

	                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
				
					<div class="row form-group">
						<label for="post_name" class="col-sm-2 control-label">اسم الزوجة</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_name" value="<?php echo $row['name']?>" name="post_name" autocomplete="off" placeholder="اسم الزوجة" >
						</div>
				    </div>	

					<div class="row form-group">
						<label for="post_number" class="col-sm-2 control-label">عدد الاولاد</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_number" value="<?php echo $row['number']?>" name="post_number" autocomplete="off" placeholder="عدد الاولاد" >
						</div>
				    </div>	

				    <div class="row form-group">
					<label for="post_namehusband" class="col-sm-2 control-label">أسم الزوج</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_namehusband" value="<?php echo $row['namehusband']?>" name="post_namehusband" autocomplete="off" placeholder="أسم الزوج" >
						</div>
				    </div>	

				    <div class="row form-group">
						<label for="post_phone" class="col-sm-2 control-label">رقم التليفون</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_phone" value="<?php echo $row['phone']?>" name="post_phone" autocomplete="off" placeholder="رقم التليفون" >
						</div>
				    </div>	
				
				  <div class="row form-group">
						<label for="post_address" class="col-sm-2 control-label">العنوان</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_address" value="<?php echo $row['address']?>" autocomplete="off" name="post_address" placeholder="العنوان" >
						</div>
				    </div>
				
				  <div class="row form-group">
						<label for="post_date" class="col-sm-2 control-label">تاريخ</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_date" readonly autocomplete="off" name="post_date"   value="<?php echo date('d-m-Y')?>"placeholder="التاريخ" >
						</div>
				    </div>

					<div class="row form-group">
						<label for="post_note" class="col-sm-2 control-label">ملاحظات</label>
						<div class="col-sm-10">
							  <textarea class="form-control" rows="8" id="post_note" name="post_note" placeholder="ملاحظات"><?php echo $row['note']?></textarea>
						</div>
				    </div>
					
					<div class="row form-group text-center">
						<div class="col-sm-10 cmd_btn">
							<button id="btn-save-post" type="submit" class="btn btn-primary">حــــفــــظ</button>
						</div>
					</div>
		    </form>
		</div>
		</div>
		</div>
	</div>
<?php


}else{

echo 'theres no such id';
	
}
}elseif($do == 'update'){


	echo "<div class='container'>";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$id=$_POST['id'];
		$name=$_POST['post_name'];
		$number=$_POST['post_number']; 
		$namehusband=$_POST['post_namehusband'];
		$phone=$_POST['post_phone'];
		$address=$_POST['post_address'];
		$note=$_POST['post_note'];
		$date=$_POST['post_date'];
		
		

		$stmt=$con->prepare("update posts set name=?,number=?,namehusband=?,phone=?,address=?,date=?,note=? where id=?");

		$stmt->execute(array($name,$number,$namehusband,$phone,$address,$date,$note,$id)); ?> 

        <div class='alert alert-success'>تم تعديل البيانات </div>

  <?php 
  	   header("refresh:3;url=add-post.php");
	}else{


		echo 'sorry you cant browse this page directly';

	}


	echo "</div>";


}
?>


<div class="container-fluid footer text-center" style="margin-top: 513px; background-color: #000;">
	<div class="container" >
		<p style="font-weight: bold; color: #fff;"> Polycarpus 01288019733 &copy;</p>
	</div>
</div>

</body>
</html>
<?php }else {
	header('location:index.php');
} ?> 