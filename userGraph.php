<script>  
var uid = localStorage.getItem('uid');
if(typeof uid != "null" &&  uid != null  && uid.length != 0 )
{

}else{
	window.location.href="/";
}
</script>
<?php
	$companyid 		= $_REQUEST['companyId'];
	$userid		 	= $_REQUEST['userid'];
	include('include/config.php');
	include('Sidebars/sideBarforGraph.php');
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>

<style type="text/css">
.highslide-container {
    display: none;
}
</style>

<script type="text/javascript">

$(document).ready(function(){
    $("#loader").show();
	$('#dropdown,#updateChk ,#addBtn').hide();
	$('#userGraph_Name').show();
	var path 		= location.pathname;
	var companyid	= "<?php echo $companyid;?>";
	var userid		= "<?php echo $userid;?>";
    $(".breadcrumb").hide();
	db.collection("Companies").doc(companyid).get().then(function(doc) {
		if(typeof doc.data() != "undefined" && doc.data().name != undefined && doc.data().name != "null") {
            $('#CompanyTag').html(doc.data().name);
            $('#Companynamecrumb').html(doc.data().name);
        }      
	});

	db.collection("Users").doc(userid).get().then(function(doc) {
		
			$('#userGraphName').html(doc.data().name);
            $(".breadcrumb").show();
			$('#loader').hide();

    });

    var currentDate = moment();
    var weekStart = moment().startOf('isoWeek');
    var weekEnd = moment().endOf('isoWeek');
    var lastweek =  moment().subtract(6, 'weeks').startOf('week');
    var curr = new Date; // get current date
    var firstDate = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
    var firstdayWeek = new Date(curr.setDate(firstDate));
    var data = weekStart.format("D-MM-YYYY");
    var datesf = data;
    var datesf1 = datesf.split("-");
    var newDatef = datesf1[1]+"/"+datesf1[0]+"/"+datesf1[2];
      
    //var lastweek 	=  moment().subtract(6, 'weeks').startOf('week');
    var lastweek = moment(firstdayWeek).add(-42, 'days');
    var data2 		= lastweek.format("D-MM-YYYY");
    
    var dates2f 	= data2;
    var datesf2 	= dates2f.split("-");
    var newDate2f 	= datesf2[1]+"/"+(parseInt(datesf2[0])+1)+"/"+datesf2[2];
    var fnlDate 	= new Date(newDate2f).getTime()/1000;
    console.log("fnlDate---------", fnlDate);
    var datesDurationArray = {};
    var firstDate 	= '';
    var nextWeek 	= ''
    for(var i=6; i>=0; i--) {
        firstDate = moment(firstdayWeek).add(-7*i, 'days').add('00', 'hours').add('00', 'minutes').add('00', 'seconds').format("YYYY-MM-DDTHH:mm:ss");
        var next = i-1;
        nextWeek = moment(firstdayWeek).add(-6*next, 'days').add('23', 'hours').add('59', 'minutes').add('59', 'seconds').format("YYYY-MM-DDTHH:mm:ss");
        datesDurationArray[(moment(firstDate).valueOf()+'-'+moment(nextWeek).valueOf()).toString()] = 0;
    	
    }
    console.log("datesDurationArray---------------------------", datesDurationArray)

    function checkDateExist(data){
    	var date = data.createdAt;
        var currentDate = new Date();
        var timeZoneDifference = currentDate.getTimezoneOffset();

        var nd = date - (timeZoneDifference * 60);
        var duration = data.duration;
        
    	for(var k in datesDurationArray) {
    		var splitKey = k;
    		splitKey = splitKey.split('-');
            if(nd>=(parseInt(splitKey[0])/1000) && nd<=(parseInt(splitKey[1])/1000)) {
                var oldValue = datesDurationArray[k];
                datesDurationArray[k] = oldValue + duration;
                return;
          	}
    	}
        
    }
    function getWeekNumber(d) {
        // Copy date so don't modify original
        d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
        // Set to nearest Thursday: current date + 4 - current day number
        // Make Sunday's day number 7
        d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
        // Get first day of year
        var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
        // Calculate full weeks to nearest Thursday
        var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
        // Return array of year and week number
        return [d.getUTCFullYear(), weekNo];
    }
	var dataVal	=	db.collection("Events").where('userId','==', userid).where("createdAt", ">" , fnlDate);

	dataVal.get().then(function(querySnapshot) {
		querySnapshot.forEach(function(doc) {
			checkDateExist(doc.data());
		});
        var FinalArray = [];
        var countData = 0;
        var durationArray = [];
        for(var k in datesDurationArray) { 
            var splitKey = k;
            splitKey = splitKey.split('-');
            FinalArray[countData] = [];
            FinalArray[countData].push(splitKey[0].toString());
            //FinalArray[countData].push(Math.round(datesDurationArray[k]/60));
            FinalArray[countData].push(parseInt(datesDurationArray[k]/60));
            durationArray.push(parseInt(datesDurationArray[k]/60));
            //FinalArray[countData].push(datesDurationArray[k]);
            countData++;
        }
        
        Array.prototype.max = function() {
          return Math.max.apply(null, this);
        };

        Array.prototype.min = function() {
          return Math.min.apply(null, this);
        };
        var startDate = dates2f.split('-');
        var maxValue = durationArray.max();
        console.log("maxValue------------", maxValue);
        if(maxValue > 0) {
            maxValue = 60 * Math.ceil(maxValue/60)
        } else {
            maxValue = 60;
        }
        var tickInterval = maxValue/6;
        //var 60 * ceil(121/60);
        $('#container').highcharts({

            chart: {

            },
            xAxis: {
                tickInterval: 1,
                labels: {
                    enabled: true,
                    useHTML: true,
                    formatter: function() { 
                        var index_value = parseInt(FinalArray[this.value][0]);
                        var startDate = moment(index_value).format('MM/DD');
                        var endDate = moment(index_value).add(6, 'days').format('MM/DD');
                        var result = getWeekNumber(new Date(index_value));
                        return '<div style="text-align:center;"><span style="font-size:12px;">W'+result[1]+'<br/>'+startDate+'-<br/>'+endDate+'</span></div>';
                    },
                }
            },
            yAxis: {
                min: 0,
                max: maxValue,
                tickInterval: tickInterval,
                title: {
                    text: 'Minutes'
                },
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '<td style="padding:0;"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true,
            },
            series: [{
                name: 'Week',
                data: FinalArray     
            }]
        });
    });
    console.log("userid---------------", userid);
    db.collection("Consecutive").doc(userid).get().then(function(querySnapshot) {
        var consecutiveData = querySnapshot.data();
        console.log("consecutiveData-----------", consecutiveData);
        if(typeof consecutiveData != "undefined" && consecutiveData != undefined && consecutiveData != "null" && consecutiveData != "") {
            var durationData = Math.round(consecutiveData.duration/60);
            $("#cumulative-minutes").text(durationData+" min(s)");
            var difference = (consecutiveData.recentDate) - new Date().getTime();

            var recentDate = moment(consecutiveData.recentDate*1000).format('YYYY-MM-DD');
            recentDate = recentDate.split('-');
            var currentDate = moment(new Date()).format('YYYY-MM-DD');
            currentDate = currentDate.split('-');
            var a = moment([currentDate[0],currentDate[1], currentDate[2]]);
            var b = moment([recentDate[0],recentDate[1], recentDate[2]]);
            daysDifference = a.diff(b, 'days') // 1
            if(daysDifference>0) {
                daysDifference = daysDifference +1;
            }
            if(daysDifference == 0 || daysDifference < 0) {
                daysDifference = 1;
            }
            $("#days-viewed").text(daysDifference+" day(s)")
        }
        
    });
})
</script>

<?php   include($basePath.'/footer.php'); ?>
