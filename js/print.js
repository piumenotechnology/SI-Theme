


export let print = function() {
    $('a.printer').on('click', function(e) {
        e.preventDefault();
        window.print();
    });
}