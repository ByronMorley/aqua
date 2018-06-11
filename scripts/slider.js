var $wrapper = $('.fri-wrapper');
if ($wrapper.attr('orient') == 'vertical') {
    vertial()
} else if ($wrapper.attr('orient') == 'horizontal') {
    horizontal();
} else {
    vertial()
}

function vertial() {

    var lineHeight = ($('.fri-drag-line').height()) - 15;

    $('.fri-draggable-button').draggable({
        axis: 'y',
        containment: 'parent'
    });

    $('.fri-draggable-button').on('drag', function () {
        var position = $('.fri-draggable-button').position();
        var marginTop = position.top;
        $('.fri-line').css({
            'clip': 'rect(' + marginTop + 'px,8px, 183px,0px)'
        });
    });

    $('.fa-minus').on('click', function () {
        var position = $('.fri-draggable-button').position();
        var marginTop = position.top;

        $('.fri-line').css({
            'clip': 'rect(' + (marginTop + 14) + 'px,8px, 183px,0px)'
        });

        if (marginTop < lineHeight) {
            $('.fri-draggable-button').css({
                'top': marginTop + 14
            });

        }
    });

    $('.fa-plus').on('click', function () {
        var position = $('.fri-draggable-button').position();
        var marginTop = position.top;

        $('.fri-line').css({
            'clip': 'rect(' + (marginTop - 14) + 'px,8px, 183px,0px)'
        });

        if (marginTop > 0) {

            $('.fri-draggable-button').css({
                'top': marginTop - 14
            });
        }
    });
}


function horizontal() {

    var lineWidth = ($('.fri-drag-line').width()) - 15;

    $('.fri-draggable-button').draggable({
        axis: 'x',
        containment: 'parent'
    });

    $('.fri-draggable-button').on('drag', function () {
        var position = $('.fri-draggable-button').position();
        var marginLeft = position.left;
        $('.fri-line').css({
            'clip': 'rect(0px,8px, 183px,' + marginLeft + 'px)'
        });
    });

    $('.fa-minus').on('click', function () {
        var position = $('.fri-draggable-button').position();
        var marginLeft = position.left;

        $('.fri-line').css({
            'clip': 'rect(0px,8px, 183px,' + (marginLeft - 14) + 'px)'
        });

        if (marginLeft > 0) {
            $('.fri-draggable-button').css({
                'left': marginLeft - 10
            });
        }
    });

    $('.fa-plus').on('click', function () {
        var position = $('.fri-draggable-button').position();
        var marginLeft = position.left;

        $('.fri-line').css({
            'clip': 'rect(0px,8px, 183px,' + (marginLeft + 14) + 'px)'
        });

        if (marginLeft < lineWidth) {
            $('.fri-draggable-button').css({
                'left': marginLeft + 10
            });
        }
    });


}
