
function calculateTotal(){
	var total = '';
	var basic_salary = document.getElementById('basic_salary').value;
	var deduction = document.getElementById('deduction').value;
	var incentive = document.getElementById('incentive').value;
	var grand_total = document.getElementById('grand_total').value;
	
	basic_salary = parseFloat(basic_salary);
	deduction = parseFloat(deduction);
	incentive = parseFloat(incentive);

	total = (basic_salary - deduction) + incentive;

	document.getElementById('grand_total').value = total;
}

function printDiv(printSection) {
	document.getElementById('payBackBtn').style.visibility = 'hidden';     
	document.getElementById('payPrintBtn').style.visibility = 'hidden';  

	var printArea = document.getElementById(printSection).innerHTML;    
	var oldData = document.body.innerHTML;      
	document.body.innerHTML = printArea;
	window.print();     
	document.body.innerHTML = oldData;

	document.getElementById('payBackBtn').style.visibility = 'visible';     
	document.getElementById('payPrintBtn').style.visibility = 'visible';
}
