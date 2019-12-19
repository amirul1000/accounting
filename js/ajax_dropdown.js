function fillUpFee(feecategory_id)
{
    objselect = document.getElementById("fee_id");
    objselect.options.length = 0;
    $("#spinner2").html('<img src="../images/indicator.gif" alt="Wait" />');
    $.ajax({  
      url: '../registration/registration.php?cmd=fee&feecategory_id='+feecategory_id,
      success: function(data) {
              var obj = eval(data);    
              
              objselect.add(new Option('--select--',''), null);
              for(var i=0;i<obj.length;i++)
              {
                 text = obj[i].from_amount+" "+obj[i].to_amount;
                 objselect.add(new Option(text,obj[i].id), null);
              }
            $("#spinner2").html('');
          }
        });
}


function get_message(id)
    {
      $("#spinner").html('<img src="../../images/loader2.gif" alt="Wait" />');        
        $.ajax({
        type: "POST",
        url: 'send_sms.php?cmd=message',
        data: {
                id                : id
              },
        success: function(data) {
               $("#message").val(data);
               $("#spinner").html('');
            }
        });
    }
	
	
	
	if($("#chk_hide_confirm").is(":checked"))
		{
		   value = 'on';
		} 
		else
		{
		   value = '';
		}
