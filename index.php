<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="60" />
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				$('#hideadvanced').change(function(){
						var checked = $('#hideadvanced').is(":checked");
						console.log(checked);
						var id = 4,
						col = $("table tr th:nth-child("+id+"), table tr td:nth-child("+id+")");
						checked ? col.hide() : col.show();
						var id = 5,
						col = $("table tr th:nth-child("+id+"), table tr td:nth-child("+id+")");
						checked ? col.hide() : col.show();
			});
			});
			window.onload = function () {
				$("table tr th:nth-child(4), table tr td:nth-child(4)").hide();
				$("table tr th:nth-child(5), table tr td:nth-child(5)").hide();
			}
		</script>
		<style>
		table {
			width:50%;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
			text-align: left;
		}
		table tr:nth-child(even) {
			background-color: #eee;
		}
		table tr:nth-child(odd) {
		   background-color:#fff;
		}
		table th {
			background-color: black;
			color: white;
		}
		</style>
	</head>
		<body>
			<table id='seriestable'>
				<col id="sname"/>
				<col id="slatest"/>
				<col id="stime"/>
				<col id="squality"/>
				<col id="smethod"/>
			<?php
				$badtext = array("There is a FlexGet process already running for this config, sending execution there.","Use `flexget series show NAME` to get detailed information", "Your locale declares ascii as the filesystem encoding", "Make sure your locale env variables are set up correctly for the environment");
				$out = array();
				exec('sudo -u USERNAMERUNNINGFLEXGET -H /scripts/showseries.sh', $out);
				$first = True;
				foreach($out as $line){
					$drop = FALSE;
					foreach($badtext as $test){
						if(strpos($line,$test) !== FALSE){
							$drop = TRUE;
						}
					}
					if($drop !== TRUE){
						if($first == TRUE){
							echo "<tr><th>Series Name</th><th>Latest Episode</th><th>Time since last download</th><th>Download Quality</th><th>Episode Identification Method</th></tr>";
							$first = FALSE;
						} else {
							$printline = str_replace("|","</td><td>",$line);
							echo "<tr><td>", $printline, "</td></tr>";
						}
					}
				}
			?>
		</table>
		<p>
		<input type="checkbox" name="hideadvanced" id='hideadvanced' value="hideadvanced" checked>hide advanced<br>
	</body>
</html>