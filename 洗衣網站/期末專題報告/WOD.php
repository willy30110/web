<?php
   $query = "SELECT " . "valid" . " FROM list";
   $query2 = "SELECT " . "id" . " FROM list";
   $query3 = "SELECT " . "WashOrDry" . " FROM list";
   $query4 = "SELECT " . "endd" . " FROM list";
   if ( !( $database = mysqli_connect( "localhost", "123", "123" ) ) )
       die( "Could not connect to database </body></html>" );
   if ( !mysqli_select_db($database,"infor" ) )
       die( "Could not open products database </body></html>" );
   if ( !( $result = mysqli_query($database, $query) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }
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
   if ( !( $result4 = mysqli_query($database, $query4) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }
   mysqli_close( $database );

   while ( $row = mysqli_fetch_row( $result ) )
   {
       foreach ( $row as $value )
        {
            print($value.",");
        }
   }
   print("/");
   while ( $row2 = mysqli_fetch_row( $result2 ) )
   {
       foreach ( $row2 as $value2 )
        {
            print($value2.",");
        }
   }
   print("/");
   while ( $row3 = mysqli_fetch_row( $result3 ) )
   {
       foreach ( $row3 as $value3 )
        {
            print($value3.",");
        }
   }
   print("/");
   while ( $row4 = mysqli_fetch_row( $result4 ) )
   {
       foreach ( $row4 as $value4 )
        {
            print($value4.",");
        }
   }
?>
