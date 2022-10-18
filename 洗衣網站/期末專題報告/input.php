<?php
   $id=$_POST["id"];
    $pattern="/[1-7]{1}[0-3]{1}[0-9]{1}[A-D]{1}/";
    if(!preg_match($pattern,$id))
    {
        print("輸入錯誤！");
        exit();
    }
   $beghour=$_POST["hbeg"];
   $begmin=$_POST["mbeg"];
   $endhour=$_POST["hend"];
   $endmin=$_POST["mend"];
   $WOD=$_POST["WOD"];
   $query2="SELECT"." *"." FROM"." `list`"." WHERE"." `WashOrDry` =".$WOD." "."AND"." `valid` = 1";
    if ( !( $database = mysqli_connect( "localhost", "123", "123" ) ) )
       die( "Could not connect to database </body></html>" );
    if ( !mysqli_select_db($database,"infor" ) )
       die( "Could not open products database </body></html>" );
   
   if ( !( $result = mysqli_query($database, $query2)) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }
   $row = mysqli_fetch_row( $result ) ;
   if($WOD==1)
   {
    if($row[5]==1)
        $query="INSERT INTO"."`list` (`num`, `id`, `beg`, `endd`, `WashOrDry`, `valid`) "."VALUES"." (NULL, '".$id."', '".$beghour.":".$begmin."', '". $endhour.":". $endmin."', '1', '0')";
    else
        $query="INSERT INTO"."`list` (`num`, `id`, `beg`, `endd`, `WashOrDry`, `valid`) "."VALUES"." (NULL, '".$id."', '".$beghour.":".$begmin."', '". $endhour.":". $endmin."', '1', '1')";
   }
   if($WOD==0)
   {
    if($row[5]==1)
        $query="INSERT INTO"."`list` (`num`, `id`, `beg`, `endd`, `WashOrDry`, `valid`) "."VALUES"." (NULL, '".$id."', '".$beghour.":".$begmin."', '". $endhour.":". $endmin."', '0', '0')";
    else
        $query="INSERT INTO"."`list` (`num`, `id`, `beg`, `endd`, `WashOrDry`, `valid`) "."VALUES"." (NULL, '".$id."', '".$beghour.":".$begmin."', '". $endhour.":". $endmin."', '0', '1')";
   }
    mysqli_query($database, $query);
    mysqli_close( $database );
    print("預約成功！");
?>
