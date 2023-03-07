
<?php require_once('../connection.php');?>
<?php
 $rate_list='';
 $checkType='';
if(isset($_POST['check'])){
    $toprate=mysqli_real_escape_string($conp,$_POST['toprate']);
    

    if($toprate=='trveondor'){

        $checkType=true;
        $query="select rp.regiproviderID,rp.providerName , Round(avg(p.rate),1) as avRate 
        from providerrate as p, regiprovider as rp where 
        rp.regiProviderID=p.providerID group by p.providerID order by avRate desc;";
        //echo"<script>alert('vendor')</script>";

        $toprate=mysqli_query($conp,$query);
        if($toprate){
            while($toprate1=mysqli_fetch_assoc($toprate)){
                $providerName=$toprate1['providerName'];
                $providerID=$toprate1['regiproviderID'];
                $avRate=$toprate1['avRate'];
                
                $rate_list.="<tr>";
                //$rate_list.="<td>{$toprate1['regiProviderID']}</td>";
                $rate_list.="<td>$providerName</td>";
                $rate_list.="<td>$avRate</td>";
                $rate_list.="<td><a href=\"toprateprovider.php?id=$providerID\"><button class='btn btn-primary btn-sm'>View</button></a></td>";
                $rate_list.="</tr>";
                
                
            }
         }
         else{
            echo "Database query failed";
         }
    }
    else{
        $checkType=false;
        $query="select rp.providerName,p.packageID,s.serviceName,p.packageName,COUNT(*) as 
        count from bookingprice as bp, regiprovider as rp, package as p, 
        service as s where bp.regiProviderID=rp.regiProviderID and bp.serviceID = s.serviceID and
         bp.packageID=p.packageID group by bp.packageID;";
         //echo"<script>alert('package')</script>";

         $toprate=mysqli_query($conp,$query);
         if($toprate){
             while($toprate1=mysqli_fetch_assoc($toprate)){
                $p=$toprate1['packageID'];
                 
                 $rate_list.="<tr>";
                 $rate_list.="<td>{$toprate1['providerName']}</td>";
                 $rate_list.="<td>{$toprate1['serviceName']}</td>";
                 $rate_list.="<td>{$toprate1['packageName']}</td>";
                 $rate_list.="<td><a href=\"topratepackage.php?id=$p\"><button class='btn btn-primary btn-sm'>View</button></a></td>";
                 $rate_list.="</tr>";
                 
             }
          }
          else{
             echo "Database query failed";
          }
    }
   


   
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cssStyle1.css" />
    <title>Top Rate</title>
</head>

<body>
<section class="text-center">
  <!-- Background image -->
  <div class="p-2 bg-image" style="background-image: url('../frontend/img/6.jpg'); height: 300px;">
        </div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(10px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Top Rate</h2>
                   
            <!--dropdown menu-->
            <form action="" method="POST">  
            <div class="form-group col-md-5">
                    <select id="inputState" name="toprate" class="form-control">
                    <option value="trveondor">Top Rate Vendors</option>
                    <option value="trpackage">Top Rate Packages</option>
                    </select>
        </br>
            </div>

           <!--check booking type button -->
        <div class="col-md-1" >               
                <div>
                <button type="submit" name="check" class="btn btn-warning">  Check  </button>
                </div>                     
        </div>
       </form>
    <?php if($checkType){ ?>
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Top Rate list</h3>
                    <div class="col">
                       
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Vendor</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">View</th>
                                    
                                </tr>
                            </thead>
                            <?php echo $rate_list; ?>
                        </table>
                    </div>
                    <a href="front.php"><button type="button" class="btn btn-info">Back</button> </a>
                </div> <?php } else {?>
                    <div class="row my-5">
            
                    <div class="col">
                       
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Vendor</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">View</th>
                                    
                                </tr>
                            </thead>
                            <?php echo $rate_list; ?>
                            
                        </table>
                    </div>
                    <a href="front.php"><button type="button" class="btn btn-info">Back</button> </a>
                </div> <?php }?>
    </div>
      </div>
    </div>
  </div>
</section>
   
    <!--Print table -->
  

            </div>
        </div>
    </div>

    </div>
    

</body>
</html>

