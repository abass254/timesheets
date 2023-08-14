// var jq = jQuery;

// /*Start Notification after calling jQuery*/
// "use strict";

// var connection = new signalR.HubConnectionBuilder().withUrl("/notificationhub").build();
// connection.on("UpdateNotifications", function () {
//     GetNotifications();
// });

// connection.start().then(function () {
//     /* Action when connection is establised */
// }).catch(function (err) {
//     return console.error(err.toString());
// });

// jq(function () {
//     jq('button.button-notification').click(function () {
//         ParseNotificationTime();
//     });

//     jq('div.notifications-container').on('click', 'div.notifications-container-hub', function(){
//         var idnt = jq(this).data('idnt');
//         var read = jq(this).data('read');
//         var urls = jq(this).data('urls');

//         if (read == false){
//             jq.ajax({
//                 url: '/notifications/mark/read',
//                 type: 'POST',
//                 data: {
//                     id : idnt
//                 },
//                 success: function(result){
//                     window.location.href = urls;
//                 }
//             });
//         }
//         else {
//             window.location.href = urls;
//         }
//     });

//     $('button.btn-nav-link').click(function(){
//         window.location.href  = $(this).attr('aria-link');
//     });
// });

// function GetNotifications() {
//     jq.ajax({
//         url: '/Home/GetNotifications',
//         method: 'GET',
//         success: (result) => {
//             var count = 0;
//             jq("div.notifications-container").empty();
//             jq.each(result, function (i, item) {
//                 if (item.read == false) {
//                     count++;
//                 }

//                 var itm = '<div class="notifications-container-hub vertical-timeline-item dot-' + item.theme + ' vertical-timeline-element" data-idnt="' + item.id + '" data-read="' + item.read + '" data-urls="' + item.urls + '">';
//                 itm += '<div><span class="vertical-timeline-element-icon bounce-in"></span><div class="vertical-timeline-element-content bounce-in">';
//                 itm += '<h4 class="timeline-title"><span class="' + (item.read == false ? "font-weight-bold" :  "") + '">' + item.title + '</span></h4>';
//                 itm += '<small class="notifications-meta text-' + item.theme + ' ' + (item.read == false ? "font-weight-bold" :  "") + '"><time datetime="' + item.date + '+03:00"></time></small><span class="vertical-timeline-element-date"></span></div>';
//                 itm += '<div class="vertical-timeline-element-content bounce-in"><p>' + item.description + '</p></div></div></div>';

//                 jq("div.notifications-container").append(itm);

//                 if (item.read == false && item.popped == false){
//                     title.push(item.title);
//                     descr.push(item.description);

//                     MarkNotificationAsPopped(item.id);
//                 }
//             });

//             jq('span.ntf-badge-count').html(count);
//             if (count == 0) {
//                 jq('span.badge-dot-notification').addClass('d-none');
//                 jq('i.icon.icon-notifications-main').removeClass('icon-anim-pulse');
//             }
//             else {
//                 jq('span.badge-dot-notification').removeClass('d-none');
//                 jq('i.icon.icon-notifications-main').addClass('icon-anim-pulse');
//             }

//             FireNotifications();
//         },
//         error: (error) => {
//             console.log(error)
//         }
//     });
// }

// function MarkNotificationAsPopped(idnt) {
//     jq.ajax({
//         url: '/notifications/mark/pop',
//         type: 'POST',
//         data: {
//             id: idnt
//         }
//     });
// }

// function ParseNotificationTime() {
//     jq('div.notifications-container-hub').each(function () {
//         var datetime = new Date(jq(this).find("time").attr('datetime'));
//         var minutes = Math.floor((new Date().getTime() - datetime.getTime()) / (1000 * 60));
//         var hours = Math.floor(minutes / 60);
//         var days = Math.floor(hours / 24);
//         var months = Math.floor(days / 30);
//         var years = Math.floor(months / 12);
//         var displ = "seconds ago";

//         if (years > 0) {
//             displ = "years ago";
//         }
//         else if (months > 0) {
//             displ = (months == 1 ? "a month ago" : months + " months ago");
//         }
//         else if (days > 0) {
//             displ = (days == 1 ? "Yesterday" : days + " days ago");
//         }
//         else if (hours > 0) {
//             displ = (hours > 12 ? "Today" : (hours == 1 ? "an hour ago" : hours + " hours ago"));
//         }
//         else if (minutes > 0) {
//             displ = (minutes == 1 ? "a min ago" : minutes + " mins ago");
//         }

//         jq(this).find("time").html(displ);
//     });
// }

// function FireNotifications() {
//     setTimeout(function () {
//         if (ix < title.length) {
//             toastr.info(descr[ix], title[ix], { "closeButton": true, "showMethod": "slideDown" });
//             jq('audio.notif-sound')[0].play();
//             ix++;

//             if (ix < title.length) {
//                 FireNotifications();
//             }
//         }
//     }, 2000)
// }