$(function() {
   // Warning when delete an item
   //
   $('.btn-delete-action').click(function(ev) {
      ev.preventDefault();
      var answer = confirm('Bạn có chắc chắn muốn xóa bản ghi này?');
      if (answer) return window.location.href = $(this).attr('href');
      else return false;
   });

   // Handle when hover on active button
   //
   $('.btn-active-action')
      .hover(toggleStyleEditBtn, toggleStyleEditBtn)
      .click(function(e) {
         e.preventDefault();
         var $this = $(this);
         $.ajax({
            url : $this.attr('href'),
            type : 'GET',
            dataType : 'json',
            beforeSend: function() {
               // initSpin();
            },
            success : function(data) {
               $(document).trigger('action_active_success');
               // stopSpin();
               if(data.code === 1) {
                  if(data.status == 1) {
                     $this.html('<i class="fa fa-check-square fa-2x"></i>');
                  }else{
                     $this.html('<i class="fa fa-square-o fa-2x"></i>');
                  }
               }else{
                  alert(data.message);
               }
            }
         })
      });

   $('.btn-active').click(function(e) {
      e.preventDefault();
      var _this = $(this);
      $.ajax({
         url: _this.attr('href'),
         type: 'GET',
         dataType: 'json',
         success: function(data) {
            if(data.code == 1) {
               if(data.status == 1) {
                  _this.html('<i class="fa fa-check-square"></i>');
               }else {
                  _this.html('<i class="fa fa-square"></i>');
               }
            } else {
               alert(data.messages);
            }
         }
      });
   });

   $('.checkbox_all').click(function(ev) {
      var that = $(this);
      that.parents('.checkbox-list').find('.checkbox-child').prop('checked', that.is(':checked'));
   });

   $('.date-picker').datepicker({
      numberOfMonths: 3,
      showButtonPanel: true,
      dateFormat : 'dd/mm/yy'
   });

   $.datepicker.regional['vi'] = {
      closeText: 'Đóng',
      prevText: '&#x3c;Trước',
      nextText: 'Tiếp&#x3e;',
      currentText: 'Hôm nay',
      monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
      'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Thg Mười Một', 'Tháng Mười Hai'],
      monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
      'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
      dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
      dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
      weekHeader: 'Tu',
      dateFormat: 'dd/mm/yy',
      firstDay: 0,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: '',
      // minDate: new Date(),
      // maxDate: new Date(now.getFullYear(), now.getMonth() + 3, now. getDate())
   };
   $.datepicker.setDefaults($.datepicker.regional['vi']);

   // Select 2
   $('.select2').select2();


   // TinyMCE - Config
   tinymce.init({
      selector: ".editor-content",
      width: '99%',
      height: 250,
      // ===========================================
      // INCLUDE THE PLUGIN
      // ===========================================

      plugins: [
         "advlist autolink lists link image charmap print preview anchor",
         "searchreplace visualblocks code fullscreen",
         "insertdatetime media table contextmenu paste jbimages"
      ],

      // ===========================================
      // PUT PLUGIN'S BUTTON on the toolbar
      // ===========================================

      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
      toolbar2: "link unlink anchor | image media | forecolor backcolor  | print preview code ",
      // ===========================================
      // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
      // ===========================================

      style_formats: [
         {title: 'Bold text', inline: 'b'},
         {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
         {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
         {title: 'Example 1', inline: 'span', classes: 'example1'},
         {title: 'Example 2', inline: 'span', classes: 'example2'},
         {title: 'Table styles'},
         {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
      ],

      relative_urls: false,

      image_advtab: true ,

      // external_filemanager_path:"/filemanager/",
      // filemanager_title:"Responsive Filemanager" ,
      // external_plugins: { "filemanager" : "/assets/js/tinymce4x/plugins/responsivefilemanager/plugin.min.js"}
   });
});

/**
 * Preview image before upload
 * @param  event
 * @return img dom
 */
function fileSelect(evt) {
   if (window.File && window.FileReader && window.FileList && window.Blob) {
      var files = evt.target.files;
      var result = '';
      var file;
      for (var i = 0; file = files[i]; i++) {
         // if the file is not an image, continue
         if (!file.type.match('image.*')) {
            continue;
         }

         reader = new FileReader();
         reader.onload = (function (tFile) {
            return function (evt) {
               var div = document.createElement('div');
               div.className = "img-preview-wrapper";
               div.innerHTML = '<img class="img-preview" src="' + evt.target.result + '" />';
               console.log(div);
               $('.preview-uploader').html(div);
            };
         }(file));
         reader.readAsDataURL(file);
      }
   } else {
      alert('The File APIs are not fully supported in this browser.');
   }
}


/**
 * Hàm thay đổi style class cho nút active
 */
function toggleStyleEditBtn () {
   var _btn = $(this).find('i');
   if (_btn.hasClass('fa-check-square')) {
      _btn.removeClass('fa-check-square').addClass('fa-square-o fa-2x');
   } else {
      _btn.removeClass('fa-square-o').addClass('fa-check-square fa-2x');
   }
}