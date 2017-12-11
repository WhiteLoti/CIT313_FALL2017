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
                       $('.post_removal').click(function(event){
                              remover(event);
                              
                       });
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
                </style>
 <?php } ?>
 <script>

       $('.post-loader').click(function(event){
           event.preventDefault();
           var el = $(this);
           $.ajax({
             url: el.attr('href'),
             type: 'GET',
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