<?php include("global.php");
include("$root/includes/header.php") ?>

<?php 


    
   /*  if(isset($_GET['id'])){

        // $id = $_GET['id'];

        

    }else{
        $id = 1;
    } */



//make object from Request class and use OOP

    if($request->getHas('id')){
        
        
        $id = $request->get('id');

    }else{
        $id = 1;
    }
    

    /* $sql = "select name from cats where id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        $catName = mysqli_fetch_row($result)[0];
    } else {
        $catName = "No Category Found";
    } */



    $row = selectOne($conn, "name", "cats", "where id = $id");
    
    

    //mysqli_fetch_assoc($result)['name'];          //name
    //mysqli_fetch_row($result)[0];                 //key

    if(! empty($row)){
        $cat = $row;
        $found = true;
    }else{
        $cat['name'] = "No Category Found";
        $found = false;
    }

    $catName = $cat['name'];

?>


    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3><?= $catName; ?></h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">

                

            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3><?= $catName; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_courses">
            <div class="container">
                <?php 
                    
                    $sql = "select courses.id as coursesId , courses.name as courseName, img, cats.name as catName from courses JOIN cats
                            on courses.cat_id = cats.id
                            where cats.id = $id
                            ORDER by courses.id DESC";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                        $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    } else {
                        $courses = [];
                    }
                
                ?>
            <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php foreach($courses as $course){ ?>

                                <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single_courses">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="uploads/courses/<?= $course['img']; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <span><?= $course['catName']; ?></span>
                                                <h3><a href="#"><?= $course['courseName']; ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->
    
    

    <?php include("$root/includes/footer.php") ?>