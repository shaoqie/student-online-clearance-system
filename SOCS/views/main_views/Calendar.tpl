{* =============================================

Code for Calendar here......

================================================*}

<script> 
    
    
    //document.getElementById("idMonth").value = curMonth;
    //document.getElementById("idYear").value = curYear;
    
    function displayCalendar(finder){   
    var curDate = new Date();
    var curMonth = curDate.getMonth();
    var curYear = curDate.getFullYear();
    
    
    var htmlContent ="";
    var FebNumberOfDays ="";
    var counter = 1;
 
    //alert(finder);
    var dateNow = new Date();
    var month = dateNow.getMonth();
    var year = dateNow.getFullYear();
    
       
    if(finder != 0){
        //alert("wwwwe: " +parseInt(document.getElementById("idYear").value));
        dateNow.setMonth(parseInt(document.getElementById("idMonth").value));
        dateNow.setFullYear(parseInt(document.getElementById("idYear").value));
        
       // alert(dateNow.getFullYear());//
        if(finder == -1){
            if(parseInt(document.getElementById("idMonth").value) == 0){
                month = 11;
                year = dateNow.getFullYear() - 1;              
            }else{ 
                month = dateNow.getMonth() - 1;
                year = dateNow.getFullYear();
            }   
        }else if(finder == 1){
            if(parseInt(document.getElementById("idMonth").value) == 11){
                month = 0;
                year = dateNow.getFullYear() + 1;
            }else{
                month = dateNow.getMonth() + 1;
                year = dateNow.getFullYear();
            }
        }
        //year = dateNow.getFullYear();
    }
    
    //alert(year);
    //alert(month);

    var nextMonth = month+1; //+1; //Used to match up the current month with the correct start date.
    var prevMonth = month -1;
    var day = dateNow.getDate();   
 
    //alert(dateNow.getDay());
    
   // alert(document.getElementById("idMonth").value);
    
    
    
    
    
    //alert(month);
 
    //Determing if February (28,or 29)  
    if (month == 1){
    if ( (year%100!=0) && (year%4==0) || (year%400==0)){
    FebNumberOfDays = 29;
}else{
FebNumberOfDays = 28;
}
}
 
 
// names of months and week days.
var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];
var dayNames = ["Sunday","Monday","Tuesday","Wednesday","Thrusday","Friday", "Saturday"];
var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"]
 
 
// days in previous month and next one , and day of week.
var nextDate = new Date(nextMonth +' 1 ,'+year);
var weekdays= nextDate.getDay();
var weekdays2 = weekdays
var numOfDays = dayPerMonth[month];
     
 
 //alert(weekdays);
 
// this leave a white space for days of pervious month.
while (weekdays>0){
htmlContent += "<td class='monthPre'></td>";
 
// used in next loop.
weekdays--;
}
 
// loop to build the calander body.
while (counter <= numOfDays){
 
// When to start new line.
if (weekdays2 > 6){
weekdays2 = 0;
htmlContent += "</tr><tr>";
}
 
 
 
// if counter is current day.
// highlight current day using the CSS defined in header.
if (counter == day && month == curMonth && year == curYear){
htmlContent +="<td class='dayNow'  onMouseOver='this.style.background=\"#FF0000\"; this.style.color=\"#FFFFFF\"' "+
"onMouseOut='this.style.background=\"#FFFFFF\"; this.style.color=\"#00FF00\"'>"+counter+"</td>";
}else{
htmlContent +="<td class='monthNow' onMouseOver='this.style.background=\"#FF0000\"'"+
" onMouseOut='this.style.background=\"#FFFFFF\"'>"+counter+"</td>";    
 
}
    
weekdays2++;
counter++;
}
 
 
 
// building the calendar html body.
var calendarBody = "<table class='calendar'>" 
+"<tr class='monthNow'>"
+"<th><i style='cursor: pointer;' class='icon-arrow-left' onclick='displayCalendar(-1)'></i></th>"
+"<th colspan='5' id='month' value=" +month +">" +monthNames[month]+" "+ year +"</th>" 
+"<th><i style='cursor: pointer;' class='icon-arrow-right' onclick='displayCalendar(1)'></i></th>"
+"</tr>";

calendarBody +="<tr class='dayNames'>  <td>Sun</td>  <td>Mon</td> <td>Tues</td>"+
"<td>Wed</td> <td>Thurs</td> <td>Fri</td> <td>Sat</td> </tr>";
calendarBody += "<tr>";
calendarBody += htmlContent;
calendarBody += "</tr></table>";

var hidden =  "<input type='hidden' value=" +month +" id='idMonth'> "
              + "<input type='hidden' value=" +year +" id='idYear'>";
                
// set the content of div .
document.getElementById("calendar").innerHTML=calendarBody +hidden;
 //alert("wwwww: " +parseInt(document.getElementById("idYear").value));
}
</script> 
</head> 

<body onload="displayCalendar(0)"> 
    <div style="border-style: groove; border-top-left-radius: 5px; border-top-right-radius: 5px;">
        <h3>Calender</h1>
        <div style="border-style: groove; border-color: lightgrey;" id="calendar"></div>               
    </div>   
</body> 
<style> 
    .monthPre{
        color: gray;
        text-align: center;
    }
    .monthNow{
        color: blue;
        text-align: center;
    }
    .dayNow{
        border: 2px solid black;
        color: #FF0000;
        text-align: center;
    }
    .calendar td{
        htmlContent: 2px;
        width: 40px;
    }
    .monthNow th{
        background-color: #d4d4d4;
        color: #b94a48;
        text-align: center;
    }
    .dayNames{
        background: #0FF000;
        color: #FFFFFF;
        text-align: center;
    }

</style> 