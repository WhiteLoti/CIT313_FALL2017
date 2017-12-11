// Creates ajax upload
var final =
{
   ajax: function(data, callback)
   {
       var url = window.location.href;
       var path = url.lastIndexOf('/');
       var full_path = url.substring(0, path);
       var o = new XMLHttpRequest();
       o.open("POST",full_path+'/upload',true);
       o.send(data);
       o.onreadystatechange = function()
       {
          if(o.readyState == 4 && o.status == 200)
          {
              callback(o.responseText);
          }
       }
   }, 
   upload: function(data)
   {
       var data = new FormData(document.getElementById('picture_form'));
       final.ajax(data, final.result);
   },
   result: function(o)
   {
       // Insert the new location in the src link
   }
   
}
window.onload = function()
{
   document.getElementById('upload_picture').addEventListener('change',final.upload);
}
