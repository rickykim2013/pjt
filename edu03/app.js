//This global array will store all the persons data as array.
var personList =[];

init();
//call initial data
function init(){
	$.ajax({
		type: "GET",
		url: "list_db.php",
		success: function(result){
	        personList = result;
	        displayTable();
		},
		dataType: "json"
	});	

}

//This function will be called at the first time 
function displayTable(){
	var retStr = '<table>';
	retStr += '<tr>';
	retStr += '<th>name</th>';
	retStr += '<th>email</th>';
	retStr += '</tr>';
		
	for (i =0 ; i < personList.length;i++){
		var personRecord =  personList[i];
		retStr += '<tr>';
		retStr += '<td>' + personRecord["first_name"] + " " + personRecord["last_name"] +'</td>';
		retStr += '<td>' + personRecord["email"] +'</td>';
		retStr += '</tr>';
		
	}
	retStr += '</table>';
	document.getElementById("grid").innerHTML = retStr;
}



function saveData(){
	
	var personRecord =  personList[num];


	var paramStr = $('#my-form').serializeArray();
	var bar = '1111';
	var calibri = 'tttt';
	var dataObj = {
	    first_name: $("#first_name").val(),
	    last_name: $("#last_name").val(),
	    email: $("#email").val()
	};

	$.ajax({
		type: "POST",
		url: "add.php",
		data: dataObj,
		success: function(result){},
		dataType: "json"
	});
	init();
	closeDetail();

}


function openDetail(){
	$("#person_detail").show(); //show

}
function closeDetail(){
	$("#person_detail").hide(); //show

}
