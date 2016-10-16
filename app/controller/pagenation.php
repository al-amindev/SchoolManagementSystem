<?php 
$num_rec_per_page=2;
mysql_connect('localhost','root','');
mysql_select_db('blog');
$gpage=$_GET['page'];
if (isset($gpage)) { $page  = $gpage; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page;
$sql = "SELECT * FROM post LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?> 
<table>
	<tr><td>Title</td><td>Details</td></tr>
	<?php 
	while ($row = mysql_fetch_assoc($rs_result)) { 
		?> 
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['details']; ?></td>            
		</tr>
		<?php 
	}; 
	?> 
</table>
<?php 
$sql = "SELECT id FROM post";
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 
echo "Total Page:$total_pages";
echo "<a href='pagenation.php?page=1'>".'|<'."</a> "; // Goto 1st page  
for ($i=1; $i<$total_pages; $i++) { 
	echo "<a href='pagenation.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='pagenation.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
