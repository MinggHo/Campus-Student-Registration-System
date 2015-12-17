<html>
<head>
<script src   ="../assets/js/jquery.min.js"></script>
<script>

function fetch_select(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select").innerHTML=response;
     }
   });
}

</script>

    </head>

   <body>
     <p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
	 <center>
     <div id="blok">
       <select onchange="fetch_select(this.value)">
         <option>Select Block</option>
         <?php
         $host = 'localhost';
         $user = 'root';
         $pass = '';

         mysql_connect($host, $user, $pass);
         mysql_select_db('csrs');

         $select=mysql_query("select name from block");
         while($row=mysql_fetch_array($select))
         {
          echo "<option>".$row['name']."</option>";
         }
         ?>
       </select>
     </div>

	   <div id="select_box">
         <select onchange="fetch_select(this.value);">
           <option>
              Select Floor
           </option>
           <?php
             $host = 'localhost';
             $user = 'root';
             $pass = '';

             mysql_connect($host, $user, $pass);
             mysql_select_db('csrs');

             $select=mysql_query("select floor_ai from floor");
             while($row=mysql_fetch_array($select))
             {
              echo "<option>".$row['floor_ai']."</option>";
             }
           ?>
         </select>

         <select id="new_select">
         </select>

       </div>
	 </center>
   </body>
</html>
