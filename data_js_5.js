
	$(document).ready( function() {
	    let now = new Date();
	 
	    let day = ("0" + now.getDate()).slice(-2);
	    let month = ("0" + (now.getMonth() + 1)).slice(-2);

	    let today = (day)+"-"+(month)+"-"+ now.getFullYear();


	   $('#datePicker').val(today);
	    
	    $('#datebtn').click(function(){
	        
	        testClicked();
	        
	    });
	});
	function testClicked()
	{
	  $('.getDate').html($('#datePicker').val());
	}

	function add_newmember(){
		var data_member = $('#new_data').serializeArray();
		console.log("add");
		$.ajax({
			url:'phpdata/add_newmember.php',
			type:'post',
			data:data_member,
			success:function(res){
				swal("Success!", " สมัครสมาชิกเรียบร้อย !! ", "success");
				 location.reload();
			},error: function (error) {
				alert('error JAJA ' + eval(error));
			
				 location.reload();
			}
		})
	}

	function add_newworker(){
		var data_member = $('#new_data').serializeArray();
		$.ajax({
			url:'phpdata/add_newworker.php',
			type:'post',
			data:data_member,
			success:function(res){
				swal("Success!", " สมัครสมาชิกเรียบร้อย !! ", "success");
				 location.reload();
			},error: function (error) {
				alert('error JAJA ' + eval(error));
				 location.reload();
			}
		})
	}

	function worker(){
		$('#workonly').load("workonly_2.php");
		// $('#submit_addnew').attr('onclick','add_newworker()');
		
	}

	function member(){
		 $('#workonly').html(" ");
		//  $('#submit_addnew').attr('onclick','add_newmember()')

	}
	function page_login(){
		var data_login = $('#data_login').serializeArray();
		$.ajax({
			url:'phpdata/page_login.php',
			type:'post',
			data:data_login,
			success:function(res){
				if (res === 'member') {
					swal(" Hello Member ! ")
					.then((value) => {
						window.location.replace('index.php');
					  });
				
				}
				else if(res === 'worker'){
				
					swal(" Hello Worker ! ").then((value)=>{
						window.location.replace('index.php');
					});
					
				}
				else {
					swal("Username or Password INCORRECT **!!");
					
				}
			}
		});
	}
	$('#review').load('review.php');