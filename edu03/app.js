
var personList = [];

$(function(){
	init();
});





//call initial data
function init(){

	$.ajax({
		type: "GET",
		url: "action_list.php",
		success: function(result){
			console.log(result);
	        personList = result;
	        displayTable()

		},
		dataType: "json"
	});	

}

function displayTable(){



	var retStr = "";
	retStr += "<table class='table table-hover'> ";
	retStr += "<tr><th>select</th><th>first name</th><th>last name</th><th>delete</th></tr>"


	for (var i=0; i< personList.length; i++){
		var tempPerson = personList[i];

		retStr += "<tr>";

		retStr += "<td><button class='btn btn-primary' onclick=selectRecord(" + i + ") > Select</button></td>";
		retStr += "<td>" + tempPerson["first_name"] + "</td>";
		retStr += "<td>" + tempPerson["last_name"] + "</td>";
		retStr += "<td><button class='btn btn-primary' onclick=deleteRecord(" + i + ") > Del</button></td>";
		retStr += "</tr>";
	}

	retStr += "</table>";
	$("#user").html(retStr);


}


function ajaxCall(dataObj){
	$.ajax({
		type: "POST",
		url: "action_aud.php",
		data: dataObj,
		success: function(result){},
		dataType: "json"
	});
	init();
}
function addData(){
	
	var dataObj = {
		action_type: 'ADD',
	    first_name: $("#first_name").val(),
	    last_name: $("#last_name").val() , 
	    system_id: 0
	};
	ajaxCall(dataObj)



}

function saveData(){
	
	var dataObj = {
		
	    first_name: $("#first_name").val(),
	    last_name: $("#last_name").val() , 
	    system_id: $("#system_id").val(),
	    action_type: $("#action_type").val()
	};

	ajaxCall(dataObj)

}

function deleteRecord(index){
	var record = personList[index];
	var dataObj = {
		action_type: 'DEL',
	    first_name: '',
	    last_name: '',
	    system_id: record.system_id 
	};
	ajaxCall(dataObj)

}

function openNewDetail(){
	$("#first_name").val(  "Test" );
	$("#last_name").val(  "Lee" );
	$("#system_id").val(  0 );
	$("#action_type").val("ADD");
	$("#person_detail").show(); //show

}

function closeDetail(){
	$("#person_detail").hide(); //show
}

function selectRecord(index){
	var record = personList[index];
	console.log(record);

	$("#first_name").val(  record.first_name );
	$("#last_name").val(  record.last_name );
	$("#system_id").val(  record.system_id );
	$("#action_type").val("MOD");
	
	$("#person_detail").show(); //show

}

