<button class="btn btn-primary" onclick="$('#addUser').toggle()">Créer un utilisateur</button> <br />

<table class="table table-bordered" id="addUser" style="display:none">
	<tr>
	<td>
		<input type="text" placeholder="Username" id="Username" />
		<input type="password" placeholder="Password" id="Password" />
		<button class="btn btn-default" onclick="CreateUser()">Créer</button>
	</td>
	</tr>
</table>
<?php
	$output = array();
	$command = 'cat /etc/passwd | grep "/home/" | cut -d: -f1';
	
	$line = exec($command,$output);

	$nbUsers = count($output);
	
	echo $nbUsers." utilisateur".($nbUsers>1 ? "s":"")." : <br />";
?>

	

	<table class="table table-striped">
	<tr>
		<th style="text-align:center">Utilisateur</th>
		<th style="text-align:center">Password</th>	
		<th style="text-align:center">Actions</th>	
	</tr>
	

<?php
	for($i = 0; $i< count($output);$i++)
	{
		?>
	<tr>
		<td style="text-align:center"><?php echo $output[$i]; ?></td>
		<td style="text-align:center">***</td>
		<td style="text-align:center">

<span class="glyphicon glyphicon-cog" onclick="UpdateUser('<?php echo $output[$i]; ?>')" style="cursor:pointer;font-weight:bold;color:orange"></span>
<span class="glyphicon glyphicon-remove" onclick="DeleteUser('<?php echo $output[$i]; ?>')" style="cursor:pointer;font-weight:bold;color:red"></span>

</td>
	</tr>
	<?php
	}
	
	
	//$line = implode("<br />\n", $output);
	//echo $line;

?>
</table>

<script type="text/javascript">
	function CreateUser()
	{
		var name = $("#Username").val();
		var password = $("#Password").val();
		$.ajax({
			url: "AddUser.php",
			data:{ 
				username : name,
				password: password			
			},
			success: function(data){
				if(data != "")
				{
					alert(data);
				}
				else{
					location.reload(true);
				}
				
			}			
		});
	}

	function DeleteUser(user)
	{
		var conf = confirm('T SUR TU VE LE SUPR?') ;
		if(!conf) return;
		$.ajax({
			url: "DelUser.php",
			data:{ 
				username : user			
			},
			success: function(data){
				location.reload(true);
			}			
		});
	}
</script>

