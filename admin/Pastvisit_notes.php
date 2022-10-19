<?php
$visit_notes_list = true;
require_once "inc/header.php";
require_once "db/db.php";
$id = $_GET['id'];
$sql = "SELECT * FROM visit_notes WHERE patient_id = $id";
$notes = mysqli_query($db_connect,$sql);

$data = mysqli_fetch_assoc($notes);
//print_r($data)

//print_r($data);


?>
<div class="container-fluid mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title">Visit Notes List</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item active">Visit Notes List</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="row">

        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
               
           <a class="btn_color" href="visit_notes.php?id=<?php echo $id ?>">Create New visit Notes</a> 

           <h1 class="float-right" ><?php echo (isset( $data['patient_name']) ? $data['patient_name'] :'' )?> </h1>

         <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover text-center">
                <thead class="">
                
                    <tr>
                        <th>ProfileId</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php


                    foreach($notes as $note){

                       ?>

                        <tr >
                            <td>
                                
                                     <?php echo $note['patient_id'] ?></td>
                               
                                
                           
                            <td>
                        
                              
                                <?php echo $note['created_at']?></td>
                           
                            <td>
                                <a type="button" href="visitlistshow.php?id=<?php echo $note['id']  ?>" class="btn_color">View Visit Notes</a>
                            </td>
                        </tr>
                       <?php
                          };
                        ?>
                    
                       
                    </tbody>
                
            </table>
         </div>
         

            </div>

        </div>
    </div>

<?php
require_once "inc/footer.php";
?>