function findAlbums(page)
{
   var keyword = $('.keyword').val();
   
   if (page == undefined) {
      page = 1;
   }
     
    //let's do Ajax call here...
    $.get('/albumajax', { 'keyword' : keyword, 'page' : page  }, function(html) {
       //clear first to avoid append and duplicate element
       $(".loader").html("");
       
       var table = '<table class="table">'+
          '<tr>'+
         '<th>Title</th>'+
         '<th>Artist</th>'+
         '<th>&nbsp;</th>'+
         '</tr>';
     
         for (var i=0;i<html.paginator.length;i++) {
            table += '<tr>'+
               '<td>'+html.paginator[i].title+'</td>'+
               '<td>'+html.paginator[i].artist+'</td>'+
               '<td></td>'+
            '</tr>';
         }
         
         table +='</table>';
         
         $(".loader").html(table);
         
         //now, append with paginator partial
         var pagerlink = '<div>'+
                           '<ul class="pagination">';
        
        if (html.paginator_previous) {
               pagerlink += '<!-- Previous page link -->'+
                           '<li>'+
                              '<a href="javascript:void(0);" onclick="findAlbums('+html.paginator_previous+');">'+
                               '       &lt;&lt;'+
                          ' </a>'+
                       '</li>';
        } else {
            pagerlink += '<!-- Previous page link -->'+
                           '<li>'+
                              '<a onclick="javascript:void(0);return false;">'+
                               '       &lt;&lt;'+
                          ' </a>'+
                       '</li>';
        }
        
        for(var i=1;i<=html.paginator_lastPageInRange;i++) {
            if (i== html.paginator_current) {
               pagerlink +='<li class="active">'+
                         '<a onclick="javascript:void(0);return false;">'+i+'</a>'+
                     '</li>';
            } else {
               pagerlink +='<li>'+
                         '<a href="javascript:void(0);" onclick="findAlbums('+i+');">'+i+
                         '</a>'+
                     '</li>';

            }
        }
        
      if (html.paginator_next) {
               pagerlink += '<!-- Next page link -->'+
                           '<li>'+
                              '<a href="javascript:void(0);" onclick="findAlbums('+html.paginator_next+');">'+
                               '       &gt;&gt;'+
                          ' </a>'+
                       '</li>';
        } else {  
            pagerlink += '<!-- Next page link -->'+
                           '<li>'+
                              '<a onclick="javascript:void(0);return false;">'+
                               '       &gt;&gt;'+
                          ' </a>'+
                       '</li>';
        }
        
         pagerlink +='</ul>'+
     '</div>';

      $(".loader").append(pagerlink);
         
    }, 'json');
}

$(document).ready(function(){
    findAlbums(1);
});