<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
<?php session_start();
if(isset($_SESSION['user'])){


?>
<?php  


include('connection.php');

if($_SESSION['position'] != Null) { 
    

    $query = "SELECT * FROM cv_user  WHERE UserID = '{$_SESSION['id']}'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
 
    $user = mysqli_fetch_assoc($result);
    $encryption_key_email =12345678912000006958657423654789; 
    $iv_email = 1596324856700000; 
    $decrypted = openssl_decrypt($user['email'], 'aes-256-cbc', $encryption_key_email, 0, $iv_email);

   
    ?>
    <section class="sidebar">

<div class="user_card">
    <div class="top_flex">
  </div>
   <p class="user_name"> <?php echo $user['name'] ?></p>

<ul>
  
<li><a href="\Cvit-CVgenerator\chosetemplate.php">Create Cv</a></li>
    <li><a href="editprofile.php">Edit Profile</a></li>
    <li><a href="my_cer.php">My Certificate</a></li>
    <li><a href="my_course.php">My course</a></li>
    <li><a href="\Cvit-CVgenerator\course\index.php">All Courses</a></li>
    <li><a href="index.php">Profile</a></li>
    <li><a href="\Cvit-CVgenerator\index.php">Home</a></li>
    <li><a href="\Cvit-CVgenerator\logout.php">Logout</a></li>

</ul>
</div>


<div class="user_card2">

 <div class="cover_photo">

<img src="<?php echo $user['image_co'] ?>" alt="cover image" class="cover_size">

 </div>
 <div class="profile_photo">

  <img src="<?php echo $user['img'] ?>" alt="" class="profile_size">
  
 </div>

 <div class="newsfeed">
    <div class="main_pro">
        <p><span class="pro_name"><?php echo $user['name'] ?> </span><br><span class="pro_occupation"><?php echo $user['position'] ?></span></p>
    </div>

<div class="work">
    <img src="\Cvit-CVgenerator\img\graduated.png" alt="" class="ski_img">
    <p class="work_title">Education</p>

    <img src="\Cvit-CVgenerator\img\certificate (3).png" alt="" class="uni1_img">
    <div class="list_edu">
    <p class="uni1"><?php echo $user['edu_1'] ?>  <br>
    <?php echo $user['degree_1'] ?> <br>
    <?php echo $user['cgpa_2'] ?></p>
   <p class="uni1"><?php echo $user['edu_2'] ?>  <br>
   <?php echo $user['degree_2'] ?><br>
   <?php echo $user['cgpa_2'] ?></p>
</div>
    <img src="\Cvit-CVgenerator\img\certificate (3).png" alt="" class="uni2_img">




</div>




<div class="education">
    <img src="\Cvit-CVgenerator\img\experience (1).png" alt="" class="ski_img">
    <p class="edu_title">Exprience</p>

    <img src="\Cvit-CVgenerator\img\working-time.png" alt="" class="ex1_img">
    <img src="\Cvit-CVgenerator\img\working-time.png" alt="" class="ex2_img">
    <div class="ex_">
    <p class="uni1"><?php echo $user['c_name_1'] ?><br>
    <?php echo $user['c_year_1'] ?></p><br>
       <p class="uni1"><?php echo $user['c_name_2'] ?><br>
       <?php echo $user['c_year_2'] ?></p>
    </div>
</div>





<div class="skills">
    <img src="\Cvit-CVgenerator\img\competence.png" alt="" class="ski_img">
    <p class="ski_title">Skills</p>
    <div class="ski_skills">
    <?php if($user['skills_1'] != Null){ ?>
<button class="ski_btn"><?php echo $user['skills_1'] ?></button> 
<?php } if($user['skills_2'] != Null) { ?>

<button class="ski_btn"><?php echo $user['skills_2'] ?></button> 
<?php } if($user['skills_3'] != Null){ ?>
<button class="ski_btn"><?php echo $user['skills_3'] ?></button>

<?php } if($user['skills_4'] != Null){ ?>
<button class="ski_btn"><?php echo $user['skills_4'] ?></button>

<?php } if($user['skills_5'] != Null){?>
<button class="ski_btn"><?php echo $user['skills_5'] ?></button>
<?php } if($user['skills_6'] != Null){?>
<button class="ski_btn"><?php echo $user['skills_6'] ?></button>
<?php } ?>
</div>


</div>


<div class="personal">
    <img src="\Cvit-CVgenerator\img\personal-information (2).png" alt="" class="ski_img">
<img src="\Cvit-CVgenerator\img\message.png" alt="" class="pr_i1">
<img src="\Cvit-CVgenerator\img\phone.png" alt="" class="pr_i2">
<img src="\Cvit-CVgenerator\img\location.png" alt="" class="pr_i3">

    <p class="pr_title">Personal details</p>
    
<p class="pr1"><?php echo $decrypted  ?></p>
<p class="pr2"><?php echo $user['phone'] ?></p>
<p class="pr3"><?php echo $user['address'] ?></p>



</div>




 </div>
 
 <?php }}else{ 

    header("location: \Cvit-CVgenerator\user2\profile.php");


     } ?></div>

</div>
    </section>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6541e338a84dd54dc48758ba/1he4lv6c6';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php
}else{
    header("location: \Cvit-CVgenerator/authentication/login.php");

}


?>
</body>
</html>