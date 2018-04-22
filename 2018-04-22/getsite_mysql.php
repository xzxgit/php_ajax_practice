<?php
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
if (empty($q))
{
    echo "select a website";
    exit;
}
$con = mysqli_connect("localhost", "root", "root");
if(!$con)
{
    die("count not connect" . mysqli_error($con));
}
mysqli_select_db($con, "websites");
mysqli_set_charset($con, "utf8");
$sql="SELECT * FROM websites where id = '".$q."'";
$result=mysqli_query($con, $sql);
echo "<table border='1'>
<tr>
<th>ID</th>
<th>websitename</th>
<th>website</th>
<th>ajaxsort</th>
<th>country</th>
</tr>";
while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['url']."</td>";
    echo "<td>".$row['alexa']."</td>";
    echo "<td>".$row['country']."</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
