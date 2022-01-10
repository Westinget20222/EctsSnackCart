<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/snackStyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<form>
<div>
<div>
<div>Name:<div>
<div><input class="name" type ="text"></input></div>
<div><label for="lab">Choose the lab you are in :</label>
<select name="lab" id="Labs">
</select>

</div>
</div>
<div id ="productList"></div>
<button type="button">Submit Order</button>
<label type="text" id = "subtotal">$0.00</label >
</form>
<script>
///FormHead();
GetLabs();
GetSnacks();
CalculateSubtotal();

function CalculateSubtotal(){
   console.log("calc")
    ///let listOfProduct = $('.qtyBox').val(!0);   grabs it but grabs everythinng then resets it
    let listOfProduct = $('.qtyBox');
    var subtotal;
    for(let i = 0; i < listOfProduct.length; i++){
        if(listOfProduct[i].value != 0){
            //console.log(listOfProduct[i].getAttribute('data-price'));
            console.log(parseInt(listOfProduct[i].value));
            console.log(listOfProduct[i].getAttribute('data-price'));
            console.log(parseInt(listOfProduct[i].value) * parseInt(listOfProduct[i].getAttribute('data-price')));
            subtotal = parseInt(listOfProduct[i].value) * parseInt(listOfProduct[i].getAttribute('data-price'));
      }
    }
    //console.log(subtotal);
    //$('#subtotal').text() = subtotal.toString();
    console.log(listOfProduct);
}
///
///function FormHead(){
///
///}

function GetLabs() {
    var callback = function (respData) {
        $.each(respData, function (i, v) {
            $opt=$("<option>",{value:v.ID});
            $opt.text(v.ID + ' ('+v.FullName+')')
               $('#Labs').append($opt);


        }


        );
    }
    AJAXGetLabs(callback);
}



function GetSnacks() {
    var callback = function (respData) {
        $.each(respData, function (i, v) {
            $myDiv = $('<div>', {class:"FoodItem", "data-name": v.name});
            $myName = $('<div>', {class:"Name"});
            $myPrice = $('<div>', {class:"Price"});
            $qtbox = $('<input>', {"id":v.ID, "class": "qtyBox", "type":"number", "data-price":v.price});
            $myDiv.append("<img src='images/"+v.image+"'/>");
            $myName.append('<div>' + v.name + '<div>');
            $myPrice.append('<div>' + v.price + '<div>');
            $qtbox.change(function(){
                CalculateSubtotal();
            })
            ///$('form').append("<img src='images/"+v.image+"'/>" + v.name + " " + v.ID + " " + v.price + "</br>");
            $($myDiv).append($myName);
            $($myDiv).append($myPrice);
            $($myDiv).append($qtbox);

            $('#productList').append($myDiv);


        }
       // $submit = $("#formContainer");
       // $($submit).append('');
        //$(submit).append('<button type="button">Submit Order</button>')

        );
    }
    AJAXGetSnacks(callback);
}
function AJAXGetSnacks(callback) {
    $.ajax({
        method: "POST",
        url: "php/getSnack.php",
        //data: { issueObj :  issueObj},
        datatype: 'json'
    })
        .done(function (data) {
            callback(data);
        })
        .fail(function (data) {
            console.log("error processing request");
            console.log(data)
        })
        .always(function (data) {
            //console.log(data);
        });
}
function AJAXGetLabs(callback) {
    $.ajax({
        method: "POST",
        url: "php/getLabs.php",
        datatype: 'json'
    })
        .done(function (data) {
            callback(data);
        })
        .fail(function (data) {
            console.log("error processing request");
            console.log(data)
        })
        .always(function (data) {
            //console.log(data);
        });
}


/*
GetSnackData();

function printResults(snackJSON){
        // Response is automatically a json object
        $.each(snackJSON, function(i, v){
		$('form').append(v.id + " " + v.name + "<br>");
	
	});

}

function GetSnackData(){  //this would be the part where we hit the database: TEMPORARY
$.post(
    "GetSnackData.php",
    {},
    function(response){
	printResults(response);	
}, 
	'json' 
);



/*return [	{
		id: 1,
		name: "swiss rolls",
		price: .25,
		imageURL: "Air Fryer.jpg"
	},
	{
		id: 2,
		name: "water",
		price: .50,
		imageURL: "Air Fryer.jpg"
	}

		]
	*/
	//}

</script>

</body>

</html>


