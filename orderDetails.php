<?php
include_once("php/_access.php");
access();
include_once("config.php");
?>

<!DOCTYPE html>
<html class=" ">
<?php require_once('head.php'); ?>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<style>
 .chatbody {
  height: 350px;
  border-bottom:2px solid #D3D3D3;
  border-radius: 1px;
  overflow-y: scroll;
  padding-top:5px;
  width:100%;
  margin-top:10px;
 }
 .msg {
   display: block;
   position: relative;
   margin-bottom:15px;
   padding-bottom:10px;
 }
 .other{
   position: relative;
   margin-left:0px;
   width:80%;
   margin-right:auto;
   text-align: left !important;
 }
 .other .content {
   background-color: #F8F8FF;
   border-top-right-radius: 5px;
   border-bottom-right-radius: 5px;
   text-align: left !important;
 }

 .mine {
   position: relative;
   width:80%;
   margin-right: 2px;
   text-align: right;
 }
 .mine .content {
   background-color: #008B8B;
   color:#F8F8FF;
   border-top-left-radius: 5px;
   border-bottom-left-radius: 5px;
 }

 .content{
   position: relative;
   padding:5px;
   padding-left:15px;
   padding-right:15px;
   min-width:10px;
   max-width:80%;
   font-size: 16px;
   color:#000000;
   margin:0 !important;
   display: inline-block;
 }
.name {
  position: relative;
  display: inline-block;
  font-size:10px;
  margin-bottom:2px;
}
.time {
  display:inline-block;
  position: relative;
  font-size: 10px;
  color: #696969;
  margin-top:2px;
}
.inputs {
  margin-bottom:20px;
}
.chat-btn:hover{
  color: #F8F8FF;
  text-decoration: none;
}

.chat-btn {
  display: block;
  background-color: #F96332;
  color:#F8F8FF;
  text-align: center;
  padding: 2px;
   box-shadow: 0 5px 30px 0 rgba(0,0,0,.11),0 5px 15px 0 rgba(0,0,0,.08)!important;
}
.chat-btn span{
  width: 100%;
  height: 100%;
  display: block;
}

.input-chat-send {
  height: 40px !important;
  border-top-left-radius: 5px !important;
  border-bottom-left-radius: 5px !important;
}
.btn-chat-send {
  height: 40px;
  border-top-right-radius: 5px !important;
  border-bottom-right-radius:5px !important;
}
.input-field .prefix ~ textarea {
  margin-right: 2.6rem;
}

</style>

