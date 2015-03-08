/**
 * Created by Hristian on 08.03.2015.
 */
//<script type="text/javascript">
//$(function() {
//
//    $('.more_button').live("click",function()
//    {
//        var getId = $(this).attr("id");
//        if(getId)
//        {
//            $("#load_more_"+getId).html('<img src="load_img.gif" style="padding:10px 0 0 100px;"/>');
//            $.ajax({
//                type: "POST",
//                url: "more_content.php",
//                data: "getLastContentId="+ getId,
//                cache: false,
//                success: function(html){
//                    $("ul#load_more_ctnt").append(html);
//                    $("#load_more_"+getId).remove();
//                }
//            });
//        }
//        else
//        {
//            $(".more_tab").html('The End');
//        }
//        return false;
//    });
//    });
//
//</script>