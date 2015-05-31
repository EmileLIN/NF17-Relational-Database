<?php
include "global.php";

Class commonfunctions
{
	
	public static function dateFormer($day,$month,$year,$separator)
	{
		$date = $day.$separator.$_SESSION["MonthMap"][$month].$separator.$year;
		return $date;	
	}
	
	
	public static function HTML_header()
	{
		?>
			<head>
   		 <title>Kube Web Framework</title>

    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />

    	<link rel="stylesheet" href="../css/kube.min.css" />

			<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
   		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
    	<script src="../js/kube.min.js"></script>
			
			</head>
		<?php	
	}
	
	public static function projectHeader()
	{
		commonfunctions::HTML_header();
		?>
			<style>
				.accordion-panel{
					display:none;
				}
			</style>
			<script type="text/javascript">
						$(document).ready(function(){
							$('.accordion-title').click(function(){
								$(this).siblings().slideToggle("slow");
								var obj = $(this).siblings().find('p'); 
								
								$.ajax({
									type: 'GET',
									url: 'projectView.php',
									data: 'proj='+$(this).parentsUntil('tbody').children("td.name").find('p').html()+'/'+$(this).parentsUntil('tbody').children("td.datedebut").html(),
									//dataType: 'json',
									success: function(msg){
										obj.html(msg);
									}
								});
							});
						});
			</script>
			
			<h1>La liste des projets correspondant à votre recherche</h1>
			<table class="table-stripped">
    			<thead>
        		<tr>
           	 <th>Nom de projet</th>
           	 <th>Date de debut</th>
           	 <th>Date de fin</th>
           	 <th>Proposition</th>
           	 <th>Options</th>
        		</tr>
    			</thead>
    			<tbody>
    <?php
	}
	
	public static function projectLister($data,$count)
	{ 
    		?>
        	<tr id="<?php echo $count;?>">
            <td class="name"><p id="<?php echo "proj_name".$count; ?>"><?php echo $data[0];?></p></td>
            <td class="datedebut"><?php echo $data[1];?></td>
            <td><?php echo $data[2];?></td>
            <td><?php echo $data[3];?></td>
            <td>
            	<ul class="blocks-3">
    						<li>
    							<div id="<?php echo "accordion".$count;?>">
    								<div id="<?php echo "title".$count;?>" class="accordion-title" >View</div>
    								<div id="<?php echo "panel".$count;?>" class="accordion-panel">
    									<p id="<?php echo "result".$count;?>"></p>
    								</div>
									</div>
								</li>
    						<li><a id="update1" href="#" class="btn">Update</a></li>
   			 				<li><a href="#" class="btn">Delete</a></li>
							</ul>
            </td>
        	</tr>     			
<?php	
	}

	public static function projectFooter()
	{
?>
				</tbody>
			</table>
<?php
	}
}

?>