<body class="html" <?php echo $config['theme-config']; ?>>
  <?php include_once('pre.php'); ?>



  <!-- START navigation -->
  <?php include_once('top-menu.php'); ?>
  </li>
  <li class="copy-spacer"></li>
  <li class="copy-wrap">
    <div class="copyright">&copy; Copyright @ themepassion</div>



    </ul>
    <!-- END navigation -->



  </li>
  </ul>
  <div class="container">
    <div class="section">
      <!-- <button type="button" class="waves-effect waves-light btn red lighten-2 col s12 ">محادثه</button> -->
      <div class="divider"></div>
    </div>
  </div>
  <!-- ============================= -->
  <div class="container">

    <div class="row ">
      <div class="col s12 pad-0">
        <a class="col s12 waves-effect waves-light btn modal-trigger" href="#chat">محادثه</a>
      </div>
    </div>
    <div class="row ">
      <div class="col s12 pad-0">
        <div class="row bot-0">
          <div class="col s12">
            <ul id="tabs-swipe-demo" class="tabs tabs-swipable-ul tabs-fixed-width z-depth-1">
              <li class="tab col s3"><a class="active" href="#details">تفاصيل الطلب</a></li>
              <li class="tab col s3"><a href="#tracking">تتبع الطلب</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div id="details" class="col s12 z-depth-1">
              <div class="" id="order-details">

              </div>
            </div>
            <div id="tracking" class="col s12  z-depth-1">
              <div class="" id="orderTimeline">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="chat" class="modal bottom-sheet modal-fixed-footer" style="max-height: 80%;">
    <div class="modal-content">
      <h4>المحادثه</h4>
      <div class="col-12 chatbody" id="chatbody">

      </div>
    </div>
    <div class="modal-footer">
    <div class="row">
                <button type="button" class="modal-close waves-effect waves-green btn-flat col s2" data-dismiss="modal">اغلاق</button>
                <textarea id="message" style="font-size: 20px;" placeholder="اكتب هنا..." class="col s8"></textarea>
                <button onclick="sendMessage()" style="font-size: 20px;" class="col s2 mdi btn-lg mdi-send  waves-effect waves-green btn-flat col s2" type="button">ارسال</button>
    </div>
    </div>
  </div>
  <input type="hidden" id="order_id" value="<?php echo $_GET['o'] ?>">
  <input type="hidden" id="user_id" value="<?php echo $_SESSION['userid']; ?>" />
  <input type="hidden" id="user_branch" value="<?php echo $_SESSION['user_details']['branch_id']; ?>" />
  <input type="hidden" id="user_role" value="<?php echo $_SESSION['role']; ?>" />
  <input type="hidden" value="<?php echo $_GET['notification']; ?>" id="notification_seen_id" />
  <?php include_once('footer.php'); ?>
  <?php include_once('bottom-menu.php'); ?>

  <!-- PWA Service Worker Code -->

  <script type="text/javascript">
    // This is the "Offline copy of pages" service worker

    // Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

    // Check compatibility for the browser we're running this in
    if ("serviceWorker" in navigator) {
      if (navigator.serviceWorker.controller) {
        console.log("[PWA Builder] active service worker found, no need to register");
      } else {
        // Register the service worker
        navigator.serviceWorker
          .register("pwabuilder-sw.js", {
            scope: "./"
          })
          .then(function(reg) {
            console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
          });
      }
    }
  </script>


  <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

  <!-- CORE JS FRAMEWORK - START -->
  <script src="assets/js/jquery-2.2.4.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- CORE JS FRAMEWORK - END -->


  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
  <script type="text/javascript">
    $(document).ready(function() {
      $(".tabs").tabs();
    });
  </script>
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


  <!-- CORE TEMPLATE JS - START -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/settings.js"></script>

  <script src="assets/js/scripts.js"></script>

  <!-- END CORE TEMPLATE JS - END -->


  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      $('.preloader-background').delay(10).fadeOut('slow');
    });
  </script>
  <script type="text/javascript" src="scripts/getCities.js"></script>
  <script type="text/javascript" src="scripts/getStores.js"></script>
  <script>
    function getorder() {
      $.ajax({
        url: "php/_getOrder.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val()
        },
        success: function(res) {
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              $("#order-details").append(
                '<h2 class="text-center right-10">' + this.order_status + '</h2>' +
                '<h3 class="text-center">' + this.store_name + '</h3>' +
                '<h4 class="text-center">' + this.order_no + '</h4>' +
                '<table style="width:100%;" class="table-striped">' +
                '</thead><tr><th class="text-right right-10">النص</th><th>القيمة</th></th></thead>' +
                '<tbody>' +
                '<tr><td class="text-right right-10">اسم الزبون</td><td>' + this.customer_name + '</td></tr>' +
                '<tr><td class="text-right right-10">هاتف الزبون</td><td>' + this.customer_phone + '</td></tr>' +
                '<tr><td class="text-right right-10">اسم المندوب</td><td>' + this.driver_name + '</td></tr>' +
                '<tr><td class="text-right right-10">رقم هاتف المندوب</td><td>' + this.driver_phone + '</td></tr>' +
                '<tr><td class="text-right right-10"><br />العنوان<br /></td><td>' + this.city + ' | ' + this.town + '<br />' + this.address + '</td></tr>' +
                '<tr><td class="text-right right-10">مبلغ الوصل</td><td>' + this.price + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ المستلم</td><td>' + this.new_price + '</td></tr>' +
                '<tr><td class="text-right right-10">سعر التوصيل</td><td>' + this.dev_price + '</td></tr>' +
                '<tr><td class="text-right right-10">الخصم</td><td>' + this.discount + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ الصافي</td><td>' + this.client_price + '</td></tr>' +
                '</tbody>' +
                '</table>'

              );
            });
          } else {
            $("#order-details").append(
              '<h1 class="text-danger text-center">لا يوجد معلومات</h1>'
            );
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    $(document).ready(function() {
      getorder();
      OrderTracking($('#order_id').val());
      $(".modal").modal();
      $(".tabs").tabs();
      // $("#tabs-swipe-demo").tabs({
      //   swipeable: true
      // });
    });

    function OrderChat(id, last) {
      if (id != $("#order_id").val()) {
        chat = 1;
        $("#chatbody").html("");
      } else {
        chat = 0;
      }
      $("#order_id").val(id);

      $.ajax({
        url: "php/_getMessages.php",
        type: "POST",
        data: {
          order_id: $("#order_id").val(),
          last: last
        },
        beforeSend: function() {

        },
        success: function(res) {
          if (res.success == 1) {
            if (res.last <= 0) {
              $("#chatbody").html("");
            }
            $.each(res.data, function() {
              clas = 'other';
              if (this.is_client == 1) {
                name = this.client_name
                role = "عميل"
                if (this.from_id == $("#user_id").val()) {
                  clas = 'mine';
                }
              } else {
                name = this.staff_name
                if (this.from_id == $("#user_id").val() && this.is_client == 1) {
                  clas = 'mine';
                }
                role = this.role_name;
              }
              message =
                "<div class='row'>" +
                "<div class='msg " + clas + "' msq-id='" + this.id + "'>" +
                "<span class='name'>" + name + " ( " + role + " ) " + "</span><br />" +
                "<span class='content'>" + this.message + "</span><br />" +
                "<span class='time'>" + this.date + "</span><br />" +
                "</div>" +
                "</div>"
              $("#chatbody").append(message);
              $("#last_msg").val(this.id);
            });
            $("#chatbody").animate({
              scrollTop: $('#chatbody').prop("scrollHeight")
            }, 100);
            $("#spiner").remove();
          }

        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function sendMessage() {
      $.ajax({
        url: "php/_sendMessage.php",
        type: "POST",
        data: {
          message: $("#message").val(),
          order_id: $("#order_id").val()
        },
        beforeSend: function() {
          $("#chatbody").append('<div id="spiner" class="spiner"></div>');
        },
        success: function(res) {
          OrderChat($("#order_id").val(), $("#last_msg").val());
          $("#chatbody").animate({
            scrollTop: $('#chatbody').prop("scrollHeight")
          }, 100);
          $("#message").val("");
          $("#message").focus();
          console.log(res);
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    var mychatCaller;
    mychatCaller = setInterval(function() {
      OrderChat($("#order_id").val(), $("#last_msg").val());
      console.log($("#order_id").val());
    }, 1000);


    function OrderTracking(id) {
      $.ajax({
        url: "php/_getOrderTrack.php",
        data: {
          id: id
        },
        beforeSend: function() {

        },
        success: function(res) {
          $("#orderTimeline").html('');
          $("#orderTimeline").append('<div class="timeline-deco"></div>');
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              address = "";
              if (this.order_status_id == 1) {
                icon = "fa-list";
                color = "blue1-light";
              } else if (this.order_status_id == 2) {
                icon = "fa-list";
                color = "blue1-light";
              } else if (this.order_status_id == 3) {
                icon = "fa-vehicle";
                color = "magenta2-dark";
              } else if (this.order_status_id == 4) {
                icon = "fa-hands";
                color = "green2-dark";
              } else if (this.order_status_id == 5) {
                icon = "fa-list";
                color = "yellow2-dark";
              } else if (this.order_status_id == 6) {
                icon = "fa-list";
                color = "red1-dark";
              } else if (this.order_status_id == 7) {
                icon = "fa-list";
                color = "orange-dark";
              } else if (this.order_status_id == 8) {
                icon = "fa-list";
                color = "blue1-dark";
                address = '<p class=" center-text color-theme top-5 bottom-0 font-12">' + 'تغير العنوان الى: ' + this.new_address +
                  '</p>';
              } else if (this.order_status_id == 9) {
                icon = "fa-list";
                color = "brown1-dark";
                9
              } else {
                icon = "fa-list";
                color = "blue1-light";
              }
              if (this.note != null) {
                note = this.note;
              } else {
                note = "";
              }

              $("#orderTimeline").append(
                '<div class="timeline-item">' +
                '<i class="fa ' + icon + ' bg-' + color + ' shadow-large timeline-icon"></i>' +
                '<div class="padding-none  timeline-item-content shadow-large round-small">' +
                '<p class="font-14 top-10 thin color-' + color + ' center-text">' + this.status + '<br />' + this.date + '<br />' + this.hour + '</p>' +
                '<p class=" center-text color-theme  bottom-0 font-12">' + note + '</p>' +
                //'<p class="color-'+color+' center-text color-theme top-5 bottom-0 font-14">عدد القطع: '+this.items_no+'</p>'+
                '' + address +
                '</div>' +
                '</div>'
              );
            });
          } else {
            $("#orderTimeline").append("<h4 class='text-center text-danger'>لا يوجد معلومات</h4>")
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    if ($("#notification_seen_id").val() > 0) {
      $.ajax({
        url: "php/_setNotificationSeen.php",
        type: "POST",
        data: {
          id: $("#notification_seen_id").val()
        },
        success: function(res) {
          console.log(res);
        }
      });
    }
  </script>
</body>

</html>