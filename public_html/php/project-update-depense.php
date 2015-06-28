<?php
	include "connect.php";
	$vConn = fConnect();
	
	if($_GET["depense"])
	{
			$tab = explode("/",$_GET["depense"]);
			
			$id = $tab[0];
			$date = $tab[1];
			$montant = $tab[2];
			$type = $tab[3];
			$demandeur = $tab[4];
			$validateur = $tab[5];
			$proj_name = $tab[6];
			$proj_datedebut = $tab[7];
			
			$valide = TRUE;
			
			#demandeur should be in this projet
			if($demandeur != NULL && $demandeur != '')
			{
				if(commonfunctions::isMemberinAProject($vConn,$demandeur) == FALSE)
				{
					$valide = FALSE;
					echo "Warning: Le demandeur n'est un membre de ce projet";
				}
			}
			else
			{
				echo "Warning: Le demandeur ne peut pas etre null";
				$valide =FALSE;
			}
			
			if($validateur != NULL && $validateur != '')
			{
				if(commonfunctions::isMemberTheChef($vConn,$validateur) == FALSE)
				{
					$valide = FALSE;
					echo "Warning: Le validateur n'est un chefdeprojet ou il n'est pas un membre de ce projet";
				}
			}
			else
			{
				echo "Warning: Le validateur ne peut pas etre null";
			}
			
			
			
			if($type == 'null')
			{
				$type = 'NULL';
			}
			
			if($id != '' && $demandeur != '' && $validateur != '' && $proj_name != '' && $proj_datedebut != '' && $valide == TRUE)
			{
				$query_depense = "INSERT INTO depense ".
												 "VALUES(".$id.",'".$date."',".$montant.
												 ",".$type.",'".$demandeur."','".$validateur.
												 "','".$proj_name."','".$proj_datedebut."')";
												 		
				//echo $query_depense;
				
				$result = pg_query($vConn, $query_depense);
				
				if($result != FALSE)
				{
					echo "Insertion reussie";
				}
				else
				{
					echo "Insertion echoue";
				}
			}
			else
			{
				echo "ERROR: Reremplir la formulaire,svp";	
			}
				
			
	}
?>
