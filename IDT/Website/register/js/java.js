
/*---------------------------- Showing Some Options ------------------------------------*/

function show (Case,year = '')
	{
		// Department
		if(Case == 'department')
		{
			$('.dep').show();

			if(year == '1st' || year == '2nd')
			{
				$(".dep option:not(:first)").hide();
				$(".dep optgroup").hide();
				$(document.getElementsByClassName('1&2')).show();
			}

			else
			{
				$(".dep optgroup").show();
				$(".dep option").show();
				$(document.getElementsByClassName('1&2')).hide();

				if(year == '3rd')
					{
						$(document.getElementsByClassName('4')).hide();
						$(".dep option[value='Architecture Engineering']").show();
						$(".dep option[value='Civil Engineering']").show();
					}

				else
					{
						$(document.getElementsByClassName('4')).show();
						$(".dep option[value='Architecture Engineering']").show();
						$(".dep option[value='Civil Engineering']").hide();
					}
			}
		}

	};

/*-------------------------------- Faculty Selection ------------------------------------*/

$(document).ready(
	function()
	{
		$(faculty).on('change', function(event) 
		{
			$(".year").show();

			if($(this).val()== 'Faculty Of Engineering')
				{
					$("#year option[value='Preparatory']").show();
					$(".Technical").show();
					
					if ($(year).val()!= 'Preparatory')
						show ('department',$(year).val());					
				}

			else
				{
					$("#year option[value='Preparatory']").hide();
					$("#department option").val("no") ;
					$(".dep").hide();
					$(".pref").show();
					$(".Technical").hide();
				}
		 });
	}
)

/*--------------------------------- Year Selection ------------------------------------*/

$(document).ready(
	function()
	{
		$(year).on('change', function(event) 
		{
			var selectedYear = $(this).val();

			if($(faculty).val() == 'Faculty Of Engineering' &&
				selectedYear != 'Preparatory')
				{
					show ('department',$(year).val());
					$(".Technical").show();
				}

			else 
				{
					$(".dep").hide();
					$(".pref").show();
					$(".Technical").hide();
				}
		});

		
	}
)

/*------------------------------- Department Selection ----------------------------------*/

$(document).ready(
	function()
	{
		$(department).on('change', function(event) 
		{
			var selectedDep = $(department).val();
			$('.pref').show();		

			if(selectedDep == 'Architecture Engineering' || 
			   selectedDep == 'Civil Engineering' ||
			   selectedDep == 'Irrigation of Hydraulics Engineering' ||
			   selectedDep == 'Structure Engineering' ||
			   selectedDep == 'Public Works' ||
			   selectedDep == 'Power and Electrical Machines Engineering')
				$(".Technical").hide();


			else if (selectedDep == 'Mechanical Engineering' ||
					selectedDep == 'Design and Production Engineering' ||
					selectedDep == 'Mechanical Power Engineering' ||
					selectedDep == 'Automotive Engineering')
			    	{
			    		$(".Technical").show();
			    		$(".pref option[value='SolidWorks']").show();
						$(".pref option[value='Python']").hide();
			    	}	

			else if (selectedDep == 'Mechatronics Engineering')
			{
				$(".Technical").show();
				$(".pref option[value='SolidWorks']").show();
				$(".pref option[value='Python']").show();
			}


			else if (selectedDep == 'Electrical Engineering' || 
				selectedDep == 'Computer and Systems Engineering' ||
				selectedDep == 'Electronics and Electrical Communication Engineering')
				{
					$(".Technical").show();
					$(".pref option[value='Python']").show();
					$(".pref option[value='SolidWorks']").hide();
				}	
		});

	}
)
/*------------------------------- Preferences Selection----------------------------------*/

$(document).ready(
	function()
	{		
		var selectedPref1 , selectedPref2;
		
		/*--- First Preference ---*/
		$(firstpref).on('change', function(event) 
		{		
			$(secondpref).find('option[value="'+selectedPref1+'"]').show();
			selectedPref1 = $(this).val();
			$(secondpref).find('option[value="'+selectedPref1+'"]').hide();


			if (selectedPref2 != 'Python' && selectedPref2 != 'SolidWorks')
				{
					$(".T").hide();
				}
	    });

		/*--- Second Preference ---*/
	    $(secondpref).on('change', function(event) 
		{
			$(firstpref).find('option[value="'+selectedPref2+'"]').show();
			selectedPref2 = $(this).val();
			$(firstpref).find('option[value="'+selectedPref2+'"]').hide();

			if (selectedPref2 == 'Python' || selectedPref2 == 'SolidWorks')
				$(".NT").hide();


	    });
	}
)



