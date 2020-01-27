<style>
	.search-css{background: linear-gradient(lightgray,gray);height:100%;padding-top: 20px;margin-top: -10px;position: fixed;margin-top: 50px;}
  @media only screen and (max-width: 1200px) {
     .search-css{position: static;margin-left:0px;margin-top: 50px;height: auto;}
}
 @media only screen and (max-width: 1300px) {
     .ads-css{height: 280px}

}
</style>
<div class="col-xs-12 col-sm-12 col-lg-3 search-css">
        <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <select name="department" class="form-control">
              <option value="">Department</option>
            <?php
             $select=mysqli_query($connection,"SELECT * FROM doctor_detail");
             while ($result=mysqli_fetch_array($select)) {  
            ?>
            <option value="<?php echo $result['doctor_department']; ?>"><?php echo $result['doctor_department']; ?></option>
            <?php }  ?>
          </select>
        </div>
         <div class="form-group ">
          <select name="city" class="form-control">
            <option value="">City</option>
             <?php
              $select=mysqli_query($connection,"SELECT * FROM doctor_city");
             while ($city=mysqli_fetch_array($select)) {  
            ?>
            <option value="<?php echo $city['city']; ?>"><?php echo $city['city']; ?></option>
            <?php }  ?>
          </select>
          <?php echo $city; ?>
        </div>
         <div class="form-group">
          <select name="from_fee"  class="form-control">
            <option value="">Form Fee Range</option>
              <?php
              $select=mysqli_query($connection,"SELECT * FROM doctor_fee");
             while ($fee=mysqli_fetch_array($select)) {  
            ?>
            <option value="<?php echo $fee['fee']; ?>"><?php echo $fee['fee']; ?></option>
            <?php }  ?>
          </select>
        </div>
         <div class="form-group">
          <select name="to_fee" class="form-control">
            <option value="">To Fee Range </option>
             <?php
              $select=mysqli_query($connection,"SELECT * FROM doctor_fee");
             while ($fee=mysqli_fetch_array($select)) {  
            ?>
            <option value="<?php echo $fee['fee']; ?>"><?php echo $fee['fee']; ?></option>
            <?php } ?>
          </select>
        </div>
          <input type="submit" name="find" class="btn btn-block" value="Find Doctor Here" style="background-color: black; color: white; font-size: 16px">
      </form>
      <a href="#"><img src="../admin/image/1.jpg" width="100%" height="330" class="ads-css"></a>
      </div><!--search col is end-->
      