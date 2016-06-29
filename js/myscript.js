 $(document).ready(function() 
    {   
        

        $('body').on('click','.delete_order',function(event)
          {                // $('#loading').show();                 
                event.preventDefault(); 
                var id = $(this).attr("id"); 
                    del_url = $(this).attr("href"); 
                                   
                 var x =new Object();                             
                x = {
                    'id':id,
                    };
                var r=confirm("Are you sure to Delete?")
                if (r==true) 
                {  
                $(this).closest("tr").fadeOut();                              
                $.ajax({
                    url: del_url,
                    cache:false,
                    type: 'POST',
                    data: x,
                    success: function(data) 
                    {         

                        
                    },              
                });
             
             }
           });


        $('body').on('click','#callStatusUpdate',function(event)
          {                // $('#loading').show();                 
                event.preventDefault(); 
                var id = $(this).attr("tid"); 
                    value = $(this).attr("val"); 
                    $(this).fadeOut(); 
                    $("#showSelect-"+id).find("span#selectedbox").html("loading...");
                    $.ajax
                  ({
                      type: "POST",
                      url: "admin/callStatusUpdate",
                      data: {id:id,value:value},
                      success: function(data) 
                        {                              
                          jQuery("#showSelect-"+id).find("span#selectedbox").html(data);
                        }
                  });  


           });



        $('body').on('change','[id=situation]',function(event)
          {    


               
                var sit=$(this).val();  
                    t_id = $(this).attr('tid');
                if (sit==1)
                {
                 $(this).css("background", "#769876");
                 $("#row-"+t_id).removeClass('unsend').addClass('send');
                }
else if (sit==0)
                {
                $(this).css("background", "#39CCCC");
                $("#row-"+t_id).removeClass('send').addClass('unsend');
                 }
                else if (sit==2)
                {
                $(this).css("background", "#3C8DBC");
                $("#row-"+t_id).removeClass('send').addClass('unsend');
                 }
                else if (sit==3)
                {
                $(this).css("background", "#D73925");
                $("#row-"+t_id).removeClass('send').addClass('unsend');
                 }
                else if (sit==4)
                {
                $(this).css("background", "#660032");
                $("#row-"+t_id).removeClass('send').addClass('unsend');
                 }
                else if(sit==5)
                {
                    $("#row-"+t_id).removeClass('send').addClass('unsend');
                }

                 else
                 {
                    $(this).css("background", "#dddddd");
                    $("#row-"+t_id).removeClass('send').addClass('unsend');
                 }

                 var url_insert = $(this).attr('url');
                     
                     
                  $.ajax
                  ({
                      type: "POST",
                      cache:false,
                      url: url_insert,
                      dataType: 'json',
                      data: {t_id:t_id,sit:sit},
                      success: function(res) 
                        {
                          if (res)
                         {
                            jQuery("div#pwrapper").fadeIn();
                            jQuery("#pend-"+t_id).find("span.situat").html(res.pending);
                             jQuery("#pend-"+t_id).find("span#pending_sit").html(res.pending_sit);
                          }
                        }
                  });  




           });

        

        $('[id=confirm_sit]').on('click',function(event)
        {
            event.preventDefault();
              var pending = $(this).attr("pending");
                  url     = $(this).attr("href");
                  change = $(this).attr("change");              
                  $.ajax
                  ({
                      type: "POST",
                      cache:false,
                      url: url,
                      dataType: 'html',
                      data: {pending:pending,change:change},
                      success: function(data) 
                        {
                          if (data)
                         {
                            jQuery("div#pwrapper").fadeIn();
                            jQuery("#pend-"+change).find("span.situat").html(data);
                            jQuery("#pend-"+change).find("#confirm_sit").remove();
                             
                          }
                        }
                  });  

        });  


});



