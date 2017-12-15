   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL?>views/js/bootstrap.min.js"></script>
    <?php
      if($u->isAdmin())
      {
    ?>
   <script src="<?php echo BASE_URL?>application/plugins/tinyeditor/tiny.editor.packed.js"></script>
    <script>
			var editor = new TINY.editor.edit('editor', {
				id: 'tinyeditor',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});
                        var editors = new TINY.editor.edit('editors', {
				width: 584,
				height: 175,
				cssclass: 'tinyeditors',
				controlclass: 'tinyeditors-control',
				rowclass: 'tinyeditors-header',
				dividerclass: 'tinyeditors-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editors',
				footerclass: 'tinyeditors-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});
			function remover(event)
                        {
                             // current elements top most parent
                             var el = event.target.parentNode;
                             // current elements href
                             var href = event.target.getAttribute('href');
                             // store as element
                             var p = el;
                             // store as jquery object
                             el = $(el);
                             $.ajax({
                                url: href,
                                type: 'POST',
                                data: el.serialize(),
                                success: function($data)
                                {
                                    var t = p.parentNode;
                                    t.removeChild(p);
                                }
                             });
                        }
                            $(document).ready(function(){
                       $('.post_removal').click(function(event){remover(event);});
       });
		</script>
                <style>
                    .delete {border: 1px solid;
                             border-radius: 2px;
                             padding: 0 6px;
                             position: absolute;
                             right: 0;
                             top: 8px;
                             z-index: 2}
                   .unselectable {border: 1px solid #CCC;
                             padding: 4px 12px;
                             border-radius: 4px;
                             width: 200px;}
                   .approved {border: 1px solid #4b9f1d;
                             padding: 4px 12px;
                             border-radius: 4px;
                             width: 200px;
                             background-color: #3cb521;
                             color: white;}
                   .waiting {border: 1px solid #CCCCCC;
                             border-radius: 4px;
                             padding: 4px 12px;
                             display: block;
                             width: 200px;
                             background-color: #EEEEEE;
                             color: black;
                   }
                   .waiting:link
                   {
                    color: black;
                    text-decoration: none;
                   }
                   .waiting:hover
                   {
                    color: black;
                   }
                   .waiting:active
                   {
                    background-color: #BBBBBB;
                    color: #666666;
                   }
                </style>
 <?php } ?>
 <script>
       $('.action-btn').click(function(e)
       {
          e.preventDefault();
          var el = e.target;
          var href = $(el).attr('href');
          el = el.parentNode.parentNode;
          var uID = el.firstElementChild.getAttribute('value');
          var data = {'uID':uID};
          $.ajax({
             data: data,
             url: href,
             type: "POST",
             success: function(data)
             {
               data = JSON.parse(data);
               var action = data['action'];
               var message = data['message'];
               var messageNode = document.getElementById('message');
               messageNode = $(messageNode);
               if($(messageNode).children().length > 0)
               {
                  $(messageNode).children('div').each(function(){this.remove()});
               }
               $(messageNode).append(message);
               if(action == 'delete')
               {
                  el.parentNode.removeChild(el);
               }
             }
          });
       });
       $('#apps').click(function(e){
         var element = e.target.id+'_app';
         element = '#'+document.getElementById(element).id;
         $(element).css({'display':'block'});
       });
       $('.api').submit(function(e){
          e.preventDefault();
          var url = e.target.getAttribute('action');
          var el = $(e.target);
          var result = el.find('.result');
          var el = el.serialize();
          $.ajax({
            data: el,
            url: url,
            type: "POST",
            success: function(data)
            {
               if($(result).children().length == 0)
               {
                  $(result).append(data);
               }
               else
               {
                  $(result).children('br').each(function(){this.remove()});
                  $(result).children('div').each(function(){this.remove()});
                  $(result).append(data);
               }
            }
          });
       });
       $('.close').click(function(e)
       {
          var element = e.target.parentNode;
          $(element).css({'display':'none'});
       });
       $('.post-loader').click(function(event){
           event.preventDefault();
           var el = $(this);
           $.ajax({
             url: el.attr('href'),
             type: 'POST',
             success: function($data){
               el.replaceWith($data);
             }
           });
       });

       $('.form').click(function(event){
          event.preventDefault();
          var el = event.target.parentNode;
          el = $(el);
          $.ajax({
             url: el.attr('action'),
             type: 'POST',
             data: el.serialize(),
             success: function(data){
               var ta = document.getElementById('comment_form');
               ta = ta.getElementsByTagName('textarea')[0];
               ta.value = 'Write A Comment';
               $('#comments').prepend(data);
               if(typeof($('#load_comments')) != 'undefined')
               {
                   $('#load_comments').remove();
               }
             }
          });

    });
 </script>



  </body>
</html>