
<?php
	include 'scripts.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

<style>
	.select1{
		margin-left:-15px;
	}
	.cardThongKe{
		display:inline-block;
	}
	.card1{
		background: linear-gradient(to top right, #0033cc 0%, #66ccff 100%);
		width:250px;
		height:150px;
	}
	.card2{
		background: linear-gradient(to top right, #ff6600 0%, #ffcc00 60%);
		width:250px;
		height:150px;
	}
	.card3{
		background: linear-gradient(to top right, #00ff99 27%, #00ff00 92%);
		width:250px;
		height:150px;
	}
	.card-title{
		text-align:center;
	}
	.card-header{
		text-align:center;
		color:black;
		font-family: "Times New Roman", Times, serif;
		font-size:20px;
	}
	.card-body{
		text-align:left;
		color:black;
		font-family: "Times New Roman", Times, serif;
		font-size:20px;
	}
</style>

<div><h2>Thống Kê</h2></div>
<div>
	
	<div class="col-md-2 select1">
				
	</div>
	
	
</div>



<div> </div>
<div>
    <div class="col-md-2 select1">
        <select name="selectRole1" id="selectRole1" style="height:34px; padding-top: 6px; padding-bottom: 6px; padding-left: 12px; padding-right: 12px;">
            <option value="0">Ngày</option>
            <option value="1">Tháng</option>
            <option value="2">Quý</option>
        </select>
    </div>
    <div class="col-md-3">Từ Ngày: 
        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
    </div>  
    <div class="col-md-3">  Đến ngày:
        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
    </div>  
    <div class="col-md-4">  
        <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />
    </div>  
    <div style="clear:both"></div>                 
    <br/>   
</div>

<div class="table-responsive" id="tableTK">
    <!-- Table content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
$(document).ready(function(){
    $('#selectRole1').change(function(){
        var selectedOption = $(this).val();
        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var query = '';
        if(selectedOption == "0") { 
            var day = ("0" + currentDate.getDate()).slice(-2);
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            $('#from_date').val(year + "-" + month + "-" + day);
            $('#to_date').val(year + "-" + month + "-" + day);
            query = "SELECT * FROM tblhoadon WHERE DATE(NgayThang) = '" + year + "-" + month + "-" + day + "'";
        }
        else if(selectedOption == "1") { 
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            $('#from_date').val(year + "-" + month + "-01");
            $('#to_date').val(year + "-" + month + "-" + new Date(year, month, 0).getDate());
            query = "SELECT * FROM tblhoadon WHERE MONTH(NgayThang) = '" + (currentDate.getMonth() + 1) + "' AND YEAR(NgayThang) = '" + year + "'";
        }
        else if(selectedOption == "2") { 
            var quarter = Math.floor((currentDate.getMonth() + 3) / 3);
            var startQuarter, endQuarter;
            if (quarter === 1) {
                startQuarter = '01-01';
                endQuarter = '03-31';
            } else if (quarter === 2) {
                startQuarter = '04-01';
                endQuarter = '06-30';
            } else if (quarter === 3) {
                startQuarter = '07-01';
                endQuarter = '09-30';
            } else {
                startQuarter = '10-01';
                endQuarter = '12-31';
            }
            $('#from_date').val(year + "-" + startQuarter);
            $('#to_date').val(year + "-" + endQuarter);
            query = "SELECT * FROM tblhoadon WHERE MONTH(NgayThang) >= '" + startQuarter + "' AND MONTH(NgayThang) <= '" + endQuarter + "' AND YEAR(NgayThang) = '" + year + "'";
        }

        // Gọi AJAX để gửi truy vấn và hiển thị dữ liệu tương ứng
        $.ajax({
            url: 'get_data.php', // Đường dẫn tới file xử lý PHP
            method: 'POST',
            data: {
                query: query
            },
            success: function(response) {
                $('#tableTK').html(response);
            }
        });
    });

    // Code xử lý khi nhấn nút Filter và các phần khác...
});


</script>
 <style>
	.header{
		border-style: solid;
		border-color: Black;
	}
	.footer{
		border-style: solid;
		padding-top: 50px;
	}

	.left {
		border-style: solid;
		border-color: black;
		/* background:  #33ccff; */
	}
	.center {
		border-style: solid;
		border-color: black;
	}
	.col-md-2 div{
		margin-top: 20px;
		border-style: solid;
		border-color: black;
	}
	.col-md-2 div:hover{
		background-color: red;
	}
	.textfield {
		width: 100px;
	}
	a {
		color: black;
		font-size: 20px;
		
	}
	a:hover {
		text-decoration: none;
		color: black;
	}
	.trai {
		margin-top:10px; 
		margin-bottom:10px; 
		text-align:center;
		background-color: blanchedalmond;
	}
</style>