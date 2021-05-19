<?php include("global.php");
include("$root/includes/header.php") ?>




<?php 


  /*   //pagination
    if(isset($_GET['page'])){

        $page = $_GET['page'];


    }else{
        $page = 1; 
    } */

    

    //make object from Request class and use OOP

    //pagination
    if($request->getHas('page')){


        $page = $request->get('page');

    }else{
        $page = 1; 
    }

    //$page = isset($_GET['page']) ? $_GET['page'] : 1;             //by conditional operator


    $num = 3;
    $offset = $num * ($page - 1);              //for pagination




    //lastpage  =  (total no. of courses /  num of courses every page)
    $row = selectOne($conn, "count(id) as coursesCount","courses");
    $coursesCount = $row['coursesCount'];
    $result = ($coursesCount / $num);
    $lastPage = ceil($result);

?>


    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Our Courses</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">


        <?php 
        
            /* $sql = "select courses.id as coursesId , courses.name as courseName, img, cats.name as catName from courses JOIN cats
                    on courses.cat_id = cats.id
                    ORDER by courses.id DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
                $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                $courses = [];
            } */


            $courses = selectJoin(
                $conn,
                "courses.id as coursesId , courses.name as courseName, img, cats.name as catName",
                "courses JOIN cats",
                "courses.cat_id = cats.id",
                "ORDER by courses.id DESC limit $num offset $offset"            //limit $num offset $offset (for pagination)
            );
        
        ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>All Courses</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_courses">
            <div class="container">
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
                                                <h3><a href="show-course.php?id=<?=$course['coursesId']; ?>"><?= $course['courseName']; ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>



                                    <!--for pagination-->

                                    <div class="text-center">
                                        <a <?php if($page == 1){echo " style = 'pointer-events:none' ";} ?> class="btn btn-info" href="<?= $url; ?>all-courses.php?page=<?= $page - 1; ?>">prev</a>
                                        <a <?php if($page == $lastPage){echo " style = 'pointer-events:none' ";} ?> class="btn btn-info" href="<?= $url; ?>all-courses.php?page=<?= $page + 1; ?>">next</a>
                                    </div>
 
                                    <!--lastpage  =  (total no. of courses /  num of courses every page)-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->
    
    
    <?php include("$root/includes/footer.php") ?>