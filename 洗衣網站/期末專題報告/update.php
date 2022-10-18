<?php
   $id=$_POST["id"];
   $nowhour=$_POST["hnow"];
   $nowmin=$_POST["mnow"];
   $endhour=$_POST["hend"];
   $endmin=$_POST["mend"];
   $WOD=$_POST["WOD"];
    if($nowhour>$endhour)
        $query="DELETE"." FROM"." `list`"." WHERE"." `list`.`id` = '".$id."' AND"." `list`.`WashOrDry` = ".$WOD." AND"." `list`.`valid`= 1";
    else if($nowhour==$endhour)
        if($nowmin>=$endmin)
            $query="DELETE"." FROM"." `list`"." WHERE"." `list`.`id` = '".$id."' AND"." `list`.`WashOrDry` = ".$WOD." AND"." `list`.`valid`= 1";
        else
        {
            print("不是不取，時候未到！");
            exit();   
        }
    else
    {
        print("不是不取，時候未到！");
        exit();   
    }

    if ( !( $database = mysqli_connect( "localhost", "123", "123" ) ) )
       die( "Could not connect to database </body></html>" );
    if ( !mysqli_select_db($database,"infor" ) )
       die( "Could not open products database </body></html>" );
    mysqli_query($database, $query);

    $query2 = "SELECT " . "valid" . " FROM list";
    $query3 = "SELECT " . "WashOrDry" . " FROM list";
    $query5 = "SELECT " . "num" . " FROM list";
    if ( !( $result2 = mysqli_query($database, $query2) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }
    if ( !( $result3 = mysqli_query($database, $query3) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }
   if ( !( $result5 = mysqli_query($database, $query5) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }


    while ( $row2 = mysqli_fetch_row( $result2 ) )
   {
        $row3 = mysqli_fetch_row( $result3 );

        $row5 = mysqli_fetch_row( $result5 );

        if($row2[0]==0&&$row3[0]==$WOD)
        {
            $query4="UPDATE"." `list`"." SET"." `valid` = '1'"." WHERE"." `list`.`num` = ".$row5[0];
            break;
        }
   }
    mysqli_query($database, $query4);

    mysqli_close( $database );
    print("取出成功，請快使用洗衣機，避免耽誤時程！");
?>
