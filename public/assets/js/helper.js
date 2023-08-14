/**
 | ----------------------------------------------------------------
 |  jQuery Notification
 | ----------------------------------------------------------------
 |
 | It shows the notification message
 |
 */

const notify = (message) => {
    $.toast({
        // heading: 'Success',
        text: message,
        hideAfter: 5000,
        icon: 'success',
        bgColor: '#808080',
        textColor: '#fff',
        position: 'top-right',
        loader: false,
        loaderBg: '#9EC600'
    })
}



/**
 | ----------------------------------------------------------------
 |  Close bootstrap alert
 | ----------------------------------------------------------------
 |
 | It hides the bootstrap alert
 |
 */

 $('.alert .close').click(function (e) {
    e.preventDefault();
    $('.alert').removeClass('show');
})
